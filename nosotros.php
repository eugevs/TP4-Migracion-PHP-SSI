<?php
$titulo_pagina = 'Sobre el sitio';
$descripcion_pagina = 'Conocé Explorando lugares: un espacio para compartir rutas en bici, caminatas y experiencias al aire libre con la comunidad.';
require_once 'includes/header.php';
require_once 'includes/nav.php';
?>
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
<?php require_once 'includes/footer.php'; ?>