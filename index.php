<?php
require_once('GestorDePokemones.php');
$gestorDePokemones = GestorDePokemones::getGestorDePokemones();

// Verificar si se realizo una busqueda
if (isset($_POST['buscar-pokemon'])) {
    $busqueda = $_POST['buscar-pokemon'];
    $pokemones = $gestorDePokemones->buscarPokemon($busqueda);

    // Si no se encuentran pokemones, mostrar el mensaje de error y la lista completa
    if (count($pokemones) == 0) {
        $errorBusqueda = "Pokemon no encontrado";
        $pokemones = $gestorDePokemones->obtenerPokemones();
    } else {
        $errorBusqueda = null; // Limpiar mensaje de error si la busqueda fue exitosa
    }
} else {
    $pokemones = $gestorDePokemones->obtenerPokemones();
}

?>

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
        <?php
        include_once('header.php');
        ?>
        <main>
            <form method="post">
                <div class="form-row mt-5">
                    <div class="col-12 col-md-9 mb-2 mb-md-0">
                        <label for="buscar" class="sr-only">Buscar Pokémon</label>
                        <input type="search" id="buscar" name="buscar-pokemon" class="form-control" placeholder="Ingrese el nombre, tipo o número de pokemon">
                    </div>
                    <div class="col-12 col-md-3">
                        <button type="submit" class="btn btn-primary w-100">¿Quién es este pokemon?</button>
                    </div>
                </div>
            </form>

            <?php
            if (isset($errorBusqueda)) {
                echo '<div class="alert alert-danger mt-3">' . $errorBusqueda . '</div>';
            }
            ?>

            <div class="mt-4">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Imagen</th>
                                <th>Numero</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Descripcion</th>
                                <th>Habilidades</th>
                                <th>Altura</th>
                                <th>Peso</th>
                                <?php
                                if (isset($_SESSION['logueado'])) {
                                    echo '<th>Acciones</th>';
                                }
                                ?>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (count($pokemones) > 0) {

                                foreach ($pokemones as $pokemon) {
                                    echo '<tr>';
                                    echo '<td><img src="img/pokemons/' . $pokemon['imagen'] . '" alt="imagen" class="img-fluid" style="max-width: 80px;"></td>';
                                    echo '<td>' . $pokemon['numero_identificador'] . '</td>';
                                    echo '<td><a href="mostrarPokemon.php?id=' . $pokemon['id'] . '">' . $pokemon['nombre'] . '</a></td>';
                                    echo '<td><img src="img/tipos/' . $pokemon['id_tipo'] . '.svg" alt="imagen" style="max-width: 50px;"></td>';
                                    echo '<td>' . $pokemon['descripcion'] . '</td>';
                                    echo '<td>' . $pokemon['habilidades'] . '</td>';
                                    echo '<td>' . $pokemon['altura'] . '</td>';
                                    echo '<td>' . $pokemon['peso'] . '</td>';
                                    if (isset($_SESSION['logueado'])) {
                                        echo '<td>';
                                        echo '<a href="acciones.php?accion=modificacion&id=' . $pokemon['id'] . '" class="btn btn-warning btn-sm mr-2 mb-2">Modificación</a>';
                                        echo '<a href="acciones.php?accion=baja&id=' . $pokemon['id'] . '" class="btn btn-danger btn-sm mb-2">Baja</a>';
                                        echo '</td>';
                                    }
                                    echo '</tr>';
                                }
                            } else {
                                echo '<tr><td colspan="9">No se encontraron pokemones</td></tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
            if (isset($_SESSION['logueado'])) {
                echo '<a href="crearPokemon.php"  class="btn btn-success btn-block text-center mt-5 mb-5">Nuevo pokemon</a>';
            }
            ?>
        </main>
    </div>
    <?php
    include_once('footer.php');
    ?>
</body>

</html>