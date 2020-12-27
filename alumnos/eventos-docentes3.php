<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-estancias-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Estancias_Docentes( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->id_estancia_docente = $_POST["id_estancia_docente"];
  $obj2->eliminarEstancia( );
  
  header( "Location: estancias-docentes.php?id_docente=$obj2->id_docente" );
  exit( );
?>