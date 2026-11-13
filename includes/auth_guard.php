<?php
require_once __DIR__ . '/../config/sesion.php';

// 1. ¿Hay sesión iniciada?
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php?error=acceso_denegado');
    exit;
}

// 2. Si la página definió $rol_requerido, se verifica el rol
if (isset($rol_requerido) && ($_SESSION['rol'] ?? '') !== $rol_requerido) {
    header('Location: dashboard.php?error=sin_permiso');
    exit;
}