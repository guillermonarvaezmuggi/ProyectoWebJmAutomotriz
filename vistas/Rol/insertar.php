<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/controlador/RolesControlador.php");

if(isset($_GET["rol"])){
    $rolcon= new RolesControlador();
    if($rolcon->insertarRoles($_GET["rol"])){
        echo $_GET["rol"]."<br>";
    }
    else{
        echo "false";
    }
}
else{
    echo "false";
}


?>