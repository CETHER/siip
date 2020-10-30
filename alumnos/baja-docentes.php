<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-paises.php";
  require_once "modelo-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Docentes( );
  $obj2->id_docente = $_GET["id_docente"];
  $obj2->obtenerDocente( );
  
  $obj3 = new Paises( );
  $obj3->id_pais = $obj2->id_pais;
  $obj3->obtenerPais( );
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema Integral de Informaci&oacute;n de Posgrados</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/menu.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function confirmarBaja( )
{
  if( confirm( "¿Desea eliminar el registro seleccionado?" ) )
  {
    return true;
  }
  else
  {
    return false;
  }
}
</script>
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
      <form id="form1" name="form1" method="post" action="baja-docentes2.php" onsubmit="return confirmarBaja( )">
      <table class="tablaInterior" border="0" cellspacing="4" cellpadding="0" align="center">
        <tr>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
        </tr>
        <tr class="textoTitulos1">
          <td colspan="4">M&oacute;dulo Alumnos</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td colspan="4">Baja de docentes</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <!-- DATOS GENERALES DE DOCENTE -->
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
          <td colspan="2">Fotograf&iacute;a:</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2" valign="top">
          <?php
            if( $obj2->fotografia!=null )
            {
              printf( "<a href='../uploads/%s' target='_blank'><img src='../uploads/%s' height='100' /></a>", $obj2->fotografia, $obj2->fotografia );
	    }
	  ?>
          &nbsp;
          </td>
          <td colspan="2" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Apellido paterno:</td>
          <td>Apellido materno:</td>
          <td>Nombre(s):</td>
          <td>Sexo:</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->apellido_paterno; ?>&nbsp;</td>
          <td><?php echo $obj2->apellido_materno; ?>&nbsp;</td>
          <td><?php echo $obj2->nombre; ?>&nbsp;</td>
          <td><?php echo $obj2->sexo_txt; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Fecha de nacimiento:</td>
          <td>Lugar de nacimiento:</td>
          <td>Pa&iacute;s de nacimiento:</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->fecha_nacimiento; ?>&nbsp;</td>
          <td><?php echo $obj2->lugar_nacimiento; ?>&nbsp;</td>
          <td><?php echo $obj3->nombre; ?>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <!-- DATOS ACADÉMICOS DE DOCENTE -->
        <tr class="textoTablas1">
          <td colspan="4">DATOS ACAD&Eacute;MICOS</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Modalidad &bull;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->modalidad; ?>&nbsp;</td>
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

        <tr class="textoTitulos3">
          <td colspan="2">Instituci&oacute;n en donde obtuvo el &uacute;ltimo grado de estudios &bull;</td>
          <td>&Uacute;ltimo grado de estudios &bull;</td>
          <td>Fecha de obtenci&oacute;n del &uacute;ltimo grado </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj2->institucion; ?>&nbsp;</td>
          <td><?php echo $obj2->escolaridad; ?>&nbsp;</td>
          <td><?php echo $obj2->fecha_titulacion; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr class="textoTitulos3">
          <td>N&uacute;mero de CVU </td>
          <td>Miembre del S.N.I. </td>
          <td>Nivel del S.N.I.</td>
          <td>Perfil PRODEP </td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->numero_cvu; ?>&nbsp;</td>
          <td><?php echo $obj2->miembro_sni; ?>&nbsp;</td>
          <td><?php echo $obj2->nivel_sni; ?>&nbsp;</td>
          <td><?php echo $obj2->perfil_prodep; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr class="textoTitulos3">
          <td colspan="2">L&iacute;nea de Generaci&oacute;n y Aplicaci&oacute;n del Conocimiento (LGAC) </td>
          <td colspan="2">Cuerpo acad&eacute;mico al que pertenece </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj2->lgac; ?>&nbsp;</td>
          <td colspan="2"><?php echo $obj2->cuerpo_academico; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <tr class="textoTitulos3">
          <td colspan="4">Nombre de los proyectos de investigaci&oacute;n que desarrolla </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4" valign="top"><textarea name="proyectos" cols="102" rows="10" required="required" ><?php echo $obj2->proyectos; ?>&nbsp;</textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>

        <!-- DATOS DE INGRESO DE SESIÓN DE DOCENTE -->
        <tr class="textoTablas1">
          <td colspan="4">DATOS DE INGRESO</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>C&oacute;digo:</td>
          <td>Contraseña:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->codigo; ?>&nbsp;</td>
          <td>&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">
          <input type="submit" name="submit" value="   Eliminar   " />
          <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
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