<?php
switch ($_POST['accion']) {
  case 'agregar_viajelocal':
    agregar_viajelocal($_POST['cliente'], $_POST['fecha'], $_POST['tipo_unidad'], $_POST['unidad'], $_POST['tipo_servicio'], $_POST['tipo_carga'], $_POST['tipo_contenedor'], $_POST['no_caja'], $_POST['operador'], $_FILES['dec']['name'], $_POST['terminal_carga'], $_POST['p_neto'], $_POST['p_tara'], $_POST['p_bruto'], $_POST['naviera'], $_POST['patio_destino'], $_FILES['eir']['name'], $_POST['inicio_estadias'], $_POST['termino_estadias']);
    break;
  case 'agregar_viajeforaneo':
    agregar_viajeforaneo($_POST['cliente'], $_POST['fecha'], $_POST['tipo_unidad'], $_POST['unidad'], $_POST['tipo_servicio'], $_POST['tipo_carga'], $_POST['tipo_contenedor'], $_POST['no_caja'], $_POST['operador'], $_FILES['dec']['name'], $_POST['terminal_carga'], $_POST['p_neto'], $_POST['p_tara'], $_POST['p_bruto'], $_POST['naviera'], $_POST['patio_destino'], $_FILES['eir']['name'], $_FILES['instruccion']['name'], $_POST['inicio_estadias'], $_POST['termino_estadias'], $_POST['combustible'], $_POST['viaticos'], $_POST['casetas']);
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
function agregar_viajelocal($cliente, $fecha, $tipo_unidad, $unidad, $tipo_servicio, $tipo_carga, $tipo_contenedor, $no_caja, $operador, $dec, $terminal_carga, $p_neto, $p_tara, $p_bruto, $naviera, $patio_destino, $eir, $inicio_estadias, $termino_estadias)
{
  include 'conexion.php';
  subir_imagenes_viajes_locales($fecha);
  //mandar_notificación($cliente);
  $sql = "INSERT INTO `viajes_locales` (`id_cliente`,`fecha`, `id_tipo_unidad`, `unidad`, `id_tipo_servicio`, `id_tipo_carga`, `id_tipo_contenedor`, `no_contenedores`, `operador`, `dec`, `terminal`, `peso_neto`, `peso_tara`, `peso_bruto`, `destino`, `naviera`, `eir`, `inicio_estadias`, `fin_estadias`) VALUES ('$cliente','$fecha', '$tipo_unidad', '$unidad', '$tipo_servicio', '$tipo_carga', '$tipo_contenedor', '$no_caja', '$operador', '$dec', '$terminal_carga', '$p_neto', '$p_tara', '$p_bruto', '$patio_destino', '$naviera', '$eir', '$inicio_estadias', '$termino_estadias')";
  $resultado = $conexion->query($sql);
  if ($resultado) {
    echo 1;
  } else {
    echo 2;
  }
}
function agregar_viajeforaneo($cliente, $fecha, $tipo_unidad, $unidad, $tipo_servicio, $tipo_carga, $tipo_contenedor, $no_caja, $operador, $dec, $terminal_carga, $p_neto, $p_tara, $p_bruto, $naviera, $patio_destino, $eir, $instruccion, $inicio_estadias, $termino_estadias, $combustible, $viaticos, $casetas)
{

  include 'conexion.php';
  subir_imagenes_viajes_foraneos($fecha);
  $sql = "INSERT INTO `viajes_foraneos` (`id_cliente`,`fecha`, `id_tipo_unidad`, `unidad`, `id_tipo_servicio`, `id_tipo_carga`, `id_tipo_contenedor`, `no_contenedores`, `operador`, `dec`, `terminal`, `peso_neto`, `peso_tara`, `peso_bruto`, `destino`, `naviera`, `eir`, `carta_ins`, `inicio_estadia`, `fin_estadia`, `combustible`, `viaticos`, `casetas`) VALUES ('$cliente','$fecha', '$tipo_unidad', '$unidad', '$tipo_servicio', '$tipo_carga', '$tipo_contenedor', '$no_caja', '$operador', '$dec', '$terminal_carga', '$p_neto', '$p_tara', '$p_bruto', '$patio_destino', '$naviera', '$naviera', '$eir', '$inicio_estadias', '$termino_estadias', '$combustible', '$viaticos', '$casetas')";
  $resultado = $conexion->query($sql);
  if ($resultado) {
    echo 1;
  } else {
    echo 2;
  }
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

function subir_imagenes_viajes_locales($carpeta)
{

  $ruta_manifiestos = '../../viajes/locales/';
  $ruta_manifiestos_cliente = $ruta_manifiestos . $carpeta . "/";

  if (!file_exists($ruta_manifiestos)) {
    mkdir($ruta_manifiestos_cliente, 0777, true);
  }
  if (!file_exists($ruta_manifiestos_cliente)) {
    mkdir($ruta_manifiestos_cliente, 0777, true);
  }
  move_uploaded_file($_FILES['dec']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['dec']['name']);
  move_uploaded_file($_FILES['eir']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['eir']['name']);
}

function subir_imagenes_viajes_foraneos($carpeta)
{

  $ruta_manifiestos = '../../viajes/foraneos/';
  $ruta_manifiestos_cliente = $ruta_manifiestos . $carpeta . "/";

  if (!file_exists($ruta_manifiestos)) {
    mkdir($ruta_manifiestos_cliente, 0777, true);
  }
  if (!file_exists($ruta_manifiestos_cliente)) {
    mkdir($ruta_manifiestos_cliente, 0777, true);
  }
  move_uploaded_file($_FILES['dec']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['dec']['name']);
  move_uploaded_file($_FILES['eir']['tmp_name'], $ruta_manifiestos_cliente . $_FILES['eir']['name']);
}

function mandar_notificación($cliente)
{
  include 'conexion.php';
  $sql = "SELECT * FROM cliente WHERE id='$cliente'";
  $resultado = $conexion->query($sql);
  $row = mysqli_fetch_array($resultado);
  enviar_email($row['email'], $row['nombre']);
}

function enviar_email($correo, $cliente)
{

  $destinatario = $correo;
  $asunto = "Notificación de viaje en el sistema ERP de SLG";
  $cuerpo = ' 
  <!DOCTYPE html>
  <html
    lang="en"
    xmlns="http://www.w3.org/1999/xhtml"
    xmlns:o="urn:schemas-microsoft-com:office:office"
  >
    <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width,initial-scale=1" />
      <meta name="x-apple-disable-message-reformatting" />
      <title></title>
      <style>
        table,
        td,
        div,
        h1,
        p {
          font-family: Arial, sans-serif;
        }
        @media screen and (max-width: 530px) {
          .unsub {
            display: block;
            padding: 8px;
            margin-top: 14px;
            border-radius: 6px;
            background-color: #555555;
            text-decoration: none !important;
            font-weight: bold;
          }
          .col-lge {
            max-width: 100% !important;
          }
        }
        @media screen and (min-width: 531px) {
          .col-sml {
            max-width: 27% !important;
          }
          .col-lge {
            max-width: 73% !important;
          }
        }
      </style>
    </head>
    <body
      style="
        margin: 0;
        padding: 0;
        word-spacing: normal;
        background-color: #ffffff;
      "
    >
      <div
        role="article"
        aria-roledescription="email"
        lang="en"
        style="
          text-size-adjust: 100%;
          -webkit-text-size-adjust: 100%;
          -ms-text-size-adjust: 100%;
          background-color: #fff;
        "
      >
        <table
          role="presentation"
          style="width: 100%; border: none; border-spacing: 0"
        >
          <tr>
            <td align="center" style="padding: 0">
              <table
                role="presentation"
                style="
                  width: 94%;
                  max-width: 600px;
                  border: none;
                  border-spacing: 0;
                  text-align: left;
                  font-family: Arial, sans-serif;
                  font-size: 16px;
                  line-height: 22px;
                  color: #363636;
                "
              >
                <tr>
                  <td
                    style="
                      padding: 40px 30px 30px 30px;
                      text-align: center;
                      font-size: 24px;
                      font-weight: bold;
                    "
                  >
                    <a
                      href="https://gruposoca.com.mx/"
                      style="text-decoration: none"
                      ><img
                        src="http://slg.gruposoca.com.mx/assets/img/slg%20logo.png"
                        width="165"
                        alt="Logo"
                        style="
                          width: 165px;
                          max-width: 80%;
                          height: auto;
                          border: none;
                          text-decoration: none;
                          color: #ffffff;
                        "
                    /></a>
                  </td>
                </tr>
                <tr>
                  <td style="padding: 30px; background-color: #ffffff">
                    <h1
                      style="
                        margin-top: 0;
                        margin-bottom: 16px;
                        font-size: 26px;
                        line-height: 32px;
                        font-weight: bold;
                        letter-spacing: -0.02em;
                      "
                    >
                     Notificación de alta de viaje local!
                    </h1>
                    <p style="margin: 0">
                      <h2>' . $cliente . '</h2>
                      Por medio del presente correo le decimos que se ha dado de alta un viaje local con las siguientes indicaciones,
                      , usted podrá consultar más detalles del viaje ingresando al sistema con sus credenciales.
                    </p>
                  </td>
                </tr>
  
                <tr>
                  <td
                    style="
                      padding: 35px 30px 11px 30px;
                      font-size: 0;
                      background-color: #ffffff;
                      border-bottom: 1px solid #f0f0f5;
                      border-color: rgba(201, 201, 207, 0.35);
                    "
                  >
                    <div
                      class="col-sml"
                      style="
                        display: inline-block;
                        width: 100%;
                        max-width: 145px;
                        vertical-align: top;
                        text-align: left;
                        font-family: Arial, sans-serif;
                        font-size: 14px;
                        color: #363636;
                      "
                    ></div>
                    <div
                      class="col-lge"
                      style="
                        display: inline-block;
                        width: 100%;
                        max-width: 395px;
                        vertical-align: top;
                        padding-bottom: 20px;
                        font-family: Arial, sans-serif;
                        font-size: 16px;
                        line-height: 22px;
                        color: #363636;
                      "
                    >
                      <p style="margin: 0">
                        <a
                          href="https://example.com/"
                          style="
                            background: #00aaa1;
                            text-decoration: none;
                            padding: 10px 25px;
                            color: #ffffff;
                            border-radius: 4px;
                            display: inline-block;
                            mso-padding-alt: 0;
                            text-underline-color: #ff3884;
                          "
                          ><span style="mso-text-raise: 10pt; font-weight: bold"
                            >Ingresar al sistema</span
                          ></a
                        >
                      </p>
                    </div>
                  </td>
                </tr>
                <tr>
                  <td
                    style="
                      padding: 30px;
                      text-align: center;
                      font-size: 12px;
                      background-color: #ff2b06;
                      color: #fff;
                    "
                  >
                    <p style="margin: 0 0 8px 0">
                      <a
                        href="http://www.facebook.com/"
                        style="text-decoration: none"
                        ><img
                          src="images/facebook.png"
                          width="40"
                          height="40"
                          alt="f"
                          style="display: inline-block; color: #fff"
                      /></a>
                      <a
                        href="http://www.twitter.com/"
                        style="text-decoration: none"
                        ><img
                          src="images/twitter.png"
                          width="40"
                          height="40"
                          alt="t"
                          style="display: inline-block; color: #fff"
                      /></a>
                    </p>
                    <p style="margin: 0; font-size: 14px; line-height: 20px">
                      &reg; Gruposoca, todos los derechos reservados 2022<br /><a
                        class="unsub"
                        href="http://www.example.com/"
                        style="color: #fff; text-decoration: underline"
                        >www.gruposoca.com.mx</a
                      >
                    </p>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </div>
    </body>
  </html>
  ';

  //para el envío en formato HTML 
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

  //dirección del remitente 
  $headers .= "From: Sistema ERP SLG <sistemas@gruposoca.com.mx>\r\n";






  mail($destinatario, $asunto, $cuerpo, $headers);
}
