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
  echo $contraseña;
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

//TODO: Hacer el correo electronico y mandar por correso en producción

function enviar_email($correo, $new_password)
{
  $destinatario = $correo;
  $asunto = "Solicitud de cambio de contraseña en el portal de pagos en línea";
  $cuerpo = ' 
      <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
         
          <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        </head>
        <body style="margin: 0; padding: 0">
          <table
            align="center"
            border="0"
            cellpadding="0"
            cellspacing="0"
            width="600"
          >
            
            <tr>
              <td bgcolor="#ffffff" style="padding: 40px 30px 40px 30px">
                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                  <tr>
                      <td style="color: #153643; font-family: Arial, sans-serif; font-size: 24px;">
      
                          <b>Tu trámite cambio de contraseña ha sido tramitado</b> <br> 
                          
                        </td>
                  </tr>
                  <hr>
                  <tr>
                      
                    <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                      Por medio del presente correo le hacemos llegar la nueva contraseña para ingresar al portal de pagos en línea de CAPDAM, por eso mismo le pedimos que una vez realizado el cambio incluya usted una nueva contraseña desde el apartado de editar
                    </td>
                  </tr>
                  
                  <tr>
                    <td>
                      <table border="0" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                          <td width="260" valign="top">
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              width="100%"
                            >
                             
                              <tr>
                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                  En capdam queremos brindarle el mejor servicio por eso generamos los tramítes de manera segura, en base a la ley de protección de datos personales, por lo que es importante que tenga en cuenta nuestro aviso de privacidad.
                                </td>
                              </tr>
                            </table>
                          </td>
                          <td style="font-size: 0; line-height: 0" width="20">
                            &nbsp;
                          </td>
                          <td width="260" valign="top">
                            <table
                              border="0"
                              cellpadding="0"
                              cellspacing="0"
                              width="100%"
                            >
                              
                              <tr>
                                <td style="color: #153643; font-family: Arial, sans-serif; font-size: 16px; line-height: 20px;">
                                Cada tramíte es guardado en nuestra base de datos para darle el seguimiento necesario a nuestros nuevos usuarios que quieren iniciar con el servicio de agua potable, de manera que todos puedan tener acceso a la información necesaria.
                                </td>
                              </tr>
                            </table>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
                <center>  <h1>Su contraseña nueva es:</h1>  <strong><h2>' . $new_password . '</></h2></strong></center>
              </td>
            </tr>
        
          
            <td bgcolor="#0F4FEC" valign="top"style="padding: 30px 30px 30px 30px">
              <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tr>
                  <td><td style="color: #ffffff; font-family: Arial, sans-serif; font-size: 14px;">
      
                      &reg; Capdam 2021<br/>
                      
                      <a href="#" style="color: #ffffff;"><font color="#ffffff">Click Aquí</font></a> conoce nuestro sitio web.
                      
                    </td></td>
                </tr>
              </table>
            </td>
          </table>
        </body>
      </html>
         
  ';

  //para el envío en formato HTML 
  $headers = "MIME-Version: 1.0\r\n";
  $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

  //dirección del remitente 
  $headers .= "From: Pagos en Línea CAPDAM <soporte@pagos.capdam.gob.mx>\r\n";






  mail($destinatario, $asunto, $cuerpo, $headers);
}
