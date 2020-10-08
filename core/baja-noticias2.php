<?php
  require_once "modelo-usuarios.php";
  require_once "modelo-noticias.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Noticias( );
  $obj2->id_noticia = $_POST["id_noticia"];
  $obj2->eliminarNoticia( );
  
  header( "Location: baja-noticias3.php?id_noticia=$obj2->id_noticia" );
  exit( );
?>