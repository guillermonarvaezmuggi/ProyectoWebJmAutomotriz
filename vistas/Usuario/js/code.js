$(document).ready(ini);

function ini(){
    //alert("Iniciado");
    $("#btnregistrar").click(enviarDatos);
}

function enviarDatos(){
    var usuario=$("#usuario").val();
    var contrasena=$("#contrasena").val();
    var rol=$("#rol").val();
    /*
    $('#rol').on('change',function(){
        var rol = $(this).val();
        alert(rol);
    });
    */
    var nombre=$("#nombre").val();
    var apellidoPaterno=$("#apellidoPaterno").val();
    var apellidoMaterno=$("#apellidoMaterno").val();
    var dni=$("#dni").val();
    var sexo = $("#sexo").val();
    /*
    $('select#sexo').on('change',function(){
        var sexo = $(this).val();
        alert(sexo);
    })
    */
    var telefono=$("#telefono").val();
    var domicilio=$("#domicilio").val();
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
    $.ajax({
        url:"insertar.php",
        success:function(result){
            alert(result);

        },
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
            domicilio:domicilio
        },
        type:"GET"
    });
}