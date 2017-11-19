<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

if(isset($_POST["action"])){
    $output='';
    $cnn = new Conexion();
    $con = $cnn->conectar();
    mysqli_select_db($con,"jmAutomotrizEIRL");
    if($_POST["action"]=="Add"){
            $nombre=mysqli_real_escape_string($con,$_POST['nombre']);
            $procedure="CREATE PROCEDURE insertSubCategoria(IN nombreP varchar(100))
            BEGIN
                Insert INTO subCategoria(nombre) VALUES(nombreP);
            END;
            ";
            if(mysqli_query($con,"DROP PROCEDURE IF EXISTS insertSubCategoria")){
                if(mysqli_query($con,$procedure)){
                    $query="CALL insertSubCategoria('".$nombre."');";
                    if(mysqli_query($con,$query)){
                        echo 'SubCategoría registrada exitosamente';
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

            $procedure="CREATE PROCEDURE updateSubCategoria(IN user_id int(11), IN nombreP varchar(100))
            BEGIN
            UPDATE subCategoria SET nombre=nombreP
            WHERE idSubCategoria=user_id;
            END;
        ";
        /*
UPDATE usuario SET idRol=".$rol.",usuario='".$usuario"',contrasena='".$contrasena."',
            nombre='".$nombre."',apellidoPaterno='".$apellidoPaterno."',apellidoMaterno='".$apellidoMaterno"',
            dni=dniP,sexo=sexoP,telefono,telefonoP,domcilio=domicilioP
            WHERE idUsuario=user_id;
            END;
        */
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS updateSubCategoria"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL updateSubCategoria(".$_POST["id"].",'".$nombre."')";
                if(mysqli_query($con,$query))
                {
                    echo 'SubCategoria actualizada exitosamente';
                }  
            }
        }
    }

    if($_POST["action"]=="Delete")
    {
        $procedure="CREATE PROCEDURE deleteSubCategoria(IN user_id int(11))
        BEGIN
        DELETE FROM subCategoria WHERE idSubCategoria=user_id;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS deleteSubCategoria"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL deleteSubCategoria('".$_POST["id"]."')";
                if(mysqli_query($con,$query))
                {
                    echo "SubCagoria eliminada exitosamente";
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