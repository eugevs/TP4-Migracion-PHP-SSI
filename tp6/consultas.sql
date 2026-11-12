USE explorando_lugares;

-- ========== CREATE ==========
INSERT INTO roles (nombre) VALUES ('admin'), ('visitante');
INSERT INTO provincias (nombre) VALUES ('Salta'), ('Jujuy');
INSERT INTO categorias (nombre) VALUES ('Trekking'), ('Cultural');
INSERT INTO equipamiento (nombre) VALUES
  ('Botas de trekking'), ('Bastones'), ('Protector solar');

INSERT INTO usuarios (rol_id, nombre, apellido, email, password) VALUES
  (1, 'Admin', 'Sitio', 'admin@ejemplo.com', 'hash_de_prueba_1'),
  (2, 'Ana', 'Gómez', 'ana@ejemplo.com', 'hash_de_prueba_2');

INSERT INTO rutas (usuario_id, provincia_id, categoria_id, nombre, descripcion, dificultad, distancia_km) VALUES
  (1, 2, 1, 'Quebrada de Humahuaca', 'Recorrido por quebradas y pueblos andinos.', 'Media', 12.50),
  (1, 1, 2, 'Cafayate', 'Paseo entre bodegas y formaciones rocosas.', 'Baja', 5.00);

INSERT INTO ruta_equipamiento (ruta_id, equipamiento_id) VALUES
  (1, 1), (1, 2), (1, 3), (2, 3);

-- ========== READ ==========
-- WHERE + ORDER BY
SELECT nombre, dificultad, distancia_km
FROM rutas
WHERE dificultad = 'Media'
ORDER BY nombre ASC;

-- INNER JOIN de cuatro tablas
SELECT r.nombre AS ruta,
       p.nombre AS provincia,
       c.nombre AS categoria,
       CONCAT(u.nombre, ' ', u.apellido) AS autor
FROM rutas r
INNER JOIN provincias p ON r.provincia_id = p.id
INNER JOIN categorias c ON r.categoria_id = c.id
INNER JOIN usuarios u   ON r.usuario_id = u.id;

-- INNER JOIN con la tabla N:M
SELECT r.nombre AS ruta, e.nombre AS equipamiento
FROM ruta_equipamiento re
INNER JOIN rutas r        ON re.ruta_id = r.id
INNER JOIN equipamiento e ON re.equipamiento_id = e.id
ORDER BY r.nombre;

-- ========== UPDATE ==========
UPDATE rutas
SET dificultad = 'Alta'
WHERE nombre = 'Quebrada de Humahuaca';

-- ========== DELETE ==========
INSERT INTO rutas (usuario_id, provincia_id, categoria_id, nombre, dificultad)
VALUES (1, 1, 1, 'Ruta de prueba', 'Baja');

DELETE FROM rutas
WHERE nombre = 'Ruta de prueba';