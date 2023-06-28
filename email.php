<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

$email = 'eisapedefe@gmail.com';
$name = 'Guillermo Guerrero Cordova';
$message = 'Buenos días!';
if(isset($_POST['send'])) {
	$fecha = htmlentities($_POST['fecha']);
	$empresa = htmlentities($_POST['empresa']);

	$mail = new PHPMailer(true);
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Username = 'eisapedefe@gmail.com';
	$mail->Password = 'ihsyhhqpygpylzas';
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';
	$mail->isHTML(true);
	$mail->setFrom($email, $name);
	$mail->addAddress('eisapedefe@gmail.com');
	$mail->Subject = ("$email");
	$mail->Body = $message;
	$mail->addAttachment($_FILES['archivo_adjunto']['tmp_name'], $_FILES['archivo_adjunto']['name']);
	$mail->send();

	header("Location: ./response.php");

}

?>