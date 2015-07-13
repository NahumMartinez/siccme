<?php

 class DB{
 	
   private $hostname = "localhost";
   private $user = "root";
   private $password = "";
   private $database = "db_siccme";
   private $tableName="t00_usuarios";
   private $db;
   private $resource;
 	
 	public function connectDB() {
 	  $this->db = mysql_connect( $this->hostname,$this->user,$this->password) or die("Could not connect database");
 	  mysql_select_db($this->database, $this->db) or die("Could not select database");
 	}
 	
 	
   public function executeQuery($q) {
     $this->resource=mysql_query("SELECT * FROM $this->tableName WHERE COD_USUARIO like '%$q%' or NICK_NAME like '%$q%' ");
   } 	
   
   public function fetchArray() {
     return mysql_fetch_array($this->resource);
   }
 	
 }

?>