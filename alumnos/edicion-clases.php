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
  $obj5->id_programa = $obj2->id_programa;
  $obj5->listaAsignaturasPrograma( );
  
  $obj6 = new Docentes( );
  $obj6->listaDocentes( );
  
  $obj7 = new Aulas( );
  $obj7->listaAulas( );
  
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
      <form id="form1" name="form1" method="post" action="edicion-clases2.php">
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
          <td colspan="7">Edici&oacute;n de clases</td>
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
          <td colspan="7">Asignatura &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="7">
          <select name="id_asignatura">
          <option value=''></option>
          <?php
            $max = count( $obj5->id_asignatura );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj5->id_asignatura[$i]==$obj2->id_asignatura )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj5->id_asignatura[$i], $obj5->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj5->id_asignatura[$i], $obj5->nombre[$i] );
	      }
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
          <select name="id_docente">
          <option value=''></option>
          <?php
            $max = count( $obj6->id_docente );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj6->id_docente[$i]==$obj2->id_docente )
	      {
                printf( "<option value='%d' selected='selected'>%s %s %s</option>\n", $obj6->id_docente[$i], $obj6->apellido_paterno[$i], $obj6->apellido_materno[$i], $obj6->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s %s %s</option>\n", $obj6->id_docente[$i], $obj6->apellido_paterno[$i], $obj6->apellido_materno[$i], $obj6->nombre[$i] );
	      }
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
          <select name="id_aula">
          <option value=''></option>
          <?php
            $max = count( $obj7->id_aula );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj7->id_aula[$i]==$obj2->id_aula )
	      {
                printf( "<option value='%d' selected='selected'>%s-%s</option>\n", $obj7->id_aula[$i], $obj7->edificio[$i], $obj7->aula[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s-%s</option>\n", $obj7->id_aula[$i], $obj7->edificio[$i], $obj7->aula[$i] );
	      }
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
          <td colspan="7"><input type="text" name="nrc" size="25" maxlength="10" required="required" value="<?php echo $obj2->nrc; ?>" /></td>
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
          <td colspan="7"><input type="number" name="cupo" size="25" maxlength="2" min="0" max="99" required="required" value="<?php echo $obj2->cupo; ?>" /></td>
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
          <option value='0700' <?php if( $obj2->lun_inicio=="0700" ) { echo "selected='selected'"; } ?>>0700</option>
          <option value='0800' <?php if( $obj2->lun_inicio=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->lun_inicio=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->lun_inicio=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->lun_inicio=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->lun_inicio=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->lun_inicio=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->lun_inicio=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->lun_inicio=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->lun_inicio=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->lun_inicio=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->lun_inicio=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->lun_inicio=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->lun_inicio=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->lun_inicio=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          </select>
          </td>
          <td align="center">
          <select name="mar_inicio">
          <option value=''></option>
          <option value='0700' <?php if( $obj2->mar_inicio=="0700" ) { echo "selected='selected'"; } ?>>0700</option>
          <option value='0800' <?php if( $obj2->mar_inicio=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->mar_inicio=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->mar_inicio=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->mar_inicio=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->mar_inicio=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->mar_inicio=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->mar_inicio=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->mar_inicio=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->mar_inicio=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->mar_inicio=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->mar_inicio=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->mar_inicio=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->mar_inicio=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->mar_inicio=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          </select>
          </td>
          <td align="center">
          <select name="mie_inicio">
          <option value=''></option>
          <option value='0700' <?php if( $obj2->mie_inicio=="0700" ) { echo "selected='selected'"; } ?>>0700</option>
          <option value='0800' <?php if( $obj2->mie_inicio=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->mie_inicio=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->mie_inicio=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->mie_inicio=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->mie_inicio=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->mie_inicio=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->mie_inicio=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->mie_inicio=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->mie_inicio=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->mie_inicio=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->mie_inicio=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->mie_inicio=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->mie_inicio=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->mie_inicio=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          </select>
          </td>
          <td align="center">
          <select name="jue_inicio">
          <option value=''></option>
          <option value='0700' <?php if( $obj2->jue_inicio=="0700" ) { echo "selected='selected'"; } ?>>0700</option>
          <option value='0800' <?php if( $obj2->jue_inicio=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->jue_inicio=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->jue_inicio=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->jue_inicio=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->jue_inicio=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->jue_inicio=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->jue_inicio=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->jue_inicio=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->jue_inicio=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->jue_inicio=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->jue_inicio=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->jue_inicio=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->jue_inicio=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->jue_inicio=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          </select>
          </td>
          <td align="center">
          <select name="vie_inicio">
          <option value=''></option>
          <option value='0700' <?php if( $obj2->vie_inicio=="0700" ) { echo "selected='selected'"; } ?>>0700</option>
          <option value='0800' <?php if( $obj2->vie_inicio=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->vie_inicio=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->vie_inicio=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->vie_inicio=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->vie_inicio=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->vie_inicio=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->vie_inicio=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->vie_inicio=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->vie_inicio=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->vie_inicio=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->vie_inicio=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->vie_inicio=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->vie_inicio=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->vie_inicio=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          </select>
          </td>
          <td align="center">
          <select name="sab_inicio">
          <option value=''></option>
          <option value='0700' <?php if( $obj2->sab_inicio=="0700" ) { echo "selected='selected'"; } ?>>0700</option>
          <option value='0800' <?php if( $obj2->sab_inicio=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->sab_inicio=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->sab_inicio=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->sab_inicio=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->sab_inicio=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->sab_inicio=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->sab_inicio=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->sab_inicio=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->sab_inicio=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->sab_inicio=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->sab_inicio=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->sab_inicio=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->sab_inicio=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->sab_inicio=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          </select>
          </td>
        </tr>
        <tr class="textoTablas2">
          <td>Hora Fin</td>
          <td align="center">
          <select name="lun_fin">
          <option value=''></option>
          <option value='0800' <?php if( $obj2->lun_fin=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->lun_fin=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->lun_fin=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->lun_fin=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->lun_fin=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->lun_fin=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->lun_fin=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->lun_fin=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->lun_fin=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->lun_fin=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->lun_fin=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->lun_fin=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->lun_fin=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->lun_fin=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          <option value='2200' <?php if( $obj2->lun_fin=="2200" ) { echo "selected='selected'"; } ?>>2200</option>
          </select>
          </td>
          <td align="center">
          <select name="mar_fin">
          <option value=''></option>
          <option value='0800' <?php if( $obj2->mar_fin=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->mar_fin=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->mar_fin=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->mar_fin=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->mar_fin=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->mar_fin=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->mar_fin=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->mar_fin=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->mar_fin=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->mar_fin=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->mar_fin=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->mar_fin=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->mar_fin=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->mar_fin=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          <option value='2200' <?php if( $obj2->mar_fin=="2200" ) { echo "selected='selected'"; } ?>>2200</option>
          </select>
          </td>
          <td align="center">
          <select name="mie_fin">
          <option value=''></option>
          <option value='0800' <?php if( $obj2->mie_fin=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->mie_fin=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->mie_fin=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->mie_fin=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->mie_fin=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->mie_fin=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->mie_fin=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->mie_fin=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->mie_fin=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->mie_fin=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->mie_fin=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->mie_fin=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->mie_fin=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->mie_fin=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          <option value='2200' <?php if( $obj2->mie_fin=="2200" ) { echo "selected='selected'"; } ?>>2200</option>
          </select>
          </td>
          <td align="center">
          <select name="jue_fin">
          <option value=''></option>
          <option value='0800' <?php if( $obj2->jue_fin=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->jue_fin=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->jue_fin=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->jue_fin=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->jue_fin=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->jue_fin=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->jue_fin=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->jue_fin=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->jue_fin=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->jue_fin=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->jue_fin=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->jue_fin=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->jue_fin=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->jue_fin=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          <option value='2200' <?php if( $obj2->jue_fin=="2200" ) { echo "selected='selected'"; } ?>>2200</option>
          </select>
          </td>
          <td align="center">
          <select name="vie_fin">
          <option value=''></option>
          <option value='0800' <?php if( $obj2->vie_fin=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->vie_fin=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->vie_fin=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->vie_fin=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->vie_fin=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->vie_fin=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->vie_fin=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->vie_fin=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->vie_fin=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->vie_fin=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->vie_fin=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->vie_fin=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->vie_fin=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->vie_fin=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          <option value='2200' <?php if( $obj2->vie_fin=="2200" ) { echo "selected='selected'"; } ?>>2200</option>
          </select>
          </td>
          <td align="center">
          <select name="sab_fin">
          <option value=''></option>
          <option value='0800' <?php if( $obj2->sab_fin=="0800" ) { echo "selected='selected'"; } ?>>0800</option>
          <option value='0900' <?php if( $obj2->sab_fin=="0900" ) { echo "selected='selected'"; } ?>>0900</option>
          <option value='1000' <?php if( $obj2->sab_fin=="1000" ) { echo "selected='selected'"; } ?>>1000</option>
          <option value='1100' <?php if( $obj2->sab_fin=="1100" ) { echo "selected='selected'"; } ?>>1100</option>
          <option value='1200' <?php if( $obj2->sab_fin=="1200" ) { echo "selected='selected'"; } ?>>1200</option>
          <option value='1300' <?php if( $obj2->sab_fin=="1300" ) { echo "selected='selected'"; } ?>>1300</option>
          <option value='1400' <?php if( $obj2->sab_fin=="1400" ) { echo "selected='selected'"; } ?>>1400</option>
          <option value='1500' <?php if( $obj2->sab_fin=="1500" ) { echo "selected='selected'"; } ?>>1500</option>
          <option value='1600' <?php if( $obj2->sab_fin=="1600" ) { echo "selected='selected'"; } ?>>1600</option>
          <option value='1700' <?php if( $obj2->sab_fin=="1700" ) { echo "selected='selected'"; } ?>>1700</option>
          <option value='1800' <?php if( $obj2->sab_fin=="1800" ) { echo "selected='selected'"; } ?>>1800</option>
          <option value='1900' <?php if( $obj2->sab_fin=="1900" ) { echo "selected='selected'"; } ?>>1900</option>
          <option value='2000' <?php if( $obj2->sab_fin=="2000" ) { echo "selected='selected'"; } ?>>2000</option>
          <option value='2100' <?php if( $obj2->sab_fin=="2100" ) { echo "selected='selected'"; } ?>>2100</option>
          <option value='2200' <?php if( $obj2->sab_fin=="2200" ) { echo "selected='selected'"; } ?>>2200</option>
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
          <td colspan="7">
          <input type="submit" name="submit" value="   Enviar   " />
          <input type="hidden" name="id_clase" value="<?php echo $obj2->id_clase; ?>" />
          <input type="hidden" name="id_ciclo" value="<?php echo $obj2->id_ciclo; ?>" />
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