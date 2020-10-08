<?php
  require_once "modelo-noticias.php";

  $obj = new Noticias( );
  $obj->id_noticia = $_GET["id_noticia"];
  $obj->obtenerNoticia( );
?>