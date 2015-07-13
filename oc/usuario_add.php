<?php 
	include('valida_acceso.php');
	$oPerfil=new Perfil();
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles.css">
   <script src="js/jquery-1.11.2.min.js" type="text/javascript"></script>
   <title>Agregar Usuario</title>
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
				<td colspan="3" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Nuevo Usuario</td>
			</tr>
			<tr>
				<td width="100">Login</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtlogin" id="txtlogin" /></td>
			</tr>
			<tr>
				<td width="100">Password</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="password" name="txtpassword" id="txtpassword" /></td>
			</tr>
			<tr>
				<td width="100">Nombre</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtnombre" id="txtnombre" /></td>
			</tr>
			<tr>
				<td width="100">Apellido</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtapellido" id="txtapellido" /></td>
			</tr>
			<tr>
				<td width="100">Correo</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtcorreo" id="txtcorreo" /></td>
			</tr>
			<tr>
				<td width="100">Edad</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="text" name="txtedad" id="txtedad" /></td>
			</tr>
			<tr>
				<td width="100"></td>
				<td width="10" align="center">:</td>
				<td width="290">
					<select id="selperfil" name="selperfil">
						<option value="">-seleccione-</option>
<?php					While($registro=$oPerfil->Selecciona()){?>
							<option value="<?=$registro->getId_Perfil();?>"><?=$registro->getDescripcion_Perfil();?></option>				
<?php 					}
?>						
					</select>
				</td>
			</tr>
			<tr>
				<td width="100">Fecha Nacimiento</td>
				<td width="10" align="center">:</td>
				<td width="290"><input type="date" name="datfecha_nacimiento" id="datfecha_nacimiento" /></td>
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
				  url: "accform/accUsuarioAgregar.php",
				  data: svarform,
				  success: function(result){
					  $("#divmensaje").html(result);
					  $("#txtlogin").value = '';
					  $("#txtpassword").value = '';
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
