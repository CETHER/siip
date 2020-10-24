<?php
  /**
  * Clase que gestiona lo relacionado a la tabla alumnos
  */
  
  require_once "../core/conexion.php";
  require_once "../egresados/modelo-egresados.php";
  require_once "modelo-calificaciones.php";
  require_once "modelo-clases.php";
  require_once "modelo-asignaturas.php";
  
  class Alumnos extends Conexion 
  {
    public $id_alumno;
    public $id_programa;
    public $id_orientacion;
    public $id_ciclo;
    public $id_pais;
    public $id_aspirante;
    public $modalidad;
    public $fotografia;
    public $codigo;
    public $contrasena;
    public $apellido_paterno;
    public $apellido_materno;
    public $nombre;
    public $sexo;
    public $fecha_nacimiento;
    public $lugar_nacimiento;
    public $director_tesis;
    public $asesor_tesis1;
    public $asesor_tesis2;
    public $asesor_tesis3;
    public $accesos_fallidos;
    public $status;
    public $total_creditos;
    public $modalidad_txt;
    public $sexo_txt;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarAlumno( )
    {
      $sql = "select id_alumno from alumnos order by id_alumno";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_alumno = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_alumno = $obj->id_alumno;
        $this->id_alumno++;
      }
      
      $sql = "insert into alumnos values ( '$this->id_alumno', '$this->id_programa', '$this->id_orientacion', '$this->id_ciclo', '$this->id_pais',
      '$this->id_aspirante', '$this->id_egresado', '$this->id_titulado', '$this->modalidad', '$this->fotografia', '$this->codigo', 
      '$this->contrasena', '$this->apellido_paterno', '$this->apellido_materno', '$this->nombre', '$this->sexo', '$this->fecha_nacimiento', 
      '$this->lugar_nacimiento', '$this->director_tesis', '$this->asesor_tesis1', '$this->asesor_tesis2', '$this->asesor_tesis3', 
      '$this->accesos_fallidos', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarAlumno( )
    {
      $sql = "update alumnos set status='0' where id_alumno='$this->id_alumno'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarAlumno( )
    {
      if( $this->fotografia!=null )
      {
        $ext = pathinfo( $this->fotografia, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->fotografia, "../uploads/A-".$this->id_aspirante.".".$ext );
	$this->fotografia = "A-".$this->id_aspirante.".".$ext;
	
	$sql = "update alumnos set fotografia='$this->fotografia' where id_alumno='$this->id_alumno'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->contrasena!=null )
      {
	$this->contrasena = md5( $this->contrasena );
	
	$sql = "update alumnos set contrasena='$this->contrasena' where id_alumno='$this->id_alumno'";
        $res = $this->mysqli->query( $sql );
      }
      
      $sql = "update alumnos set id_orientacion='$this->id_orientacion', id_pais='$this->id_pais', modalidad='$this->modalidad', 
      codigo='$this->codigo', apellido_paterno='$this->apellido_paterno', apellido_materno='$this->apellido_materno', nombre='$this->nombre', 
      sexo='$this->sexo', fecha_nacimiento='$this->fecha_nacimiento', lugar_nacimiento='$this->lugar_nacimiento' where id_alumno='$this->id_alumno'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarAlumno2( )
    {
      $sql = "update alumnos set director_tesis='$this->director_tesis', asesor_tesis1='$this->asesor_tesis1', asesor_tesis2='$this->asesor_tesis2', 
      asesor_tesis3='$this->asesor_tesis3' where id_alumno='$this->id_alumno'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerAlumno( )
    {  
      $sql = "select * from alumnos where id_alumno='$this->id_alumno' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_programa = $obj->id_programa;
	$this->id_orientacion = $obj->id_orientacion;
	$this->id_ciclo = $obj->id_ciclo;
	$this->id_pais = $obj->id_pais;
	$this->id_aspirante = $obj->id_aspirante;
	$this->id_egresado = $obj->id_egresado;
	$this->id_titulado = $obj->id_titulado;
	$this->modalidad = $obj->modalidad;
	$this->fotografia = $obj->fotografia;
	$this->codigo = $obj->codigo;
	$this->contrasena = $obj->contrasena;
	$this->apellido_paterno = $obj->apellido_paterno;
	$this->apellido_materno = $obj->apellido_materno;
	$this->nombre = $obj->nombre;
	$this->sexo = $obj->sexo;
	$this->fecha_nacimiento = $obj->fecha_nacimiento;
	$this->lugar_nacimiento = $obj->lugar_nacimiento;
	$this->director_tesis = $obj->director_tesis;
	$this->asesor_tesis1 = $obj->asesor_tesis1;
	$this->asesor_tesis2 = $obj->asesor_tesis2;
	$this->asesor_tesis3 = $obj->asesor_tesis3;
	$this->accesos_fallidos = $obj->accesos_fallidos;
	
	switch( $this->modalidad )
	{
	  case 1: $this->modalidad_txt = "Tiempo completo"; break;
	  case 2: $this->modalidad_txt = "Tiempo parcial"; break;
	}
	
	switch( $this->sexo )
	{
	  case 1: $this->sexo_txt = "Masculino"; break;
	  case 2: $this->sexo_txt = "Femenino"; break;
	}	
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaAlumnosCiclo( )
    {
      $sql = "select * from alumnos where id_programa='$this->id_programa' and id_ciclo='$this->id_ciclo' and status='1' order by apellido_paterno,
      apellido_materno, nombre";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_alumno[$i] = $obj->id_alumno;
	$this->id_orientacion[$i] = $obj->id_orientacion;
	$this->codigo[$i] = $obj->codigo;
	$this->apellido_paterno[$i] = $obj->apellido_paterno;
	$this->apellido_materno[$i] = $obj->apellido_materno;
	$this->nombre[$i] = $obj->nombre;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function verificarAspirante( )
    {
      $sql = "select * from alumnos where id_aspirante='$this->id_aspirante' and status='1'";
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
    
    
    public function verificarCodigo( )
    {
      $sql = "select * from alumnos where codigo='$this->codigo' and status='1'";
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
    
    
    public function verificarCodigo2( )
    {
      $sql = "select * from alumnos where codigo='$this->codigo' and id_alumno!='$this->id_alumno' and status='1'";
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
    
    
    public function buscarCodigo( )
    {
      $sql = "select * from alumnos where id_programa='$this->id_programa' and codigo='$this->codigo' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_alumno = $obj->id_alumno;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaAlumnosCicloPromocion( )
    {
      $sql = "select * from alumnos where id_programa='$this->id_programa' and id_ciclo='$this->id_ciclo' and id_egresado='0' and status='1' 
      order by apellido_paterno, apellido_materno, nombre";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_alumno[$i] = $obj->id_alumno;
	$this->id_orientacion[$i] = $obj->id_orientacion;
	$this->codigo[$i] = $obj->codigo;
	$this->apellido_paterno[$i] = $obj->apellido_paterno;
	$this->apellido_materno[$i] = $obj->apellido_materno;
	$this->nombre[$i] = $obj->nombre;
	$this->total_creditos[$i] = 0;
	
	$obj2 = new Calificaciones( );
        $obj2->id_alumno = $this->id_alumno[$i];
        $obj2->listaCalificacionesAlumno( );
	
	$max2 = count( $obj2->id_calificacion );
        
        for( $j=0; $j<$max2; $j++ )
        {
	  if( $obj2->calificacion_ordinario[$j]>=60 || $obj2->calificacion_extraordinario[$j]>=60 )
	  {
	    $obj3 = new Clases( );
            $obj3->id_clase = $obj2->id_clase[$j];
            $obj3->obtenerClase( );
	    
	    $obj4 = new Asignaturas( );
            $obj4->id_asignatura = $obj3->id_asignatura;
            $obj4->obtenerAsignatura( );
	    
	    $this->total_creditos[$i] = $this->total_creditos[$i] + $obj4->creditos;
	  }
	}
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function promocionarAlumno( )
    {
      $obj = new Alumnos( );
      $obj->id_alumno = $this->id_alumno;
      $obj->obtenerAlumno( );
      
      if( $obj->id_egresado!=0 )
      {
	header( "Location: promocion-alumnos2.php?id_alumno=$this->id_alumno&error=1" );
        exit( );
      }
      
      $obj2 = new Egresados( );
      $obj2->id_ciclo = $this->id_ciclo;
      $obj2->fecha = $this->fecha;
      $obj2->municipio1 = "";
      $obj2->municipio2 = "";
      $obj2->municipio3 = "";
      $obj2->municipio4 = "";
      $obj2->id_estado1 = "";
      $obj2->id_estado2 = "";
      $obj2->id_estado3 = "";
      $obj2->id_estado4 = "";
      $obj2->id_pais1 = "";
      $obj2->id_pais2 = "";
      $obj2->id_pais3 = "";
      $obj2->id_pais4 = "";
      $obj2->con_quien_vive = "";
      $obj2->con_quien_vive_otro = "";
      $obj2->tiene_hijos = "";
      $obj2->cantidad_hijos = "";
      $obj2->edad_hijo_menor = "";
      $obj2->dependientes = "";
      $obj2->escolaridad1 = "";
      $obj2->escolaridad2 = "";
      $obj2->escolaridad3 = "";
      $obj2->status = 1;
      $obj2->agregarEgresado( );
      
      $sql = "update alumnos set id_egresado='$obj2->id_egresado' where id_alumno='$this->id_alumno'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
  }
?>