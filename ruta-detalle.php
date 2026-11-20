<?php
require_once 'config/sesion.php';
require_once 'config/conexion.php';

$id = filter_var($_GET['id'] ?? '', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if ($id === false) {
    header('Location: explorar.php');
    exit;
}

$logueado = isset($_SESSION['usuario_id']);
$uid = $logueado ? (int)$_SESSION['usuario_id'] : 0;

// 1) Datos de la ruta
$sql = "SELECT r.id, r.nombre, r.descripcion, r.dificultad, r.distancia_km,
               p.nombre AS provincia, c.nombre AS categoria
        FROM rutas r
        INNER JOIN provincias p ON r.provincia_id = p.id
        INNER JOIN categorias c ON r.categoria_id = c.id
        WHERE r.id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $id]);
$ruta = $stmt->fetch();

if (!$ruta) {
    http_response_code(404);
    $titulo_pagina = 'Ruta no encontrada';
    $descripcion_pagina = 'La ruta solicitada no existe.';
    include 'includes/header.php';
    include 'includes/nav.php';
    echo '<main class="container my-5"><h1>Ruta no encontrada</h1>'
       . '<p>La ruta que buscás no existe o fue eliminada.</p>'
       . '<a href="explorar.php" class="btn btn-primary">Ver todas las rutas</a></main>';
    include 'includes/footer.php';
    exit;
}

// 2) Acciones del formulario (solo usuarios logueados)
$textoComentario = '';
$errorComentario = '';
$errorGeneral = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$logueado) {
        header('Location: login.php?error=acceso_denegado');
        exit;
    }

    if (!csrf_valido()) {
        http_response_code(403);
        $errorGeneral = 'El formulario venció. Recargá la página e intentá de nuevo.';
    } else {
        $accion = $_POST['accion'] ?? '';

        try {
            if ($accion === 'comentar') {
                $textoComentario = trim($_POST['contenido'] ?? '');

                if ($textoComentario === '') {
                    $errorComentario = 'Escribí un comentario antes de enviar.';
                } elseif (mb_strlen($textoComentario) > 500) {
                    $errorComentario = 'El comentario no puede superar los 500 caracteres.';
                } else {
                    $stmt = $pdo->prepare(
                        "INSERT INTO comentarios (ruta_id, usuario_id, contenido)
                         VALUES (:ruta_id, :usuario_id, :contenido)"
                    );
                    $stmt->execute([
                        ':ruta_id'    => $id,
                        ':usuario_id' => $uid,
                        ':contenido'  => $textoComentario,
                    ]);
                    header('Location: ruta-detalle.php?id=' . $id . '&ok=comentario#comentarios');
                    exit;
                }
            } elseif ($accion === 'completar') {
                $stmt = $pdo->prepare(
                    "INSERT IGNORE INTO rutas_realizadas (usuario_id, ruta_id) VALUES (:u, :r)"
                );
                $stmt->execute([':u' => $uid, ':r' => $id]);
                header('Location: ruta-detalle.php?id=' . $id . '&ok=completada');
                exit;
            } elseif ($accion === 'quitar') {
                $stmt = $pdo->prepare(
                    "DELETE FROM rutas_realizadas WHERE usuario_id = :u AND ruta_id = :r"
                );
                $stmt->execute([':u' => $uid, ':r' => $id]);
                header('Location: ruta-detalle.php?id=' . $id . '&ok=quitada');
                exit;
            }
        } catch (PDOException $e) {
            error_log('Error en ruta-detalle: ' . $e->getMessage());
            $errorGeneral = 'No se pudo completar la acción. Intentá de nuevo.';
        }
    }
}

// 3) Comentarios y datos de actividad
$stmt = $pdo->prepare(
    "SELECT c.contenido, c.created_at, u.nombre
     FROM comentarios c
     INNER JOIN usuarios u ON c.usuario_id = u.id
     WHERE c.ruta_id = :id
     ORDER BY c.created_at DESC, c.id DESC"
);
$stmt->execute([':id' => $id]);
$comentarios = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT COUNT(*) FROM rutas_realizadas WHERE ruta_id = :id");
$stmt->execute([':id' => $id]);
$totalCompletadas = (int)$stmt->fetchColumn();

$yaCompletada = false;
if ($logueado) {
    $stmt = $pdo->prepare("SELECT 1 FROM rutas_realizadas WHERE usuario_id = :u AND ruta_id = :r");
    $stmt->execute([':u' => $uid, ':r' => $id]);
    $yaCompletada = (bool)$stmt->fetchColumn();
}

$avisos = [
    'comentario' => '¡Gracias! Tu comentario fue publicado.',
    'completada' => '¡Ruta marcada como completada! Ya suma en tu perfil.',
    'quitada'    => 'Quitaste esta ruta de tus completadas.',
];
$aviso = $avisos[$_GET['ok'] ?? ''] ?? '';

$titulo_pagina = $ruta['nombre'];
$descripcion_pagina = mb_substr((string)$ruta['descripcion'], 0, 150) ?: 'Ficha de la ruta.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-5">
  <a href="explorar.php" class="btn btn-outline-secondary btn-sm mb-4">← Volver a las rutas</a>

  <?php if ($aviso !== ''): ?>
    <div class="alert alert-success"><?= htmlspecialchars($aviso) ?></div>
  <?php endif; ?>
  <?php if ($errorGeneral !== ''): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($errorGeneral) ?></div>
  <?php endif; ?>

  <article>
    <h1 class="mb-3"><?= htmlspecialchars($ruta['nombre']) ?></h1>

    <p class="mb-3">
      <span class="badge bg-dark"><?= htmlspecialchars($ruta['provincia']) ?></span>
      <span class="badge bg-dark"><?= htmlspecialchars($ruta['categoria']) ?></span>
      <span class="badge bg-dark">Dificultad: <?= htmlspecialchars($ruta['dificultad']) ?></span>
      <?php if ($ruta['distancia_km'] !== null): ?>
        <span class="badge bg-dark"><?= htmlspecialchars((string)$ruta['distancia_km']) ?> km</span>
      <?php endif; ?>
    </p>

    <p class="lead">
      <?= nl2br(htmlspecialchars($ruta['descripcion'] ?? 'Esta ruta todavía no tiene descripción.')) ?>
    </p>

    <p class="text-muted">
      <?= $totalCompletadas ?> <?= $totalCompletadas === 1 ? 'persona completó' : 'personas completaron' ?> esta ruta.
    </p>

    <?php if ($logueado): ?>
      <form method="POST" action="ruta-detalle.php?id=<?= (int)$ruta['id'] ?>">
        <?= csrf_campo() ?>
        <?php if ($yaCompletada): ?>
          <input type="hidden" name="accion" value="quitar">
          <span class="me-2">✔ Ya completaste esta ruta.</span>
          <button type="submit" class="btn btn-outline-secondary btn-sm">Quitar de mis completadas</button>
        <?php else: ?>
          <input type="hidden" name="accion" value="completar">
          <button type="submit" class="btn btn-primary">Marcar como completada</button>
        <?php endif; ?>
      </form>
    <?php else: ?>
      <p><a href="login.php">Iniciá sesión</a> para marcar esta ruta como completada.</p>
    <?php endif; ?>
  </article>

  <section id="comentarios" class="mt-5">
    <h2 class="h4 mb-3">Comentarios (<?= count($comentarios) ?>)</h2>

    <?php if ($logueado): ?>
      <form method="POST" action="ruta-detalle.php?id=<?= (int)$ruta['id'] ?>#comentarios" class="mb-4" novalidate>
        <?= csrf_campo() ?>
        <input type="hidden" name="accion" value="comentar">
        <label for="contenido" class="form-label">
          Dejá tu comentario como <strong><?= htmlspecialchars($_SESSION['usuario_nombre']) ?></strong>
        </label>
        <textarea id="contenido" name="contenido" rows="3" maxlength="500"
                  class="form-control"><?= htmlspecialchars($textoComentario) ?></textarea>
        <?php if ($errorComentario !== ''): ?>
          <div class="text-danger mt-1"><?= htmlspecialchars($errorComentario) ?></div>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary mt-2">Publicar comentario</button>
      </form>
    <?php else: ?>
      <div class="alert alert-info">
        <a href="login.php">Iniciá sesión</a> o <a href="registro.php">creá una cuenta</a> para comentar.
      </div>
    <?php endif; ?>

    <?php if (empty($comentarios)): ?>
      <p class="text-muted">Todavía no hay comentarios. ¡Sé la primera persona en comentar!</p>
    <?php endif; ?>

    <?php foreach ($comentarios as $c): ?>
      <div class="card mb-3">
        <div class="card-body">
          <div class="d-flex justify-content-between flex-wrap gap-1">
            <strong><?= htmlspecialchars($c['nombre']) ?></strong>
            <small class="text-muted">
              <?= htmlspecialchars(date('d/m/Y H:i', strtotime($c['created_at']))) ?>
            </small>
          </div>
          <p class="mb-0 mt-2"><?= nl2br(htmlspecialchars($c['contenido'])) ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </section>
</main>

<?php include 'includes/footer.php'; ?>