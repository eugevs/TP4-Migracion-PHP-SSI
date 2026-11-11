<?php
$titulo_pagina = 'Crear cuenta';
$descripcion_pagina = 'Creá tu cuenta en Explorando lugares y empezá a registrar tus rutas, caminatas y experiencias al aire libre.';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>
<main>
      <section class="container py-5">
        <div class="card bg-light col-md-8 col-lg-5 mx-auto">
          <form class="card-body p-4" action="#">
            <h1 class="h3 text-center mb-4">Crear cuenta</h1>

            <div class="mb-3">
              <label for="reg-nombre" class="form-label">Nombre</label>
              <input
                type="text"
                class="form-control"
                id="reg-nombre"
                placeholder="Tu nombre"
                autocomplete="name"
                required
              />
            </div>
            <div class="mb-3">
              <label for="reg-email" class="form-label">Email</label>
              <input
                type="email"
                class="form-control"
                id="reg-email"
                placeholder="nombre@email.com"
                autocomplete="email"
                required
              />
            </div>
            <div class="mb-3">
              <label for="reg-password" class="form-label">Contraseña</label>
              <input
                type="password"
                class="form-control"
                id="reg-password"
                autocomplete="new-password"
                required
              />
            </div>
            <div class="mb-4">
              <label for="reg-password2" class="form-label"
                >Confirmar contraseña</label
              >
              <input
                type="password"
                class="form-control"
                id="reg-password2"
                autocomplete="new-password"
                required
              />
            </div>

            <button type="submit" class="btn btn-dark w-100">
              Crear cuenta
            </button>
            <p class="text-center mt-3 mb-0">
              ¿Ya tenés cuenta?
              <a class="link-dark" href="login.php">Iniciar sesión</a>
            </p>
          </form>
        </div>
      </section>
    </main>
<?php require_once 'includes/footer.php'; ?>