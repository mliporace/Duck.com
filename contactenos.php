<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Cerramientos CP</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.Estilo67 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #666666;
}
body {
	background-color: #FFFFFF;
}
-->
</style>
</head>
<body>
<span class="Estilo67">
<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';

$name = $_POST["name"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->Host = "smtp.cerramientoscp.com.ar"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "info@cerramientoscp.com.ar"; // Correo completo a utilizar
$mail->Password = "Faz46t2223"; // Contrase&ntilde;a
$mail->Port = 25; // Puerto a utilizar
$mail->From = "info@cerramientoscp.com.ar"; // Desde donde enviamos (Para mostrar)
$mail->FromName = "CERRAMIENTOS CP *** ***";
$mail->AddAddress("info@cerramientoscp.com.ar"); // Esta es la direcci&oacute;n a donde enviamos
$mail->AddCC("info@cerramientoscp.com.ar"); // Copia
$mail->IsHTML(true); // El correo se env&iacute;a como HTML
$mail->Subject = "CERRAMIENTOS CP *** ***"; // Este es el titulo del email.

$mensajeHtml = nl2br($name) ;
$mensaje2Html = nl2br($telefono) ;
$mensaje3Html = nl2br($email) ;
$mensaje4Html = nl2br($mensaje) ;

$mail->Body = "{$mensajeHtml} <br />  {$mensaje2Html}<br />{$mensaje3Html}<br />{$mensaje4Html}"; // Texto del email en formato HTML
$mail->AltBody = "{$mensaje} \n\n"; // Texto sin formato HTML
$exito = $mail->Send(); // Env&iacute;a el correo.

if($exito){
echo "El correo fue enviado correctamente.";
echo " <script>open('https://cerramientoscp.com.ar/','_top'); </script>";

}else{
echo "Hubo un inconveniente. Contacta a un administrador.";
}
?>
</span>
</body>
</html>
