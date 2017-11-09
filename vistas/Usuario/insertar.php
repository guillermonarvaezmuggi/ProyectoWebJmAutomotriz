<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/controlador/UsuariosControlador.php");



if(isset($_GET["usuario"]) || isset($_GET["contrasena"]) 
|| isset($_GET["nombre"]) || isset($_GET["apellidoPaterno"]) 
|| isset($_GET["apellidoMaterno"]) || isset($_GET["dni"])){
    $usuariosCon = new UsuariosControlador();
    if($usuariosCon->insertarUsuario(
        $_GET["rol"],
        $_GET["usuario"],
        $_GET["contrasena"],
        $_GET["nombre"],
        $_GET["apellidoPaterno"],
        $_GET["apellidoMaterno"],
        $_GET["dni"],
        $_GET["sexo"],
        $_GET["telefono"],
        $_GET["domicilio"]
        ))
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