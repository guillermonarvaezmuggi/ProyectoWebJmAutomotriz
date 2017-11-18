<?php
include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");
$sql = "SELECT *FROM Rol";
$resultado= mysqli_query($con,$sql);
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
    <title>Insertar Usuarios</title>
</head>
<body>

<div class="container box">
        <h1>Datos Usuario:</h1>
        <label>Usuario :</label>
        <input type="text" name="usuario" id="usuario"
        class="form-control" placeholder="Ingrese el usuario">
        <br></br>
        <label> Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena" 
        class="form-control" placeholder="Ingrese la contraseña"/>
        <br></br>
        <label>Rol :</label>
        <!--
        <select name="rol" id="rol">
        <OPTION selected="selected">--seleccione--
        <option value="1">Gerente</option>
        <option value="2">Almacenero</option>
        <option value="3">Cajero</option>
        </select>
-->
        <!-- Obtener roles -->
        <select name="rol" id="rol" class="form-control" onchange="this.style.width=200">
        <OPTION selected="selected">--seleccione--</option>
        <?php while($row = $resultado->fetch_assoc()){ ?>
        <option value="<?php echo $row['idRol']; ?>">
        <?php echo $row['nombre'];?></option>
        <?php } ?>  
        </select>



        <h1>Datos Personales:</h1>
        <Label> Nombre:</label>
        <input type="text" name="nombre" id="nombre" 
        class="form-control" placeholder="Ingrese su nombre completo"/>
        <br></br>
        <Label> Apellido Paterno:</label>
        <input type="text" name="apellidoPaterno" id="apellidoPaterno" 
        class="form-control" placeholder="Ingrese el apellido paterno"/>
        <br></br>
        <Label> Apellido Materno:</label>
        <input type="text" name="apellidoMaterno" id="apellidoMaterno" 
        class="form-control" placeholder="Ingrese el apellido materno"/>
        <br></br>
        <Label> Dni:</label>
        <input type="text" name="dni" id="dni" class="form-control" onkeypress="return valida(event)" 
        placeholder="Ingrese el dni"/>
        <br></br>
        <Label> Sexo:</label>
        <select name="sexo" id="sexo">
        <OPTION selected="selected">--seleccione--</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        </select>
        <br></br>
        <Label> Télefono:</label>
        <input type="text" name="telefono" id="telefono" 
        class="form-control" onkeypress="return valida(event)" 
        placeholder="Ingrese el telefono celular o casa">
        <br></br>
        <Label> Domicilio:</label>
        <input type="text" name="domicilio" id="domicilio" 
        class="form-control"  placeholder="Ingrese el domicilio"/> 
        <br>
        </br>
        <div align="center" >

        <button type="button" name="action" id="action"
            class="btn btn-warning" style='width:100px; height:75px'> Add</button>
        <input type="hidden" name="id" id="user_id"/>
        </div>

        <br></br>
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
    alert("Solo se ingresa numeros");
    return patron.test(tecla_final);
}
        </script>
        </body>
</html>

<script>
$(document).ready(function(){
    fetchUser();
    function fetchUser(){
        var action="select";
        $.ajax({
            url : "select.php",
            method:"POST",
            data:{action:action},
                success:function(data){
                    $("#usuario").val('');
                    $("#contrasena").val('');
                    $("#rol").val('');
                    $("#nombre").val('');
                    $("#apellidoPaterno").val('');
                    $("#apellidoMaterno").val('');
                    $("#dni").val('');
                    $("#sexo").val('');
                    $("telefono").val('');
                    $("#domicilio").val('');
                    $("#action").text("Add");
                    $("#result").html(data);
                }
            }
        )

       
    }

    $('#action').click(function(){
        var usuario= $("#usuario").val();
        var contrasena=$("#contrasena").val();
        var rol=$("#rol").val();
        var nombre=$("#nombre").val();
        var apellidoPaterno=$("#apellidoPaterno").val();
        var apellidoMaterno=$("#apellidoMaterno").val();
        var dni=$("#dni").val();
        var sexo=$("#sexo").val();
        var telefono=$("#telefono").val();
        var domicilio=$("#domicilio").val();
        var id=$("#user_id").val();
        var action=$("#action").text();
        console.log(usuario);
        console.log(contrasena);
        console.log(rol);
        console.log(nombre);
        console.log(apellidoPaterno);
        console.log(apellidoMaterno);
        console.log(dni);
        console.log(sexo);
        console.log(telefono);
        console.log(domicilio);
        console.log(id);
        console.log(action);

        if(usuario!='' && contrasena!=''){
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{
                usuario:usuario,
                contrasena:contrasena,
                rol:rol,
                nombre:nombre,
                apellidoPaterno:apellidoPaterno,
                apellidoMaterno:apellidoMaterno,
                dni:dni,
                sexo:sexo,
                telefono:telefono,
                domicilio:domicilio,
                id:id,
                action:action},
                success:function(result){
                    console.log("La respuesta fue:")
                    console.log(result);
                alert(result);
                    fetchUser();
                }
            })

        }else{
            alert("Ambos son improatntes")
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
            $("#usuario").val(data.usuario);
            $("#contrasena").val(data.contrasena);
            $("#rol").val(data.rol);
            $("#nombre").val(data.nombre);
            $("#apellidoPaterno").val(data.apellidoPaterno);
            $("#apellidoMaterno").val(data.apellidoMaterno);
            $("#dni").val(data.dni);
            $("#sexo").val(data.sexo);
            $("#telefono").val(data.telefono);
            $("#domicilio").val(data.domicilio);
        }
    });
})
$(document).on('click','.delete',function(){
    var id=$(this).attr("id");
    if(confirm("Estas seguro de Eliminar a este Usuario?")){
        var action="Delete";
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{id:id,action:action},
            success:function(result){
                fetchUser();
                alert(result);
            }
        })
    }else{
        return false;
    }
})




})
</script>
