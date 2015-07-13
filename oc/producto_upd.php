<?php 
	include('valida_acceso.php');
	$oTipoProducto=new TipoProducto();

	
// Lee datos del registro a editar
$oProducto = new Producto();

if (isset($_POST["hidcodigo"])){
	$oProducto->setId_Producto($_POST["hidcodigo"]);
	$Registro = $oProducto->LeerRegistro();
} else {
	echo "Código no especificado.";
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
   <title>Editar Producto</title>
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
				<td colspan="3" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Editar Producto</td>
			</tr>
			<tr>
				<td width="100">Id</td>
				<td width="10" align="center">:</td>
				<td width="290"><?=$Registro->getId_Producto();?><input type="hidden" name="hidid" id="hidid" value="<?=$Registro->getId_Producto();?>" /></td>
			</tr>
			<tr>
				<td width="100">Descripci&oacute;n</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtdescripcion" id="txtdescripcion" value="<?=$Registro->getDescripcion();?>" /></td>
			</tr>
			<tr>
				<td width="100">Precio</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtprecio" id="txtprecio" value="<?=$Registro->getPrecio();?>" /></td>
			</tr>
			<tr>
				<td width="100">Unidad</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtunidad" id="txtunidad" value="<?=$Registro->getUnidad();?>" /></td>
			</tr>
			<tr>
				<td width="100">Tipo</td>
				<td width="10" align="center">:</td>
				<td width="290">
					<select id="seltipo" name="seltipo">
						<option value="">-seleccione-</option>
<?php					While($registro=$oTipoProducto->Selecciona()){?>
							<option value="<?=$registro->getId_TipoProducto();?>"><?=$registro->getDescripcion_Tipo();?></option>				
<?php 					}
?>						
					</select>
					<input type="hidden" name="hidtipo" id="hidtipo" value="<?=$Registro->getId_Tipo();?>" />
					<script type="text/javascript">document.getElementById("seltipo").value=document.getElementById("hidtipo").value;</script>
				</td>
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
				  url: "accform/accProductoActualizar.php",
				  data: svarform,
				  success: function(result){
					  $("#divmensaje").html(result);
					  $("#txtdescripcion").value = '';
					  $("#txtprecio").value = '';
					  $("#txtunidad").value = '';
					  $("#seltipo").value = '';
		    		}
				});
			/*Detiene la ejecución del envio del formulario*/
			return false;
			});	
	});

</script>

</body>
</html>