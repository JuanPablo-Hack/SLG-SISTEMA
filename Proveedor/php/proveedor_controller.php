<?php
switch ($_POST['accion']) {
    case 'complementar':
        complementar_proveedor($_POST['id'], $_POST['r_social'], $_POST['rfc'], $_POST['situacion_fiscal'], $_POST['tel'], $_POST['area'], $_POST['dir'], $_POST['cp'], $_POST['nombre_repre'], $_POST['cargo'], $_POST['tel_repre'], $_POST['email_repre'], $_FILES['constancia']['name']);
        break;
}
function complementar_proveedor($id, $razon_social, $rfc, $situacion_fiscal, $tel, $area, $dir, $cp, $nombre_repre, $cargo, $tel_repre, $email_repre, $constancia)
{
    include 'conexion.php';
    subir_constancia($rfc);
    $sql = "UPDATE `proveedores` SET `razon_social` = '$razon_social', `situacion_fiscal` = '$situacion_fiscal', `telefono` = '$tel', `area` = '$area', `rfc` = '$rfc', `dir` = '$dir', `cp` = '$cp', `nombre_representante` = '$nombre_repre', `cargo` = '$cargo', `tel_representante` = '$tel_repre', `email_representante` = '$email_repre', `datos_cargados` = '1' WHERE `proveedores`.`id` = 1 ";
    $resultado = $conexion->query($sql);
    if ($resultado) {
        echo 1;
    } else {
        echo 2;
    }
}
function subir_constancia($carpeta)
{

    $ruta_manifiestos = '../../Proveedores/';
    $ruta_manifiestos_cliente = $ruta_manifiestos . $carpeta . "/";

    if (!file_exists($ruta_manifiestos)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    if (!file_exists($ruta_manifiestos_cliente)) {
        mkdir($ruta_manifiestos_cliente, 0777, true);
    }
    move_uploaded_file($_FILES['constancia']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['constancia']['name']);
}
