<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-visitantes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Visitantes( );
  $obj2->id_visitante = $_POST["id_visitante"];
  $obj2->eliminarVisitante( );
  
  header( "Location: baja-visitantes3.php?id_visitante=$obj2->id_visitante" );
  exit( );
?>