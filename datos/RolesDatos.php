<?php
include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/entidades/Rol.php");
//include "../entidades/Rol.php";
include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
//include "Conexion.php";
Class RolesDatos{
    function insertarRoles($nombre){
        $cnn= new Conexion();
        $con =$cnn->conectar();
        $rol= new Rol();

        $rol->nombre=$nombre;
        //seleccionamos la BD
        mysqli_select_db($con,"jmAutomotrizEIRL");
        //creamos el sql
        $sql="INSERT INTO rol(nombre) VALUES
        (
            '".$rol->nombre."'

        )";
        //validamos
        if(mysqli_query($con,$sql)){
            
            return true;
        }
        else{
            return false;
        }
        mysqli_close($con);
    }
}
/*
$obj = new RolesDatos();
    if($obj->insertarRoles("Gerente")){
        echo "Se ha insertado el rol Adminstrador";
    };

$obj2 = new RolesDatos();
    if($obj2->insertarRoles("Almacenero")){
        echo "Se ha insertado el rol Almacenero";
    };
$obj3= new Rolesdatos();
    if($obj3->insertarRoles("Cajero")){
        echo "Se ha insertado el rol Mecánico";
    };
*/
?>