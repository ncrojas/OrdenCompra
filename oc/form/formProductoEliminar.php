<?php
$oProducto=new Producto();
?>
<form method="post" action="accform/accProductoEliminar.php">
	<table style="width:700px;">
		<tr>
			<td colspan="5" height="30" valign="middle" align="center" style="color:#ffffff;background-color:#ff5512;">Eliminar Producto(s)</td>
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
			<td>
				<input type="checkbox" name="elimina<?=$Registro->getId_Producto()?>" value="<?=$Registro->getId_Producto()?>">
			</td>
			<td><?=$Registro->getId_Producto()?></td>
			<td><?=$Registro->getDescripcion()?></td>
			<td><?=$Registro->getPrecio()?></td>
			<td><?=$Registro->getUnidad()?></td>
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
