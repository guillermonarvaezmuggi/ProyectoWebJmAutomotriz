<?php
$output='';

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["action"])){
    $procedure ="CREATE PROCEDURE selectProducto()
        BEGIN
            SELECT * FROM producto order by idProducto asc;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS selectProducto"))
        {
            if(mysqli_query($con,$procedure)){  
                $query= "CALL selectProducto()";
                $result=mysqli_query($con,$query);
                $output.='
                    <table class="table table-bordered">
                            <tr>
                                <th width=5% >idProducto</th>
                                <th width=5%>idCategoria</th>
                                <th width=5%>idSubCategoria</th>
                                <th width=5%>idMarca</th>
                                <th width=5%>idUnidad</th>
                                <th width=15%%>nombre</th>
                                <th width=10%>descripcion</th>
                                <th width=5%>stock</th>
                                <th width=5%>Precio</th>
                                <th width=10%>Observacion</th>
                                <th width=10%>Update</th>
                                <th width=10%>Delete</th>

                         </tr>
                ';
                   if(mysqli_num_rows($result)>0){
                    while($row =mysqli_fetch_array($result)){
                        $output.='
                            <tr>
                                <td>'.$row["idProducto"] .'</td>
                                <td>'. $row["idCategoria"] .'</td>
                                <td>'. $row["idSubCategoria"] .'</td>
                                <td>'. $row["idMarca"] .'</td>
                                <td>'. $row["idUnidad"] .'</td>
                                <td>'. $row["nombre"] .'</td>
                                <td>'. $row["descripcion"] .'</td>
                                <td>'. $row["stock"] .'</td>
                                <td>'. $row["precio"] .'</td>
                                <td>'. $row["observacion"] .'</td>
                                <td><button type="button"
                                    name="update" id="'.$row["idProducto"].'"s
                                    class="update btn btn-success btn-xs" data-toggle="modal" data-target="#myModal">Update
                                    </button></td>
                                    <td><button type="button"
                                    name="delete" id="'.$row["idProducto"].'"s
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
