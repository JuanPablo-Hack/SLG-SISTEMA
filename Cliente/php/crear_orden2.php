<?php

include 'conexion.php';

$tipo_ser=$_POST['tipo_ser'];

if($tipo_ser=='1'){
    $folio=$_POST['folio'];
    $cliente=$_POST['cliente'];
    $fecha=$_POST['fecha'];
    $ubicacion=$_POST['ubicacion'];
    /// Variantes
    $no_contenedor=$_POST['no_contenedor'];
    $tipo_mercancia=$_POST['tipo_mercancia'];
    $no_pedimento=$_POST['no_pedimento'];
    $tipo_contenedor=$_POST['tipo_contenedor'];
    $sello=$_POST['sello'];
    $no_vgm=$_POST['no_vgm'];
    ////////////////////////////////
    $naviera=$_POST['naviera'];
    $booking=$_POST['booking'];
    $agencia_aduanal=$_POST['agencia_aduanal'];
    $transportista=$_POST['transportista'];
    $unidad=$_POST['unidad'];
    $operador=$_POST['operador'];
    $hora_comienzo=$_POST['hora_comienzo'];
    $hora_final=$_POST['hora_final'];
    $peso=$_POST['peso'];
    $imo_id=$_POST['imo_id'];
    $imo_desc=$_POST['imo_desc'];
    $recibe=$_POST['recibe'];
    $entrega=$_POST['entrega'];
    $observaciones=$_POST['observaciones'];


}
if($tipo_ser=='2'){
    $folio=$_POST['folio'];
    $cliente=$_POST['cliente'];
    $fecha=$_POST['fecha'];
    $ubicacion=$_POST['ubicacion'];
    /// Variantes
    $no_contenedor=$_POST['no_contenedor'];
    ////////////////////////////////
    $naviera=$_POST['naviera'];
    $booking=$_POST['booking'];
    $agencia_aduanal=$_POST['agencia_aduanal'];
    $transportista=$_POST['transportista'];
    $unidad=$_POST['unidad'];
    $operador=$_POST['operador'];
    $hora_comienzo=$_POST['hora_comienzo'];
    $hora_final=$_POST['hora_final'];
    $peso=$_POST['peso'];
    $imo_id=$_POST['imo_id'];
    $imo_desc=$_POST['imo_desc'];
    $recibe=$_POST['recibe'];
    $entrega=$_POST['entrega'];
    $observaciones=$_POST['observaciones'];

}
if($tipo_ser=='3'){
    $folio=$_POST['folio'];
    $cliente=$_POST['cliente'];
    $fecha=$_POST['fecha'];
    $ubicacion=$_POST['ubicacion'];
    /// Variantes
    $tipo_merca=$_POST['tipo_merca'];
    $pedimento=$_POST['pedimento'];
    $embalaje=$_POST['embalaje'];
    $paletas=$_POST['paletas'];
    ////////////////////////////////
    $naviera=$_POST['naviera'];
    $booking=$_POST['booking'];
    $agencia_aduanal=$_POST['agencia_aduanal'];
    $transportista=$_POST['transportista'];
    $unidad=$_POST['unidad'];
    $operador=$_POST['operador'];
    $hora_comienzo=$_POST['hora_comienzo'];
    $hora_final=$_POST['hora_final'];
    $peso=$_POST['peso'];
    $imo_id=$_POST['imo_id'];
    $imo_desc=$_POST['imo_desc'];
    $recibe=$_POST['recibe'];
    $entrega=$_POST['entrega'];
    $observaciones=$_POST['observaciones'];
}
if($tipo_ser=='4'){
    $folio=$_POST['folio'];
    $cliente=$_POST['cliente'];
    $fecha=$_POST['fecha'];
    $ubicacion=$_POST['ubicacion'];
    /// Variantes
    $lote=$_POST['lote'];
    $tipo_merca=$_POST['tipo_merca'];
    $sello=$_POST['sello'];
    $estado_merca=$_POST['estado_merca'];
    ////////////////////////////////
    $naviera=$_POST['naviera'];
    $booking=$_POST['booking'];
    $agencia_aduanal=$_POST['agencia_aduanal'];
    $transportista=$_POST['transportista'];
    $unidad=$_POST['unidad'];
    $operador=$_POST['operador'];
    $hora_comienzo=$_POST['hora_comienzo'];
    $hora_final=$_POST['hora_final'];
    $peso=$_POST['peso'];
    $imo_id=$_POST['imo_id'];
    $imo_desc=$_POST['imo_desc'];
    $recibe=$_POST['recibe'];
    $entrega=$_POST['entrega'];
    $observaciones=$_POST['observaciones'];
}
if($tipo_ser=='5'){
    $folio=$_POST['folio'];
    $cliente=$_POST['cliente'];
    $fecha=$_POST['fecha'];
    $ubicacion=$_POST['ubicacion'];
    /// Variantes
    $no_contenedor=$_POST['no_contenedor'];
    $no_pedimento=$_POST['no_pedimento'];
    $embalaje=$_POST['embalaje'];
    $trincado=$_POST['trincado'];
    $dimensiones=$_POST['dimensiones'];
    $no_piezas=$_POST['no_piezas'];
    $descrip_merca=$_POST['descrip_merca'];
    ////////////////////////////////
    $naviera=$_POST['naviera'];
    $booking=$_POST['booking'];
    $agencia_aduanal=$_POST['agencia_aduanal'];
    $transportista=$_POST['transportista'];
    $unidad=$_POST['unidad'];
    $operador=$_POST['operador'];
    $hora_comienzo=$_POST['hora_comienzo'];
    $hora_final=$_POST['hora_final'];
    $peso=$_POST['peso'];
    $imo_id=$_POST['imo_id'];
    $imo_desc=$_POST['imo_desc'];
    $recibe=$_POST['recibe'];
    $entrega=$_POST['entrega'];
    $observaciones=$_POST['observaciones'];
}
if($tipo_ser=='6'){
    $folio=$_POST['folio'];
    $cliente=$_POST['cliente'];
    $fecha=$_POST['fecha'];
    $ubicacion=$_POST['ubicacion'];
    /// Variantes
    $no_iso=$_POST['no_iso'];
    $no_pedimento=$_POST['no_pedimento'];
    $sello=$_POST['sello'];
    $encuentra=$_POST['encuentra'];
    if($encuentra=='1'){
        $contenido=$_POST['contenido'];
        $vgm=$_POST['vgm'];
    }else{
        $tipo_limpieza=$_POST['tipo_limpieza'];   
    }
    ////////////////////////////////
    $naviera=$_POST['naviera'];
    $booking=$_POST['booking'];
    $agencia_aduanal=$_POST['agencia_aduanal'];
    $transportista=$_POST['transportista'];
    $unidad=$_POST['unidad'];
    $operador=$_POST['operador'];
    $hora_comienzo=$_POST['hora_comienzo'];
    $hora_final=$_POST['hora_final'];
    $peso=$_POST['peso'];
    $imo_id=$_POST['imo_id'];
    $imo_desc=$_POST['imo_desc'];
    $recibe=$_POST['recibe'];
    $entrega=$_POST['entrega'];
    $observaciones=$_POST['observaciones'];
}


if ($conexion ->connect_error) {
    die("Conexion Fallida: " . $conn ->connect_error);
}else{
   
         
        $sql="INSERT INTO mercancia(no_formato,no_contenedor,naviera,tipo_contenedor,fecha,booking,referencia,agencia_aduanal,cliente,transportista,unidad,operador,observa,hora_comienzo,peso,hora_final,no_vgm,no_lote,embalaje) VALUES ('$no_formato','$no_contenedor','$naviera','$tipo_contenedor','$fecha','$booking','$referencia','$agencia_aduanal','$cliente','$transportista','$unidad','$operador','$observaciones','$hora_comienzo','$peso','$hora_final','$no_vgm','$no_lote','$embalaje');";
        $resultado = $conexion->query($sql);
        if($resultado){
            header("Refresh:0; url=../registro_exitoso.html");
        }else{
            header("Refresh:0; url=../error_registro.html");
        }

    }
?>