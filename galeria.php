<?php
$titulo_pagina = 'Galería de experiencias';
$descripcion_pagina = 'Explorá las fotos compartidas por la comunidad o subí las tuyas para inspirar a otros aventureros.';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>
<main>
      <section class="container py-5" aria-labelledby="titulo-galeria">
        <h1 id="titulo-galeria">Guarda o publica tus experiencias</h1>
        <p class="mb-4">
          Explorá las fotos compartidas por la comunidad o subí las tuyas para
          inspirar a otros aventureros.
        </p>

        <div class="mb-5">
          <label for="foto" class="form-label">Subí tu foto</label>
          <input class="form-control" type="file" id="foto" accept="image/*" />
        </div>

        <h2 class="h3 mb-3">Galería</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          <div class="col">
            <div class="ratio ratio-4x3">
              <img
                src="img/ruta-bici.webp"
                class="object-fit-cover rounded"
                loading="lazy"
                alt="Ciclista bajando por un sendero de montaña"
              />
            </div>
          </div>
          <div class="col">
            <div class="ratio ratio-4x3">
              <img
                src="img/caminata-bosque.webp"
                class="object-fit-cover rounded"
                loading="lazy"
                alt="Dos personas caminando por un sendero en el bosque"
              />
            </div>
          </div>
          <div class="col">
            <div class="ratio ratio-4x3">
              <img
                src="img/sendero-bosque.webp"
                class="object-fit-cover rounded"
                loading="lazy"
                alt="Sendero de tierra entre árboles y helechos"
              />
            </div>
          </div>
          <div class="col">
            <div class="ratio ratio-4x3">
              <img
                src="img/costa-rio.webp"
                class="object-fit-cover rounded"
                loading="lazy"
                alt="Costa de un río con piedras y árboles"
              />
            </div>
          </div>
          <div class="col">
            <div class="ratio ratio-4x3">
              <img
                src="img/cerro-mirador.webp"
                class="object-fit-cover rounded"
                loading="lazy"
                alt="Cartel del Cerro Mirador con vista al lago"
              />
            </div>
          </div>
          <div class="col">
            <div class="ratio ratio-4x3">
              <img
                src="img/equipamiento.webp"
                class="object-fit-cover rounded"
                loading="lazy"
                alt="Equipo de camping ordenado sobre una mesa de madera"
              />
            </div>
          </div>
        </div>
      </section>
    </main>
<?php require_once 'includes/footer.php'; ?>