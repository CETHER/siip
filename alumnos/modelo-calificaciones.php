<?php
  /**
  * Clase que gestiona lo relacionado a la tabla calificaciones
  */
  
  require_once "../core/conexion.php";
  require_once "modelo-clases.php";
  require_once "modelo-alumnos.php";
    
  class Calificaciones extends Conexion 
  {
    public $id_calificacion;
    public $id_clase;
    public $id_alumno;
    public $calificacion_ordinario;
    public $calificacion_extraordinario;
    public $fecha_ordinario;
    public $fecha_extraordinario;
    public $status;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarCalificacion( )
    {
      $sql = "select id_calificacion from calificaciones order by id_calificacion";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_calificacion = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_calificacion = $obj->id_calificacion;
        $this->id_calificacion++;
      }
      
      $sql = "insert into calificaciones values ( '$this->id_calificacion', '$this->id_clase', '$this->id_alumno', '$this->calificacion_ordinario',
      '$this->calificacion_extraordinario', '$this->fecha_ordinario', '$this->fecha_extraordinario', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarCalificacion( )
    {
      $sql = "update calificaciones set status='0' where id_calificacion='$this->id_calificacion'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarCalificacion( )
    {
      $sql = "update calificaciones set calificacion_ordinario='$this->calificacion_ordinario', 
      calificacion_extraordinario='$this->calificacion_extraordinario', fecha_ordinario='$this->fecha_ordinario',
      fecha_extraordinario='$this->fecha_extraordinario' where id_calificacion='$this->id_calificacion'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerCalificacion( )
    {  
      $sql = "select * from calificaciones where id_calificacion='$this->id_calificacion' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_clase = $obj->id_clase;
	$this->id_alumno = $obj->id_alumno;
	$this->calificacion_ordinario = $obj->calificacion_ordinario;
	$this->calificacion_extraordinario = $obj->calificacion_extraordinario;
	$this->fecha_ordinario = $obj->fecha_ordinario;
	$this->fecha_extraordinario = $obj->fecha_extraordinario;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaCalificacionesClase( )
    {
      $sql = "select * from calificaciones where id_clase='$this->id_clase' and status='1' order by id_calificacion";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_calificacion[$i] = $obj->id_calificacion;
	$this->id_alumno[$i] = $obj->id_alumno;
	$this->calificacion_ordinario[$i] = $obj->calificacion_ordinario;
	$this->calificacion_extraordinario[$i] = $obj->calificacion_extraordinario;
	$this->fecha_ordinario[$i] = $obj->fecha_ordinario;
	$this->fecha_extraordinario[$i] = $obj->fecha_extraordinario;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaCalificacionesAlumno( )
    {
      $sql = "select * from calificaciones where id_alumno='$this->id_alumno' and status='1' order by id_calificacion";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_calificacion[$i] = $obj->id_calificacion;
	$this->id_clase[$i] = $obj->id_clase;
	$this->calificacion_ordinario[$i] = $obj->calificacion_ordinario;
	$this->calificacion_extraordinario[$i] = $obj->calificacion_extraordinario;
	$this->fecha_ordinario[$i] = $obj->fecha_ordinario;
	$this->fecha_extraordinario[$i] = $obj->fecha_extraordinario;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function inscribirAlumno( )
    {
      $obj = new Clases( );
      $obj->id_clase = $this->id_clase;
      $obj->obtenerClase( );
      
      $obj2 = new Alumnos( );
      $obj2->id_programa = $obj->id_programa;
      $obj2->codigo = $this->codigo;
      $obj2->buscarCodigo( );
      
      if( $obj2->id_alumno==null )
      {
	header( "Location: inscripcion-alumnos2.php?id_clase=$this->id_clase&error=1" );
        exit( );
      }
      
      $obj3 = new Calificaciones( );
      $obj3->id_clase = $this->id_clase;
      $obj3->id_alumno = $obj2->id_alumno;
      
      if( $obj3->verificarCodigo( )==true )
      {
	header( "Location: inscripcion-alumnos2.php?id_clase=$this->id_clase&error=2" );
        exit( );
      }
      
      if( $obj3->calcularCupo( )>=$obj->cupo )
      {
	header( "Location: inscripcion-alumnos2.php?id_clase=$this->id_clase&error=3" );
        exit( );
      }
      
      $obj3->calificacion_ordinario = null;
      $obj3->calificacion_extraordinario = null;
      $obj3->fecha_ordinario = null;
      $obj3->fecha_extraordinario = null;
      $obj3->status = 1;
      $obj3->agregarCalificacion( );
    }
    
    
    public function verificarCodigo( )
    {
      $sql = "select * from calificaciones where id_clase='$this->id_clase' and id_alumno='$this->id_alumno' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	return true;
      }
      else
      {
	return false;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function calcularCupo( )
    {
      $sql = "select * from calificaciones where id_clase='$this->id_clase' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      return $max;
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>