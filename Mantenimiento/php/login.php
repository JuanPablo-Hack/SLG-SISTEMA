<?php

session_start();

include './conexion.php';

$user = $_POST['user'];
$password = sha1($_POST['contra']);
echo $password;

if ($conexion ->connect_error) {
    die("Conexion Fallida: " . $conn ->connect_error);
}else{
   $sql="SELECT * FROM admin WHERE user='$user'";
   $resultado = $conexion->query($sql);
   if($resultado){
        $row = mysqli_fetch_assoc($resultado);
        $hash = $row['contra'];
        if($hash==$password){
            //$_SESSION['email'] = $correo;	
	        //Redirecciono al usuario a la página principal del sitio.
	        header("HTTP/1.1 302 Moved Temporarily"); 
            header("Location: ../index.html");
        }else{
            
            header("Refresh:0; url=../error_login.html");
        }
   }else{
     header("Refresh:0; url=../error_login.html");
   }
}






?>