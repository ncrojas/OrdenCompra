<?php
	include('../constante.php');
	include('../modulo/PHPMailer/PHPMailerAutoload.php');
	
	$mail = new PHPMailer();
	$mail->IsSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->Username = GUSR;
	$mail->Password = GPWD;
	
	$mail->SetFrom(GMAIL, GNAME);
	$mail->Subject = $_POST['txtasunto'];
	$mail->Body = $_POST['txtdescripcion'];
	$mail->AddAddress($_POST['ne.rojasb@alumnos.duoc.cl']);
	if(!$mail->Send()) {
		echo 'Error: '.$mail->ErrorInfo;
	} else {
		echo 'Mensaje enviado!';
	}
?>