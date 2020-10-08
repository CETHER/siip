<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-ciclos.php";
  require_once "modelo-asignaturas.php";
  require_once "modelo-docentes.php";
  require_once "modelo-aulas.php";
  require_once "modelo-clases.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Clases( );
  $obj2->id_clase = $_GET["id_clase"];
  $obj2->obtenerClase( );
  
  $obj3 = new Programas( );
  $obj3->id_programa = $obj2->id_programa;
  $obj3->obtenerPrograma( );
  
  $obj4 = new Ciclos( );
  $obj4->id_ciclo = $obj2->id_ciclo;
  $obj4->obtenerCiclo( );
  
  $obj5 = new Asignaturas( );
  $obj5->id_asignatura = $obj2->id_asignatura;
  $obj5->obtenerAsignatura( );
  
  $obj6 = new Docentes( );
  $obj6->id_docente = $obj2->id_docente;
  $obj6->obtenerDocente( );
  
  $obj7 = new Aulas( );
  $obj7->id_aula = $obj2->id_aula;
  $obj7->obtenerAula( );
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema Integral de Informaci&oacute;n de Posgrados</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/menu.css" rel="stylesheet" type="text/css">
</head>

<body>
<table class="tablaExterior" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
      <?php require_once "../core/header.php"; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php require_once "../core/menu.php"; ?>
    </td>
  </tr>
  <tr height="100%" valign="top">
    <td>
      <table class="tablaInterior" border="0" cellspacing="4" cellpadding="0" align="center">
        <tr>
          <td width="10%">&nbsp;</td>
          <td width="15%">&nbsp;</td>
          <td width="15%">&nbsp;</td>
          <td width="15%">&nbsp;</td>
          <td width="15%">&nbsp;</td>
          <td width="15%">&nbsp;</td>
          <td width="15%">&nbsp;</td>
        </tr>
        <tr class="textoTitulos1">
          <td colspan="7">M&oacute;dulo Alumnos</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td colspan="7">Consulta de clases</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="7">DATOS GENERALES</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="7">Programa:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7"><?php echo $obj3->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="7">Ciclo escolar:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7"><?php echo $obj4->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="7">Asignatura:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7"><?php echo $obj5->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="7">Docente:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7"><?php echo $obj6->apellido_paterno." ".$obj6->apellido_materno." ".$obj6->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="7">Aula:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7"><?php echo $obj7->edificio."-".$obj7->aula; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="7">NRC:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7"><?php echo $obj2->nrc; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="7">Cupo:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7"><?php echo $obj2->cupo; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="7">HORARIO</td>
        </tr>
        <tr class="textoTablas1">
          <td align="center">&nbsp;</td>
          <td align="center">Lunes</td>
          <td align="center">Martes</td>
          <td align="center">Mi&eacute;rcoles</td>
          <td align="center">Jueves</td>
          <td align="center">Viernes</td>
          <td align="center">S&aacute;bado</td>
        </tr>
        <tr class="textoTablas2">
          <td>Hora Inicio</td>
          <td align="center"><?php echo $obj2->lun_inicio; ?>&nbsp;</td>
          <td align="center"><?php echo $obj2->mar_inicio; ?>&nbsp;</td>
          <td align="center"><?php echo $obj2->mie_inicio; ?>&nbsp;</td>
          <td align="center"><?php echo $obj2->jue_inicio; ?>&nbsp;</td>
          <td align="center"><?php echo $obj2->vie_inicio; ?>&nbsp;</td>
          <td align="center"><?php echo $obj2->sab_inicio; ?>&nbsp;</td>
        </tr>
        <tr class="textoTablas2">
          <td>Hora Fin</td>
          <td align="center"><?php echo $obj2->lun_fin; ?>&nbsp;</td>
          <td align="center"><?php echo $obj2->mar_fin; ?>&nbsp;</td>
          <td align="center"><?php echo $obj2->mie_fin; ?>&nbsp;</td>
          <td align="center"><?php echo $obj2->jue_fin; ?>&nbsp;</td>
          <td align="center"><?php echo $obj2->vie_fin; ?>&nbsp;</td>
          <td align="center"><?php echo $obj2->sab_fin; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>      
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      <?php require_once "../core/footer.php"; ?>
    </td>
  </tr>
</table>
</body>
</html>