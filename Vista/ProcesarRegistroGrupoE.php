<?php

    $nombreUGE = $_POST['nombreU'];
    $nombreLGE = $_POST['nombreL'];
    $nombreCGE = $_POST['nombreC'];
    $nombreRGE = $_POST['nombreR'];
    $correoGE = $_POST['correo'];
    $telefonoGE = $_POST['telefono'];
    $direccionGE = $_POST['direccion'];
    $contrasenaGE = $_POST['contrasena1'];
    

    include '../Modelo/conexion.php';
    require '../Vista/PHPMailerAutoload.php';
    require '../Vista/class.phpmailer.php';
    
    $conect = new conexion();

    $VerificarUsuario = $conect->consulta("SELECT NOMBRE_U FROM usuario WHERE NOMBRE_U = '$nombreUGE' ");
    $VerificarUsuario2 = mysql_fetch_row($VerificarUsuario);
    
    
     if (!is_array($VerificarUsuario2)) 
     {
             $VerificarNC = $conect->consulta("SELECT NOMBRE_CORTO_GE FROM grupo_empresa WHERE NOMBRE_CORTO_GE = '$nombreCGE' ");
             $VerificarNC2 = mysql_fetch_row($VerificarNC);

         if(!is_array($VerificarNC2))
         {
                 $VerificarNL = $conect->consulta("SELECT NOMBRE_LARGO_GE FROM grupo_empresa WHERE NOMBRE_LARGO_GE = '$nombreLGE' ");
                 $VerificarNL2 = mysql_fetch_row($VerificarNL);
                 
             if(!is_array($VerificarNL2))
             {
                     //Crear una instancia de PHPMailer
                    $mail = new PHPMailer();
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
                    $mail->AddAddress($correoGE, 'El Destinatario');
                    //Definimos el tema del email
                    $mail->Subject = 'Solicitud de Registro';
                    //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
                    //$mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
                    $mail->MsgHTML('Su registro ha sido satisfactorio...');
                    //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
                    $mail->AltBody = 'This is a plain-text message body';
                    //Enviamos el correo

                    if(!$mail->Send()) {
                      echo "Error: " . $mail->ErrorInfo;
                    } else {
                                   
                    $db = 'saetis';

                    $host = 'localhost';

                    $user = 'root';

                    $pass = '';

                    $conn = new PDO("mysql:dbname=".$db.";host=".$host,$user, $pass);

                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    // iniciar transacción

                     $conn->beginTransaction();

                    try {

                    // tabla 1

                    $sql = 'INSERT INTO usuario (NOMBRE_U, ESTADO_E, PASSWORD_U, TELEFONO_U, CORREO_ELECTRONICO_U) VALUES (:value, :estado, :contrasena, :telefono, :correo);';

                    $result = $conn->prepare($sql);

                    $result->bindValue(':value', $nombreUGE, PDO::PARAM_STR);
                    $result->bindValue(':estado', 'Habilitado', PDO::PARAM_STR);
                    $result->bindValue(':contrasena', $contrasenaGE, PDO::PARAM_STR);
                    $result->bindValue(':telefono', $telefonoGE, PDO::PARAM_STR);
                    $result->bindValue(':correo', $correoGE, PDO::PARAM_STR);

                    $result->execute();

                    //$lastId = $conn->lastInsertId();



                    $sql = 'INSERT INTO grupo_empresa (NOMBRE_U, NOMBRE_CORTO_GE, NOMBRE_LARGO_GE, DIRECCION_GE, REPRESENTANTE_LEGAL_GE) VALUES (:a_id, :nombreC, :nombreL, :direccion, :representante)';

                    $result = $conn->prepare($sql);

                    $result->bindValue(':a_id', $nombreUGE, PDO::PARAM_STR);
                    $result->bindValue(':nombreC', $nombreCGE, PDO::PARAM_STR);
                    $result->bindValue(':nombreL', $nombreLGE, PDO::PARAM_STR);
                    $result->bindValue(':direccion', $direccionGE, PDO::PARAM_STR);
                    $result->bindValue(':representante', $nombreRGE, PDO::PARAM_STR);

                    $result->execute();


                    $conn->commit();
                    echo"<script type=\"text/javascript\">alert('El registro ha sido satisfactorio'); window.location='RegistrarGrupoEmpresa.php';</script>";
                    /*echo '<script>
                      BootstrapDialog.show({
                      title: "Registro",
                      message: "El registro es satisfactorio"
                      });
                      </script>';
*/
                } catch (PDOException $e) {
                    // si ocurre un error hacemos rollback para anular todos los insert
                    $conn->rollback();

                    echo $e->getMessage();

                }
                                                
                        
                   //   $conect->consulta("INSERT INTO usuario(`NOMBRE_U`, `ESTADO_E`, `PASSWORD_U`, `TELEFONO_U`, `CORREO_ELECTRONICO_U`) VALUES('$nombreUGE','Habilitado','$contrasenaGE','$telefonoGE','$correoGE')");
                     // $conect->consulta("INSERT INTO grupo_empresa ($VARIABLE, `NOMBRE_CORTO_GE`, `NOMBRE_LARGO_GE`, `DIRECCION_GE`, `REPRESENTANTE_LEGAL_GE`) VALUES ('$nombreUGE, '$nombreCGE', '$nombreLGE', '$direccionGE', '$nombreRGE')");

                      

                    }
                    
             }
             else
             {
                                  
                echo"<script type=\"text/javascript\">alert('El nombre largo ya esta registrado'); window.location='RegistrarGrupoEmpresa.php';</script>";
	
               /*  echo '<script>
                 BootstrapDialog.show({
                 title: "Fallo en el Registro",
                 message: "El nombre largo ya esta registrado"
                 });
                 </script>';*/
             }
             
         }
         else
         {
                echo"<script type=\"text/javascript\">alert('El nombre corto ya esta registrado'); window.location='RegistrarGrupoEmpresa.php';</script>";
         
                 /*echo '<script>
                 BootstrapDialog.show({
                 title: "Fallo en el Registro",
                 message: "El nombre corto ya esta registrado"
                 });
                 </script>';*/
         }
         
     }
     else
     {
        echo"<script type=\"text/javascript\">alert('El nombre de usuario ya esta registrado'); window.location='RegistrarGrupoEmpresa.php';</script>";
       /* 
        echo '<script>
        BootstrapDialog.show({
            title: "Fallo en el Registro",
            message: "El nombre de usuario ya esta registrado"
        });
        </script>';*/
     }
    


?>
