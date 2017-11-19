<?php
include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");
$sql = "SELECT *FROM producto";
$resultadoProducto= mysqli_query($con,$sql);

$cnn2 = new Conexion();
$con2 = $cnn2->conectar();

mysqli_select_db($con2,"jmAutomotrizEIRL");
$sql2 = "SELECT *FROM proveedor";
$resultadoProveedor= mysqli_query($con2,$sql2);
?>

<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet">
<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<!--

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
-->
<style>
    body{
        margin:0;
        padding:0;
        background-color:#f1f1f1;
    }
    .box{
        width:1500px;
        padding:20px;
        background-color:#fff;
        border:1px solid #ccc;
        border-radius:5px;
        margin-top:100px;
    }

    </style>
    <title>Insertar Producto</title>
</head>
<body>
<script>
    var jqOld = jQuery.noConflict();
    jqOld(function() {
        jqOld("#fechaPedido").datepicker({dateFormat:'yy-mm-dd'});
    })

  
</script>
  
<div class="row">
  <!-- Button trigger modal -->
  <div class="container box">
  <h1 align="center">Lista de Productos Suministrados x Proveedor</h1>

  <div class="input-group" aling="left" style="width:500px">
        <!--<span class="input-group-addon"><span class="glyphicon glyphicon glyphicon-search" aria-hidden="true"></span></span>-->
        <!--<input type="text" class="form-control" id="search" placeholder="Buscar Producto...">-->
      </div>

  <div align="right">
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Añadir</button>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h1 class="modal-title"  >Registro</h1>
        </div>
        <div class="modal-body">
          <p>
            <!-- Obtener Producto -->
            <h3  >Producto(*):</h3>
            <div style="width:200px">
            <select name="producto" id="producto" class="form-control" onchange="this.style.width=250">
        <?php while($row = $resultadoProducto->fetch_assoc()){ ?>
        <option value="<?php echo $row['idProducto']; ?>">
        <?php echo $row['nombre'];?></option>
        <?php } ?>
        </select>
          </div>
            <!-- Obtener Proveedor-->
            <h3  >Proveedor(*):</h3>
            <div style="width:200px">
              <select name="proveedor" id="proveedor" class="form-control" onchange="this.style.width=200">
                    <?php while($row2 = $resultadoProveedor->fetch_assoc()){ ?>
                        <option value="<?php echo $row2['idProveedor']; ?>">
                            <?php echo $row2['nombre'];?></option>
                            <?php } ?>
                            </select>
            </div>
            <h3  >Cantidad(*):</h3>
            <input type="text" name="cantidad" id="cantidad"
        class="form-control" placeholder="Ingrese la cantidad del producto suministrado"/>
        <link rel="stylesheet"  href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <h1>Fecha de Pedido</h1>
            <input id="fechaPedido">

            <h3>Precio</h3>
            <input class="form-control" name="precio" type="text" rows="5" cols="3" id="precio"
             placeholder="Ingrese el precio que se ha comprado">
              
                <h3>Observacion(es):</h3>
            <input class="form-control" name="observacion" type="text" id="observacion"
             placeholder="Ingrese la(s) observacion(es)">
              
                <br></br>
                <div align="center">
                <button type="button" name="action" id="action"
                    class="btn btn-success" style='width:90px; height:75px'>Add</button>
                   
                </div>
            <!--<button type="button" name="action" id="action"
                class="btn btn-success" style='width:90px; height:75px'>Add</button>
              </center>-->
            <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </p>
        </div>
      </div>
    </div>
  </div>
        <div>
  <!--
        <button type="button" name="action" id="action"
            class="btn btn-warning" style='width:100px; height:75px'> Add</button>
  -->
        <input type="hidden" name="id" id="user_id"/>
        <input type="hidden" name="id2" id="user_id2"/>
        </div>
        <br></br>
        <div id="result" class="table-responsive">
        </div>
  </div>
        <script>
        function valida(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
        }


        </script>
        </body>
</html>

<script>


$(document).ready(function(){

    fetchSuministro();
    function fetchSuministro(){
        var action="select";
        $.ajax({
            url : "select.php",
            method:"POST",
            data:{action:action},
                success:function(data){
                    $("#producto").val('');
                    $("#proveedor").val('');
                    $("#cantidad").val('');
                    $("#fechaPedido").val('');
                    $("#precio").val('');
                    $("observacion").val('');
                    $("#action").text("Add");
                    $("#result").html(data);
                }
            }
        )


    }

    $('#action').click(function(){
        var producto= $("#producto").val();
        var proveedor=$("#proveedor").val();
        var cantidad=$("#cantidad").val();
        var fechaPedido=$("#fechaPedido").val();
        var precio=$("#precio").val();
        var observacion=$("#observacion").val();
        var id=$("#user_id").val();
        //
        var id2=$("#user_id2").val();
        //
        var action=$("#action").text();
        if(producto!='' && proveedor!='' && cantidad!='' && precio!='' && observacion!=''){
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{
                producto:producto,
                proveedor:proveedor,
                cantidad:cantidad,
                fechaPedido:fechaPedido,
                precio:precio,
                observacion:observacion,
                id:id,
                //
                id2:id2,
                //
                action:action},
                success:function(result){
                    console.log("La respuesta fue:")
                    console.log(result);;
                alert(result);
                console.log(producto);
                console.log(proveedor);
                console.log(cantidad);
                console.log(fechaPedido);
                console.log(precio);
                console.log(observacion);
                fetchSuministro();
                }
            })

        }else{
            alert("Debe rellenar todos los campos(*)")
        }
    });

$(document).on('click','.update',function(){
    var id = $(this).attr("id");
    var id2= $(this).attr("id2");
    $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{id:id,
             id2:id2},
        dataType:"json",
        success:function(data){
            $('#action').text("Edit");
            $('#user_id').val(id);
            //
            $('#user_id2').val(id2);
            //
            $("#producto").val(data.producto);
            $("#proveedor").val(data.proveedor);
            $("#cantidad").val(data.cantidad);
            $("#fechaPedido").val(data.fechaPedido);
            $("#observacion").val(data.observacion);
        }
    });
})
$(document).on('click','.delete',function(){
    var id=$(this).attr("id");
    var id2= $(this).attr("id2");
    if(confirm("Estas seguro de Eliminar a Suministro?")){
        var action="Delete";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{id:id,
                id2:id2,
                action:action},
            success:function(result){
                fetchSuministro();
                alert(result);
            }
        })
    }else{
        return false;
    }
})



})
</script>
