<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-paises.php";
  require_once "modelo-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Programas( );
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->obtenerPrograma( );
  
  if( !isset( $_GET["filtro"] ) )
  {
    $_GET["filtro"] = "0";
  }
  
  $obj3 = new Docentes( );
  $obj3->filtro = $_GET["filtro"];
  $obj3->listaDocentesFiltro( );
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
          <td colspan="4">Administraci&oacute;n de docentes</td>
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
          <td colspan="4">Apellido paterno a consultar:</td>
        </tr>
        <tr class="textoTitulos4">
          <td>
          <select name="filtro" id="filtro" onchange="MM_jumpMenu('parent',this,0)">
          <option value=''></option>
          <option value='administracion-docentes.php?filtro=A' <?php if( $obj3->filtro=="A" ) { echo "selected='selected'"; } ?>>A</option>
          <option value='administracion-docentes.php?filtro=B' <?php if( $obj3->filtro=="B" ) { echo "selected='selected'"; } ?>>B</option>
          <option value='administracion-docentes.php?filtro=C' <?php if( $obj3->filtro=="C" ) { echo "selected='selected'"; } ?>>C</option>
          <option value='administracion-docentes.php?filtro=D' <?php if( $obj3->filtro=="D" ) { echo "selected='selected'"; } ?>>D</option>
          <option value='administracion-docentes.php?filtro=E' <?php if( $obj3->filtro=="E" ) { echo "selected='selected'"; } ?>>E</option>
          <option value='administracion-docentes.php?filtro=F' <?php if( $obj3->filtro=="F" ) { echo "selected='selected'"; } ?>>F</option>
          <option value='administracion-docentes.php?filtro=G' <?php if( $obj3->filtro=="G" ) { echo "selected='selected'"; } ?>>G</option>
          <option value='administracion-docentes.php?filtro=H' <?php if( $obj3->filtro=="H" ) { echo "selected='selected'"; } ?>>H</option>
          <option value='administracion-docentes.php?filtro=I' <?php if( $obj3->filtro=="I" ) { echo "selected='selected'"; } ?>>I</option>
          <option value='administracion-docentes.php?filtro=J' <?php if( $obj3->filtro=="J" ) { echo "selected='selected'"; } ?>>J</option>
          <option value='administracion-docentes.php?filtro=K' <?php if( $obj3->filtro=="K" ) { echo "selected='selected'"; } ?>>K</option>
          <option value='administracion-docentes.php?filtro=L' <?php if( $obj3->filtro=="L" ) { echo "selected='selected'"; } ?>>L</option>
          <option value='administracion-docentes.php?filtro=M' <?php if( $obj3->filtro=="M" ) { echo "selected='selected'"; } ?>>M</option>
          <option value='administracion-docentes.php?filtro=N' <?php if( $obj3->filtro=="N" ) { echo "selected='selected'"; } ?>>N</option>
          <option value='administracion-docentes.php?filtro=Ñ' <?php if( $obj3->filtro=="Ñ" ) { echo "selected='selected'"; } ?>>Ñ</option>
          <option value='administracion-docentes.php?filtro=O' <?php if( $obj3->filtro=="O" ) { echo "selected='selected'"; } ?>>O</option>
          <option value='administracion-docentes.php?filtro=P' <?php if( $obj3->filtro=="P" ) { echo "selected='selected'"; } ?>>P</option>
          <option value='administracion-docentes.php?filtro=Q' <?php if( $obj3->filtro=="Q" ) { echo "selected='selected'"; } ?>>Q</option>
          <option value='administracion-docentes.php?filtro=R' <?php if( $obj3->filtro=="R" ) { echo "selected='selected'"; } ?>>R</option>
          <option value='administracion-docentes.php?filtro=S' <?php if( $obj3->filtro=="S" ) { echo "selected='selected'"; } ?>>S</option>
          <option value='administracion-docentes.php?filtro=T' <?php if( $obj3->filtro=="T" ) { echo "selected='selected'"; } ?>>T</option>
          <option value='administracion-docentes.php?filtro=U' <?php if( $obj3->filtro=="U" ) { echo "selected='selected'"; } ?>>U</option>
          <option value='administracion-docentes.php?filtro=V' <?php if( $obj3->filtro=="V" ) { echo "selected='selected'"; } ?>>V</option>
          <option value='administracion-docentes.php?filtro=W' <?php if( $obj3->filtro=="W" ) { echo "selected='selected'"; } ?>>W</option>
          <option value='administracion-docentes.php?filtro=X' <?php if( $obj3->filtro=="X" ) { echo "selected='selected'"; } ?>>X</option>
          <option value='administracion-docentes.php?filtro=Y' <?php if( $obj3->filtro=="Y" ) { echo "selected='selected'"; } ?>>Y</option>
          <option value='administracion-docentes.php?filtro=Z' <?php if( $obj3->filtro=="Z" ) { echo "selected='selected'"; } ?>>Z</option>
          <option value='administracion-docentes.php?filtro=' <?php if( $obj3->filtro==null ) { echo "selected='selected'"; } ?>>Todos</option>
          </select>
          </td>
          <td colspan="2">&nbsp;</td>
          <td align="center"><input type="button" onclick="location.href='alta-docentes.php'" value="   Nuevo   " /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td>C&Oacute;DIGO</td>
          <td>NOMBRE</td>
          <td>PA&Iacute;S DE NACIMIENTO</td>
          <td>ACCIONES</td>
        </tr>
        <?php
	        $max = count( $obj3->id_docente );
          
          for( $i=0; $i<$max; $i++ )
          {
	          $obj4 = new Paises( );
            $obj4->id_pais = $obj3->id_pais[$i];
            $obj4->obtenerPais( );
	      ?>
        <tr class="textoTablas2">
          <td><?php echo $obj3->codigo[$i]; ?>&nbsp;</td>
          <td><?php echo $obj3->apellido_paterno[$i]." ".$obj3->apellido_materno[$i]." ".$obj3->nombre[$i]; ?>&nbsp;</td>
          <td><?php echo $obj4->nombre; ?>&nbsp;</td>
          <td align="center">
          <a href="cvu-docentes.php?id_docente=<?php echo $obj3->id_docente[$i]; ?>">
          <img src="../images/icon-attach.png" width="16" height="16" /></a>
          <a href="consulta-docentes.php?id_docente=<?php echo $obj3->id_docente[$i]; ?>">
          <img src="../images/icon-search.png" width="16" height="16" /></a>
          <a href="edicion-docentes.php?id_docente=<?php echo $obj3->id_docente[$i]; ?>">
          <img src="../images/icon-edit.png" width="16" height="16" /></a>
          <a href="baja-docentes.php?id_docente=<?php echo $obj3->id_docente[$i]; ?>">
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
        <tr class="textoTitulos4">
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td align="center"><input type="button" onclick="location.href='excel-docentes.php'" value=" Exportar Excel " /></td>
        </tr>
        <tr>
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