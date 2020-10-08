<?php
  /**
  * Clase que gestiona lo relacionado a la tabla usuarios
  */
  
  require_once "conexion.php";
  
  class Usuarios extends Conexion 
  {
    public $id_usuario;
    public $id_programa;
    public $id_perfil;
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
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarUsuario( )
    {
      $sql = "select id_usuario from usuarios order by id_usuario";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_usuario = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_usuario = $obj->id_usuario;
        $this->id_usuario++;
      }
      
      $sql = "insert into usuarios values ( '$this->id_usuario', '$this->id_programa', '$this->id_perfil', '$this->id_pais', '$this->codigo', 
      '$this->contrasena', '$this->apellido_paterno', '$this->apellido_materno', '$this->nombre', '$this->sexo', '$this->fecha_nacimiento', 
      '$this->lugar_nacimiento', '$this->accesos_fallidos', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarUsuario( )
    {
      $sql = "update usuarios set status='0' where id_usuario='$this->id_usuario'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarUsuario( )
    {
      if( $this->contrasena!=null )
      {
	$this->contrasena = md5( $this->contrasena );
	
	$sql = "update usuarios set contrasena='$this->contrasena' where id_usuario='$this->id_usuario'";
        $res = $this->mysqli->query( $sql );
      }
      
      $sql = "update usuarios set id_perfil='$this->id_perfil', id_pais='$this->id_pais', codigo='$this->codigo', 
      apellido_paterno='$this->apellido_paterno', apellido_materno='$this->apellido_materno', nombre='$this->nombre', sexo='$this->sexo', 
      fecha_nacimiento='$this->fecha_nacimiento', lugar_nacimiento='$this->lugar_nacimiento' where id_usuario='$this->id_usuario'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerUsuario( )
    { 
      $sql = "select * from usuarios where id_usuario='$this->id_usuario' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_programa = $obj->id_programa;
	$this->id_perfil = $obj->id_perfil;
	$this->id_pais = $obj->id_pais;
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
    
    
    public function listaUsuariosPrograma( )
    {
      $sql = "select * from usuarios where id_programa='$this->id_programa' and status='1' order by apellido_paterno, apellido_materno, nombre";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_usuario[$i] = $obj->id_usuario;
	$this->id_perfil[$i] = $obj->id_perfil;
	$this->id_pais[$i] = $obj->id_pais;
	$this->codigo[$i] = $obj->codigo;
	$this->contrasena[$i] = $obj->contrasena;
	$this->apellido_paterno[$i] = $obj->apellido_paterno;
	$this->apellido_materno[$i] = $obj->apellido_materno;
	$this->nombre[$i] = $obj->nombre;
	$this->sexo[$i] = $obj->sexo;
	$this->fecha_nacimiento[$i] = $obj->fecha_nacimiento;
	$this->lugar_nacimiento[$i] = $obj->lugar_nacimiento;	
	$this->accesos_fallidos[$i] = $obj->accesos_fallidos;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function verificarCodigo( )
    {
      $sql = "select * from usuarios where codigo='$this->codigo' and status='1'";
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
      $sql = "select * from usuarios where codigo='$this->codigo' and id_usuario!='$this->id_usuario' and status='1'";
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
    
    
    public function desbloquearUsuario( )
    {
      $sql = "update usuarios set accesos_fallidos='0' where id_usuario='$this->id_usuario'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function validarUsuario( ) 
    {  
      $sql = "select * from usuarios where codigo='$this->codigo' and contrasena='$this->contrasena' and accesos_fallidos<'5' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $sql = "select * from usuarios where codigo='$this->codigo' and status='1'";
	$res = $this->mysqli->query( $sql );
        $max = $res->num_rows;
	
	if( $max!=0 )
        {
	  $res->data_seek( 0 );
          $obj = $res->fetch_object( );
	  
	  $id_usuario = $obj->id_usuario;
	  $accesos_fallidos = $obj->accesos_fallidos;
	  $accesos_fallidos++;
          
	  $sql = "update usuarios set accesos_fallidos='$accesos_fallidos' where id_usuario='$id_usuario'";
	  $res = $this->mysqli->query( $sql );
	  
	  if( $accesos_fallidos>=5 )
	  {
	    header( "Location: ../index.php?error=2" );
            exit( );
	  }
	}
	
	header( "Location: ../index.php?error=1" );
        exit( );
      }
      else
      {
        $res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$id_usuario = $obj->id_usuario;
	$id_programa = $obj->id_programa;
	$id_perfil = $obj->id_perfil;
	
	$sql = "update usuarios set accesos_fallidos='0' where id_usuario='$id_usuario'";
	$res = $this->mysqli->query( $sql );
	
	session_start( );
	$_SESSION["id_usuario"] = $id_usuario;
	$_SESSION["id_programa"] = $id_programa;
	$_SESSION["id_perfil"] = $id_perfil;
	$_SESSION["codigo"] = $this->codigo;
	$_SESSION["contrasena"] = $this->contrasena;
	
	header( "Location: home.php" );
        exit( );
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function validarSession( ) 
    {
      $sql = "select * from usuarios where id_usuario='$this->id_usuario' and codigo='$this->codigo' and contrasena='$this->contrasena' and 
      accesos_fallidos<'5' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
	header( "Location: ../index.php?error=1" );
        exit( );
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>