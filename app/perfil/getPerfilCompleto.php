<?php
  require_once "modelo-perfil.php";

  $obj = new Perfil( );
  $obj->id_alumno = $_GET["id_alumno"];
  $obj->PerfilCompleto( );
?>