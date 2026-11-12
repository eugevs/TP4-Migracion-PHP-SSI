     <footer class="bg-dark text-white py-4">
      <div class="container text-center">
        <ul class="list-inline mb-2">
          <li class="list-inline-item"><a class="link-light" href="galeria.php">Galería</a></li>
          <li class="list-inline-item"><a class="link-light" href="nosotros.php">Sobre el sitio</a></li>
          <li class="list-inline-item"><a class="link-light" href="perfil.php">Mi perfil</a></li>
        </ul>
        <p class="mb-1">
          Contacto:
          <a class="link-light" href="mailto:<?= htmlspecialchars(APP_EMAIL) ?>"><?= htmlspecialchars(APP_EMAIL) ?></a>
        </p>
        <p class="mb-0">© <?= date('Y') ?> <?= htmlspecialchars(APP_NAME) ?>. Todos los derechos reservados.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>