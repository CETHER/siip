<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-articulos-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Articulos_Docentes( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->id_articulo_docente = $_POST["id_articulo_docente"];
  $obj2->eliminarArticulo( );
  
  header( "Location: articulos-docentes.php?id_docente=$obj2->id_docente" );
  exit( );
?>