<?php
require_once 'config/sesion.php';
require_once 'config/conexion.php';

if (isset($_SESSION['usuario_id'])) {
    header('Location: dashboard.php');
    exit;
}

$errores = [];
$email = '';

$aviso = '';
if (($_GET['error'] ?? '') === 'acceso_denegado') {
    $aviso = 'Tenés que iniciar sesión para acceder a esa página.';
} elseif (($_GET['registro'] ?? '') === 'ok') {
    $aviso = 'Cuenta creada correctamente. Ya podés iniciar sesión.';
} elseif (($_GET['logout'] ?? '') === 'ok') {
    $aviso = 'Cerraste sesión correctamente.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $errores['general'] = 'Completá el email y la contraseña.';
    } else {
        try {
            $sql = "SELECT u.id, u.nombre, u.password, r.nombre AS rol
                    FROM usuarios u
                    INNER JOIN roles r ON u.rol_id = r.id
                    WHERE u.email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([':email' => $email]);
            $usuario = $stmt->fetch();

            if ($usuario && password_verify($password, $usuario['password'])) {
                session_regenerate_id(true); // evita fijación de sesión

                $_SESSION['usuario_id']     = (int)$usuario['id'];
                $_SESSION['usuario_nombre'] = $usuario['nombre'];
                $_SESSION['rol']            = $usuario['rol'];

                header('Location: dashboard.php');
                exit;
            }

            // Mismo mensaje si falla el email o la contraseña
            $errores['general'] = 'Email o contraseña incorrectos.';
        } catch (PDOException $e) {
            error_log('Error en login: ' . $e->getMessage());
            $errores['general'] = 'No se pudo iniciar sesión. Intentá de nuevo.';
        }
    }
}

$titulo_pagina = 'Iniciar sesión';
$descripcion_pagina = 'Acceso de usuarios registrados.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-5" style="max-width: 520px;">
  <h1 class="mb-4">Iniciar sesión</h1>

  <?php if ($aviso): ?>
    <div class="alert alert-info"><?= htmlspecialchars($aviso) ?></div>
  <?php endif; ?>

  <?php if (isset($errores['general'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($errores['general']) ?></div>
  <?php endif; ?>

  <form method="POST" action="login.php" novalidate>
    <div class="mb-3">
      <label for="email" class="form-label">Email</label>
      <input type="text" id="email" name="email" class="form-control"
             value="<?= htmlspecialchars($email) ?>">
    </div>

    <div class="mb-3">
      <label for="password" class="form-label">Contraseña</label>
      <input type="password" id="password" name="password" class="form-control">
    </div>

    <button type="submit" class="btn btn-dark">Ingresar</button>
    <a href="registro.php" class="btn btn-outline-secondary">Crear cuenta</a>
  </form>
</main>

<?php include 'includes/footer.php'; ?>