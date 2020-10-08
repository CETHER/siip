<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-calificaciones.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Calificaciones( );
  $obj2->id_clase = $_POST["id_clase"];
  $obj2->codigo = $_POST["codigo"];
  $obj2->inscribirAlumno( );
  
  header( "Location: inscripcion-alumnos2.php?id_clase=$obj2->id_clase" );
  exit( );
?>