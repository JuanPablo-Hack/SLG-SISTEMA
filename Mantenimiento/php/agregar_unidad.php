<?php

include 'conexion.php';

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
   
        
        $sql="INSERT INTO unidades(modelo,ano,color,placas,noeconomico,capacidad,tipounidad,tipocombustible,serie,descripcion) VALUES ('$modelo','$ano','$color','$placas','$no_economico','$capacidad','$tipo_unidad','$tipo_combustible','$serie','$descripcion')";
        $resultado = $conexion->query($sql);
        if($resultado){
            header("Refresh:0; url=../registro_exitoso.html");
        }else{
            header("Refresh:0; url=../error_registro.html");
        }

    }
  




?>