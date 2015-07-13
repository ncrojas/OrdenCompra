<?php 
	include('valida_acceso.php');
	//include('clases/Usuario.php');
	
// Lee datos del registro a editar
$oUsuario = new Usuario();

if (isset($_POST["hidcodigo"])){
	$oUsuario->setId($_POST["hidcodigo"]);
	$Registro = $oUsuario->LeerRegistro();
} else {
	echo "Codigo no especificado.";
	exit();
}
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
   <title>Editar Usuario</title>
</head>
<body>
<?php 
	include('menu.php');
?>
<div style="text-align: center;width:100%">
	<br/>
	<form id="frmdatos" method="post">
		<table style="width:400px;">
			<tr>
				<td colspan="3" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Editar Usuario</td>
			</tr>
			<tr>
				<td width="100">Id</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="hidden" name="hidid" id="hidid" value="<?=$Registro->getId();?>" /><?=$Registro->getId();?></td>
			</tr>
			<tr>
				<td width="100">Nombre</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtnombre" id="txtnombre" value="<?=$Registro->getNombre();?>" /></td>
			</tr>
			<tr>
				<td width="100">Nombre de Usuario</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtusuario" id="txtusuario" value="<?=$Registro->getUsuario();?>" /></td>
			</tr>
			<tr>
				<td width="100">Clave</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtclave" id="txtclave" value="<?=$Registro->getClave();?>" /></td>
			</tr>
			<tr>
				<td colspan="3" height="40" valign="bottom" align="center">
					<input type="submit" id="btngrabar" value="Guardar" />
				</td>
			</tr>
			<tr>
				<td colspan="3" align="center">
					<div id="divmensaje"></div>
				</td>
			</tr>
		</table>
	</form>
</div>

<script type="text/javascript">

$(document).ready(function(){
	/*Llamada a PHP para procesar el formulario*/
	$("#btngrabar").click(function(){
		var svarform = $("#frmdatos").serialize();		
			/*Llamada a metodo JQUERY:AJAX para procesor el formulario*/
			$.ajax({
				  method: "POST",
				  url: "accform/accUsuarioActualizar.php",
				  data: svarform,
				  success: function(result){
					  $("#divmensaje").html(result);
					  $("#txtnombre").value = '';
					  $("#txtusuario").value = '';
					  $("#txtclave").value = '';					  
		    		}
				});
			/*Detiene la ejecución del envio del formulario*/
			return false;
			});	
	});

</script>

</body>
</html>