<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-redes-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Redes_Docentes( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->id_red_docente = $_POST["id_red_docente"];
  $obj2->eliminarRed( );
  
  header( "Location: redes-docentes.php?id_docente=$obj2->id_docente" );
  exit( );
?>