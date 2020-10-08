<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-estados.php";
  require_once "../core/modelo-paises.php";
  require_once "../alumnos/modelo-alumnos.php";
  require_once "modelo-egresados.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Alumnos( );
  $obj2->id_alumno = $_GET["id_alumno"];
  $obj2->obtenerAlumno( );
  
  $obj3 = new Egresados( );
  $obj3->id_egresado = $obj2->id_egresado;
  $obj3->obtenerEgresado( );
  
  $obj4 = new Estados( );
  $obj4->id_estado = $obj3->id_estado1;
  $obj4->obtenerEstado( );
  
  $obj5 = new Estados( );
  $obj5->id_estado = $obj3->id_estado2;
  $obj5->obtenerEstado( );
  
  $obj6 = new Estados( );
  $obj6->id_estado = $obj3->id_estado3;
  $obj6->obtenerEstado( );
  
  $obj7 = new Estados( );
  $obj7->id_estado = $obj3->id_estado4;
  $obj7->obtenerEstado( );
  
  $obj8 = new Paises( );
  $obj8->id_pais = $obj3->id_pais1;
  $obj8->obtenerPais( );
  
  $obj9 = new Paises( );
  $obj9->id_pais = $obj3->id_pais2;
  $obj9->obtenerPais( );
  
  $obj10 = new Paises( );
  $obj10->id_pais = $obj3->id_pais3;
  $obj10->obtenerPais( );
  
  $obj11 = new Paises( );
  $obj11->id_pais = $obj3->id_pais4;
  $obj11->obtenerPais( );
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
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
        </tr>
        <tr class="textoTitulos1">
          <td colspan="4">M&oacute;dulo Egresados</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td colspan="4">Aplicaci&oacute;n de encuestas</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4" class="textoRojo">Proceso completado con &eacute;xito.</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="4">
          <p>La presente encuesta tiene como objetivo contar con informaci&oacute;n relevante sobre la situaci&oacute;n personal, profesional y laboral de los egresados de los programas de posgrado de CUCEA, para identificar aspectos que contribuyan a mejorar la calidad acad&eacute;mica de los mismos. La informaci&oacute;n proporcionada ser&aacute; tratada con absoluta discreci&oacute;n y s&oacute;lo para fines acad&eacute;micos.</p>
          <p>Cuestionario  elaborado para la Coordinaci&oacute;n de Posgrados con participaci&oacute;n de los investigadores del proyecto ITUNEQMO. La programaci&oacute;n del instrumento en l&iacute;nea es producto de la tesis de Maestr&iacute;a en Tecnolog&iacute;as de la Informaci&oacute;n de...</p>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="4">DATOS GENERALES</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">Nombre:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <a href="../alumnos/consulta-alumnos.php?id_alumno=<?php echo $obj2->id_alumno; ?>" class="textoTitulos4" target="_blank">
	  <?php echo $obj2->apellido_paterno." ".$obj2->apellido_materno." ".$obj2->nombre; ?>
          </a>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="4">I. INFORMACI&Oacute;N PERSONAL Y SOCIOFAMILIAR</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">1. ¿En qu&eacute; municipio, estado y pa&iacute;s has vivido principalmente?</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Per&iacute;odo</td>
          <td>Municipio</td>
          <td>Estado</td>
          <td>Pa&iacute;s</td>
        </tr>
        <tr class="textoTitulos4">
          <td>a) Cuando ten&iacute;as 16 años</td>
          <td><?php echo $obj3->municipio1; ?></td>
          <td><?php echo $obj4->nombre; ?></td>
          <td><?php echo $obj8->nombre; ?></select>
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>b) Durante la licenciatura</td>
          <td><?php echo $obj3->municipio2; ?></td>
          <td><?php echo $obj5->nombre; ?></td>
          <td><?php echo $obj9->nombre; ?></td>
        </tr>
        <tr class="textoTitulos4">
          <td>c) Al obtener tu primer trabajo como egresado de posgrado</td>
          <td><?php echo $obj3->municipio3; ?></td>
          <td><?php echo $obj6->nombre; ?></td>
          <td><?php echo $obj10->nombre; ?></td>
        </tr>
        <tr class="textoTitulos4">
          <td>d) Actualmente</td>
          <td><?php echo $obj3->municipio4; ?></td>
          <td><?php echo $obj7->nombre; ?></td>
          <td><?php echo $obj11->nombre; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">2. ¿Con qui&eacute;n vives actualmente?</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj3->con_quien_vive_txt; ?></td>
          <td colspan="3"><?php echo $obj3->con_quien_vive_otro; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">3. ¿Tienes hijos?</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4"><?php echo $obj3->tiene_hijos_txt; ?></td>
        </tr>
        <tr class="textoTitulos4">
          <td>¿Cu&aacute;ntos?</td>
          <td colspan="3"><?php echo $obj3->cantidad_hijos; ?></td>
        </tr>
        <tr class="textoTitulos4">
          <td>Edad del hijo m&aacute;s pequeño: </td>
          <td colspan="3"><?php echo $obj3->edad_hijo_menor; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">4. ¿N&uacute;mero de dependientes econ&oacute;micos?</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4"><?php echo $obj3->dependientes; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">5. ¿Cu&aacute;l es el nivel de escolaridad de tus padres y de tu pareja actual?</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Padre</td>
          <td>Madre</td>
          <td>Pareja</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj3->escolaridad1_txt; ?></td>
          <td><?php echo $obj3->escolaridad2_txt; ?></td>
          <td><?php echo $obj3->escolaridad3_txt; ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
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