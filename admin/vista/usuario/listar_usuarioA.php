<!-- 
    Author: Willan Mendieta , Darwin Leon
    Date:   20/05/2021
    
-->
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" language="es">
        <meta http-equiv="content-type" content="text/html1; charset-=iso-8859-1"/>
    <title>Listar Usuarios</title>

    <link href="../../../config/css/index.css"  rel="stylesheet"/>
    <link href="../../../config/css/textos.css" rel="stylesheet"/>

	<head>
      
        <header>
            <img id="logo" src="../../../config/imagenes/telefono.png" alt="../index.html" />
            <h1>Agenda Telefonica</h1>

            <nav> 
                <ul id="navUsuariosAdmi"> 
                <li><a href="crear_usuarioA.php">Agregar Usuario</a></li> 
                <li><a href="../usuario/buscarCedula/buscar.html">Buscar Usuario</a></li> 
                <li><a href="listar_usuarioA.php">Listar Usuarios</a></li>  
                </ul> 
            </nav>
        </header>
          
		<body>
            <section>
            
                <article id="BloqueDeBajoMenu">

                        <table id="tablaUsuarios" style="width:50%">
                        <tr>
                        <th>Cedula</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Correo</th>
                        <th>Fecha Nacimiento</th> 
                        </tr>

                        <?php
                        include '../../../config/conexionBD.php'; 
                        $sql = "SELECT * FROM usuarios";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                        
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo " <td>" . $row["usu_cedula"] . "</td>";
                                echo " <td>" . $row['usu_nombres'] ."</td>";
                                echo " <td>" . $row['usu_apellidos'] . "</td>";
                                echo " <td>" . $row['usu_direccion'] . "</td>";
                                echo " <td> <a href=mailto:".$row['usu_correo'].">".$row['usu_correo']."</a> </td>";
                                echo " <td>" . $row['usu_fecha_nacimiento'] . "</td>"; 
                                echo " <td> <a href='telefonos.php?codigo=" . $row['usu_id'] . "'>Telefonos</a> </td>";
                                echo " <td> <a href='eliminar.php?codigo=" . $row['usu_id'] . "'>Eliminar</a> </td>";
                                echo " <td> <a href='modificar_usuarioA.php?codigo=" . $row['usu_id'] . "'>Modificar</a> </td>";
                                echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_id'] . "'>Cambiar contraseña</a> </td>";
                                echo "</tr>";
                            }
                            
                        } else {
                        echo "<tr>";
                        echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                        echo "</tr>";
                        }
                        #echo " <td> <a href='../../../config/cerrar_sesion.php'>Cerrar Sesion</a> </td>";

                        $conn->close();
                        ?>
                        </table>
    	        </article>
            </section>

        <footer id="Pie">
            Integrantes:Willan Mendieta  Correo:<a href="Correos: wmendietam@est.ups.edu.ec">wmendietam@est.ups.edu.ec</a> tel: <a href="tel: 0980158835 "> 0998113193 </a></p>
            Darwin Leon Correo: <a href="Correos: dleont@est.ups.edu.ec">dleont@est.ups.edu.ec</a> tel: <a href="tel: 0998113193"> 0998113193 </a></p>
            <div id="copyright">Copyright&copy; 2021 - Página creada por Willan Mendieta y Darwin Leon - Todos los derechos reservados</div>
           
         </footer>
		</body>
</html>