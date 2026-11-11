<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Iniciar sesión | Explorando lugares</title>
    <meta
      name="description"
      content="Iniciá sesión en Explorando lugares para guardar tus rutas, ver tu perfil y compartir tus experiencias al aire libre."
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
                <a class="btn btn-dark ms-lg-2" href="contacto.html"
                  >Contacto</a
                >
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <section class="container py-5">
        <div class="card bg-light col-md-8 col-lg-5 mx-auto">
          <form class="card-body p-4" action="#">
            <h1 class="h3 text-center mb-4">Iniciar sesión</h1>

            <div class="mb-3">
              <label for="login-email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="login-email"
                placeholder="nombre@email.com"
                autocomplete="email"
                required
              />
            </div>
            <div class="mb-3">
              <label for="login-password" class="form-label">Contraseña</label>
              <input
                type="password"
                class="form-control"
                id="login-password"
                autocomplete="current-password"
                required
              />
            </div>

            <button type="submit" class="btn btn-dark w-100">
              Iniciar sesión
            </button>
            <p class="text-center mt-3 mb-1">
              <a class="link-dark" href="#">¿Olvidaste tu contraseña?</a>
            </p>
            <p class="text-center mb-0">
              ¿No tenés cuenta?
              <a class="link-dark" href="registro.html">Registrarse</a>
            </p>
          </form>
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
