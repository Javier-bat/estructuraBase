<?php
class DB {
    private $conexion=null;
    private $host="localhost";
    private $usuario="root";
    private $contrasena="";
    private $dbName="Prueba";

    public function __construct() {
        $this->conexion = new PDO("mysql:dbname=".$this->dbName.";host=".$this->host, $this->usuario, $this->contrasena,array(
            PDO::ATTR_PERSISTENT => true
        ));
        $this->conexion->exec("SET CHARACTER SET utf8");
        $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function getConexion() {
        return $this->conexion;
    }


}