<?php
  /**
  * Clase que gestiona lo relacionado a la tabla aspirantes
  */
  
  require_once "../core/conexion.php";
  require_once "../alumnos/modelo-alumnos.php";
  
  class Aspirantes extends Conexion 
  {
    public $id_aspirante;
    public $id_programa;
    public $id_orientacion;
    public $id_ciclo;
    public $id_pais;
    public $id_estado;
    public $id_estado_trabajo;
    public $modalidad;
    public $fotografia;
    public $apellido_paterno;
    public $apellido_materno;
    public $nombre;
    public $fecha_nacimiento;
    public $sexo;
    public $curp;
    public $rfc;
    public $correo;
    public $calle;
    public $numero_exterior;
    public $numero_interior;
    public $colonia;
    public $codigo_postal;
    public $municipio;
    public $telefono;
    public $celular;
    public $lugar_nacimiento;
    public $grado_estudios;
    public $titulo;
    public $universidad;
    public $promedio;
    public $anio_egreso;
    public $id_idioma1;
    public $id_idioma2;
    public $id_idioma3;
    public $nivel_idioma1;
    public $nivel_idioma2;
    public $nivel_idioma3;
    public $trabajo;
    public $ocupacion;
    public $empresa;
    public $domicilio_trabajo;
    public $municipio_trabajo;
    public $telefono_trabajo;
    public $documento1;
    public $documento2;
    public $documento3;
    public $documento4;
    public $documento5;
    public $documento6;
    public $documento7;
    public $documento8;
    public $documento9;
    public $documento10;
    public $documento11;
    public $documento12;
    public $documento13;
    public $archivo1;    
    public $archivo2;
    public $archivo3;
    public $archivo4;
    public $archivo5;
    public $archivo6;
    public $archivo7;
    public $archivo8;
    public $archivo9;
    public $archivo10;
    public $archivo11;
    public $archivo12;
    public $archivo13;
    public $oficio_prorroga;
    public $fecha_prorroga;
    public $evaluacion;
    public $status;
    public $modalidad_txt;
    public $sexo_txt;
    public $grado_estudios_txt;
    public $nivel_idioma1_txt;
    public $nivel_idioma2_txt;
    public $nivel_idioma3_txt;
    public $trabajo_txt;
    public $evaluacion_txt;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarAspirante( )
    {
      $sql = "select id_aspirante from aspirantes order by id_aspirante";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_aspirante = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_aspirante = $obj->id_aspirante;
        $this->id_aspirante++;
      }
      
      if( $this->fotografia!=null )
      {
        $ext = pathinfo( $this->fotografia, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->fotografia, "../uploads/A-".$this->id_aspirante.".".$ext );
	$this->fotografia = "A-".$this->id_aspirante.".".$ext;
      }
      
      $sql = "insert into aspirantes values ( '$this->id_aspirante', '$this->id_programa', '$this->id_orientacion', '$this->id_ciclo', '$this->id_pais',
      '$this->id_estado', '$this->id_estado_trabajo', '$this->modalidad', '$this->fotografia', '$this->apellido_paterno', '$this->apellido_materno',  
      '$this->nombre', '$this->fecha_nacimiento', '$this->sexo', '$this->curp', '$this->rfc', '$this->correo', '$this->calle', '$this->numero_exterior', 
      '$this->numero_interior', '$this->colonia', '$this->codigo_postal', '$this->municipio', '$this->telefono', '$this->celular', 
      '$this->lugar_nacimiento', '$this->grado_estudios', '$this->titulo', '$this->universidad', '$this->promedio', '$this->anio_egreso', 
      '$this->id_idioma1', '$this->id_idioma2', '$this->id_idioma3', '$this->nivel_idioma1', '$this->nivel_idioma2', '$this->nivel_idioma3', 
      '$this->trabajo', '$this->ocupacion', '$this->empresa', '$this->domicilio_trabajo', '$this->municipio_trabajo', '$this->telefono_trabajo', 
      '$this->documento1', '$this->documento2', '$this->documento3', '$this->documento4', '$this->documento5', '$this->documento6', '$this->documento7',
      '$this->documento8', '$this->documento9', '$this->documento10', '$this->documento11','$this->documento12', '$this->documento13', '$this->archivo1',
      '$this->archivo2', '$this->archivo3', '$this->archivo4', '$this->archivo5', '$this->archivo6', '$this->archivo7', '$this->archivo8', 
      '$this->archivo9', '$this->archivo10', '$this->archivo11', '$this->archivo12', '$this->archivo13', '$this->oficio_prorroga', 
      '$this->fecha_prorroga', '$this->evaluacion', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarAspirante( )
    {
      $sql = "update aspirantes set status='0' where id_aspirante='$this->id_aspirante'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarAspirante( )
    {
      if( $this->fotografia!=null )
      {
        $ext = pathinfo( $this->fotografia, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->fotografia, "../uploads/A-".$this->id_aspirante.".".$ext );
	$this->fotografia = "A-".$this->id_aspirante.".".$ext;
	
	$sql = "update aspirantes set fotografia='$this->fotografia' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      $sql = "update aspirantes set id_orientacion='$this->id_orientacion', id_ciclo='$this->id_ciclo', id_pais='$this->id_pais',
      id_estado='$this->id_estado', id_estado_trabajo='$this->id_estado_trabajo', modalidad='$this->modalidad', 
      apellido_paterno='$this->apellido_paterno', apellido_materno='$this->apellido_materno', nombre='$this->nombre', 
      fecha_nacimiento='$this->fecha_nacimiento', sexo='$this->sexo', curp='$this->curp', rfc='$this->rfc', correo='$this->correo', calle='$this->calle',
      numero_exterior='$this->numero_exterior', numero_interior='$this->numero_interior', colonia='$this->colonia', codigo_postal='$this->codigo_postal',
      municipio='$this->municipio', telefono='$this->telefono', celular='$this->celular', lugar_nacimiento='$this->lugar_nacimiento', 
      grado_estudios='$this->grado_estudios', titulo='$this->titulo', universidad='$this->universidad', promedio='$this->promedio', 
      anio_egreso='$this->anio_egreso', id_idioma1='$this->id_idioma1', id_idioma2='$this->id_idioma2', id_idioma3='$this->id_idioma3', 
      nivel_idioma1='$this->nivel_idioma1', nivel_idioma2='$this->nivel_idioma2', nivel_idioma3='$this->nivel_idioma3', trabajo='$this->trabajo',
      ocupacion='$this->ocupacion', empresa='$this->empresa', domicilio_trabajo='$this->domicilio_trabajo', municipio_trabajo='$this->municipio_trabajo',
      telefono_trabajo='$this->telefono_trabajo' where id_aspirante='$this->id_aspirante'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerAspirante( )
    {  
      $sql = "select * from aspirantes where id_aspirante='$this->id_aspirante' and status='1'";
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
	$this->id_estado = $obj->id_estado;
	$this->id_estado_trabajo = $obj->id_estado_trabajo;
	$this->modalidad = $obj->modalidad;
	$this->fotografia = $obj->fotografia;
	$this->apellido_paterno = $obj->apellido_paterno;
	$this->apellido_materno = $obj->apellido_materno;
	$this->nombre = $obj->nombre;
	$this->fecha_nacimiento = $obj->fecha_nacimiento;
	$this->sexo = $obj->sexo;
	$this->curp = $obj->curp;
	$this->rfc = $obj->rfc;
	$this->correo = $obj->correo;
	$this->calle = $obj->calle;
	$this->numero_exterior = $obj->numero_exterior;
	$this->numero_interior = $obj->numero_interior;
	$this->colonia = $obj->colonia;
	$this->codigo_postal = $obj->codigo_postal;
	$this->municipio = $obj->municipio;
	$this->telefono = $obj->telefono;
	$this->celular = $obj->celular;
	$this->lugar_nacimiento = $obj->lugar_nacimiento;
	$this->grado_estudios = $obj->grado_estudios;
	$this->titulo = $obj->titulo;
	$this->universidad = $obj->universidad;
	$this->promedio = $obj->promedio;
	$this->anio_egreso = $obj->anio_egreso;
	$this->id_idioma1 = $obj->id_idioma1;
	$this->id_idioma2 = $obj->id_idioma2;
	$this->id_idioma3 = $obj->id_idioma3;
	$this->nivel_idioma1 = $obj->nivel_idioma1;
	$this->nivel_idioma2 = $obj->nivel_idioma2;
	$this->nivel_idioma3 = $obj->nivel_idioma3;
	$this->trabajo = $obj->trabajo;
	$this->ocupacion = $obj->ocupacion;
	$this->empresa = $obj->empresa;
	$this->domicilio_trabajo = $obj->domicilio_trabajo;
	$this->municipio_trabajo = $obj->municipio_trabajo;
	$this->telefono_trabajo = $obj->telefono_trabajo;
	$this->documento1 = $obj->documento1;
	$this->documento2 = $obj->documento2;
	$this->documento3 = $obj->documento3;
	$this->documento4 = $obj->documento4;
	$this->documento5 = $obj->documento5;
	$this->documento6 = $obj->documento6;
	$this->documento7 = $obj->documento7;
	$this->documento8 = $obj->documento8;
	$this->documento9 = $obj->documento9;
	$this->documento10 = $obj->documento10;
	$this->documento11 = $obj->documento11;
	$this->documento12 = $obj->documento12;
	$this->documento13 = $obj->documento13;
	$this->archivo1 = $obj->archivo1;
	$this->archivo2 = $obj->archivo2;
	$this->archivo3 = $obj->archivo3;
	$this->archivo4 = $obj->archivo4;
	$this->archivo5 = $obj->archivo5;
	$this->archivo6 = $obj->archivo6;
	$this->archivo7 = $obj->archivo7;
	$this->archivo8 = $obj->archivo8;
	$this->archivo9 = $obj->archivo9;
	$this->archivo10 = $obj->archivo10;
	$this->archivo11 = $obj->archivo11;
	$this->archivo12 = $obj->archivo12;
	$this->archivo13 = $obj->archivo13;
	$this->oficio_prorroga = $obj->oficio_prorroga;
	$this->fecha_prorroga = $obj->fecha_prorroga;
	$this->evaluacion = $obj->evaluacion;
	$this->promocion = $obj->promocion;
	
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
	
	switch( $this->grado_estudios )
	{
	  case 1: $this->grado_estudios_txt = "Licenciatura"; break;
	  case 2: $this->grado_estudios_txt = "Maestr&iacute;a"; break;
	  case 3: $this->grado_estudios_txt = "Doctorado"; break;
	}
	
	switch( $this->nivel_idioma1 )
	{
	  case 1: $this->nivel_idioma1_txt = "B&aacute;sico"; break;
	  case 2: $this->nivel_idioma1_txt = "Intermedio"; break;
	  case 3: $this->nivel_idioma1_txt = "Avanzado"; break;
	}
	
	switch( $this->nivel_idioma2 )
	{
	  case 1: $this->nivel_idioma2_txt = "B&aacute;sico"; break;
	  case 2: $this->nivel_idioma2_txt = "Intermedio"; break;
	  case 3: $this->nivel_idioma2_txt = "Avanzado"; break;
	}
	
	switch( $this->nivel_idioma3 )
	{
	  case 1: $this->nivel_idioma3_txt = "B&aacute;sico"; break;
	  case 2: $this->nivel_idioma3_txt = "Intermedio"; break;
	  case 3: $this->nivel_idioma3_txt = "Avanzado"; break;
	}
	
	switch( $this->trabajo )
	{
	  case 1: $this->trabajo_txt = "Si"; break;
	  case 2: $this->trabajo_txt = "No"; break;
	}
		
	switch( $this->evaluacion )
	{
	  case 1: $this->evaluacion_txt = "Aceptado"; break;
	  case 2: $this->evaluacion_txt = "Aceptado con dispensa de promedio"; break;
	  case 3: $this->evaluacion_txt = "Aceptado con adeudo de documentos"; break;
	  case 4: $this->evaluacion_txt = "No admitido"; break;
	}
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaAspirantesCiclo( )
    {
      $sql = "select * from aspirantes where id_programa='$this->id_programa' and id_ciclo='$this->id_ciclo' and status='1' order by apellido_paterno,
      apellido_materno, nombre";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_aspirante[$i] = $obj->id_aspirante;
	$this->id_orientacion[$i] = $obj->id_orientacion;
	$this->id_pais[$i] = $obj->id_pais;
	$this->modalidad[$i] = $obj->modalidad;
	$this->apellido_paterno[$i] = $obj->apellido_paterno;
	$this->apellido_materno[$i] = $obj->apellido_materno;
	$this->nombre[$i] = $obj->nombre;
	$this->trabajo[$i] = $obj->trabajo;
	$this->evaluacion[$i] = $obj->evaluacion;
	$this->promocion[$i] = $obj->promocion;
	
	switch( $this->evaluacion[$i] )
	{
	  case 1: $this->evaluacion_txt[$i] = "Aceptado"; break;
	  case 2: $this->evaluacion_txt[$i] = "Aceptado con dispensa de promedio"; break;
	  case 3: $this->evaluacion_txt[$i] = "Aceptado con adeudo de documentos"; break;
	  case 4: $this->evaluacion_txt[$i] = "No admitido"; break;
	}
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function evaluarAspirante( )
    {
      if( $this->oficio_prorroga!=null )
      {
        $ext = pathinfo( $this->oficio_prorroga, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->oficio_prorroga, "../uploads/A-".$this->id_aspirante."-OP.".$ext );
	$this->oficio_prorroga = "A-".$this->id_aspirante."-OP.".$ext;
	
	$sql = "update aspirantes set oficio_prorroga='$this->oficio_prorroga' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo1!=null )
      {
        $ext = pathinfo( $this->archivo1, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo1, "../uploads/A-".$this->id_aspirante."-1.".$ext );
	$this->archivo1 = "A-".$this->id_aspirante."-1.".$ext;
	
	$sql = "update aspirantes set archivo1='$this->archivo1' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo2!=null )
      {
        $ext = pathinfo( $this->archivo2, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo2, "../uploads/A-".$this->id_aspirante."-2.".$ext );
	$this->archivo2 = "A-".$this->id_aspirante."-2.".$ext;
	
	$sql = "update aspirantes set archivo2='$this->archivo2' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo3!=null )
      {
        $ext = pathinfo( $this->archivo3, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo3, "../uploads/A-".$this->id_aspirante."-3.".$ext );
	$this->archivo3 = "A-".$this->id_aspirante."-3.".$ext;
	
	$sql = "update aspirantes set archivo3='$this->archivo3' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo4!=null )
      {
        $ext = pathinfo( $this->archivo4, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo4, "../uploads/A-".$this->id_aspirante."-4.".$ext );
	$this->archivo4 = "A-".$this->id_aspirante."-4.".$ext;
	
	$sql = "update aspirantes set archivo4='$this->archivo4' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo5!=null )
      {
        $ext = pathinfo( $this->archivo5, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo5, "../uploads/A-".$this->id_aspirante."-5.".$ext );
	$this->archivo5 = "A-".$this->id_aspirante."-5.".$ext;
	
	$sql = "update aspirantes set archivo5='$this->archivo5' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo6!=null )
      {
        $ext = pathinfo( $this->archivo6, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo6, "../uploads/A-".$this->id_aspirante."-6.".$ext );
	$this->archivo6 = "A-".$this->id_aspirante."-6.".$ext;
	
	$sql = "update aspirantes set archivo6='$this->archivo6' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo7!=null )
      {
        $ext = pathinfo( $this->archivo7, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo7, "../uploads/A-".$this->id_aspirante."-7.".$ext );
	$this->archivo7 = "A-".$this->id_aspirante."-7.".$ext;
	
	$sql = "update aspirantes set archivo7='$this->archivo7' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo8!=null )
      {
        $ext = pathinfo( $this->archivo8, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo8, "../uploads/A-".$this->id_aspirante."-8.".$ext );
	$this->archivo8 = "A-".$this->id_aspirante."-8.".$ext;
	
	$sql = "update aspirantes set archivo8='$this->archivo8' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo9!=null )
      {
        $ext = pathinfo( $this->archivo9, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo9, "../uploads/A-".$this->id_aspirante."-9.".$ext );
	$this->archivo9 = "A-".$this->id_aspirante."-9.".$ext;
	
	$sql = "update aspirantes set archivo9='$this->archivo9' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo10!=null )
      {
        $ext = pathinfo( $this->archivo10, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo10, "../uploads/A-".$this->id_aspirante."-10.".$ext );
	$this->archivo10 = "A-".$this->id_aspirante."-10.".$ext;
	
	$sql = "update aspirantes set archivo10='$this->archivo10' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo11!=null )
      {
        $ext = pathinfo( $this->archivo11, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo11, "../uploads/A-".$this->id_aspirante."-11.".$ext );
	$this->archivo11 = "A-".$this->id_aspirante."-11.".$ext;
	
	$sql = "update aspirantes set archivo11='$this->archivo11' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo12!=null )
      {
        $ext = pathinfo( $this->archivo12, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo12, "../uploads/A-".$this->id_aspirante."-12.".$ext );
	$this->archivo12 = "A-".$this->id_aspirante."-12.".$ext;
	
	$sql = "update aspirantes set archivo12='$this->archivo12' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo13!=null )
      {
        $ext = pathinfo( $this->archivo13, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo13, "../uploads/A-".$this->id_aspirante."-13.".$ext );
	$this->archivo13 = "A-".$this->id_aspirante."-13.".$ext;
	
	$sql = "update aspirantes set archivo13='$this->archivo13' where id_aspirante='$this->id_aspirante'";
        $res = $this->mysqli->query( $sql );
      }
      
      $sql = "update aspirantes set documento1='$this->documento1', documento2='$this->documento2', documento3='$this->documento3',
      documento4='$this->documento4', documento5='$this->documento5', documento6='$this->documento6', documento7='$this->documento7',
      documento8='$this->documento8', documento9='$this->documento9', documento10='$this->documento10', documento11='$this->documento11',
      documento12='$this->documento12', documento13='$this->documento13', fecha_prorroga='$this->fecha_prorroga', evaluacion='$this->evaluacion' 
      where id_aspirante='$this->id_aspirante'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function promocionarAspirante( )
    {
      $obj = new Alumnos( );
      $obj->id_aspirante = $this->id_aspirante;
      $obj->codigo = $this->codigo;
      
      if( $obj->verificarAspirante( )==true )
      {
	header( "Location: promocion-aspirantes2.php?id_aspirante=$this->id_aspirante&error=1" );
        exit( );
      }
      
      if( $obj->verificarCodigo( )==true )
      {
	header( "Location: promocion-aspirantes2.php?id_aspirante=$this->id_aspirante&error=2" );
        exit( );
      }
      
      $obj2 = new Aspirantes( );
      $obj2->id_aspirante = $this->id_aspirante;
      $obj2->obtenerAspirante( );
      
      $obj = new Alumnos( );
      $obj->id_programa = $obj2->id_programa;
      $obj->id_orientacion = $obj2->id_orientacion;
      $obj->id_ciclo = $obj2->id_ciclo;
      $obj->id_pais = $obj2->id_pais;
      $obj->id_aspirante = $this->id_aspirante;
      $obj->id_egresado = 0;
      $obj->id_titulado = 0;
      $obj->modalidad = $obj2->modalidad;
      $obj->fotografia = $obj2->fotografia;
      $obj->codigo = $this->codigo;
      $obj->contrasena = md5( $this->contrasena );
      $obj->apellido_paterno = $obj2->apellido_paterno;
      $obj->apellido_materno = $obj2->apellido_materno;
      $obj->nombre = $obj2->nombre;
      $obj->sexo = $obj2->sexo;
      $obj->fecha_nacimiento = $obj2->fecha_nacimiento;
      $obj->lugar_nacimiento = $obj2->lugar_nacimiento;
      $obj->director_tesis = "";
      $obj->asesor_tesis1 = "";
      $obj->asesor_tesis2 = "";
      $obj->asesor_tesis3 = "";
      $obj->accesos_fallidos = 0;
      $obj->status = 1;
      $obj->agregarAlumno( );
    }
  }
?>