<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-estados.php";
  require_once "../core/modelo-paises.php";
  require_once "modelo-visitantes.php";

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
  
  $obj5 = new Paises( );
  $obj5->listaPaises( );
  

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
      <form id="form1" name="form1" method="post" action="edicion-visitantes2.php" enctype="multipart/form-data">
      <table class="tablaInterior" border="0" cellspacing="4" cellpadding="0" align="center">
        <tr>
          <td width="23%">&nbsp;</td>
          <td width="27%">&nbsp;</td>
          <td width="23%">&nbsp;</td>
          <td width="27%">&nbsp;</td>
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
          <td colspan="4">Edici&oacute;n de profesores visitantes</td>
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
          <td colspan="2">Nombre del profesor &bull;</td>
          <td colspan="2">Instituci&oacute;n de procedencia &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="nombre" size="50" maxlength="50" value="<?php echo $obj2->nombre; ?>" required="required" /></td>
          <td colspan="2"><input type="text" name="institucion" size="50" maxlength="50" value="<?php echo $obj2->institucion; ?>" required="required" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Nombre del evento &bull;</td>
          <td>Pa&iacute;s &bull;</td>
          <td>Fecha de inicio &bull;</td>
          <td>Fecha de t&eacute;rmino &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="evento" size="25" maxlength="50" value="<?php echo $obj2->evento; ?>" required="required" /></td>
          <td>
            <select name="id_pais" required="required">
              <option value=''></option>
              <?php
                $max = count( $obj5->id_pais );
                
                for( $i=0; $i<$max; $i++ )
                {
                  if( $obj5->id_pais[$i]==$obj2->id_pais )
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
          <td><input type="date" name="fecha_inicio" placeholder="aaaa-mm-dd" value="<?php echo $obj2->fecha_inicio; ?>" /></td>
          <td><input type="date" name="fecha_termino" placeholder="aaaa-mm-dd" value="<?php echo $obj2->fecha_termino; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4"><input type="submit" name="submit" value="   Enviar   " />
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
</body>
</html>