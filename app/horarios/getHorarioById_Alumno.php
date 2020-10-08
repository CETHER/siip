<?php
  require_once "modelo-horarios.php";

  $obj = new Horarios( );
  $obj->id_alumno = $_GET["id_alumno"];
  $obj->getHorariosById( );
?>
