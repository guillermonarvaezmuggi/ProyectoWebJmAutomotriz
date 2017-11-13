<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

$cnn = new Conexion();
$con = $cnn->conectar();
mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["id"])){
    $output=array();
    $procedure="CREATE PROCEDURE whereUsuario(IN user_id int(11))
                 BEGIN 
                SELECT * FROM usuario where idUsuario=user_id;
                END;
                 ";
    if(mysqli_query($con,"DROP PROCEDURE IF EXISTS whereUsuario")){
        if(mysqli_query($con,$procedure)){
            $query="CALL whereUsuario(".$_POST["id"].")";
            $result =mysqli_query($con,$query);

            while($row = mysqli_fetch_array($result)){
                $output["usuario"]=$row["usuario"];
                $output["contrasena"]=$row["contrasena"];
                $output["rol"]=$row["idRol"];
                $output["nombre"]=$row["nombre"];
                $output["apellidoPaterno"]=$row["apellidoPaterno"];
                $output["apellidoMaterno"]=$row["apellidoMaterno"];
                $output["dni"]=$row["dni"];
                $output["sexo"]=$row["sexo"];
                $output["telefono"]=$row["telefono"];
                $output["domicilio"]=$row["domicilio"];
            }
            echo json_encode($output);
        }
    }
}


?>