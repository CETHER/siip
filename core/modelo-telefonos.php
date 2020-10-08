<?php
  /**
  * Clase que gestiona lo relacionado a la tabla telefonos
  */
  
  require_once "conexion.php";
  
  class Telefonos extends Conexion 
  {
    public $id_telefono;
    public $id_programa;
    public $telefono;
    public $dependencia;
    public $imagen;
    public $status;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarTelefono( )
    {
      $sql = "select id_telefono from telefonos order by id_telefono";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_telefono = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_telefono = $obj->id_telefono;
        $this->id_telefono++;
      }
      
      if( $this->imagen!=null )
      {
        $ext = pathinfo( $this->imagen, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->imagen, "../uploads/T-".$this->id_telefono.".".$ext );
	$this->imagen = "T-".$this->id_telefono.".".$ext;
      }
      
      $sql = "insert into telefonos values ( '$this->id_telefono', '$this->id_programa', '$this->telefono', '$this->dependencia', '$this->imagen', 
      '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarTelefono( )
    {
      $sql = "update telefonos set status='0' where id_telefono='$this->id_telefono'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarTelefono( )
    {
      if( $this->imagen!=null )
      {
        $ext = pathinfo( $this->imagen, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->imagen, "../uploads/T-".$this->id_telefono.".".$ext );
	$this->imagen = "T-".$this->id_telefono.".".$ext;
	
	$sql = "update telefonos set imagen='$this->imagen' where id_telefono='$this->id_telefono'";
        $res = $this->mysqli->query( $sql );
      }
      
      $sql = "update telefonos set telefono='$this->telefono', dependencia='$this->dependencia' where id_telefono='$this->id_telefono'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerTelefono( )
    {  
      $sql = "select * from telefonos where id_telefono='$this->id_telefono' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_programa = $obj->id_programa;
	$this->telefono = $obj->telefono;
	$this->dependencia = $obj->dependencia;
	$this->imagen = $obj->imagen;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaTelefonosPrograma( )
    {
      $sql = "select * from telefonos where id_programa='$this->id_programa' and status='1' order by id_telefono";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_telefono[$i] = $obj->id_telefono;
	$this->telefono[$i] = $obj->telefono;
	$this->dependencia[$i] = $obj->dependencia;
	$this->imagen[$i] = $obj->imagen;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>