<?php
  require_once "modelo-usuarios.php";
  require_once "modelo-telefonos.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Telefonos( );
  $obj2->id_telefono = $_POST["id_telefono"];
  $obj2->eliminarTelefono( );
  
  header( "Location: baja-telefonos3.php?id_telefono=$obj2->id_telefono" );
  exit( );
?>