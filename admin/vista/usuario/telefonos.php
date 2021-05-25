<!-- 
    Author: Willan Mendieta , Darwin Leon
    Date:   20/05/2021
    
-->
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" language="es">
        <meta http-equiv="content-type" content="text/html1; charset-=iso-8859-1"/>
    <title>Lista telefonos</title>

    <link href="../../../config/css/index.css"  rel="stylesheet"/>
    <link href="../../../config/css/textos.css" rel="stylesheet"/>

	<head>
      

    <?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
 header("Location: ../../../public/vista/login.html"); 
 }

?>
        <header>
            <img id="logo" src="../../../config/imagenes/telefono.png" alt="../index.html" />
            <h1>Agenda Telefonica</h1>

            <nav> 
                <ul id="navUsuariosAdmi"> 
                <li><a href="crear_usuarioA.php">Agregar Usuario</a></li> 
                <li><a href="../usuario/buscarCedula/buscar.html">Buscar Usuario</a></li> 
                <li><a href="listar_usuarioA.php">Listar Usuarios</a></li>  
                <li><a href="../../../config/cerrar.sesion.php">Cerrar Sesion</a></li> 
                </ul> 
            </nav>
        </header>
          
		<body>
            <section>
            
                <article id="BloqueDeBajoMenu">

                        <table id="tablaUsuarios" style="width:50%">
                        <tr>
                        <th>Numero</th>
                        <th>Tipo</th>
                        <th>Operadora</th>
                        
                        </tr>

                        <?php
                        include '../../../config/conexionBD.php'; 
                        $codigo = $_GET["codigo"];
                        #aparezca todo 
                    #    $sql = "SELECT * FROM telefonos where tel_usuario=$codigo";
                        $sql = "SELECT * FROM telefonos where tel_usuario=$codigo and tel_eliminado = 'NO'";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {

                                                     
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo " <td> <a href=tel:".$row["tel_numero"].">".$row["tel_numero"]."</a> </td>";
                                echo " <td>" . $row['tel_tipo'] ."</td>";
                                echo " <td>" . $row['tel_operadora'] . "</td>";
                                
                                echo " <td> <a href='eliminar_Tel.php?codigo=" . $row['tel_id'] . "'>Eliminar</a> </td>";
                                echo " <td> <a href='modificar_Tel.php?codigo=" . $row['tel_id'] . "'>Modificar</a> </td>";
                                echo " <td> <a href='agregarTel.php?codigoT=" . $row['tel_usuario'] . "'>Agregar Telefonos </a> </td>";
                                echo "</tr>";
                            }
                        } else {
                        echo "<tr>";
                        echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                        echo "</tr>";
                        echo "<tr>";
                        echo " <td> <a href='agregarTel.php?codigoT=" . $row['tel_usuario'] . "'>Agregar Telefonos </a> </td>";
                       # echo " <td> <a href='../../controladores/usuario/agregarTel.php?codigoT=" . $row['tel_usuario'] . "'></a> </td>";
                        echo "</tr>";

                        
                        }
                       
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