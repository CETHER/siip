<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-capitulos-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Capitulos_Docentes( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->id_capitulo_docente = $_POST["id_capitulo_docente"];
  $obj2->id_pais = $_POST["id_pais"];
  $obj2->anio = $_POST["anio"];
  $obj2->titulo = $_POST["titulo"];
  $obj2->libro = $_POST["libro"];
  $obj2->autor = $_POST["autor"];
  $obj2->editorial = $_POST["editorial"];
  $obj2->isbn = $_POST["isbn"];
  $obj2->colaboracion = $_POST["colaboracion"];
  $obj2->lgac = $_POST["lgac"];
  $obj2->status = 1;
  
  if( $obj2->id_capitulo_docente==null )
  {
    $obj2->agregarCapitulo( );
  }
  else
  {
    $obj2->modificarCapitulo( );
  }
  
  header( "Location: capitulos-docentes.php?id_docente=$obj2->id_docente" );
  exit( );
?>