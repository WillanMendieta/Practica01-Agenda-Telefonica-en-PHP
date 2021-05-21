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
                <li><a href="../">Buscar Usuario</a></li> 
                <li><a href="listar_usuarioA.php">Listar Usuarios</a></li>  
                </ul> 
            </nav>
        </header>
          
		<body>
            <section>           
                <article id="BloqueDeBajoMenu">


                <?php
                    $codigo = $_GET["codigo"];
                    $sql = "SELECT * FROM usuarios where usu_id=$codigo";
                    include '../../../config/conexionBD.php'; 
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                    
                        
                    while($row = $result->fetch_assoc()) {
                    ?>
                    <form id="formulario01" method="POST" action="../../controladores/usuario/modificar_usuarioA.php">
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
                    
                    <label for="cedula">Cedula (*)</label>
                    <input type="text" id="cedula" name="cedula" value="<?php echo $row["usu_cedula"]; ?>" placeholder="Ingrese el número de cedula ..."
                    required/>
                    <br>
                    
                    <label for="nombres">Nombres (*)</label>
                    <input type="text" id="nombres" name="nombres" value="<?php echo $row["usu_nombres"]; ?>" placeholder="Ingrese sus dos nombres ..." required/>
                    <br>
                    
                    <label for="apellidos">Apelidos (*)</label>
                    <input type="text" id="apellidos" name="apellidos" value="<?php echo $row["usu_apellidos"]; ?>" placeholder="Ingrese sus dos apellidos ..." required/>
                    <br>

                    <label for="direccion">Dirección (*)</label>
                    <input type="text" id="direccion" name="direccion" value="<?php echo $row["usu_direccion"]; ?>" placeholder="Ingrese su dirección ..."required/>
                    <br>

                    <label for="correo">Correo electrónico (*)</label>
                    <input type="email" id="correo" name="correo" value="<?php echo $row["usu_correo"]; ?>" placeholder="Ingrese su correo electrónico ..." required/>
                    <br>
                    
                    <label for="rol">Rol de usuario (*)</label>
                    <input type="text" id="rol" name="rol" value="<?php echo $row["usu_rol"]; ?>" placeholder="Ingrese el rol del usuario ..."required/>
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
                    <input id="boton_cancelar" type="reset" id="cancelar" name="cancelar" value="Cancelar" />
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