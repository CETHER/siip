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
  $obj4->listaEstados( );
  
  $obj5 = new Paises( );
  $obj5->listaPaises( );
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
      <form id="form1" name="form1" method="post" action="aplicacion-encuestas3.php">
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
          <td colspan="4">1. ¿En qu&eacute; municipio, estado y pa&iacute;s has vivido principalmente? &bull;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Per&iacute;odo</td>
          <td>Municipio</td>
          <td>Estado</td>
          <td>Pa&iacute;s</td>
        </tr>
        <tr class="textoTitulos4">
          <td>a) Cuando ten&iacute;as 16 años</td>
          <td><input type="text" name="municipio1" size="25" maxlength="50" required="required" value="<?php echo $obj3->municipio1; ?>" /></td>
          <td>
          <select name="id_estado1" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj4->id_estado );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj4->id_estado[$i]==$obj3->id_estado1 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj4->id_estado[$i], $obj4->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj4->id_estado[$i], $obj4->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
          <td>
          <select name="id_pais1" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj5->id_pais );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj5->id_pais[$i]==$obj3->id_pais1 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj5->id_pais[$i], $obj5->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj5->id_pais[$i], $obj5->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>b) Durante la licenciatura</td>
          <td><input type="text" name="municipio2" size="25" maxlength="50" required="required" value="<?php echo $obj3->municipio2; ?>" /></td>
          <td>
          <select name="id_estado2" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj4->id_estado );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj4->id_estado[$i]==$obj3->id_estado2 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj4->id_estado[$i], $obj4->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj4->id_estado[$i], $obj4->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
          <td>
          <select name="id_pais2" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj5->id_pais );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj5->id_pais[$i]==$obj3->id_pais2 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj5->id_pais[$i], $obj5->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj5->id_pais[$i], $obj5->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>c) Al obtener tu primer trabajo como egresado de posgrado</td>
          <td><input type="text" name="municipio3" size="25" maxlength="50" required="required" value="<?php echo $obj3->municipio3; ?>" /></td>
          <td>
          <select name="id_estado3" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj4->id_estado );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj4->id_estado[$i]==$obj3->id_estado3 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj4->id_estado[$i], $obj4->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj4->id_estado[$i], $obj4->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
          <td>
          <select name="id_pais3" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj5->id_pais );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj5->id_pais[$i]==$obj3->id_pais3 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj5->id_pais[$i], $obj5->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj5->id_pais[$i], $obj5->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>d) Actualmente</td>
          <td><input type="text" name="municipio4" size="25" maxlength="50" required="required" value="<?php echo $obj3->municipio4; ?>" /></td>
          <td>
          <select name="id_estado4" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj4->id_estado );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj4->id_estado[$i]==$obj3->id_estado4 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj4->id_estado[$i], $obj4->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj4->id_estado[$i], $obj4->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
          <td>
          <select name="id_pais4" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj5->id_pais );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj5->id_pais[$i]==$obj3->id_pais4 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj5->id_pais[$i], $obj5->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj5->id_pais[$i], $obj5->nombre[$i] );
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
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">2. ¿Con qui&eacute;n vives actualmente? &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <input type="radio" name="con_quien_vive" value="1" required="required" <?php if( $obj3->con_quien_vive==1 ) { echo "checked='checked'"; } ?> />
          a) Solo
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <input type="radio" name="con_quien_vive" value="2" required="required" <?php if( $obj3->con_quien_vive==2 ) { echo "checked='checked'"; } ?> />
          b) Con tu pareja
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <input type="radio" name="con_quien_vive" value="3" required="required" <?php if( $obj3->con_quien_vive==3 ) { echo "checked='checked'"; } ?> />
          c) En casa de asistencia o compartiendo vivienda con otras personas
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <input type="radio" name="con_quien_vive" value="4" required="required" <?php if( $obj3->con_quien_vive==4 ) { echo "checked='checked'"; } ?> />
          d) Con tus padres
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>
          <input type="radio" name="con_quien_vive" value="5" required="required" <?php if( $obj3->con_quien_vive==5 ) { echo "checked='checked'"; } ?> />
          e) Otro. Especifica
          </td>
          <td colspan="3">
          <input type="text" name="con_quien_vive_otro" size="25" maxlength="20" value="<?php echo $obj3->con_quien_vive_otro; ?>" />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">3. ¿Tienes hijos? &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td>
          <input type="radio" name="tiene_hijos" value="1" required="required" <?php if( $obj3->tiene_hijos==1 ) { echo "checked='checked'"; } ?> />
          a) Si. ¿Cu&aacute;ntos?
          </td>
          <td colspan="3"><input type="number" name="cantidad_hijos" size="25" maxlength="2" min="0" value="<?php echo $obj3->cantidad_hijos; ?>" /></td>
        </tr>
        <tr class="textoTitulos4">
          <td>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; b) Edad del hijo m&aacute;s pequeño
          </td>
          <td colspan="3">
          <input type="number" name="edad_hijo_menor" size="25" maxlength="2" min="0" value="<?php echo $obj3->edad_hijo_menor; ?>" />
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <input type="radio" name="tiene_hijos" value="2" required="required" <?php if( $obj3->tiene_hijos==2 ) { echo "checked='checked'"; } ?> />
          c) No
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">4. ¿N&uacute;mero de dependientes econ&oacute;micos? &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <input type="number" name="dependientes" size="25" maxlength="2" min="0" required="required" value="<?php echo $obj3->dependientes; ?>" />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="4">5. ¿Cu&aacute;l es el nivel de escolaridad de tus padres y de tu pareja actual? &bull;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Nivel de escolaridad</td>
          <td>Padre</td>
          <td>Madre</td>
          <td>Pareja</td>
        </tr>
        <tr class="textoTitulos4">
          <td>Sin estudios formales</td>
          <td>
          <input type="radio" name="escolaridad1" value="1" required="required" <?php if( $obj3->escolaridad1==1 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad2" value="1" required="required" <?php if( $obj3->escolaridad2==1 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad3" value="1" required="required" <?php if( $obj3->escolaridad3==1 ) { echo "checked='checked'"; } ?> />
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>Primaria</td>
          <td>
          <input type="radio" name="escolaridad1" value="2" required="required" <?php if( $obj3->escolaridad1==2 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad2" value="2" required="required" <?php if( $obj3->escolaridad2==2 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad3" value="2" required="required" <?php if( $obj3->escolaridad3==2 ) { echo "checked='checked'"; } ?> />
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>Secundaria</td>
          <td>
          <input type="radio" name="escolaridad1" value="3" required="required" <?php if( $obj3->escolaridad1==3 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad2" value="3" required="required" <?php if( $obj3->escolaridad2==3 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad3" value="3" required="required" <?php if( $obj3->escolaridad3==3 ) { echo "checked='checked'"; } ?> />
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>T&eacute;cnico Superior Universitario</td>
          <td>
          <input type="radio" name="escolaridad1" value="4" required="required" <?php if( $obj3->escolaridad1==4 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad2" value="4" required="required" <?php if( $obj3->escolaridad2==4 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad3" value="4" required="required" <?php if( $obj3->escolaridad3==4 ) { echo "checked='checked'"; } ?> />
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>Bachillerato</td>
          <td>
          <input type="radio" name="escolaridad1" value="5" required="required" <?php if( $obj3->escolaridad1==5 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad2" value="5" required="required" <?php if( $obj3->escolaridad2==5 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad3" value="5" required="required" <?php if( $obj3->escolaridad3==5 ) { echo "checked='checked'"; } ?> />
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>Licenciatura</td>
          <td>
          <input type="radio" name="escolaridad1" value="6" required="required" <?php if( $obj3->escolaridad1==6 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad2" value="6" required="required" <?php if( $obj3->escolaridad2==6 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad3" value="6" required="required" <?php if( $obj3->escolaridad3==6 ) { echo "checked='checked'"; } ?> />
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>Maestr&iacute;a</td>
          <td>
          <input type="radio" name="escolaridad1" value="7" required="required" <?php if( $obj3->escolaridad1==7 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad2" value="7" required="required" <?php if( $obj3->escolaridad2==7 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad3" value="7" required="required" <?php if( $obj3->escolaridad3==7 ) { echo "checked='checked'"; } ?> />
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>Doctorado</td>
          <td>
          <input type="radio" name="escolaridad1" value="8" required="required" <?php if( $obj3->escolaridad1==8 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad2" value="8" required="required" <?php if( $obj3->escolaridad2==8 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad3" value="8" required="required" <?php if( $obj3->escolaridad3==8 ) { echo "checked='checked'"; } ?> />
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>Postdoctorado</td>
          <td>
          <input type="radio" name="escolaridad1" value="9" required="required" <?php if( $obj3->escolaridad1==9 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad2" value="9" required="required" <?php if( $obj3->escolaridad2==9 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad3" value="9" required="required" <?php if( $obj3->escolaridad3==9 ) { echo "checked='checked'"; } ?> />
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td>No aplica</td>
          <td>
          <input type="radio" name="escolaridad1" value="10" required="required" <?php if( $obj3->escolaridad1==10 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad2" value="10" required="required" <?php if( $obj3->escolaridad2==10 ) { echo "checked='checked'"; } ?> />
          </td>
          <td>
          <input type="radio" name="escolaridad3" value="10" required="required" <?php if( $obj3->escolaridad3==10 ) { echo "checked='checked'"; } ?> />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">
          <input type="submit" name="submit" value="Guardar y continuar" />
          <input type="hidden" name="id_alumno" value="<?php echo $obj2->id_alumno; ?>" />
          <input type="hidden" name="id_egresado" value="<?php echo $obj2->id_egresado; ?>" />
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