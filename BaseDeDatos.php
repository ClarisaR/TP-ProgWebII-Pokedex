<?php
    class BaseDeDatos
    {
        private $conexion;
        private static $baseDeDatos = null;

        private function __construct
            ($servidor = 'localhost',
             $usuario = 'root',
             $contrasenia = '',
             $nombreBD = 'pokedex')
        {
            $this->conexion = new mysqli($servidor, $usuario, $contrasenia, $nombreBD);
        }

        public static function getBaseDeDatos()
        {
            if(self::$baseDeDatos == null){
                self::$baseDeDatos = new BaseDeDatos();
            }
            return self::$baseDeDatos;
        }

        public function __destruct()
        {
            $this->conexion->close();
        }

        public function ejecutarConsulta($consulta)
        {
            return $this->conexion->query($consulta);
        }

        public function ejecutarConsultaPreparada($consulta, $bindParams, ...$params)
        {
            $stmt = $this->conexion->prepare($consulta);
            $stmt->bind_param($bindParams, ...$params);
            $stmt->execute();
            if($stmt->field_count > 0){
                $resultado = $stmt->get_result();
                $stmt->close();
                return $resultado;
            }
            $stmt->close();
            return true;
        }
    }