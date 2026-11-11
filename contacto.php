<?php
$titulo_pagina = 'Contacto';
$descripcion_pagina = 'Escribinos tu consulta o sugerencia sobre rutas, caminatas y equipamiento. Completá el formulario de contacto de Explorando lugares.';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>
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
<?php require_once 'includes/footer.php'; ?>