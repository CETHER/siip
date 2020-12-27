<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-eventos-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Eventos_Docentes( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->id_evento_docente = $_POST["id_evento_docente"];
  $obj2->id_pais = $_POST["id_pais"];
  $obj2->evento = $_POST["evento"];
  $obj2->ponencia = $_POST["ponencia"];
  $obj2->ciudad = $_POST["ciudad"];
  $obj2->institucion = $_POST["institucion"];
  $obj2->fecha_inicio = $_POST["fecha_inicio"];
  $obj2->fecha_termino = $_POST["fecha_termino"];
  $obj2->status = 1;
  
  if( $obj2->id_evento_docente==null )
  {
    $obj2->agregarEvento( );
  }
  else
  {
    $obj2->modificarEvento( );
  }
  
  header( "Location: eventos-docentes.php?id_docente=$obj2->id_docente" );
  exit( );
?>