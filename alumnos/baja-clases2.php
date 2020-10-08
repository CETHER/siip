<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-clases.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Clases( );
  $obj2->id_clase = $_POST["id_clase"];
  $obj2->eliminarClase( );
  
  header( "Location: baja-clases3.php?id_clase=$obj2->id_clase" );
  exit( );
?>