<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insertar Usuarios</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
        <select name="rol" id="rol">
        <OPTION selected="selected">--seleccione--
        <option value="1">Gerente</option>
        <option value="2">Almacenero</option>
        <option value="3">Cajero</option>
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
    </form>
</body>
</html>