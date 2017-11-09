<?php
include "../datos/RolesDatos.php";
Class RolesControlador{
    function insertarRoles($nombre){
        $obj= new RolesDatos();
        return $obj->insertarRoles($nombre);
    }
}

?>