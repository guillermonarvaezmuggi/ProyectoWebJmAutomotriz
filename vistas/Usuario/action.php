<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

if(isset($_POST["action"])){
    $output='';
    $cnn = new Conexion();
    $con = $cnn->conectar();
    mysqli_select_db($con,"jmAutomotrizEIRL");
    if($_POST["action"]=="Add"){
            $usuario= mysqli_real_escape_string($con,$_POST['usuario']);
            $rol=mysqli_real_escape_string($con,$_POST['rol']);
            $contrasena=mysqli_real_escape_string($con,$_POST['contrasena']);
            $nombre=mysqli_real_escape_string($con,$_POST['nombre']);
            $apellidoPaterno=mysqli_real_escape_string($con,$_POST['apellidoPaterno']);
            $apellidoMaterno=mysqli_real_escape_string($con,$_POST['apellidoMaterno']);
            $dni=mysqli_real_escape_string($con,$_POST['dni']);
            $sexo=mysqli_real_escape_string($con,$_POST['sexo']);
            $telefono=mysqli_real_escape_string($con,$_POST['telefono']);
            $domicilio=mysqli_real_escape_string($con,$_POST['domicilio']);

            $procedure="CREATE PROCEDURE insertUser(IN idRolP int(11), IN usuarioP varchar(100),
            IN contrasenaP varchar(100),IN nombreP varchar(100),
            IN apellidoPaternoP varchar(100),IN apellidoMaternoP varchar(100),
            IN dniP varchar(8), IN sexoP varchar(1),IN telefonoP int(11),
            IN domicilioP varchar(200))
            BEGIN
                Insert INTO usuario(idRol,usuario,contrasena,nombre,apellidoPaterno,apellidoMaterno,
                dni,sexo,telefono,domicilio) VALUES(idRolP,usuarioP,contrasenaP,nombreP,apellidoPaternoP,
                apellidoMaternoP,dniP,sexoP,telefonoP,domicilioP);
            END
            ";
            if(mysqli_query($con,"DROP PROCEDURE IF EXISTS insertUser")){
                if(mysqli_query($con,$procedure)){
                    $query="CALL insertUser(".$rol.",'".$usuario."','".$contrasena."'
                    ,'".$nombre."','".$apellidoPaterno."','".$apellidoMaterno."','"
                    .$dni."','".$sexo."',".$telefono.",'".$domicilio."');";
                    if(mysqli_query($con,$query)){
                        echo 'Data Inserted';
                    }
                }
            }
        }

    if($_POST["action"]=="Edit")
        {
            $usuario= mysqli_real_escape_string($con,$_POST['usuario']);
            $rol=mysqli_real_escape_string($con,$_POST['rol']);
            $contrasena=mysqli_real_escape_string($con,$_POST['contrasena']);
            $nombre=mysqli_real_escape_string($con,$_POST['nombre']);
            $apellidoPaterno=mysqli_real_escape_string($con,$_POST['apellidoPaterno']);
            $apellidoMaterno=mysqli_real_escape_string($con,$_POST['apellidoMaterno']);
            $dni=mysqli_real_escape_string($con,$_POST['dni']);
            $sexo=mysqli_real_escape_string($con,$_POST['sexo']);
            $telefono=mysqli_real_escape_string($con,$_POST['telefono']);
            $domicilio=mysqli_real_escape_string($con,$_POST['domicilio']);
            $procedure="CREATE PROCEDURE updateUsuario(IN user_id int(11), IN idRolP int(11), IN usuarioP varchar(100),
            IN contrasenaP varchar(100),IN nombreP varchar(100),
            IN apellidoPaternoP varchar(100),IN apellidoMaternoP varchar(100),
            IN dniP varchar(8), IN sexoP varchar(1),IN telefonoP int(11),
            IN domicilioP varchar(200))
            BEGIN
            UPDATE usuario SET idRol=idRolP,usuario=usuarioP,contrasena=contrasenaP,
            nombre=nombreP,apellidoPaterno=apellidoPaternoP,apellidoMaterno=apellidoMaternoP,
            dni=dniP,sexo=sexoP,telefono=telefonoP,domicilio=domicilioP
            WHERE idUsuario=user_id;
            END;
        ";
        /*
UPDATE usuario SET idRol=".$rol.",usuario='".$usuario"',contrasena='".$contrasena."',
            nombre='".$nombre."',apellidoPaterno='".$apellidoPaterno."',apellidoMaterno='".$apellidoMaterno"',
            dni=dniP,sexo=sexoP,telefono,telefonoP,domcilio=domicilioP
            WHERE idUsuario=user_id;
            END;
        */
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS updateUsuario"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL updateUsuario('".$_POST["id"]."',".$rol.",'".$usuario."'
                ,'".$contrasena."','".$nombre."','".$apellidoPaterno."','".$apellidoMaterno."'
                ,'".$dni."','".$sexo."',".$telefono.",'".$domicilio."')";
                if(mysqli_query($con,$query))
                {
                    echo 'Data Updated';
                }  
            }
        }
    }

    if($_POST["action"]=="Delete")
    {
        $procedure="CREATE PROCEDURE deleteUsuario(IN user_id int(11))
        BEGIN
        DELETE FROM usuario WHERE idUsuario=user_id;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS deleteUsuario"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL deleteUsuario('".$_POST["id"]."')";
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