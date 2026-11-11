<?php
$titulo_pagina = 'Caminatas disponibles';
$descripcion_pagina = 'Elegí tu próxima caminata: senderos de bosque, costa del río y cerros con la duración y el tipo de terreno de cada una.';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>
<main>
      <section class="container py-5" aria-labelledby="titulo-caminatas">
        <h1 id="titulo-caminatas" class="mb-4">Caminatas disponibles</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <article class="card h-100">
              <img
                src="img/sendero-bosque.webp"
                class="card-img-top"
                alt="Sendero de tierra entre árboles y helechos"
              />
              <div class="card-body">
                <h2 class="card-title h5">Sendero de bosque</h2>
                <p class="card-text text-dark">2 hs · Terreno rocoso</p>
              </div>
            </article>
          </div>
          <div class="col">
            <article class="card h-100">
              <img
                src="img/costa-rio.webp"
                class="card-img-top"
                alt="Costa de un río con piedras y árboles"
              />
              <div class="card-body">
                <h2 class="card-title h5">Costa del río</h2>
                <p class="card-text text-dark">1 hs · Terreno llano</p>
              </div>
            </article>
          </div>
          <div class="col">
            <article class="card h-100">
              <img
                src="img/cerro-mirador.webp"
                class="card-img-top"
                alt="Cartel del Cerro Mirador con vista al lago"
              />
              <div class="card-body">
                <h2 class="card-title h5">Cerro</h2>
                <p class="card-text text-dark">3 hs · Terreno empinado</p>
              </div>
            </article>
          </div>
        </div>
      </section>
    </main>
<?php require_once 'includes/footer.php'; ?>