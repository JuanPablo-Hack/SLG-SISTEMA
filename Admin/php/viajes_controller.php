<?php
switch ($_POST['accion']) {
    case 'agregar_viajelocal':
        agregar_viajelocal($_POST['fecha'], $_POST['tipo_unidad'], $_POST['unidad'], $_POST['tipo_servicio'], $_POST['tipo_carga'], $_POST['tipo_contenedor'], $_POST['no_caja'], $_POST['operador'], $_FILES['dec']['name'], $_POST['terminal_carga'], $_POST['p_neto'], $_POST['p_tara'], $_POST['p_bruto'], $_POST['naviera'], $_FILES['eir']['name'], $_POST['inicio_estadias'], $_POST['termino_estadias']);
        break;
    case 'agregar_viajeforaneo':
        agregar_viajeforaneo($_POST['fecha'], $_POST['tipo_unidad'], $_POST['unidad'], $_POST['tipo_servicio'], $_POST['tipo_carga'], $_POST['tipo_contenedor'], $_POST['no_caja'], $_POST['operador'], $_FILES['dec']['name'], $_POST['terminal_carga'], $_POST['p_neto'], $_POST['p_tara'], $_POST['p_bruto'], $_POST['naviera'], $_FILES['eir']['name'], $_FILES['instruccion']['name'], $_POST['inicio_estadias'], $_POST['termino_estadias'], $_POST['combustible'], $_POST['viaticos'], $_POST['casetas']);
        break;
    case 'editar_viajelocal':
        editar_viajelocal($_POST['id'], $_POST['transportista'], $_POST['operador'], $_POST['placas_tracto'], $_POST['placas_remolque'], $_POST['no_caja'], $_POST['tipo_contenedor'], $_POST['no_sello'], $_POST['cantidad'], $_POST['unidad_medida'], $_POST['firma_operador'], $_POST['firma_supervisor']);
        break;
    case 'editar_viajeforaneo':
        editar_viajeforaneo($_POST['id'], $_POST['transportista'], $_POST['operador'], $_POST['placas_tracto'], $_POST['placas_remolque'], $_POST['no_caja'], $_POST['tipo_contenedor'], $_POST['no_sello'], $_POST['cantidad'], $_POST['unidad_medida'], $_POST['firma_operador'], $_POST['firma_supervisor']);
        break;
    case 'eliminar_viajelocal':
        eliminar_viajelocal($_POST['id'], $_POST['transportista'], $_POST['operador'], $_POST['placas_tracto'], $_POST['placas_remolque'], $_POST['no_caja'], $_POST['tipo_contenedor'], $_POST['no_sello'], $_POST['cantidad'], $_POST['unidad_medida'], $_POST['firma_operador'], $_POST['firma_supervisor']);
        break;
    case 'eliminar_viajeforaneo':
        eliminar_viajeforaneo($_POST['id'], $_POST['transportista'], $_POST['operador'], $_POST['placas_tracto'], $_POST['placas_remolque'], $_POST['no_caja'], $_POST['tipo_contenedor'], $_POST['no_sello'], $_POST['cantidad'], $_POST['unidad_medida'], $_POST['firma_operador'], $_POST['firma_supervisor']);
        break;
}
function agregar_viajelocal($fecha, $tipo_unidad, $unidad, $tipo_servicio, $tipo_carga, $tipo_contenedor, $no_caja, $operador, $dec, $terminal_carga, $p_neto, $p_tara, $p_bruto, $naviera, $eir, $inicio_estadias, $termino_estadias)
{
    // include 'conexion.php';
    // $sql = "INSERT INTO actividad (id_clasificacion, id_categoria, nombre) VALUES ('$clasi','$cat','$descrip');";
    // $resultado = $conexion->query($sql);
    // if ($resultado) {
    //     echo 1;
    // } else {
    //     echo 2;
    // }
}
function agregar_viajeforaneo($fecha, $tipo_unidad, $unidad, $tipo_servicio, $tipo_carga, $tipo_contenedor, $no_caja, $operador, $dec, $terminal_carga, $p_neto, $p_tara, $p_bruto, $naviera, $eir, $instruccion, $inicio_estadias, $termino_estadias, $combustible, $viaticos, $casetas)
{
    echo "Entro a la función sin fallas";
    // include 'conexion.php';
    // $sql = "UPDATE actividad SET id_clasificacion='$clasi', id_categoria='$cat', nombre='$descrip' WHERE id='$id'";
    // $resultado = $conexion->query($sql);
    // if ($resultado) {
    //     echo 1;
    // } else {
    //     echo 2;
    // }
}
function editar_viajelocal($id, $transportista, $operador, $placas_tracto, $placas_remolque, $no_caja, $tipo_contenedor, $no_sello, $cantidad, $unidad, $firma_operador, $firma_supervisor)
{

    // include 'conexion.php';
    // $sql = "UPDATE actividad SET id_clasificacion='$clasi', id_categoria='$cat', nombre='$descrip' WHERE id='$id'";
    // $resultado = $conexion->query($sql);
    // if ($resultado) {
    //     echo 1;
    // } else {
    //     echo 2;
    // }
}
function editar_viajeforaneo($id)
{
    // include './conexion.php';
    // $sql = "DELETE FROM actividad WHERE id='" . $id . "'";
    // $result = mysqli_query($conexion, $sql);
    // if (!$result) {
    //     echo 2;
    // } else {
    //     echo 1;
    // }
}

function eliminar_viajelocal($id)
{
    // include './conexion.php';
    // $sql = "DELETE FROM actividad WHERE id='" . $id . "'";
    // $result = mysqli_query($conexion, $sql);
    // if (!$result) {
    //     echo 2;
    // } else {
    //     echo 1;
    // }
}

function eliminar_viajeforaneo($id)
{
    // include './conexion.php';
    // $sql = "DELETE FROM actividad WHERE id='" . $id . "'";
    // $result = mysqli_query($conexion, $sql);
    // if (!$result) {
    //     echo 2;
    // } else {
    //     echo 1;
    // }
}