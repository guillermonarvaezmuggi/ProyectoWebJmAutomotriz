$(document).ready(ini);

function ini(){
    //alert("Iniciado");
    $("#btnregistrar").click(enviarDatos);
}

function enviarDatos(){
    var usuario=$("#usuario").val();
    var contrasena=$("#contrasena").val();
    $('select#rol').on('change',function(){
        var rol = $(this).val();
        alert(rol);
    });
    var nombre=$("#nombre").val();
    var apellidoPaterno=$("#apellidoPaterno").val();
    var apellidoMaterno=$("#apellidoMaterno").val();
    var dni=$("#dni");
    $('select#sexo').on('change',function(){
        var sexo = $(this).val();
        alert(sexo);
    })
    var telefono=$("#telefono").val();
    var domicilio=$("#domicilio").val();
    $.ajax({
        url:"insertar.php",
        success:function(result){
            alert(result);

        },
        data:{
            usuario:usuario,
            contrasena:contrasena,
            nombre:nombre,
            apellidoPaterno:apellidoPaterno,
        },
        type:"GET"
    });
}