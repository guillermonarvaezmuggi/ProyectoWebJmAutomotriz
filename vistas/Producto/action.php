<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

if(isset($_POST["action"])){
    $output='';
    $cnn = new Conexion();
    $con = $cnn->conectar();
    mysqli_select_db($con,"jmAutomotrizEIRL");
    if($_POST["action"]=="Add"){
      $categoria=mysqli_real_escape_string($con,$_POST['categoria']);
      $subCategoria=mysqli_real_escape_string($con,$_POST['subCategoria']);
      $marca=mysqli_real_escape_string($con,$_POST['marca']);
      $unidad=mysqli_real_escape_string($con,$_POST['unidad']);
      $nombre=mysqli_real_escape_string($con,$_POST['nombre']);
      $descripcion=mysqli_real_escape_string($con,$_POST['descripcion']);
      //$imagen=mysqli_real_escape_string($con,$_POST['imagen']);
      $stock=mysqli_real_escape_string($con,$_POST['stock']);
      $precio=mysqli_real_escape_string($con,$_POST['precio']);
      $observacion=mysqli_real_escape_string($con,$_POST['observacion']);
      $procedure="CREATE PROCEDURE insertProducto(IN idCategoriaP
        int(11),idSubCategoriaP int(11),
        idMarcaP int(11), idUnidadP int(11) ,nombreP varchar(300)
        ,descripcionP varchar(300),stockP float,precioP float,
        observacionP varchar(100))
      BEGIN
          Insert INTO producto(idCategoria,idSubCategoria,
          idMarca,idUnidad,nombre,descripcion,
        stock,precio,observacion) VALUES(idCategoriaP,
        idSubcategoriaP,idMarcaP,idUnidadP,nombreP,
      descripcionP,stockP,precioP,observacionP);
      END;
      ";
      if(mysqli_query($con,"DROP PROCEDURE IF EXISTS insertProducto")){
          if(mysqli_query($con,$procedure)){
              $query="CALL insertProducto(".$categoria.",
            ".$subCategoria.",".$marca.",".$unidad.",
          '".$nombre."','".$descripcion."',
        ".$stock.",".$precio.",'".$observacion."');";
              if(mysqli_query($con,$query)){
                  echo 'Producto Ingresado Existosamente';
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
    $categoria=mysqli_real_escape_string($con,$_POST['categoria']);
    $subCategoria=mysqli_real_escape_string($con,$_POST['subCategoria']);
    $marca=mysqli_real_escape_string($con,$_POST['marca']);
    $nombre=mysqli_real_escape_string($con,$_POST['nombre']);
    $unidad=mysqli_real_escape_string($con,$_POST['unidad']);
    $descripcion=mysqli_real_escape_string($con,$_POST['descripcion']);
    //$imagen=mysqli_real_escape_string($con,$_POST['imagen']);
    $stock=mysqli_real_escape_string($con,$_POST['stock']);
    $precio=mysqli_real_escape_string($con,$_POST['precio']);
    $observacion=mysqli_real_escape_string($con,$_POST['observacion']);
      $procedure="CREATE PROCEDURE updateProducto(IN user_id int(11)
      ,IN idCategoriaP int(11),idSubCategoriaP int(11),
        idMarcaP int(11), idUnidadP int(11) ,nombreP varchar(300)
        ,descripcionP varchar(300),stockP float,precioP float,
        observacionP varchar(100))
      BEGIN
      UPDATE producto SET idCategoria=idCategoriaP,
      idSubcategoria=idSubCategoriaP,idMarca=idMarcaP,
      idUnidad=idUnidadP,nombre=nombreP,descripcion=descripcionP
      ,stock=stockP,precio=precioP,
      observacion=observacionP
      WHERE idProducto=user_id;
      END;
  ";
        /*
UPDATE usuario SET idRol=".$rol.",usuario='".$usuario"',contrasena='".$contrasena."',
            nombre='".$nombre."',apellidoPaterno='".$apellidoPaterno."',apellidoMaterno='".$apellidoMaterno"',
            dni=dniP,sexo=sexoP,telefono,telefonoP,domcilio=domicilioP
            WHERE idUa
        */
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS updateProducto"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL updateProducto(".$_POST["id"].",".$categoria."
                ,".$subCategoria.",".$marca.",".$unidad.",'".$nombre."'
                ,'".$descripcion."',".$stock.",".$precio.",'".$observacion."')";
                if(mysqli_query($con,$query))
                {
                    echo 'Producto Actualizado Exitosamente';
                }
            }
        }
    }

    if($_POST["action"]=="Delete")
    {
        $procedure="CREATE PROCEDURE deleteProducto(IN user_id int(11))
        BEGIN
        DELETE FROM Producto WHERE idProducto=user_id;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS deleteProducto"))
        {
            if(mysqli_query($con,$procedure))
            {
                $query="CALL deleteProducto('".$_POST["id"]."')";
                if(mysqli_query($con,$query))
                {
                    echo "Producto Eliminado Exitosamente";
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
