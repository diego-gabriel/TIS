<?php

        
    
$addDestino = $_POST['dest'];
$addAsunto = $_POST['asunto'];
$addContenido = $_POST['area_info'];
$addFecha= $_POST['fec'];

//Inserttamos la foto en una carpeta


 

//conexion-------------		
    
	$conexion = mysql_connect("localhost","root","");
	//Control
	if(!$conexion){die('La conexion ha fallado por:'.mysql_error());}
	//Seleccion
	mysql_select_db("saetis",$conexion);
	//Peticion
	$peticion1 = mysql_query("SELECT `CORREO_ELECTRONICO_U` FROM `usuario` WHERE `NOMBRE_U`='$addDestino'"); 
        while ($correo = mysql_fetch_array($peticion1))
        {        
        $correo1=$correo["CORREO_ELECTRONICO_U"];}
	  
        
        
	$peticion2 = mysql_query("UPDATE `usuario` SET `ESTADO_E`='habilitado' WHERE `NOMBRE_U`='$addDestino'");


//cerrar conexion--------------------------
	 mysql_close($conexion);
	 //volver a la pagina---------------
         
          $correo;
          $addFecha;
          $addContenido;
          $addAsunto;
          $addDestino;
          $correo1;
         
 
    include '../Modelo/conexion.php';
    require '../Vista/PHPMailerAutoload.php';
    require '../Vista/class.phpmailer.php';
    
    $conect = new conexion();
   
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
    $mail->SetFrom('$correo1', '$addDestino');
    //Esta línea es por si queréis enviar copia a alguien (dirección y, opcionalmente, nombre)
    //$mail->AddReplyTo('replyto@correoquesea.com','El de la réplica');
    //Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
    $mail->AddAddress('attivanm@gmail.com', 'El Destinatario');
    //Definimos el tema del email
    $mail->Subject = 'Aceptacion de Registro';
    //Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
    //$mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
    //
    //
    //
//    $mail->MsgHTML('El usuario '.$addDestino.''.$addDestino.' con direccion '.$correo1.' desea registrarse como '.$addDestino.' contraseña: '.$addDestino.'');
    $mail->MsgHTML(' Asunto   :  '.$addAsunto.'.Enviado el     :.'.$addFecha.'............. '.$addContenido.'');

//    
//    
//    
    //Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
    $mail->AltBody = 'This is a plain-text message body';
    //Enviamos el correo
    if(!$mail->Send()) {
      echo "Error: " . $mail->ErrorInfo;
    } else {
       echo "Enviado!";
        echo"<script type=\"text/javascript\">alert('el mensaje se envio exitosamente'); window.location='principal.php';</script>";
    }


?>
