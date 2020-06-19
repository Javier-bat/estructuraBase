<?php 
require_once 'Modelo.php';

class Usuario extends Modelo{
    private $idUsuario;
    private $nombre;
    private $apellido;
    private $legajo;
    private $hijos;

    public function __construct() {
        parent::__construct(get_class($this),"idUsuario");
    }

    //Getters
    public function getIdUsuario(){
        return $this->idUsuario;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getLegajo(){
        return $this->legajo;
    }
    public function getHijos(){
        return $this->hijos;
    }
    //Setters
    public function setIdUsuario($idUsuario){
        $this->idUsuario=$idUsuario;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setLegajo($legajo){
        $this->legajo = $legajo;
    }
    public function setHijos($hijos){
        $this->hijos = $hijos;
    }
}