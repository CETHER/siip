<?php
  /**
  * Clase que gestiona lo relacionado a la tabla orientaciones
  */
  
  require_once "conexion.php";
  
  class Orientaciones extends Conexion 
  {
    public $id_orientacion;
    public $id_programa;
    public $nombre;
    public $descripcion;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function obtenerOrientacion( )
    { 
      $sql = "select * from orientaciones where id_orientacion='$this->id_orientacion' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_programa = $obj->id_programa;
	$this->nombre = $obj->nombre;
	$this->descripcion = $obj->descripcion;  
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaOrientacionesPrograma( )
    { 
      $sql = "select * from orientaciones where id_programa='$this->id_programa' and status='1' order by id_orientacion";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_orientacion[$i] = $obj->id_orientacion;
	$this->nombre[$i] = $obj->nombre;
	$this->descripcion[$i] = $obj->descripcion;  
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>