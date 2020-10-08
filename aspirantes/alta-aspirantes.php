<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-orientaciones.php";
  require_once "../core/modelo-ciclos.php";
  require_once "../core/modelo-estados.php";
  require_once "../core/modelo-paises.php";
  require_once "../core/modelo-idiomas.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Programas( );
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->obtenerPrograma( );
  
  $obj3 = new Orientaciones( );
  $obj3->id_programa = $obj2->id_programa;
  $obj3->listaOrientacionesPrograma( );
  
  $obj4 = new Ciclos( );
  $obj4->listaCiclos( );
  
  $obj5 = new Estados( );
  $obj5->listaEstados( );
  
  $obj6 = new Paises( );
  $obj6->listaPaises( );
  
  $obj7 = new Idiomas( );
  $obj7->listaIdiomas( );
  
  if( isset( $_GET["error"] ) ) 
  {
    $error = $_GET["error"];
    
    switch( $error )
    {
      case 1: $msg_error = "Tipo de archivo adjuntado no v&aacute;lido."; break;
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
<script type="text/javascript">
function inicializarEstado( )
{
  if( document.forms.form1.id_pais.selectedIndex==117 )
  {
    document.forms.form1.id_estado.disabled = false;
  }
  else
  {
    document.forms.form1.id_estado.disabled = true;
  }  
}


function seleccionarEstado( )
{
  if( document.forms.form1.id_pais.selectedIndex==117 )
  {
    document.forms.form1.id_estado.selectedIndex = 0;
    document.forms.form1.id_estado.disabled = false;
  }
  else
  {
    document.forms.form1.id_estado.selectedIndex = 33;
    document.forms.form1.id_estado.disabled = true;
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
      <form id="form1" name="form1" method="post" action="alta-aspirantes2.php" enctype="multipart/form-data">
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
          <td colspan="4">Alta de aspirantes</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php if( $error!=0 ) { ?>
        <tr>
          <td colspan="4" class="textoRojo"><?php echo $msg_error; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php } ?>
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
          <td colspan="4"><?php echo $obj2->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Orientaci&oacute;n</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2">
          <select name="id_orientacion">
          <option value=''></option>
          <?php
            $max = count( $obj3->id_orientacion );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj3->id_orientacion[$i], $obj3->nombre[$i] );
            }
	  ?>
          </select>
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
          <td>Ciclo escolar &bull;</td>
          <td>&nbsp;</td>
          <td>Modalidad &bull;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td>
          <select name="id_ciclo" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj4->id_ciclo );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj4->id_ciclo[$i], $obj4->nombre[$i] );
            }
	  ?>
          </select>
          </td>
          <td>&nbsp;</td>
          <td><input type="radio" name="modalidad" value="1" required="required" /> Tiempo completo</td>
          <td><input type="radio" name="modalidad" value="2" required="required" /> Tiempo parcial</td>  
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
          <td colspan="2">Fotograf&iacute;a (formato jpg - m&aacute;ximo 5 mb)</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="file" name="archivo" size="25" /></td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Apellido paterno &bull;</td>
          <td>Apellido materno &bull;</td>
          <td>Nombre(s) &bull;</td>
          <td>Fecha de nacimiento &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="apellido_paterno" size="25" maxlength="50" required="required" /></td>
          <td><input type="text" name="apellido_materno" size="25" maxlength="50" required="required" /></td>
          <td><input type="text" name="nombre" size="25" maxlength="50" required="required" /></td>
          <td><input type="date" name="fecha_nacimiento" placeholder="aaaa-mm-dd" required="required" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Sexo &bull;</td>
          <td>CURP &bull;</td>
          <td>RFC &bull;</td>
          <td>Correo electr&oacute;nico personal &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="radio" name="sexo" value="1" required="required" /> Masculino
              <input type="radio" name="sexo" value="2" required="required" /> Femenino</td>
          <td><input type="text" name="curp" size="25" maxlength="20" required="required" /></td>
          <td><input type="text" name="rfc" size="25" maxlength="20" required="required" /></td>
          <td><input type="email" name="correo" size="25" maxlength="50" required="required" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Calle &bull;</td>
          <td>N&uacute;mero &bull;</td>
          <td>Colonia &bull;</td>
          <td>C&oacute;digo Postal &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="calle" size="25" maxlength="50" required="required" /></td>
          <td>
          <input type="text" name="numero_exterior" size="5" maxlength="10" required="required" /> Ext.
          <input type="text" name="numero_interior" size="5" maxlength="10" /> Int.
          </td>
          <td><input type="text" name="colonia" size="25" maxlength="50" required="required" /></td>
          <td><input type="number" name="codigo_postal" size="25" maxlength="5" min="0" required="required" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Municipio &bull;</td>
          <td>Estado &bull;</td>
          <td>Tel&eacute;fono de casa (10 d&iacute;gitos) &bull;</td>
          <td>Tel&eacute;fono celular (10 d&iacute;gitos) &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="municipio" size="25" maxlength="50" required="required" /></td>
          <td>
          <select name="id_estado" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj5->id_estado );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj5->id_estado[$i], $obj5->nombre[$i] );
            }
	  ?>
          </select>
          </td>
          <td><input type="text" name="telefono" size="25" maxlength="20" required="required" /></td>
          <td><input type="text" name="celular" size="25" maxlength="20" required="required" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Lugar de nacimiento &bull;</td>
          <td>Pa&iacute;s de nacimiento &bull;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="lugar_nacimiento" size="25" maxlength="50" required="required" /></td>
          <td>
          <select name="id_pais" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj6->id_pais );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj6->id_pais[$i], $obj6->nombre[$i] );
            }
	  ?>
          </select>
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
          <td colspan="2">&Uacute;ltimo grado de estudios &bull;</td>
          <td colspan="2">T&iacute;tulo del grado acad&eacute;mico &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2">
          <select name="grado_estudios" required="required">
          <option value=''></option>
          <option value='1'>Licenciatura</option>
          <option value='2'>Maestr&iacute;a</option>
          <option value='3'>Doctorado</option>
          </select>
          </td>
          <td colspan="2"><input type="text" name="titulo" size="50" maxlength="50" required="required" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Universidad de procedencia &bull;</td>
          <td colspan="2">Promedio (base 100) &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="universidad" size="50" maxlength="50" required="required" /></td>
          <td colspan="2"><input type="number" name="promedio" size="50" maxlength="10" min="0" required="required" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Año de egreso &bull;</td>
          <td colspan="2">Idiomas que domina</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="anio_egreso" size="25" maxlength="4" required="required" /></td>
          <td colspan="2">
          <select name="id_idioma1">
          <option value=''></option>
          <?php
            $max = count( $obj7->id_idioma );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj7->id_idioma[$i], $obj7->nombre[$i] );
            }
	  ?>
          </select>
          <select name="nivel_idioma1">
          <option value=''></option>
          <option value='1'>B&aacute;sico</option>
          <option value='2'>Intermedio</option>
          <option value='3'>Avanzado</option>
          </select>
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2">&nbsp;</td>
          <td colspan="2">
          <select name="id_idioma2">
          <option value=''></option>
          <?php
            $max = count( $obj7->id_idioma );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj7->id_idioma[$i], $obj7->nombre[$i] );
            }
	  ?>
          </select>
          <select name="nivel_idioma2">
          <option value=''></option>
          <option value='1'>B&aacute;sico</option>
          <option value='2'>Intermedio</option>
          <option value='3'>Avanzado</option>
          </select>
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2">&nbsp;</td>
          <td colspan="2">
          <select name="id_idioma3">
          <option value=''></option>
          <?php
            $max = count( $obj7->id_idioma );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj7->id_idioma[$i], $obj7->nombre[$i] );
            }
	  ?>
          </select>
          <select name="nivel_idioma3">
          <option value=''></option>
          <option value='1'>B&aacute;sico</option>
          <option value='2'>Intermedio</option>
          <option value='3'>Avanzado</option>
          </select>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="4">DATOS LABORALES</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>¿Trabaja actualmente? &bull;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="radio" name="trabajo" value="1" required="required" /> Si
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="trabajo" value="2" required="required" /> No</td>
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
          <td colspan="2">Ocupación</td>
          <td colspan="2">Nombre de la empresa</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="ocupacion" size="50" maxlength="50" /></td>
          <td colspan="2"><input type="text" name="empresa" size="50" maxlength="50" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Domicilio de trabajo (calle, n&uacute;mero exterior y n&uacute;mero interior)</td>
          <td>Municipio</td>
          <td>Estado</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="domicilio_trabajo" size="50" maxlength="50" /></td>
          <td><input type="text" name="municipio_trabajo" size="25" maxlength="50" /></td>
          <td>
          <select name="id_estado_trabajo">
          <option value=''></option>
          <?php
            $max = count( $obj5->id_estado );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj5->id_estado[$i], $obj5->nombre[$i] );
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
          <td colspan="2">Tel&eacute;fono de trabajo (con extensi&oacute;n)</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="telefono_trabajo" size="25" maxlength="20" /></td>
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
          <td colspan="4"><input type="submit" name="submit" value="   Enviar   " /></td>
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