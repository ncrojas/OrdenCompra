<?php
$oProducto=new Producto();
?>
<form name="frmdatos" method="post" action="producto_upd.php">
<input type="hidden" name="hidcodigo" id="hidcodigo" value="" />
	<table style="width:700px;">
		<!--  <tr>
			<td colspan="5" style="text-align: right;"><a href="form/formProductoPDF.php"><img src="img/pdf.png" height="16" width="16" />Guardar Pdf</a></td>
		</tr>-->
		<tr>
			<td colspan="5" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Producto</td>
		</tr>
		<tr style="background-color:#d8d8b1;">
			<td>&nbsp;</td>
			<td>Id</td>
			<td>Descripcion</td>
			<td>Precio</td>
			<td>Unidad</td>
		</tr>
<?php
		While($Registro=$oProducto->Selecciona()){?>
			<tr>
				<td align="center"><a href="#" onclick="<?="javascript:editar(".$Registro->getId_Producto().");";?>">Editar</a></td>
				<td><?=$Registro->getId_Producto()?></td>
				<td><?=$Registro->getDescripcion()?></td>
				<td><?=$Registro->getPrecio()?></td>
				<td><?=$Registro->getUnidad()?></td>
			</tr>
<?php	}?>
	</table>
</form>