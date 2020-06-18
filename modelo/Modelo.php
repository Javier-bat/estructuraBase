<?php
abstract class Modelo{
    //Podrian no ser abstractas y usar todos los atributos que tenga esta clase

    //Por ejemplo, aquí bindear todos los atributos en el insert(a excepción del id)
    abstract public function getInsertStatement();

    abstract public function getUpdateStatement();

    abstract public function getDeleteStatement();
}