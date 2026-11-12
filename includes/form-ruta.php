<?php
// Espera: $datos, $errores, $provincias, $categorias, $dificultades, $accion, $textoBoton
?>
<?php if (isset($errores['general'])): ?>
  <div class="alert alert-danger"><?= htmlspecialchars($errores['general']) ?></div>
<?php elseif (!empty($errores)): ?>
  <div class="alert alert-danger">Revisá los errores del formulario.</div>
<?php endif; ?>

<form method="POST" action="<?= htmlspecialchars($accion) ?>" novalidate>
  <?php if (isset($datos['id'])): ?>
    <input type="hidden" name="id" value="<?= (int)$datos['id'] ?>">
  <?php endif; ?>

  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre</label>
    <input type="text" id="nombre" name="nombre" class="form-control"
           value="<?= htmlspecialchars($datos['nombre'] ?? '') ?>">
    <?php if (isset($errores['nombre'])): ?>
      <div class="text-danger"><?= htmlspecialchars($errores['nombre']) ?></div>
    <?php endif; ?>
  </div>

  <div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea id="descripcion" name="descripcion" rows="3"
              class="form-control"><?= htmlspecialchars($datos['descripcion'] ?? '') ?></textarea>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="provincia_id" class="form-label">Provincia</label>
      <select id="provincia_id" name="provincia_id" class="form-select">
        <option value="">Elegí una provincia</option>
        <?php foreach ($provincias as $p): ?>
          <option value="<?= (int)$p['id'] ?>"
            <?= ((int)($datos['provincia_id'] ?? 0) === (int)$p['id']) ? 'selected' : '' ?>>
            <?= htmlspecialchars($p['nombre']) ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php if (isset($errores['provincia_id'])): ?>
        <div class="text-danger"><?= htmlspecialchars($errores['provincia_id']) ?></div>
      <?php endif; ?>
    </div>

    <div class="col-md-6 mb-3">
      <label for="categoria_id" class="form-label">Categoría</label>
      <select id="categoria_id" name="categoria_id" class="form-select">
        <option value="">Elegí una categoría</option>
        <?php foreach ($categorias as $c): ?>
          <option value="<?= (int)$c['id'] ?>"
            <?= ((int)($datos['categoria_id'] ?? 0) === (int)$c['id']) ? 'selected' : '' ?>>
            <?= htmlspecialchars($c['nombre']) ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php if (isset($errores['categoria_id'])): ?>
        <div class="text-danger"><?= htmlspecialchars($errores['categoria_id']) ?></div>
      <?php endif; ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="dificultad" class="form-label">Dificultad</label>
      <select id="dificultad" name="dificultad" class="form-select">
        <?php foreach ($dificultades as $d): ?>
          <option value="<?= htmlspecialchars($d) ?>"
            <?= (($datos['dificultad'] ?? 'Media') === $d) ? 'selected' : '' ?>>
            <?= htmlspecialchars($d) ?>
          </option>
        <?php endforeach; ?>
      </select>
      <?php if (isset($errores['dificultad'])): ?>
        <div class="text-danger"><?= htmlspecialchars($errores['dificultad']) ?></div>
      <?php endif; ?>
    </div>

    <div class="col-md-6 mb-3">
      <label for="distancia_km" class="form-label">Distancia (km)</label>
      <input type="text" id="distancia_km" name="distancia_km" class="form-control"
             value="<?= htmlspecialchars((string)($datos['distancia_km'] ?? '')) ?>">
      <?php if (isset($errores['distancia_km'])): ?>
        <div class="text-danger"><?= htmlspecialchars($errores['distancia_km']) ?></div>
      <?php endif; ?>
    </div>
  </div>

  <button type="submit" class="btn btn-primary"><?= htmlspecialchars($textoBoton) ?></button>
  <a href="rutas-admin.php" class="btn btn-outline-secondary">Cancelar</a>
</form>