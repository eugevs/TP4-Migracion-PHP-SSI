<?php
require_once 'includes/auth_guard.php';

$titulo_pagina = 'Mi panel';
$descripcion_pagina = 'Panel del usuario autenticado.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-5">
  <h1 class="mb-4">Mi panel</h1>

  <?php if (($_GET['error'] ?? '') === 'sin_permiso'): ?>
    <div class="alert alert-warning">No tenés permisos para acceder a esa sección.</div>
  <?php endif; ?>

  <p>Hola, <strong><?= htmlspecialchars($_SESSION['usuario_nombre']) ?></strong>.</p>
  <p>Tu rol es: <span class="badge bg-dark"><?= htmlspecialchars($_SESSION['rol']) ?></span></p>

  <?php if ($_SESSION['rol'] === 'admin'): ?>
    <a href="admin_panel.php" class="btn btn-primary">Panel de administración</a>
    <a href="rutas-admin.php" class="btn btn-outline-primary">Administrar rutas</a>
  <?php endif; ?>
  <a href="logout.php" class="btn btn-outline-secondary">Cerrar sesión</a>
</main>

<?php include 'includes/footer.php'; ?>