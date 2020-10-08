<?php
  require_once "modelo-buscar.php";

  $obj = new Buscador( );
  $obj->id_docente = $_GET["id_docente"];
  $obj->obtenerCVUDocente( );
?>