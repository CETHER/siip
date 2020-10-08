<?php
  /**
  * Clase que gestiona lo relacionado a la tabla docentes
  */
  
  require_once "../core/conexion.php";
  
  class Docentes extends Conexion 
  {
    public $id_docente;
    public $id_pais;
    public $codigo;
    public $contrasena;
    public $apellido_paterno;
    public $apellido_materno;
    public $nombre;
    public $sexo;
    public $fecha_nacimiento;
    public $lugar_nacimiento;
    public $accesos_fallidos;
    public $status;
    public $sexo_txt;
    public $filtro;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarDocente( )
    {
      $sql = "select id_docente from docentes order by id_docente";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_docente = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_docente = $obj->id_docente;
        $this->id_docente++;
      }
      
      if( $this->fotografia!=null )
      {
        $ext = pathinfo( $this->fotografia, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->fotografia, "../uploads/D-".$this->id_docente.".".$ext );
	$this->fotografia = "D-".$this->id_docente.".".$ext;
      }
      
      $sql = "insert into docentes values ( '$this->id_docente', '$this->id_pais', '$this->fotografia', '$this->codigo', '$this->contrasena', 
      '$this->apellido_paterno', '$this->apellido_materno', '$this->nombre', '$this->sexo', '$this->fecha_nacimiento', '$this->lugar_nacimiento', 
      '$this->accesos_fallidos', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarDocente( )
    {
      $sql = "update docentes set status='0' where id_docente='$this->id_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarDocente( )
    {
      if( $this->fotografia!=null )
      {
        $ext = pathinfo( $this->fotografia, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->fotografia, "../uploads/D-".$this->id_docente.".".$ext );
	$this->fotografia = "D-".$this->id_docente.".".$ext;
	
	$sql = "update docentes set fotografia='$this->fotografia' where id_docente='$this->id_docente'";
        $res = $this->mysqli->query( $sql );
      }
      
      if( $this->contrasena!=null )
      {
	$this->contrasena = md5( $this->contrasena );
	
	$sql = "update docentes set contrasena='$this->contrasena' where id_docente='$this->id_docente'";
        $res = $this->mysqli->query( $sql );
      }
      
      $sql = "update docentes set id_pais='$this->id_pais', codigo='$this->codigo', apellido_paterno='$this->apellido_paterno', 
      apellido_materno='$this->apellido_materno', nombre='$this->nombre', sexo='$this->sexo', fecha_nacimiento='$this->fecha_nacimiento',
      lugar_nacimiento='$this->lugar_nacimiento' where id_docente='$this->id_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerDocente( )
    {  
      $sql = "select * from docentes where id_docente='$this->id_docente' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_docente = $obj->id_docente;
	$this->id_pais = $obj->id_pais;
	$this->fotografia = $obj->fotografia;
	$this->codigo = $obj->codigo;
	$this->contrasena = $obj->contrasena;
	$this->apellido_paterno = $obj->apellido_paterno;
	$this->apellido_materno = $obj->apellido_materno;
	$this->nombre = $obj->nombre;
	$this->sexo = $obj->sexo;
	$this->fecha_nacimiento = $obj->fecha_nacimiento;
	$this->lugar_nacimiento = $obj->lugar_nacimiento;
	$this->accesos_fallidos = $obj->accesos_fallidos;
	
	switch( $this->sexo )
	{
	  case 1: $this->sexo_txt = "Masculino"; break;
	  case 2: $this->sexo_txt = "Femenino"; break;
	}
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaDocentes( )
    {
      $sql = "select * from docentes where status='1' order by apellido_paterno, apellido_materno, nombre";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_docente[$i] = $obj->id_docente;
	$this->id_pais[$i] = $obj->id_pais;
	$this->codigo[$i] = $obj->codigo;
	$this->apellido_paterno[$i] = $obj->apellido_paterno;
	$this->apellido_materno[$i] = $obj->apellido_materno;
	$this->nombre[$i] = $obj->nombre;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaDocentesFiltro( )
    {
      $sql = "select * from docentes where apellido_paterno like '$this->filtro%' and status='1' order by apellido_paterno, apellido_materno, nombre";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_docente[$i] = $obj->id_docente;
	$this->id_pais[$i] = $obj->id_pais;
	$this->codigo[$i] = $obj->codigo;
	$this->apellido_paterno[$i] = $obj->apellido_paterno;
	$this->apellido_materno[$i] = $obj->apellido_materno;
	$this->nombre[$i] = $obj->nombre;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function verificarCodigo( )
    {
      $sql = "select * from docentes where codigo='$this->codigo' and status='1'";
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
      $sql = "select * from docentes where codigo='$this->codigo' and id_docente!='$this->id_docente' and status='1'";
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
  }
?>