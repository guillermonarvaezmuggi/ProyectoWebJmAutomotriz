<?php

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");
$sql = "SELECT *FROM Rol";
$resultado= mysqli_query($con,$sql);
?>


<html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>JM Automotriz EIRL</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link    href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="estilos.css" />
    </head>
    <body>
        <div class="container">

            <header>
                <h1></h1>

            </header>
            <section>
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="mysuperscript.php" autocomplete="on">
                                <h1 align="center">Login</h1>
                                <h1 align="center">JM Automotriz E.I.R.L</h1>
                                <p>
                                    <label for="username" class="uname" >Usuario</label>
                                    <input id="username" name="username" required="required" type="text" placeholder="Ingrese su usuario"/>
                                </p>
                                <p>
                                    <label for="password" class="youpasswd">Password</label>
                                    <input id="password" name="password" required="required" type="password" placeholder="Ingrese su password" />
                                </p>
                                <p>
                                <label for="role" class="role" >Rol</label>
                                <select name="rol" id="rol" class="form-control" onchange="this.style.width=200">
        <OPTION selected="selected" class="form-control" required="required">--seleccione--</option>
        <?php while($row = $resultado->fetch_assoc()){ ?>
        <option value="<?php echo $row['idRol']; ?>">
        <?php echo $row['nombre'];?></option>
        <?php } ?>  
        </select>
        </p>
                                
                                <p class="change_link">
									<a href="../Producto/index.php" class="to_register">Iniciar Sesión</a>
								</p>
                            </form>

        </div>



                      
            </section>
        </div>
    </body>
</html>
