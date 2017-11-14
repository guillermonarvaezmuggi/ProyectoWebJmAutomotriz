<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

$cnn = new Conexion();
$con = $cnn->conectar();
mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["id"])){
    $output=array();
    $procedure="CREATE PROCEDURE whereUnidad(IN user_id int(11))
                 BEGIN 
                SELECT * FROM unidad where idUnidad=user_id;
                END;
                 ";
    if(mysqli_query($con,"DROP PROCEDURE IF EXISTS whereUnidad")){
        if(mysqli_query($con,$procedure)){
            $query="CALL whereUnidad(".$_POST["id"].")";
            $result =mysqli_query($con,$query);

            while($row = mysqli_fetch_array($result)){
                $output["nombre"]=$row["nombre"];
            }
            echo json_encode($output);
        }
    }
}


?>