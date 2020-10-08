<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-docentes.php";
  require_once "modelo-cvu.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Docentes( );
  $obj2->id_docente = $_GET["id_docente"];
  $obj2->obtenerDocente( );
  
  $obj3 = new CVU( );
  $obj3->id_docente = $obj2->id_docente;
  $obj3->listaCVUDocente( );
  
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
      <table class="tablaInterior" border="0" cellspacing="4" cellpadding="0" align="center">
        <tr>
          <td width="50%">&nbsp;</td>
          <td width="20%">&nbsp;</td>
          <td width="20%">&nbsp;</td>
          <td width="10%">&nbsp;</td>
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
          <td colspan="4">Expediente CVU</td>
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
          <td colspan="4">Nombre:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <a href="consulta-docentes.php?id_docente=<?php echo $obj2->id_docente; ?>" class="textoTitulos4" target="_blank">
	  <?php echo $obj2->apellido_paterno." ".$obj2->apellido_materno." ".$obj2->nombre; ?>
          </a>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <form id="form1" name="form1" method="post" action="expediente-cvu2.php" enctype="multipart/form-data">
        <tr class="textoTablas1">
          <td colspan="4">DATOS CVU</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Descripción &bull;</td>
          <td colspan="3">Fecha &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td rowspan="4"><textarea name="descripcion" cols="60" rows="6" maxlength="250" required="required"></textarea></td>
          <td colspan="2"><input type="date" name="fecha" placeholder="aaaa-mm-dd" required="required" /></td>
          <td align="center">
          <input type="submit" name="submit" value="   Enviar   " />
          <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="3">Documento</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="3"><input type="file" name="archivo" size="25" /></td>
        </tr>
        </form>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td>DESCRIPCI&Oacute;N</td>
          <td>FECHA</td>
          <td>DOCUMENTO</td>
          <td>ACCIONES</td>
        </tr>
        <?php
	  $max = count( $obj3->id_cvu );
          
          for( $i=0; $i<$max; $i++ )
          {
	?>
        <tr class="textoTablas2">
          <td valign="top"><?php echo nl2br( $obj3->descripcion[$i] ); ?>&nbsp;</td>
          <td valign="top"><?php echo $obj3->fecha[$i]; ?>&nbsp;</td>
          <td valign="top">
          <?php
            if( $obj3->archivo[$i]!=null )
            {
              printf( "<a href='../uploads/%s' class='textoTitulos4' target='_blank'>%s</a>", $obj3->archivo[$i], $obj3->archivo[$i] );
	    }
	  ?>
          </td>
          <td valign="top">
            <table border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td>
                <form id="form2" name="form2" method="get" action="expediente-cvu.php">
                <input type="image" name="submit" src="../images/icon-edit.png" />
                <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
                <input type="hidden" name="id_cvu" value="<?php echo $obj3->id_cvu[$i]; ?>" />
                </form>
                </td>
                <td>&nbsp;</td>
                <td>
                <form id="form3" name="form3" method="post" action="expediente-cvu3.php" onclick="return confirmarBaja( )">
                <input type="image" name="submit" src="../images/icon-delete.png" />
                <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
                <input type="hidden" name="id_cvu" value="<?php echo $obj3->id_cvu[$i]; ?>" />
                </form>
                </td>
              </tr>
            </table>
          </td>
        </tr>
        <?php
	  }
	?>
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