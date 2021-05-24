<!-- 
    Author: Willan Mendieta , Darwin Leon
    Date:   20/05/2021
    
-->

<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Crear Nuevo Usuario</title>
 <style type="text/css" rel="stylesheet">
 .error{
 color: red;
 }
 </style>
</head>
<body>
 <?php 
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php'; 
 $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
 $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
 $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
 $direccion = isset($_POST["direccion"]) ? mb_strtoupper(trim($_POST["direccion"]), 'UTF-8') : null;
 $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
 $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
 $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null; 
 $rol = isset($_POST["rol"]) ? mb_strtoupper(trim($_POST["rol"]), 'UTF-8') : null;
 $sql = "INSERT INTO usuarios VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', 
 '$correo', MD5('$contrasena'), 'N', '$fechaNacimiento', null, null, '$rol')"; 


                        

  if ($conn->query($sql) === TRUE) {
  echo "<p>Se ha creado los datos personales correctamemte!!!</p>"; 

  $idTel= "SELECT MAX(usu_id) AS usu_id FROM usuarios";
  $resultId = $conn->query($idTel);
  while($row=$resultId->fetch_assoc()){
      $id=$row['usu_id'];
  }

  $numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : null;
  $tipo = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
  $operadora = isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null;
  $sql2 = "INSERT INTO telefonos VALUES (0, '$numero', '$tipo', '$operadora', 'NO', null, null, $id)"; 
 
                if ($conn->query($sql2) === TRUE) {
                    echo "<p>Se ha creado el telefono correctamemte!!!</p>"; 
                }else {
                    echo "<p aun no registra</p>"; 
                    }

  } else {
  if($conn->errno == 1062){
  echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>"; 
  }else{
  echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
  } 
  }
  
  //cerrar la base de datos
  $conn->close();
  echo "<a href='../../vista/usuario/crear_usuarioA.php'>Regresar</a>";
  ?>
 </body>
 </html>