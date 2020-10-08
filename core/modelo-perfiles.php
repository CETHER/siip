<?php
  /**
  * Clase que gestiona lo relacionado a la tabla perfiles
  */
  
  require_once "conexion.php";
  
  class Perfiles extends Conexion 
  {
    public $id_perfil;
    public $nombre;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function obtenerPerfil( ) 
    { 
      $sql = "select * from perfiles where id_perfil='$this->id_perfil' and status='1'";
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
    
    
    public function listaPerfiles( ) 
    { 
      $sql = "select * from perfiles where id_perfil!='1' and status='1' order by id_perfil";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_perfil[$i] = $obj->id_perfil;
	$this->nombre[$i] = $obj->nombre;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>