<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

if(isset($_POST["action"])){
    $output='';
    $cnn = new Conexion();
    $con = $cnn->conectar();
    mysqli_select_db($con,"jmAutomotrizEIRL");
    if($_POST["action"]=="Add"){
      $nombre=mysqli_real_escape_string($con,$_POST['nombre']);
      $razonSocial=mysqli_real_escape_string($con,$_POST['razonSocial']);
      $ruc=mysqli_real_escape_string($con,$_POST['ruc']);
      $telefono=mysqli_real_escape_string($con,$_POST['telefono']);
      $telefono2=mysqli_real_escape_string($con,$_POST['telefono2']);
      $direccion=mysqli_real_escape_string($con,$_POST['direccion']);
      $email1=mysqli_real_escape_string($con,$_POST['email1']);
      //$imagen=mysqli_real_escape_string($con,$_POST['imagen']);
      $email2=mysqli_real_escape_string($con,$_POST['email2']);
      $paginaWeb=mysqli_real_escape_string($con,$_POST['paginaWeb']);
      $observacion=mysqli_real_escape_string($con,$_POST['observacion']);
      $procedure="CREATE PROCEDURE insertProveedor(IN nombreP varchar(100),
      IN razonSocialP varchar(30), 
     IN rucP varchar(11),
    IN telefonoP int(9),
     IN telefono2P int(9),
       IN direccionP varchar(200), 
       IN email1P varchar(100),
       IN email2P varchar(100),
       IN paginaWebP varchar(100),
       IN observacionesP varchar(200))
      BEGIN
          Insert INTO proveedor(nombre,razonSocial,ruc,telefono,telefono2
          ,direccion,email1,email2,paginaWeb,observaciones) 
          VALUES(nombreP,razonSocialP,rucP,telefonoP,telefono2P,
          direccionP,email1P,email2P,paginaWebP,observacionesP);
      END;
      ";
      if(mysqli_query($con,"DROP PROCEDURE IF EXISTS insertProveedor")){
          if(mysqli_query($con,$procedure)){
              $query="CALL insertProveedor('".$nombre."','".$razonSocial."',
            '".$ruc."',".$telefono.",".$telefono2.",
          '".$direccion."','".$email1."',
        '".$email2."','".$paginaWeb."','".$observacion."');";
              if(mysqli_query($con,$query)){
                  echo 'Data Inserted';
              }else{
                  echo "error1g";
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
    $razonSocial=mysqli_real_escape_string($con,$_POST['razonSocial']);
    $ruc=mysqli_real_escape_string($con,$_POST['ruc']);
    $telefono=mysqli_real_escape_string($con,$_POST['telefono']);
    $telefono2=mysqli_real_escape_string($con,$_POST['telefono2']);
    $direccion=mysqli_real_escape_string($con,$_POST['direccion']);
    $email1=mysqli_real_escape_string($con,$_POST['email1']);
    //$imagen=mysqli_real_escape_string($con,$_POST['imagen']);
    $email2=mysqli_real_escape_string($con,$_POST['email2']);
    $paginaWeb=mysqli_real_escape_string($con,$_POST['paginaWeb']);
    $observacion=mysqli_real_escape_string($con,$_POST['observacion']);
      $procedure="CREATE PROCEDURE updateProveedor(IN user_id int(11)
      ,IN nombreP varchar(100),
      IN razonSocialP varchar(30),
      IN rucP varchar(11),IN telefonoP int(9), 
    IN telefono2P int(9),
       IN direccionP varchar(200), 
       IN email1P varchar(100),
       IN email2P varchar(100),
       IN paginaWebP varchar(100),
       IN observacionesP varchar(200))
      BEGIN
      UPDATE proveedor SET nombre=nombreP,razonSocial=razonSocialP,
      ruc=rucP,telefono=telefonoP,telefono2=telefono2P,
      direccion=direccionP,email1=emailP,email2=email2P,
      paginaWeb=paginaWeb2,observaciones=observacionesP
      WHERE idProveedor=user_id;
      END;
  ";
        /*
UPDATE usuario SET idRol=".$rol.",usuario='".$usuario"',contrasena='".$contrasena."',
            nombre='".$nombre."',apellidoPaterno='".$apellidoPaterno."',apellidoMaterno='".$apellidoMaterno"',
            dni=dniP,sexo=sexoP,telefono,telefonoP,domcilio=domicilioP
            WHERE idUa
        */
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS updateProveedor"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL updateProveedor(".$_POST["id"].",'".$nombre."','".$razonSocial."',
            '".$ruc."',".$telefono.",".$telefono2.",
          '".$direccion."','".$email."',
        '".$email2."','".$paginaWeb."','".$observacion."')";
                if(mysqli_query($con,$query))
                {
                    echo 'Data Updated';
                }
            }
        }
    }

    if($_POST["action"]=="Delete")
    {
        $procedure="CREATE PROCEDURE deleteProveedor(IN user_id int(11))
        BEGIN
        DELETE FROM proveedor WHERE idProveedor=user_id;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS deleteProveedor"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL deleteProveedor('".$_POST["id"]."')";
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
