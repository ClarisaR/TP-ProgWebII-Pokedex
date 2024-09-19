<?php
    require_once ('classes/BaseDeDatos.php');
    require_once('classes/GestorSesion.php');

    //obtengo una conexion a la base de datos
    $baseDeDatos = BaseDeDatos::getBaseDeDatos();

    //creo una sesion
    $sesion = new GestorSesion($baseDeDatos);

    //verifico si en el post viene la 'accion' de cerrar sesion
    if(isset($_POST['accion']) && $_POST['accion'] === 'cerrar_sesion'){
        $sesion->cerrarSesion();
        header('Location: index.php');
        exit();
    }

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

