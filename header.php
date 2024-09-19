<header>
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
        <a href="index.php">
            <img src="img/logo-pokedex.png" alt="logo" style="width: 50px; height: 50px">
        </a>
        <h1 class="my-2 my-md-0">Pokedex</h1>
        <?php
        session_start();
        if(!isset($_SESSION['logueado'])){
            echo '<form  method="post" action="manejoDeSesion.php">';
            echo '<div class="d-flex flex-column flex-md-row align-items-center">';
            echo '<div class="mb-2 mb-md-0 mr-md-2">';
            echo  '<label for="usuario" class="sr-only">Usuario</label>';
            echo '<input name="usuario" type="text" class="form-control" id="usuario" placeholder="usuario" required>';
            echo' </div>';
            echo '<div class="mb-2 mb-md-0 mr-md-2">';
            echo '<label for="contrasenia" class="sr-only">Contraseña</label>';
            echo '<input name="contrasenia" type="password" class="form-control" id="contrasenia" placeholder="contraseña" required>';
            echo '</div>';
            echo '<div>';
            echo '<button type="submit" class="btn btn-primary">Ingresar</button>';
            echo '</div>';
            echo '</div>';
            if(isset($_GET['error'])){
                $error = $_GET['error'];
                echo '<div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">' . $error . '</div>';
            }
            echo '</form>';
        }else{
            echo '<div class="d-flex flex-column flex-md-row align-items-center">';
            echo '<h3 class="m-3">' . $_SESSION['usuario'] . '</h3>';
            echo '<form method="post" action="manejoDeSesion.php">';
            echo '<input type="hidden" name="accion" value="cerrar_sesion">';
            echo '<button class="btn btn-secondary" type="submit">Salir</button>';
            echo '</form>';
            echo '</div>';
        }
        ?>
    </div>
</header>