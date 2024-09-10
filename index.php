<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Pokedex</title>
    <link rel="icon" href="img/logo-pokedex.png">
</head>

<body>
    <?php include_once 'header.php'; ?>

    <main class="container-lg mt-2 mt-lg-5">
        <!-- Formulario de búsqueda -->
        <form method="post">
            <div class="row g-2 w-100">
                <div class="col-lg-10">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Ingrese el nombre, tipo o número de pokemon">
                </div>
                <div class="col-lg-2">
                    <button type="submit" class="btn btn-primary w-100">Quien es este pokemon?</button>
                </div>
            </div>
        </form>

        <!-- Mensajes de alerta -->
        <?php if (isset($_GET['created'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                Pokemon creado correctamente
            </div>
        <?php } elseif (isset($_GET['updated'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                Pokemon editado correctamente
            </div>
        <?php } elseif (isset($_GET['deleted'])) { ?>
            <div class="alert alert-danger mt-3" role="alert">
                Pokemon eliminado correctamente
            </div>
        <?php } elseif (isset($_GET['login'])) { ?>
            <div class="alert alert-success mt-3" role="alert">
                Usuario logueado correctamente
            </div>
        <?php } elseif (isset($_GET['logout'])) { ?>
            <div class="alert alert-danger mt-3" role="alert">
                Usuario deslogueado correctamente
            </div>
        <?php } elseif (isset($_GET['error'])) { ?>
            <div class="alert alert-danger mt-3" role="alert">
                Usuario o contraseña incorrectos
            </div>
        <?php } elseif (isset($_GET['error_create'])) { ?>
            <div class="alert alert-danger mt-3" role="alert">
                Error al crear el pokemon
            </div>
        <?php } elseif (isset($_GET['error_update'])) { ?>
            <div class="alert alert-danger mt-3" role="alert">
                Error al editar el pokemon
            </div>
        <?php } elseif (isset($_GET['error_delete'])) { ?>
            <div class="alert alert-danger mt-3" role="alert">
                Error al eliminar el pokemon
            </div>
        <?php } elseif (isset($_GET['error_not_found'])) { ?>
            <div class="alert alert-danger mt-3" role="alert">
                Pokemon no encontrado
            </div>
        <?php } ?>

        <!-- Tabla con listado de pokemones -->
        <table class="table table-bordered mt-5 text-center">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Tipo</th>
                    <th>Número</th>
                    <th>Nombre</th>
                    <?php if (isset($_SESSION['username'])) { ?>
                        <th>Acciones</th>
                    <?php } ?>
                </tr>
            </thead>
            <tbody>
                <!-- Filas con datos de Pokémon -->
                <?php
                require_once 'db.php';

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $search = $_POST['search'];
                    $sql = "SELECT * FROM pokemons WHERE nombre LIKE '%$search%' OR tipo_id LIKE '%$search%' OR numero_identificador LIKE '%$search%'";
                    $result = $db->query($sql);
                } else {
                    $sql = "SELECT * FROM pokemons ORDER BY numero_identificador";
                    $result = $db->query($sql);
                }

                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td>
                                <a href="pokemon.php?id=<?php echo $row['id']; ?>">
                                    <img
                                        src="img/pokemons/<?php echo $row['imagen']; ?>"
                                        alt="<?php echo $row['nombre']; ?>"
                                        class="img-fluid" style="max-width: 100px;">
                                </a>
                            </td>
                            <td>
                                <img
                                    src="img/tipos/<?php echo $row['tipo_id']; ?>.svg"
                                    alt="<?php echo $row['tipo_id']; ?>"
                                    class="img-fluid" style="max-width: 100px;">
                            </td>
                            <td><?php echo $row['numero_identificador']; ?></td>
                            <td>
                                <a href="pokemon.php?id=<?php echo $row['id']; ?>">
                                    <?php echo $row['nombre']; ?>
                                </a>
                            </td>
                            <?php if (isset($_SESSION['username'])) { ?>
                                <td>
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning">Editar</a>
                                    <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a>
                                </td>
                            <?php } ?>
                        </tr>
                <?php
                    }
                } else {
                    header('Location: index.php?error_not_found=true');
                } ?>

            </tbody>
        </table>

        <!-- Boton para crear pokemon  -->
        <?php if (isset($_SESSION['username'])) { ?>
            <a href="create.php" class="btn btn-success w-100">Nuevo Pokemon</a>
        <?php } ?>
    </main>

</body>

</html>