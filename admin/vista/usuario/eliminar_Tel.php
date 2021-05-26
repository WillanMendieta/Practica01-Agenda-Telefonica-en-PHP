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
                    $sql = "SELECT * FROM telefonos where tel_id=$codigo and tel_eliminado = 'NO'";
                    
                    include '../../../config/conexionBD.php'; 
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <form id="formulario01" method="POST" action="../../controladores/usuario/eliminar_tel.php">
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                                    
                                    
                    <label for="numero">Numero (*)</label>
                    <input type="text" id="numero" name="numero" value="<?php echo $row["tel_numero"]; ?>"  disabled/>
                    <br>
                    
                    <label for="tipo">Tipo (*)</label>
                    <input type="text" id="tipo" name="tipo" value="<?php echo $row["tel_tipo"]; ?>"  disabled/>
                    <br>
                    
                    <label for="operadora">Operadora (*)</label>
                    <input type="text" id="operadora" name="operadora" value="<?php echo $row["tel_operadora"]; ?>"  disabled/>
                    <br>
                    
                    <input id="boton_aceptar" type="submit" id="eliminar" name="eliminar" value="Eliminar" />
                    <input id="boton_cancelar" type="reset" id="cancelar" name="cancelar" value="Cancelar" OnClick="location.href='../../vista/usuario/listar_usuarioA.php' " />
                    </form> 
                    <?php
                    }
                    } else { 
                    echo "<p>Ha ocurrido un error inesperado o su numero ya se encuentra eliminado!</p>";
                    echo "<p>" . mysqli_error($conn) . "</p>";
                    }
                    $conn->close(); 
                ?> 
               
    	        </article>
            </section>

        <footer id="Pie">
            Integrantes:Willan Mendieta  Correo:<a href="mailto: wmendietam@est.ups.edu.ec">wmendietam@est.ups.edu.ec</a> tel: <a href="tel: 0980158835 "> 0998113193 </a></p>
            Darwin Leon Correo: <a href="mailto:mailto: dleont@est.ups.edu.ec">dleont@est.ups.edu.ec</a> tel: <a href="tel: 0998113193"> 0998113193 </a></p>
            <div id="copyright">Copyright&copy; 2021 - Página creada por Willan Mendieta y Darwin Leon - Todos los derechos reservados</div>
           
         </footer>
		</body>
</html>

