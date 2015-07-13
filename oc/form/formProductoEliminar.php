<?php
$oProducto=new Producto();
?>
<form method="post" action="accform/accProductoEliminar.php">
	<table style="width:700px;">
		<tr>
			<td colspan="5" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Eliminar Producto(es)</td>
		</tr>
		<tr style="background-color:#d8d8b1;">
			<td>&nbsp;</td>
			<td>Codigo</td>
			<td>Descripcion</td>
			<td>Canti&oacute;n</td>
			<td>Prec&iacute;s</td>
		</tr>
<?php
	While($Registro=$oProducto->Selecciona()){?>
		<tr>
			<td>
				<input type="checkbox" name="elimina<?=$Registro->getCodigo()?>" value="<?=$Registro->getCodigo()?>">
			</td>
			<td><?=$Registro->getCodigo()?></td>
			<td><?=$Registro->getDescripcion()?></td>
			<td><?=$Registro->getCantidad()?></td>
			<td><?=$Registro->getPrecio()?></td>
		</tr>
<?php
	}
?>
		<tr>
			<td colspan="5" height="40" valign="bottom" align="center">
				<input type="submit" id="btneliminar" value="Eliminar" />
			</td>
		</tr>
	</table>
</form>
