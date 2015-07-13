<?php
$oUsuario=new Usuario();
?>
<form name="frmdatos" method="post" action="usuario_upd.php">
<input type="hidden" name="hidcodigo" id="hidcodigo" value="" />
	<table style="width:700px;">
		<tr>
			<td colspan="5" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Usuarios</td>
		</tr>
		<tr style="background-color:#d8d8b1;">
			<td>&nbsp;</td>
			<td>Login</td>
			<td>Nombre</td>
			<td>Apellido</td>
			<td>Correo</td>
		</tr>
<?php
		While($Registro=$oUsuario->Selecciona()){?>
			<tr>
				<td align="center"><a href="#" onclick="<?="javascript:editar(".$Registro->getId_Usuario().");";?>">Editar</a></td>
				<td><?=$Registro->getLogin_Usuario()?></td>
				<td><?=$Registro->getNombre_Usuario()?></td>
				<td><?=$Registro->getApellido_Usuario()?></td>
				<td><?=$Registro->getCorreo_Usuario()?></td>
			</tr>
<?php	}?>
	</table>
</form>