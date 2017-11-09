<?php
include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/UsuariosDatos.php");

Class UsuariosControlador{
    function insertarUsuario($idRol,
    $usuario,$contrasena,$nombre,$apellidoPaterno,
    $apellidoMaterno,$dni,$sexo,$telefono,$domicilio
    ){
        $obj = new UsuariosDatos();
        return $obj->insertarUsuario($idRol,
        $usuario,$contrasena,$nombre,$apellidoPaterno,
        $apellidoMaterno,$dni,$sexo,$telefono,$domicilio);
    }


}

?>