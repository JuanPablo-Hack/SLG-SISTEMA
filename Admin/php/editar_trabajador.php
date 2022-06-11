<?php

include 'conexion.php';

$id=$_POST['identificador'];
$nombre=$_POST['nombre'];
$curp=$_POST['curp'];
$rfc=$_POST['rfc'];
$nss=$_POST['nss'];
$cargo=$_POST['cargo'];
$user=$_POST['user'];
$contra=sha1($_POST['contra']);
$recontra=sha1($_POST['recontra']);




if ($conexion ->connect_error) {
    die("Conexion Fallida: " . $conn ->connect_error);
}else{
    if($contra==$recontra){
        $sql="UPDATE trabajador SET nombre='$nombre',curp='$curp',rfc='$rfc',nss='$nss',cargo='$cargo',user='$user',pwd='$contra'  WHERE id='$id'";
        $resultado = $conexion->query($sql);
        if($resultado){
            header("Refresh:0; url=../registro_exitoso.html");
        }else{
           
            header("Refresh:0; url=../error_registro.html");
        }

    }else{
        
        header("Refresh:0; url=../error_contras.html");
    }
  

}


?>