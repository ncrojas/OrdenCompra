<?php
include("../librerias.php");
$oProveedor=new Proveedor();
foreach ($_POST as $id){
	
	$oProveedor->Elimina($id);	
}
?>

<script>
	document.location.href="../proveedor_del.php";
</script>