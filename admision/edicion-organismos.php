<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-estados.php";
  require_once "../core/modelo-paises.php";
  require_once "modelo-organismos.php";

  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );

  $obj2 = new Organismos( );
  $obj2->id_organismo = $_GET["id_organismo"];
  $obj2->obtenerOrganismo( );
  
  $obj3 = new Programas( );
  $obj3->id_programa = $obj2->id_programa;
  $obj3->obtenerPrograma( );

  $obj4 = new Estados( );
  $obj4->listaEstados( );
  
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
      <form id="form1" name="form1" method="post" action="edicion-organismos2.php" enctype="multipart/form-data">
      <table class="tablaInterior" border="0" cellspacing="4" cellpadding="0" align="center">
        <tr>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
        </tr>
        <tr class="textoTitulos1">
          <td colspan="4">M&oacute;dulo Admisi&oacute;n</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td colspan="4">Edición de organismos nacionales e internacionales para la difusi&oacute;n de la convocatoria</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <!-- <?php if( $error!=0 ) { ?>
        <tr>
          <td colspan="4" class="textoRojo"><?php echo $msg_error; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <?php } ?> -->
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
          <td colspan="2">Nombre del organismo &bull;</td>
          <td colspan="2">Titular del organismo &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="nombre" size="50" maxlength="50" value="<?php echo $obj2->nombre; ?>" required="required" /></td>
          <td colspan="2"><input type="text" name="titular" size="50" maxlength="50" value="<?php echo $obj2->titular; ?>" required="required" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Ciudad &bull;</td>
          <td>Estado &bull;</td>
          <td>Pa&iacute;s &bull;</td>
          <td>Correo Electr&oacute;nico</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="ciudad" size="25" maxlength="50" value="<?php echo $obj2->ciudad; ?>" required="required" /></td>
          <td>
            <select name="id_estado" required="required">
              <option value=''></option>
              <?php
                $max = count( $obj4->id_estado );
                
                for( $i=0; $i<$max; $i++ )
                {
                  if( $obj4->id_estado[$i]==$obj2->id_estado )
                  {
                          printf( "<option value='%d' selected='selected'>%s</option>\n", $obj4->id_estado[$i], $obj4->nombre[$i] );
                  }
                  else
                  {
                          printf( "<option value='%d'>%s</option>\n", $obj4->id_estado[$i], $obj4->nombre[$i] );
                  }
                }
              ?>
            </select>
          </td>
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
          <td><input type="email" name="correo" size="25" maxlength="20" value="<?php echo $obj2->correo; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Tel&eacute;fono (10 d&iacute;gitos)</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="telefono" size="25" maxlength="20" value="<?php echo $obj2->telefono; ?>" /></td>
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
        <tr>
          <td colspan="4"><input type="submit" name="submit" value="   Enviar   " />
            <input type="hidden" name="id_organismo" value="<?php echo $obj2->id_organismo; ?>" />
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