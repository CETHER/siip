<?php
  /**
  * Clase que gestiona lo relacionado a la tabla asignaturas
  */
  
  require_once "../core/conexion.php";
  
  class Asignaturas extends Conexion 
  {
    public $id_asignatura;
    public $id_programa;
    public $nombre;
    public $clave;
    public $area;
    public $creditos;
    public $status;
    public $area_txt;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarAsignatura( )
    {
      $sql = "select id_asignatura from asignaturas order by id_asignatura";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_asignatura = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_asignatura = $obj->id_asignatura;
        $this->id_asignatura++;
      }
      
      $sql = "insert into asignaturas values ( '$this->id_asignatura', '$this->id_programa', '$this->nombre', '$this->clave', '$this->area',
      '$this->creditos', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarAsignatura( )
    {
      $sql = "update asignaturas set status='0' where id_asignatura='$this->id_asignatura'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarAsignatura( )
    {
      $sql = "update asignaturas set nombre='$this->nombre', clave='$this->clave', area='$this->area', creditos='$this->creditos'
      where id_asignatura='$this->id_asignatura'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerAsignatura( )
    {  
      $sql = "select * from asignaturas where id_asignatura='$this->id_asignatura' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_programa = $obj->id_programa;
	$this->nombre = $obj->nombre;
	$this->clave = $obj->clave;
	$this->area = $obj->area;
	$this->creditos = $obj->creditos;
	
	switch( $this->area )
	{
	  case 1: $this->area_txt = "B&aacute;sico com&uacute;n obligatoria (BCO)"; break;
	  case 2: $this->area_txt = "B&aacute;sico particular obligatoria (BPO)"; break;
	  case 3: $this->area_txt = "Especializante selectiva (ES)"; break;
	  case 4: $this->area_txt = "Optativa abierta (OA)"; break;
	}	
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaAsignaturasPrograma( )
    {
      $sql = "select * from asignaturas where id_programa='$this->id_programa' and status='1' order by nombre";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_asignatura[$i] = $obj->id_asignatura;
	$this->nombre[$i] = $obj->nombre;
	$this->clave[$i] = $obj->clave;
	$this->area[$i] = $obj->area;
	$this->creditos[$i] = $obj->creditos;
	
	switch( $this->area[$i] )
	{
	  case 1: $this->area_txt[$i] = "B&aacute;sico com&uacute;n obligatoria (BCO)"; break;
	  case 2: $this->area_txt[$i] = "B&aacute;sico particular obligatoria (BPO)"; break;
	  case 3: $this->area_txt[$i] = "Especializante selectiva (ES)"; break;
	  case 4: $this->area_txt[$i] = "Optativa abierta (OA)"; break;
	}
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>