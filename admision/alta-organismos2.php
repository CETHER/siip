<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-organismos.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Organismos( );
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->id_estado = $_POST["id_estado"];
  $obj2->id_pais = $_POST["id_pais"];
  $obj2->nombre = $_POST["nombre"];
  $obj2->titular = $_POST["titular"];
  $obj2->ciudad = $_POST["ciudad"];
  $obj2->correo = $_POST["correo"];
  $obj2->telefono = $_POST["telefono"];
  $obj2->status = 1;
  $obj2->agregarOrganismo( );
  
  header( "Location: alta-organismos3.php?id_organismo=$obj2->id_organismo" );
  exit( );
?>