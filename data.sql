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

INSERT INTO Pokemon (numero_identificador, id_tipo, imagen, nombre, descripcion, habilidades, peso, altura) VALUES
(1, 1, 'img/pokemons/charizard.png', 'Charizard', 'Un Pokémon de tipo Fuego/Volador, conocido por su aspecto de dragón.', 'Llamarada, Vuelo', 90.5, 1.7),
(2, 2, 'img/pokemons/squirtle.png', 'Squirtle', 'Un Pokémon de tipo Agua, conocido por su caparazón duro y su habilidad en el agua.', 'Chorro de Agua, Mordisco', 9.0, 0.5),
(3, 3, 'img/pokemons/bulbasaur.png', 'Bulbasaur', 'Un Pokémon de tipo Planta/Veneno, conocido por la planta en su espalda.', 'Hoja Afilada, Drenadoras', 6.9, 0.7),
(4, 4, 'img/pokemons/groundon.png', 'Groudon', 'Un Pokémon de tipo Tierra, conocido por su habilidad para controlar la tierra y el magma.', 'Terremoto, Roca Afilada', 209.0, 3.5),
(5, 1, 'img/pokemons/ponyta.png', 'Ponyta', 'Un Pokémon de tipo Fuego, conocido por su capacidad de correr a gran velocidad y su cuerpo en llamas.', 'Llamarada, Carrera Rápida', 30.0, 0.8);
