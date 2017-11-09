<?php
include "../datos/RolesDatos.php";
Class RolesControlador{
    function insertarRoles($nombre){
        $obj= new RolesControlador();
        return $obj->insertarRoles($nombre);
    }
}

?>