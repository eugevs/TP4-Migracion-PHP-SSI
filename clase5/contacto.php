<?php
require_once 'funciones.php';

$errores = [];
$exito = false;
$datos = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Capturar y limpiar
    $datos['nombre']  = trim($_POST['nombre']  ?? '');
    $datos['email']   = trim($_POST['email']   ?? '');
    $datos['mensaje'] = trim($_POST['mensaje'] ?? '');

    // Validar
    if (empty($datos['nombre'])) {
        $errores['nombre'] = 'El nombre es obligatorio.';
    }
    if (empty($datos['email'])) {
        $errores['email'] = 'El email es obligatorio.';
    } elseif (!filter_var($datos['email'], FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El formato del email no es válido.';
    }
    if (empty($datos['mensaje'])) {
        $errores['mensaje'] = 'El mensaje es obligatorio.';
    } elseif (strlen($datos['mensaje']) < 10) {
        $errores['mensaje'] = 'El mensaje debe tener al menos 10 caracteres.';
    }

    if (empty($errores)) {
        $exito = true;
        // Acá podrías guardar en archivo/BD. Para el TP alcanza con mostrarlo.
    }
}

$titulo_pagina = 'Contacto';
$descripcion_pagina = 'Formulario de contacto con validación en servidor.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-4">
  <h1>Contacto</h1>

  <?php if ($exito): ?>
    <div class="alert alert-success">
      ¡Gracias, <?= limpiar($datos['nombre']) ?>! Tu mensaje fue enviado correctamente.
    </div>
    <p><strong>Email:</strong> <?= limpiar($datos['email']) ?></p>
    <p><strong>Mensaje:</strong> <?= limpiar($datos['mensaje']) ?></p>
  <?php else: ?>

    <?php if (!empty($errores)): ?>
      <div class="alert alert-danger">Revisá los errores del formulario.</div>
    <?php endif; ?>

    <form method="POST" action="contacto.php" novalidate>
      <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" id="nombre" name="nombre" class="form-control"
               value="<?= valor($datos, 'nombre') ?>">
        <?php if (isset($errores['nombre'])): ?>
          <div class="text-danger"><?= $errores['nombre'] ?></div>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" id="email" name="email" class="form-control"
               value="<?= valor($datos, 'email') ?>">
        <?php if (isset($errores['email'])): ?>
          <div class="text-danger"><?= $errores['email'] ?></div>
        <?php endif; ?>
      </div>

      <div class="mb-3">
        <label for="mensaje" class="form-label">Mensaje</label>
        <textarea id="mensaje" name="mensaje" rows="4"
                  class="form-control"><?= valor($datos, 'mensaje') ?></textarea>
        <?php if (isset($errores['mensaje'])): ?>
          <div class="text-danger"><?= $errores['mensaje'] ?></div>
        <?php endif; ?>
      </div>

      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  <?php endif; ?>
</main>

<?php include 'includes/footer.php'; ?>