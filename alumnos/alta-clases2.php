<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-clases.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Clases( );
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->id_ciclo = $_POST["id_ciclo"];
  $obj2->id_asignatura = $_POST["id_asignatura"];
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->id_aula = $_POST["id_aula"];
  $obj2->nrc = $_POST["nrc"];
  $obj2->cupo = $_POST["cupo"];
  $obj2->lun_inicio = $_POST["lun_inicio"];
  $obj2->mar_inicio = $_POST["mar_inicio"];
  $obj2->mie_inicio = $_POST["mie_inicio"];
  $obj2->jue_inicio = $_POST["jue_inicio"];
  $obj2->vie_inicio = $_POST["vie_inicio"];
  $obj2->sab_inicio = $_POST["sab_inicio"];
  $obj2->lun_fin = $_POST["lun_fin"];
  $obj2->mar_fin = $_POST["mar_fin"];
  $obj2->mie_fin = $_POST["mie_fin"];
  $obj2->jue_fin = $_POST["jue_fin"];
  $obj2->vie_fin = $_POST["vie_fin"];
  $obj2->sab_fin = $_POST["sab_fin"];
  $obj2->status = 1;
  
  if( $obj2->verificarNRC( )==true )
  {
    header( "Location: alta-clases.php?error=1" );
    exit( );
  }
  else
  {
    $obj2->agregarClase( );
  
    header( "Location: alta-clases3.php?id_clase=$obj2->id_clase" );
    exit( );
  }
?>