<?php
require_once 'funciones.php';

$lugares = [
    ['nombre' => 'Cafayate',      'provincia' => 'Salta'],
    ['nombre' => 'Quebrada de Humahuaca', 'provincia' => 'Jujuy'],
    ['nombre' => 'Cerro de los Siete Colores', 'provincia' => 'Jujuy'],
    ['nombre' => 'Cataratas del Iguazú', 'provincia' => 'Misiones'],
    ['nombre' => 'Salinas Grandes', 'provincia' => 'Jujuy'],
];

$busqueda = '';
$resultados = [];
$mensaje = '';

if (isset($_GET['q'])) {
    // filter_input sanitiza la entrada GET
    $busqueda = trim(filter_input(INPUT_GET, 'q', FILTER_UNSAFE_RAW) ?? '');

    if (empty($busqueda)) {
        $mensaje = 'Ingresá un término de búsqueda.';
    } else {
        foreach ($lugares as $lugar) {
            if (stripos($lugar['nombre'], $busqueda) !== false ||
                stripos($lugar['provincia'], $busqueda) !== false) {
                $resultados[] = $lugar;
            }
        }
        if (empty($resultados)) {
            $mensaje = 'No se encontraron resultados.';
        }
    }
}

$titulo_pagina = 'Buscar';
$descripcion_pagina = 'Buscador de lugares con método GET.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-4">
  <h1>Buscar lugares</h1>

  <form method="GET" action="buscar.php" class="d-flex gap-2 mb-3">
    <input type="text" name="q" class="form-control"
           placeholder="Nombre o provincia"
           value="<?= limpiar($busqueda) ?>">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </form>

  <?php if ($mensaje): ?>
    <div class="alert alert-warning"><?= $mensaje ?></div>
  <?php endif; ?>

  <?php if (!empty($resultados)): ?>
    <p>Resultados para "<strong><?= limpiar($busqueda) ?></strong>":</p>
    <ul class="list-group">
      <?php foreach ($resultados as $r): ?>
        <li class="list-group-item">
          <?= limpiar($r['nombre']) ?> (<?= limpiar($r['provincia']) ?>)
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>