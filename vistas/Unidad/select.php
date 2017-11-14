<?php
$output='';

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["action"])){
    $procedure ="CREATE PROCEDURE selectUnidad()
        BEGIN
            SELECT * FROM unidad order by idUnidad asc;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS selectUnidad"))
        {
            if(mysqli_query($con,$procedure)){
                $query= "CALL selectUnidad()";
                $result=mysqli_query($con,$query);
                $output.='
                    <table class="table table-bordered">
                            <tr>
                                <th width=5% >idUnidad</th>
                                <th width=15%>Nombre</th>
                                <th width=5%>Update</th>
                                <th width=5%>Delete</th>
                        
                         </tr>
                ';
                   if(mysqli_num_rows($result)>0){
                    while($row =mysqli_fetch_array($result)){
                        $output.='
                            <tr>
                                <td>'.$row["idUnidad"].'</td>
                                <td>'. $row["nombre"].'</td>
                                <td><button type="button"
                                    name="update" id="'.$row["idUnidad"].'"s
                                    class="update btn btn-success btn-xs">Update
                                    </button></td>
                                    <td><button type="button"
                                    name="delete" id="'.$row["idUnidad"].'"s
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