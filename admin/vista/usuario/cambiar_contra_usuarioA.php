<!-- 
    Author: Willan Mendieta , Darwin Leon
    Date:   20/05/2021
    
-->
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" language="es">
        <meta http-equiv="content-type" content="text/html1; charset-=iso-8859-1"/>
    <title>Modificar Usuario</title>

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
                    <?php
                    $codigo = $_GET["codigo"]; 
                    ?>
                    <form id="formulario01" method="POST" action="../../controladores/usuario/cambiar_contra_usuarioA.php">
                    
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    <label for="cedula">Contraseña Actual (*)</label>
                    <input type="password" id="contrasena1" name="contrasena1" value="" requiredplaceholder="Ingrese su contraseña actual ..."/>
                    <br>
                    <label for="cedula">Contraseña Nueva (*)</label>
                    <input type="password" id="contrasena2" name="contrasena2" value="" requiredplaceholder="Ingrese su contraseña nueva ..."/>
                    <br>
                    
                    <input id="boton_aceptar" type="submit" id="modificar" name="modificar" value="Modificar" />
                    <input id="boton_cancelar" type="reset" id="cancelar" name="cancelar" value="Cancelar" OnClick="location.href='../../vista/usuario/listar_usuarioA.php' " />

                    </form>
    	        </article>
            </section>

        <footer id="Pie">
            Integrantes:Willan Mendieta  Correo:<a href="Correos: wmendietam@est.ups.edu.ec">wmendietam@est.ups.edu.ec</a> tel: <a href="tel: 0980158835 "> 0998113193 </a></p>
            Darwin Leon Correo: <a href="Correos: dleont@est.ups.edu.ec">dleont@est.ups.edu.ec</a> tel: <a href="tel: 0998113193"> 0998113193 </a></p>
            <div id="copyright">Copyright&copy; 2021 - Página creada por Willan Mendieta y Darwin Leon - Todos los derechos reservados</div>
           
         </footer>
		</body>
</html>


