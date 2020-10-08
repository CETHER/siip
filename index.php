<?php
  require_once "core/configuracion.php";
  
  if( isset( $_GET["error"] ) ) 
  {
    $error = $_GET["error"];
    
    switch( $error )
    {
      case 1: $msg_error = "Usuario o contrase&ntilde;a incorrectos."; break;
      case 2: $msg_error = "Usuario bloqueado. Contacte al administrador del sistema."; break;
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
<link href="css/general.css" rel="stylesheet" type="text/css">
</head>

<body>
<table class="tablaExterior" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td>
      <?php require_once "core/header.php"; ?>
    </td>
  </tr>
  <tr height="100%" valign="top">
    <td>
      <form id="form1" name="form1" method="post" action="core/login.php">
      <table class="tablaInterior" border="0" cellspacing="4" cellpadding="0" align="center">
        <tr>
          <td width="100%">&nbsp;</td>
        </tr>
        <tr class="textoTitulos1">
          <td>Sistema Integral de Informaci&oacute;n de Posgrados</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td>Inicio de sesi&oacute;n</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <?php if( $error!=0 ) { ?>
        <tr>
          <td class="textoRojo"><?php echo $msg_error; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <?php } ?>
        <tr class="textoTitulos3">
          <td>C&oacute;digo &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="codigo" size="40" maxlength="50" required="required" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Contraseña &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="password" name="contrasena" size="40" maxlength="50" required="required" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td><input type="submit" name="submit" value="   Enviar   " /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
      </form>
    </td>
  </tr>
  <tr>
    <td>
      <?php require_once "core/footer.php"; ?>
    </td>
  </tr>
</table>
</body>
</html>