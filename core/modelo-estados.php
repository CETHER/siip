<?php
  /**
  * Clase que gestiona lo relacionado a la tabla estados
  */
  
  require_once "conexion.php";
  
  class Estados extends Conexion 
  {
    public $id_estado;
    public $nombre;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function obtenerEstado( )
    { 
      $sql = "select * from estados where id_estado='$this->id_estado' and status='1'";
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
    
    
    public function listaEstados( )
    { 
      $sql = "select * from estados where status='1' order by id_estado";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_estado[$i] = $obj->id_estado;
	$this->nombre[$i] = $obj->nombre;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>