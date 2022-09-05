<?php
switch ($_POST['accion']) {
    case 'agregar':
        crear_operador($_POST['id_proveedor'], $_POST['nombre'], $_POST['curp'], $_POST['tel'], $_FILES['foto3']['name'], $_FILES['foto4']['name']);
        break;
    case 'editar':
        editar_operador($_POST['id'], $_POST['modelo'], $_POST['ano'], $_POST['color'], $_POST['placas'], $_POST['no_economico'], $_POST['capacidad'], $_POST['tipo_unidad'], $_POST['tipo_combustible'], $_POST['serie'], $_POST['descripcion']);
        break;
    case 'eliminar':
        eliminar_operador($_POST['id']);
        break;
}
function crear_operador($id_proveedor, $nombre, $curp, $tel, $foto3, $foto4)
{

    include './conexion.php';
    subir_imagenes_proveedor($curp);
    $sql = "INSERT INTO `trabajador_proovedor` (`nombre`, `tel`, `curp`, `ine`, `licencia`, `id_proveedor`) VALUES ('$nombre', '$tel', '$curp', '$foto3', '$foto4', '$id_proveedor') ";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 0;
    }
}
function editar_operador($id, $modelo, $ano, $color, $placas, $no_economico, $capacidad, $tipo_unidad, $tipo_combustible, $serie, $descripcion)
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
function eliminar_operador($id)
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
function subir_imagenes_proveedor($carpeta)
{

    $ruta_manifiestos = '../../Proveedores/operadores/';
    $ruta_manifiestos_cliente = $ruta_manifiestos . $carpeta . "/";

    if (!file_exists($ruta_manifiestos)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    if (!file_exists($ruta_manifiestos_cliente)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }

    move_uploaded_file($_FILES['foto3']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto3']['name']);
    move_uploaded_file($_FILES['foto4']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['foto4']['name']);
}
