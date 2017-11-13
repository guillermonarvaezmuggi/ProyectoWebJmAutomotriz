
<?php
include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");
$sql = "SELECT *FROM Rol";
$resultado= mysqli_query($con,$sql);

$cnn2= new Conexion();
$con2=$cnn2->conectar();

mysqli_select_db($con2,"jmAutomotrizEIRL");
$sql2="SELECT * FROM usuario";
$resultado2=mysqli_query($con2,$sql2);
?>
<!DOCTYPE html>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar Usuarios</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/code.js"></script>
  
</head>
<body>
   
       <div>
        <h1>Datos Usuario:</h1>
        <label>Usuario :</label>
        <input type="text" name="usuario" id="usuario">
        <br></br>
        <label> Contraseña:</label>
        <input type="password" name="contrasena" id="contrasena">
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
        <select name="rol" id="rol">
        <OPTION selected="selected">--seleccione--
        <?php while($row = $resultado->fetch_assoc()){ ?>
        <option value="<?php echo $row['idRol']; ?>">
        <?php echo $row['nombre'];?></option>
        <?php } ?>  
        </select>



        <h1>Datos Personales:</h1>
        <Label> Nombre:</label>
        <input type="text" name="nombre" id="nombre">
        <br></br>
        <Label> Apellido Paterno:</label>
        <input type="text" name="apellidoPaterno" id="apellidoPaterno">
        <br></br>
        <Label> Apellido Materno:</label>
        <input type="text" name="apellidoMaterno" id="apellidoMaterno">
        <br></br>
        <Label> Dni:</label>
        <input type="text" name="dni" id="dni">
        <br></br>
        <Label> Sexo:</label>
        <select name="sexo" id="sexo">
        <OPTION selected="selected">--seleccione--
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
        </select>
        <br></br>
        <Label> Télefono:</label>
        <input type="text" name="telefono"id="telefono">
        <br></br>
        <Label> Domicilio:</label>
        <input type="text" name="domicilio" id="domicilio"> 
        <input type="button" value="registrar" id="btnregistrar">
        </div>
        <div>
            <label for="caja_busqueda">Buscar:</label>
            <input type="text" name="caja_busqueda"
            id="caja_busqueda"></input>
        </div>

        <div id="result">
                        <h1>aca debe crearse</h1>
        </div>

        

















        
        <table border="1">
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
                <td>FechaRegsitro</td>
                </tr>
                <?php while($row2 = $resultado2->fetch_assoc()){ ?>
                <tr>
                <td> <?php echo $row2['idUsuario'] ?>  </td>
                <td> <?php echo $row2['idRol'] ?> </td>
                <td> <?php echo $row2['usuario'] ?> </td>
                <td> <?php echo $row2['contrasena'] ?> </td>
                <td> <?php echo $row2['nombre'] ?> </td>
                <td> <?php echo $row2['apellidoPaterno'] ?> </td>
                <td> <?php echo $row2['apellidoMaterno'] ?> </td>
                <td> <?php echo $row2['dni'] ?> </td>
                <td> <?php echo $row2['sexo'] ?> </td>
                <td> <?php echo $row2['telefono'] ?> </td>
                <td> <?php echo $row2['domicilio'] ?> </td>
                <td> <?php echo $row2['fechaRegistro'] ?> </td>
                </tr>
        <?php 
        }
        ?>
        </table>
        
</body>
</html>