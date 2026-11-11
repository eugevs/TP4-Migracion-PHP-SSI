<?php
$titulo_pagina = 'Sendero del Cerro Elefante';
$descripcion_pagina = 'Detalles del Sendero del Cerro Elefante en San Lorenzo, Salta: distancia, dificultad, duración aproximada, mapa y comentarios.';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>
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
<?php require_once 'includes/footer.php'; ?>