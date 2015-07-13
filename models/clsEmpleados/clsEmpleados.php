<?php
/**
  * @package: Clase Empleados
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-10-14
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once(dirname(__FILE__).'/../db/clsDatos.php'); 
  // INI. de Clase 
  class clsEmpleados{
	 private $cod_empleado;		// Codigo del Cliente
	 private $f_creacion;	
	 private $programa;	
	 private $nombre_usuario;	
	 private $num_identidad;	
	 private $nom_name1; 
	 private $nom_name2;
	 private $apell_1;
	 private $apell_2;
	 private $telefono;
	 private $celular;	
	 private $email;	
	 private $ref_dir;
	 private $id_tipo_empleado;  	// Tipo de Cliente
     private $id_est_empleado;  	// Estado de Cliente
	 private $f_nacimiento;	
	 private $id_persona;	
	 private $cod_persona;	
	 private $id_puesto_lab;		// Puestos Laborales
	 
	
	// Constructor de la Clase
	// INI.
	public function __construct($cod_empleado, $f_creacion, $programa, $nombre_usuario, $num_identidad, $nom_name1, $nom_name2, $apell_1, $apell_2, $telefono, $celular, $email, $ref_dir, $id_tipo_empleado, $id_est_empleado, $f_nacimiento, $id_persona, $cod_persona, $id_puesto_lab){
		
		$this->cod_empleado 		= $cod_empleado;
		$this->f_creacion 			= $f_creacion;
		$this->programa 			= $programa;
		$this->nombre_usuario   	= $nombre_usuario;
		$this->num_identidad		= $num_identidad;
		$this->nom_name1	 		= $nom_name1;
		$this->nom_name2	 		= $nom_name2;
		$this->apell_1	 			= $apell_1;
		$this->apell_2	 			= $apell_2;
		$this->telefono	 			= $telefono;
		$this->celular	 			= $celular;
		$this->email	 			= $email;
		$this->ref_dir	 			= $ref_dir;
		$this->id_tipo_empleado	 	= $id_tipo_empleado;
		$this->id_est_empleado		= $id_est_empleado;
		$this->f_nacimiento			= $f_nacimiento;
		$this->id_persona			= $id_persona;
		$this->cod_persona			= $cod_persona;
		$this->id_puesto_lab		= $id_puesto_lab;
		
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase
	public function get_cod_empleado(){
		return $this->cod_empleado;
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
	
	public function get_id_tipo_empleado(){
		return $this->id_tipo_empleado;
	}
		
	public function get_id_est_empleado(){
		return $this->id_est_empleado;
	}
	
	public function get_f_nacimiento(){
		return $this->f_nacimiento;
	}
	
	public function get_id_persona(){
		return $this->id_persona;
	}
	
	public function get_cod_persona(){
		return $this->cod_persona;
	}
	
	public function get_id_puesto_lab(){
		return $this->id_puesto_lab;
	}
	
	// FIN de Metodos Get ...
	
	// Busqueda de un Cliente si Existente *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select e.cod_empleado, e.id_persona, e.f_creacion,
					   e.programa, e.usuario, e.id_tipo_empleado, 
					   e.id_estado_empleado, e.id_puesto_lab,
					   p.no_identidad, p.nombre_1, p.nombre_2,
					   p.apellido_1, p.apellido_2, p.f_nacimiento,
					   p.telefono, p.celular, p.direccion, p.e_mail,
					   p.cod_persona
				from t00_empleados e, t00_personas p
				where e.cod_empleado = '$this->cod_empleado' and
					    e.id_persona = p.id_persona ";
				
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_empleado 		= $columna['cod_empleado'];
				$this->f_creacion 			= $columna['f_creacion'];
				$this->programa 			= $columna['programa'];
				$this->nombre_usuario   	= $columna['usuario'];
				$this->num_identidad		= $columna['no_identidad'];
				$this->nom_name1		   	= $columna['nombre_1'];
				$this->nom_name2		   	= $columna['nombre_2'];
				$this->apell_1		   		= $columna['apellido_1'];
				$this->apell_2		   		= $columna['apellido_2'];
				$this->telefono		   		= $columna['telefono'];
				$this->celular		   		= $columna['celular'];
				$this->email		   		= $columna['e_mail'];
				$this->ref_dir		   		= $columna['direccion'];
				$this->id_tipo_empleado	  	= $columna['id_tipo_empleado']; 			// Tipo del Empleado
				$this->id_est_empleado  	= $columna['id_estado_empleado']; 				// Estado del Empleado
				$this->f_nacimiento  		= $columna['f_nacimiento'];
				$this->id_persona  			= $columna['id_persona'];
				$this->cod_persona  		= $columna['cod_persona'];
				$this->id_puesto_lab  		= $columna['id_puesto_lab'];	
				$encontro 					= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Tipo de Empleados ...
	
	// Insercion de una Persona ala BD ******************************************
	public function incluir(){
		$objDatos = new clsDatos();
		// Ejecuta Insert en t00_empleados		
		$concat = "$this->nom_name1.$this->apell_1";			
		$sql = "insert into t00_empleados(cod_empleado, id_persona, f_creacion, programa, usuario, id_tipo_empleado, id_estado_empleado, id_puesto_lab, nombre_empleado) values ('$this->cod_empleado', '$this->id_persona', '$this->f_creacion', '$this->programa', '$this->nombre_usuario', '$this->id_tipo_empleado', '$this->id_est_empleado', '$this->id_puesto_lab', '$concat')";
		
		$objDatos->ejecutar($sql);	
		$objDatos->cerrarconecxion();
	}
	// FIN de Insercion de Tipo de Empleados ...
	
	// Modificacion de Tipo de Empleados *************************************************
	public function modificar()
	{
		$objDatos = new clsDatos();
		$concat = "$this->nom_name1.$this->apell_1";
		$sql = "update t00_empleados 
				set f_creacion = '$this->f_creacion', programa = '$this->programa', usuario = '$this->nombre_usuario', 
								 id_persona = '$this->id_persona', id_tipo_empleado = '$this->id_tipo_empleado', id_estado_empleado = '$this->id_est_empleado', id_puesto_lab = '$this->id_puesto_lab', nombre_empleado = '$concat' 
				where cod_empleado = '$this->cod_empleado' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
		
	}
	// FIN de Modificacion de Tipo de Empleados ...
	
	// Eliminacion de Tipo de Empleados **************************************************
	public function eliminar()
	{
		$objDatos = new clsDatos();
		$sql = "delete from t00_empleados where cod_empleado = '$this->cod_empleado' ";
		
		$objDatos->ejecutar($sql);
		$objDatos->cerrarconecxion();
	
	}
	// FIN de Eliminacion de Tipo de Empleados ...
	
} // FIN DE CLASE ...
?>