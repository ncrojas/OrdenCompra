<?php
include ("../librerias.php");

// Se crea objeto producto con la informacion del formulario y se agrega a bd
$objProducto = new Producto (0,
		$_POST["txtdescripcion"]
		, $_POST["txtprecio"]
		, $_POST["txtunidad"]
		, $_POST["seltipo"]
);

$objProducto->Agregar();


// Se muestra mensaje de exito
echo "Registro Agregado <br/>";
echo "<br/>Descripci&oacute;n: ".$_POST["txtdescripcion"];
echo "<br/>Precio: ".$_POST["txtprecio"];

echo "<br /><a href='index.php'>Aceptar</a>";
?>
