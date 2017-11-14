<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
        width:750px;
        padding:20px;
        background-color:#fff;
        border:1px solid #ccc;
        border-radius:5px;
        margin-top:100px;
    }
        
    </style>
    <title>Ingresar Unidades de Medida</title>
</head>
<body>
<div class="container box">
    <h1 align="center">Ingreso de Unidades de medida del Producto</h1>
    <label>Unidad de Medida</label>
    <input type="text" name="nombre" id="nombre" class="form-control">
    <br></br>
    <div align="center" >
            <button type="button" name="action" id="action"
                class="btn btn-warning" style='width:80px; height:65px'> Add</button>
            <input type="hidden" name="id" id="user_id"/>
    </div>
    <br></br>
    <div id="result" class="table-responsive">
    </div>
</div>

    
</body>
</html>

<script>
$(document).ready(function(){
    fetchUnidad();
    function fetchUnidad(){
        var action="select";
        $.ajax({
            url : "select.php",
            method:"POST",
            data:{action:action},
                success:function(data){
                    $("#nombre").val('');
                    $("#action").text("Add");
                    $("#result").html(data);
                }
            }
        )

       
    }

    $('#action').click(function(){
        var nombre=$("#nombre").val();
        var id=$("#user_id").val();
        var action=$("#action").text();

        if(nombre!=''){
            $.ajax({
                url:"action.php",
                method:"POST",
                data:{nombre:nombre,id:id,action:action},
                success:function(result){
                    console.log("La respuesta fue:")
                    console.log(result);
                alert(result);
                    fetchUnidad();
                }
            })

        }else{
            alert("Falta rellenar campos");
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
        }
    });
})
$(document).on('click','.delete',function(){
    var id=$(this).attr("id");
    if(confirm("Estas seguro de Eliminar esta unidad de medida?")){
        var action="Delete"; 
        $.ajax({
            url:"action.php",
            method:"POST",
            data:{id:id,action:action},
            success:function(result){
                fetchUnidad();
                alert(result);
            }
        })
    }else{
        return false;
    }
})




})
</script>