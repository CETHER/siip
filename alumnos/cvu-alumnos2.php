<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-cvu-alumnos.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo"]["tmp_name"] ) )
  {
    if( $_FILES["archivo"]["size"]<5000000 )
    {
      if( $_FILES["archivo"]["type"]=="application/pdf" )
      {
        move_uploaded_file( $_FILES["archivo"]["tmp_name"], "../uploads/".$_FILES["archivo"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo"]["name"]!=null && $exito==0 )
  {
    header( "Location: cvu-alumnos.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $obj2 = new CVU_Alumnos( );
  $obj2->id_cvu_alumno = $_POST["id_cvu_alumno"];
  $obj2->id_alumno = $_POST["id_alumno"];
  $obj2->categoria = "2";
  $obj2->descripcion = $_POST["descripcion"];
  $obj2->fecha_inicio = $_POST["fecha_inicio"];
  $obj2->fecha_fin = $_POST["fecha_fin"];
  $obj2->archivo = $_FILES["archivo"]["name"];
  $obj2->status = 1;
  
  if( $obj2->id_cvu_alumno==null )
  {
    $obj2->agregarCVU( );
  }
  else
  {
    $obj2->modificarCVU( );
  }
  
  header( "Location: cvu-alumnos.php?id_alumno=$obj2->id_alumno" );
  exit( );
?>