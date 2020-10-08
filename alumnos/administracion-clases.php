<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-ciclos.php";
  require_once "modelo-asignaturas.php";
  require_once "modelo-docentes.php";
  require_once "modelo-clases.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Programas( );
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->obtenerPrograma( );
  
  $obj3 = new Ciclos( );
  $obj3->listaCiclos( );
  
  if( !isset( $_GET["id_ciclo"] ) )
  {
    $_GET["id_ciclo"] = 0;
  }
  
  $obj4 = new Clases( );
  $obj4->id_programa = $obj2->id_programa;
  $obj4->id_ciclo = $_GET["id_ciclo"];
  $obj4->listaClasesCiclo( );
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema Integral de Informaci&oacute;n de Posgrados</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/general.css" rel="stylesheet" type="text/css">
<link href="../css/menu.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
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
          <td width="10%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
          <td width="40%">&nbsp;</td>
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
          <td colspan="4">Administraci&oacute;n de clases</td>
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
          <td colspan="4">Ciclo escolar a consultar:</td>
        </tr>
        <tr class="textoTitulos4">
          <td>
          <select name="id_ciclo" id="id_ciclo" onchange="MM_jumpMenu('parent',this,0)">
          <option value=''></option>
          <?php
            $max = count( $obj3->id_ciclo );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj3->id_ciclo[$i]==$obj4->id_ciclo )
	      {
                printf( "<option value='administracion-clases.php?id_ciclo=%d' selected='selected'>%s</option>\n", $obj3->id_ciclo[$i], $obj3->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='administracion-clases.php?id_ciclo=%d'>%s</option>\n", $obj3->id_ciclo[$i], $obj3->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
          <td colspan="2">&nbsp;</td>
          <td align="center"><input type="button" onclick="location.href='alta-clases.php'" value="   Nuevo   " /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td>NRC</td>
          <td>ASIGNATURA</td>
          <td>DOCENTE</td>
          <td>ACCIONES</td>
        </tr>
        <?php
	  $max = count( $obj4->id_clase );
          
          for( $i=0; $i<$max; $i++ )
          {
            $obj5 = new Asignaturas( );
            $obj5->id_asignatura = $obj4->id_asignatura[$i];
            $obj5->obtenerAsignatura( );
	    
	    $obj6 = new Docentes( );
            $obj6->id_docente = $obj4->id_docente[$i];
            $obj6->obtenerDocente( );
	?>
        <tr class="textoTablas2">
          <td><?php echo $obj4->nrc[$i]; ?>&nbsp;</td>
          <td><?php echo $obj5->nombre; ?>&nbsp;</td>
          <td><?php echo $obj6->apellido_paterno." ".$obj6->apellido_materno." ".$obj6->nombre; ?>&nbsp;</td>
          <td align="center">
          <a href="consulta-clases.php?id_clase=<?php echo $obj4->id_clase[$i]; ?>">
          <img src="../images/icon-search.png" width="16" height="16" /></a>
          <a href="edicion-clases.php?id_clase=<?php echo $obj4->id_clase[$i]; ?>">
          <img src="../images/icon-edit.png" width="16" height="16" /></a>
          <a href="baja-clases.php?id_clase=<?php echo $obj4->id_clase[$i]; ?>">
          <img src="../images/icon-delete.png" width="16" height="16" /></a>
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