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

    public function  darDeBajaPokemon($id)
    {
        $resultado = $this->obtenerPokemon($id);
        if($resultado != null){
            $consultaPreparada = "DELETE FROM pokemon WHERE id = ?";
            $this->baseDeDatos->ejecutarConsultaPreparada($consultaPreparada, 'i', $id);
        }
    }

    public function obtenerPokemon($id)
    {
        $consultaPreparada = "SELECT * FROM pokemon WHERE id = ?";
        $resultado = $this->baseDeDatos->ejecutarConsultaPreparada($consultaPreparada, 'i', $id);
        return $resultado->fetch_assoc();
    }

    public function modificarPokemon($pokemon)
    {
        $resultado = $this->obtenerPokemon($pokemon->getId());
        if($resultado != null){
            $consultaPreparada = "UPDATE pokemon SET numero_identificador = ?, imagen = ?, id_tipo = ? ,  nombre = ?, descripcion = ?, habilidades = ?, peso = ?, altura = ? WHERE id = ?";
            $this->baseDeDatos->ejecutarConsultaPreparada($consultaPreparada, 'isisssddi',
                $pokemon->getNumeroIdentificador(),
                $pokemon->getRutaImagen(),
                $pokemon->getTipo(),
                $pokemon->getNombre(),
                $pokemon->getDescripcion(),
                $pokemon->getHabilidades(),
                $pokemon->getPeso(),
                $pokemon->getAltura(),
                $pokemon->getId());
        }
    }

}