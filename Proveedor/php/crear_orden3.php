<?php

include 'conexion.php';

$p_bruto=$_POST['p_bruto'];
$unidad=$_POST['unidad'];
$operador=$_POST['operador'];
$p_tara=$_POST['p_tara'];
$p_neto=$_POST['p_neto'];
$transportista=$_POST['transportista'];







if ($conexion ->connect_error) {
    die("Conexion Fallida: " . $conn ->connect_error);
}else{
   
         
        $sql="INSERT INTO buque(peso_bruto,peso_neto,peso_tara,transportista,operador,unidad) VALUES ('$p_bruto','$p_neto','$p_tara','$transportista','$operador','$unidad');";
        $resultado = $conexion->query($sql);
        if($resultado){
           
           header("Refresh:0; url=../registro_exitoso.html");
        }else{
            header("Refresh:0; url=../error_registro.html");
          
        }

    }
?>