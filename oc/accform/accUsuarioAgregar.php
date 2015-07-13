<?php
include("../librerias.php");

$objUsuario = new Usuario(0
		, $_POST["txtlogin"]
		, md5($_POST["txtpassword"])
		, $_POST["txtnombre"]
		, $_POST["txtapellido"]
		, $_POST["txtcorreo"]
		, $_POST["txtedad"]
		, $_POST["selperfil"]
		, $_POST["datfecha_nacimiento"]
		);

$objUsuario->Agregar();

echo "Registro Agregado <br/>";
echo "<br/>Login: ".$_POST["txtlogin"];
echo "<br/>Nombre: ".$_POST["txtnombre"];
echo "<br/>Apellido: ".$_POST["txtapellido"];

echo "<br /><a href='/oc/index.php'>Aceptar</a>";
?>