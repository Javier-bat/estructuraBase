<?php 
require_once 'DB.php';

class Persistencia{
    private $conexion;
    private static $instance;

    public function __construct(){
        $db = new DB();
        $this->conexion = $db->getConexion();
    }

    public static function getInstance(){
        //Esto es para hacer que sea un singleton
        if(! self::$instance instanceof self){
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function iniciarTransaccion(){
        $this->conexion->beginTransaction();
    }
    public function confirmarTransaccion() {
        $this->conexion->commit();
    }
    public function revertirTransaccion() {
        $this->conexion->rollBack();
    }

    public function ejecutarSentencia($query, $parametros = null){
        $statement = $this->conexion->prepare($query);
        
        if ($parametros) {
            $index = 1;
            foreach ($parametros as $key => $parametro) {
                $statement->bindValue(":".$key, $parametro);
                $index++;
            }
        }
        $statement->execute();
        return $statement;
    }
}