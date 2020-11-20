<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-capitulos-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Capitulos_Docentes( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->id_capitulo_docente = $_POST["id_capitulo_docente"];
  $obj2->eliminarCapitulo( );
  
  header( "Location: capitulos-docentes.php?id_docente=$obj2->id_docente" );
  exit( );
?>