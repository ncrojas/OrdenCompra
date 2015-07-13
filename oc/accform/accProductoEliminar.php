<?php
include("../librerias.php");
$oProducto=new Producto();
foreach ($_POST as $id){
	
	$oProducto->Elimina($id);	
}
?>

<script>
	document.location.href="../producto_del.php";
</script>