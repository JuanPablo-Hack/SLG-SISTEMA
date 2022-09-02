<?php
switch ($_POST['accion']) {
  case 'agregar':
    $contraseña = generatePassword();
    agregar_cliente($_POST['nombre'], $_POST['email'], $contraseña);
    break;
  case 'editar':
    editar_cliente($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
    break;
  case 'eliminar':
    eliminar_cliente($_POST['id']);
    break;
}
function agregar_cliente($nombre, $email, $contraseña)
{
  enviar_email($email, $contraseña);
  $hash = sha1($contraseña);
  include 'conexion.php';
  $sql = "INSERT INTO clientes (nombre, email, pwd, datos_cargados) VALUES ('$nombre','$email','$hash',0);";
  $resultado = $conexion->query($sql);
  if ($resultado) {
    echo 1;
  } else {
    echo 2;
  }
}
function editar_cliente($id, $nombre, $email)
{

  include 'conexion.php';
  $sql = "UPDATE carga SET  nombre='$nombre', descrip='$descrip' WHERE id='$id'";
  $resultado = $conexion->query($sql);
  if ($resultado) {
    echo 1;
  } else {
    echo 2;
  }
}
function eliminar_cliente($id)
{
  include './conexion.php';
  $sql = "DELETE FROM carga WHERE id='" . $id . "'";
  $result = mysqli_query($conexion, $sql);
  if (!$result) {
    echo 2;
  } else {
    echo 1;
  }
}
function generatePassword()
{
  $length = 12;
  $key = "";
  $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
  $max = strlen($pattern) - 1;
  for ($i = 0; $i < $length; $i++) {
    $key .= substr($pattern, mt_rand(0, $max), 1);
  }
  return $key;
}

function enviar_email($correo, $new_password)
{
  $destinatario = $correo;
  $asunto = "Creación de usuario en el sistema ERP de SLG";
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
                      Bienvenido al Sistema ERP de Soca Logistic Group!
                    </h1>
                    <p style="margin: 0">
                      Por medio del presente correo le decimos que hemos de dado
                      de alta sus datos de contacto y revisión para nuestro
                      sistema con el siguiente correo,
                      <a
                        href="#"
                        style="color: #ff2b06; text-decoration: underline"
                        >' . $correo . '</a
                      >, con el cual podrá ingresar a nuestro sistema a consultar
                      sus viajes.
                    </p>
                    <center>
                      <h1><strong>Contraseña: </strong>' . $new_password . '</h1>
                    </center>
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
