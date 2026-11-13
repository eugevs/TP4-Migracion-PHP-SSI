<?php
require_once __DIR__ . '/../config/env.php';
require_once __DIR__ . '/../config/sesion.php';
$titulo_pagina = $titulo_pagina ?? 'Inicio';
$descripcion_pagina = $descripcion_pagina ?? '';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= htmlspecialchars($titulo_pagina . ' | ' . APP_NAME) ?></title>
    <meta name="description" content="<?= htmlspecialchars($descripcion_pagina) ?>" />
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🏔️</text></svg>" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body>