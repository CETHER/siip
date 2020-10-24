<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-orientaciones.php";
  require_once "../core/modelo-ciclos.php";
  require_once "../core/modelo-estados.php";
  require_once "../core/modelo-paises.php";
  require_once "modelo-aspirantes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Aspirantes( );
  $obj2->id_aspirante = $_GET["id_aspirante"];
  $obj2->obtenerAspirante( );
  
  $obj3 = new Programas( );
  $obj3->id_programa = $obj2->id_programa;
  $obj3->obtenerPrograma( );
  
  $obj4 = new Orientaciones( );
  $obj4->id_orientacion = $obj2->id_orientacion;
  $obj4->obtenerOrientacion( );
  
  $obj5 = new Ciclos( );
  $obj5->id_ciclo = $obj2->id_ciclo;
  $obj5->obtenerCiclo( );
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
          <td colspan="4">M&oacute;dulo Aspirantes</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td colspan="4">Evaluaci&oacute;n de aspirantes</td>
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
          <td colspan="4">DATOS DE CONVOCATORIA</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">Programa:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4"><?php echo $obj3->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Orientaci&oacute;n:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj4->nombre; ?>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Ciclo escolar:</td>
          <td>&nbsp;</td>
          <td>Modalidad:</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj5->nombre; ?>&nbsp;</td>
          <td>&nbsp;</td>
          <td><?php echo $obj2->modalidad_txt; ?>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="4">DATOS DE EVALUACI&Oacute;N</td>
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
	  <a href="consulta-aspirantes.php?id_aspirante=<?php echo $obj2->id_aspirante; ?>" class="textoTitulos4" target="_blank">
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
        <tr class="textoTitulos3">
          <td colspan="4">Evaluaci&oacute;n:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4"><?php echo $obj2->evaluacion_txt; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Presentaci&oacute;n de ante-proyecto</td>
          <td>Entrevista</td>
          <td>EXANI III</td>
          <td>Curso proped&eacuteutico</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->res_anteproyecto; ?>&nbsp;</td>
          <td><?php echo $obj2->res_entrevista; ?>&nbsp;</td>
          <td><?php echo $obj2->res_exani; ?>&nbsp;</td>
          <td><?php echo $obj2->res_propedeutico; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">Oficio de pr&oacute;rroga:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <?php
            if( $obj2->oficio_prorroga!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->oficio_prorroga, $obj2->oficio_prorroga );
	    }
	  ?>
          &nbsp;
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">Fecha de pr&oacute;rroga:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <?php
            if( $obj2->fecha_prorroga!="0000-00-00" )
            {
              echo $obj2->fecha_prorroga;
	    }
	  ?>
          &nbsp;
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="4">RECEPCI&Oacute;N DE DOCUMENTOS</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">01 - Certificado de graduado con promedio mínimo de 80.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento1==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento1==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo1!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo1, $obj2->archivo1 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">02 - Acta de titulaci&oacute;n.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento2==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento2==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo2!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo2, $obj2->archivo2 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">03 - Copia de t&iacute;tulo.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento3==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento3==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo3!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo3, $obj2->archivo3 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">04 - Dos cartas de recomendaci&oacute;n acad&eacute;mica.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento4==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento4==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo4!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo4, $obj2->archivo4 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">05 - Copia de comprobante de idioma ingl&eacute;s.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento5==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento5==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo5!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo5, $obj2->archivo5 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">06 - Currículum Vitae.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento6==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento6==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo6!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo6, $obj2->archivo6 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">07 - Carta de exposici&oacute;n de motivos.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento7==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento7==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo7!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo7, $obj2->archivo7 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">08 - Copia de acta de nacimiento.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento8==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento8==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo8!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo8, $obj2->archivo8 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">09 - Formato &uacute;nico de pago del proceso de selecci&oacute;n.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento9==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento9==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo9!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo9, $obj2->archivo9 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">10 - Solicitud de ingreso (control escolar).</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento10==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento10==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo10!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo10, $obj2->archivo10 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">11 - Fotograf&iacute;as.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento11==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento11==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo11!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo11, $obj2->archivo11 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">12 - Protocolo de investigaci&oacute;n.</td>
          <td class="textoTitulos4">
	  <?php if( $obj2->documento12==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento12==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo12!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo12, $obj2->archivo12 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">13 - Otros.</td>
          <td class="textoTitulos4">
          <?php if( $obj2->documento13==1 ) { echo "Entregado"; } ?>
          <?php if( $obj2->documento13==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj2->archivo13!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj2->archivo13, $obj2->archivo13 );
	    }
	  ?>
          </td>
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