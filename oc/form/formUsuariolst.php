<?php
$oUsuario=new Usuario();
?>
<form name="frmdatos" method="post" action="usuario_upd.php">
<input type="hidden" name="hidcodigo" id="hidcodigo" value="" />
	<table style="width:700px;">
		<tr>
			<td colspan="5" style="text-align: right;"><a href="form/formUsuarioPDF.php"><img src="img/pdf.png" height="16" width="16" />Guardar Pdf</a></td>
		</tr>
		<tr>
			<td colspan="5" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Usuarios</td>
		</tr>
		<tr style="background-color:#d8d8b1;">
			<td>&nbsp;</td>
			<td>Id</td>
			<td>Nombre</td>
			<td>Usuario</td>
			<td>Clave</td>
		</tr>
<?php
		While($Registro=$oUsuario->Selecciona()){?>
			<tr>
				<td align="center"><a href="#" onclick="<?="javascript:editar(".$Registro->getId().");";?>">Editar</a></td>	
				<td><?=$Registro->getId()?></td>			
				<td><?=$Registro->getNombre()?></td>
				<td><?=$Registro->getUsuario()?></td>
				<td><?=$Registro->getClave()?></td>
			</tr>
<?php	}?>
	</table>
</form>