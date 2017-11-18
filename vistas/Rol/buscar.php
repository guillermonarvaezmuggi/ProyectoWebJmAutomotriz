<?php
$output='';

include($_SERVER['DOCUMENT_ROOT']."/ProyectoWebJmAutomotriz/datos/Conexion.php");
$cnn = new Conexion();
$con = $cnn->conectar();

mysqli_select_db($con,"jmAutomotrizEIRL");

if(isset($_POST["busqueda"])){
    $valor=mysqli_real_escape_string($_POST['busqueda']);
    $procedure ="CREATE PROCEDURE searchRol()
        BEGIN
            SELECT * FROM rol;
        END;
        ";
        if(mysqli_query($con,"DROP PROCEDURE IF EXISTS searchRol"))
        {
            if(mysqli_query($con,$procedure)){
                $query= "CALL searchRol()";
                $result=mysqli_query($con,$query);
                $output.='
                    <table class="table table-bordered">
                            <tr>
                                <th width=5% >idRol</th>
                                <th width=15%>Nombre</th>
                                <th width=35%>Update</th>
                                <th width=35%>Delete</th>
                        
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
                                    class="update btn btn-success btn-xs">Update
                                    </button></td>
                                    <td><button type="button"
                                    name="delete" id="'.$row["idRol"].'"s
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