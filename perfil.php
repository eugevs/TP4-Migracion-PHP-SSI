<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Mi perfil | Explorando lugares</title>
    <meta
      name="description"
      content="Tu perfil de aventurero: kilómetros recorridos, rutas completadas, ruta favorita y tu última actividad en Explorando lugares."
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
