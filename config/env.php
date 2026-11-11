<?php
// Lee las variables del archivo .env (en la raíz del proyecto)
$ruta_env = __DIR__ . '/../.env';
$env = file_exists($ruta_env) ? parse_ini_file($ruta_env) : [];

define('APP_NAME', $env['APP_NAME'] ?? 'Mi aplicación');
define('APP_EMAIL', $env['APP_EMAIL'] ?? 'sin-correo@ejemplo.com');
define('APP_ENV', $env['APP_ENV'] ?? 'local');

$nombre_sitio = APP_NAME;