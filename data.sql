CREATE DATABASE pokedex;

-- Tabla Usuario
CREATE TABLE Usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    contrasenia VARCHAR(255) NOT NULL
);

-- Tabla Tipo
CREATE TABLE Tipo (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nombre VARCHAR(50) NOT NULL
);

INSERT INTO Tipo (nombre) VALUES
                 ('Fuego'),
                 ('Agua'),
                 ('Planta'),
                 ('Tierra');

--tabla intermedia

-- Tabla Pokemon
CREATE TABLE Pokemon (
        id INT AUTO_INCREMENT PRIMARY KEY,
        numero_identificador INT NOT NULL UNIQUE,
        id_tipo INT NOT NULL,
        imagen VARCHAR(255) NOT NULL ,
        nombre VARCHAR(100) NOT NULL,
        descripcion TEXT NOT NULL ,
        habilidades VARCHAR(100) NOT NULL,
        peso FLOAT NOT NULL,
        altura FLOAT NOT NULL,
        FOREIGN KEY (id_tipo) REFERENCES Tipo(id)
);