<?php
  require_once "modelo-usuarios.php";
  require_once "modelo-programas.php";
  require_once "modelo-perfiles.php";
  require_once "modelo-paises.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Programas( );
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->obtenerPrograma( );
  
  $obj3 = new Perfiles( );
  $obj3->listaPerfiles( );
  
  $obj4 = new Paises( );
  $obj4->listaPaises( );
  
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
      <form id="form1" name="form1" method="post" action="alta-usuarios2.php" enctype="multipart/form-data" onsubmit="return verificarContrasena( )">
      <table class="tablaInterior" border="0" cellspacing="4" cellpadding="0" align="center">
        <tr>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
        </tr>
        <tr class="textoTitulos1">
          <td colspan="4">M&oacute;dulo Configuraci&oacute;n</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td colspan="4">Alta de usuarios</td>
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
          <td colspan="4">DATOS GENERALES</td>
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
          <td colspan="4">Perfil &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <select name="id_perfil" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj3->id_perfil );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj3->id_perfil[$i], $obj3->nombre[$i] );
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
          <td>Apellido paterno &bull;</td>
          <td>Apellido materno &bull;</td>
          <td>Nombre(s) &bull;</td>
          <td>Sexo &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="apellido_paterno" size="25" maxlength="50" required="required" /></td>
          <td><input type="text" name="apellido_materno" size="25" maxlength="50" required="required" /></td>
          <td><input type="text" name="nombre" size="25" maxlength="50" required="required" /></td>
          <td>
	  <input type="radio" name="sexo" value="1" required="required" /> Masculino
          <input type="radio" name="sexo" value="2" required="required" /> Femenino
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
          <td><input type="date" name="fecha_nacimiento" placeholder="aaaa-mm-dd" required="required" /></td>
          <td><input type="text" name="lugar_nacimiento" size="25" maxlength="50" required="required" /></td>
          <td>
          <select name="id_pais" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj4->id_pais );
            
            for( $i=0; $i<$max; $i++ )
            {
              printf( "<option value='%d'>%s</option>\n", $obj4->id_pais[$i], $obj4->nombre[$i] );
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
          <td>Contraseña &bull;</td>
          <td>Confirmaci&oacute;n de contraseña &bull;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="codigo" size="25" maxlength="50" required="required" /></td>
          <td><input type="password" name="contrasena" size="25" maxlength="50" required="required" /></td>
          <td><input type="password" name="contrasena2" size="25" maxlength="50" required="required" /></td>
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