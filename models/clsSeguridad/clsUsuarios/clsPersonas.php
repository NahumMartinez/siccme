<?php
/**
  * @package: Clase Personas
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-10-31
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsClientes{
	 private $cod_persona;	
	 private $f_creacion;	
	 private $programa;	
	 private $nombre_usuario;	
	 private $id_sexo;	
	 private $id_est_civil;
	 private $id_est_per;
	 private $id_munic;	
	 private $num_identidad;	
	 private $num_rtn;	
	 private $num_pas;	
	 private $nom_name1; 
	 private $nom_name2;
	 private $apell_1;
	 private $apell_2;
	 private $telefono;
	 private $celular;	
	 private $email;	
	 private $skype;
     private $facebook;	
	 private $twitter;	
	 private $ref_dir;
	 private $id_cond_fiscal;
	 private $f_nacimiento;	
	 
	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_persona, $f_creacion, $programa, $nombre_usuario, $id_sexo, $id_est_civil, $id_est_per, $id_munic, $num_identidad, $num_rtn, $num_pas, $nom_name1, $nom_name2, $apell_1, $apell_2, $telefono, $celular, $email, $skype, $facebook, $twitter, $ref_dir, $id_cond_fiscal, $f_nacimiento){
		
		$this->cod_persona 		= $cod_persona;
		$this->f_creacion 		= $f_creacion;
		$this->programa 		= $programa;
		$this->nombre_usuario   = $nombre_usuario;
		$this->id_sexo	 		= $id_sexo;
		$this->id_est_civil		= $id_est_civil;
		$this->id_est_per	 	= $id_est_per;
		$this->id_munic	 		= $id_munic;
		$this->num_identidad	= $num_identidad;
		$this->num_rtn	 		= $num_rtn;
		$this->num_pas	 		= $num_pas;
		$this->nom_name1	 	= $nom_name1;
		$this->nom_name2	 	= $nom_name2;
		$this->apell_1	 		= $apell_1;
		$this->apell_2	 		= $apell_2;
		$this->telefono	 		= $telefono;
		$this->celular	 		= $celular;
		$this->email	 		= $email;
		$this->skype	 		= $skype;
		$this->facebook	 		= $facebook;
		$this->twitter	 		= $twitter;
		$this->ref_dir	 		= $ref_dir;
		$this->id_cond_fiscal	= $id_cond_fiscal;
		$this->f_nacimiento		= $f_nacimiento;
		
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase
	public function get_cod_persona(){
		return $this->cod_persona;
	}
	
	public function get_f_creacion(){
		return $this->f_creacion;
	}
	
	public function get_programa(){
		return $this->programa;
	}
	
	public function get_nombre_usuario(){
		return $this->nombre_usuario;
	}
	
	public function get_id_sexo(){
		return $this->id_sexo;
	}
	
	public function get_est_civil(){
		return $this->id_est_civil;
	}
	
	public function get_est_pers(){
		return $this->id_est_per;
	}
	
	public function get_id_munic(){
		return $this->id_munic;
	}
	
	public function get_num_identidad(){
		return $this->num_identidad;
	}
	
	public function get_num_rtn(){
		return $this->num_rtn;
	}
	
	public function get_num_pas(){
		return $this->num_pas;
	}
	
	public function get_nom_1(){
		return $this->nom_name1;
	}
	
	public function get_nom_2(){
		return $this->nom_name2;
	}
	
	public function get_ape_1(){
		return $this->apell_1;
	}
	
	public function get_ape_2(){
		return $this->apell_2;
	}
	
	public function get_telefono(){
		return $this->telefono;
	}
	
	public function get_celular(){
		return $this->celular;
	}
	
	public function get_email(){
		return $this->email;
	}
	
	public function get_skype(){
		return $this->skype;
	}
	
	public function get_facebook(){
		return $this->facebook;
	}
	
	public function get_twitter(){
		return $this->twitter;
	}
	
	public function get_ref_dir(){
		return $this->ref_dir;
	}
		
	public function get_id_cond_fiscal(){
		return $this->id_cond_fiscal;
	}
		
	public function get_f_nacimiento(){
		return $this->f_nacimiento;
	}
	
	// FIN de Metodos Get ...
	
	// Busqueda de una Persona si Existente *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select p.*
				from t00_personas p, t00_municipios m, 
					 t00_sexo s, t00_estados es, t00_estado_civil ec, t00_tipos t 
				where (p.cod_persona = '$this->cod_persona') 
				     and p.id_estado_civil = ec.id_estado_civil 
					 and p.id_estado       = es.id_estado
					 and p.id_sexo         = s.id_sexo
				     and p.id_munic        = m.id_munic
					 and p.id_persona      = t.id_tipo ";
					 
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_persona 			= $columna['cod_persona'];
				$this->id_sexo 				= $columna['id_sexo'];
				$this->f_creacion 			= $columna['f_creacion'];
				$this->programa 			= $columna['programa'];
				$this->nombre_usuario   	= $columna['usuario'];
				$this->id_est_civil   		= $columna['id_estado_civil'];
				$this->id_est_per		   	= $columna['id_estado'];
				$this->id_munic		   		= $columna['id_munic'];
				$this->num_identidad		= $columna['no_identidad'];
				$this->num_rtn		   		= $columna['rtn'];
				$this->num_pas		   		= $columna['no_pasaporte'];
				$this->nom_name1		   	= $columna['nombre_1'];
				$this->nom_name2		   	= $columna['nombre_2'];
				$this->apell_1		   		= $columna['apellido_1'];
				$this->apell_2		   		= $columna['apellido_2'];
				$this->telefono		   		= $columna['telefono'];
				$this->celular		   		= $columna['celular'];
				$this->email		   		= $columna['e_mail'];
				$this->skype		   		= $columna['skype'];
				$this->facebook		   		= $columna['facebook'];
				$this->twitter		   		= $columna['twitter'];
				$this->ref_dir		   		= $columna['direccion'];
				$this->id_cond_fiscal  		= $columna['id_tipo_persona'];
				$this->f_nacimiento  		= $columna['f_nacimiento'];
								
				$encontro 					= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Persona ...
	
	// Insercion de una Persona ala BD ******************************************
	public function incluir(){
		$objDatos = new clsDatos();
		// Ejecuta Insert en t00_personas		
		$sql = "insert into t00_personas(cod_persona, id_tipo_persona, f_creacion, programa, usuario, id_sexo, id_estado_civil, id_munic, id_estado, no_identidad, nombre_1, nombre_2, apellido_1, apellido_2, f_nacimiento, telefono, celular, direccion, e_mail, skype, facebook, rtn, no_pasaporte, twitter) values ('$this->cod_persona', '$this->id_cond_fiscal', '$this->f_creacion','$this->programa','$this->nombre_usuario', '$this->id_sexo', '$this->id_est_civil', '$this->id_munic', '$this->id_est_per', '$this->num_identidad', '$this->nom_name1', '$this->nom_name2', '$this->apell_1', '$this->apell_2', '$this->f_nacimiento', '$this->telefono', '$this->celular', '$this->ref_dir', '$this->email', '$this->skype', '$this->facebook', '$this->num_rtn', '$this->num_pas', '$this->twitter')";
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Persona ...
	
	// Modificacion de Persona *************************************************
	public function modificar()
	{
		$objDatos = new clsDatos();
		$sql = "update t00_personas set id_tipo_persona = '$this->id_cond_fiscal', f_creacion = '$this->f_creacion', programa = '$this->programa', usuario = '$this->nombre_usuario', id_sexo = '$this->id_sexo', id_estado_civil = '$this->id_est_civil', id_munic = '$this->id_munic', id_estado = '$this->id_est_per', no_identidad = '$this->num_identidad', nombre_1 = '$this->nom_name1', nombre_2 = '$this->nom_name2', apellido_1 = '$this->apell_1', apellido_2 = '$this->apell_2', f_nacimiento = '$this->f_nacimiento', telefono = '$this->telefono', celular = '$this->celular', direccion = '$this->ref_dir', e_mail = '$this->email', skype = '$this->skype', facebook = '$this->facebook', rtn = '$this->num_rtn', no_pasaporte = '$this->num_pas', twitter = '$this->twitter', f_nacimiento = '$this->f_nacimiento' 
		where cod_persona = '$this->cod_persona' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Modificacion de Persona ...
	
	// Eliminacion de Persona **************************************************
	public function eliminar()
	{
		$objDatos = new clsDatos();
		$sql = "delete from t00_personas where cod_persona = '$this->cod_persona' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Persona ...
	
} // FIN DE CLASE ...
?>