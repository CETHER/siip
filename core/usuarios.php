<?php
  /**
  * Clase que gestiona lo relacionado a la tabla usuarios
  */
  
  require_once "conexion.php"; 
  
  class Usuarios extends Conexion 
  {
    public function __construct( ) 
    { 
      parent::__construct( ); 
    }
    
    
    public function validarUsuario( $usuario, $contrasena ) 
    { 
      $res = $this->mysqli->query( "select * from usuarios where usuario='$usuario' and contrasena='$contrasena' 
      and accesos_fallidos<'5' and status='1'" );
      $max = $res->num_rows;
            
      if( $max==0 )
      {
        $res = $this->mysqli->query( "select * from usuarios where usuario='$usuario' and status='1'" );
        $max = $res->num_rows;
	
	if( $max!=0 )
        {
	  $res->data_seek( 0 );
          $row = $res->fetch_row( );
          $id_usuario = $row[0];
	  $accesos_fallidos = $row[5] + 1;
          
	  $res = $this->mysqli->query( "update usuarios set accesos_fallidos='$accesos_fallidos' where id_usuario='$id_usuario'" );
	}
	
	header( "Location: ../index.php?error=1" );
        exit( );
      }
      else
      {
        $res->data_seek( 0 );
        $row = $res->fetch_row( );
        $id_usuario = $row[0];
	
	$res = $this->mysqli->query( "update usuarios set accesos_fallidos='0' where id_usuario='$id_usuario'" );
	
	header( "Location: ../home.php" );
        exit( );	
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>