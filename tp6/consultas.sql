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

-- ===== Las 23 provincias argentinas =====
INSERT IGNORE INTO provincias (nombre) VALUES
  ('Buenos Aires'), ('Catamarca'), ('Chaco'), ('Chubut'), ('Córdoba'),
  ('Corrientes'), ('Entre Ríos'), ('Formosa'), ('Jujuy'), ('La Pampa'),
  ('La Rioja'), ('Mendoza'), ('Misiones'), ('Neuquén'), ('Río Negro'),
  ('Salta'), ('San Juan'), ('San Luis'), ('Santa Cruz'), ('Santa Fe'),
  ('Santiago del Estero'), ('Tierra del Fuego'), ('Tucumán');

INSERT IGNORE INTO categorias (nombre) VALUES ('Naturaleza'), ('Aventura');

-- ===== Rutas de ejemplo (distancias aproximadas: revisalas y ajustalas) =====
INSERT INTO rutas (usuario_id, provincia_id, categoria_id, nombre, descripcion, dificultad, distancia_km) VALUES
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Salta'), (SELECT id FROM categorias WHERE nombre='Naturaleza'),
 'Cerro San Bernardo', 'Sendero con vista panorámica de la ciudad de Salta.', 'Baja', 2.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Salta'), (SELECT id FROM categorias WHERE nombre='Naturaleza'),
 'Quebrada de las Conchas', 'Formaciones rocosas de colores intensos con miradores sobre la ruta.', 'Baja', 6.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Salta'), (SELECT id FROM categorias WHERE nombre='Naturaleza'),
 'Parque Nacional Los Cardones', 'Cardones gigantes junto a la Cuesta del Obispo.', 'Baja', 5.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Salta'), (SELECT id FROM categorias WHERE nombre='Cultural'),
 'Cachi', 'Pueblo de calles de adobe, iglesia y miradores de los Valles Calchaquíes.', 'Baja', 3.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Jujuy'), (SELECT id FROM categorias WHERE nombre='Naturaleza'),
 'Salinas Grandes', 'Gran salar de la puna, ideal para fotografía y caminatas cortas.', 'Baja', 2.50),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Jujuy'), (SELECT id FROM categorias WHERE nombre='Naturaleza'),
 'Cerro de los Siete Colores', 'Paseo de los Colorados con vista al cerro de Purmamarca.', 'Baja', 3.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Tucumán'), (SELECT id FROM categorias WHERE nombre='Cultural'),
 'Ruinas de Quilmes', 'Sitio arqueológico de los valles calchaquíes con recorrido guiado.', 'Baja', 3.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Misiones'), (SELECT id FROM categorias WHERE nombre='Naturaleza'),
 'Cataratas del Iguazú', 'Circuitos de pasarelas entre selva y saltos de agua.', 'Baja', 8.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='La Rioja'), (SELECT id FROM categorias WHERE nombre='Naturaleza'),
 'Cañón de Talampaya', 'Paredones rojos y formaciones de roca en un parque nacional.', 'Media', 15.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Catamarca'), (SELECT id FROM categorias WHERE nombre='Aventura'),
 'Campo de Piedra Pómez', 'Paisaje volcánico de formas esculpidas por el viento.', 'Media', 10.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Córdoba'), (SELECT id FROM categorias WHERE nombre='Trekking'),
 'Cerro Champaquí', 'Ascenso exigente al punto más alto de las sierras de Córdoba.', 'Alta', 22.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Mendoza'), (SELECT id FROM categorias WHERE nombre='Naturaleza'),
 'Laguna de Horcones', 'Sendero corto con vista al Aconcagua.', 'Baja', 4.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Santa Cruz'), (SELECT id FROM categorias WHERE nombre='Trekking'),
 'Laguna de los Tres', 'Caminata clásica de El Chaltén frente al Fitz Roy.', 'Alta', 20.00),
((SELECT MIN(id) FROM usuarios), (SELECT id FROM provincias WHERE nombre='Tierra del Fuego'), (SELECT id FROM categorias WHERE nombre='Naturaleza'),
 'Senda Costera', 'Sendero junto al canal Beagle dentro del parque nacional.', 'Baja', 8.00);