<?php
$titulo_pagina = 'Inicio';
$descripcion_pagina = 'Descubrí rutas en bici, caminatas y equipamiento para tu próxima aventura al aire libre.';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>
<main>
      <section class="hero d-flex align-items-center text-white">
        <div class="container">
          <h1 class="display-3 fw-bold">Vive tu próxima aventura</h1>
          <p class="lead col-lg-8">
            Descubrí los mejores caminos de tierra y senderos para tu próxima
            aventura. Ya sea una caminata tranquila o un circuito en bici,
            encontrá rutas detalladas y equipamiento para conectar con la
            naturaleza a tu ritmo.
          </p>
        </div>
      </section>

      <section class="container py-5" aria-labelledby="titulo-explorar">
        <h2 id="titulo-explorar" class="mb-4">Explorando lugares</h2>
        <div class="row row-cols-1 row-cols-md-3 g-4">
          <div class="col">
            <div class="card h-100">
              <img
                src="img/ruta-bici.webp"
                class="card-img-top"
                alt="Ciclista bajando por un sendero de montaña"
              />
              <div class="card-body">
                <h3 class="card-title h5">Rutas en bici</h3>
                <p class="card-text">
                  Descubre las mejores rutas en bici por la naturaleza, montañas
                  y senderos escénicos.
                </p>
                <a href="ruta-detalle.php" class="btn btn-boton"
                  >Ver rutas →</a
                >
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100">
              <img
                src="img/caminata-bosque.webp"
                class="card-img-top"
                alt="Dos personas caminando por un sendero en el bosque"
              />
              <div class="card-body">
                <h3 class="card-title h5">Caminatas</h3>
                <p class="card-text">
                  Descubre senderos montañosos, bosques frondosos y caminos de
                  montaña a pie. Una invitación a explorar la naturaleza con
                  cada paso.
                </p>
                <a href="caminatas.php" class="btn btn-boton"
                  >Ver senderos →</a
                >
              </div>
            </div>
          </div>

          <div class="col">
            <div class="card h-100">
              <img
                src="img/equipamiento.webp"
                class="card-img-top"
                alt="Mochila y equipo de camping ordenados sobre una mesa de madera"
              />
              <div class="card-body">
                <h3 class="card-title h5">Equipamiento</h3>
                <p class="card-text">
                  Encuentra el mejor equipamiento para tus aventuras al aire
                  libre.
                </p>
                <a href="equipamiento.php" class="btn btn-boton"
                  >Ver catálogo →</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
<?php require_once 'includes/footer.php'; ?>