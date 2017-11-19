<?php
$output='';

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["action"])){
    $procedure ="CREATE PROCEDURE selectProveedor()
        BEGIN
            SELECT * FROM proveedor order by idProveedor asc;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS selectProveedor"))
        {
            if(mysqli_query($con,$procedure)){  
                $query= "CALL selectProveedor()";
                $result=mysqli_query($con,$query);
                $output.='
                    <table class="table table-bordered">
                            <tr>
                                <th width=5% >idProveedor</th>
                                <th width=10%>Nombre</th>
                                <th width=10%>Razon Social</th>
                                <th width=10%>Ruc</th>
                                <th width=10%>Teléfono</th>
                                <th width=10%>Teléfono 2</th>
                                <th width=15%%>Dirección</th>
                                <th width=10%>Email 1</th>
                                <th width=15%>Email 2</th>
                                <th width=15%>Página Web</th>
                                <th width=5%>Fecha de Registro</th>
                                <th width=5%>Observaciones</th>
                                <th width=35%>Modificar</th>
                                <th width=35%>Eliminar</th>

                         </tr>
                ';
                   if(mysqli_num_rows($result)>0){
                    while($row =mysqli_fetch_array($result)){
                        $output.='
                            <tr>
                                <td>'.$row["idProveedor"] .'</td>
                                <td>'. $row["nombre"] .'</td>
                                <td>'. $row["razonSocial"] .'</td>
                                <td>'. $row["ruc"] .'</td>
                                <td>'. $row["telefono"] .'</td>
                                <td>'. $row["telefono2"] .'</td>
                                <td>'. $row["direccion"] .'</td>
                                <td>'. $row["email1"] .'</td>
                                <td>'. $row["email2"] .'</td>
                                <td>'. $row["paginaWeb"] .'</td>
                                <td>'. $row["fechaRegistro"] .'</td>
                                <td>'. $row["observaciones"] .'</td>
                                <td><button type="button"
                                    name="update" id="'.$row["idProveedor"].'"s
                                    class="update btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Modificar
                                    </button></td>
                                    <td><button type="button"
                                    name="delete" id="'.$row["idProveedor"].'"s
                                    class="delete btn  btn-danger btn-xs">Eliminar
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
