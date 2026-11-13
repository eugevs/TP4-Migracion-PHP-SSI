<?php
$titulo_pagina = 'Explorar rutas';
$descripcion_pagina = 'Buscador de rutas en tiempo real.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-5">
  <h1 class="mb-4">Explorar rutas</h1>

  <form id="formBusqueda" class="row g-2 mb-3" role="search">
    <div class="col-md-7">
      <label for="inputBusqueda" class="visually-hidden">Buscar rutas</label>
      <input type="search" id="inputBusqueda" class="form-control"
             placeholder="Buscá por nombre de ruta o provincia" autocomplete="off">
    </div>
    <div class="col-md-3">
      <label for="selectDificultad" class="visually-hidden">Dificultad</label>
      <select id="selectDificultad" class="form-select">
        <option value="">Todas las dificultades</option>
        <option value="Baja">Baja</option>
        <option value="Media">Media</option>
        <option value="Alta">Alta</option>
      </select>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-dark w-100">Buscar</button>
    </div>
  </form>

  <p id="estado" class="text-muted" aria-live="polite"></p>

  <div id="resultados" class="row g-3"></div>
  <div id="detalle" class="mt-4"></div>
</main>

<script src="js/buscador.js" defer></script>
<?php include 'includes/footer.php'; ?>