<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-ciclos.php";
  require_once "../core/modelo-paises.php";
  require_once "modelo-asignaturas.php";
  require_once "modelo-docentes.php";
  require_once "modelo-aulas.php";
  require_once "modelo-clases.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Docentes( );
  $obj2->id_docente = $_GET["id_docente"];
  $obj2->obtenerDocente( );
  
  $obj3 = new Paises( );
  $obj3->id_pais = $obj2->id_pais;
  $obj3->obtenerPais( );
  
  $obj4 = new Ciclos( );
  $obj4->listaCiclos( );
  
  if( !isset( $_GET["id_ciclo"] ) )
  {
    $_GET["id_ciclo"] = 0;
  }
  
  $obj5 = new Clases( );
  $obj5->id_programa = $_SESSION["id_programa"];
  $obj5->id_docente = $obj2->id_docente;
  $obj5->id_ciclo = $_GET["id_ciclo"];
  $obj5->listaClasesDocente( );
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
          <td width="10%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="10%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="5%">&nbsp;</td>
          <td width="10%">&nbsp;</td>
        </tr>
        <tr class="textoTitulos1">
          <td colspan="12">M&oacute;dulo Alumnos</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td colspan="12">Reporte de horarios por docente</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="12">DATOS GENERALES</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="12">Fotograf&iacute;a:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="12" valign="top">
          <?php
            if( $obj2->fotografia!=null )
            {
              printf( "<a href='../uploads/%s' target='_blank'><img src='../uploads/%s' height='100' /></a>", $obj2->fotografia, $obj2->fotografia );
	    }
	  ?>
          &nbsp;
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="3">C&oacute;digo:</td>
          <td>Apellido paterno:</td>
          <td colspan="4">Apellido materno:</td>
          <td colspan="4">Nombre(s):</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="3"><?php echo $obj2->codigo; ?>&nbsp;</td>
          <td><?php echo $obj2->apellido_paterno; ?>&nbsp;</td>
          <td colspan="4"><?php echo $obj2->apellido_materno; ?>&nbsp;</td>
          <td colspan="4"><?php echo $obj2->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="3">Sexo:</td>
          <td>Fecha de nacimiento:</td>
          <td colspan="4">Lugar de nacimiento:</td>
          <td colspan="4">Pa&iacute;s de nacimiento:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="3"><?php echo $obj2->sexo_txt; ?>&nbsp;</td>
          <td><?php echo $obj2->fecha_nacimiento; ?>&nbsp;</td>
          <td colspan="4"><?php echo $obj2->lugar_nacimiento; ?>&nbsp;</td>
          <td colspan="4"><?php echo $obj3->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="12">Ciclo escolar a consultar:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="12">
          <select name="id_ciclo" id="id_ciclo" onchange="MM_jumpMenu('parent',this,0)">
          <option value=''></option>
          <?php
            $max = count( $obj4->id_ciclo );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj4->id_ciclo[$i]==$obj5->id_ciclo )
	      {
                printf( "<option value='reporte-horarios-docente2.php?id_docente=%d&id_ciclo=%d' selected='selected'>%s</option>\n", $obj2->id_docente, $obj4->id_ciclo[$i], $obj4->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='reporte-horarios-docente2.php?id_docente=%d&id_ciclo=%d'>%s</option>\n", $obj2->id_docente, $obj4->id_ciclo[$i], $obj4->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="12">HORARIO</td>
        </tr>
        <tr class="textoTablas1">
          <td align="center">NRC</td>
          <td align="center">CLAVE</td>
          <td colspan="3" align="center">ASIGNATURA</td>
          <td align="center">L</td>
          <td align="center">M</td>
          <td align="center">I</td>
          <td align="center">J</td>
          <td align="center">V</td>
          <td align="center">S</td>
          <td align="center">AULA</td>
        </tr>
        <?php
	  $max = count( $obj5->id_clase );
          
          for( $i=0; $i<$max; $i++ )
          {
            $obj6 = new Asignaturas( );
            $obj6->id_asignatura = $obj5->id_asignatura[$i];
            $obj6->obtenerAsignatura( );
	    
	    $obj7 = new Aulas( );
            $obj7->id_aula = $obj5->id_aula[$i];
            $obj7->obtenerAula( );
	?>
        <tr class="textoTablas2">
          <td><?php echo $obj5->nrc[$i]; ?>&nbsp;</td>
          <td><?php echo $obj6->clave; ?>&nbsp;</td>
          <td colspan="3"><?php echo $obj6->nombre; ?>&nbsp;</td>
          <td align="center"><?php echo $obj5->lun_inicio[$i]."-".$obj5->lun_fin[$i]; ?>&nbsp;</td>
          <td align="center"><?php echo $obj5->mar_inicio[$i]."-".$obj5->mar_fin[$i]; ?>&nbsp;</td>
          <td align="center"><?php echo $obj5->mie_inicio[$i]."-".$obj5->mie_fin[$i]; ?>&nbsp;</td>
          <td align="center"><?php echo $obj5->jue_inicio[$i]."-".$obj5->jue_fin[$i]; ?>&nbsp;</td>
          <td align="center"><?php echo $obj5->vie_inicio[$i]."-".$obj5->vie_fin[$i]; ?>&nbsp;</td>
          <td align="center"><?php echo $obj5->sab_inicio[$i]."-".$obj5->sab_fin[$i]; ?>&nbsp;</td>
          <td><?php echo $obj7->edificio."-".$obj7->aula; ?>&nbsp;</td>
        </tr>
        <?php
	  }
	?>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
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