<?php
  require_once "modelo-usuarios.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Usuarios( );
  $obj2->id_usuario = $_POST["id_usuario"];
  $obj2->id_perfil = $_POST["id_perfil"];
  $obj2->id_pais = $_POST["id_pais"];
  $obj2->codigo = $_POST["codigo"];
  $obj2->contrasena = $_POST["contrasena"];
  $obj2->apellido_paterno = $_POST["apellido_paterno"];
  $obj2->apellido_materno = $_POST["apellido_materno"];
  $obj2->nombre = $_POST["nombre"];
  $obj2->sexo = $_POST["sexo"];
  $obj2->fecha_nacimiento = $_POST["fecha_nacimiento"];
  $obj2->lugar_nacimiento = $_POST["lugar_nacimiento"];
  
  if( $obj2->verificarCodigo2( )==true )
  {
    header( "Location: edicion-usuarios.php?id_usuario=$obj2->id_usuario&error=2" );
    exit( );
  }
  else
  {
    $obj2->modificarUsuario( );
  
    header( "Location: edicion-usuarios3.php?id_usuario=$obj2->id_usuario" );
    exit( );
  }
?>