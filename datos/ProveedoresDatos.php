<?php
include "Conexion.php";
include "../entidades/Proveedor";

Class ProveedoresDatos{
    function insertarProveedores($nombre,$razonSocial,
    $ruc,$telefono1,$telefono2,$email1,$email2,
    $paginaWeb,$observaciones
    ){

        $cnn= new Conexion();
        $con=$cnn->conectar();

        $proveedores= new Proveedor();
        $proveedores->nombre=$nombre;
        $proveedores->razonSocial=$razonSocial;
        $proveedores->ruc=$ruc;
        $proveedores->telefono1=$telefono1;
        $proveedores->telefono2=$telefono2;
        $proveedores->email1=$email1;
        $proveedores->email2=$email2;
        $proveedores->paginaWeb=$paginaWeb;
        $proveedores->observaciones=$observaciones;
        //usaremos las base de datos
        mysqli_select_db($con,"jmAutomotrizEIRL");

        $sql="INSERT INTO Proveedor(nombre,razonSocial,
        ruc,telefono1,telefono2,email1,email2,paginaWeb,
        observaciones) VALUES(
        '".$nombre."',
        '".$razonSocial."',
        '".$ruc."',
        '".$email1."',
        '".$email2."',
        '".$paginaWeb."',
        '".$observaciones."'
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

?>