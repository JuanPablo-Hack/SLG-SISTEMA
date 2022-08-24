<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_tipocontenedor($_POST['nombre'], $_POST['descripcion']);
        break;
    case 'editar':
        editar_tipocontenedor($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_tipocontenedor($_POST['id']);
        break;
}
function agregar_tipocontenedor($nombre, $descrip)
{
    include 'conexion.php';
    $sql = "INSERT INTO tipo_contenedor (nombre, descrip) VALUES ('$nombre','$descrip');";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function editar_tipocontenedor($id, $nombre, $descrip)
{

    include 'conexion.php';
    $sql = "UPDATE tipo_contenedor SET  nombre='$nombre', descrip='$descrip' WHERE id='$id'";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function eliminar_tipocontenedor($id)
{
    include './conexion.php';
    $sql = "DELETE FROM tipo_contenedor WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
