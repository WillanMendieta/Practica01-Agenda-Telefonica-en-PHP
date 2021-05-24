<!DOCTYPE html>
    <html>
    <head>
    <meta charset="UTF-8">
    <title>Eliminar Telefono</title> 
    </head>
    <body>

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

                    <label for="operadora">Operadora (*)</label>
                    <input type="text" id="operadora" name="operadora" value="<?php echo $row["tel_operadora"]; ?>"  disabled/>
                    <br>
    
    <input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
    <input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
    </form> 
    <?php
    }
    } else { 
    echo "<p>Ha ocurrido un error inesperado !</p>";
    echo "<p>" . mysqli_error($conn) . "</p>";
    }
    $conn->close(); 
    ?> 
    </body>
</html>