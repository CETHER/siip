<?php
  require_once "modelo-login.php";

  $obj = new Login( );
  $obj->codigo = $_GET["codigo"];

  $pass = $_GET["contrasena"];
  $obj->contrasena = md5($pass);
  $obj->login( );
?>