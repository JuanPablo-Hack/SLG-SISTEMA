<?php

include 'conexion.php';


$id=$_POST['identificador'];
$modelo=$_POST['modelo'];
$ano=$_POST['ano'];
$color=$_POST['color'];
$placas=$_POST['placas'];
$no_economico=$_POST['no_economico'];
$capacidad=$_POST['capacidad'];
$tipo_unidad=$_POST['tipo_unidad'];
$tipo_combustible=$_POST['tipo_combustible'];
$serie=$_POST['serie'];
$descripcion=$_POST['descripcion'];




if ($conexion ->connect_error) {
    die("Conexion Fallida: " . $conn ->connect_error);
}else{
   
        
        $sql="UPDATE unidades SET modelo='$modelo',ano='$ano',color='$color',placas='$placas',noeconomico='$no_economico',capacidad='$capacidad',tipounidad='$tipo_unidad',tipocombustible='$tipo_combustible',serie='$serie',descripcion='$descripcion'  WHERE id='$id'";
        $resultado = $conexion->query($sql);
        if($resultado){
            header("Refresh:0; url=../registro_exitoso.html");
        }else{
            header("Refresh:0; url=../error_registro.html");
        }

    }
  




?>