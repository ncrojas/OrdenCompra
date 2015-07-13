<?php

class Producto{
	
	/* ****************************** */
	/*     P R O P I E D A D E S      */
	/* ****************************** */
	
	private $nId_Producto;
	private $sDescripcion;
	private $nPrecio;
	private $sUnidad;
	private $nId_Tipo;
	
	
	/* ****************************** */
	/*     C O N S T R U C T O R      */
	/* ****************************** */
	
	function __construct($nidp=NULL, $sdes=NULL, $npre=NULL, $suni=NULL, $ntip=NULL){
		$this->nId_Producto = $nidp;
		$this->sDescripcion = $sdes;
		$this->nPrecio = $npre;
		$this->sUnidad = $suni;
		$this->nId_Tipo = $ntip;
	}
	
	
	/* ****************************************************** */
	/*     A C C E S A D O R ES    Y   M U T A D O R E S      */
	/* ****************************************************** */
	
	function getId_Producto(){
		return $this->nId_Producto;
	}
	
	function setId_Producto($nidp){
		$this->nId_Producto = $nidp;
	}
	
	function getDescripcion(){
		return $this->sDescripcion;
	}
	
	function setDescripcion($sdes){
		$this->sDescripcion = $sdes;
	}
	
	function getPrecio(){
		return $this->nPrecio;
	}
	
	function setPrecio($npre){
		$this->nPrecio = $npre;
	}
	
	function getUnidad(){
		return $this->sUnidad;
	}
	
	function setDireccion($suni){
		$this->sUnidad = $suni;
	}
	
	function getId_Tipo(){
		return $this->nId_Tipo;
	}
	
	function setId_Tipo($ntip){
		$this->nId_Tipo = $ntip;
	}
	
	/* ****************************** */
	/*       F U N C I O N E S        */
	/* ****************************** */
	
	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definición del query que permitira eliminar un registro*/
		$sqldel="DELETE FROM productos WHERE id_producto=:id";
	
		/*Preparación SQL*/
		$querydel=$db->prepare($sqldel);
			
		$querydel->bindParam(':id',$id);
		
		$valaux=$querydel->execute();
	
		return $valaux;
	}
	
	
	function Agregar(){
		$db=dbconnect();
		$sqlins = " INSERT INTO producto (descripcion, precio, unidad, id_tipo) ";
		$sqlins.= " VALUES (:des, :pre, :uni, :tip) ";
		
		/*Preparacion SQL*/
		try {
			$queryins=$db->prepare($sqlins);
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryins->bindParam(':des',$this->sDescripcion);
		$queryins->bindParam(':pre',$this->nPrecio);
		$queryins->bindParam(':uni',$this->sUnidad);
		$queryins->bindParam(':tip',$this->nId_Tipo);
	
		try {
			$queryins->execute();
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
	
	
	function Actualizar(){
		$db=dbconnect();
		$sqlupd = " UPDATE productos SET descripcion=:des, precio=:pre, unidad=:uni, id_tipo=:tip ";
		$sqlupd.= " WHERE id_producto=:id ";
		
		/*Preparacion SQL*/
		try {
			$queryupd=$db->prepare($sqlupd);
		} catch( PDOException $Exception ) {
			echo "Clase Proveedor:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryupd->bindParam(':des',$this->sDescripcion);
		$queryupd->bindParam(':pre',$this->nPrecio);
		$queryupd->bindParam(':uni',$this->sUnidad);
		$queryupd->bindParam(':tip',$this->nId_Tipo);
		$queryupd->bindParam(':id',$this->nId_Producto);
		
		try {
			$queryupd->execute();
		} catch( PDOException $Exception ) {
			echo "Clase Proveedor:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
	
	
	function Selecciona(){
	
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
	
			$sqlsel = " SELECT id_producto, descripcion, precio, unidad, id_tipo ";
			$sqlsel.= " FROM productos ORDER BY descripcion ";
				
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
				
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['id_producto'], $registro['descripcion'], $registro['precio'], $registro['unidad'], $registro['id_tipo']);
		}
		else {
			return false;
		}
	}
	
	function LeerRegistro(){
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
			
			$sqlsel = " SELECT id_producto, descripcion, precio, unidad, id_tipo ";
			$sqlsel.= " FROM productos WHERE id_producto=:id ";
			
			/*Preparación SQL*/
			$querysel=$db->prepare($sqlsel);
			
			$querysel->bindParam(':id',$this->nId_Producto);
			
			$querysel->execute();
		}
		
		$registro = $querysel->fetch();
		if ($registro){
			return new self($registro['idproveedor'], $registro['nombre'], $registro['descripcion'], $registro['direccion'], $registro['pais']);
		}
		else {
			return false;
		}
	}
}
?>
