<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_presentacion($_POST['nombre'], $_POST['descripcion']);
        break;
    case 'editar':
        editar_presentacion($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_presentacion($_POST['id']);
        break;
}
function agregar_presentacion($nombre, $descrip)
{
    include 'conexion.php';
    $sql = "INSERT INTO presentacion_mercancia (nombre, descrip) VALUES ('$nombre','$descrip');";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function editar_presentacion($id, $nombre, $descrip)
{

    include 'conexion.php';
    $sql = "UPDATE presentacion_mercancia SET  nombre='$nombre', descrip='$descrip' WHERE id='$id'";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function eliminar_presentacion($id)
{
    include './conexion.php';
    $sql = "DELETE FROM presentacion_mercancia WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
