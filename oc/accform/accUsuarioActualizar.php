<?php
include ("../librerias.php");

// Se crea objeto usuario con la informacion del formulario y se agrega a bd
$objUsuario = new Usuario ($_POST["hidid"]
		, $_POST["txtlogin"]
		, ""
		, $_POST["txtnombre"]
		, $_POST["txtapellido"]
		, $_POST["txtcorreo"]
		, $_POST["txtedad"]
		, $_POST["selperfil"]
		, $_POST["datfecha_nacimiento"]
);

$objUsuario->Actualizar();


// Se muestra mensaje de exito
echo "Registro Actualizado <br/>";
echo "<br/>Login: ".$_POST["txtlogin"];
echo "<br/>Nombre: ".$_POST["txtnombre"];
echo "<br/>Apellido: ".$_POST["txtapellido"];

echo "<br /><a href='usuario_lst.php'>Aceptar</a>";
?>