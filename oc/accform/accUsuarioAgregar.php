<?php
include("../librerias.php");

$objUsuario = new Usuario(0,
		$_POST["txtnombres"]
		, $_POST["txtusuario"]
		, md5($_POST["txtclave"]));

$objUsuario->Agregar();

echo "Registro Agregado <br/>";
echo "<br/>Usuario: ".$_POST["txtusuario"];
echo "<br/>Nombre: ".$_POST["txtnombres"];

echo "<br /><a href='/solostocks_nae/index.php'>Aceptar</a>";
?>