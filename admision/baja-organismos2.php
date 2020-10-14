<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-organismos.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Organismos( );
  $obj2->id_organismo = $_POST["id_organismo"];
  $obj2->eliminarOrganismo( );
  
  header( "Location: baja-organismos3.php?id_organismo=$obj2->id_organismo" );
  exit( );
?>