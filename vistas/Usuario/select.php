<?php
$output='';

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["action"])){
    $procedure ="CREATE PROCEDURE selectUser()
        BEGIN
            SELECT * FROM usuario order by idUsuario asc;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS selectUser"))
        {
            if(mysqli_query($con,$procedure)){
                $query= "CALL selectUser()";
                $result=mysqli_query($con,$query);
                $output.='
                    <table class="table table-bordered">
                            <tr>
                                <th width=5% >idUsuario</th>
                                <th width=5%>idRol</th>
                                <th width=15%%>Usuario</th>
                                <th width=10%>Contraseña</th>
                                <th width=20%>Nombre</th>
                                <th width=15%>Apellido Paterno</th>
                                <th width=15%>Apellido Materno</th>
                                <th width=5%>dni</th>
                                <th width=5%>Sexo</th>
                                 <th width=15%>Telefono</th>
                                <th width=35%>Domicilio</th>
                                <th width=35%>Fecha de Registro</th>
                                <th width=35%>Update</th>
                                <th width=35%>Delete</th>

                         </tr>
                ';
                   if(mysqli_num_rows($result)>0){
                    while($row =mysqli_fetch_array($result)){
                        $output.='
                            <tr>
                                <td>'.$row["idUsuario"] .'</td>
                                <td>'. $row["idRol"] .'</td>
                                <td>'. $row["usuario"] .'</td>
                                <td>'. $row["contrasena"] .'</td>
                                <td>'. $row["nombre"] .'</td>
                                <td>'. $row["apellidoPaterno"] .'</td>
                                <td>'. $row["apellidoMaterno"] .'</td>
                                <td>'. $row["dni"] .'</td>
                                <td>'. $row["sexo"] .'</td>
                                <td>'. $row["telefono"] .'</td>
                                <td>'. $row["domicilio"] .'</td>
                                <td>'. $row["fechaRegistro"] .'</td>
                                <td><button type="button"
                                    name="update" id="'.$row["idUsuario"].'"s
                                    class="update btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Update
                                    </button></td>
                                    <td><button type="button"
                                    name="delete" id="'.$row["idUsuario"].'"s
                                    class="delete btn  btn-danger btn-xs">Delete
                                    </button></td>
                            </tr>
                        ';
                    }
                }
                else{
                    $output.='
                    <tr>
                        <td colspan="4">Data not found</td>
                     </tr>
                     ';
                }
                $output .='</table>';
                echo $output;
            }
        }
}

?>
