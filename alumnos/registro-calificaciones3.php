<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-calificaciones.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $calificacion_ordinario = $_POST["calificacion_ordinario"];
  $calificacion_extraordinario = $_POST["calificacion_extraordinario"];
  
  $obj2 = new Calificaciones( );
  $obj2->id_clase = $_POST["id_clase"];
  $obj2->listaCalificacionesClase( );
  
  $max = count( $obj2->id_calificacion );
  
  for( $i=0; $i<$max; $i++ )
  {
    $obj3 = new Calificaciones( );
    $obj3->id_calificacion = $obj2->id_calificacion[$i];
    $obj3->obtenerCalificacion( );
    
    $obj4 = new Calificaciones( );
    $obj4->id_calificacion = $obj2->id_calificacion[$i];
    $obj4->calificacion_ordinario = $calificacion_ordinario[$i];
    $obj4->calificacion_extraordinario = $calificacion_extraordinario[$i];
    
    if( $obj4->calificacion_ordinario!=$obj3->calificacion_ordinario )
    {
      $obj4->fecha_ordinario = date( "Y-m-d" );
    }
    else
    {
      $obj4->fecha_ordinario = $obj3->fecha_ordinario;
    }
    
    if( $obj4->calificacion_extraordinario!=$obj3->calificacion_extraordinario )
    {
      $obj4->fecha_extraordinario = date( "Y-m-d" );
    }
    else
    {
      $obj4->fecha_extraordinario = $obj3->fecha_extraordinario;
    }
    
    $obj4->modificarCalificacion( );
  }
  
  header( "Location: registro-calificaciones4.php?id_clase=$obj2->id_clase" );
  exit( );
?>