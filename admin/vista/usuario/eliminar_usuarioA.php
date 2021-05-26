<!-- 
    Author: Willan Mendieta , Darwin Leon
    Date:   20/05/2021
    
-->
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" language="es">
        <meta http-equiv="content-type" content="text/html1; charset-=iso-8859-1"/>
    <title>Eliminar datos de Persona<</title>

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
        <a href= "crear_usuarioA.php"> <img id="logo" src="../../../config/imagenes/telefono.png"/></a>
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

                <?php
    
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM usuarios where usu_id=$codigo and usu_eliminado = 'N'";
    
    include '../../../config/conexionBD.php'; 
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
    ?>
    <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar_usuarioA.php">
    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                        
                        <label for="cedula">Cedula (*)</label>
                        <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>"  disabled/>
                        <br>
                        
                        <label for="nombres">Nombres (*)</label>
                        <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>"  disabled/>
                        <br>
                        
                        <label for="apellidos">Apelidos (*)</label>
                        <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>"  disabled/>
                        <br>

                        <label for="direccion">Dirección (*)</label>
                        <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>"  disabled/>
                        <br>

                        <label for="correo">Correo electrónico (*)</label>
                        <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>"  disabled/>
                        <br>

                        <label for="fecha">Fecha Nacimiento (*)</label>
                        <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="<?php echo$row["usu_fecha_nacimiento"]; ?>"  disabled/>
                        <br>

                        <label for="rol">Rol de usuario (*)</label>
                        <input type="text" id="rol" name="rol" value="<?php echo $row["usu_rol"]; ?>"  disabled/>
                        <br>
    
                        <input id="boton_aceptar" type="submit" id="eliminar" name="eliminar" value="Eliminar" />
                        <input id="boton_cancelar" type="reset" id="cancelar" name="cancelar" value="Cancelar" OnClick="location.href='../../vista/usuario/listar_usuarioA.php' " />
                        </form> 
                        <?php
                        }
                        } else { 
                        echo "<p>Ha ocurrido un error inesperado !</p>";
                        echo "<p>" . mysqli_error($conn) . "</p>";
                        }
                        $conn->close(); 
                        ?>

    	        </article>
            </section>

        <footer id="Pie">
            Integrantes:Willan Mendieta  Correo:<a href="mailto: wmendietam@est.ups.edu.ec">wmendietam@est.ups.edu.ec</a> tel: <a href="tel: 0980158835 "> 0998113193 </a></p>
            Darwin Leon Correo: <a href="mailto: dleont@est.ups.edu.ec">dleont@est.ups.edu.ec</a> tel: <a href="tel: 0998113193"> 0998113193 </a></p>
            <div id="copyright">Copyright&copy; 2021 - Página creada por Willan Mendieta y Darwin Leon - Todos los derechos reservados</div>
           
         </footer>
		</body>
</html>