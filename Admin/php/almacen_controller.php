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
    echo "Todo bien procedemos a guardar";
    // include 'conexion.php';
    // $sql = "INSERT INTO actividad (id_clasificacion, id_categoria, nombre) VALUES ('$clasi','$cat','$descrip');";
    // $resultado = $conexion->query($sql);
    // if ($resultado) {
    //     echo 1;
    // } else {
    //     echo 2;
    // }
}
function editar_material($id, $cliente, $fecha, $hora, $mercancia, $presentacion_mercancia, $pedimento, $tipo_operacion, $transportista, $operador, $placas_tracto, $placas_remolque, $no_caja, $tipo_contenedor, $no_sello, $nombre_producto, $cantidad, $descripcion, $firma_operador, $firma_supervisor)
{

    // include 'conexion.php';
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
    echo "Se hará la salida";
    // include 'conexion.php';
    // $sql = "UPDATE actividad SET id_clasificacion='$clasi', id_categoria='$cat', nombre='$descrip' WHERE id='$id'";
    // $resultado = $conexion->query($sql);
    // if ($resultado) {
    //     echo 1;
    // } else {
    //     echo 2;
    // }
}
function eliminar_material($id)
{
    include './conexion.php';
    $sql = "DELETE FROM actividad WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
