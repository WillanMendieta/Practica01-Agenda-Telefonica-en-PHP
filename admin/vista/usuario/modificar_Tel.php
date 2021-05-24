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


                <?php
                    $codigo = $_GET["codigo"];
                    $sql = "SELECT * FROM telefonos where tel_id=$codigo";
                    include '../../../config/conexionBD.php'; 
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                    
                        
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <form id="formulario01" method="POST" action="../../controladores/usuario/modificar_Tel.php">
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    
                    
                    <label for="numero">Numero (*)</label>
                    <input type="text" id="numero" name="numero" value="<?php echo $row["tel_numero"]; ?>" placeholder="Ingrese el número de numero ..."
                    required/>
                    <br>
                    
                    <label for="tipo">Tipo (*)</label>
                    <input type="text" id="tipo" name="tipo" value="<?php echo $row["tel_tipo"]; ?>" placeholder="Ingrese sus dos tipo ..." required/>
                    <br>
                    
                    <label for="operadora">Operadora (*)</label>
                    <input type="text" id="operadora" name="operadora" value="<?php echo $row["tel_operadora"]; ?>" placeholder="Ingrese sus dos operadora ..." required/>
                    <br>
                    
                    <?php
                    }
                    } else { 
                    echo "<p>Ha ocurrido un error inesperado !</p>";
                    echo "<p>" . mysqli_error($conn) . "</p>";
                    }
                    $conn->close(); 
                    ?>
                    <input id="boton_aceptar" type="submit" id="crear" name="crear" value="Guardar" />
                    <input id="boton_cancelar" type="reset" id="cancelar" name="cancelar" value="Cancelar" OnClick="location.href='../../vista/usuario/crear_usuarioA.php' ">

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