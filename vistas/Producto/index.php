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
  <h1 align="center">Lista de Productos</h1>

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
            <!-- Obtener Categoria -->
            <h3  >Categoría(*):</h3>
            <div style="width:200px">
            <select name="categoria" id="categoria" class="form-control" onchange="this.style.width=250">
        <?php while($row = $resultadoCategoria->fetch_assoc()){ ?>
        <option value="<?php echo $row['idCategoria']; ?>">
        <?php echo $row['nombre'];?></option>
        <?php } ?>
        </select>
          </div>
            <!-- Obtener SubCategoria -->
            <h3  >SubCategoria(*):</h3>
            <div style="width:200px">
              <select name="subCategoria" id="subCategoria" class="form-control" onchange="this.style.width=200">
                    <?php while($row2 = $resultadoSubCategoria->fetch_assoc()){ ?>
                        <option value="<?php echo $row2['idSubCategoria']; ?>">
                            <?php echo $row2['nombre'];?></option>
                            <?php } ?>
                            </select>
            </div>
            <!-- Obtener Marca -->
            <h3  >Marca(*):</h3>
              <div style="width:150px">
            <select name="marca" id="marca" class="form-control" onchange="this.style.width=200">
                  <?php while($row3 = $resultadoMarca->fetch_assoc()){ ?>
                    <option value="<?php echo $row3['idMarca']; ?>">
                      <?php echo $row3['nombre'];?></option>
                    <?php } ?>
            </select>
          </div>
          <!-- Obtener Unidad -->
            <h3>Unidad(*):</h3>
            <div style="width:150px">
              <select name="unidad" id="unidad" class="form-control" onchange="this.style.width=200">
                <OPTION selected="selected">--seleccione--</option>
                  <?php while($row4 = $resultadoUnidad->fetch_assoc()){ ?>
                    <option value="<?php echo $row4['idUnidad']; ?>">
                      <?php echo $row4['nombre'];?></option>
                    <?php } ?>
                  </select>
            </div>
            <h3  >Nombre(*):</h3>
            <input type="text" name="nombre" id="nombre"
        class="form-control" placeholder="Ingrese el nombre del producto"/>
            <h3  >Descripción</h3>
            <input class="form-control" name="descripcion" type="text" rows="5" cols="3" id="descripcion"
             placeholder="Ingrese la descripción del producto">
           <!-- <input type="text" name="descripcion" id="descripcion"
          class="form-control" placeholder="Ingrese la descripción del producto"/>-->
          
            <!--<h3>Imagen</h3>
            <button type="button" style='width:200px; height:50px'>Seleccionar Imagen</button>
            <input id="imagen" name="imagen" type="file"/>
            <h1>Aca va la imagen</h1>
            -->
            
            <h3  >Stock(*):</h3>
            <input type="text" name="stock" id="stock" class="form-control"
        placeholder="Ingrese el stock"/>
              <h3  >Precio(*):</h3>
              <input type="text" name="precio" id="precio" class="form-control"
          placeholder="Ingrese el precio"/>
            <h3  >Observación</h3>
            <input class="form-control" name="observacion" type="text" rows="5" id="observacion"
            placeholder="Ingrese la(s) observaciones"/>
             
            <!--<input type="text" name="observacion" id="observacion"
        class="form-control"  placeholder="Ingrese la(s) observaciones"/>
        <br></br>-->
            <!--<center>-->
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
    fetchProducto();
    function fetchProducto(){
        var action="select";
        $.ajax({
            url : "select.php",
            method:"POST",
            data:{action:action},
                success:function(data){
                    $("#categoria").val('');
                    $("#subCategoria").val('');
                    $("#marca").val('');
                    $("#unidad").val('');
                    $("#nombre").val('');
                    $("#descripcion").val('');
                    //$("#imagen").val('');
                    $("#stock").val('');
                    $("#precio").val('');
                    $("observacion").val('');
                    $("#action").text("Add");
                    $("#result").html(data);
                }
            }
        )


    }

    $('#action').click(function(){
        var categoria= $("#categoria").val();
        var subCategoria=$("#subCategoria").val();
        var marca=$("#marca").val();
        var unidad=$("#unidad").val();
        var nombre=$("#nombre").val();
        //var imagen=$("#imagen").val();
        var descripcion=$("#descripcion").val();
        var stock=$("#stock").val();
        var precio=$("#precio").val();
        var observacion=$("#observacion").val();
        var id=$("#user_id").val();
        var action=$("#action").text();
        if(nombre!='' && categoria!='' && subCategoria!='' && marca!='' && nombre!='' && descripcion!='' &&
      stock!='' && precio!='' && unidad!=''){
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{
                categoria:categoria,
                subCategoria:subCategoria,
                marca:marca,
                unidad:unidad,
                nombre:nombre,
                //imagen:imagen,
                descripcion:descripcion,
                stock:stock,
                precio:precio,
                observacion:observacion,
                id:id,
                action:action},
                success:function(result){
                    console.log("La respuesta fue:")
                    console.log(result);
                alert(result);
                    fetchProducto();
                }
            })

        }else{
            alert("Debe rellenar todos los campos(*)")
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
            $("#categoria").val(data.categoria);
            $("#subCategoria").val(data.subCategoria);
            $("#marca").val(data.marca);
            $("#unidad").val(data.unidad);
            $("#nombre").val(data.nombre);
            $("#descripcion").val(data.descripcion);
            //$("#imagen").val(data.imagen);
            $("#stock").val(data.stock);
            $("#precio").val(data.precio);
            $("#observacion").val(data.observacion);
        }
    });
})
$(document).on('click','.delete',function(){
    var id=$(this).attr("id");
    if(confirm("Estas seguro de Eliminar a este Producto?")){
        var action="Delete";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{id:id,action:action},
            success:function(result){
                fetchProducto()();
                alert(result);
            }
        })
    }else{
        return false;
    }
})



})
</script>
