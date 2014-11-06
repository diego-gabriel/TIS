<?php

    $name = $_POST['nombreUsuario'];
    $RealName = $_POST['nombreReal'];
    $password = $_POST['password'];
    $emailUsuario = $_POST['email'];
    $rol = $_POST['UsuarioRol'];
    $apellidoUsuario = $_POST['apellido'];
    $telefonoUsuario = $_POST['telefono'];
    
    echo $name;
    echo $password;
    echo $emailUsuario;

    include '../Modelo/conexion.php';
    require '../Vista/PHPMailerAutoload.php';
    require '../Vista/class.phpmailer.php';
    
    $conect = new conexion();
        //C
    $mail = new PHPMailer();
   
    $VerificarUsuario = $conect->consulta("SELECT NOMBRE_U FROM usuario WHERE NOMBRE_U = '$name' ");
    
    $VerificarUsuario2 = mysql_fetch_row($VerificarUsuario);
    
    
    if (!is_array($VerificarUsuario2)) {
        
                //Definir que vamos a usar SMTP
          $mail->IsSMTP();
          //Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
          // 0 = off (producción)
          // 1 = client messages
          // 2 = client and server messages
          $mail->SMTPDebug  = 0;
          //Ahora definimos gmail como servidor que aloja nuestro SMTP
          $mail->Host       = 'smtp.gmail.com';
          //El puerto será el 587 ya que usamos encriptación TLS
          $mail->Port       = 587;
          //Definmos la seguridad como TLS
          $mail->SMTPSecure = 'tls';
          //Tenemos que usar gmail autenticados, así que esto a TRUE
          $mail->SMTPAuth   = true;
          //Definimos la cuenta que vamos a usar. Dirección completa de la misma
          $mail->Username   = "bittlesrl@gmail.com";
          //Introducimos nuestra contraseña de gmail
          $mail->Password   = "*bittletis*135*";
          //Definimos el remitente (dirección y, opcionalmente, nombre)
          $mail->SetFrom('bittlesrl@gmail.com', 'Bittle');
          //Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
          //$mail->AddReplyTo('replyto@correoquesea.com','El de la réplica');
          //Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
          $mail->AddAddress('jhonny.h.cr@gmail.com', 'El Destinatario');
          //Definimos el tema del email
          $mail->Subject = 'Solicitud de Registro';
          //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
          //$mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
          $mail->MsgHTML('El usuario '.$name.' '.$apellidoUsuario.' con direccion '.$emailUsuario.' desea registrarse como '.$rol.' contraseña: '.$password.'');
          //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
          $mail->AltBody = 'This is a plain-text message body';
          //Enviamos el correo
          if(!$mail->Send()) {
            echo "Error: " . $mail->ErrorInfo;
          } else {



            $conect->consulta("INSERT INTO usuario(NOMBRE_U, ESTADO_E, PASSWORD_U, TELEFONO_U, CORREO_ELECTRONICO_U) VALUES('$name','Deshabilitado','$password','$telefonoUsuario','$emailUsuario')"); 
//             $conect->consulta("INSERT INTO usuario_rol(ROL_R) 




            //$conect->consulta("INSERT INTO asesor(NOMBRE_U, NOMBRES_A, APELLIDOS_A) VALUES('$Realname','$Realname','$apellidoUsuario')");  

            echo "Enviado!";
            echo '<script>
                              BootstrapDialog.show({
                                  title: "Envio de solicitud",
                                  message: "Su solicitud se envio correctamente...se le enviara un link a su correo electronico para activar su cuenta en un plazo de 24 horas"
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
