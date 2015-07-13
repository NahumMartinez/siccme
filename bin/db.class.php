<?php

 class DB{
 	
 	private $hostname = "localhost";
   private $user = "root";
   private $password = "";
   private $database = "db_prueba";
   private $tableName="labs_user_info";
 	private $db;
 	private $resource;
 	
 	public function connectDB() {
 	  $this->db = mysql_connect( $this->hostname,$this->user,$this->password) or die("Could not connect database");
 	  mysql_select_db($this->database, $this->db) or die("Could not select database");
 	}
 	
 	
   public function executeQuery($q) {
     $this->resource=mysql_query("select * from $this->tableName where nombre like '%$q%' or apellido like '%$q%' ");
   } 	
   
   public function fetchArray() {
     return mysql_fetch_array($this->resource);
   }
 	
 }





?>