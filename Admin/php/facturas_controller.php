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
    $sql = "INSERT INTO carga (nombre, descrip) VALUES ('$nombre','$descrip');";
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
    $sql = "DELETE FROM carga WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
