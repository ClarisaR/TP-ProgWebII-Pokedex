<?php
require_once ('GestorDePokemones.php');
require_once ('Pokemon.php');

function extraerParametroOValorPorDefecto($parametro, $valorPorDefecto)
{
    return isset($_POST[$parametro]) && $_POST[$parametro] != '' ? $_POST[$parametro] : $valorPorDefecto;
}

$numeroIdentificador = (int)extraerParametroOValorPorDefecto('numero', null);
$rutaImagen = '';
$rutaCarpeta = "img/pokemons";
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0 && $_FILES["imagen"]["size"] > 0 )
{
    $rutaImagen = $rutaCarpeta . "/" . random_int(0,10000) . $_FILES["imagen"]["name"];
    //guardar la imagen en la carpeta  img/pokemons.
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen);
}else{
    $rutaImagen = null;
}
$nombre = extraerParametroOValorPorDefecto('nombre', null);
$tipo = extraerParametroOValorPorDefecto('tipo', null);
$descripcion = extraerParametroOValorPorDefecto('descripcion', null);
$habilidades = extraerParametroOValorPorDefecto('habilidades', null);
$peso = (float)extraerParametroOValorPorDefecto('peso', null);
$altura = (float)extraerParametroOValorPorDefecto('altura', null);

if($numeroIdentificador === null ||
    $rutaImagen === null ||
    $nombre === null ||
    $tipo === null ||
    $descripcion === null ||
    $habilidades === null ||
    $peso === null ||
    $altura === null )
{
    header('Location: ../index.php');
    exit();
}




$gestorDePokemones = GestorDePokemones::getGestorDePokemones();
$pokemon = new Pokemon($numeroIdentificador, $rutaImagen, $tipo, $nombre, $descripcion, $habilidades, $peso, $altura);
$gestorDePokemones->agregarPokemon($pokemon);









