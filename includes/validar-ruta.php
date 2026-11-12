<?php
function validar_ruta(array $d, array $dificultades): array
{
    $e = [];

    if ($d['nombre'] === '') {
        $e['nombre'] = 'El nombre es obligatorio.';
    } elseif (mb_strlen($d['nombre']) > 120) {
        $e['nombre'] = 'El nombre no puede superar los 120 caracteres.';
    }

    if (!ctype_digit((string)$d['provincia_id']) || (int)$d['provincia_id'] < 1) {
        $e['provincia_id'] = 'Elegí una provincia.';
    }

    if (!ctype_digit((string)$d['categoria_id']) || (int)$d['categoria_id'] < 1) {
        $e['categoria_id'] = 'Elegí una categoría.';
    }

    if (!in_array($d['dificultad'], $dificultades, true)) {
        $e['dificultad'] = 'La dificultad elegida no es válida.';
    }

    if ($d['distancia_km'] !== '') {
        if (!is_numeric($d['distancia_km']) || $d['distancia_km'] < 0 || $d['distancia_km'] > 999.99) {
            $e['distancia_km'] = 'Ingresá un número entre 0 y 999.99.';
        }
    }

    return $e;
}