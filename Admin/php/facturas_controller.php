<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_factura($_POST['cliente'], $_POST['servicio'], $_FILES['pdf']['name'], $_FILES['xml']['name']);
        break;
    case 'editar':
        editar_factura($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_factura($_POST['id']);
        break;
}
function agregar_factura($cliente, $servicio, $pdf, $xml)
{
    include 'conexion.php';
    subir_documentos_contabilidad($cliente);
    $sql = "INSERT INTO `facturas` (`id_cliente`, `id_servicio`, `factura`, `xml`) VALUES ('$cliente', '$servicio', '$pdf', '$xml')";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function editar_factura($id, $nombre, $descrip)
{

    include 'conexion.php';
    $sql = "UPDATE carga SET  nombre='$nombre', descrip='$descrip' WHERE id='$id'";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function eliminar_factura($id)
{
    include './conexion.php';
    $sql = "DELETE FROM facturas WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}

function subir_documentos_contabilidad($carpeta)
{

    $ruta_manifiestos = '../../contabilidad/';
    $ruta_manifiestos_cliente = $ruta_manifiestos . $carpeta . "/";

    if (!file_exists($ruta_manifiestos)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    if (!file_exists($ruta_manifiestos_cliente)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    move_uploaded_file($_FILES['pdf']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['pdf']['name']);
    move_uploaded_file($_FILES['xml']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['xml']['name']);
}
