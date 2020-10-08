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
  $obj2->codigo = $_POST["codigo"];
  $obj2->contrasena = $_POST["contrasena"];
  $obj2->promocionarAspirante( );
  
  header( "Location: promocion-aspirantes4.php?id_aspirante=$obj2->id_aspirante" );
  exit( );
?>