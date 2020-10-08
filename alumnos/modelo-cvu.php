<?php
  /**
  * Clase que gestiona lo relacionado a la tabla cvu
  */
  
  require_once "../core/conexion.php";
  
  class CVU extends Conexion 
  {
    public $id_cvu;
    public $id_docente;
    public $descripcion;
    public $fecha;
    public $archivo;
    public $status;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarCVU( )
    {
      $sql = "select id_cvu from cvu order by id_cvu";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_cvu = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_cvu = $obj->id_cvu;
        $this->id_cvu++;
      }
      
      if( $this->archivo!=null )
      {
        $ext = pathinfo( $this->archivo, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo, "../uploads/D-".$this->id_docente."-".$this->id_cvu.".".$ext );
	$this->archivo = "D-".$this->id_docente."-".$this->id_cvu.".".$ext;
      }
      
      $sql = "insert into cvu values ( '$this->id_cvu', '$this->id_docente', '$this->descripcion', '$this->fecha', '$this->archivo', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarCVU( )
    {
      $sql = "update cvu set status='0' where id_cvu='$this->id_cvu'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarCVU( )
    {
      if( $this->archivo!=null )
      {
        $ext = pathinfo( $this->archivo, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo, "../uploads/D-".$this->id_docente."-".$this->id_cvu.".".$ext );
	$this->archivo = "D-".$this->id_docente."-".$this->id_cvu.".".$ext;
	
	$sql = "update cvu set archivo='$this->archivo' where id_cvu='$this->id_cvu'";
        $res = $this->mysqli->query( $sql );
      }
      
      $sql = "update cvu set descripcion='$this->descripcion', fecha='$this->fecha' where id_cvu='$this->id_cvu'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerCVU( )
    {  
      $sql = "select * from cvu where id_cvu='$this->id_cvu' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_docente = $obj->id_docente;
	$this->descripcion = $obj->descripcion;
	$this->fecha = $obj->fecha;
	$this->archivo = $obj->archivo;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaCVUDocente( )
    {
      $sql = "select * from cvu where id_docente='$this->id_docente' and status='1' order by fecha desc";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_cvu[$i] = $obj->id_cvu;
	$this->descripcion[$i] = $obj->descripcion;
	$this->fecha[$i] = $obj->fecha;
	$this->archivo[$i] = $obj->archivo;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>