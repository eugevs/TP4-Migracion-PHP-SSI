<?php
$titulo_pagina = 'Equipamiento recomendado';
$descripcion_pagina = 'Conocé el equipamiento recomendado para tus aventuras: mochila, calzado y todo lo necesario para salir a explorar con seguridad.';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>
<main>
      <section class="container py-5" aria-labelledby="titulo-equipamiento">
        <h1 id="titulo-equipamiento" class="mb-4">Equipamiento recomendado</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <article class="card h-100">
              <img
                src="img/mochila.webp"
                class="card-img-top"
                alt="Mochila de trekking sobre una roca al atardecer"
              />
              <div class="card-body">
                <h2 class="card-title h5 mb-0">Mochila</h2>
              </div>
            </article>
          </div>
          <div class="col">
            <article class="card h-100">
              <img
                src="img/calzado.webp"
                class="card-img-top"
                alt="Primer plano de una zapatilla de montaña sobre pasto seco"
              />
              <div class="card-body">
                <h2 class="card-title h5 mb-0">Calzado</h2>
              </div>
            </article>
          </div>
          <div class="col">
            <article class="card h-100">
              <img
                src="img/equipo-camping.webp"
                class="card-img-top"
                alt="Equipo de camping ordenado sobre una mesa de madera"
              />
              <div class="card-body">
                <h2 class="card-title h5 mb-0">Equipamiento</h2>
              </div>
            </article>
          </div>
        </div>
      </section>
    </main>
<?php require_once 'includes/footer.php'; ?>