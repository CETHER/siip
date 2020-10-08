<?php
  require_once "modelo-usuarios.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Usuarios( );
  $obj2->id_usuario = $_POST["id_usuario"];
  $obj2->eliminarUsuario( );
  
  header( "Location: baja-usuarios3.php?id_usuario=$obj2->id_usuario" );
  exit( );
?>