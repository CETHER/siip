<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-libros-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Libros_Docentes( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->id_libro_docente = $_POST["id_libro_docente"];
  $obj2->eliminarLibro( );
  
  header( "Location: libros-docentes.php?id_docente=$obj2->id_docente" );
  exit( );
?>