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
        include_once ('header.php');
    ?>
    <main>
        <form method="post" action="buscarPokemon.php">
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
            if(isset($_SESSION['logueado'])){
                echo '<a href="crearPokemon.php"  class="btn btn-success btn-block text-center mt-5">Nuevo pokemon</a>';
            }
        ?>
    </main>
</div>
</body>
</html>
