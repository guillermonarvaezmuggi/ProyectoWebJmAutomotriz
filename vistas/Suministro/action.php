<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

if(isset($_POST["action"])){
    $output='';
    $cnn = new Conexion();
    $con = $cnn->conectar();
    mysqli_select_db($con,"jmAutomotrizEIRL");
    if($_POST["action"]=="Add"){
      $producto=mysqli_real_escape_string($con,$_POST['producto']);
      $proveedor=mysqli_real_escape_string($con,$_POST['proveedor']);
      $cantidad=mysqli_real_escape_string($con,$_POST['cantidad']);
      $fechaPedido=mysqli_real_escape_string($con,$_POST['fechaPedido']);
      $precio=mysqli_real_escape_string($con,$_POST['precio']);
      $observacion=mysqli_real_escape_string($con,$_POST['observacion']);
      $procedure="CREATE PROCEDURE insertSuministro(IN idProductoP
        int(11),idProveedorP int(11),
        cantidadP int(11), fechaPedidoP date ,
        precioP float,
        observacionP varchar(100))
      BEGIN
          Insert INTO suministro(idProducto,idProveedor,cantidad,fechaPedido,precio,observacion) 
          VALUES(idProductoP,idProveedorP,cantidadP,fechaPedidoP,precioP,observacionP);
      END;
      ";
      if(mysqli_query($con,"DROP PROCEDURE IF EXISTS insertSuministro")){
          if(mysqli_query($con,$procedure)){
              $query="CALL insertSuministro(".$producto.",
            ".$proveedor.",
            ".$cantidad.",
            '".$fechaPedido."',
            ".$precio.",
            '".$observacion."')";
              if(mysqli_query($con,$query)){
                  echo 'Suministro ingresado Exitosamente';
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
    $producto=mysqli_real_escape_string($con,$_POST['producto']);
    $proveedor=mysqli_real_escape_string($con,$_POST['proveedor']);
    $cantidad=mysqli_real_escape_string($con,$_POST['cantidad']);
    $fechaPedido=mysqli_real_escape_string($con,$_POST['fechaPedido']);
    $precio=mysqli_real_escape_string($con,$_POST['precio']);
    $observacion=mysqli_real_escape_string($con,$_POST['observacion']);
      $procedure="CREATE PROCEDURE updateSuministro(IN user_id int(11),
      IN user_id2 int(11),IN idProductoP int(11),idProveedorP int(11),
      cantidadP int(11), fechaPedidoP date ,precioP float,
      observacionP varchar(100))
      BEGIN
      UPDATE suministro SET idProducto=productoP,
      idProveedor=proveedorP,cantidad=cantidadP,fechaPedido=fechaPedidoP, precio=precioP,
      observacion=observacionP
      WHERE idProducto=user_id and idProveedor=user_id2;
      END;
  ";
        /*
UPDATE usuario SET idRol=".$rol.",usuario='".$usuario"',contrasena='".$contrasena."',
            nombre='".$nombre."',apellidoPaterno='".$apellidoPaterno."',apellidoMaterno='".$apellidoMaterno"',
            dni=dniP,sexo=sexoP,telefono,telefonoP,domcilio=domicilioP
            WHERE idUa
        */
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS updateSuministro"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL updateSuministro('".$_POST["id"]."',
                '".$_POST["id2"]."',
                ".$cantidad.",
                '".$fechaPedido."',
                ".$precio.",
                '".$observacion."')";
                if(mysqli_query($con,$query))
                {
                    echo 'Suministro Actualizado Exitosamente';
                }
            }
        }
    }

    if($_POST["action"]=="Delete")
    {
        $procedure="CREATE PROCEDURE deleteSuministro(IN user_id int(11) , IN user_id2 int(11))
        BEGIN
        DELETE FROM suministro WHERE idProducto=user_id and idProveedor=user_id2;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS deleteSuministro"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL deleteSuministro('".$_POST["id"]."','".$_POST["id2"]."')";
                if(mysqli_query($con,$query))
                {
                    echo "Suministro Eliminado Exitosamente";
                }
                else{
                    echo "error1";
                    echo "idProducto".$_POST["id"];
                    echo "idProoveedor".$_POST["id2"];
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
