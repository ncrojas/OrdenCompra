<?php
class TipoProducto{
	
	/* ****************************** */
	/*     P R O P I E D A D E S      */
	/* ****************************** */
	
	private $nId_TipoProducto;
	private $sDescripcion_Tipo;
	
	
	/* ****************************** */
	/*     C O N S T R U C T O R      */
	/* ****************************** */
	
	function __construct($nidp=NULL, $sdes=NULL){
		$this->nId_TipoProducto = $nidp;
		$this->sDescripcion_Tipo = $sdes;
	}
	
	
	/* ****************************************************** */
	/*     A C C E S A D O R ES    Y   M U T A D O R E S      */
	/* ****************************************************** */
	
	function getId_TipoProducto(){
		return $this->nId_TipoProducto;
	}
	
	function setId_TipoProducto($nidp){
		$this->nId_TipoProducto = $nidp;
	}
	
	function getDescripcion_Tipo(){
		return $this->sDescripcion_Tipo;
	}
	
	function setDescripcion_Tipo($sdes){
		$this->sDescripcion_Tipo = $sdes;
	}
	
	
	/* ****************************** */
	/*       F U N C I O N E S        */
	/* ****************************** */
	
	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definición del query que permitira eliminar un registro*/
		$sqldel="DELETE FROM tipo_producto WHERE id_tipoproducto=:id";
	
		/*Preparación SQL*/
		$querydel=$db->prepare($sqldel);
			
		$querydel->bindParam(':id',$id);
		
		$valaux=$querydel->execute();
	
		return $valaux;
	}
	
	
	function Agregar(){
		$db=dbconnect();
		$sqlins = " INSERT INTO tipo_producto (descripcion_tipo) ";
		$sqlins.= " VALUES (:des) ";
		
		/*Preparacion SQL*/
		try {
			$queryins=$db->prepare($sqlins);
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryins->bindParam(':des',$this->sDescripcion_Tipo);
	
		try {
			$queryins->execute();
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
	
	
	function Actualizar(){
		$db=dbconnect();
		$sqlupd = " UPDATE tipo_producto SET descripcion_tipo=:des ";
		$sqlupd.= " WHERE id_tipoproducto=:id ";
		
		/*Preparacion SQL*/
		try {
			$queryupd=$db->prepare($sqlupd);
		} catch( PDOException $Exception ) {
			echo "Clase Proveedor:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryupd->bindParam(':des',$this->sDescripcion_Tipo);
		$queryupd->bindParam(':id',$this->nId_TipoProducto);
		
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
	
			$sqlsel = " SELECT id_tipoproducto, descripcion_tipo ";
			$sqlsel.= " FROM tipo_producto ORDER BY descripcion_tipo ";
				
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
				
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['id_tipoproducto'], $registro['descripcion_tipo']);
		}
		else {
			return false;
		}
	}
	
	function LeerRegistro(){
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
			
			$sqlsel = " SELECT id_tipoproducto, descripcion_tipo ";
			$sqlsel.= " FROM tipo_producto WHERE id_tipoproducto=:id ";
			
			/*Preparación SQL*/
			$querysel=$db->prepare($sqlsel);
			
			$querysel->bindParam(':id',$this->nId_TipoProducto);
			
			$querysel->execute();
		}
		
		$registro = $querysel->fetch();
		if ($registro){
			return new self($registro['id_tipoproducto'], $registro['descripcion_tipo']);
		}
		else {
			return false;
		}
	}
}
?>
