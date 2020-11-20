<?php
  error_reporting(E_ALL ^ E_NOTICE);
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-paises.php";
  require_once "modelo-docentes.php";
  require_once "modelo-capitulos-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Docentes( );
  $obj2->id_docente = $_GET["id_docente"];
  $obj2->obtenerDocente( );
  
  $obj3 = new Capitulos_Docentes( );
  $obj3->id_docente = $obj2->id_docente;
  $obj3->listaCapitulosDocente( );
  
  if( isset( $_GET["id_capitulo_docente"] ) ) 
  {
    $obj4 = new Capitulos_Docentes( );
    $obj4->id_capitulo_docente = $_GET["id_capitulo_docente"];
    $obj4->obtenerCapitulo( );
  }
  
  $obj6 = new Paises( );
  $obj6->listaPaises( );
  
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
          <td width="40%">&nbsp;</td>
          <td width="30%">&nbsp;</td>
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
          <td colspan="4">Art&iacute;culos de docentes</td>
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
        <form id="form1" name="form1" method="post" action="capitulos-docentes2.php" enctype="multipart/form-data">
        <tr class="textoTablas1">
          <td colspan="4">DATOS DEL CAP&Iacute;TULO</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">T&iacute;tulo del cap&iacute;tulo &bull;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2">
            <input type="text" name="titulo" size="70" required="required" value="<?php echo $obj4->titulo; ?>" />
          </td>
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
          <td colspan="1">T&iacute;tulo del libro &bull;</td>
          <td colspan="3">Autor &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="1">
            <input type="text" name="libro" size="40" required="required" value="<?php echo $obj4->libro; ?>" />
          </td>
          <td colspan="3">
            <input type="text" name="autor" size="40" required="required" value="<?php echo $obj4->autor; ?>" />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Editorial &bull;</td>
          <td>Pa&iacute;s &bull;</td>
          <td colspan="2">Año &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td>
            <input type="text" name="editorial" size="40" required="required" value="<?php echo $obj4->editorial; ?>" />
          </td>
          <td>
            <select name="id_pais" required="required">
              <option value=''></option>
              <?php
              $max = count( $obj6->id_pais );
              
              for( $i=0; $i<$max; $i++ ) {
                if( $obj6->id_pais[$i]==$obj4->id_pais ) {
                      printf( "<option value='%d' selected='selected'>%s</option>\n", $obj6->id_pais[$i], $obj6->nombre[$i] );
                
                } else {
                      printf( "<option value='%d'>%s</option>\n", $obj6->id_pais[$i], $obj6->nombre[$i] );
                }
              }
              ?>
            </select>
          </td>
          <td colspan="2">
            <input type="number" name="anio" min="1900" max="2050" required="required" value="<?php echo $obj4->anio; ?>" />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td >LGAC </td>
          <td>ISBN &bull;</td>
          <td colspan="2">Colaboraci&oacute;n </td>
        </tr>
        <tr class="textoTitulos4">
          <td>
            <input type="text" name="lgac" size="40" value="<?php echo $obj4->lgac; ?>" />
          </td>
          <td>
            <input type="text" name="isbn" size="30" required="required" value="<?php echo $obj4->isbn; ?>" />
          </td>
          <td colspan="2">
            <select name="colaboracion" >
              <option value=''></option>
              <option value='1' <?php if( $obj4->colaboracion==1 ) { echo "selected='selected'"; } ?>>Con profesores</option>
              <option value='2' <?php if( $obj4->colaboracion==2 ) { echo "selected='selected'"; } ?>>Con estudiantes</option>
              <option value='3' <?php if( $obj4->colaboracion==3 ) { echo "selected='selected'"; } ?>>Con profesores y estudiantes</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>
            <input type="submit" name="submit" value="   Enviar   " />
            <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
            <input type="hidden" name="id_capitulo_docente" value="<?php echo $obj4->id_capitulo_docente; ?>" />
          </td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        </form>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr><tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td>T&Iacute;TULO DEL CAP&Iacute;TULO</td>
          <td>EDITORIAL</td>
          <td>AÑO</td>
          <td>ACCIONES</td>
        </tr>
        <?php
	        $max = count( $obj3->id_capitulo_docente );
          
          for( $i=0; $i<$max; $i++ )
          {
	      ?>
        <tr class="textoTablas2">
          <td valign="top"><?php echo $obj3->titulo[$i]; ?>&nbsp;</td>
          <td valign="top"><?php echo $obj3->editorial[$i]; ?>&nbsp;</td>
          <td valign="top"><?php echo $obj3->anio[$i]; ?>&nbsp;</td>
          <td valign="top">
            <table border="0" cellspacing="0" cellpadding="0" align="center">
              <tr>
                <td>
                  <form id="form2" name="form2" method="get" action="capitulos-docentes.php">
                    <input type="image" name="submit" src="../images/icon-edit.png" />
                    <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
                    <input type="hidden" name="id_capitulo_docente" value="<?php echo $obj3->id_capitulo_docente[$i]; ?>" />
                  </form>
                </td>
                <td>&nbsp;</td>
                <td>
                  <form id="form3" name="form3" method="post" action="capitulos-docentes3.php" onclick="return confirmarBaja( )">
                    <input type="image" name="submit" src="../images/icon-delete.png" />
                    <input type="hidden" name="id_docente" value="<?php echo $obj2->id_docente; ?>" />
                    <input type="hidden" name="id_capitulo_docente" value="<?php echo $obj3->id_capitulo_docente[$i]; ?>" />
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
            <form id="form4" name="form4" method="post" action="excel-capitulos-docentes.php">
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