<!--
    autor: William Mendieta, Darwin León
    fecha: 25/05/2021
-->

<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Login</title>
 <style type="text/css" rel="stylesheet">
 .error{
 color: red;
 }
 </style>
</head>
<body>
        <?php
        session_start();

        include '../../config/conexionBD.php'; 

        $usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
        $contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
        $sql = "SELECT * FROM usuarios WHERE usu_correo = '$usuario' and usu_contrasena =
        MD5('$contrasena') and usu_rol = 'A'";
         $result = $conn->query($sql); 

        if ($result->num_rows > 0 ) { $_SESSION['isLogged'] = TRUE;

        header("Location: ../../admin/vista/usuario/crear_usuarioA.php");
        }
        else { 

            $sql = "SELECT * FROM usuarios WHERE usu_correo = '$usuario' and usu_contrasena =
            MD5('$contrasena') and usu_rol = 'U'";
             $result2U = $conn->query($sql);
            if($result2U->num_rows > 0 ){
                header("Location: ../vista/crear_usuarioU.html");
            }else{
                header("Location: ../vista/login.html");
                }

            }
        
        $conn->close();
        ?>
 </body>
 </html>