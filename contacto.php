<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Contacto | Explorando lugares</title>
    <meta
      name="description"
      content="Escribinos tu consulta o sugerencia sobre rutas, caminatas y equipamiento. Completá el formulario de contacto de Explorando lugares."
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
                <a
                  class="nav-link active"
                  href="contacto.html"
                  aria-current="page"
                  >Contacto</a
                >
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
      <section class="container py-5">
        <div class="card bg-light col-md-8 col-lg-6 mx-auto">
          <form class="card-body p-4" action="#">
            <h1 class="h3 text-center mb-4">Contacto</h1>

            <div class="mb-3">
              <label for="c-nombre" class="form-label">Nombre</label>
              <input
                type="text"
                class="form-control"
                id="c-nombre"
                placeholder="Tu nombre"
                autocomplete="name"
                required
              />
            </div>
            <div class="mb-3">
              <label for="c-email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="c-email"
                placeholder="nombre@email.com"
                autocomplete="email"
                required
              />
            </div>
            <div class="mb-4">
              <label for="c-mensaje" class="form-label">Mensaje</label>
              <textarea
                class="form-control"
                id="c-mensaje"
                rows="5"
                placeholder="Escribe tu mensaje"
                required
              ></textarea>
            </div>

            <button type="submit" class="btn btn-dark w-100">Enviar</button>

            <ul class="list-inline text-center mt-4 mb-0">
              <li class="list-inline-item">
                <a href="#" aria-label="Instagram">Instagram</a>
              </li>
              <li class="list-inline-item">
                <a href="#" aria-label="Facebook">Facebook</a>
              </li>
              <li class="list-inline-item">
                <a href="#" aria-label="YouTube">YouTube</a>
              </li>
            </ul>
          </form>
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
