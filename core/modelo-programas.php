<?php
  /**
  * Clase que gestiona lo relacionado a la tabla programas
  */
  
  require_once "conexion.php";
  
  class Programas extends Conexion 
  {
    public $id_programa;
    public $nombre;
    public $descripcion;
    public $creditos;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function obtenerPrograma( ) 
    { 
      $sql = "select * from programas where id_programa='$this->id_programa' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->nombre = $obj->nombre;
	$this->descripcion = $obj->descripcion;
        $this->creditos = $obj->creditos;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>