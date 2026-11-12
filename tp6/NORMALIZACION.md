# TP6: Normalización del modelo de Explorando Lugares

## Tabla sin normalizar

| id_ruta | nombre_ruta | provincia | categoria | autor | email_autor | equipamiento |
|---|---|---|---|---|---|---|
| 1 | Quebrada de Humahuaca | Jujuy | Trekking | Admin Sitio | admin@ejemplo.com | Botas de trekking, Bastones, Protector solar |
| 2 | Cafayate | Salta | Cultural | Admin Sitio | admin@ejemplo.com | Protector solar |

Problemas: el campo `equipamiento` es multivalorado (varios ítems en una celda) y los datos del autor, la provincia y la categoría se repiten en cada ruta.

## 1FN: campos atómicos

Cada ítem de equipamiento pasa a su propia fila. La clave pasa a ser (id_ruta, equipamiento).

| id_ruta | equipamiento | nombre_ruta | provincia | categoria | autor | email_autor |
|---|---|---|---|---|---|---|
| 1 | Botas de trekking | Quebrada de Humahuaca | Jujuy | Trekking | Admin Sitio | admin@ejemplo.com |
| 1 | Bastones | Quebrada de Humahuaca | Jujuy | Trekking | Admin Sitio | admin@ejemplo.com |
| 1 | Protector solar | Quebrada de Humahuaca | Jujuy | Trekking | Admin Sitio | admin@ejemplo.com |
| 2 | Protector solar | Cafayate | Salta | Cultural | Admin Sitio | admin@ejemplo.com |

## 2FN: sin dependencias parciales

Con la clave (id_ruta, equipamiento), los datos de la ruta (nombre, provincia, categoría, autor) dependen solo de `id_ruta`, es decir, de una parte de la clave. Se separan:

- `rutas` (id_ruta, nombre_ruta, provincia, categoria, autor, email_autor)
- `ruta_equipamiento` (id_ruta, equipamiento)

## 3FN: sin dependencias transitivas

En `rutas`, `email_autor` depende del autor y no de la ruta; provincia y categoría son datos con identidad propia. Se extraen a tablas:

- `usuarios`, `provincias`, `categorias`, `equipamiento`
- `rutas` queda con claves foráneas: usuario_id, provincia_id, categoria_id
- `ruta_equipamiento` queda con (ruta_id, equipamiento_id), ambos FK

## Tablas resultantes

| Tabla | PK | FK |
|---|---|---|
| roles | id | |
| usuarios | id | rol_id → roles.id |
| provincias | id | |
| categorias | id | |
| equipamiento | id | |
| rutas | id | usuario_id → usuarios.id, provincia_id → provincias.id, categoria_id → categorias.id |
| ruta_equipamiento | (ruta_id, equipamiento_id) | ruta_id → rutas.id, equipamiento_id → equipamiento.id |