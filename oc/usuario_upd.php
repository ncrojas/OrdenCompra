<?php 
	include('valida_acceso.php');
	$oPerfil=new Perfil();
		
// Lee datos del registro a editar
$oUsuario = new Usuario();

if (isset($_POST["hidcodigo"])){
	$oUsuario->setId_Usuario($_POST["hidcodigo"]);
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
				<td width="290"><input type="hidden" name="hidid" id="hidid" value="<?=$Registro->getId_Usuario();?>" /><?=$Registro->getId_Usuario();?></td>
			</tr>
			<tr>
				<td width="100">Login</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtlogin" id="txtlogin" value="<?=$Registro->getLogin_Usuario();?>" /></td>
			</tr>
			<tr>
				<td width="100">Nombre</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtnombre" id="txtnombre" value="<?=$Registro->getNombre_Usuario();?>" /></td>
			</tr>
			<tr>
				<td width="100">Apellido</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtapellido" id="txtapellido" value="<?=$Registro->getApellido_Usuario();?>" /></td>
			</tr>
			<tr>
				<td width="100">Correo</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtcorreo" id="txtcorreo" value="<?=$Registro->getCorreo_Usuario();?>" /></td>
			</tr>
			<tr>
				<td width="100">Edad</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtedad" id="txtedad" value="<?=$Registro->getEdad_Usuario();?>" /></td>
			</tr>
			<tr>
				<td width="100">Perfil</td>
				<td width="10" align="center">:</td>
				<td width="290">
					<select id="selperfil" name="selperfil">
						<option value="">-seleccione-</option>
<?php					While($registro=$oPerfil->Selecciona()){?>
							<option value="<?=$registro->getId_Perfil();?>"><?=$registro->getDescripcion_Perfil();?></option>				
<?php 					}
?>						
					</select>
					<input type="hidden" name="hidperfil" id="hidperfil" value="<?=$Registro->getCodigo_Perfil();?>" />
					<script type="text/javascript">document.getElementById("selperfil").value=document.getElementById("hidperfil").value;</script>
				</td>
			</tr>
			<tr>
				<td width="100">Fecha Nacimiento</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="date" name="datfecha_nacimiento" id="datfecha_nacimiento" value="<?=$Registro->getFechaNacimiento_Usuario();?>" /></td>
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
					  $("#txtlogin").value = '';
					  $("#txtnombre").value = '';
					  $("#txtapellido").value = '';
					  $("#txtcorreo").value = '';
					  $("#txtedad").value = '';
					  $("#datfecha_nacimiento").value = '';					  
		    		}
				});
			/*Detiene la ejecución del envio del formulario*/
			return false;
			});	
	});

</script>

</body>
</html>