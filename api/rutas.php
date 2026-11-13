<?php
header('Content-Type: application/json; charset=utf-8');
require_once __DIR__ . '/../config/conexion.php';

// Envía la respuesta JSON con su código HTTP y corta la ejecución
function responder(int $codigo, array $cuerpo): void
{
    http_response_code($codigo);
    echo json_encode($cuerpo, JSON_UNESCAPED_UNICODE);
    exit;
}

// Solo se aceptan consultas GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    header('Allow: GET');
    responder(405, ['status' => 'error', 'message' => 'Método no permitido.']);
}

// ---------- Detalle de UNA ruta: api/rutas.php?id=1 ----------
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
    if ($id === false) {
        responder(400, ['status' => 'error', 'message' => 'El id debe ser un número entero positivo.']);
    }

    try {
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
            responder(404, ['status' => 'error', 'message' => 'La ruta no existe.']);
        }
        responder(200, ['status' => 'success', 'data' => $ruta]);
    } catch (PDOException $e) {
        error_log('API rutas (detalle): ' . $e->getMessage());
        responder(500, ['status' => 'error', 'message' => 'Error al consultar la base de datos.']);
    }
}

// ---------- Búsqueda: api/rutas.php?q=jujuy&dificultad=Media ----------
$q = trim($_GET['q'] ?? '');
$dificultad = trim($_GET['dificultad'] ?? '');
$dificultades = ['Baja', 'Media', 'Alta'];

if (mb_strlen($q) > 100) {
    responder(400, ['status' => 'error', 'message' => 'La búsqueda no puede superar los 100 caracteres.']);
}
if ($dificultad !== '' && !in_array($dificultad, $dificultades, true)) {
    responder(400, ['status' => 'error', 'message' => 'La dificultad indicada no es válida.']);
}

try {
    // Se escapan % y _ para que se busquen como texto común
    $like = '%' . addcslashes($q, '%_\\') . '%';

    $sql = "SELECT r.id, r.nombre, r.dificultad, r.distancia_km,
                   p.nombre AS provincia, c.nombre AS categoria
            FROM rutas r
            INNER JOIN provincias p ON r.provincia_id = p.id
            INNER JOIN categorias c ON r.categoria_id = c.id
            WHERE (r.nombre LIKE :q1 OR p.nombre LIKE :q2)";
    $params = [':q1' => $like, ':q2' => $like];

    if ($dificultad !== '') {
        $sql .= " AND r.dificultad = :dificultad";
        $params[':dificultad'] = $dificultad;
    }

    $sql .= " ORDER BY r.nombre LIMIT 20";

    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    $rutas = $stmt->fetchAll();

    responder(200, ['status' => 'success', 'total' => count($rutas), 'data' => $rutas]);
} catch (PDOException $e) {
    error_log('API rutas (búsqueda): ' . $e->getMessage());
    responder(500, ['status' => 'error', 'message' => 'Error al consultar la base de datos.']);
}