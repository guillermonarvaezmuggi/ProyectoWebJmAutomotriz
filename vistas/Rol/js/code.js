$(document).ready(ini);
function ini(){
    $("#btnregistrarRol").click(enviarDatos);
}

function enviarDatos(){
    var rol=$("#rol").val();
console.log(rol);
$.ajax({
    url:"insertar.php",
    success:function(result){
        alert(result);
    },
    data:{
        rol:rol
    },
    type:"GET"
});

}