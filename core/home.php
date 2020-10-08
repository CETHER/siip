<?php
  require_once "modelo-usuarios.php";
  require_once "modelo-programas.php";
  require_once "modelo-perfiles.php";
  
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
  $obj3->id_perfil = $_SESSION["id_perfil"];
  $obj3->obtenerPerfil( );
  
  $obj4 = new Usuarios( );
  $obj4->id_usuario = $_SESSION["id_usuario"];
  $obj4->obtenerUsuario( );
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
      <?php require_once "header.php"; ?>
    </td>
  </tr>
  <tr>
    <td>
      <?php require_once "menu.php"; ?>
    </td>
  </tr>
  <tr height="100%" valign="top">
    <td>
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
          <td>Informaci&oacute;n de sesi&oacute;n</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Programa:</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->nombre; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Perfil:</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj3->nombre; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Nombre:</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo "$obj4->apellido_paterno $obj4->apellido_materno $obj4->nombre"; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td>
      <?php require_once "footer.php"; ?>
    </td>
  </tr>
</table>
</body>
</html>