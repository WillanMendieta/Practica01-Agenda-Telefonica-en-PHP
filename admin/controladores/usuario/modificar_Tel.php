<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Modificar datos de persona </title>
</head>
<body>
<?php
 session_start();
 if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){ 
 header("Location: ../../../public/vista/login.html"); 
 }

?>
<?php 
 //incluir conexión a la base de datos
 include '../../../config/conexionBD.php';  
 $codigo = $_POST["codigo"];
 $numero = isset($_POST["numero"]) ? trim($_POST["numero"]) : null;
 $tipo = isset($_POST["tipo"]) ? mb_strtoupper(trim($_POST["tipo"]), 'UTF-8') : null;
 $operadora = isset($_POST["operadora"]) ? mb_strtoupper(trim($_POST["operadora"]), 'UTF-8') : null;
 date_default_timezone_set("America/Guayaquil");
 $fecha = date('Y-m-d H:i:s', time());
 $sql = "UPDATE telefonos " .
 "SET tel_numero = '$numero', " .
 "tel_tipo = '$tipo', " .
 "tel_operadora = '$operadora', " . 
 "tel_fecha_modificacion = '$fecha' " .
 "WHERE tel_id = $codigo";
 if ($conn->query($sql) === TRUE) {
 echo "Se ha actualizado los datos personales correctamemte!!!<br>"; 
 } else { 
 echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>"; 
 }
 echo "<a href='../../vista/usuario/crear_usuarioA.php'>Regresar</a>";
 $conn->close();
?>
</body>
</html>