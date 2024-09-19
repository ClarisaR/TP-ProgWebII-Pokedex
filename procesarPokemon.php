<?php
require_once ('classes/GestorDePokemones.php');
require_once ('classes/Pokemon.php');

function extraerParametroOValorPorDefecto($parametro, $valorPorDefecto)
{
    return isset($_POST[$parametro]) && $_POST[$parametro] != '' ? $_POST[$parametro] : $valorPorDefecto;
}

$numeroIdentificador = (int)extraerParametroOValorPorDefecto('numero', null);
$imagen = '';
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0 && $_FILES["imagen"]["size"] > 0 )
{
    $imagen = $_FILES["imagen"]["name"];
    //guardar la imagen en la carpeta  images/pokemons.
    move_uploaded_file($_FILES["imagen"]["tmp_name"], 'images/pokemons/' .$imagen);
}else{
    $imagen = null;
}
$nombre = extraerParametroOValorPorDefecto('nombre', null);
$tipo = extraerParametroOValorPorDefecto('tipo', null);
$descripcion = extraerParametroOValorPorDefecto('descripcion', null);
$habilidades = extraerParametroOValorPorDefecto('habilidades', null);
$peso = (float)extraerParametroOValorPorDefecto('peso', null);
$altura = (float)extraerParametroOValorPorDefecto('altura', null);

if($numeroIdentificador === null ||
    $imagen === null ||
    $nombre === null ||
    $tipo === null ||
    $descripcion === null ||
    $habilidades === null ||
    $peso === null ||
    $altura === null )
{
    header('Location: index.php');
    exit();
}

$gestorDePokemones = GestorDePokemones::getGestorDePokemones();
$pokemon = new Pokemon($numeroIdentificador, $imagen, $tipo, $nombre, $descripcion, $habilidades, $peso, $altura);
$gestorDePokemones->agregarPokemon($pokemon);

header('Location: index.php');
exit();







