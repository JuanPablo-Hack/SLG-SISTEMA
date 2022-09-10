<?php
switch ($_POST['accion']) {
    case 'agregar':
        crear_mantenimiento($_POST['unidad'], $_POST['operador'], $_POST['taller'], $_POST['factura'], $_POST['descripcion'], $_POST['prox_ser'], $_POST['km'], $_FILES['factura']['name']);
        break;
    case 'editar':
        editarMantenimiento($_POST['identificador'], $_POST['unidad'], $_POST['taller'], $_POST['factura'], $_POST['descripcion'], $_POST['fecha'], $_POST['km']);
        break;
    case 'eliminar':
        eliminar_mantenimiento($_POST['id']);
        break;
}
function crear_mantenimiento($unidad, $operador, $taller, $factura, $descripcion, $fecha, $km, $factura_arch)
{
    include './conexion.php';
    subir_factura($factura);
    $sql = "INSERT INTO registros_mantenimiento (unidad,taller,nofactura,descripcion,fecha,km,operador,factura_arch) VALUES ('$unidad', '$taller', '$factura', '$descripcion', '$fecha', '$km','$operador','$factura_arch');";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 0;
    }
}
function editarMantenimiento($id, $unidad, $taller, $factura, $descripcion, $fecha, $km)
{
    include './conexion.php';
    $sql = "UPDATE registros_mantenimiento SET unidad='$unidad',taller='$taller',nofactura='$factura',descripcion='$descripcion',fecha='$fecha',km='$km' WHERE id='$id'";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo    1;
    } else {
        echo 0;
    }
}
function eliminar_mantenimiento($id)
{
    include './conexion.php';
    $sql = "DELETE FROM registros_mantenimiento WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}

function subir_factura($carpeta)
{

    $ruta_manifiestos = '../../control_unidades/mantenimiento/';
    $ruta_manifiestos_cliente = $ruta_manifiestos . $carpeta . "/";

    if (!file_exists($ruta_manifiestos)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    if (!file_exists($ruta_manifiestos_cliente)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    move_uploaded_file($_FILES['factura']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['factura']['name']);
}
