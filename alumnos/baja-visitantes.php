<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "modelo-visitantes.php";
  require_once "../core/modelo-paises.php";
  require_once "../core/modelo-estados.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Visitantes( );
  $obj2->id_visitante = $_GET["id_visitante"];
  $obj2->obtenerVisitante( );
  
  $obj3 = new Programas( );
  $obj3->id_programa = $obj2->id_programa;
  $obj3->obtenerPrograma( );

  $obj4 = new Paises( );
  $obj4->id_pais = $obj2->id_pais;
  $obj4->obtenerPais( );
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Integral de Informaci&oacute;n de Posgrados</title>
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
      <form id="form1" name="form1" method="post" action="baja-visitantes2.php" onsubmit="return confirmarBaja( )">
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
          <td colspan="4">Baja de profesores visitantes</td>
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
          <td colspan="2">Nombre del profesor</td>
          <td colspan="2">Instituci&oacute;n de procedencia</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj2->nombre; ?>&nbsp;</td>
          <td colspan="2"><?php echo $obj2->institucion; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Nombre del evento </td>
          <td>Pa&iacute;s </td>
          <td>Fecha de inicio </td>
          <td>Fecha de t&eacute;rmino </td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->evento; ?>&nbsp;</td>
          <td><?php echo $obj4->nombre; ?>&nbsp;</td>
          <td><?php echo $obj2->fecha_inicio; ?>&nbsp;</td>
          <td><?php echo $obj2->fecha_termino; ?>&nbsp;</td>
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
          <input type="hidden" name="id_visitante" value="<?php echo $obj2->id_visitante; ?>" />
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
</body>
</html>