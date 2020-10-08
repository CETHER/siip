<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-ciclos.php";
  require_once "modelo-asignaturas.php";
  require_once "modelo-docentes.php";
  require_once "modelo-aulas.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Programas( );
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->obtenerPrograma( );
  
  $obj3 = new Ciclos( );
  $obj3->listaCiclos( );
  
  $obj4 = new Asignaturas( );
  $obj4->id_programa = $obj2->id_programa;
  $obj4->listaAsignaturasPrograma( );
  
  $obj5 = new Docentes( );
  $obj5->listaDocentes( );
  
  $obj6 = new Aulas( );
  $obj6->listaAulas( );
  
  if( isset( $_GET["error"] ) ) 
  {
    $error = $_GET["error"];
    
    switch( $error )
    {
      case 1: $msg_error = "El NRC ya se encuentra registrado."; break;
    }
  }
  else
  {
    $error = 0;
  }
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
      <form id="form1" name="form1" method="post" action="alta-clases2.php">
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
          <td colspan="7">Alta de clases</td>
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
        <?php if( $error!=0 ) { ?>
        <tr>
          <td colspan="7" class="textoRojo"><?php echo $msg_error; ?></td>
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
        <?php } ?>
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
          <td colspan="7"><?php echo $obj2->nombre; ?>&nbsp;</td>
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
          <td colspan="7">Ciclo escolar &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7">
          <select name="id_ciclo" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj3->id_ciclo );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj3->id_ciclo[$i], $obj3->nombre[$i] );
            }
	  ?>
          </select>
          </td>
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
          <td colspan="7">Asignatura &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7">
          <select name="id_asignatura" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj4->id_asignatura );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj4->id_asignatura[$i], $obj4->nombre[$i] );
            }
	  ?>
          </select>
          </td>
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
          <td colspan="7">Docente &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7">
          <select name="id_docente" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj5->id_docente );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s %s %s</option>\n", $obj5->id_docente[$i], $obj5->apellido_paterno[$i], $obj5->apellido_materno[$i], $obj5->nombre[$i] );
            }
	  ?>
          </select>
          </td>
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
          <td colspan="7">Aula &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7">
          <select name="id_aula" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj6->id_aula );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s-%s</option>\n", $obj6->id_aula[$i], $obj6->edificio[$i], $obj6->aula[$i] );
            }
	  ?>
          </select>
          </td>
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
          <td colspan="7">NRC &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7"><input type="text" name="nrc" size="25" maxlength="10" required="required" /></td>
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
          <td colspan="7">Cupo &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7"><input type="number" name="cupo" size="25" maxlength="2" min="0" max="99" required="required" /></td>
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
          <td align="center">
          <select name="lun_inicio">
          <option value=''></option>
          <option value='0700'>0700</option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          </select>
          </td>
          <td align="center">
          <select name="mar_inicio">
          <option value=''></option>
          <option value='0700'>0700</option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          </select>
          </td>
          <td align="center">
          <select name="mie_inicio">
          <option value=''></option>
          <option value='0700'>0700</option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          </select>
          </td>
          <td align="center">
          <select name="jue_inicio">
          <option value=''></option>
          <option value='0700'>0700</option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          </select>
          </td>
          <td align="center">
          <select name="vie_inicio">
          <option value=''></option>
          <option value='0700'>0700</option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          </select>
          </td>
          <td align="center">
          <select name="sab_inicio">
          <option value=''></option>
          <option value='0700'>0700</option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          </select>
          </td>
        </tr>
        <tr class="textoTablas2">
          <td>Hora Fin</td>
          <td align="center">
          <select name="lun_fin">
          <option value=''></option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          <option value='2200'>2200</option>
          </select>
          </td>
          <td align="center">
          <select name="mar_fin">
          <option value=''></option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          <option value='2200'>2200</option>
          </select>
          </td>
          <td align="center">
          <select name="mie_fin">
          <option value=''></option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          <option value='2200'>2200</option>
          </select>
          </td>
          <td align="center">
          <select name="jue_fin">
          <option value=''></option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          <option value='2200'>2200</option>
          </select>
          </td>
          <td align="center">
          <select name="vie_fin">
          <option value=''></option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          <option value='2200'>2200</option>
          </select>
          </td>
          <td align="center">
          <select name="sab_fin">
          <option value=''></option>
          <option value='0800'>0800</option>
          <option value='0900'>0900</option>
          <option value='1000'>1000</option>
          <option value='1100'>1100</option>
          <option value='1200'>1200</option>
          <option value='1300'>1300</option>
          <option value='1400'>1400</option>
          <option value='1500'>1500</option>
          <option value='1600'>1600</option>
          <option value='1700'>1700</option>
          <option value='1800'>1800</option>
          <option value='1900'>1900</option>
          <option value='2000'>2000</option>
          <option value='2100'>2100</option>
          <option value='2200'>2200</option>
          </select>
          </td>
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
          <td colspan="7"><input type="submit" name="submit" value="   Enviar   " /></td>
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
      </form>
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