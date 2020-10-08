<?php
  require_once "modelo-kardex.php";

  $obj = new Kardex( );
  $obj->id_alumno = $_GET["id_alumno"];
  $obj->listadoKardex( );
?>
