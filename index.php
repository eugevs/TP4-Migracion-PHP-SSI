<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Explorando lugares | Rutas, caminatas y equipamiento</title>
    <meta
      name="description"
      content="Descubrí rutas en bici, caminatas y equipamiento para tu próxima aventura al aire libre."
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>
    <header>
      <nav
        class="navbar navbar-expand-lg bg-white border-bottom"
        aria-label="Principal"
      >
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">Explorando lugares</a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#menu"
            aria-controls="menu"
            aria-expanded="false"
            aria-label="Abrir menú"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.html"
                  >Inicio</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ruta-detalle.html">Rutas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="caminatas.html">Caminatas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="equipamiento.html">Equipamiento</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacto.html">Contacto</a>
              </li>
              <li class="nav-item ms-lg-3 my-1 my-lg-0">
                <a class="btn btn-outline-dark" href="login.html"
                  >Iniciar sesi&oacute;n</a
                >
              </li>
              <li class="nav-item my-1 my-lg-0">
                <a class="btn btn-dark ms-lg-2" href="registro.html"
                  >Crear cuenta</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

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
                <a href="ruta-detalle.html" class="btn btn-boton"
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
                <a href="caminatas.html" class="btn btn-boton"
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
                <a href="equipamiento.html" class="btn btn-boton"
                  >Ver catálogo →</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <footer class="bg-dark text-white py-4">
      <div class="container text-center">
        <p class="mb-0">
          © 2026 Explorando lugares. Todos los derechos reservados.
        </p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
