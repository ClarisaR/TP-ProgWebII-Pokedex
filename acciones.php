<?php
    require_once ('classes/GestorDePokemones.php');
    require_once ('classes/Pokemon.php');
    session_start();
    if(!isset($_SESSION['logueado'])){
        header('Location: index.php');
        exit();
    }

    $idPokemon = $_GET['id'];
    $accion = $_GET['accion'];
    $gestor = GestorDePokemones::getGestorDePokemones();

    if($accion === 'baja'){
        $gestor->darDeBajaPokemon($idPokemon);
        header('Location: index.php');
        exit();
    }

    $pokemon = $gestor->obtenerPokemon($idPokemon);
    $id_pokemon = $pokemon['id'];
    $numero_identificador = $pokemon['numero_identificador'];
    $imagenActual = $pokemon['imagen'];
    $tipo = $pokemon['id_tipo'];
    $nombre = $pokemon['nombre'];
    $descripcion = $pokemon['descripcion'];
    $habilidades = $pokemon['habilidades'];
    $peso = $pokemon['peso'];
    $altura = $pokemon['altura'];

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $numero_identificadorMod = $_POST['numero'];
        $nombreMod = $_POST['nombre'];
        $tipoMod = $_POST['tipo'];
        $descripcionMod = $_POST['descripcion'];
        $habilidadesMod = $_POST['habilidades'];
        $pesoMod = $_POST['peso'];
        $alturaMod = $_POST['altura'];

        if(isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0 && $_FILES["imagen"]["size"] > 0)
        {
            $imagenMod = $_FILES["imagen"]["name"];
            //guardar la imagen en la carpeta  images/pokemons.
            move_uploaded_file($_FILES["imagen"]["tmp_name"], 'images/pokemons/'.$imagenMod);
        }else{
            $imagenMod =  $imagenActual;
        }

        $pokemonModif = new Pokemon($numero_identificadorMod, $imagenMod, $tipoMod, $nombreMod, $descripcionMod, $habilidadesMod, $pesoMod, $alturaMod);
        $pokemonModif->setId($id_pokemon);
        $gestor->modificarPokemon($pokemonModif);

        header('Location: index.php');
        exit();
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Pokémon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="card">
        <div class="card-header text-center">
        <h2>Modificar Pokémon</h2>
        </div>
        <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="numero">Número Identificador</label>
                <input type="number" name="numero" id="numero" class="form-control" value="<?php echo $numero_identificador?>" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del Pokémon</label>
                <div>Imagen Actual: </div>
                <img src="images/pokemons/<?php echo $imagenActual ?>" alt="imagen" style="max-width: 100px;"">
                <input type="file" name="imagen" id="imagen" class="form-control-file">
            </div>
            <div class="form-group">
                <label for="nombre">Nombre del Pokémon</label>
                <input type="text" name="nombre" id="nombre" class="form-control" value="<?php echo $nombre ?>" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Pokémon</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="1" <?php if($tipo == 1) echo 'selected'; ?>>Fuego</option>
                    <option value="2" <?php if($tipo == 2) echo 'selected'; ?>>Agua</option>
                    <option value="3" <?php if($tipo == 3) echo 'selected'; ?>>Planta</option>
                    <option value="4" <?php if($tipo == 4) echo 'selected'; ?>>Tierra</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="form-control" required><?php echo $descripcion ?></textarea>
            </div>

            <!-- Datos Extras -->
            <div class="form-group">
                <label for="habilidades">Habilidades</label>
                <input type="text" name="habilidades" id="habilidades" class="form-control" value="<?php echo $habilidades ?>" required>
            </div>

            <div class="form-group">
                <label for="peso">Peso (kg)</label>
                <input type="number" step="0.01" name="peso" id="peso" class="form-control" value="<?php echo $peso ?>" required>
            </div>

            <div class="form-group">
                <label for="altura">Altura (m)</label>
                <input type="number" step="0.01" name="altura" id="altura" class="form-control" value="<?php echo $altura ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Modificar Pokémon</button>
        </form>
        </div>
        </div>
    </div>
    <?php
    include_once('footer.php');
    ?>
</body>
</html>
