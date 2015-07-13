<?php
include("../librerias.php");
$oUsr=new Usuario();
foreach ($_POST as $id){
	$oUsr->Elimina($id);	
};
?>

<script>
	document.location.href="../usuario_del.php";
</script>