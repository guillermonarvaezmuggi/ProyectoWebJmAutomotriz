<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

$cnn = new Conexion();
$con = $cnn->conectar();
mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["id"])){
    $output=array();
    $procedure="CREATE PROCEDURE whereMarca(IN user_id int(11))
                 BEGIN 
                SELECT * FROM marca where idMarca=user_id;
                END;
                 ";
    if(mysqli_query($con,"DROP PROCEDURE IF EXISTS whereMarca")){
        if(mysqli_query($con,$procedure)){
            $query="CALL whereMarca(".$_POST["id"].")";
            $result =mysqli_query($con,$query);

            while($row = mysqli_fetch_array($result)){
                $output["nombre"]=$row["nombre"];
            }
            echo json_encode($output);
        }
    }
}


?>