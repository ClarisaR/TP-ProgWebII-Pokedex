<?php

class Pokemon
{
    private $id;
    private $numeroIdentificador;
    private $rutaImagen;
    private $tipo;
    private $nombre;
    private $descripcion;
    private $habilidades;
    private $peso;
    private $altura;

    public function __construct($numeroIdentificador, $rutaImagen, $tipo, $nombre, $descripcion, $habilidades, $peso, $altura)
    {
        $this->numeroIdentificador =$numeroIdentificador;
        $this->rutaImagen = $rutaImagen;
        $this->tipo = $tipo;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->habilidades = $habilidades;
        $this->peso = $peso;
        $this->altura = $altura;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getNumeroIdentificador()
    {
        return $this->numeroIdentificador;
    }

    /**
     * @return mixed
     */
    public function getRutaImagen()
    {
        return $this->rutaImagen;
    }

    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @return mixed
     */
    public function getHabilidades()
    {
        return $this->habilidades;
    }

    /**
     * @return mixed
     */
    public function getPeso()
    {
        return $this->peso;
    }

    /**
     * @return mixed
     */
    public function getAltura()
    {
        return $this->altura;
    }

}