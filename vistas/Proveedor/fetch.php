<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

$cnn = new Conexion();
$con = $cnn->conectar();
mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["id"])){
    $output=array();
    $procedure="CREATE PROCEDURE whereProveedor(IN user_id int(11))
                 BEGIN 
                SELECT * FROM Proveedor where idProveedor=user_id;
                END;
                 ";
    if(mysqli_query($con,"DROP PROCEDURE IF EXISTS whereProveedor")){
        if(mysqli_query($con,$procedure)){
            $query="CALL whereProveedor(".$_POST["id"].")";
            $result =mysqli_query($con,$query);

            while($row = mysqli_fetch_array($result)){
                $output["nombre"]=$row["nombre"];
                $output["ruc"]=$row["ruc"];
                $output["razonSocial"]=$row["razonSocial"];
                $output["telefono"]=$row["telefono"];
                $output["telefono2"]=$row["telefono2"];
                $output["direccion"]=$row["direccion"];
                $output["email1"]=$row["email1"];
                $output["email2"]=$row["email2"];
                $output["paginaWeb"]=$row["paginaWeb"];
                $output["observacion"]=$row["observaciones"];
            }
            echo json_encode($output);
        }
    }
}


?>