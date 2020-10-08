<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-alumnos.php";
  
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
      if( $_FILES["archivo"]["type"]=="image/jpeg" || $_FILES["archivo"]["type"]=="image/pjpeg" )
      {
        move_uploaded_file( $_FILES["archivo"]["tmp_name"], "../uploads/".$_FILES["archivo"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-alumnos.php?id_alumno=".$_POST["id_alumno"]."&error=1" );
    exit( );
  }
  
  $obj2 = new Alumnos( );
  $obj2->id_alumno = $_POST["id_alumno"];
  $obj2->id_orientacion = $_POST["id_orientacion"];
  $obj2->id_pais = $_POST["id_pais"];
  $obj2->id_aspirante = $_POST["id_aspirante"];
  $obj2->modalidad = $_POST["modalidad"];
  $obj2->fotografia = $_FILES["archivo"]["name"];
  $obj2->codigo = $_POST["codigo"];
  $obj2->contrasena = $_POST["contrasena"];
  $obj2->apellido_paterno = $_POST["apellido_paterno"];
  $obj2->apellido_materno = $_POST["apellido_materno"];
  $obj2->nombre = $_POST["nombre"];
  $obj2->sexo = $_POST["sexo"];
  $obj2->fecha_nacimiento = $_POST["fecha_nacimiento"];
  $obj2->lugar_nacimiento = $_POST["lugar_nacimiento"];
  
  if( $obj2->verificarCodigo2( )==true )
  {
    header( "Location: edicion-alumnos.php?id_alumno=$obj2->id_alumno&error=2" );
    exit( );
  }
  else
  {
    $obj2->modificarAlumno( );
    
    header( "Location: edicion-alumnos3.php?id_alumno=$obj2->id_alumno" );
    exit( );
  }
?>