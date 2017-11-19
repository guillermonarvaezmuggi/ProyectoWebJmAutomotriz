<?php
$output='';

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["action"])){
    $procedure ="CREATE PROCEDURE selectRol()
        BEGIN
            SELECT * FROM rol order by idRol asc;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS selectRol"))
        {
            if(mysqli_query($con,$procedure)){
                $query= "CALL selectRol()";
                $result=mysqli_query($con,$query);
                $output.='
                    <table class="table table-bordered">
                            <tr>
                                <th width=2% >idRol</th>
                                <th width=10%>Nombre</th>
                                <th width=2%>Modificar</th>
                                <th width=2%>Eliminar</th>

                         </tr>
                ';
                   if(mysqli_num_rows($result)>0){
                    while($row =mysqli_fetch_array($result)){
                        $output.='
                            <tr>
                                <td>'.$row["idRol"].'</td>
                                <td>'. $row["nombre"].'</td>
                                <td><button type="button"
                                    name="update" id="'.$row["idRol"].'"s
                                    class="update btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Modificar
                                    </button></td>
                                    <td><button type="button"
                                    name="delete" id="'.$row["idRol"].'"s
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
