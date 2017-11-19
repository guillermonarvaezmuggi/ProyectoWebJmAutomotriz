<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

if(isset($_POST["action"])){
    $output='';
    $cnn = new Conexion();
    $con = $cnn->conectar();
    mysqli_select_db($con,"jmAutomotrizEIRL");
    if($_POST["action"]=="Add"){
            $nombre=mysqli_real_escape_string($con,$_POST['nombre']);
            $procedure="CREATE PROCEDURE insertCategoria(IN nombreP varchar(100))
            BEGIN
                Insert INTO categoria(nombre) VALUES(nombreP);
            END;
            ";
            if(mysqli_query($con,"DROP PROCEDURE IF EXISTS insertCategoria")){
                if(mysqli_query($con,$procedure)){
                    $query="CALL insertCategoria('".$nombre."');";
                    if(mysqli_query($con,$query)){
                        echo 'Categoría Ingresada Exitosamente';
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

            $procedure="CREATE PROCEDURE updateCategoria(IN user_id int(11), IN nombreP varchar(100))
            BEGIN
            UPDATE categoria SET nombre=nombreP
            WHERE idCategoria=user_id;
            END;
        ";
        /*
UPDATE usuario SET idRol=".$rol.",usuario='".$usuario"',contrasena='".$contrasena."',
            nombre='".$nombre."',apellidoPaterno='".$apellidoPaterno."',apellidoMaterno='".$apellidoMaterno"',
            dni=dniP,sexo=sexoP,telefono,telefonoP,domcilio=domicilioP
            WHERE idUsuario=user_id;
            END;
        */
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS updateCategoria"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL updateCategoria(".$_POST["id"].",'".$nombre."')";
                if(mysqli_query($con,$query))
                {
                    echo 'Categoría Actualizada Exitosamente';
                }  
            }
        }
    }

    if($_POST["action"]=="Delete")
    {
        $procedure="CREATE PROCEDURE deleteCategoria(IN user_id int(11))
        BEGIN
        DELETE FROM categoria WHERE idCategoria=user_id;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS deleteCategoria"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL deleteCategoria('".$_POST["id"]."')";
                if(mysqli_query($con,$query))
                {
                    echo "Categoría Eliminada Existosamente";
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