<?php
include 'librerias.php';

$usr=new Usuario("",$_POST['txtusuario'], $_POST['txtpassword'],"","","","","","");

session_start();
$usr = $usr->VerificaAcceso();
//if($usr->VerificaAcceso()){
if($usr){
	$_SESSION["oUsuario"]=$usr;
}
?>
<script>
	document.location.href="index.php";
</script>