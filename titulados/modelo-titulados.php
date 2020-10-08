<?php
  /**
  * Clase que gestiona lo relacionado a la tabla titulados
  */
  
  require_once "../core/conexion.php";
  
  class Titulados extends Conexion 
  {
    public $id_titulado;
    public $id_ciclo;
    public $fecha;
    public $status;
    public $fecha_egresado;
    public $fecha_titulado;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarTitulado( )
    {
      $sql = "select id_titulado from titulados order by id_titulado";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_titulado = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_titulado = $obj->id_titulado;
        $this->id_titulado++;
      }
      
      $sql = "insert into titulados values ( '$this->id_titulado', '$this->id_ciclo', '$this->fecha', '$this->documento1', '$this->documento2', 
      '$this->documento3', '$this->documento4', '$this->documento5', '$this->documento6', '$this->documento7', '$this->documento8', '$this->archivo1', 
      '$this->archivo2', '$this->archivo3', '$this->archivo4', '$this->archivo5', '$this->archivo6', '$this->archivo7', '$this->archivo8', 
      '$this->oficio_prorroga', '$this->fecha_prorroga', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarTitulado( )
    {
      $sql = "update alumnos set id_titulado='0' where id_alumno='$this->id_alumno'";
      $res = $this->mysqli->query( $sql );
      
      $sql = "update titulados set status='0' where id_titulado='$this->id_titulado'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarTitulado( )
    {
      if( $this->oficio_prorroga!=null )
      {
        $ext = pathinfo( $this->oficio_prorroga, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->oficio_prorroga, "../uploads/T-".$this->id_titulado."-OP.".$ext );
	$this->oficio_prorroga = "T-".$this->id_titulado."-OP.".$ext;
	
	$sql = "update titulados set oficio_prorroga='$this->oficio_prorroga' where id_titulado='$this->id_titulado'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo1!=null )
      {
        $ext = pathinfo( $this->archivo1, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo1, "../uploads/T-".$this->id_titulado."-1.".$ext );
	$this->archivo1 = "T-".$this->id_titulado."-1.".$ext;
	
	$sql = "update titulados set archivo1='$this->archivo1' where id_titulado='$this->id_titulado'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo2!=null )
      {
        $ext = pathinfo( $this->archivo2, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo2, "../uploads/T-".$this->id_titulado."-2.".$ext );
	$this->archivo2 = "T-".$this->id_titulado."-2.".$ext;
	
	$sql = "update titulados set archivo2='$this->archivo2' where id_titulado='$this->id_titulado'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo3!=null )
      {
        $ext = pathinfo( $this->archivo3, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo3, "../uploads/T-".$this->id_titulado."-3.".$ext );
	$this->archivo3 = "T-".$this->id_titulado."-3.".$ext;
	
	$sql = "update titulados set archivo3='$this->archivo3' where id_titulado='$this->id_titulado'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo4!=null )
      {
        $ext = pathinfo( $this->archivo4, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo4, "../uploads/T-".$this->id_titulado."-4.".$ext );
	$this->archivo4 = "T-".$this->id_titulado."-4.".$ext;
	
	$sql = "update titulados set archivo4='$this->archivo4' where id_titulado='$this->id_titulado'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo5!=null )
      {
        $ext = pathinfo( $this->archivo5, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo5, "../uploads/T-".$this->id_titulado."-5.".$ext );
	$this->archivo5 = "T-".$this->id_titulado."-5.".$ext;
	
	$sql = "update titulados set archivo5='$this->archivo5' where id_titulado='$this->id_titulado'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo6!=null )
      {
        $ext = pathinfo( $this->archivo6, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo6, "../uploads/T-".$this->id_titulado."-6.".$ext );
	$this->archivo6 = "T-".$this->id_titulado."-6.".$ext;
	
	$sql = "update titulados set archivo6='$this->archivo6' where id_titulado='$this->id_titulado'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo7!=null )
      {
        $ext = pathinfo( $this->archivo7, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo7, "../uploads/T-".$this->id_titulado."-7.".$ext );
	$this->archivo7 = "T-".$this->id_titulado."-7.".$ext;
	
	$sql = "update titulados set archivo7='$this->archivo7' where id_titulado='$this->id_titulado'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->archivo8!=null )
      {
        $ext = pathinfo( $this->archivo8, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->archivo8, "../uploads/T-".$this->id_titulado."-8.".$ext );
	$this->archivo8 = "T-".$this->id_titulado."-8.".$ext;
	
	$sql = "update titulados set archivo8='$this->archivo8' where id_titulado='$this->id_titulado'";
        $res = $this->mysqli->query( $sql );
      }
      
      $sql = "update titulados set id_ciclo='$this->id_ciclo', fecha='$this->fecha', documento1='$this->documento1', documento2='$this->documento2', 
      documento3='$this->documento3', documento4='$this->documento4', documento5='$this->documento5', documento6='$this->documento6', 
      documento7='$this->documento7', documento8='$this->documento8', fecha_prorroga='$this->fecha_prorroga' where id_titulado='$this->id_titulado'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
        
    
    public function obtenerTitulado( )
    {  
      $sql = "select * from titulados where id_titulado='$this->id_titulado' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_ciclo = $obj->id_ciclo;
	$this->fecha = $obj->fecha;
	$this->documento1 = $obj->documento1;
	$this->documento2 = $obj->documento2;
	$this->documento3 = $obj->documento3;
	$this->documento4 = $obj->documento4;
	$this->documento5 = $obj->documento5;
	$this->documento6 = $obj->documento6;
	$this->documento7 = $obj->documento7;
	$this->documento8 = $obj->documento8;
	$this->archivo1 = $obj->archivo1;
	$this->archivo2 = $obj->archivo2;
	$this->archivo3 = $obj->archivo3;
	$this->archivo4 = $obj->archivo4;
	$this->archivo5 = $obj->archivo5;
	$this->archivo6 = $obj->archivo6;
	$this->archivo7 = $obj->archivo7;
	$this->archivo8 = $obj->archivo8;
	$this->oficio_prorroga = $obj->oficio_prorroga;
	$this->fecha_prorroga = $obj->fecha_prorroga;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaTituladosCiclo( )
    {
      $sql = "select * from alumnos where id_programa='$this->id_programa' and id_ciclo='$this->id_ciclo' and id_titulado!='0' and status='1' 
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
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaTituladosCiclo2( )
    {
      $sql = "select * from alumnos, titulados where alumnos.id_programa='$this->id_programa' and alumnos.id_titulado!='0' and alumnos.status='1' 
      and alumnos.id_titulado=titulados.id_titulado and titulados.id_ciclo='$this->id_ciclo' order by alumnos.apellido_paterno, alumnos.apellido_materno, 
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
    
    
    public function listaTituladosCiclo3( )
    {
      $sql = "select * from alumnos, titulados where alumnos.id_programa='$this->id_programa' and alumnos.id_ciclo='$this->id_ciclo' 
      and alumnos.id_titulado!='0' and alumnos.status='1' and alumnos.id_titulado=titulados.id_titulado order by alumnos.apellido_paterno, 
      alumnos.apellido_materno, alumnos.nombre";
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
	$this->oficio_prorroga[$i] = $obj->oficio_prorroga;
	$this->fecha_prorroga[$i] = $obj->fecha_prorroga;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaTituladosCiclo4( )
    {
      $sql = "select * from alumnos, egresados, titulados where alumnos.id_programa='$this->id_programa' and alumnos.id_ciclo='$this->id_ciclo' 
      and alumnos.id_egresado!='0' and alumnos.id_titulado!='0' and alumnos.status='1' and alumnos.id_egresado=egresados.id_egresado 
      and alumnos.id_titulado=titulados.id_titulado order by alumnos.apellido_paterno, alumnos.apellido_materno, alumnos.nombre";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_row( );
	
	$this->id_alumno[$i] = $obj[0];
	$this->id_orientacion[$i] = $obj[2];
	$this->codigo[$i] = $obj[10];
	$this->apellido_paterno[$i] = $obj[12];
	$this->apellido_materno[$i] = $obj[13];
	$this->nombre[$i] = $obj[14];
	$this->fecha_egresado[$i] = $obj[26];
	$this->fecha_titulado[$i] = $obj[51];
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>