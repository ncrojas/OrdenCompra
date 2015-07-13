<?php
include ("../librerias.php");

// Se crea objeto producto con la informacion del formulario y se agrega a bd
$objProducto = new Producto ($_POST["hidid"],
		  $_POST["txtdescripcion"]
		, $_POST["txtcantidad"]
		, $_POST["txtprecio"]
);

$objProducto->Actualizar();


// Se muestra mensaje de exito
echo "Registro Actualizado <br/>";
echo "<br/>Id: ".$_POST["hidid"];
echo "<br/>Descripci&oacute;n: ".$_POST["txtdescripcion"];
echo "<br/>Cantidad: ".$_POST["txtcantidad"];
echo "<br/>Precio: ".$_POST["txtprecio"];

echo "<br /><a href='producto_lst.php'>Aceptar</a>";
?>
