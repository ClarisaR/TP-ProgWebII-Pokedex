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
    public function agregarPokemon($pokemon)
    {
        $consulta = "INSERT INTO pokemon (numero_identificador, imagen, id_tipo,  nombre, descripcion, habilidades, peso, altura) VALUES(?,?,?,?,?,?,?,?)";
        $this->baseDeDatos->ejecutarConsultaPreparada($consulta, 'isisssdd',
            $pokemon->getNumeroIdentificador(),
            $pokemon->getRutaImagen(),
            $pokemon->getTipo(),
            $pokemon->getNombre(),
            $pokemon->getDescripcion(),
            $pokemon->getHabilidades(),
            $pokemon->getPeso(),
            $pokemon->getAltura()
        );
    }

    public function obtenerPokemones()
    {
        $resultado = $this->baseDeDatos->ejecutarConsulta("SELECT * FROM pokemon");
        return $resultado->fetch_all(MYSQLI_ASSOC);
    }

}