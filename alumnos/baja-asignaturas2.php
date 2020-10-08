<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-asignaturas.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Asignaturas( );
  $obj2->id_asignatura = $_POST["id_asignatura"];
  $obj2->eliminarAsignatura( );
  
  header( "Location: baja-asignaturas3.php?id_asignatura=$obj2->id_asignatura" );
  exit( );
?>