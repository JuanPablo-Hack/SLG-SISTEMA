<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_carga($_POST['nombre'], $_POST['descripcion']);
        break;
    case 'editar':
        editar_carga($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_carga($_POST['id']);
        break;
}
function agregar_carga($nombre, $descrip)
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
function editar_carga($id, $nombre, $descrip)
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
function eliminar_carga($id)
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
