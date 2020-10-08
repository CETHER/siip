<?php
  /**
  * Clase que gestiona la conexión con la base de datos
  */
  
  require_once "configuracion.php";
  
  class Conexion 
  { 
    protected $mysqli; 
    
    
    public function __construct( ) 
    { 
      $this->mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME ); 
      
      if( $this->mysqli->connect_errno ) 
      { 
        echo "Error al conectar con la base de datos: " . $this->mysqli->connect_error; 
        exit( );     
      } 
      
      $this->mysqli->set_charset( DB_CHARSET ); 
    }
  }
?>