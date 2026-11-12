<?php
// Limpia un texto para mostrarlo de forma segura (previene XSS)
function limpiar(string $dato): string {
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

// Devuelve el valor previo de un campo (persistencia), ya sanitizado
function valor(array $datos, string $campo): string {
    return isset($datos[$campo]) ? limpiar($datos[$campo]) : '';
}