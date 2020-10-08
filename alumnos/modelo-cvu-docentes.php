<?php
  /**
  * Clase que gestiona lo relacionado a la tabla cvu_docentes
  */
  
  require_once "../core/conexion.php";
  
  class CVU_Docentes extends Conexion 
  {
    public $id_cvu_docente;
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
      $sql = "select id_cvu_docente from cvu_docentes order by id_cvu_docente";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_cvu_docente = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_cvu_docente = $obj->id_cvu_docente;
        $this->id_cvu_docente++;
      }
      
      if( $this->archivo!=null )
      {
        $ext = pathinfo( $this->archivo, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo, "../uploads/D-".$this->id_docente."-".$this->id_cvu_docente.".".$ext );
	$this->archivo = "D-".$this->id_docente."-".$this->id_cvu_docente.".".$ext;
      }
      
      $sql = "insert into cvu_docentes values ( '$this->id_cvu_docente', '$this->id_docente', '$this->descripcion', '$this->fecha', '$this->archivo', 
      '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarCVU( )
    {
      $sql = "update cvu_docentes set status='0' where id_cvu_docente='$this->id_cvu_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarCVU( )
    {
      if( $this->archivo!=null )
      {
        $ext = pathinfo( $this->archivo, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo, "../uploads/D-".$this->id_docente."-".$this->id_cvu_docente.".".$ext );
	$this->archivo = "D-".$this->id_docente."-".$this->id_cvu_docente.".".$ext;
	
	$sql = "update cvu_docentes set archivo='$this->archivo' where id_cvu_docente='$this->id_cvu_docente'";
        $res = $this->mysqli->query( $sql );
      }
      
      $sql = "update cvu_docentes set descripcion='$this->descripcion', fecha='$this->fecha' where id_cvu_docente='$this->id_cvu_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerCVU( )
    {  
      $sql = "select * from cvu_docentes where id_cvu_docente='$this->id_cvu_docente' and status='1'";
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
      $sql = "select * from cvu_docentes where id_docente='$this->id_docente' and status='1' order by fecha desc";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_cvu_docente[$i] = $obj->id_cvu_docente;
	$this->descripcion[$i] = $obj->descripcion;
	$this->fecha[$i] = $obj->fecha;
	$this->archivo[$i] = $obj->archivo;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>