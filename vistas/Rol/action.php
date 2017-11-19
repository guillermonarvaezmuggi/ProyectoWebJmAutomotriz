<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

if(isset($_POST["action"])){
    $output='';
    $cnn = new Conexion();
    $con = $cnn->conectar();
    mysqli_select_db($con,"jmAutomotrizEIRL");
    if($_POST["action"]=="Add"){
            $nombre=mysqli_real_escape_string($con,$_POST['nombre']);
            $procedure="CREATE PROCEDURE insertRol(IN nombreP varchar(100))
            BEGIN
                Insert INTO rol(nombre) VALUES(nombreP);
            END
            ";
            if(mysqli_query($con,"DROP PROCEDURE IF EXISTS insertRol")){
                if(mysqli_query($con,$procedure)){
                    $query="CALL insertRol('".$nombre."');";
                    if(mysqli_query($con,$query)){
                        echo 'Rol registrado exitosamente';
                    }
                }
            }
        }

    if($_POST["action"]=="Edit")
        {
            $nombre=mysqli_real_escape_string($con,$_POST['nombre']);

            $procedure="CREATE PROCEDURE updateRol(IN user_id int(11), IN nombreP varchar(100))
            BEGIN
            UPDATE rol SET nombre=nombreP
            WHERE idRol=user_id;
            END;
        ";
        /*
UPDATE usuario SET idRol=".$rol.",usuario='".$usuario"',contrasena='".$contrasena."',
            nombre='".$nombre."',apellidoPaterno='".$apellidoPaterno."',apellidoMaterno='".$apellidoMaterno"',
            dni=dniP,sexo=sexoP,telefono,telefonoP,domcilio=domicilioP
            WHERE idUsuario=user_id;
            END;
        */
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS updateRol"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL updateRol(".$_POST["id"].",'".$nombre."')";
                if(mysqli_query($con,$query))
                {
                    echo 'Rol actualizado correctamente';
                }  
            }
        }
    }

    if($_POST["action"]=="Delete")
    {
        $procedure="CREATE PROCEDURE deleteRol(IN user_id int(11))
        BEGIN
        DELETE FROM rol WHERE idRol=user_id;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS deleteRol"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL deleteRol(".$_POST["id"].")";
                if(mysqli_query($con,$query))
                {
                    echo "Rol Eliminado";
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