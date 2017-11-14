<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

if(isset($_POST["action"])){
    $output='';
    $cnn = new Conexion();
    $con = $cnn->conectar();
    mysqli_select_db($con,"jmAutomotrizEIRL");
    if($_POST["action"]=="Add"){
            $nombre=mysqli_real_escape_string($con,$_POST['nombre']);
            $procedure="CREATE PROCEDURE insertUnidad(IN nombreP varchar(100))
            BEGIN
                Insert INTO unidad(nombre) VALUES(nombreP);
            END;
            ";
            if(mysqli_query($con,"DROP PROCEDURE IF EXISTS insertUnidad")){
                if(mysqli_query($con,$procedure)){
                    $query="CALL insertUnidad('".$nombre."');";
                    if(mysqli_query($con,$query)){
                        echo 'Data Inserted';
                    }else{
                        echo "error1";
                    }
                }
            }
            else{
                echo "error 2";
            }
        }

    if($_POST["action"]=="Edit")
        {
            $nombre=mysqli_real_escape_string($con,$_POST['nombre']);

            $procedure="CREATE PROCEDURE updateUnidad(IN user_id int(11), IN nombreP varchar(100))
            BEGIN
            UPDATE unidad SET nombre=nombreP
            WHERE idUnidad=user_id;
            END;
        ";
        /*
UPDATE usuario SET idRol=".$rol.",usuario='".$usuario"',contrasena='".$contrasena."',
            nombre='".$nombre."',apellidoPaterno='".$apellidoPaterno."',apellidoMaterno='".$apellidoMaterno"',
            dni=dniP,sexo=sexoP,telefono,telefonoP,domcilio=domicilioP
            WHERE idUsuario=user_id;
            END;
        */
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS updateUnidad"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL updateUnidad(".$_POST["id"].",'".$nombre."')";
                if(mysqli_query($con,$query))
                {
                    echo 'Data Updated';
                }  
            }
        }
    }

    if($_POST["action"]=="Delete")
    {
        $procedure="CREATE PROCEDURE deleteUnidad(IN user_id int(11))
        BEGIN
        DELETE FROM unidad WHERE idUnidad=user_id;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS deleteUnidad"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL deleteUnidad('".$_POST["id"]."')";
                if(mysqli_query($con,$query))
                {
                    echo "Data Deleted";
                }
                else{
                    echo "error1";
                }
            }else{
                echo "error 2";
            }
        }else{
            echo "error 3";
        }
    }

}

?>