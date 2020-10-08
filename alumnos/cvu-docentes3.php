<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-cvu-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new CVU_Docentes( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->id_cvu_docente = $_POST["id_cvu_docente"];
  $obj2->eliminarCVU( );
  
  header( "Location: cvu-docentes.php?id_docente=$obj2->id_docente" );
  exit( );
?>