<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid d-flex flex-column min-vh-100">
    <?php include_once('components/header.php'); ?>
    <main class="flex-grow-1 row mt-4 justify-content-center">
        <?php

        require_once('classes/GestorDePokemones.php');

        $gestorDePokemones = GestorDePokemones::getGestorDePokemones();

        if (!isset($_GET['id'])) header('Location: index.php');

        $pokemon = $gestorDePokemones->obtenerPokemon($_GET['id']);

        ?>
        <div class="col-12 col-md-5 d-flex align-items-center justify-content-center">
            <img class="w-75 m-auto rounded bg-white" src="<?php echo "images/pokemons/" . $pokemon['imagen'] ?>"
                 alt="<?php echo $pokemon['nombre'] ?>"/>
        </div>
        <article class="col-12 col-md-5 p-5">
            <header class="d-flex justify-content-center align-items-center">
                <img style="width: 35px; height: 35px" class="m-0"
                     src="<?php echo "images/tipos/" . $pokemon['id_tipo'] . ".svg" ?>" alt=""/>
                <h1 class="ml-4"><?php echo $pokemon['nombre'] ?></h1>
            </header>
            <main>
                <div class="d-flex justify-content-center align-items-start mt-4 text-center flex-wrap">
                    <p class="flex-grow-1">Peso:<span class="font-weight-light"> <?php echo $pokemon['peso'] ?></span></p>
                    <p class="flex-grow-1">Altura:<span class="font-weight-light"> <?php echo $pokemon['altura'] ?></span></p>
                    <p class="flex-grow-1">Habilidades:<san class="font-weight-light"> <?php echo $pokemon['habilidades'] ?></san></p>
                </div>
                <p class="mt-4"><?php echo $pokemon['descripcion'] ?></p>
            </main>
            <aside class="mt-5 text-center">
                <a href="index.php">
                    <button class="btn btn-light px-4">Ver todos</button>
                </a>
            </aside>
        </article>
    </main>
    <?php include_once('components/footer.php'); ?>
</div>
</body>
</html>