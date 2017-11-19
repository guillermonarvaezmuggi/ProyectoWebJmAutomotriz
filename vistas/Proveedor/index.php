<?php
include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");
$sql = "SELECT *FROM categoria";
$resultadoCategoria= mysqli_query($con,$sql);

$cnn2 = new Conexion();
$con2 = $cnn2->conectar();

mysqli_select_db($con2,"jmAutomotrizEIRL");
$sql2 = "SELECT *FROM subCategoria";
$resultadoSubCategoria= mysqli_query($con2,$sql2);

$cnn3 = new Conexion();
$con3 = $cnn3->conectar();

mysqli_select_db($con3,"jmAutomotrizEIRL");
$sql3 = "SELECT *FROM marca";
$resultadoMarca= mysqli_query($con3,$sql3);

$cnn4 = new Conexion();
$con4 = $cnn4->conectar();

mysqli_select_db($con4,"jmAutomotrizEIRL");
$sql4 = "SELECT *FROM unidad";
$resultadoUnidad= mysqli_query($con4,$sql4);
/*
$cnn2= new Conexion();
$con2=$cnn2->conectar();

mysqli_select_db($con2,"jmAutomotrizEIRL");
$sql2="SELECT * FROM usuario";
$resultado2=mysqli_query($con2,$sql2);
*/
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
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
  
<div class="row">
  <!-- Button trigger modal -->
  <div class="container box">
  <h1 align="center">Lista de Proveedores</h1>

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
                       
            <h3  >Nombre</h3>
            <input type="text" name="nombre" id="nombre"
        class="form-control" placeholder="Ingrese el nombre del Proveedor"/>

            <h3>Razón Social</h3>
            <input class="form-control" name="razonSocial" type="text" id="razonSocial"
             placeholder="Ingrese la Razón Social"/>
          
            
          <h3>Ruc</h3>
            <input class="form-control" name="ruc" type="text" id="ruc"
             placeholder="Ingrese el ruc respectivo" onkeypress="return valida(event)"/>
          

          <h3>Teléfono</h3>
            <input class="form-control" name="telefono" type="text" id="telefono"
             placeholder="Ingrese el teléfono principal:" onkeypress="return valida(event)"/>
          

          <h3>Telefono 2:</h3>
            <input class="form-control" name="telefono2" type="text" id="telefono2"
             placeholder="Ingrese el teléfono alternativo:" onkeypress="return valida(event)"/>
          

          <h3>Dirección:</h3>
            <input class="form-control" name="direccion" type="text" id="direccion"
             placeholder="Ingrese la Direccion respectiva"/>
          

          <h3>Email 1:</h3>
            <input class="form-control" name="email1" type="text" id="email1"
             placeholder="Ingrese el correo principal"/>
          

          <h3>Email 2:</h3>
            <input class="form-control" name="email2" type="text" id="email2"
             placeholder="Ingrese el correo alternativo"/>
          

          <h3>Pagina Web:</h3>
            <input class="form-control" name="paginaWeb" type="text" id="paginaWeb"
             placeholder="Ingrese la pagina web"/>
          

          <h3>Observaciones:</h3>
            <input class="form-control" rows="5" name="observacion" type="text" id="observacion"
             placeholder="Ingrese la(s) observacione(s)"/>
          <br></br>
            
              <div align="center">
                <button type="button" name="action" id="action"
                    class="btn btn-success" style='width:90px; height:75px'>Add</button>
                   
                </div>
                <br></br>
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
    fetchProveedor();
    function fetchProveedor(){
        var action="select";
        $.ajax({
            url : "select.php",
            method:"POST",
            data:{action:action},
                success:function(data){
                    $("#nombre").val('');
                    $("#razonSocial").val('');
                    $("#ruc").val('');
                    $("#telefono").val('');
                    $("#telefono2").val('');
                    $("#direccion").val('');
                    //$("#imagen").val('');
                    $("#email1").val('');
                    $("#email2").val('');
                    $("#paginaWeb").val('');
                    $("#observacion").val('');
                    $("#action").text("Add");
                    $("#result").html(data);
                }
            }
        )
    }

    $('#action').click(function(){
        var nombre= $("#nombre").val();
        var razonSocial=$("#razonSocial").val();
        var ruc=$("#ruc").val();
        var telefono=$("#telefono").val();
        var telefono2=$("#telefono2").val();
        //var imagen=$("#imagen").val();
        var direccion=$("#direccion").val();
        var email1=$("#email1").val();
        var email2=$("#email2").val();
        var paginaWeb=$("#paginaWeb").val();
        var observacion=$("#observacion").val();
        var id=$("#user_id").val();
        var action=$("#action").text();
        if(nombre!='' && razonSocial!='' && ruc!='' && telefono!='' && direccion!='' &&
      email1!=''){
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{
                nombre:nombre,
                razonSocial:razonSocial,
                ruc:ruc,
                telefono:telefono,
                telefono2:telefono2,
                //imagen:imagen,
                direccion:direccion,
                email1:email1,
                email2:email2,
                paginaWeb:paginaWeb,
                observacion:observacion,
                id:id,
                action:action},
                success:function(result){
                    console.log("La respuesta fue:")
                    console.log(result);
                    console.log(nombre);
                    console.log(razonSocial);
                    console.log(ruc);
                    console.log(telefono);
                    console.log(telefono2);
                    console.log(direccion);
                    console.log(email1);
                    console.log(email2);
                    console.log(paginaWeb);
                    console.log(observacion);
                alert(result);
                        fetchProveedor();
                }
            })

        }else{
            alert("Faltan rellenar campos")
        }
    });

$(document).on('click','.update',function(){
    var id = $(this).attr("id");
    $.ajax({
        url:"fetch.php",
        method:"POST",
        data:{id:id},
        dataType:"json",
        success:function(data){
            $('#action').text("Edit");
            $('#user_id').val(id);
            $("#nombre").val(data.nombre);
            $("#razonSocial").val(data.razonSocial);
            $("#ruc").val(data.ruc);
            $("#telefono").val(data.telefono);
            $("#telefono2").val(data.telefono2);
            $("#direccion").val(data.direccion);
            //$("#imagen").val(data.imagen);
            $("#email1").val(data.email1);
            $("#email2").val(data.email2);
            $("#paginaWeb").val(data.paginaWeb);
            $("#observacion").val(data.observacion);
        }
    });
})
$(document).on('click','.delete',function(){
    var id=$(this).attr("id");
    if(confirm("Estas seguro de Eliminar a este Proveedor?")){
        var action="Delete";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{id:id,action:action},
            success:function(result){
                fetchProveedor();
                alert(result);
            }
        })
    }else{
        return false;
    }
})



})
</script>
