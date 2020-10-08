<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-alumnos.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Alumnos( );
  $obj2->id_alumno = $_POST["id_alumno"];
  $obj2->director_tesis = $_POST["director_tesis"];
  $obj2->asesor_tesis1 = $_POST["asesor_tesis1"];
  $obj2->asesor_tesis2 = $_POST["asesor_tesis2"];
  $obj2->asesor_tesis3 = $_POST["asesor_tesis3"];
  $obj2->modificarAlumno2( );
  
  header( "Location: edicion-asesores3.php?id_alumno=$obj2->id_alumno" );
  exit( );
?>