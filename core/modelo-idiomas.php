<?php
  /**
  * Clase que gestiona lo relacionado a la tabla idiomas
  */
  
  require_once "conexion.php";
  
  class Idiomas extends Conexion 
  {
    public $id_idioma;
    public $nombre;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function obtenerIdioma( )
    { 
      $sql = "select * from idiomas where id_idioma='$this->id_idioma' and status='1'";
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
    
    
    public function listaIdiomas( )
    { 
      $sql = "select * from idiomas where status='1' order by id_idioma";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_idioma[$i] = $obj->id_idioma;
	$this->nombre[$i] = $obj->nombre;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>