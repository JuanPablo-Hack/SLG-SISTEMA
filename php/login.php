<?php
include("conexion.php");
session_start();
login($conexion, $_POST['user'], sha1($_POST['contra']));
function login($conexion, $user, $password)
{
    $sql = "SELECT * FROM admin WHERE user='$user' and contra='$password'";
    $resultado = $conexion->query($sql);
    if ($row = mysqli_fetch_assoc($resultado)) {
        header("HTTP/1.1 302 Moved Temporarily");
        header("Location: ../Admin/");
    } else {
        $sql = "SELECT * FROM trabajador WHERE user='$user' and pwd='$password'";
        $resultado = $conexion->query($sql);
        if ($row = mysqli_fetch_assoc($resultado)) {
            $_SESSION['usuario'] = $row['id'];
            if ($row['cargo'] == 1) {
                header("HTTP/1.1 302 Moved Temporarily");
                header("Location: ../Operador/");
            } else {
                header("HTTP/1.1 302 Moved Temporarily");
                header("Location: ../Mantenimiento/");
            }
        } else {
            $sql = "SELECT * FROM clientes WHERE email='$user' and pwd='$password'";
            $resultado = $conexion->query($sql);
            if ($row = mysqli_fetch_assoc($resultado)) {
                $_SESSION['usuario'] = $row['id'];
                $_SESSION['datos_cargados'] = $row['datos_cargados'];
                header("HTTP/1.1 302 Moved Temporarily");
                header("Location: ../Cliente/");
            } else {
                $sql = "SELECT * FROM proveedores WHERE email='$user' and pwd='$password'";
                $resultado = $conexion->query($sql);
                if ($row = mysqli_fetch_assoc($resultado)) {
                    $_SESSION['usuario'] = $row['id'];
                    $_SESSION['datos_cargados'] = $row['datos_cargados'];
                    header("HTTP/1.1 302 Moved Temporarily");
                    header("Location: ../Proveedor/");
                } else {
                    header("Location: ../error_login.html");
                }
            }
        }
    }
}
