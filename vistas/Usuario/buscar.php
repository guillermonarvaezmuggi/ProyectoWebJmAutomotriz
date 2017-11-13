
<?php
include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");

$cnn= new Conexion();
$con=$cnn->conectar();

$sql="SELECT *FROM usuario ORDER BY idUsuario";

if(isset($_POST['search'])){
    //esto se hace para validar si existe lo que le pararemos
    //como parametro
    $q=$con->real_escape_string($_POST['search']);
    $sql = "SELECT * FROM usuario
    WHERE usuario LIKE '%".$q."%'";
$resultado = mysqli_query($con,$sql);
if($resultado->num_rows>0){
    
    $salida.="<table class='table'>
    <thead>
    <tr>
    <td>Id</td>
    <td>Rol</td>
    <td>Usuario</td>
    <td>Contraseña</td>
    <td>Nombre</td>
    <td>Apellido Paterno</td>
    <td>Apellido Materno</td>
    <td>Dni</td>
    <td>Sexo</td>
    <td>Teléfono</td>
    <td>Domicilio</td>
    <td>Fecha de Regsitro</td>
    </tr>
    </thead>
    <tbody>";
    while($row2 = $resultado->fetch_assoc()){
        $salida.=" <tr>
        <td> " .$row2['idUsuario']. " </td>
        <td> " .$row2['idRol']. "</td>
        <td> " .$row2['usuario']. "</td>
        <td> " .$row2['contrasena']. "</td>
        <td> " .$row2['nombre']. "</td>
        <td> " .$row2['apellidoPaterno']. "</td>
        <td> " .$row2['apellidoMaterno']. "</td>
        <td> " .$row2['dni']. "</td>
        <td> " .$row2['sexo']. "</td>
        <td> " .$row2['telefono']. "</td>
        <td> " .$row2['domicilio']. "</td>
        <td> " .$row2['fechaRegistro']. "</td>
        </tr>";
    }

    $salida.="</tbody></table>";
}else{
    $salida.="No hay datos :c";
}

echo $salida;


}

?>