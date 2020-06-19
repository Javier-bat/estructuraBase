<?php
require_once 'Controlador.php';

class ControladorUsuario extends Controlador{
    private $modelo;

    public function __construct($modelo) {
        parent::__construct($modelo);
    }
}