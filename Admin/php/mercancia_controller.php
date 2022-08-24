<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_mercancia($_POST['nombre'], $_POST['descripcion']);
        break;
    case 'editar':
        editar_mercancia($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_mercancia($_POST['id']);
        break;
}
function agregar_mercancia($nombre, $descrip)
{
    include 'conexion.php';
    $sql = "INSERT INTO mercancia (nombre, descrip) VALUES ('$nombre','$descrip');";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function editar_mercancia($id, $nombre, $descrip)
{

    include 'conexion.php';
    $sql = "UPDATE mercancia SET  nombre='$nombre', descrip='$descrip' WHERE id='$id'";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function eliminar_mercancia($id)
{
    include './conexion.php';
    $sql = "DELETE FROM mercancia WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
