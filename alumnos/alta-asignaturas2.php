<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-asignaturas.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Asignaturas( );
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->nombre = $_POST["nombre"];
  $obj2->clave = $_POST["clave"];
  $obj2->area = $_POST["area"];
  $obj2->creditos = $_POST["creditos"];
  $obj2->status = 1;
  $obj2->agregarAsignatura( );
  
  header( "Location: alta-asignaturas3.php?id_asignatura=$obj2->id_asignatura" );
  exit( );
?>