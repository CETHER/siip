<?php
  require_once "modelo-usuarios.php";
  
  $codigo = $_POST["codigo"];
  $contrasena = $_POST["contrasena"];
  
  $codigo = str_ireplace( "'", "", $codigo );
  $codigo = str_ireplace( '"', "", $codigo );
  $codigo = str_ireplace( "SELECT", "", $codigo );
  $codigo = str_ireplace( "INSERT", "", $codigo );
  $codigo = str_ireplace( "UPDATE", "", $codigo );
  $codigo = str_ireplace( "DELETE", "", $codigo );
  $codigo = str_ireplace( "CREATE", "", $codigo );
  $codigo = str_ireplace( "TRUNCATE", "", $codigo );
  $codigo = str_ireplace( "DROP", "", $codigo );
  $codigo = str_ireplace( "FROM", "", $codigo );
  $codigo = str_ireplace( "SHOW", "", $codigo );
  $codigo = str_ireplace( "TABLES", "", $codigo );
  $codigo = str_ireplace( "TABLE", "", $codigo );
  $codigo = str_ireplace( "WHERE", "", $codigo );
  $codigo = str_ireplace( "LIKE", "", $codigo );
  
  $contrasena = str_ireplace( "'", "", $contrasena );
  $contrasena = str_ireplace( '"', "", $contrasena );
  $contrasena = str_ireplace( "SELECT", "", $contrasena );
  $contrasena = str_ireplace( "INSERT", "", $contrasena );
  $contrasena = str_ireplace( "UPDATE", "", $contrasena );
  $contrasena = str_ireplace( "DELETE", "", $contrasena );
  $contrasena = str_ireplace( "CREATE", "", $contrasena );
  $contrasena = str_ireplace( "TRUNCATE", "", $contrasena );
  $contrasena = str_ireplace( "DROP", "", $contrasena );
  $contrasena = str_ireplace( "FROM", "", $contrasena );
  $contrasena = str_ireplace( "SHOW", "", $contrasena );
  $contrasena = str_ireplace( "TABLES", "", $contrasena );
  $contrasena = str_ireplace( "TABLE", "", $contrasena );
  $contrasena = str_ireplace( "WHERE", "", $contrasena );
  $contrasena = str_ireplace( "LIKE", "", $contrasena );
  
  $obj = new Usuarios( );
  $obj->codigo = $codigo;
  $obj->contrasena = md5( $contrasena );
  $obj->validarUsuario( );
?>