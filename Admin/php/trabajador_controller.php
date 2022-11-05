<?php
switch ($_POST['accion']) {
    case 'agregar':
        crear_trabajador($_POST['nombre'], $_POST['curp'], $_POST['rfc'], $_POST['nss'], $_POST['cargo'], $_POST['user'], sha1($_POST['contra']), sha1($_POST['recontra']));
        break;
    case 'editar':
        editar_trabajador($_POST['nombre'], $_POST['curp'], $_POST['rfc'], $_POST['nss'], $_POST['cargo'], $_POST['user'], sha1($_POST['contra']), sha1($_POST['recontra']));
        break;
    case 'eliminar':
        eliminar_trabajador($_POST['id']);
        break;
}
function crear_trabajador($nombre, $curp, $rfc, $nss, $cargo, $user_2, $contra, $recontra)
{
    include './conexion.php';
    $sql = "INSERT INTO `trabajador` (`id`, `nombre`, `curp`, `rfc`, `nss`, `cargo`, `user`, `pwd`) VALUES (NULL, '$nombre', '$curp', '$rfc', '$nss', '$cargo', '$user_2', '$contra')";
    $resultado = $conexion->query($sql);
    if (!$resultado) {
        echo 0;
    }
    echo 1;
}
function editar_trabajador($nombre, $curp, $rfc, $nss, $cargo, $user, $contra, $recontra)
{
    include './conexion.php';
    if ($contra == $recontra) {
        $sql = "UPDATE trabajador SET nombre='$nombre',curp='$curp',rfc='$rfc',nss='$nss',cargo='$cargo',user='$user',pwd='$contra'  WHERE user='$user'";
        $resultado = $conexion->query($sql);
        if ($resultado) {
            echo 1;
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
}
function eliminar_trabajador($id)
{
    include './conexion.php';
    $sql = "DELETE FROM trabajador WHERE id='" . $id . "'";
    $result = mysqli_query($conexion, $sql);
    if (!$result) {
        echo 2;
    } else {
        echo 1;
    }
}
