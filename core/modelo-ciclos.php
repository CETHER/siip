<?php
  /**
  * Clase que gestiona lo relacionado a la tabla ciclos
  */
  
  require_once "conexion.php";
  
  class Ciclos extends Conexion 
  {
    public $id_ciclo;
    public $nombre;
    public $fecha_inicio;
    public $fecha_fin;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function obtenerCiclo( )
    { 
      $sql = "select * from ciclos where id_ciclo='$this->id_ciclo' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->nombre = $obj->nombre;
	$this->fecha_inicio = $obj->fecha_inicio;
	$this->fecha_fin = $obj->fecha_fin;  
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaCiclos( )
    { 
      $sql = "select * from ciclos where status='1' order by id_ciclo";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_ciclo[$i] = $obj->id_ciclo;
	$this->nombre[$i] = $obj->nombre;
	$this->fecha_inicio[$i] = $obj->fecha_inicio;
	$this->fecha_fin[$i] = $obj->fecha_fin;  
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>