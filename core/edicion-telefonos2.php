<?php
  require_once "modelo-usuarios.php";
  require_once "modelo-telefonos.php";
  
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
    header( "Location: edicion-telefonos.php?id_telefono=".$_POST["id_telefono"]."&error=1" );
    exit( );
  }
  
  $obj2 = new Telefonos( );
  $obj2->id_telefono = $_POST["id_telefono"];
  $obj2->telefono = $_POST["telefono"];
  $obj2->dependencia = $_POST["dependencia"];
  $obj2->imagen = $_FILES["imagen"]["name"];
  $obj2->modificarTelefono( );
  
  header( "Location: edicion-telefonos3.php?id_telefono=$obj2->id_telefono" );
  exit( );
?>