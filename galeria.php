<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Galería de experiencias | Explorando lugares</title>
    <meta
      name="description"
      content="Explorá las fotos compartidas por la comunidad o subí las tuyas para inspirar a otros aventureros."
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
