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
  $obj3->listaPaises( );
  
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
      <form id="form1" name="form1" method="post" action="edicion-docentes2.php" enctype="multipart/form-data" onsubmit="return verificarContrasena( )">
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
          <td colspan="4">Edici&oacute;n de docentes</td>
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
          <td>
          <input type="text" name="apellido_paterno" size="25" maxlength="50" required="required" value="<?php echo $obj2->apellido_paterno; ?>" />
          </td>
          <td>
          <input type="text" name="apellido_materno" size="25" maxlength="50" required="required" value="<?php echo $obj2->apellido_materno; ?>" />
          </td>
          <td>
          <input type="text" name="nombre" size="25" maxlength="50" required="required" value="<?php echo $obj2->nombre; ?>" /></td>
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
          <td>
          <input type="date" name="fecha_nacimiento" placeholder="aaaa-mm-dd" required="required" value="<?php echo $obj2->fecha_nacimiento; ?>" />
          </td>
          <td>
          <input type="text" name="lugar_nacimiento" size="25" maxlength="50" required="required" value="<?php echo $obj2->lugar_nacimiento; ?>" />
          </td>
          <td>
          <select name="id_pais" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj3->id_pais );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj3->id_pais[$i]==$obj2->id_pais )
              {
                      printf( "<option value='%d' selected='selected'>%s</option>\n", $obj3->id_pais[$i], $obj3->nombre[$i] );
              }
              else
              {
                      printf( "<option value='%d'>%s</option>\n", $obj3->id_pais[$i], $obj3->nombre[$i] );
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
          <td><input type="radio" name="modalidad" value="1" required="required" <?php if( $obj2->modalidad==1 ) { echo "checked='checked'"; } ?> /> Tiempo Completo</td>
          <td><input type="radio" name="modalidad" value="2" required="required" <?php if( $obj2->modalidad==2 ) { echo "checked='checked'"; } ?> /> Tiempo Parcial</td>
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
          <td colspan="2"><input type="text" name="institucion" size="50" maxlength="50" required="required" value="<?php echo $obj2->institucion; ?>" /></td>
          <td>
          <select name="escolaridad" required="required">
            <option value=''></option>
            <option value='1' <?php if( $obj2->escolaridad==1 ) { echo "selected='selected'"; } ?>>Licenciatura</option>
            <option value='2' <?php if( $obj2->escolaridad==2 ) { echo "selected='selected'"; } ?>>Especialidad</option>
            <option value='3' <?php if( $obj2->escolaridad==3 ) { echo "selected='selected'"; } ?>>Maestr&iacute;a</option>
            <option value='4' <?php if( $obj2->escolaridad==4 ) { echo "selected='selected'"; } ?>>Doctorado</option>
            <option value='5' <?php if( $obj2->escolaridad==5 ) { echo "selected='selected'"; } ?>>Postdoctorado</option>
          </select>
          </td>
          <td><input type="date" name="fecha_titulacion" placeholder="aaaa-mm-dd" value="<?php echo $obj2->fecha_titulacion; ?>" /></td>
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
          <td><input type="text" name="numero_cvu" size="25" maxlength="50" value="<?php echo $obj2->numero_cvu; ?>" /></td>
          <td>
            <input type="radio" name="miembro_sni" value="1" required="required" <?php if( $obj2->miembro_sni==1 ) { echo "checked='checked'"; } ?> /> Si &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="miembro_sni" value="2" required="required" <?php if( $obj2->miembro_sni==2 ) { echo "checked='checked'"; } ?> /> No
          </td>
          <td>
          <select name="nivel_sni" >
            <option value=''></option>
            <option value='1' <?php if( $obj2->nivel_sni==1 ) { echo "selected='selected'"; } ?>>Candidato</option>
            <option value='2' <?php if( $obj2->nivel_sni==2 ) { echo "selected='selected'"; } ?>>Nivel I</option>
            <option value='3' <?php if( $obj2->nivel_sni==3 ) { echo "selected='selected'"; } ?>>Nivel II</option>
            <option value='4' <?php if( $obj2->nivel_sni==4 ) { echo "selected='selected'"; } ?>>Nivel III</option>
            <option value='5' <?php if( $obj2->nivel_sni==5 ) { echo "selected='selected'"; } ?>>Em&eacute;rito</option>
          </select>
          </td>
          <td>
            <input type="radio" name="perfil_prodep" value="1" required="required" <?php if( $obj2->perfil_prodep==1 ) { echo "checked='checked'"; } ?> /> Si &nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" name="perfil_prodep" value="2" required="required" <?php if( $obj2->perfil_prodep==2 ) { echo "checked='checked'"; } ?> /> No
          </td>
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
          <td colspan="2"><input type="text" name="lgac" size="50" maxlength="50" value="<?php echo $obj2->lgac; ?>" /></td>
          <td colspan="2">
          <select name="cuerpo_academico" >
            <option value=''></option>
            <option value='1' <?php if( $obj2->cuerpo_academico==1 ) { echo "selected='selected'"; } ?>>Licenciatura Licenciatura</option>
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
          <td colspan="4">Nombre de los proyectos de investigaci&oacute;n que desarrolla </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4" valign="top"><textarea name="proyectos" cols="102" rows="10" required="required"><?php echo $obj2->proyectos; ?></textarea></td>
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