<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-visitantes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Visitantes( );
  $obj2->id_visitante = $_POST["id_visitante"];
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->id_pais = $_POST["id_pais"];
  $obj2->nombre = $_POST["nombre"];
  $obj2->institucion = $_POST["institucion"];
  $obj2->evento = $_POST["evento"];
  $obj2->fecha_inicio = $_POST["fecha_inicio"];
  $obj2->fecha_termino = $_POST["fecha_termino"];
  $obj2->status = 1;
  $obj2->modificarVisitante( );
  
  header( "Location: edicion-visitantes3.php?id_visitante=$obj2->id_visitante" );
  exit( );
?>