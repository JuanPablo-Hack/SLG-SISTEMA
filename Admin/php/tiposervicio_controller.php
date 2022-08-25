<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_tiposervicio($_POST['nombre'], $_POST['descripcion']);
        break;
    case 'editar':
        editar_tiposervicio($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_tiposervicio($_POST['id']);
        break;
}
function agregar_tiposervicio($nombre, $descrip)
{
    include 'conexion.php';
    $sql = "INSERT INTO tipo_servicio (nombre, descrip) VALUES ('$nombre','$descrip');";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function editar_tiposervicio($id, $nombre, $descrip)
{

    include 'conexion.php';
    $sql = "UPDATE tipo_servicio SET  nombre='$nombre', descrip='$descrip' WHERE id='$id'";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function eliminar_tiposervicio($id)
{
    include './conexion.php';
    $sql = "DELETE FROM tipo_servicio WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
