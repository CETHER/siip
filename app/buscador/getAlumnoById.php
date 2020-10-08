<?php
  require_once "modelo-buscar.php";

  $obj = new Buscador( );
  $obj->id_alumno = $_GET["id_alumno"];
  $obj->obtenerAlumno( );
?>