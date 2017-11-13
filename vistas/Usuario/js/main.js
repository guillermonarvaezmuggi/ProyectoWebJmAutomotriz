$(document).ready(ini);



function ini(){
    //alert("Iniciado");
    $("#search").on("keyup",function(){
        var search=$("#search").val();
        $.ajax({
            type: 'POST',
            url: 'buscar.php',
            data: {search:search}
        })
        .done(function(resultado){
            $('#result').html(resultado)
        })
        .fail(function(resultado){
            alter('hubo un errror :c')
        })
    })
} 

