<?php
include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/RolesDatos.php");
Class RolesControlador{
    function insertarRoles($nombre){
        $obj= new RolesDatos();
        return $obj->insertarRoles($nombre);
    }
}

?>