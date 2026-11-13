<?php
$rol_requerido = 'admin';
require_once 'includes/auth_guard.php';
require_once 'config/conexion.php';
require_once 'includes/validar-ruta.php';

$dificultades = ['Baja', 'Media', 'Alta'];
$errores = [];

$id = (int)($_POST['id'] ?? $_GET['id'] ?? 0);
if ($id < 1) {
    header('Location: rutas-admin.php?status=notfound');
    exit;
}

// Cargar la ruta existente
$stmt = $pdo->prepare("SELECT * FROM rutas WHERE id = :id");
$stmt->execute([':id' => $id]);
$datos = $stmt->fetch();
if (!$datos) {
    header('Location: rutas-admin.php?status=notfound');
    exit;
}

$stmt = $pdo->prepare("SELECT id, nombre FROM provincias ORDER BY nombre");
$stmt->execute();
$provincias = $stmt->fetchAll();

$stmt = $pdo->prepare("SELECT id, nombre FROM categorias ORDER BY nombre");
$stmt->execute();
$categorias = $stmt->fetchAll();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos['nombre']       = trim($_POST['nombre'] ?? '');
    $datos['descripcion']  = trim($_POST['descripcion'] ?? '');
    $datos['provincia_id'] = trim($_POST['provincia_id'] ?? '');
    $datos['categoria_id'] = trim($_POST['categoria_id'] ?? '');
    $datos['dificultad']   = trim($_POST['dificultad'] ?? '');
    $datos['distancia_km'] = trim($_POST['distancia_km'] ?? '');

    $errores = validar_ruta($datos, $dificultades);

    if (empty($errores)) {
        try {
            $sql = "UPDATE rutas
                    SET provincia_id = :provincia_id,
                        categoria_id = :categoria_id,
                        nombre = :nombre,
                        descripcion = :descripcion,
                        dificultad = :dificultad,
                        distancia_km = :distancia_km
                    WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':provincia_id' => (int)$datos['provincia_id'],
                ':categoria_id' => (int)$datos['categoria_id'],
                ':nombre'       => $datos['nombre'],
                ':descripcion'  => $datos['descripcion'] === '' ? null : $datos['descripcion'],
                ':dificultad'   => $datos['dificultad'],
                ':distancia_km' => $datos['distancia_km'] === '' ? null : $datos['distancia_km'],
                ':id'           => $id,
            ]);
            header('Location: rutas-admin.php?status=updated');
            exit;
        } catch (PDOException $e) {
            error_log('Error al actualizar ruta: ' . $e->getMessage());
            $errores['general'] = 'No se pudo actualizar la ruta. Revisá los datos e intentá de nuevo.';
        }
    }
}

$accion = 'ruta-editar.php';
$textoBoton = 'Guardar cambios';
$titulo_pagina = 'Editar ruta';
$descripcion_pagina = 'Formulario para editar una ruta.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-5">
  <h1 class="mb-4">Editar ruta</h1>
  <?php include 'includes/form-ruta.php'; ?>
</main>

<?php include 'includes/footer.php'; ?>