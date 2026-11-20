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


// ---------- Protección CSRF ----------
function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function csrf_campo(): string
{
    return '<input type="hidden" name="csrf" value="' . htmlspecialchars(csrf_token()) . '">';
}

function csrf_valido(): bool
{
    return isset($_POST['csrf'], $_SESSION['csrf'])
        && hash_equals($_SESSION['csrf'], (string)$_POST['csrf']);
}