<?php

require_once 'database/Persistencia.php';

class Controlador{
    protected $refControladorPersistencia;
    private $modelo;
    private $vars;

    public function __construct($modelo) {
        $this->modelo=$modelo;
        $this->refControladorPersistencia = Persistencia::getInstance();
    }

    public function insertar($request){
        $parametros=$this->obtenerValores();
        $statement=$this->modelo->getInsertStatement($parametros);
        return $this->refControladorPersistencia->ejecutarSentencia($statement, $parametros);
        //return $statement;
    }

    public function modificar($request){
        $parametros=$this->obtenerValores();
        $statement=$this->modelo->getUpdateStatement($parametros);
        return $this->refControladorPersistencia->ejecutarSentencia($statement, $parametros);
    }

    public function eliminar($request){

    }
    public function obtener($request){

    }

    public function ejecutar($sentencia,$parametros = null){
        //Para ejecutar sentencias custom
    }

    private function obtenerValores(){
        //Mediante el uso de reflection, devuelve los clave valor que no sean nulos
        $props=array();
        $reflector = new ReflectionClass(get_class($this->modelo));
        $properties = $reflector->getProperties();
 
        foreach ($properties as $property) {
            $property->setAccessible(true);
            $value=$property->getValue($this->modelo);
            if($value != null){
                $props[$property->name]=$value;
            }
            
        }
        return $props;
    }
}