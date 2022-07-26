<?php

include 'conexion.php';

$fecha=$_POST['fecha'];
$hora=$_POST['mina'];
$unidad=$_POST['unidad'];
$operador=$_POST['operador'];
$no_viaje=$_POST['p_tara'];
$peso=floatval($_POST['p_burto']);
$transporte=$_POST['p_neto'];
$lote=$_POST['lote'];







if ($conexion ->connect_error) {
    die("Conexion Fallida: " . $conn ->connect_error);
}else{
   
         
        $sql="INSERT INTO viajes(fecha,hora,unidad,operador,no_viaje,peso,transportista,no_lote) VALUES ('$fecha','$hora','$unidad','$operador','$no_viaje','$peso','$transporte','$lote');";
        $resultado = $conexion->query($sql);
        if($resultado){
            header("Refresh:0; url=../registro_exitoso.html");
        }else{
            header("Refresh:0; url=../error_registro.html");
        }

    }
?>