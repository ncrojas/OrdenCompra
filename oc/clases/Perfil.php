<?php
class Perfil{
	
	/* ****************************** */
	/*     P R O P I E D A D E S      */
	/* ****************************** */
	
	private $nId_Perfil;
	private $sDescripcion_Perfil;
	
	
	/* ****************************** */
	/*     C O N S T R U C T O R      */
	/* ****************************** */
	
	function __construct($nidp=NULL, $sdes=NULL){
		$this->nId_Perfil = $nidp;
		$this->sDescripcion_Perfil = $sdes;
	}
	
	
	/* ****************************************************** */
	/*     A C C E S A D O R ES    Y   M U T A D O R E S      */
	/* ****************************************************** */
	
	function getId_Perfil(){
		return $this->nId_Perfil;
	}
	
	function setId_Perfil($nidp){
		$this->nId_Perfil = $nidp;
	}
	
	function getDescripcion_Perfil(){
		return $this->sDescripcion_Perfil;
	}
	
	function setDescripcion_Perfil($sdes){
		$this->sDescripcion_Perfil = $sdes;
	}
	
	
	/* ****************************** */
	/*       F U N C I O N E S        */
	/* ****************************** */
	
	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definición del query que permitira eliminar un registro*/
		$sqldel="DELETE FROM perfil WHERE id_perfil=:id";
	
		/*Preparación SQL*/
		$querydel=$db->prepare($sqldel);
			
		$querydel->bindParam(':id',$id);
		
		$valaux=$querydel->execute();
	
		return $valaux;
	}
	
	
	function Agregar(){
		$db=dbconnect();
		$sqlins = " INSERT INTO perfil (descripcion_perfil) ";
		$sqlins.= " VALUES (:des) ";
		
		/*Preparacion SQL*/
		try {
			$queryins=$db->prepare($sqlins);
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryins->bindParam(':des',$this->sDescripcion_Perfil);
	
		try {
			$queryins->execute();
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
	
	
	function Actualizar(){
		$db=dbconnect();
		$sqlupd = " UPDATE perfil SET descripcion_perfil=:des ";
		$sqlupd.= " WHERE id_perfil=:id ";
		
		/*Preparacion SQL*/
		try {
			$queryupd=$db->prepare($sqlupd);
		} catch( PDOException $Exception ) {
			echo "Clase Proveedor:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
		
		/*Asignacion de parametros utilizando bindparam*/
		$queryupd->bindParam(':des',$this->sDescripcion_Perfil);
		$queryupd->bindParam(':id',$this->nId_Perfil);
		
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
	
			$sqlsel = " SELECT id_perfil, descripcion_perfil ";
			$sqlsel.= " FROM perfil ORDER BY descripcion_perfil ";
			
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
				
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['id_perfil'], $registro['descripcion_perfil']);
		}
		else {
			return false;
		}
	}
	
	function LeerRegistro(){
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
			
			$sqlsel = " SELECT id_perfil, descripcion_perfil ";
			$sqlsel.= " FROM perfil WHERE id_perfil=:id ";
			
			/*Preparación SQL*/
			$querysel=$db->prepare($sqlsel);
			
			$querysel->bindParam(':id',$this->nId_Perfil);
			
			$querysel->execute();
		}
		
		$registro = $querysel->fetch();
		if ($registro){
			return new self($registro['id_perfil'], $registro['descripcion_perfil']);
		}
		else {
			return false;
		}
	}
}
?>
