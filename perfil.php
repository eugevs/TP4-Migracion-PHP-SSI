<?php
$titulo_pagina = 'Mi perfil';
$descripcion_pagina = 'Tu perfil de aventurero: kilómetros recorridos, rutas completadas, ruta favorita y tu última actividad en Explorando lugares.';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>
<main>
      <section class="container py-5">
        <div class="d-flex align-items-center gap-3 mb-4">
          <div
            class="rounded-circle bg-secondary-subtle"
            style="width: 80px; height: 80px"
            aria-hidden="true"
          ></div>
          <div>
            <h1 class="h3 mb-0">Mi perfil</h1>
            <p class="mb-0 text-dark">Nombre de usuario</p>
          </div>
        </div>

        <div class="row row-cols-2 row-cols-md-4 g-3 mb-5">
          <div class="col">
            <div class="card text-center h-100">
              <div class="card-body">
                <p class="text-dark mb-1">Km totales</p>
                <p class="h3 mb-0">142</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card text-center h-100">
              <div class="card-body">
                <p class="text-dark mb-1">Rutas completadas</p>
                <p class="h3 mb-0">9</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card text-center h-100">
              <div class="card-body">
                <p class="text-dark mb-1">Ruta favorita</p>
                <p class="h5 mb-0">Cerro Elefante</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card text-center h-100">
              <div class="card-body">
                <p class="text-dark mb-1">Última actividad</p>
                <p class="h5 mb-0">Hace 2 días</p>
              </div>
            </div>
          </div>
        </div>

        <h2 class="h5">Últimas rutas hechas</h2>
        <ul class="list-group">
          <li class="list-group-item d-flex justify-content-between">
            <span>Cerro Elefante</span><span>12 km · 24/09</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Costa del río</span><span>5 km · 18/09</span>
          </li>
          <li class="list-group-item d-flex justify-content-between">
            <span>Sendero del bosque</span><span>8 km · 10/09</span>
          </li>
        </ul>
      </section>
    </main>
<?php require_once 'includes/footer.php'; ?>