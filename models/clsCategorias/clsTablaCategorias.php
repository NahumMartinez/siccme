<?php
/**
  * @package: Clase Tabla Categorias
  * @author: Nahum Martinez (NMA | PER)
  * @fecha: 2014-10-29
  * @version: 1.0
  * @ubicacion: 504POS/models/
  **/ 

  include(dirname(__FILE__).'/../db/clsDatos.php');  
  // INI. de Clase 
  class clsCategoria{
	private $cod_cat;
	private $f_creacion;
	private $programa;
	private $nombre_usuario;
	private $desc_cat;
	
	// Constructor de la Calse
	// INI.
	public function __construct(){
		
		$this->cod_cat 			= $cod_cat;
		$this->f_creacion 		= $f_creacion;
		$this->programa 		= $programa;
		$this->nombre_usuario 	= $nombre_usuario;
		$this->desc_cat 		= $desc_cat;
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
	
	// Metodos Get de la Clase
	public function get_cod_cat(){
		return $this->cod_cat;
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
	
	public function get_desc_cat(){
		return $this->desc_cat;
	}
	// FIN de Metodos Get ...
	
	// Busqueda de una Categoria si Existente *************************************
	public function buscar(){
		$encontro = false;
		$objDatos = new clsDatos();
		$sql = "select * from t00_categorias where (cod_categoria = '$this->cod_cat')";
		$datos_encontrados = $objDatos->filtro($sql);
			if($columna = $objDatos->proximo($datos_encontrados))
			{
				$this->cod_cat 			= $columna['cod_categoria'];
				$this->desc_cat 		= $columna['desc_categoria'];
				$this->f_creacion 		= $columna['f_creacion'];
				$this->programa 		= $columna['programa'];
				$this->nombre_usuario   = $columna['usuario'];
				$encontro 				= true;
			}
			
			$objDatos->cerrarfiltro($datos_encontrados);
			$objDatos->cerrarconecxion();
			
			return $encontro;
	}
	// FIN de Busqueda de Categoria ...
			
  } // FIN DE CLASE ...
?>