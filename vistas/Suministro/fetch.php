<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

$cnn = new Conexion();
$con = $cnn->conectar();
mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["id"])){
    $output=array();
    $procedure="CREATE PROCEDURE whereSuministro(IN user_id int(11),
    IN user_id2 int(11))
                 BEGIN 
                SELECT * FROM suministro where idProducto=user_id and idProveedor=user_id2;
                END;
                 ";
    if(mysqli_query($con,"DROP PROCEDURE IF EXISTS whereSuministro")){
        if(mysqli_query($con,$procedure)){
            $query="CALL whereSuministro('".$_POST["id"]."','".$_POST["id2"]."')";
            $result =mysqli_query($con,$query);

            while($row = mysqli_fetch_array($result)){
                $output["producto"]=$row["idProducto"];
                $output["proveedor"]=$row["idProveedor"];
                $output["cantidad"]=$row["cantidad"];
                $output["fechaPedido"]=$row["fechaPedido"];
                $output["precio"]=$row["precio"];
                $output["observacion"]=$row["observacion"];
            }
            echo json_encode($output);
        }
    }else{
        
    }
}


?>