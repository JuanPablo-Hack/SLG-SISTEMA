<?php

include 'conexion.php';

$id=$_POST['id'];

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
   
         
        $sql="UPDATE viajes SET fecha='$fecha',hora='$hora',unidad='$unidad',operador='$operador',no_viaje='$no_viaje',peso='$peso',transportista='$transporte',no_lote='$lote'  WHERE id='$id'";
        $resultado = $conexion->query($sql);
        if($resultado){
            header("Refresh:0; url=../registro_exitoso.html");
        }else{
            header("Refresh:0; url=../error_registro.html");
        }

    }

?>