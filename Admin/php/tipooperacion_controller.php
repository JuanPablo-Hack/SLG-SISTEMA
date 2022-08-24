<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_tipooperacion($_POST['nombre'], $_POST['descripcion']);
        break;
    case 'editar':
        editar_tipooperacion($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_tipooperacion($_POST['id']);
        break;
}
function agregar_tipooperacion($nombre, $descrip)
{
    include 'conexion.php';
    $sql = "INSERT INTO tipo_operacion (nombre, descrip) VALUES ('$nombre','$descrip');";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function editar_tipooperacion($id, $nombre, $descrip)
{

    include 'conexion.php';
    $sql = "UPDATE tipo_operacion SET  nombre='$nombre', descrip='$descrip' WHERE id='$id'";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function eliminar_tipooperacion($id)
{
    include './conexion.php';
    $sql = "DELETE FROM tipo_operacion WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
