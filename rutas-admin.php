<?php
$rol_requerido = 'admin';
require_once 'includes/auth_guard.php';
require_once 'config/conexion.php';

$sql = "SELECT r.id, r.nombre, r.dificultad, r.distancia_km,
               p.nombre AS provincia, c.nombre AS categoria
        FROM rutas r
        INNER JOIN provincias p ON r.provincia_id = p.id
        INNER JOIN categorias c ON r.categoria_id = c.id
        ORDER BY r.id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$rutas = $stmt->fetchAll();

$mensajes = [
    'created'  => ['success', 'Ruta creada correctamente.'],
    'updated'  => ['success', 'Ruta actualizada correctamente.'],
    'deleted'  => ['success', 'Ruta eliminada correctamente.'],
    'notfound' => ['warning', 'La ruta solicitada no existe.'],
    'error'    => ['danger', 'Ocurrió un error al procesar la operación.'],
];
$status = $_GET['status'] ?? '';
$aviso = $mensajes[$status] ?? null;

$titulo_pagina = 'Administración de rutas';
$descripcion_pagina = 'Listado y gestión de rutas del sitio.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-5">
  <h1 class="mb-4">Administración de rutas</h1>

  <?php if ($aviso): ?>
    <div class="alert alert-<?= htmlspecialchars($aviso[0]) ?>">
      <?= htmlspecialchars($aviso[1]) ?>
    </div>
  <?php endif; ?>

  <a href="ruta-crear.php" class="btn btn-primary mb-3">Agregar nueva ruta</a>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Provincia</th>
          <th>Categoría</th>
          <th>Dificultad</th>
          <th>Distancia (km)</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if (empty($rutas)): ?>
          <tr><td colspan="7" class="text-center">Todavía no hay rutas cargadas.</td></tr>
        <?php endif; ?>
        <?php foreach ($rutas as $r): ?>
          <tr>
            <td><?= htmlspecialchars($r['id']) ?></td>
            <td><?= htmlspecialchars($r['nombre']) ?></td>
            <td><?= htmlspecialchars($r['provincia']) ?></td>
            <td><?= htmlspecialchars($r['categoria']) ?></td>
            <td><?= htmlspecialchars($r['dificultad']) ?></td>
            <td><?= htmlspecialchars((string)$r['distancia_km']) ?></td>
            <td>
              <a href="ruta-editar.php?id=<?= (int)$r['id'] ?>"
                 class="btn btn-sm btn-warning">Editar</a>
              <form action="ruta-eliminar.php" method="POST" class="d-inline"
                    onsubmit="return confirm('¿Confirmás eliminar esta ruta?');">
                <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
                <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

<?php include 'includes/footer.php'; ?>