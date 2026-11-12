CREATE DATABASE IF NOT EXISTS explorando_lugares
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE explorando_lugares;

CREATE TABLE roles (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(30) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  rol_id INT NOT NULL,
  nombre VARCHAR(60) NOT NULL,
  apellido VARCHAR(60) NOT NULL,
  email VARCHAR(120) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  telefono VARCHAR(20) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_usuarios_roles
    FOREIGN KEY (rol_id) REFERENCES roles(id)
) ENGINE=InnoDB;

CREATE TABLE provincias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(60) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE categorias (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(60) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE equipamiento (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nombre VARCHAR(80) NOT NULL UNIQUE
) ENGINE=InnoDB;

CREATE TABLE rutas (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT NOT NULL,
  provincia_id INT NOT NULL,
  categoria_id INT NOT NULL,
  nombre VARCHAR(120) NOT NULL,
  descripcion TEXT NULL,
  dificultad ENUM('Baja','Media','Alta') NOT NULL DEFAULT 'Media',
  distancia_km DECIMAL(5,2) NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  CONSTRAINT fk_rutas_usuarios
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
  CONSTRAINT fk_rutas_provincias
    FOREIGN KEY (provincia_id) REFERENCES provincias(id),
  CONSTRAINT fk_rutas_categorias
    FOREIGN KEY (categoria_id) REFERENCES categorias(id)
) ENGINE=InnoDB;

CREATE TABLE ruta_equipamiento (
  ruta_id INT NOT NULL,
  equipamiento_id INT NOT NULL,
  PRIMARY KEY (ruta_id, equipamiento_id),
  CONSTRAINT fk_re_rutas
    FOREIGN KEY (ruta_id) REFERENCES rutas(id) ON DELETE CASCADE,
  CONSTRAINT fk_re_equipamiento
    FOREIGN KEY (equipamiento_id) REFERENCES equipamiento(id)
) ENGINE=InnoDB;

-- Índices explícitos (búsqueda por nombre y filtro por dificultad)
CREATE INDEX idx_rutas_nombre ON rutas(nombre);
CREATE INDEX idx_rutas_dificultad ON rutas(dificultad);