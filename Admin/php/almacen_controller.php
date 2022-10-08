<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_material($_POST['cliente'], $_POST['fecha'], $_POST['hora'], $_POST['mercancia'], $_POST['presentacion_mercancia'], $_POST['pedimento'], $_POST['tipo_operacion'], $_POST['transportista'], $_POST['operador'], $_POST['placas_tracto'], $_POST['placas_remolque'], $_POST['no_caja'], $_POST['tipo_contenedor'], $_POST['no_sello'], $_POST['nombre_producto'], $_POST['cantidad'], $_POST['descripcion'], $_POST['firma'], $_FILES['foto1']['name'], $_FILES['foto2']['name'], $_FILES['foto3']['name'], $_FILES['foto4']['name'], $_FILES['foto5']['name'], $_FILES['foto6']['name']);
        break;
    case 'editar':
        editar_material($_POST['id'], $_POST['cliente'], $_POST['fecha'], $_POST['hora'], $_POST['mercancia'], $_POST['presentacion_mercancia'], $_POST['pedimento'], $_POST['tipo_operacion'], $_POST['transportista'], $_POST['operador'], $_POST['placas_tracto'], $_POST['placas_remolque'], $_POST['no_caja'], $_POST['tipo_contenedor'], $_POST['no_sello'], $_POST['nombre_producto'], $_POST['cantidad'], $_POST['descripcion'], $_POST['firma_operador'], $_POST['firma_supervisor']);
        break;
    case 'salida':
        salida_material($_POST['id_mercancia'], $_POST['transportista'], $_POST['operador'], $_POST['placas_tracto'], $_POST['placas_remolque'], $_POST['no_caja'], $_POST['tipo_contenedor'], $_POST['no_sello'], $_POST['cantidad'], $_POST['unidad_medida'], $_POST['firma'], $_FILES['foto1']['name'], $_FILES['foto2']['name'], $_FILES['foto3']['name'], $_FILES['foto4']['name'], $_FILES['foto5']['name'], $_FILES['foto6']['name']);
        break;
    case 'eliminar':
        eliminar_material($_POST['id']);
        break;
}
function agregar_material($cliente, $fecha, $hora, $mercancia, $presentacion_mercancia, $pedimento, $tipo_operacion, $transportista, $operador, $placas_tracto, $placas_remolque, $no_caja, $tipo_contenedor, $no_sello, $nombre_producto, $cantidad, $descripcion, $firma_operador, $foto1, $foto2, $foto3, $foto4, $foto5, $foto6)
{
    include 'conexion.php';
    $nombreImagenGuardada = decodificarImagen($firma_operador);
    subir_imagenes_ingreso($nombre_producto);
    $sql = "INSERT INTO `ingreso_almacen` (`id_cliente`, `fecha`, `hora`, `id_tipo_mercancia`, `id_presentacion_mercancia`, `no_pedimento`, `id_tipo_operacion`, `transportista`, `operador`, `no_placas_tracto`, `no_placas_remolque`, `no_caja`, `id_tipo_contenedor`, `sello`, `nombre`, `cantidad`, `descripcion`, `firma_supervisor`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`) VALUES ('$cliente', '$fecha', '$hora', '$mercancia', '$presentacion_mercancia', '$pedimento', '$tipo_operacion', '$transportista', '$operador', '$placas_tracto', '$placas_remolque', '$no_caja', '$tipo_contenedor', '$no_sello', '$nombre_producto', '$cantidad', '$descripcion', '$nombreImagenGuardada', '$foto1', '$foto2', '$foto3', '$foto4', '$foto5', '$foto6');";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function editar_material($id, $cliente, $fecha, $hora, $mercancia, $presentacion_mercancia, $pedimento, $tipo_operacion, $transportista, $operador, $placas_tracto, $placas_remolque, $no_caja, $tipo_contenedor, $no_sello, $nombre_producto, $cantidad, $descripcion, $firma_operador, $firma_supervisor)
{

    // include 'conexion.php';
    // $nombreImagenGuardada = decodificarImagen($firma_operador);
    // subir_imagenes_confirmar_imagen($nombre_producto);
    // $sql = "UPDATE actividad SET id_clasificacion='$clasi', id_categoria='$cat', nombre='$descrip' WHERE id='$id'";
    // $resultado = $conexion->query($sql);
    // if ($resultado) {
    //     echo 1;
    // } else {
    //     echo 2;
    // }
}
function salida_material($id, $transportista, $operador, $placas_tracto, $placas_remolque, $no_caja, $tipo_contenedor, $no_sello, $cantidad, $unidad, $firma_operador, $foto1, $foto2, $foto3, $foto4, $foto5, $foto6)
{

    include 'conexion.php';
    $nombreImagenGuardada = decodificarImagen($firma_operador);
    subir_imagenes_salida($id);
    $sql = "INSERT INTO `salidas_almacen` (`id_mercancia`, `transportista`, `operador`, `placas_tracto`, `placas_remolque`, `no_caja`, `tipo_contenedor`, `no_sello`, `cantidad`, `descripcion`, `firma_supervisor`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`) VALUES ('$id', '$transportista', '$operador', '$placas_tracto', '$placas_remolque', '$no_caja', '$tipo_contenedor', '$no_sello', '$cantidad', 'Test tengo que cambiar esto', '$nombreImagenGuardada', '$foto1', '$foto2', '$foto3', '$foto4', '$foto5', '$foto6')";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function eliminar_material($id)
{
    include './conexion.php';
    $sql = "DELETE FROM ingreso_almacen WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}

function decodificarImagen($imagenCodificada)
{
    $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", $imagenCodificada);
    $imagenDecodificada = base64_decode($imagenCodificadaLimpia);
    $nombreImagenGuardada = "imagen_" . uniqid() . ".png";
    $ruta = '../../firmas/';
    $ruta_firma = $ruta . $nombreImagenGuardada;
    if (!file_exists($ruta)) {
        mkdir($ruta, 0777, true);
    }
    file_put_contents($ruta_firma, $imagenDecodificada);
    return $nombreImagenGuardada;
}
function subir_imagenes_ingreso($carpeta)
{

    $ruta_manifiestos = '../../material/ingresos/';
    $ruta_manifiestos_cliente = $ruta_manifiestos . $carpeta . "/";

    if (!file_exists($ruta_manifiestos)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    if (!file_exists($ruta_manifiestos_cliente)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    move_uploaded_file($_FILES['foto1']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto1']['name']);
    move_uploaded_file($_FILES['foto2']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto2']['name']);
    move_uploaded_file($_FILES['foto3']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto3']['name']);
    move_uploaded_file($_FILES['foto4']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto4']['name']);
    move_uploaded_file($_FILES['foto5']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto3']['name']);
    move_uploaded_file($_FILES['foto6']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto4']['name']);
}
function subir_imagenes_salida($carpeta)
{

    $ruta_manifiestos = '../../material/salidas/';
    $ruta_manifiestos_cliente = $ruta_manifiestos . $carpeta . "/";

    if (!file_exists($ruta_manifiestos)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    if (!file_exists($ruta_manifiestos_cliente)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    move_uploaded_file($_FILES['foto1']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto1']['name']);
    move_uploaded_file($_FILES['foto2']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto2']['name']);
    move_uploaded_file($_FILES['foto3']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto3']['name']);
    move_uploaded_file($_FILES['foto4']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto4']['name']);
    move_uploaded_file($_FILES['foto5']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto3']['name']);
    move_uploaded_file($_FILES['foto6']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto4']['name']);
}