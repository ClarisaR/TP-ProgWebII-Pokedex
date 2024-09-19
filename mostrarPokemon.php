<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid mt-4">
        <?php include_once('header.php'); ?>

        <main class="container-lg">
            <?php
            require_once('GestorDePokemones.php');
            $gestorDePokemones = GestorDePokemones::getGestorDePokemones();

            if(!isset($_GET['id'])){
                header('Location: index.php');
            }

            $pokemon = $gestorDePokemones->obtenerPokemon($_GET['id']);
            $tipo = $gestorDePokemones->obtenerTipos();
            if ($pokemon != null) {
                echo '<div class="row">';
                echo '<div class="col-12 col-md-6">';
                echo '<img src="img/pokemons/' . $pokemon['imagen'] . '" alt="imagen" class="img-fluid">';
                echo '</div>';
                echo '<div class="col-12 col-md-6">';
                echo '<h2>' . $pokemon['nombre'] . '</h2>';
                echo '<p>' . $pokemon['descripcion'] . '</p>';
                echo '<p><strong>Tipo:</strong> ' . $tipo[$pokemon['id_tipo'] - 1]['nombre'] . '</p>';
                echo '<p><strong>Altura:</strong> ' . $pokemon['altura'] . ' m</p>';
                echo '<p><strong>Peso:</strong> ' . $pokemon['peso'] . ' kg</p>';
                echo '<p><strong>Habilidades:</strong> ' . $pokemon['habilidades'] . '</p>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<h2>No se encontró el pokemon</h2>';
            }
            ?>
        </main>
    </div>

    <?php include_once('footer.php'); ?>
</body>

</html>