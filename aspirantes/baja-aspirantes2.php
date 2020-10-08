<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-aspirantes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Aspirantes( );
  $obj2->id_aspirante = $_POST["id_aspirante"];
  $obj2->eliminarAspirante( );
  
  header( "Location: baja-aspirantes3.php?id_aspirante=$obj2->id_aspirante" );
  exit( );
?>