<?php
include "../entidades/Usuario.php";
include "Conexion.php";

Class UsuariosDatos{
    function insertarUsuarios($idRol,
    $usuario,$contrasena,$nombre,$apellidoPaterno,
    $apellidoMaterno,$dni,$telefono,$domicilio
    ){
        $cnn = new Conexion();
        $con = $cnn->conectar();
        $usuarios= new Usuario();
        $usuarios->idRol=$idRol;
        $usuarios->usuario=$usuario;
        $usuarios->contrasena=$contrasena;
        $usuarios->nombre=$nombre;
        $usuarios->apellidoPaterno=$apellidoPaterno;
        $usuarios->apellidoMaterno=$apellidoMaterno;
        $usuarios->dni =$dni;
        $usuarios->telefono=$telefono;
        $usuarios->domicilio=$domicilio;
        mysqli_select_db($con,"jmAutomotrizEIRL");
        $sql="INSERT INTO usuario(idRol,usuario,contrasena,
        nombre,apellidoPaterno,apellidoMaterno,dni,telefono,
        domicilio) VALUES (
        '". $usuarios->idRol ."',    
        '". $usuarios->usuario ."',
        '". $usuarios->contrasena ."',
        '". $usuarios->nombre ."',
        '". $usuarios->apellidoPaterno ."',
        '". $usuarios->apellidoMaterno ."',
        '". $usuarios->dni ."',
        '". $usuarios->telefono ."',
        '". $usuarios->domicilio ."'
        )";
        if(mysqli_query($con,$sql)){
            return  true;
        }
        else{
            return false;
        }
        mysqli_close($con);
        
    }
}

$obj= new UsuariosDatos();
if($obj->insertarUsuarios(1,"20140896@aloe.ulima.edu.pe",
"CRFXDH","Guillermo Eduardo","Narvaez","Muggi",
"73892746",980545386,"Av.Manuel Gonzales Prada 768 
Urb. Villa Los Angeles")){
    echo "todo va bien";
}
else{
    echo "no va bien";
}

?>