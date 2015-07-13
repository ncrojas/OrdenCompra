<?php
include ("../librerias.php");

// Se crea objeto usuario con la informacion del formulario y se agrega a bd
$objUsuario = new Usuario ($_POST["hidid"],
		$_POST["txtnombre"]
		, $_POST["txtusuario"]
		, $_POST["txtclave"]		
);

$objUsuario->Actualizar();


// Se muestra mensaje de exito
echo "Registro Actualizado <br/>";
echo "<br/>Id: ".$_POST["hidid"];
echo "<br/>Nombre: ".$_POST["txtnombre"];
echo "<br/>Usuario: ".$_POST["txtusuario"];

echo "<br /><a href='usuario_lst.php'>Aceptar</a>";
?>