<?php
class Modelo{
    private $tableName;
    private $primaryKey;//Es un string

    public function __construct($nombre,$primaryKey) {
        $this->tableName=$nombre;
        $this->primaryKey=$primaryKey;
    }

    public function getInsertStatement($props){
        $stmt="INSERT INTO ".$this->tableName." (";
        $size=sizeof($props);
        foreach ($props as $key => $value) {
                if($size != sizeof($props)){
                    $stmt.=",";
                }
                $stmt.=$key;
                $size--;
        }
        $stmt.=") VALUES (";
        $size=sizeof($props);
        foreach ($props as $key => $value) {
            if($size != sizeof($props)){
                $stmt.=",";
            }
            $stmt.=":".$key;
            $size--;
        }
        $stmt.=")";
        return $stmt;
    }

    public function getUpdateStatement($props){
        $stmt="UPDATE ".$this->tableName." SET ";
        $size=sizeof($props);
        foreach ($props as $key => $value) {
            if($key != $this->primaryKey){
                if($size != sizeof($props)){
                    $stmt.=",";
                }
                $stmt.=$key."=:".$key;
                $size--;
            }
        }
        $stmt.=" WHERE ".$this->primaryKey."=:".$this->primaryKey;
        /*$size=sizeof($primaryKeyArray);
        foreach ($primaryKeyArray as $key => $value) {
            if($size != sizeof($primaryKeyArray)){
                $stmt.=" AND ";
            }
            $stmt.=$key."=:".$key;
            $size--;
        }*/
        return $stmt;
    }

    public function getDeleteStatement($props){

    }
    public function getTableName(){
        return $this->tableName;
    }
    public function getPrimaryKey(){
        return $this->primaryKey;
    }
}