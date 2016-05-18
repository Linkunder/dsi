<?php

class Conexion{

private $nombreBD="matchday";
private $direccionBD="localhost";
private $user="root";
private $pass="";    
    
function __construct(){

}
    
public function obtenerConexion(){

    $link=mysql_connect($this->direccionBD,$this->user,$this->pass);
    mysql_select_db($this->nombreBD,$link);
    return $link;
}

}

?>