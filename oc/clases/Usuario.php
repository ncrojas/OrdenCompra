<?php 

class Usuario{
	/* ****************************** */
	/*     P R O P I E D A D E S      */
	/* ****************************** */
	private $nid_usuario;
	private $slogin_usuario;
	private $spass_usuario;
	private $snombre_usuario;
	private $sapellido_usuario;
	private $scorreo_usuario;
	private $nedad_usuario;
	private $ncodigo_perfil;
	private $sfechanacimiento_usuario;
	
	
	/* ****************************** */
	/*     C O N S T R U C T O R      */
	/* ****************************** */
	function __construct($nid=NULL, $slog=NULL, $spas=NULL, $snom=NULL, $sape=NULL, $scor=NULL, $neda=NULL, $nper=NULL, $sfec=NULL){
		$this->nid_usuario = $nid;
		$this->slogin_usuario = $slog;
		$this->spass_usuario = md5($spas);
		$this->snombre_usuario = $snom;
		$this->sapellido_usuario = $sape;
		$this->scorreo_usuario = $scor;
		$this->nedad_usuario = $neda;
		$this->ncodigo_perfil = $nper;
		$this->sfechanacimiento_usuario = $sfec;
	}
	
	
	/* ****************************************************** */
	/*     A C C E S A D O R ES    Y   M U T A D O R E S      */
	/* ****************************************************** */
	public function getId_Usuario(){
		return $this->nid_usuario;
	}
	
	public function setId_Usuario($nid){
		$this->nid_usuario = $nid;
	}
	
	public function getLogin_Usuario(){
		return $this->slogin_usuario;
	}
	
	public function setLogin_Usuario($slog){
		$this->slogin_usuario = $slog;
	}
	
	public function getPass_Usuario(){
		return $this->spass_usuario;
	}
	
	public function setPass_Usuario($spas){
		$this->spass_usuario = md5($spas);
	}
	
	public function getNombre_Usuario(){
		return $this->snombre_usuario;
	}
	
	public function setNombre_Usuario($snom){
		$this->snombre_usuario = $snom;
	}
	
	public function getApellido_Usuario(){
		return $this->sapellido_usuario;
	}
	
	public function setApellido_Usuario($sape){
		$this->sapellido_usuario = $sape;
	}
	
	public function getCorreo_Usuario(){
		return $this->scorreo_usuario;
	}
	
	public function setCorreo_Usuario($scor){
		$this->scorreo_usuario = $scor;
	}
	
	public function getEdad_Usuario(){
		return $this->nedad_usuario;
	}
	
	public function setEdad_Usuario($neda){
		$this->nedad_usuario = $neda;
	}
	
	public function getCodigo_Perfil(){
		return $this->ncodigo_perfil;
	}
	
	public function setCodigo_Perfil($nper){
		$this->ncodigo_perfil = $nper;
	}
	
	public function getFechaNacimiento_Usuario(){
		return $this->sfechanacimiento_usuario;
	}
	
	public function setFechaNacimiento_Usuario($sfec){
		$this->sfechanacimiento_usuario = $sfec;
	}
	
	
	
	
	/* ****************************** */
	/*       F U N C I O N E S        */
	/* ****************************** */
	function VerificaUsuario(){
		$db=dbconnect();
		/*Definicion del query que permitira ingresar un nuevo registro*/
		$sqlsel="select login_usuario from usuarios where login_usuario=:log";

		/*Preparacion SQL*/
		$querysel=$db->prepare($sqlsel);

		/*Asignacion de parametros utilizando bindparam*/
		$querysel->bindParam(':log',$this->slogin_usuario);
		
		$datos=$querysel->execute();
		
		if ($querysel->rowcount()==1)return true; else return false;

	}

	function VerificaAcceso(){
		$db=dbconnect();
		
		$sqlsel = " SELECT id_usuario, login_usuario, pass_usuario, nombre_usuario, apellido_usuario, correo_usuario, edad_usuario, codigo_perfil, fechanacimiento_usuario ";
		$sqlsel.= " FROM usuarios ";
		$sqlsel.= " WHERE login_usuario=:log AND pass_usuario=:pas";
		
		$querysel=$db->prepare($sqlsel);
		
		$querysel->bindParam(':log',$this->slogin_usuario);
		$querysel->bindParam(':pas',$this->spass_usuario);
		
		$datos=$querysel->execute();
		
		if ($querysel->rowcount()==1){
			$registro = $querysel->fetch();
			if ($registro){
				$this->snombre_usuario=$registro["nombre_usuario"];
				$this->sapellido_usuario=$registro["apellido_usuario"];
				$this->ncodigo_perfil=$registro["codigo_perfil"];
			} else {
				$this->snombre_usuario="NOM: N/A ";
				$this->sapellido_usuario="APE: N/A ";
			}
			//return new self($registro['id_usuario'], $registro['login_usuario'], $registro['pass_usuario'],$registro['nombre_usuario'],$registro['apellido_usuario'],$registro['correo_usuario'],$registro['edad_usuario'],$registro['codigo_perfil'],$registro['fechanacimiento_usuario']);
			return true;
		}
		else{
			return false;
		}		

	}
	
	function Elimina($id){
	
		$db=dbconnect();
	
		/*Definicion del query que permitira eliminar un registro*/
		$sqldel="DELETE FROM usuarios WHERE id_usuario=:id";
	
		/*Preparacion SQL*/
		$querydel=$db->prepare($sqldel);
		
		$querydel->bindParam(':id',$id);
			
		$valaux=$querydel->execute();
	
		return $valaux;
	}
	
	function Agregar(){
		$db=dbconnect();
		$sqlins = " INSERT INTO usuarios (login_usuario, pass_usuario, nombre_usuario, apellido_usuario, correo_usuario, edad_usuario, codigo_perfil, fechanacimiento_usuario) ";
		$sqlins.= " VALUES (:log,:pas,:nom,:ape,:cor,:eda,:per,:fec)";
	
		// Valida si usuario existe, si existe no lo agrega.
		if ($this->VerificaUsuario()){
			echo "Clase Usuario:Agregar: El usuario $this->slogin_usuario existe en la base de datos.";
			return false;
		}
	
		/*Preparacion SQL*/
		try {
			$queryins=$db->prepare($sqlins);
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( ) . "<br/>".$sqlins;
			return false;
		}
	
		/*Asignacion de parametros utilizando bindparam*/
		$queryins->bindParam(':log',$this->slogin_usuario);
		$queryins->bindParam(':pas',$this->spass_usuario);
		$queryins->bindParam(':nom',$this->snombre_usuario);
		$queryins->bindParam(':ape',$this->sapellido_usuario);
		$queryins->bindParam(':cor',$this->scorreo_usuario);
		$queryins->bindParam(':eda',$this->nedad_usuario);
		$queryins->bindParam(':per',$this->ncodigo_perfil);
		$queryins->bindParam(':fec',$this->sfechanacimiento_usuario);
	
		try {
			$queryins->execute();
		} catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
			
	function Actualizar(){
		$db=dbconnect();
		$sqlupd = " UPDATE usuarios SET login_usuario=:log, nombre_usuario=:nom, apellido_usuario=:ape, correo_usuario=:cor, ";
		$sqlupd.= " edad_usuario=:eda, codigo_perfil=:per, fechanacimiento_usuario=:fec";
		$sqlupd.= " WHERE id_usuario=:id";
	
		/*Preparacion SQL*/
		try {
			$queryupd=$db->prepare($sqlupd);
		}
		catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Preparacion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	
		/*Asignacion de parametros utilizando bindparam*/
		$queryupd->bindParam(':log',$this->slogin_usuario);
		$queryupd->bindParam(':nom',$this->snombre_usuario);
		$queryupd->bindParam(':ape',$this->sapellido_usuario);
		$queryupd->bindParam(':cor',$this->scorreo_usuario);
		$queryupd->bindParam(':eda',$this->nedad_usuario);
		$queryupd->bindParam(':per',$this->ncodigo_perfil);
		$queryupd->bindParam(':fec',$this->sfechanacimiento_usuario);
		$queryupd->bindParam(':id',$this->nid_usuario);
	
		try {
			$queryupd->execute();
		}
		catch( PDOException $Exception ) {
			echo "Clase Usuario:ERROR:Ejecucion Query ".$Exception->getMessage( ).'/'. $Exception->getCode( );
		}
	}
	
	
	function Selecciona(){
		if (!$this->querysel){
			$db=dbconnect();
			/*Definición del query que permitira ingresar un nuevo registro*/
		
			$sqlsel = " SELECT id_usuario, login_usuario, pass_usuario, nombre_usuario, apellido_usuario, correo_usuario, edad_usuario, codigo_perfil, fechanacimiento_usuario ";
			$sqlsel.= " FROM usuarios ORDER BY login_usuario ";
				
			/*Preparación SQL*/
			$this->querysel=$db->prepare($sqlsel);
		
			$this->querysel->execute();
		}
		
		$registro = $this->querysel->fetch();
		if ($registro){
			return new self($registro['id_usuario'], $registro['login_usuario'], $registro['pass_usuario'],$registro['nombre_usuario'],$registro['apellido_usuario'],$registro['correo_usuario'],$registro['edad_usuario'],$registro['codigo_perfil'],$registro['fechanacimiento_usuario']);
		}
		else {
			return false;
		}
	}
	
	
	function LeerRegistro(){
		if (!$querysel){
			$db=dbconnect();
			
			$sqlsel = " SELECT id_usuario, login_usuario, pass_usuario, nombre_usuario, apellido_usuario, correo_usuario, edad_usuario, codigo_perfil, fechanacimiento_usuario ";
			$sqlsel.= " FROM usuarios WHERE id_usuario=:id ";
				
			/*Preparacion SQL*/
			$querysel=$db->prepare($sqlsel);
			
			$querysel->bindParam(':id',$this->nid_usuario);
				
			$querysel->execute();
		}
	
		$registro = $querysel->fetch();
		if ($registro){
			return new self($registro['id_usuario'], $registro['login_usuario'], $registro['pass_usuario'],$registro['nombre_usuario'],$registro['apellido_usuario'],$registro['correo_usuario'],$registro['edad_usuario'],$registro['codigo_perfil'],$registro['fechanacimiento_usuario']);
		}
		else {
			return false;
		}
	}

}
?>