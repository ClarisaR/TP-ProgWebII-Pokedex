<?php
// Desloguear al usuario
session_start();

unset($_SESSION['username']);

header('Location: index.php?logout=true');
