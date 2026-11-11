<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sendero del Cerro Elefante | Explorando lugares</title>
    <meta
      name="description"
      content="Detalles del Sendero del Cerro Elefante en San Lorenzo, Salta: distancia, dificultad, duración aproximada, mapa y comentarios."
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
                <a
                  class="nav-link active"
                  href="ruta-detalle.html"
                  aria-current="page"
                  >Rutas</a
                >
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
      <article class="container py-5">
        <h1 class="mb-4">Detalles de las rutas</h1>
        <img
          src="img/cerro-elefante.webp"
          class="foto-ruta rounded mb-4"
          alt="Sendero de montaña con un cartel del Sendero del Cerro Elefante"
        />

        <h2>Sendero del cerro elefante</h2>
        <ul class="list-inline text-dark">
          <li class="list-inline-item me-4">12 km</li>
          <li class="list-inline-item me-4">Dificultad media</li>
          <li class="list-inline-item">3 hs aprox.</li>
        </ul>

        <div class="ratio ratio-16x9 mb-5">
          <iframe
            src="https://www.google.com/maps?q=Cerro+Elefante+San+Lorenzo+Salta&output=embed"
            title="Mapa del Cerro Elefante, San Lorenzo, Salta"
            loading="lazy"
          ></iframe>
        </div>

        <section aria-labelledby="titulo-comentarios">
          <h2 id="titulo-comentarios" class="h4 border-bottom pb-2">
            Comentarios
          </h2>
          <p>
            <span aria-hidden="true">★★★★★</span>
            <span class="visually-hidden">5 de 5 estrellas.</span>
            “Hermoso para ser senderismo”
          </p>
          <p>
            <span aria-hidden="true">★★★★☆</span>
            <span class="visually-hidden">4 de 5 estrellas.</span>
            “Dificultad media, eso sí, ir con buenas zapas. Muy lindo el lugar”
          </p>
        </section>
      </article>
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
