<?php

include 'conexion.php';

$id=$_POST['id'];

$no_formato=$_POST['no_formato'];
$no_contenedor=$_POST['no_contenedor'];
$naviera=$_POST['naviera'];
$tipo_contenedor=$_POST['tipo_contenedor'];
$fecha=$_POST['fecha'];
$booking=$_POST['booking'];
$referencia=$_POST['referencia'];
$agencia_aduanal=$_POST['agencia_aduanal'];
$cliente=$_POST['cliente'];
$transportista=$_POST['transportista'];
$unidad=$_POST['unidad'];
$operador=$_POST['operador'];
$observaciones=$_POST['observaciones'];
$hora_comienzo=$_POST['hora_comienzo'];
$peso=$_POST['peso'];
$hora_final=$_POST['hora_final'];
$no_vgm=$_POST['no_vgm'];
$embalaje=$_POST['embalaje'];


if ($conexion ->connect_error) {
    die("Conexion Fallida: " . $conn ->connect_error);
}else{
   
         
        $sql="UPDATE mercancia SET no_formato='$no_formato',no_contenedor='$no_contenedor',naviera='$naviera',tipo_contenedor='$tipo_contenedor',fecha='$fecha',booking='$booking',referencia='$referencia',agencial_aduanal='$agencia_aduanal',cliente='$cliente',transportista='$transportista',unidad='$unidad',operador='$operador',observa='$observaciones',hora_comienzo='$hora_comienzo',peso='$peso',hora_final='$hora_final',no_vgm='$no_vgm',embalaje='$embalaje'  WHERE id='$id'";
        $resultado = $conexion->query($sql);
        if($resultado){
            header("Refresh:0; url=../registro_exitoso.html");
        }else{
            header("Refresh:0; url=../error_registro.html");
        }

    }

?>