<?php
require_once 'includes/auth_guard.php'; // sin sesión → login.php?error=acceso_denegado
require_once 'config/conexion.php';

$uid = (int)$_SESSION['usuario_id'];
$errores = [];
$aviso = (($_GET['ok'] ?? '') === 'datos') ? 'Tus datos se actualizaron correctamente.' : '';

// 1) Datos del usuario
$usuario = null;
$errorCarga = false;
try {
    $stmt = $pdo->prepare("SELECT nombre, apellido, email, telefono, created_at FROM usuarios WHERE id = :id");
    $stmt->execute([':id' => $uid]);
    $usuario = $stmt->fetch();
} catch (PDOException $e) {
    error_log('Error en perfil (carga): ' . $e->getMessage());
    $errorCarga = true;
}

if (!$errorCarga && !$usuario) { // la cuenta ya no existe
    header('Location: logout.php');
    exit;
}

$datos = [
    'nombre'   => $usuario['nombre'] ?? $_SESSION['usuario_nombre'],
    'apellido' => $usuario['apellido'] ?? '',
    'telefono' => $usuario['telefono'] ?? '',
];

// 2) Guardar cambios
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$errorCarga) {
    if (!csrf_valido()) {
        $errores['general'] = 'El formulario venció. Recargá la página e intentá de nuevo.';
    } else {
        $datos['nombre']   = trim($_POST['nombre'] ?? '');
        $datos['apellido'] = trim($_POST['apellido'] ?? '');
        $datos['telefono'] = trim($_POST['telefono'] ?? '');

        if ($datos['nombre'] === '' || mb_strlen($datos['nombre']) > 60) {
            $errores['nombre'] = 'Ingresá tu nombre (máximo 60 caracteres).';
        }
        if ($datos['apellido'] === '' || mb_strlen($datos['apellido']) > 60) {
            $errores['apellido'] = 'Ingresá tu apellido (máximo 60 caracteres).';
        }
        if ($datos['telefono'] !== '' && !preg_match('/^[0-9 +()\-]{6,20}$/', $datos['telefono'])) {
            $errores['telefono'] = 'Ingresá un teléfono válido (números, espacios, +, - y paréntesis).';
        }

        if (empty($errores)) {
            try {
                $stmt = $pdo->prepare(
                    "UPDATE usuarios
                     SET nombre = :nombre, apellido = :apellido, telefono = :telefono
                     WHERE id = :id"
                );
                $stmt->execute([
                    ':nombre'   => $datos['nombre'],
                    ':apellido' => $datos['apellido'],
                    ':telefono' => $datos['telefono'] === '' ? null : $datos['telefono'],
                    ':id'       => $uid,
                ]);
                $_SESSION['usuario_nombre'] = $datos['nombre'];
                header('Location: perfil.php?ok=datos');
                exit;
            } catch (PDOException $e) {
                error_log('Error en perfil (guardar): ' . $e->getMessage());
                $errores['general'] = 'No se pudieron guardar los cambios. Intentá de nuevo.';
            }
        }
    }
}

// 3) Actividad
$stats = ['comentarios' => 0, 'completadas' => 0, 'km' => 0];
$hechas = [];
$misComentarios = [];

try {
    $stmt = $pdo->prepare(
        "SELECT
           (SELECT COUNT(*) FROM comentarios WHERE usuario_id = :u1) AS comentarios,
           (SELECT COUNT(*) FROM rutas_realizadas WHERE usuario_id = :u2) AS completadas,
           (SELECT COALESCE(SUM(r.distancia_km), 0)
              FROM rutas_realizadas rr
              INNER JOIN rutas r ON rr.ruta_id = r.id
             WHERE rr.usuario_id = :u3) AS km"
    );
    $stmt->execute([':u1' => $uid, ':u2' => $uid, ':u3' => $uid]);
    $stats = $stmt->fetch();

    $stmt = $pdo->prepare(
        "SELECT r.id, r.nombre, r.distancia_km, rr.created_at
         FROM rutas_realizadas rr
         INNER JOIN rutas r ON rr.ruta_id = r.id
         WHERE rr.usuario_id = :u
         ORDER BY rr.created_at DESC, rr.id DESC
         LIMIT 5"
    );
    $stmt->execute([':u' => $uid]);
    $hechas = $stmt->fetchAll();

    $stmt = $pdo->prepare(
        "SELECT r.id AS ruta_id, r.nombre AS ruta, c.contenido, c.created_at
         FROM comentarios c
         INNER JOIN rutas r ON c.ruta_id = r.id
         WHERE c.usuario_id = :u
         ORDER BY c.created_at DESC, c.id DESC
         LIMIT 5"
    );
    $stmt->execute([':u' => $uid]);
    $misComentarios = $stmt->fetchAll();
} catch (PDOException $e) {
    error_log('Error en perfil (actividad): ' . $e->getMessage());
    $errorCarga = true;
}

$inicial = mb_strtoupper(mb_substr($datos['nombre'], 0, 1));

$titulo_pagina = 'Mi perfil';
$descripcion_pagina = 'Datos y actividad del usuario.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-5">
  <div class="d-flex align-items-center gap-3 mb-4">
    <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold fs-2"
         style="width:80px;height:80px;background:var(--mate-acento,#c9b458);color:var(--mate-tinta,#26241a);"
         aria-hidden="true">
      <?= htmlspecialchars($inicial) ?>
    </div>
    <div>
      <h1 class="h2 mb-1"><?= htmlspecialchars(trim($datos['nombre'] . ' ' . $datos['apellido'])) ?></h1>
      <div>
        <?= htmlspecialchars($usuario['email'] ?? '') ?>
        · <span class="badge bg-dark"><?= htmlspecialchars($_SESSION['rol']) ?></span>
      </div>
    </div>
  </div>

  <?php if ($aviso !== ''): ?>
    <div class="alert alert-success"><?= htmlspecialchars($aviso) ?></div>
  <?php endif; ?>
  <?php if ($errorCarga): ?>
    <div class="alert alert-danger">No se pudieron cargar algunos datos. Intentá de nuevo más tarde.</div>
  <?php endif; ?>

  <div class="row g-3 mb-5">
    <div class="col-6 col-lg-3">
      <div class="card text-center h-100"><div class="card-body">
        <div class="text-muted">Rutas completadas</div>
        <div class="fs-3 fw-bold"><?= (int)$stats['completadas'] ?></div>
      </div></div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="card text-center h-100"><div class="card-body">
        <div class="text-muted">Km recorridos</div>
        <div class="fs-3 fw-bold"><?= htmlspecialchars(number_format((float)$stats['km'], 1, ',', '.')) ?></div>
      </div></div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="card text-center h-100"><div class="card-body">
        <div class="text-muted">Comentarios</div>
        <div class="fs-3 fw-bold"><?= (int)$stats['comentarios'] ?></div>
      </div></div>
    </div>
    <div class="col-6 col-lg-3">
      <div class="card text-center h-100"><div class="card-body">
        <div class="text-muted">Miembro desde</div>
        <div class="fs-5 fw-bold">
          <?= !empty($usuario['created_at'])
              ? htmlspecialchars(date('d/m/Y', strtotime($usuario['created_at'])))
              : '-' ?>
        </div>
      </div></div>
    </div>
  </div>

  <h2 class="h4 mb-3">Mis datos</h2>
  <?php if (isset($errores['general'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($errores['general']) ?></div>
  <?php endif; ?>
  <form method="POST" action="perfil.php" class="card card-body mb-5" novalidate>
    <?= csrf_campo() ?>
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
    <div class="row">
      <div class="col-md-6 mb-3">
        <label for="email" class="form-label">Email (no se puede cambiar)</label>
        <input type="text" id="email" class="form-control" disabled
               value="<?= htmlspecialchars($usuario['email'] ?? '') ?>">
      </div>
      <div class="col-md-6 mb-3">
        <label for="telefono" class="form-label">Teléfono (opcional)</label>
        <input type="text" id="telefono" name="telefono" class="form-control"
               value="<?= htmlspecialchars((string)$datos['telefono']) ?>">
        <?php if (isset($errores['telefono'])): ?>
          <div class="text-danger"><?= htmlspecialchars($errores['telefono']) ?></div>
        <?php endif; ?>
      </div>
    </div>
    <div><button type="submit" class="btn btn-primary">Guardar cambios</button></div>
  </form>

  <h2 class="h4 mb-3">Mis últimas rutas completadas</h2>
  <?php if (empty($hechas)): ?>
    <p class="text-muted mb-5">
      Todavía no completaste ninguna ruta. <a href="explorar.php">Explorá las rutas</a> y marcá las que hiciste.
    </p>
  <?php else: ?>
    <div class="list-group mb-5">
      <?php foreach ($hechas as $h): ?>
        <a href="ruta-detalle.php?id=<?= (int)$h['id'] ?>"
           class="list-group-item list-group-item-action d-flex justify-content-between">
          <span><?= htmlspecialchars($h['nombre']) ?></span>
          <span>
            <?= htmlspecialchars((string)$h['distancia_km']) ?> km
            · <?= htmlspecialchars(date('d/m/Y', strtotime($h['created_at']))) ?>
          </span>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <h2 class="h4 mb-3">Mis últimos comentarios</h2>
  <?php if (empty($misComentarios)): ?>
    <p class="text-muted">Todavía no comentaste ninguna ruta.</p>
  <?php else: ?>
    <?php foreach ($misComentarios as $c): ?>
      <div class="card mb-3">
        <div class="card-body">
          <div class="d-flex justify-content-between flex-wrap gap-1">
            <a href="ruta-detalle.php?id=<?= (int)$c['ruta_id'] ?>#comentarios">
              <strong><?= htmlspecialchars($c['ruta']) ?></strong>
            </a>
            <small class="text-muted">
              <?= htmlspecialchars(date('d/m/Y H:i', strtotime($c['created_at']))) ?>
            </small>
          </div>
          <p class="mb-0 mt-2"><?= nl2br(htmlspecialchars($c['contenido'])) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>

  <div class="mt-4">
    <?php if ($_SESSION['rol'] === 'admin'): ?>
      <a href="admin_panel.php" class="btn btn-primary">Panel de administración</a>
      <a href="rutas-admin.php" class="btn btn-outline-primary">Administrar rutas</a>
    <?php endif; ?>
    <a href="logout.php" class="btn btn-outline-secondary">Cerrar sesión</a>
  </div>
</main>

<?php include 'includes/footer.php'; ?>