<?php
require_once 'config/conexion.php';

// Solo se acepta POST: borrar por GET es inseguro (un link o una imagen podrían dispararlo)
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: rutas-admin.php');
    exit;
}

$id = (int)($_POST['id'] ?? 0);

if ($id > 0) {
    try {
        $stmt = $pdo->prepare("DELETE FROM rutas WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header('Location: rutas-admin.php?status=deleted');
        exit;
    } catch (PDOException $e) {
        error_log('Error al eliminar ruta: ' . $e->getMessage());
        header('Location: rutas-admin.php?status=error');
        exit;
    }
}

header('Location: rutas-admin.php');
exit;