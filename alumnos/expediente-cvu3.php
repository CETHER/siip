<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-cvu.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new CVU( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->id_cvu = $_POST["id_cvu"];
  $obj2->eliminarCVU( );
  
  header( "Location: expediente-cvu.php?id_docente=$obj2->id_docente" );
  exit( );
?>