<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Cracion de telefonos</title>
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
 $codigo = $_POST["codigo"];

 #$sql = "SELECT * FROM usuarios where usu_id=$codigo";

 $numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : null;
 $tipo = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
 $operadora = isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null;

 $sql = "INSERT INTO telefonos VALUES (0, '$numero', '$tipo', '$operadora', 'NO', null, null, $codigo)"; 
  if ($conn->query($sql) === TRUE) {
  echo "<p>Se ha creado los datos personales correctamemte!!!</p>"; 
  } else {
  if($conn->errno == 1062){
  echo "<p class='error'>La persona con la numero $numero ya esta registrada en el sistema </p>"; 
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