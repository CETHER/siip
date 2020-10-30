<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-docentes.php";
  
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
    header( "Location: alta-docentes.php?error=1" );
    exit( );
  }
  
  $obj2 = new Docentes( );
  $obj2->id_pais = $_POST["id_pais"];
  $obj2->fotografia = $_FILES["archivo"]["name"];
  $obj2->codigo = $_POST["codigo"];
  $obj2->contrasena = md5( $_POST["contrasena"] );
  $obj2->apellido_paterno = $_POST["apellido_paterno"];
  $obj2->apellido_materno = $_POST["apellido_materno"];
  $obj2->nombre = $_POST["nombre"];
  $obj2->sexo = $_POST["sexo"];
  $obj2->fecha_nacimiento = $_POST["fecha_nacimiento"];
  $obj2->lugar_nacimiento = $_POST["lugar_nacimiento"];
  $obj2->modalidad = $_POST["modalidad"];
  $obj2->escolaridad = $_POST["escolaridad"];
  $obj2->institucion = $_POST["institucion"];
  $obj2->fecha_titulacion = $_POST["fecha_titulacion"];
  $obj2->numero_cvu = $_POST["numero_cvu"];
  $obj2->miembro_sni = $_POST["miembro_sni"];
  $obj2->nivel_sni = $_POST["nivel_sni"];
  $obj2->perfil_prodep = $_POST["perfil_prodep"];
  $obj2->cuerpo_academico = $_POST["cuerpo_academico"];
  $obj2->lgac = $_POST["lgac"];
  $obj2->proyectos = $_POST["proyectos"];
  $obj2->accesos_fallidos = 0;
  $obj2->status = 1;
  
  if( $obj2->verificarCodigo( )==true )
  {
    header( "Location: alta-docentes.php?error=2" );
    exit( );
  }
  else
  {
    $obj2->agregarDocente( );
  
    header( "Location: alta-docentes3.php?id_docente=$obj2->id_docente" );
    exit( );
  }
?>