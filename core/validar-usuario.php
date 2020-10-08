<?php
  require_once "usuarios.php"; 
  
  $usuario = $_POST["usuario"];
  $contrasena = $_POST["contrasena"];
  
  $objeto = new Usuarios( );
  $objeto->validarUsuario( $usuario, $contrasena );
?>