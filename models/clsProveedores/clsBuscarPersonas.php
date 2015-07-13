<?php
/**
  * @package: Clase Buscar Personas
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-11-01
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsBuscaPersonas{
	 private $cod_persona;
	 private $id_persona;
	 private $num_identidad;	
	 private $nom_name1; 
	 private $nom_name2;
	 private $apell_1;
	 private $apell_2;
	 private $telefono;
	 private $celular;	
	 private $email;	
	 private $ref_dir;
	 private $f_nacimiento;
	 	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_persona, $num_identidad, $nom_name1, $nom_name2, $apell_1, $apell_2, $telefono, $celular, $email, $ref_dir, $f_nacimiento, $id_persona ){
		
		$this->cod_persona 		= $cod_persona;
		$this->num_identidad	= $num_identidad;
		$this->nom_name1	 	= $nom_name1;
		$this->nom_name2	 	= $nom_name2;
		$this->apell_1	 		= $apell_1;
		$this->apell_2	 		= $apell_2;
		$this->telefono	 		= $telefono;
		$this->celular	 		= $celular;
		$this->email	 		= $email;
		$this->ref_dir	 		= $ref_dir;
		$this->f_nacimiento		= $f_nacimiento;
		$this->id_persona		= $id_persona;
				
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase 
	public function get_id_persona(){
		return $this->id_persona;
	}
	
	public function get_cod_persona(){
		return $this->cod_persona;
	}
			
	public function get_num_identidad(){
		return $this->num_identidad;
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
		
	public function get_ref_dir(){
		return $this->ref_dir;
	}
	
	public function get_f_nacimiento(){
		return $this->f_nacimiento;
	}
		
	// FIN de Metodos Get ...
	
	// Busqueda de un Persona si Existente en la Ventana de Clientes *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select p.no_identidad, p.cod_persona, p.nombre_1, p.nombre_2,
					   p.apellido_1, p.apellido_2, p.telefono, p.celular,
					   p.direccion, p.e_mail, p.f_nacimiento, p.id_persona
				from t00_personas p
				where p.cod_persona = '$this->cod_persona' ";
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_persona 			= $columna['cod_persona'];
				$this->num_identidad		= $columna['no_identidad'];
				$this->nom_name1		   	= $columna['nombre_1'];
				$this->nom_name2		   	= $columna['nombre_2'];
				$this->apell_1		   		= $columna['apellido_1'];
				$this->apell_2		   		= $columna['apellido_2'];
				$this->telefono		   		= $columna['telefono'];
				$this->celular		   		= $columna['celular'];
				$this->email		   		= $columna['e_mail'];
				$this->ref_dir		   		= $columna['direccion'];
				$this->f_nacimiento	   		= $columna['f_nacimiento'];
				$this->id_persona	   		= $columna['id_persona'];
				$encontro 					= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Personas desde Clientes ...
			
} // FIN DE CLASE ...
?>