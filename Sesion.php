<?php
    class Sesion
    {
        private $conexion;

        public function __construct($conexion){
            $this->conexion = $conexion;
        }

        public function iniciarSesion($usuario, $contrasenia){
            $consulta = "SELECT * FROM usuarios WHERE usuario = ? AND contrasenia = ?";
            $stmt = $this->conexion->prepararConsulta($consulta);
            $stmt->bind_param("ss", $usuario, $contrasenia);
            $stmt->execute();
            $result = $stmt->get_result();
            if($result->num_rows == 1){
                session_start();
                $_SESSION['logueado'] = 1;
                $_SESSION['usuario'] = $usuario;
                $stmt->close();
                return true;
            }
            $stmt->close();
            return false;
        }

        public function cerrarSesion(){
            session_start();
            session_destroy();
            session_start();
        }
    }