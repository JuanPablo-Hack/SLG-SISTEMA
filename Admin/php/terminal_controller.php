<?php
switch ($_POST['accion']) {
    case 'agregar':
        agregar_terminales($_POST['nombre'], $_POST['descripcion'], $_POST['tipo']);
        break;
    case 'editar':
        editar_terminales($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $_POST['tipo']);
        break;
    case 'eliminar':
        eliminar_terminales($_POST['id']);
        break;
}
function agregar_terminales($nombre, $descrip, $tipo)
{
    include 'conexion.php';
    $sql = "INSERT INTO `terminales` (`id`, `nombre`, `descrip`, `tipo_terminal`) VALUES (NULL, '$nombre', '$descrip', '$tipo')";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function editar_terminales($id, $nombre, $descrip, $tipo)
{

    include 'conexion.php';
    $sql = "UPDATE `terminales` SET `nombre` = '$nombre', `descrip` = '$descrip', `tipo_terminal` = '$tipo' WHERE `terminales`.`id` = $id";
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
