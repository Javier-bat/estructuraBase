<?php
class ControladorUsuario extends Controlador{


    public function insertarCambiadoFormato($request){
        $datosProcesados;
        //for bla bla


        parent::insertar($datosProcesados);
    }

    public function modificar($modelo){

    }

    public function eliminar($modelo){

    }

    public function obtenerOCrear($request){

        $usuario= Usuario();
        $usuario->setLegajo();
        $usuario->setPeriodo();

        //$param=array( legajo => $datos["legajo"],periodo => date("Y") );
        $resultado=parent::obtener($usuario);
        if($resultado->length == 0){
            parent::insertar($usuario);
        }
    }
}