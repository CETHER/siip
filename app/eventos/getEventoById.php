<?php
  require_once "modelo-eventos.php";

  $obj = new Eventos( );
  $obj->id_evento = $_GET["id_evento"];
  $obj->obtenerEvento( );
?>