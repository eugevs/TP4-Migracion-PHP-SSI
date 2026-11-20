<?php
// VISTA: solo HTML y variables ya preparadas por el controlador.
$titulo_pagina = 'Rutas (MVC)';
$descripcion_pagina = 'Listado de rutas con arquitectura MVC.';
include __DIR__ . '/../../../includes/header.php';
include __DIR__ . '/../../../includes/nav.php';
?>

<main class="container my-5">
  <h1 class="mb-4">Rutas (versión MVC)</h1>

  <?php if ($aviso): ?>
    <div class="alert alert-<?= htmlspecialchars($aviso[0]) ?>">
      <?= htmlspecialchars($aviso[1]) ?>
    </div>
  <?php endif; ?>

  <a href="rutas-mvc.php?accion=crear" class="btn btn-primary mb-3">Agregar nueva ruta</a>

  <div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
      <thead>
        <tr>
          <th>ID</th><th>Nombre</th><th>Provincia</th><th>Categoría</th>
          <th>Dificultad</th><th>Distancia (km)</th><th>Acciones</th>
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
              <a href="rutas-mvc.php?accion=editar&id=<?= (int)$r['id'] ?>"
                 class="btn btn-sm btn-warning">Editar</a>
              <form action="rutas-mvc.php?accion=eliminar" method="POST" class="d-inline"
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

<?php include __DIR__ . '/../../../includes/footer.php'; ?>