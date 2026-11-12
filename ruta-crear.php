<?php
require_once 'config/conexion.php';
require_once 'includes/validar-ruta.php';

$dificultades = ['Baja', 'Media', 'Alta'];
$usuario_id = 1; // Admin de prueba (hasta tener login con sesiones)

$errores = [];
$datos = [
    'nombre' => '', 'descripcion' => '', 'provincia_id' => '',
    'categoria_id' => '', 'dificultad' => 'Media', 'distancia_km' => '',
];

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
            $sql = "INSERT INTO rutas
                      (usuario_id, provincia_id, categoria_id, nombre, descripcion, dificultad, distancia_km)
                    VALUES
                      (:usuario_id, :provincia_id, :categoria_id, :nombre, :descripcion, :dificultad, :distancia_km)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                ':usuario_id'   => $usuario_id,
                ':provincia_id' => (int)$datos['provincia_id'],
                ':categoria_id' => (int)$datos['categoria_id'],
                ':nombre'       => $datos['nombre'],
                ':descripcion'  => $datos['descripcion'] === '' ? null : $datos['descripcion'],
                ':dificultad'   => $datos['dificultad'],
                ':distancia_km' => $datos['distancia_km'] === '' ? null : $datos['distancia_km'],
            ]);
            header('Location: rutas-admin.php?status=created');
            exit;
        } catch (PDOException $e) {
            error_log('Error al crear ruta: ' . $e->getMessage());
            $errores['general'] = 'No se pudo guardar la ruta. Revisá los datos e intentá de nuevo.';
        }
    }
}

$accion = 'ruta-crear.php';
$textoBoton = 'Guardar ruta';
$titulo_pagina = 'Nueva ruta';
$descripcion_pagina = 'Formulario para agregar una ruta.';
include 'includes/header.php';
include 'includes/nav.php';
?>

<main class="container my-5">
  <h1 class="mb-4">Nueva ruta</h1>
  <?php include 'includes/form-ruta.php'; ?>
</main>

<?php include 'includes/footer.php'; ?>