<!-- 
    Author: Willan Mendieta  
    Date:   20/05/2021
    
-->
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8" language="es">
        <meta http-equiv="content-type" content="text/html1; charset-=iso-8859-1"/>
    <title>Practica-01-HTML5-Y-CSS2</title>

    <link href="../../../config/css/index.css"  rel="stylesheet"/>
    <link href="../../../config/css/textos.css" rel="stylesheet"/>
    
	<head>
      
        <header>
            <img id="logo" src="../../../config/imagenes/telefono.png" alt="../index.html" />
            <h1>Agenda Telefonica</h1>

            </nav>
            <nav> 
                <ul id="navUsuariosAdmi"> 
                <li><a href="../">Agregar Usuario</a></li> 
                <li><a href="../">Modificar Usuario</a></li> 
                <li><a href="../">Eliminar Usuario</a></li> 
                <li><a href="../">Buscar Usuario</a></li> 
                <li><a href="../">Listar Usuario</a></li> 
                <li><a href="../">Cambiar Contraseña</a></li> 
                </ul> 
            </nav>
        </header>
          
		<body>
            <section>
            
                <article id="BloqueDeBajoMenu">
                    <form id="formulario01" method="POST" action="../controladores/crear_usuario.php">

                    <label for="cedula">Cedula (*)</label>
                    <input type="text" id="cedula" name="cedula" value="" placeholder="Ingrese el número de cedula ..."
                    required/>
                    <br>
                    
                    <label for="nombres">Nombres (*)</label>
                    <input type="text" id="nombres" name="nombres" value="" placeholder="Ingrese sus dos nombres ..." required/>
                    <br>
                    
                    <label for="apellidos">Apelidos (*)</label>
                    <input type="text" id="apellidos" name="apellidos" value="" placeholder="Ingrese sus dos apellidos ..." required/>
                    <br>

                    <label for="direccion">Dirección (*)</label>
                    <input type="text" id="direccion" name="direccion" value="" placeholder="Ingrese su dirección ..."required/>
                    <br>

                    <label for="correo">Correo electrónico (*)</label>
                    <input type="email" id="correo" name="correo" value="" placeholder="Ingrese su correo electrónico ..." required/>
                    <br>
                    
                    <label for="correo">Contraseña (*)</label>
                    <input type="password" id="contrasena" name="contrasena" value="" placeholder="Ingrese su contraseña ..." required/>
                    <br>
                    
                    <label for="fecha">Fecha Nacimiento (*)</label>
                    <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="" placeholder="Ingrese su fecha de nacimiento ..." required/>
                    <br>
                    
                    <label for="Rol">Rol de usuario (*)</label>
                    <input type="text" id="Rol" name="Rol" value="" placeholder="Ingrese el rol del usuario ..."required/>
                    <br>
                    

                    <input type="submit" id="crear" name="crear" value="Agregar Usuario" />
                    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
                    </form>
    	        </article>
            </section>

        <footer id="Pie">
            Nombre:Willan Mendieta Correo: <a href="Correo: wmendietam@est.ups.edu.ec">wmendietam@est.ups.edu.ec</a> tel: <a href="tel: 0980158835">0980158835 </a></p>
            <div id="copyright">Copyright&copy; 2021 - Página creada por Willan Mendieta - Todos los derechos reservados</div>
           
         </footer>
		</body>
</html>