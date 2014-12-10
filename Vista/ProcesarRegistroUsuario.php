<?php

    $name = $_POST['nombreUsuario'];
    $RealName = $_POST['nombreReal'];
    $password = $_POST['password'];
    $emailUsuario = $_POST['email'];
    $rol = $_POST['UsuarioRol'];
    $apellidoUsuario = $_POST['apellido'];
    $telefonoUsuario = $_POST['telefono'];

    include '../Modelo/conexion.php';
    require '../Vista/PHPMailerAutoload.php';
    require '../Vista/class.phpmailer.php';
    
    $conect = new conexion();
    $mail = new PHPMailer();
   
    $VerificarUsuarioS = $conect->consulta("SELECT LOGIN_S FROM socio WHERE LOGIN_S = '$name' ");
    $VerificarUsuarioS2 = mysql_fetch_row($VerificarUsuarioS);
    
    
    $VerificarUsuarioGE = $conect->consulta("SELECT NOMBRE_U FROM usuario WHERE NOMBRE_U = '$name' ");
    $VerificarUsuarioGE2 = mysql_fetch_row($VerificarUsuarioGE);
    
     if (!is_array($VerificarUsuarioS2) && !is_array($VerificarUsuarioGE2)) 
     {
           
          //Definir que vamos a usar SMTP
          $mail->IsSMTP();
          //Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
          // 0 = off (producción)
          // 1 = client messages
          // 2 = client and server messages
          $mail->SMTPDebug  = 0;

          //Ahora definimos gmail como servidor que aloja nuestro SMTP
          $mail->Host       = 'smtp.gmail.com';
          //$mail->Host = 'smtp-mail.outlook.com';
          //$mail->Host = 'smtp.live.com';
          //$mail->Host = 'smtp.mail.yahoo.com';

          //El puerto será el 587 ya que usamos encriptación TLS
          $mail->Port       = 587;
          //$mail->Port       = 465;

          //Definmos la seguridad como TLS
          $mail->SMTPSecure = 'tls';
          //Tenemos que usar gmail autenticados, así que esto a TRUE
          $mail->SMTPAuth   = true;
          
          //Definimos la cuenta que vamos a usar. Dirección completa de la misma
          //
          //$mail->Username   = "jhonny_h_crespo@yahoo.com";
          $mail->Username   = "saetis.oficial@gmail.com";
          
          //Introducimos nuestra contraseña de gmail
          $mail->Password   = "saetis.oficial1";
          //Definimos el remitente (dirección y, opcionalmente, nombre)
          $mail->SetFrom('saetis.oficial@gmail.com', 'Saetis');
          //Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
          //$mail->AddReplyTo('replyto@correoquesea.com','El de la réplica');
          //Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
          $mail->AddAddress('adm.saetis@gmail.com', 'Administrador');
          //Definimos el tema del email
          $mail->Subject = 'Solicitud de Registro';
          //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
          //$mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
          $mail->MsgHTML('El usuario '.$name.' desea registrarse en el sistema Saetis como '.$rol.'');
          //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
          $mail->AltBody = 'This is a plain-text message body';
          //Enviamos el correo
          if(!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
          } else {



            $conect->consulta("INSERT INTO usuario(NOMBRE_U, ESTADO_E, PASSWORD_U, TELEFONO_U, CORREO_ELECTRONICO_U) VALUES('$name','Deshabilitado','$password','$telefonoUsuario','$emailUsuario')"); 

            $conect->consulta("INSERT INTO asesor(NOMBRE_U, NOMBRES_A, APELLIDOS_A) VALUES('$name','$RealName','$apellidoUsuario')");  
            $conect->consulta("INSERT INTO usuario_rol(NOMBRE_U, ROL_R) VALUES('$name','$rol')");  
            $conect->consulta("INSERT INTO criteriocalificacion(NOMBRE_U,NOMBRE_CRITERIO_C,TIPO_CRITERIO) VALUES('$name','PUNTAJE','4')");

          
            echo '<script>
                              BootstrapDialog.show({
                                  title: "Envio de solicitud",
                                  message: "Su solicitud se envio correctamente",
                                  onhide: function(dialogRef){
                                        location.reload();
                                    }
                              });
                  </script>';

          }
        
    }
    else{
        
        echo '<script>
                BootstrapDialog.show({
                    title: "Fallo en el Registro",
                    message: "El nombre de usuario ya esta registrado"
                });
              </script>';
    }
   
?>
