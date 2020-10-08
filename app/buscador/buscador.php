<?php
  require_once "modelo-buscar.php";

  $obj = new Buscador( );
  $obj->persona_buscada = $_GET["persona_buscada"];
  $obj->listaPersonas( );
?>
