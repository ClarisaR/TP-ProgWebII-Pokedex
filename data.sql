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
                 ('Eléctrico'),
                 ('Volador'),
                 ('Hielo'),
                 ('Lucha'),
                 ('Fantasma'),
                 ('Tierra'),
                 ('Bicho'),
                 ('Dragón'),
                 ('Hada'),
                 ('Normal'),
                 ('Veneno'),
                 ('Psíquico'),
                 ('Roca'),
                 ('Acero');

--tabla intermedia
CREATE TABLE Pokemon_Tipo (
      pokemon_id INT,
      tipo_id INT,
      PRIMARY KEY (pokemon_id, tipo_id),
      FOREIGN KEY (pokemon_id) REFERENCES pokemon(id) ON DELETE CASCADE,
      FOREIGN KEY (tipo_id) REFERENCES tipo(id) ON DELETE CASCADE
);


-- Tabla Pokemon
CREATE TABLE Pokemon (
        id INT AUTO_INCREMENT PRIMARY KEY,
        numero_identificador INT NOT NULL UNIQUE,
        imagen VARCHAR(255) NOT NULL ,
        nombre VARCHAR(100) NOT NULL,
        descripcion TEXT NOT NULL ,
        habilidades VARCHAR(100) NOT NULL,
        peso FLOAT NOT NULL,
        altura FLOAT NOT NULL
);