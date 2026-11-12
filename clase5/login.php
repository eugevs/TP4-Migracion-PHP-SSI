<?php
$titulo_pagina = 'Iniciar sesión';
$descripcion_pagina = 'Iniciá sesión en Explorando lugares para guardar tus rutas, ver tu perfil y compartir tus experiencias al aire libre.';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>
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
              <a class="link-dark" href="registro.php">Registrarse</a>
            </p>
          </form>
        </div>
      </section>
    </main>
<?php require_once 'includes/footer.php'; ?>