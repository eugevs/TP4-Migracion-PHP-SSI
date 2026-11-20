<?php
// Front controller: protege el acceso y decide qué acción del controlador ejecutar
$rol_requerido = 'admin';
require_once 'includes/auth_guard.php'; // inicia sesión y exige rol admin
require_once 'config/conexion.php';
require_once 'app/Controllers/RutaController.php';

$controlador = new RutaController($pdo);
$accion = $_GET['accion'] ?? 'listar';

switch ($accion) {
    case 'crear':
        $controlador->crear();
        break;
    case 'editar':
        $controlador->editar();
        break;
    case 'eliminar':
        $controlador->eliminar();
        break;
    default:
        $controlador->index();
}