<?php
  /**
  * Clase que gestiona lo relacionado a la tabla aulas
  */
  
  require_once "../core/conexion.php";
  
  class Aulas extends Conexion 
  {
    public $id_aula;
    public $edificio;
    public $aula;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function obtenerAula( )
    { 
      $sql = "select * from aulas where id_aula='$this->id_aula' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->edificio = $obj->edificio;
	$this->aula = $obj->aula;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaAulas( )
    { 
      $sql = "select * from aulas where status='1' order by id_aula";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_aula[$i] = $obj->id_aula;
	$this->edificio[$i] = $obj->edificio;
	$this->aula[$i] = $obj->aula;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>