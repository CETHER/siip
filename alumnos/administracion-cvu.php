<?php
  //<iframe src="administracion-cvu.php?id-docente=$obj2->id_docente" height="500px" width="100%" frameborder="0"></iframe>
  
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-cvu.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new CVU( );
  $obj2->id_docente = $_GET["id_docente"];
  $obj2->listaCVUDocente( );
  
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
<link href="../css/iframe.css" rel="stylesheet" type="text/css">
</head>

<body>
<form id="form1" name="form1" method="post" action="#" enctype="multipart/form-data">
<table width="100%" border="0" cellspacing="4" cellpadding="0" align="center">
  <tr>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
    <td width="25%">&nbsp;</td>
  </tr>
  <tr class="textoTitulos3">
    <td colspan="2">Descripción &bull;</td>
    <td colspan="2">Fecha &bull;</td>
  </tr>
  <tr class="textoTitulos4">
    <td colspan="2" rowspan="4"><textarea cols="50" rows="6" maxlength="250" required="required"></textarea></td>
    <td><input type="date" name="fecha" placeholder="aaaa-mm-dd" required="required" /></td>
    <td align="center"><input type="submit" name="submit" value="   Enviar   " /></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="textoTitulos3">
    <td>Documento &bull;</td>
    <td>&nbsp;</td>
  </tr>
  <tr class="textoTitulos4">
    <td colspan="2"><input type="file" name="archivo" size="25" required="required" /></td>
  </tr>
</table>
</form>
</body>
</html>