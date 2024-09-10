<?php
    class BaseDeDatos
    {
        private $conexion;

        public function __construct
            ($servidor = 'localhost',
             $usuario = 'root',
             $contrasenia = '',
             $baseDeDatos = 'pokedex')
        {
            $this->conexion = new mysqli($servidor, $usuario, $contrasenia, $baseDeDatos);
        }

        public function __destruct()
        {
            $this->conexion->close();
        }

        public function prepararConsulta($consulta){
            return $this->conexion->prepare($consulta);
        }
    }