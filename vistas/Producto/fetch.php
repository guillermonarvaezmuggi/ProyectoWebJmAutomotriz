<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

$cnn = new Conexion();
$con = $cnn->conectar();
mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["id"])){
    $output=array();
    $procedure="CREATE PROCEDURE whereProducto(IN user_id int(11))
                 BEGIN 
                SELECT * FROM producto where idProducto=user_id;
                END;
                 ";
    if(mysqli_query($con,"DROP PROCEDURE IF EXISTS whereProducto")){
        if(mysqli_query($con,$procedure)){
            $query="CALL whereProducto(".$_POST["id"].")";
            $result =mysqli_query($con,$query);

            while($row = mysqli_fetch_array($result)){
                $output["categoria"]=$row["idCategoria"];
                $output["subCategoria"]=$row["idSubCategoria"];
                $output["marca"]=$row["idMarca"];
                $output["unidad"]=$row["idUnidad"];
                $output["nombre"]=$row["nombre"];
                $output["descripcion"]=$row["descripcion"];
                $output["stock"]=$row["stock"];
                $output["precio"]=$row["precio"];
                $output["observacion"]=$row["observacion"];
            }
            echo json_encode($output);
        }
    }
}


?>