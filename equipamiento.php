<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Equipamiento recomendado | Explorando lugares</title>
    <meta
      name="description"
      content="Conocé el equipamiento recomendado para tus aventuras: mochila, calzado y todo lo necesario para salir a explorar con seguridad."
    />
    <link
      rel="icon"
      href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🏔️</text></svg>"
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
                <a class="nav-link" href="index.html">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="ruta-detalle.html">Rutas</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="caminatas.html">Caminatas</a>
              </li>
              <li class="nav-item">
                <a
                  class="nav-link active"
                  href="equipamiento.html"
                  aria-current="page"
                  >Equipamiento</a
                >
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

    <footer class="bg-dark text-white py-4">
      <div class="container text-center">
        <ul class="list-inline mb-2">
          <li class="list-inline-item">
            <a class="link-light" href="galeria.html">Galer&iacute;a</a>
          </li>
          <li class="list-inline-item">
            <a class="link-light" href="nosotros.html">Sobre el sitio</a>
          </li>
          <li class="list-inline-item">
            <a class="link-light" href="perfil.html">Mi perfil</a>
          </li>
        </ul>
        <p class="mb-0">
          © 2026 Explorando lugares. Todos los derechos reservados.
        </p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
