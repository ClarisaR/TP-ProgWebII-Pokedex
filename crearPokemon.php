<?php
    session_start();
    if(!isset($_SESSION['logueado'])){
        header('Location: index.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Pokémon</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="card m-5">
        <div class="card-header text-center">
        <h2>Registrar Pokémon</h2>
        </div>
        <div class="card-body">
        <form action="procesarPokemon.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="numero">Número Identificador</label>
                <input type="number" name="numero" id="numero" class="form-control" placeholder="Ingrese el número identificador" required>
            </div>
            <div class="form-group">
                <label for="imagen">Imagen del Pokémon</label>
                <input type="file" name="imagen" id="imagen" class="form-control-file" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre del Pokémon</label>
                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese el nombre del Pokémon" required>
            </div>
            <div class="form-group">
                <label for="tipo">Tipo de Pokémon</label>
                <select name="tipo" id="tipo" class="form-control" required>
                    <option value="1">Fuego</option>
                    <option value="2">Agua</option>
                    <option value="3">Planta</option>
                    <option value="4">Tierra</option>
                </select>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="4" class="form-control" placeholder="Ingrese una descripción" required></textarea>
            </div>

            <!-- Datos Extras -->
            <div class="form-group">
                <label for="habilidades">Habilidades</label>
                <input type="text" name="habilidades" id="habilidades" class="form-control" placeholder="Ingrese las habilidades">
            </div>

            <div class="form-group">
                <label for="peso">Peso (kg)</label>
                <input type="number" step="0.01" name="peso" id="peso" class="form-control" placeholder="Ingrese el peso en kilogramos">
            </div>

            <div class="form-group">
                <label for="altura">Altura (m)</label>
                <input type="number" step="0.01" name="altura" id="altura" class="form-control" placeholder="Ingrese la altura en metros">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Registrar Pokémon</button>
        </form>
        </div>
        </div>
    </div>
</body>
</html>