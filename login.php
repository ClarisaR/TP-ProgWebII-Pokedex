<?php

// Iniciar sesión con Post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    require_once 'db.php';

    // Validar usuario y contraseña
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM usuarios WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($db, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
        $_SESSION['username'] = $user['username'];
        header('Location: index.php?login=true');
    } else {
        header('Location: index.php?error=true');
    }
} else {
    header('Location: index.php');
}