<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-aspirantes.php";
  
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
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
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
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
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
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
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
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
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
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
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
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
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
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
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
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
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
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo9"]["tmp_name"] ) )
  {
    if( $_FILES["archivo9"]["size"]<5000000 )
    {
      if( $_FILES["archivo9"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo9"]["tmp_name"], "../uploads/".$_FILES["archivo9"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo9"]["name"]!=null && $exito==0 )
  {
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo10"]["tmp_name"] ) )
  {
    if( $_FILES["archivo10"]["size"]<5000000 )
    {
      if( $_FILES["archivo10"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo10"]["tmp_name"], "../uploads/".$_FILES["archivo10"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo10"]["name"]!=null && $exito==0 )
  {
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo11"]["tmp_name"] ) )
  {
    if( $_FILES["archivo11"]["size"]<5000000 )
    {
      if( $_FILES["archivo11"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo11"]["tmp_name"], "../uploads/".$_FILES["archivo11"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo11"]["name"]!=null && $exito==0 )
  {
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo12"]["tmp_name"] ) )
  {
    if( $_FILES["archivo12"]["size"]<5000000 )
    {
      if( $_FILES["archivo12"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo12"]["tmp_name"], "../uploads/".$_FILES["archivo12"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo12"]["name"]!=null && $exito==0 )
  {
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
    exit( );
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo13"]["tmp_name"] ) )
  {
    if( $_FILES["archivo13"]["size"]<5000000 )
    {
      if( $_FILES["archivo13"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo13"]["tmp_name"], "../uploads/".$_FILES["archivo13"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo13"]["name"]!=null && $exito==0 )
  {
    header( "Location: evaluacion-aspirantes2.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
    exit( );
  }
  
  $obj2 = new Aspirantes( );
  $obj2->evaluacion = $_POST["evaluacion"];
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
  $obj2->documento9 = $_POST["documento9"];
  $obj2->documento10 = $_POST["documento10"];
  $obj2->documento11 = $_POST["documento11"];
  $obj2->documento12 = $_POST["documento12"];
  $obj2->documento13 = $_POST["documento13"];
  $obj2->archivo1 = $_FILES["archivo1"]["name"];
  $obj2->archivo2 = $_FILES["archivo2"]["name"];
  $obj2->archivo3 = $_FILES["archivo3"]["name"];
  $obj2->archivo4 = $_FILES["archivo4"]["name"];
  $obj2->archivo5 = $_FILES["archivo5"]["name"];
  $obj2->archivo6 = $_FILES["archivo6"]["name"];
  $obj2->archivo7 = $_FILES["archivo7"]["name"];
  $obj2->archivo8 = $_FILES["archivo8"]["name"];
  $obj2->archivo9 = $_FILES["archivo9"]["name"];
  $obj2->archivo10 = $_FILES["archivo10"]["name"];
  $obj2->archivo11 = $_FILES["archivo11"]["name"];
  $obj2->archivo12 = $_FILES["archivo12"]["name"];
  $obj2->archivo13 = $_FILES["archivo13"]["name"];
  $obj2->id_aspirante = $_POST["id_aspirante"];
  $obj2->evaluarAspirante( );
  
  header( "Location: evaluacion-aspirantes4.php?id_aspirante=$obj2->id_aspirante" );
  exit( );
?>