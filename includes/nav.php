<?php
$pagina_actual = basename($_SERVER['PHP_SELF']);

function nav_item(string $archivo, string $texto, string $pagina_actual): void
{
    $activo = ($archivo === $pagina_actual);
    $clase = $activo ? 'nav-link active' : 'nav-link';
    $aria = $activo ? ' aria-current="page"' : '';
    echo '<li class="nav-item"><a class="' . $clase . '" href="' . $archivo . '"' . $aria . '>' . $texto . '</a></li>';
}
?>
    <header>
      <nav class="navbar navbar-expand-lg bg-white border-bottom" aria-label="Principal">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><?= htmlspecialchars(APP_NAME) ?></a>
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
              <?php nav_item('index.php', 'Inicio', $pagina_actual); ?>
              <?php nav_item('ruta-detalle.php', 'Rutas', $pagina_actual); ?>
              <?php nav_item('caminatas.php', 'Caminatas', $pagina_actual); ?>
              <?php nav_item('equipamiento.php', 'Equipamiento', $pagina_actual); ?>
              <?php nav_item('contacto.php', 'Contacto', $pagina_actual); ?>
              <?php nav_item('explorar.php', 'Explorar', $pagina_actual); ?>
              <?php if (($_SESSION['rol'] ?? '') === 'admin'): ?>
                <?php nav_item('rutas-admin.php', 'Administrar', $pagina_actual); ?>
                <?php nav_item('admin_panel.php', 'Usuarios', $pagina_actual); ?>
              <?php endif; ?>

              <?php if (isset($_SESSION['usuario_id'])): ?>
                <li class="nav-item ms-lg-3 my-1 my-lg-0">
                  <a class="btn btn-outline-dark" href="dashboard.php">
                    Hola, <?= htmlspecialchars($_SESSION['usuario_nombre']) ?>
                  </a>
                </li>
                <li class="nav-item my-1 my-lg-0">
                  <a class="btn btn-dark ms-lg-2" href="logout.php">Cerrar sesión</a>
                </li>
              <?php else: ?>
                <li class="nav-item ms-lg-3 my-1 my-lg-0">
                  <a class="btn btn-outline-dark" href="login.php">Iniciar sesión</a>
                </li>
                <li class="nav-item my-1 my-lg-0">
                  <a class="btn btn-dark ms-lg-2" href="registro.php">Crear cuenta</a>
                </li>
              <?php endif; ?>
            </ul>
          </div>
        </div>
      </nav>
    </header>