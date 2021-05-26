
<?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 $cedula = $_GET['cedula']; 

 $sql = "SELECT * FROM usuarios WHERE usu_eliminado = 'N' and usu_cedula='$cedula'"; 

 $result = $conn->query($sql);
 echo " <table ;>
 <tr>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>Fecha Nacimiento</th> 
                        </tr>";
 if ($result->num_rows > 0) { 
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row["usu_cedula"] . "</td>";
        echo " <td>" . $row['usu_nombres'] ."</td>";
        echo " <td>" . $row['usu_apellidos'] . "</td>";
        echo " <td>" . $row['usu_direccion'] . "</td>";
        echo " <td> <a href=mailto:".$row['usu_correo'].">".$row['usu_correo']."</a> </td>";
        echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>"; 
        echo " <td> <a href='../../admin/vista/usuario/telefonos.php?codigo=" . $row['usu_id'] . "'>Telefonos</a> </td>";
        echo "</tr>";
    }
 } else { 
 echo "<tr>";
 echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
 echo "</tr>"; 
 }
 echo "</table>";
 $conn->close(); 
 
?>