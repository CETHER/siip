<?php
  /**
  * Clase que gestiona lo relacionado a la tabla países
  */
  
  require_once "conexion.php";
  
  class Paises extends Conexion 
  {
    public $id_pais;
    public $nombre;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function obtenerPais( )
    { 
      $sql = "select * from paises where id_pais='$this->id_pais' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->nombre = $obj->nombre;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaPaises( )
    { 
      $sql = "select * from paises where status='1' order by id_pais";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_pais[$i] = $obj->id_pais;
	$this->nombre[$i] = $obj->nombre;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>