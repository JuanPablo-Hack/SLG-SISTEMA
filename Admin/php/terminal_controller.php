<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_terminales($_POST['nombre'], $_POST['descripcion']);
        break;
    case 'editar':
        editar_terminales($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_terminales($_POST['id']);
        break;
}
function agregar_terminales($nombre, $descrip)
{
    include 'conexion.php';
    $sql = "INSERT INTO terminales (nombre, descrip) VALUES ('$nombre','$descrip');";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function editar_terminales($id, $nombre, $descrip)
{

    include 'conexion.php';
    $sql = "UPDATE terminales SET  nombre='$nombre', descrip='$descrip' WHERE id='$id'";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function eliminar_terminales($id)
{
    include './conexion.php';
    $sql = "DELETE FROM terminales WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
