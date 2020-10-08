<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-titulados.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["oficio_prorroga"]["tmp_name"] ) )
  {
    if( $_FILES["oficio_prorroga"]["size"]<5000000 )
    {
      if( $_FILES["oficio_prorroga"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["oficio_prorroga"]["tmp_name"], "../uploads/".$_FILES["oficio_prorroga"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["oficio_prorroga"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-titulados.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo1"]["tmp_name"] ) )
  {
    if( $_FILES["archivo1"]["size"]<5000000 )
    {
      if( $_FILES["archivo1"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo1"]["tmp_name"], "../uploads/".$_FILES["archivo1"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo1"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-titulados.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo2"]["tmp_name"] ) )
  {
    if( $_FILES["archivo2"]["size"]<5000000 )
    {
      if( $_FILES["archivo2"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo2"]["tmp_name"], "../uploads/".$_FILES["archivo2"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo2"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-titulados.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo3"]["tmp_name"] ) )
  {
    if( $_FILES["archivo3"]["size"]<5000000 )
    {
      if( $_FILES["archivo3"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo3"]["tmp_name"], "../uploads/".$_FILES["archivo3"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo3"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-titulados.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo4"]["tmp_name"] ) )
  {
    if( $_FILES["archivo4"]["size"]<5000000 )
    {
      if( $_FILES["archivo4"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo4"]["tmp_name"], "../uploads/".$_FILES["archivo4"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo4"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-titulados.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo5"]["tmp_name"] ) )
  {
    if( $_FILES["archivo5"]["size"]<5000000 )
    {
      if( $_FILES["archivo5"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo5"]["tmp_name"], "../uploads/".$_FILES["archivo5"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo5"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-titulados.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo6"]["tmp_name"] ) )
  {
    if( $_FILES["archivo6"]["size"]<5000000 )
    {
      if( $_FILES["archivo6"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo6"]["tmp_name"], "../uploads/".$_FILES["archivo6"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo6"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-titulados.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo7"]["tmp_name"] ) )
  {
    if( $_FILES["archivo7"]["size"]<5000000 )
    {
      if( $_FILES["archivo7"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo7"]["tmp_name"], "../uploads/".$_FILES["archivo7"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo7"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-titulados.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo8"]["tmp_name"] ) )
  {
    if( $_FILES["archivo8"]["size"]<5000000 )
    {
      if( $_FILES["archivo8"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo8"]["tmp_name"], "../uploads/".$_FILES["archivo8"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo8"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-titulados.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $obj2 = new Titulados( );
  $obj2->id_ciclo = $_POST["id_ciclo"];
  $obj2->fecha = $_POST["fecha"];
  $obj2->oficio_prorroga = $_FILES["oficio_prorroga"]["name"];
  $obj2->fecha_prorroga = $_POST["fecha_prorroga"];
  $obj2->documento1 = $_POST["documento1"];
  $obj2->documento2 = $_POST["documento2"];
  $obj2->documento3 = $_POST["documento3"];
  $obj2->documento4 = $_POST["documento4"];
  $obj2->documento5 = $_POST["documento5"];
  $obj2->documento6 = $_POST["documento6"];
  $obj2->documento7 = $_POST["documento7"];
  $obj2->documento8 = $_POST["documento8"];
  $obj2->archivo1 = $_FILES["archivo1"]["name"];
  $obj2->archivo2 = $_FILES["archivo2"]["name"];
  $obj2->archivo3 = $_FILES["archivo3"]["name"];
  $obj2->archivo4 = $_FILES["archivo4"]["name"];
  $obj2->archivo5 = $_FILES["archivo5"]["name"];
  $obj2->archivo6 = $_FILES["archivo6"]["name"];
  $obj2->archivo7 = $_FILES["archivo7"]["name"];
  $obj2->archivo8 = $_FILES["archivo8"]["name"];
  $obj2->id_titulado = $_POST["id_titulado"];
  $obj2->modificarTitulado( );
  
  header( "Location: edicion-titulados3.php?id_alumno=".$_POST["id_alumno"] );
  exit( );
?>