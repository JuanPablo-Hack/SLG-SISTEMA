<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_unidadmedida($_POST['nombre'], $_POST['descripcion']);
        break;
    case 'editar':
        editar_unidadmedida($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_unidadmedida($_POST['id']);
        break;
}
function agregar_unidadmedida($nombre, $descrip)
{
    include 'conexion.php';
    $sql = "INSERT INTO unidades_medidas (nombre, descrip) VALUES ('$nombre','$descrip');";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function editar_unidadmedida($id, $nombre, $descrip)
{

    include 'conexion.php';
    $sql = "UPDATE unidades_medidas SET  nombre='$nombre', descrip='$descrip' WHERE id='$id'";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function eliminar_unidadmedida($id)
{
    include './conexion.php';
    $sql = "DELETE FROM unidades_medidas WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
