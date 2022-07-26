<?php

include 'conexion.php';

$id=$_POST['id'];


$transportista=$_POST['transportista'];
$unidad=$_POST['unidad'];
$operador=$_POST['operador'];
$peso_tara=$_POST['p_tara'];
$peso_bruto=$_POST['p_bruto'];
$peso_neto=$_POST['p_neto'];

if ($conexion ->connect_error) {
    die("Conexion Fallida: " . $conn ->connect_error);
}else{
   
         
        $sql="UPDATE buque SET peso_bruto='$peso_bruto',peso_neto='$peso_neto',peso_tara='$peso_tara',transportista='$transportista',operador='$operador',unidad='$unidad'  WHERE id='$id'";
        $resultado = $conexion->query($sql);
        if($resultado){
            header("Refresh:0; url=../registro_exitoso.html");
        }else{
            header("Refresh:0; url=../error_registro.html");
        }

    }

?>