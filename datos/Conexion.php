<?php

Class Conexion{
    function conectar(){
        return mysqli_connect("localhost","prueba","prueba");
    }
}
/*
$cnn= new Conexion();
if($cnn->conectar()){
    echo "conectado";
}else{
    echo "desconectado";
}
*/
?>