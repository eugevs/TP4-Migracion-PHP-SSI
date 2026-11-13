<?php
// Inicia la sesión una sola vez, con cookie endurecida
if (session_status() === PHP_SESSION_NONE) {
    ini_set('session.use_strict_mode', '1');
    ini_set('session.use_only_cookies', '1');
    session_set_cookie_params([
        'lifetime' => 0,                       // se borra al cerrar el navegador
        'path'     => '/',
        'httponly' => true,                    // JavaScript no puede leer la cookie
        'samesite' => 'Lax',                   // mitiga CSRF
        'secure'   => !empty($_SERVER['HTTPS']) // solo HTTPS cuando exista
    ]);
    session_start();
}