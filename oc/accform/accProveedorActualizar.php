<?php
include ("../librerias.php");

// Se crea objeto producto con la informacion del formulario y se agrega a bd
$objProveedor = new Proveedor ($_POST["hidid"],
		$_POST["txtnombre"]
		, $_POST["txtdescripcion"]
		, $_POST["txtdireccion"]
		, $_POST["txtpais"]
);

$objProveedor->Actualizar();


// Se muestra mensaje de exito
echo "Registro Actualizado <br/>";
echo "<br/>Id: ".$_POST["hidid"];
echo "<br/>Nombre: ".$_POST["txtnombre"];
echo "<br/>Descripci&oacute;n: ".$_POST["txtdescripcion"];
echo "<br/>Direcci&oacute;n: ".$_POST["txtdireccion"];
echo "<br/>Pa&iacute;s: ".$_POST["txtpais"];

echo "<br /><a href='proveedor_lst.php'>Aceptar</a>";
?>