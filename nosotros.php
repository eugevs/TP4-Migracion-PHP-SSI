<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sobre el sitio | Explorando lugares</title>
    <meta
      name="description"
      content="Conocé Explorando lugares: un espacio para compartir rutas en bici, caminatas y experiencias al aire libre con la comunidad."
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
                <a class="nav-link" href="equipamiento.html">Equipamiento</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contacto.html">Contacto</a>
              </li>
              <li class="nav-item ms-lg-3 my-1 my-lg-0">
                <a class="btn btn-outline-dark" href="login.html"
                  >Iniciar sesión</a
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
      <section class="container py-5" aria-labelledby="titulo-nosotros">
        <img
          src="img/banner-bosque.webp"
          class="img-fluid rounded w-100 mb-4"
          alt="Camino de tierra en medio de un bosque frondoso"
        />
        <h1 id="titulo-nosotros">Sobre el sitio</h1>
        <p>
          Conectamos a la comunidad con la naturaleza. Este espacio nació para
          compartir rutas en bici, caminatas y experiencias al aire libre, para
          que cada aventura sea más fácil de planear.
        </p>
        <p>
          Queremos que planear tu próxima salida sea simple, seguro y motivador,
          ya sea que busques un recorrido tranquilo de fin de semana o una
          travesía desafiante en algún lugar.
        </p>
        <p>
          Aquí vas a encontrar mapas detallados, recomendaciones de equipamiento
          probadas por otros aventureros y una comunidad dispuesta a compartir
          sus experiencias reales para que salgas a explorar con total
          confianza.
        </p>
      </section>
    </main>

    <footer class="bg-dark text-white py-4">
      <div class="container text-center">
        <ul class="list-inline mb-2">
          <li class="list-inline-item">
            <a class="link-light" href="galeria.html">Galería</a>
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
