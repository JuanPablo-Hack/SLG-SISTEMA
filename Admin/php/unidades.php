<?php
include 'conexion.php';
$id_tipo = $_POST['id_tipo'];
$sql = "SELECT * FROM unidades WHERE tipo_unidad ='" . $id_tipo . "'";
$resultado = $conexion->query($sql);
$html = "<option value='0'>Selecciona una unidad</option>";
while ($row = $resultado->fetch_assoc()) {
    $html .= "<option value='" . $row['id'] . "'>" . $row['modelo'] . " - " . $row['placas'] . " - " . $row['noeconomico'] . "</option>";
}

echo $html;
