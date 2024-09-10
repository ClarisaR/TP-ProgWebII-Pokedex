<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pokedex</title>
    <link rel="icon" href="img/logo.png">
</head>

<body>
    <?php include_once 'header.php'; ?>     

    <!-- Main con el pokemon desde el get -->
    <main class="container-lg mt-2 mt-lg-5">
        <?php
        require_once 'db.php';
        $id = $_GET['id'];
        $query = "SELECT * FROM pokemons WHERE id = $id";
        $result = mysqli_query($db, $query);
        $pokemon = mysqli_fetch_assoc($result);
        ?>
        <div class="row">
            <div class="col-lg-6">
                <img src="img/pokemons/<?php echo $pokemon['imagen']; ?>" alt="<?php echo $pokemon['nombre']; ?>" class="img-fluid w-100">   
            </div>
            <div class="col-lg-6">
                <h2><?php echo $pokemon['nombre']; ?></h2>
                <p><strong>Número:</strong> <?php echo $pokemon['numero_identificador']; ?></p>
                <p><strong>Tipo:</strong> <?php 
                    // Nombre de la tabla tipos
                    $tipo_id = $pokemon['tipo_id'];
                    $query = "SELECT nombre FROM tipos WHERE id = $tipo_id";
                    $result = mysqli_query($db, $query);
                    $tipo = mysqli_fetch_assoc($result);
                    echo $tipo['nombre'];
                ?></p>
                <p><strong>Descripción:</strong> <?php echo $pokemon['descripcion']; ?></p>
            </div>
        </div>
    </main>

</body>

</html>