<?php
  require_once "modelo-usuarios.php";
  require_once "modelo-noticias.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["imagen"]["tmp_name"] ) )
  {
    if( $_FILES["imagen"]["size"]<5000000 )
    {
      if( $_FILES["imagen"]["type"]=="image/jpeg" || $_FILES["imagen"]["type"]=="image/pjpeg" )
      {
        move_uploaded_file( $_FILES["imagen"]["tmp_name"], "../uploads/".$_FILES["imagen"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["imagen"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-noticias.php?id_noticia=".$_POST["id_noticia"]."&error=1" );
    exit( );
  }
  
  $obj2 = new Noticias( );
  $obj2->id_noticia = $_POST["id_noticia"];
  $obj2->titulo = $_POST["titulo"];
  $obj2->subtitulo = $_POST["subtitulo"];
  $obj2->descripcion = $_POST["descripcion"];
  $obj2->fecha = $_POST["fecha"];
  $obj2->imagen = $_FILES["imagen"]["name"];
  $obj2->modificarNoticia( );
  
  header( "Location: edicion-noticias3.php?id_noticia=$obj2->id_noticia" );
  exit( );
?>