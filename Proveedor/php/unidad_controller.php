<?php
switch ($_POST['accion']) {
    case 'agregar':
        crear_unidad($_POST['id_proveedor'], $_POST['modelo'], $_POST['ano'], $_POST['color'], $_POST['placas'], $_POST['no_economico'], $_POST['capacidad'], $_POST['tipo_unidad'], $_POST['tipo_combustible'], $_POST['serie'], $_POST['descripcion']);
        break;
    case 'editar':
        editar_unidad($_POST['id'], $_POST['modelo'], $_POST['ano'], $_POST['color'], $_POST['placas'], $_POST['no_economico'], $_POST['capacidad'], $_POST['tipo_unidad'], $_POST['tipo_combustible'], $_POST['serie'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_unidad($_POST['id']);
        break;
}
function crear_unidad($id_proveedor, $modelo, $ano, $color, $placas, $no_economico, $capacidad, $tipo_unidad, $tipo_combustible, $serie, $descripcion)
{

    include './conexion.php';
    $sql = "INSERT INTO unidades(modelo,ano,color,placas,noeconomico,capacidad,tipounidad,tipocombustible,serie,descripcion,tipo_unidad,id_proveedor) VALUES ('$modelo','$ano','$color','$placas','$no_economico','$capacidad','$tipo_unidad','$tipo_combustible','$serie','$descripcion','2','$id_proveedor')";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 0;
    }
}
function editar_unidad($id, $modelo, $ano, $color, $placas, $no_economico, $capacidad, $tipo_unidad, $tipo_combustible, $serie, $descripcion)
{
    include './conexion.php';
    $sql = "UPDATE unidades SET modelo='$modelo',ano='$ano',color='$color',placas='$placas',noeconomico='$no_economico',capacidad='$capacidad',tipounidad='$tipo_unidad',tipocombustible='$tipo_combustible',serie='$serie',descripcion='$descripcion'  WHERE id='$id'";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 0;
    }
}
function eliminar_unidad($id)
{
    include './conexion.php';
    $sql = "DELETE FROM unidades WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
