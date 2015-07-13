<?php
/**
  * @package: Script de Carga de Combo
  * @author: Nahum Martinez (NMA | GEN)
  * @fecha : 2015-04-04
  * @version: 1.0
  * @ubicacion: 504-POS/scripts/
  **/ 

require_once(dirname(__FILE__).'/../models/db/clsDatos.php'); 

// Declaracion de Propiedades
class C_Combo{
    private $p_tabla;
    private $p_value;
    private $p_opcion;
    
    
    // Constructor de la Clase
	// INI.
	public function __construct($p_tabla, $p_value, $p_opcion){
            $this->p_tabla  = $p_tabla;
            $this->p_value  = $p_value;
            $this->p_opcion  = $p_opcion;
	}
	// FIN de Contructor ...
	
	// Desctructor de la Clase
	public function __destruct(){
	
	}
	// FIN de Desctructor ...
        
        
        // Metodos Get de la Clase 
	public function get_p_tabla(){
		return $this->p_tabla;
	}
        
        public function get_p_value(){
		return $this->p_value;
	}
        
        public function get_p_opcion(){
		return $this->p_opcion;
	}
	
	// FIN de Metodos Get ...
        
        // Funcion de Carga de Combo Unnico
        public function CargaComboUnico($id) {
            
            
            
        }
    
}
