<?php

// Inicio de sesión
session_start();

?>

<!-- Header con logo, nombre y form de login -->
<header class="container-lg">
    <div class="row align-items-center">
        <div class="col-3 col-lg-2">
            <a href="index.php">
                <img src="img/logo-pokedex.png" alt="logo" class="img-fluid w-50">
            </a>
        </div>
        <div class="col-9 col-lg-5 offset-lg-1 text-center">
            <h1>Pokedex</h1>
        </div>
        <div class="col-lg-4 p-3 text-center">
            <?php if (isset($_SESSION['username'])) { ?>
                <h2 class="text-uppercase"><?php echo $_SESSION['username']; ?> ADMIN</h2>
                <a href="logout.php" class="btn btn-danger w-50">Cerrar Sesión</a>
            <?php } else { ?>
                <form action="login.php" method="post">
                    <div class="row g-2">
                        <div class="col">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Usuario">
                        </div>
                        <div class="col">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                        </div>
                    </div>
                </form>
            <?php } ?>
        </div>
    </div>
</header>