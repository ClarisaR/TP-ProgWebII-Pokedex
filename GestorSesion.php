<?php
    class GestorSesion
    {
        private $baseDeDatos;

        public function __construct($baseDeDatos){
            $this->baseDeDatos = $baseDeDatos;
        }

        public function iniciarSesion($usuario, $contrasenia){
            $consulta = "SELECT * FROM usuario WHERE usuario = ? AND contrasenia = ?";
            $result = $this->baseDeDatos->ejecutarConsultaPreparada($consulta, 'ss', $usuario, $contrasenia);
            if($result->num_rows == 1){
                session_start();
                $_SESSION['logueado'] = 1;
                $_SESSION['usuario'] = $usuario;
                return true;
            }
            return false;
        }

        public function cerrarSesion(){
            session_start();
            session_destroy();
            session_start();
        }
    }