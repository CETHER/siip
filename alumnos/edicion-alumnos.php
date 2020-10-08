<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-orientaciones.php";
  require_once "../core/modelo-ciclos.php";
  require_once "../core/modelo-estados.php";
  require_once "../core/modelo-paises.php";
  require_once "modelo-alumnos.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Alumnos( );
  $obj2->id_alumno = $_GET["id_alumno"];
  $obj2->obtenerAlumno( );
  
  $obj3 = new Programas( );
  $obj3->id_programa = $obj2->id_programa;
  $obj3->obtenerPrograma( );
  
  $obj4 = new Orientaciones( );
  $obj4->id_programa = $obj2->id_programa;
  $obj4->listaOrientacionesPrograma( );
  
  $obj5 = new Ciclos( );
  $obj5->id_ciclo = $obj2->id_ciclo;
  $obj5->obtenerCiclo( );
  
  $obj6 = new Estados( );
  $obj6->listaEstados( );
  
  $obj7 = new Paises( );
  $obj7->listaPaises( );
  
  if( isset( $_GET["error"] ) ) 
  {
    $error = $_GET["error"];
    
    switch( $error )
    {
      case 1: $msg_error = "Tipo de archivo adjuntado no v&aacute;lido."; break;
      case 2: $msg_error = "El c&oacute;digo ya se encuentra registrado."; break;
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
function verificarContrasena( )
{
  if( document.forms.form1.contrasena.value==document.forms.form1.contrasena2.value )
  {
    return true;
  }
  else
  {
    confirm( "La confirmación de contraseña es incorrecta." )
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
      <form id="form1" name="form1" method="post" action="edicion-alumnos2.php" enctype="multipart/form-data" onsubmit="return verificarContrasena( )">
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
          <td colspan="4">Edici&oacute;n de alumnos</td>
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
          <td colspan="4"><?php echo $obj3->nombre; ?>&nbsp;</td>
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
            $max = count( $obj4->id_orientacion );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj4->id_orientacion[$i]==$obj2->id_orientacion )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj4->id_orientacion[$i], $obj4->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj4->id_orientacion[$i], $obj4->nombre[$i] );
	      }
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
          <td>Ciclo escolar:</td>
          <td>&nbsp;</td>
          <td>Modalidad &bull;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj5->nombre; ?></td>
          <td>&nbsp;</td>
          <td>
          <input type="radio" name="modalidad" value="1" required="required" <?php if( $obj2->modalidad==1 ) { echo "checked='checked'"; } ?> />
          Tiempo completo
          </td>
          <td>
          <input type="radio" name="modalidad" value="2" required="required" <?php if( $obj2->modalidad==2 ) { echo "checked='checked'"; } ?> />
          Tiempo parcial
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
          <td colspan="2">Fotograf&iacute;a (formato jpg - m&aacute;ximo 5 mb)</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="file" name="archivo" size="25" /></td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <?php
            if( $obj2->fotografia!=null )
            {
              printf( "<a href='../uploads/%s' target='_blank'><img src='../uploads/%s' height='100' /></a>", $obj2->fotografia, $obj2->fotografia );
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
        <tr class="textoTitulos3">
          <td>Apellido paterno &bull;</td>
          <td>Apellido materno &bull;</td>
          <td>Nombre(s) &bull;</td>
          <td>Sexo &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="apellido_paterno" size="25" maxlength="50" required="required" value="<?php echo $obj2->apellido_paterno; ?>" />
          </td>
          <td><input type="text" name="apellido_materno" size="25" maxlength="50" required="required" value="<?php echo $obj2->apellido_materno; ?>" />
          </td>
          <td><input type="text" name="nombre" size="25" maxlength="50" required="required" value="<?php echo $obj2->nombre; ?>" /></td>
          <td>
	  <input type="radio" name="sexo" value="1" required="required" <?php if( $obj2->sexo==1 ) { echo "checked='checked'"; } ?> /> Masculino
          <input type="radio" name="sexo" value="2" required="required" <?php if( $obj2->sexo==2 ) { echo "checked='checked'"; } ?> /> Femenino
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Fecha de nacimiento &bull;</td>
          <td>Lugar de nacimiento &bull;</td>
          <td>Pa&iacute;s de nacimiento &bull;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="date" name="fecha_nacimiento" placeholder="aaaa-mm-dd" required="required" value="<?php echo $obj2->fecha_nacimiento; ?>" />
          </td>
          <td><input type="text" name="lugar_nacimiento" size="25" maxlength="50" required="required" value="<?php echo $obj2->lugar_nacimiento; ?>" />
          </td>
          <td>
          <select name="id_pais" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj7->id_pais );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj7->id_pais[$i]==$obj2->id_pais )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj7->id_pais[$i], $obj7->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj7->id_pais[$i], $obj7->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
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
          <td>C&oacute;digo &bull;</td>
          <td>Contraseña</td>
          <td>Confirmaci&oacute;n de contraseña</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="codigo" size="25" maxlength="50" required="required" value="<?php echo $obj2->codigo; ?>" /></td>
          <td><input type="password" name="contrasena" size="25" maxlength="50" /></td>
          <td><input type="password" name="contrasena2" size="25" maxlength="50" /></td>
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
          <input type="submit" name="submit" value="   Enviar   " />
          <input type="hidden" name="id_alumno" value="<?php echo $obj2->id_alumno; ?>" />
          <input type="hidden" name="id_aspirante" value="<?php echo $obj2->id_aspirante; ?>" />
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