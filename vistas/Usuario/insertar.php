<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/controlador/UsuariosControlador.php");

$usuariosCon = new UsuariosControlador();

if(isset($_GET["usuario"]) || isset($_GET["contrasena"])){

    if($usuariosCon->insertarUsuarios(
        $_GET["usuario"],
        $_GET["password"]))
        {
        echo "true<br>";
        echo $_GET["usuario"]."<br>";
        echo $_GET["contrasena"]."<br>";
    }else{
        echo "false";
    }   
}else{
    echo "false";
}





?>