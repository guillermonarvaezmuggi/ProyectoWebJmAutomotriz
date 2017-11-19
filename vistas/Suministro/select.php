<?php
$output='';

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["action"])){
    $procedure ="CREATE PROCEDURE selectSuministro()
        BEGIN
            SELECT * FROM suministro;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS selectSuministro"))
        {
            if(mysqli_query($con,$procedure)){  
                $query= "CALL selectSuministro()";
                $result=mysqli_query($con,$query);
                $output.='
                    <table class="table table-bordered">
                            <tr>
                                <th width=5% >idProducto</th>
                                <th width=5%>idProveedor</th>
                                <th width=5%>cantidad</th>
                                <th width=5%>Fecha del Pedido</th>
                                <th width=5%>Precio</th>
                                <th width=10%>Observacion</th>
                                <th width=10%>Modificar</th>
                                <th width=10%>Eliminar</th>

                         </tr>
                ';
                   if(mysqli_num_rows($result)>0){
                    while($row =mysqli_fetch_array($result)){
                        $output.='
                            <tr>
                                <td>'.$row["idProducto"] .'</td>
                                <td>'. $row["idProveedor"] .'</td>
                                <td>'. $row["cantidad"] .'</td>
                                <td>'. $row["fechaPedido"] .'</td>
                                <td>'. $row["precio"] .'</td>
                                <td>'. $row["observacion"] .'</td>
                                <td><button type="button"
                                    name="update" id="'.$row["idProducto"].'" id2="'.$row["idProveedor"].'"
                                    class="update btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Modificar
                                    </button></td>
                                    <td><button type="button"
                                    name="delete" id="'.$row["idProducto"].'" id2="'.$row["idProveedor"].'"
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
