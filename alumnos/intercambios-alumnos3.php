<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-cvu-alumnos.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new CVU_Alumnos( );
  $obj2->id_alumno = $_POST["id_alumno"];
  $obj2->id_cvu_alumno = $_POST["id_cvu_alumno"];
  $obj2->eliminarCVU( );
  
  header( "Location: intercambios-alumnos.php?id_alumno=$obj2->id_alumno" );
  exit( );
?>