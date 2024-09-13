<?php

require_once ('BaseDeDatos.php');

class GestorDePokemones
{
    private $baseDeDatos;
    private static $gestorDePokemones;

    private function __construct($baseDeDatos)
    {
        $this->baseDeDatos = $baseDeDatos;
    }

    public static function getGestorDePokemones()
    {
        if(self::$gestorDePokemones == null) {
            self::$gestorDePokemones = new GestorDePokemones(BaseDeDatos::getBaseDeDatos());
        }
        return self::$gestorDePokemones;
    }

    public function obtenerTiposDePokemones(){
        $respuesta = $this->baseDeDatos->ejecutarConsulta("SELECT * FROM tipo");
        $tipos = $respuesta->fetch_all(MYSQLI_ASSOC);
        return $tipos;
    }

    public function agregarPokemon($pokemon)
    {
        //agrego el nuevo pokemon
        $consulta = "INSERT INTO pokemon (numero_identificador, imagen,  nombre, descripcion, habilidades, peso, altura) VALUES(?,?,?,?,?,?,?)";
        $this->baseDeDatos->ejecutarConsultaPreparada($consulta, 'issssdd',
            $pokemon->getNumeroIdentificador(),
            $pokemon->getRutaImagen(),
            $pokemon->getNombre(),
            $pokemon->getDescripcion(),
            $pokemon->getHabilidades(),
            $pokemon->getPeso(),
            $pokemon->getAltura()
        );

        $consultaIdPokemon = "SELECT id FROM pokemon WHERE pokemon.numero_identificador=?";
        $resultadoPokemon = $this->baseDeDatos->ejecutarConsultaPreparada($consultaIdPokemon, 'i', $pokemon->getNumeroIdentificador());
        $idArray = $resultadoPokemon->fetch_all(MYSQLI_ASSOC);
        $idPokemon = $idArray[0]['id'];

        $tiposPokemon = $pokemon->getTipos();
        $tiposInt = array_map('intval', $tiposPokemon);

        //agrego la relacion de pokemon y tipos en la tabla intermedia

        $consultaTipo = "INSERT INTO pokemon_tipo (pokemon_id, tipo_id) VALUES(?,?)";
        foreach ($tiposInt as $tipo) {
            $this->baseDeDatos->ejecutarConsultaPreparada($consultaTipo, 'ii', $idPokemon ,$tipo);
        }
    }

}