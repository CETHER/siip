<?php
  require_once "modelo-alumnos.php";

  $obj = new Alumnos( );
  $obj->codigo = $_GET["codigo"];
  $obj->contrasena = $_GET["contrasena"];
  $obj->login( );
?>