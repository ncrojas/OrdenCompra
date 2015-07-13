<?php
	include ('librerias.php');
	session_start();
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="js/jquery-latest.min.js" type="text/javascript"></script>
   <title>Lo Tenemos Todo</title>
</head>
<body>
<?php
/*
 * Verificación del usuario y clave
* */
if (!isset($_SESSION["oUsuario"])){?>
	<div style="text-align: center">
	<h2><img src="img/oc.png" alt="Mercado Home" width="190" height="76"><br/></h2>
<?php
	include('form/formlogin.php');?>
	</div>
<?php
} else {
	include('menu.php');
	$oUsr=$_SESSION["oUsuario"];
	?>
	BIENVENIDO: <?=$oUsr->getNombre_Usuario()." ".$oUsr->getApellido_Usuario();?><a href="logout.php"><br/>Salir</a>
<?php 
}?>
</body>
</html>
