<!-- 
    Author: Willan Mendieta , Darwin Leon
    Date:   20/05/2021
    
-->
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" language="es">
        <meta http-equiv="content-type" content="text/html1; charset-=iso-8859-1"/>
    <title>Home</title>

    <link href="../../../config/css/index.css"  rel="stylesheet"/>
    <link href="../../../config/css/textos.css" rel="stylesheet"/>
    <script type="text/javascript" src="../../../config/validaciones.js"></script>

<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
 header("Location: ../../../public/vista/login.html"); 
 }

?>

  
	<head>
      
        <header>
        <a href= "crear_usuarioA.php"> <img id="logo" src="../../../config/imagenes/telefono.png"/></a>
            
            <h1>Agenda Telefonica</h1>

            </nav>
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
                    $codigo = $_GET["codigoT"];
                    ?>

                    <form id="formulario01" method="POST" action="../../controladores/usuario/agregarTel.php">

                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

                    <label for="numero">Numero (*)</label>
                    <input type="text" id="numero" name="numero" value="" placeholder="Ingrese el número de telefono ... " onkeyup="return validarNumeros(this) " required/>
                    <br>
                    
                    <label for="tipo">Tipo (*)</label>
                      <select id="selectT" name="selectT" onsubmit="tipo()">
                        <option value="1" selected>Seleccione un rol</option>
                        <option value="Celular">Celular</option>
                        <option value="Convencional">Convencional</option>
                    </select>
                    <span id="mensajeRol" class="error"></span>
                    <br>

                    <label for="operadora">Operadora (*)</label>
                    <input type="text" id="operadora" name="operadora" value="" placeholder="Ingrese su operadora ..." required/>
                    <br>
                    
                    <input id="boton_aceptar" type="submit" id="crear" name="crear" value="Agregar Telefono" />
                    <input id="boton_cancelar" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
                    </form>
    	        </article>
            </section>

        <footer id="Pie">
            Integrantes:Willan Mendieta  Correo:<a href="mailto: wmendietam@est.ups.edu.ec">wmendietam@est.ups.edu.ec</a> tel: <a href="tel: 0980158835 "> 0998113193 </a></p>
            Darwin Leon Correo: <a href="mailto: dleont@est.ups.edu.ec">dleont@est.ups.edu.ec</a> tel: <a href="tel: 0998113193"> 0998113193 </a></p>
            <div id="copyright">Copyright&copy; 2021 - Página creada por Willan Mendieta y Darwin Leon - Todos los derechos reservados</div>
           
         </footer>
		</body>
</html>