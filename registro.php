<?php
require_once 'config/sesion.php';
require_once 'config/conexion.php';

if (isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}

$errores = [];
$datos = ['nombre' => '', 'apellido' => '', 'email' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos['nombre']   = trim($_POST['nombre'] ?? '');
    $datos['apellido'] = trim($_POST['apellido'] ?? '');
    $datos['email']    = trim($_POST['email'] ?? '');
    $password  = $_POST['password'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    // Validación en servidor
    if ($datos['nombre'] === '') {
        $errores['nombre'] = 'El nombre es obligatorio.';
    } elseif (mb_strlen($datos['nombre']) > 60) {
        $errores['nombre'] = 'Máximo 60 caracteres.';
    }

    if ($datos['apellido'] === '') {
        $errores['apellido'] = 'El apellido es obligatorio.';
    } elseif (mb_strlen($datos['apellido']) > 60) {
        $errores['apellido'] = 'Máximo 60 caracteres.';
    }

    if ($datos['email'] === '') {
        $errores['email'] = 'El email es obligatorio.';
    } elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El formato del email no es válido.';
    } elseif (mb_strlen($datos['email']) > 120) {
        $errores['email'] = 'Máximo 120 caracteres.';
    }

    if (strlen($password) < 8) {
        $errores['password'] = 'La contraseña debe tener al menos 8 caracteres.';
    } elseif (strlen($password) > 72) {
        $errores['password'] = 'La contraseña no puede superar los 72 caracteres.';
    } elseif ($password !== $password2) {
        $errores['password2'] = 'Las contraseñas no coinciden.';
    }

    if (empty($errores)) {
        try {
            // ¿El email ya existe?
            $stmt = $pdo->prepare("SELECT id FROM usuarios WHERE email = :email");
            $stmt->execute([':email' => $datos['email']]);

            if ($stmt->fetch()) {
                $errores['email'] = 'Ese correo ya está registrado.';
            } else {
                $hash = password_hash($password, PASSWORD_BCRYPT);

                $sql = "INSERT INTO usuarios (rol_id, nombre, apellido, email, password)
                        VALUES ((SELECT id FROM roles WHERE nombre = :rol),
                                :nombre, :apellido, :email, :password)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':rol'      => 'usuario',
                    ':nombre'   => $datos['nombre'],
                    ':apellido' => $datos['apellido'],
                    ':email'    => $datos['email'],
                    ':password' => $hash,
                ]);

                header('Location: login.php?registro=ok');
                exit;
            }
        } catch (PDOException $e) {
            error_log('Error en registro: ' . $e->getMessage());
            $errores['general'] = 'No se pudo completar el registro. Intentá de nuevo.';
        }
    }
}

$titulo_pagina = 'Crear cuenta';
$descripcion_pagina = 'Registro de nuevos usuarios.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-5" style="max-width: 640px;">
  <h1 class="mb-4">Crear cuenta</h1>

  <?php if (isset($errores['general'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($errores['general']) ?></div>
  <?php elseif (!empty($errores)): ?>
    <div class="alert alert-danger">Revisá los errores del formulario.</div>
  <?php endif; ?>

  <form method="POST" action="registro.php" novalidate>
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control"
               value="<?= htmlspecialchars($datos['nombre']) ?>">
        <?php if (isset($errores['nombre'])): ?>
          <div class="text-danger"><?= htmlspecialchars($errores['nombre']) ?></div>
        <?php endif; ?>
      </div>
      <div class="col-md-6 mb-3">
        <label for="apellido" class="form-label">Apellido</label>
        <input type="text" id="apellido" name="apellido" class="form-control"
               value="<?= htmlspecialchars($datos['apellido']) ?>">
        <?php if (isset($errores['apellido'])): ?>
          <div class="text-danger"><?= htmlspecialchars($errores['apellido']) ?></div>
        <?php endif; ?>
      </div>
    </div>

    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" id="email" name="email" class="form-control"
             value="<?= htmlspecialchars($datos['email']) ?>">
      <?php if (isset($errores['email'])): ?>
        <div class="text-danger"><?= htmlspecialchars($errores['email']) ?></div>
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Contraseña (mínimo 8 caracteres)</label>
      <input type="password" id="password" name="password" class="form-control">
      <?php if (isset($errores['password'])): ?>
        <div class="text-danger"><?= htmlspecialchars($errores['password']) ?></div>
      <?php endif; ?>
    </div>

    <div class="mb-3">
      <label for="password2" class="form-label">Repetir contraseña</label>
      <input type="password" id="password2" name="password2" class="form-control">
      <?php if (isset($errores['password2'])): ?>
        <div class="text-danger"><?= htmlspecialchars($errores['password2']) ?></div>
      <?php endif; ?>
    </div>

    <button type="submit" class="btn btn-dark">Crear cuenta</button>
    <a href="login.php" class="btn btn-outline-secondary">Ya tengo cuenta</a>
  </form>
</main>

<?php include 'includes/footer.php'; ?>