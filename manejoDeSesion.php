<?php
    require_once ('BaseDeDatos.php');
    require_once ('Sesion.php');

    //obtengo una conexion a la base de datos
    $conexion = new BaseDeDatos();

    //creo una sesion
    $sesion = new Sesion($conexion);

    //verifico que usuario y contrasenia fueron establecidas
    if (!isset($_POST['usuario']) || !isset($_POST['contrasenia'])){
        header('Location: index.php?error=Usuario o contraseña no proporcionada.');
        exit();
    }

    //obtengo el usuario y contrasenia enviados por post
    $usuario = $_POST["usuario"];
    $contrasenia = $_POST["contrasenia"];

    if($sesion->iniciarSesion($usuario, $contrasenia)){
        header('Location: index.php');
    }else{
        header('Location: index.php?error=Usuario o contraseña invalida');
    }
    exit();
