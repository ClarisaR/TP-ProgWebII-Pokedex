<?php
require_once ('GestorDePokemones.php');
require_once ('Pokemon.php');

function extraerParametroOValorPorDefecto($parametro, $valorPorDefecto='')
{
    return isset($_POST[$parametro]) && $_POST[$parametro] != '' ? $_POST[$parametro] : $valorPorDefecto;
}

$numeroIdentificador = (int)extraerParametroOValorPorDefecto('numero', "Sin datos cargados");
$rutaImagen = '';
$rutaCarpeta = "img/pokemons";
if (isset($_FILES["imagen"]) && $_FILES["imagen"]["error"] == 0 && $_FILES["imagen"]["size"] > 0 )
{
    $rutaImagen = $rutaCarpeta . "/" . random_int(0,10000) . $_FILES["imagen"]["name"];
    //guardar la imagen en la carpeta  img/pokemons.
    move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen);
}
$nombre = extraerParametroOValorPorDefecto('nombre', "Sin datos cargados");
$tipos = extraerParametroOValorPorDefecto('tipo', "Sin datos cargados");
$descripcion = extraerParametroOValorPorDefecto('descripcion', "Sin datos cargados");
$habilidades = extraerParametroOValorPorDefecto('habilidades', "Sin datos cargados");
$peso = (float)extraerParametroOValorPorDefecto('peso', "Sin datos cargados");
$altura = (float)extraerParametroOValorPorDefecto('altura', "Sin datos cargados");


$gestorDePokemones = GestorDePokemones::getGestorDePokemones();
$pokemon = new Pokemon($numeroIdentificador, $rutaImagen, $tipos, $nombre, $descripcion, $habilidades, $peso, $altura);
$gestorDePokemones->agregarPokemon($pokemon);









