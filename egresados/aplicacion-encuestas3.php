<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-egresados.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Egresados( );
  $obj2->id_egresado = $_POST["id_egresado"];
  $obj2->municipio1 = $_POST["municipio1"];
  $obj2->municipio2 = $_POST["municipio2"];
  $obj2->municipio3 = $_POST["municipio3"];
  $obj2->municipio4 = $_POST["municipio4"];
  $obj2->id_estado1 = $_POST["id_estado1"];
  $obj2->id_estado2 = $_POST["id_estado2"];
  $obj2->id_estado3 = $_POST["id_estado3"];
  $obj2->id_estado4 = $_POST["id_estado4"];
  $obj2->id_pais1 = $_POST["id_pais1"];
  $obj2->id_pais2 = $_POST["id_pais2"];
  $obj2->id_pais3 = $_POST["id_pais3"];
  $obj2->id_pais4 = $_POST["id_pais4"];
  $obj2->con_quien_vive = $_POST["con_quien_vive"];
  $obj2->con_quien_vive_otro = $_POST["con_quien_vive_otro"];
  $obj2->tiene_hijos = $_POST["tiene_hijos"];
  $obj2->cantidad_hijos = $_POST["cantidad_hijos"];
  $obj2->edad_hijo_menor = $_POST["edad_hijo_menor"];
  $obj2->dependientes = $_POST["dependientes"];
  $obj2->escolaridad1 = $_POST["escolaridad1"];
  $obj2->escolaridad2 = $_POST["escolaridad2"];
  $obj2->escolaridad3 = $_POST["escolaridad3"];
  $obj2->modificarEgresado2( );
  
  header( "Location: aplicacion-encuestas4.php?id_alumno=".$_POST["id_alumno"] );
  exit( );
?>