<?php
$rol_requerido = 'admin';
require_once 'includes/auth_guard.php';
require_once 'config/conexion.php';

$sql = "SELECT u.id, u.nombre, u.apellido, u.email, r.nombre AS rol, u.created_at
        FROM usuarios u
        INNER JOIN roles r ON u.rol_id = r.id
        ORDER BY u.id";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$usuarios = $stmt->fetchAll();

$titulo_pagina = 'Panel de administración';
$descripcion_pagina = 'Listado de usuarios registrados.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-5">
  <h1 class="mb-4">Panel de administración</h1>
  <p>Usuarios registrados en el sitio:</p>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead>
        <tr><th>ID</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Alta</th></tr>
      </thead>
      <tbody>
        <?php foreach ($usuarios as $u): ?>
          <tr>
            <td><?= htmlspecialchars($u['id']) ?></td>
            <td><?= htmlspecialchars($u['nombre'] . ' ' . $u['apellido']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><?= htmlspecialchars($u['rol']) ?></td>
            <td><?= htmlspecialchars($u['created_at']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

<?php include 'includes/footer.php'; ?>