-- Crear base de datos
CREATE DATABASE pokedex;

-- Tabla Usuarios
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Tabla Tipos
CREATE TABLE tipos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL
);

-- Tabla Pokemons
CREATE TABLE pokemons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_identificador INT NOT NULL UNIQUE,
    nombre VARCHAR(100) NOT NULL,
    tipo_id INT,
    descripcion TEXT,
    imagen VARCHAR(255),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tipo_id) REFERENCES tipos(id)
);