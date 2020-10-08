<?php
  /**
  * Clase que gestiona lo relacionado a la tabla egresados
  */
  
  require_once "../core/conexion.php";
  require_once "../alumnos/modelo-alumnos.php";
  require_once "../titulados/modelo-titulados.php";
  
  class Egresados extends Conexion 
  {
    public $id_egresado;
    public $id_ciclo;
    public $fecha;
    public $municipio1;
    public $municipio2;
    public $municipio3;
    public $municipio4;
    public $id_estado1;
    public $id_estado2;
    public $id_estado3;
    public $id_estado4;
    public $id_pais1;
    public $id_pais2;
    public $id_pais3;
    public $id_pais4;
    public $con_quien_vive;
    public $con_quien_vive_otro;
    public $tiene_hijos;
    public $cantidad_hijos;
    public $edad_hijo_menor;
    public $dependientes;
    public $escolaridad1;
    public $escolaridad2;
    public $escolaridad3;
    public $status;
    public $con_quien_vive_txt;
    public $tiene_hijos_txt;
    public $escolaridad1_txt;
    public $escolaridad2_txt;
    public $escolaridad3_txt;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarEgresado( )
    {
      $sql = "select id_egresado from egresados order by id_egresado";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_egresado = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_egresado = $obj->id_egresado;
        $this->id_egresado++;
      }
      
      $sql = "insert into egresados values ( '$this->id_egresado', '$this->id_ciclo', '$this->fecha', '$this->municipio1', '$this->municipio2', 
      '$this->municipio3', '$this->municipio4', '$this->id_estado1', '$this->id_estado2', '$this->id_estado3', '$this->id_estado4', 
      '$this->id_pais1', '$this->id_pais2', '$this->id_pais3', '$this->id_pais4', '$this->con_quien_vive', '$this->con_quien_vive_otro', 
      '$this->tiene_hijos', '$this->cantidad_hijos', '$this->edad_hijo_menor', '$this->dependientes', '$this->escolaridad1', '$this->escolaridad2', 
      '$this->escolaridad3', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarEgresado( )
    {
      $sql = "update alumnos set id_egresado='0' where id_alumno='$this->id_alumno'";
      $res = $this->mysqli->query( $sql );
      
      $sql = "update egresados set status='0' where id_egresado='$this->id_egresado'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarEgresado( )
    {
      $sql = "update egresados set id_ciclo='$this->id_ciclo', fecha='$this->fecha' where id_egresado='$this->id_egresado'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarEgresado2( )
    {
      $sql = "update egresados set municipio1='$this->municipio1', municipio2='$this->municipio2', municipio3='$this->municipio3', 
      municipio4='$this->municipio4', id_estado1='$this->id_estado1', id_estado2='$this->id_estado2', id_estado3='$this->id_estado3', 
      id_estado4='$this->id_estado4', id_pais1='$this->id_pais1', id_pais2='$this->id_pais2', id_pais3='$this->id_pais3', id_pais4='$this->id_pais4', 
      con_quien_vive='$this->con_quien_vive', con_quien_vive_otro='$this->con_quien_vive_otro', tiene_hijos='$this->tiene_hijos', 
      cantidad_hijos='$this->cantidad_hijos', edad_hijo_menor='$this->edad_hijo_menor', dependientes='$this->dependientes', 
      escolaridad1='$this->escolaridad1', escolaridad2='$this->escolaridad2', escolaridad3='$this->escolaridad3' where id_egresado='$this->id_egresado'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerEgresado( )
    {  
      $sql = "select * from egresados where id_egresado='$this->id_egresado' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_ciclo = $obj->id_ciclo;
	$this->fecha = $obj->fecha;
	$this->municipio1 = $obj->municipio1;
	$this->municipio2 = $obj->municipio2;
	$this->municipio3 = $obj->municipio3;
	$this->municipio4 = $obj->municipio4;
	$this->id_estado1 = $obj->id_estado1;
	$this->id_estado2 = $obj->id_estado2;
	$this->id_estado3 = $obj->id_estado3;
	$this->id_estado4 = $obj->id_estado4;
	$this->id_pais1 = $obj->id_pais1;
	$this->id_pais2 = $obj->id_pais2;
	$this->id_pais3 = $obj->id_pais3;
	$this->id_pais4 = $obj->id_pais4;
	$this->con_quien_vive = $obj->con_quien_vive;
	$this->con_quien_vive_otro = $obj->con_quien_vive_otro;
	$this->tiene_hijos = $obj->tiene_hijos;
	$this->cantidad_hijos = $obj->cantidad_hijos;
	$this->edad_hijo_menor = $obj->edad_hijo_menor;
	$this->dependientes = $obj->dependientes;
	$this->escolaridad1 = $obj->escolaridad1;
	$this->escolaridad2 = $obj->escolaridad2;
	$this->escolaridad3 = $obj->escolaridad3;
	
	switch( $this->con_quien_vive )
	{
	  case 1: $this->con_quien_vive_txt = "Solo"; break;
	  case 2: $this->con_quien_vive_txt = "Con tu pareja"; break;
	  case 3: $this->con_quien_vive_txt = "En casa de asistencia o compartiendo vivienda con otras personas"; break;
	  case 4: $this->con_quien_vive_txt = "Con tus padres"; break;
	  case 5: $this->con_quien_vive_txt = "Otro"; break;
	}
	
	switch( $this->tiene_hijos )
	{
	  case 1: $this->tiene_hijos_txt = "Si"; break;
	  case 2: $this->tiene_hijos_txt = "No"; break;
	}
	
	switch( $this->escolaridad1 )
	{
	  case 1: $this->escolaridad1_txt = "Sin estudios formales"; break;
	  case 2: $this->escolaridad1_txt = "Primaria"; break;
	  case 3: $this->escolaridad1_txt = "Secundaria"; break;
	  case 4: $this->escolaridad1_txt = "T&eacute;cnico Superior Universitario"; break;
	  case 5: $this->escolaridad1_txt = "Bachillerato"; break;
	  case 6: $this->escolaridad1_txt = "Licenciatura"; break;
	  case 7: $this->escolaridad1_txt = "Maestr&iacute;a"; break;
	  case 8: $this->escolaridad1_txt = "Doctorado"; break;
	  case 9: $this->escolaridad1_txt = "Postdoctorado"; break;
	  case 10: $this->escolaridad1_txt = "No aplica"; break;
	}
	
	switch( $this->escolaridad2 )
	{
	  case 1: $this->escolaridad2_txt = "Sin estudios formales"; break;
	  case 2: $this->escolaridad2_txt = "Primaria"; break;
	  case 3: $this->escolaridad2_txt = "Secundaria"; break;
	  case 4: $this->escolaridad2_txt = "T&eacute;cnico Superior Universitario"; break;
	  case 5: $this->escolaridad2_txt = "Bachillerato"; break;
	  case 6: $this->escolaridad2_txt = "Licenciatura"; break;
	  case 7: $this->escolaridad2_txt = "Maestr&iacute;a"; break;
	  case 8: $this->escolaridad2_txt = "Doctorado"; break;
	  case 9: $this->escolaridad2_txt = "Postdoctorado"; break;
	  case 10: $this->escolaridad2_txt = "No aplica"; break;
	}
	
	switch( $this->escolaridad3 )
	{
	  case 1: $this->escolaridad3_txt = "Sin estudios formales"; break;
	  case 2: $this->escolaridad3_txt = "Primaria"; break;
	  case 3: $this->escolaridad3_txt = "Secundaria"; break;
	  case 4: $this->escolaridad3_txt = "T&eacute;cnico Superior Universitario"; break;
	  case 5: $this->escolaridad3_txt = "Bachillerato"; break;
	  case 6: $this->escolaridad3_txt = "Licenciatura"; break;
	  case 7: $this->escolaridad3_txt = "Maestr&iacute;a"; break;
	  case 8: $this->escolaridad3_txt = "Doctorado"; break;
	  case 9: $this->escolaridad3_txt = "Postdoctorado"; break;
	  case 10: $this->escolaridad3_txt = "No aplica"; break;
	}
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaEgresadosCiclo( )
    {
      $sql = "select * from alumnos where id_programa='$this->id_programa' and id_ciclo='$this->id_ciclo' and id_egresado!='0' and status='1' 
      order by apellido_paterno, apellido_materno, nombre";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_alumno[$i] = $obj->id_alumno;
	$this->id_orientacion[$i] = $obj->id_orientacion;
	$this->id_titulado[$i] = $obj->id_titulado;
	$this->codigo[$i] = $obj->codigo;
	$this->apellido_paterno[$i] = $obj->apellido_paterno;
	$this->apellido_materno[$i] = $obj->apellido_materno;
	$this->nombre[$i] = $obj->nombre;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaEgresadosCiclo2( )
    {
      $sql = "select * from alumnos, egresados where alumnos.id_programa='$this->id_programa' and alumnos.id_egresado!='0' and alumnos.status='1' 
      and alumnos.id_egresado=egresados.id_egresado and egresados.id_ciclo='$this->id_ciclo' order by alumnos.apellido_paterno, alumnos.apellido_materno, 
      alumnos.nombre";
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
    
    
    public function listaEgresadosCicloPromocion( )
    {
      $sql = "select * from alumnos where id_programa='$this->id_programa' and id_ciclo='$this->id_ciclo' and id_egresado!='0' and id_titulado='0' 
      and status='1' order by apellido_paterno, apellido_materno, nombre";
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
    
    
    public function promocionarEgresado( )
    {
      $obj = new Alumnos( );
      $obj->id_alumno = $this->id_alumno;
      $obj->obtenerAlumno( );
      
      if( $obj->id_titulado!=0 )
      {
	header( "Location: promocion-egresados2.php?id_alumno=$this->id_alumno&error=1" );
        exit( );
      }
      
      $obj2 = new Titulados( );
      $obj2->id_ciclo = $this->id_ciclo;
      $obj2->fecha = $this->fecha;
      $obj2->documento1 = 0;
      $obj2->documento2 = 0;
      $obj2->documento3 = 0;
      $obj2->documento4 = 0;
      $obj2->documento5 = 0;
      $obj2->documento6 = 0;
      $obj2->documento7 = 0;
      $obj2->documento8 = 0;
      $obj2->archivo1 = null;
      $obj2->archivo2 = null;
      $obj2->archivo3 = null;
      $obj2->archivo4 = null;
      $obj2->archivo5 = null;
      $obj2->archivo6 = null;
      $obj2->archivo7 = null;
      $obj2->archivo8 = null;
      $obj2->oficio_prorroga = null;
      $obj2->fecha_prorroga = null;
      $obj2->status = 1;
      $obj2->agregarTitulado( );
      
      $sql = "update alumnos set id_titulado='$obj2->id_titulado' where id_alumno='$this->id_alumno'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
  }
?>