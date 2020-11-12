<?php
  error_reporting(E_ALL ^ E_NOTICE);
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-docentes.php";
  require_once "modelo-redes-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Docentes( );
  $obj2->id_docente = $_GET["id_docente"];
  $obj2->obtenerDocente( );
  
  $obj3 = new Redes_Docentes( );
  $obj3->id_docente = $obj2->id_docente;
  $obj3->listaRedesDocente( );
  
  if( isset( $_GET["id_red_docente"] ) ) 
  {
    $obj4 = new Redes_Docentes( );
    $obj4->id_red_docente = $_GET["id_red_docente"];
    $obj4->obtenerRed( );
  }
  
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
          <td colspan="4">Redes de docentes</td>
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
        <form id="form1" name="form1" method="post" action="redes-docentes2.php" enctype="multipart/form-data">
        <tr class="textoTablas1">
          <td colspan="4">DATOS DE LA RED</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Nombre de la red &bull;</td>
          <td colspan="3">Categor&iacute;a &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td >
            <input type="text" name="nombre" size="50" required="required" value="<?php echo $obj4->nombre; ?>" />
          </td>
          <td>
            <input type="radio" name="categoria" value="1" required="required" <?php if( $obj4->categoria==1 ) { echo "checked='checked'"; } ?> /> Nacional
          </td>
          <td>
            <input type="radio" name="categoria" value="2" required="required" <?php if( $obj4->categoria==2 ) { echo "checked='checked'"; } ?> /> Internacional
          </td>
          <td align="center">
            <input type="submit" name="submit" value="   Enviar   " />
            <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
            <input type="hidden" name="id_red_docente" value="<?php echo $obj4->id_red_docente; ?>" />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Instituciones participantes en la red </td>
          <td colspan="3">Fecha de inicio</td>
        </tr>
        <tr class="textoTitulos4">
          <td rowspan="4">
            <textarea name="instituciones" cols="60" rows="6" maxlength="250" ><?php echo $obj4->instituciones; ?></textarea>
          </td>
          <td colspan="2">
            <input type="date" name="fecha_inicio" placeholder="aaaa-mm-dd" value="<?php echo $obj4->fecha_inicio; ?>" />
          </td>
          <td align="center"></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="3">Url</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="3">
            <input type="text" name="url" size="50" value="<?php echo $obj4->url; ?>" />
          </td>
        </tr>
        </form>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td>NOMBRE DE LA RED</td>
          <td>FECHA DE INICIO</td>
          <td>CATEGOR&Iacute;A</td>
          <td>ACCIONES</td>
        </tr>
        <?php
	        $max = count( $obj3->id_red_docente );
          
          for( $i=0; $i<$max; $i++ )
          {
	      ?>
        <tr class="textoTablas2">
          <td valign="top"><?php echo $obj3->nombre[$i]; ?>&nbsp;</td>
          <td valign="top"><?php echo $obj3->fecha_inicio[$i]; ?>&nbsp;</td>
          <td valign="top"><?php echo $obj3->categoria_txt[$i]; ?>&nbsp;</td>
          <td valign="top">
            <table border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td>
                  <form id="form2" name="form2" method="get" action="redes-docentes.php">
                    <input type="image" name="submit" src="../images/icon-edit.png" />
                    <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
                    <input type="hidden" name="id_red_docente" value="<?php echo $obj3->id_red_docente[$i]; ?>" />
                  </form>
                </td>
                <td>&nbsp;</td>
                <td>
                  <form id="form3" name="form3" method="post" action="redes-docentes3.php" onclick="return confirmarBaja( )">
                    <input type="image" name="submit" src="../images/icon-delete.png" />
                    <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
                    <input type="hidden" name="id_red_docente" value="<?php echo $obj3->id_red_docente[$i]; ?>" />
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
        <tr class="textoTitulos4">
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="center">
            <form id="form4" name="form4" method="post" action="excel-redes-docentes.php">
              <input type="submit" value=" Exportar Excel " />
              <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
            </form>
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