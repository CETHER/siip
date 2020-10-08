<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-ciclos.php";
  require_once "../alumnos/modelo-alumnos.php";
  require_once "modelo-titulados.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Alumnos( );
  $obj2->id_alumno = $_GET["id_alumno"];
  $obj2->obtenerAlumno( );
  
  $obj3 = new Titulados( );
  $obj3->id_titulado = $obj2->id_titulado;
  $obj3->obtenerTitulado( );
  
  $obj4 = new Ciclos( );
  $obj4->id_ciclo = $obj3->id_ciclo;
  $obj4->obtenerCiclo( );
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
          <td colspan="4">M&oacute;dulo Titulaci&oacute;n</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td colspan="4">Consulta de titulados</td>
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
          <td colspan="4">DATOS DE TITULACI&Oacute;N</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Ciclo escolar de titulaci&oacute;n:</td>
          <td>Fecha de titulaci&oacute;n:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj4->nombre; ?>&nbsp;</td>
          <td>
	  <?php
            if( $obj3->fecha!="0000-00-00" )
            {
              echo $obj3->fecha;
	    }
	  ?>
          &nbsp;
	  </td>
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
          <td colspan="4">Oficio de pr&oacute;rroga:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <?php
            if( $obj3->oficio_prorroga!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj3->oficio_prorroga, $obj3->oficio_prorroga );
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
            if( $obj3->fecha_prorroga!="0000-00-00" )
            {
              echo $obj3->fecha_prorroga;
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
          <td colspan="2" class="textoTitulos3">01 - Ficha de pago del arancel, pagada.</td>
          <td class="textoTitulos4">
	  <?php if( $obj3->documento1==1 ) { echo "Entregado"; } ?>
          <?php if( $obj3->documento1==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj3->archivo1!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj3->archivo1, $obj3->archivo1 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">02 - Ficha de pago del pergamino, pagada.</td>
          <td class="textoTitulos4">
	  <?php if( $obj3->documento2==1 ) { echo "Entregado"; } ?>
          <?php if( $obj3->documento2==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj3->archivo2!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj3->archivo2, $obj3->archivo2 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">03 - Copia certificada de kardex con estatus graduado.</td>
          <td class="textoTitulos4">
	  <?php if( $obj3->documento3==1 ) { echo "Entregado"; } ?>
          <?php if( $obj3->documento3==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj3->archivo3!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj3->archivo3, $obj3->archivo3 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">04 - Copia certificada de acta de titulaci&oacute;n.</td>
          <td class="textoTitulos4">
	  <?php if( $obj3->documento4==1 ) { echo "Entregado"; } ?>
          <?php if( $obj3->documento4==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj3->archivo4!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj3->archivo4, $obj3->archivo4 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">05 - Certificado de graduado original.</td>
          <td class="textoTitulos4">
	  <?php if( $obj3->documento5==1 ) { echo "Entregado"; } ?>
          <?php if( $obj3->documento5==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj3->archivo5!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj3->archivo5, $obj3->archivo5 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">06 - Acta de nacimiento original.</td>
          <td class="textoTitulos4">
	  <?php if( $obj3->documento6==1 ) { echo "Entregado"; } ?>
          <?php if( $obj3->documento6==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj3->archivo6!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj3->archivo6, $obj3->archivo6 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">07 - Fotograf&iacute;as tamaño t&iacute;tulo.</td>
          <td class="textoTitulos4">
	  <?php if( $obj3->documento7==1 ) { echo "Entregado"; } ?>
          <?php if( $obj3->documento7==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj3->archivo7!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj3->archivo7, $obj3->archivo7 );
	    }
	  ?>
          </td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="2" class="textoTitulos3">08 - Otros.</td>
          <td class="textoTitulos4">
	  <?php if( $obj3->documento8==1 ) { echo "Entregado"; } ?>
          <?php if( $obj3->documento8==2 ) { echo "Pr&oacute;rroga"; } ?>
          </td>
          <td class="textoTitulos4">
          <?php
            if( $obj3->archivo8!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj3->archivo8, $obj3->archivo8 );
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