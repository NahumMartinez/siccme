<?php
/**
  * @package: Clase Usuarios
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-08-16
  * @version: 1.0
  * @ubicacion: 504-POS/models/
  **/ 

  require_once("../db/clsDatos.php");
  
  class clsUsuario{
	private $cod_usuario;
	private $f_creacion;
	private $programa;
	private $nombre_usuario;
	private $pass_usuario;
	private $id_tipo_usuario;  // JOIN CON TABLA TIPOS
	private $id_persona;	   // JOIN CON TABLA PERSONAS
	private $ip_host;
	private $h_entrada;
	private $h_salida;
	private $navegador;
	
	
	public function __construct($cod_usuario, $f_creacion, $programa, $nombre_usuario, $pass_usuario,
							   $id_tipo_usuario, $id_persona, $ip_host, $h_entrada, $h_salida, $navegador){
		
		$this->cod_usuario = $cod_usuario;
		$this->f_creacion = $f_creacion;
		$this->programa = $programa;
		$this->nombre_usuario = $nombre_usuario;
		$this->pass_usuario = $pass_usuario;
		$this->id_tipo_usuario = $id_tipo_usuario;
		$this->id_persona = $id_persona;
		$this->ip_host = $ip_host;
		$this->h_entrada = $h_entrada;
		$this->h_salida = $h_salida;
		$this->navegador = $navegador;
	
	}
	
	public function __destruct(){
	
	}
	
	public function get_cod_usuario(){
		return $this->cod_usuario;
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
	
	public function get_pass_usuario(){
		return $this->pass_usuario;
	}
	
	public function get_id_tipo_usuario(){
		return $this->id_tipo_usuario;
	}
	
	public function get_cod_usuario(){
		return $this->cod_usuario;
	}
	
	public function get_id_persona(){
		return $this->id_persona;
	}
	
	public function get_ip_host(){
		return $this->ip_host;
	}
	
	public function get_h_entrada(){
		return $this->h_entrada;
	}
	
	public function get_h_salida(){
		return $this->h_salida;
	}
	
	public function get_navegador(){
		return $this->navegador;
	}
	
	// Busqueda de un Usuario Existente
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
	}
  } // FIN DE CLASE
?>