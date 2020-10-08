<?php
  require_once "modelo-alumnos.php";

  $obj = new Alumnos( );
  $obj->id_alumno = $_GET["id_alumno"];
  $obj->obtenerAlumno( );
?>