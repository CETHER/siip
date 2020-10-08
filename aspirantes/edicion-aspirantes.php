<?php
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-orientaciones.php";
  require_once "../core/modelo-ciclos.php";
  require_once "../core/modelo-estados.php";
  require_once "../core/modelo-paises.php";
  require_once "../core/modelo-idiomas.php";
  require_once "modelo-aspirantes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Aspirantes( );
  $obj2->id_aspirante = $_GET["id_aspirante"];
  $obj2->obtenerAspirante( );
  
  $obj3 = new Programas( );
  $obj3->id_programa = $obj2->id_programa;
  $obj3->obtenerPrograma( );
  
  $obj4 = new Orientaciones( );
  $obj4->id_programa = $obj2->id_programa;
  $obj4->listaOrientacionesPrograma( );
  
  $obj5 = new Ciclos( );
  $obj5->listaCiclos( );
  
  $obj6 = new Estados( );
  $obj6->listaEstados( );
  
  $obj7 = new Paises( );
  $obj7->listaPaises( );
  
  $obj8 = new Idiomas( );
  $obj8->listaIdiomas( );
  
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
function inicializarEstado( )
{
  if( document.forms.form1.id_pais.selectedIndex==117 )
  {
    document.forms.form1.id_estado.disabled = false;
  }
  else
  {
    document.forms.form1.id_estado.disabled = true;
  }  
}


function seleccionarEstado( )
{
  if( document.forms.form1.id_pais.selectedIndex==117 )
  {
    document.forms.form1.id_estado.selectedIndex = 0;
    document.forms.form1.id_estado.disabled = false;
  }
  else
  {
    document.forms.form1.id_estado.selectedIndex = 33;
    document.forms.form1.id_estado.disabled = true;
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
      <form id="form1" name="form1" method="post" action="edicion-aspirantes2.php" enctype="multipart/form-data">
      <table class="tablaInterior" border="0" cellspacing="4" cellpadding="0" align="center">
        <tr>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
          <td width="25%">&nbsp;</td>
        </tr>
        <tr class="textoTitulos1">
          <td colspan="4">M&oacute;dulo Aspirantes</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos2">
          <td colspan="4">Edici&oacute;n de aspirantes</td>
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
          <td colspan="4">DATOS DE CONVOCATORIA</td>
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
          <td colspan="2">Orientaci&oacute;n</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2">
          <select name="id_orientacion">
          <option value=''></option>
          <?php
            $max = count( $obj4->id_orientacion );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj4->id_orientacion[$i]==$obj2->id_orientacion )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj4->id_orientacion[$i], $obj4->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj4->id_orientacion[$i], $obj4->nombre[$i] );
	      }
            }
	  ?>
          </select>
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
          <td>Ciclo escolar &bull;</td>
          <td>&nbsp;</td>
          <td>Modalidad &bull;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td>
          <select name="id_ciclo" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj5->id_ciclo );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj5->id_ciclo[$i]==$obj2->id_ciclo )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj5->id_ciclo[$i], $obj5->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj5->id_ciclo[$i], $obj5->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
          <td>&nbsp;</td>
          <td>
          <input type="radio" name="modalidad" value="1" required="required" <?php if( $obj2->modalidad==1 ) { echo "checked='checked'"; } ?> />
          Tiempo completo
          </td>
          <td>
          <input type="radio" name="modalidad" value="2" required="required" <?php if( $obj2->modalidad==2 ) { echo "checked='checked'"; } ?> />
          Tiempo parcial
          </td>
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
          <td colspan="2">Fotograf&iacute;a (formato jpg - m&aacute;ximo 5 mb)</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="file" name="archivo" size="25" /></td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="4">
          <?php
            if( $obj2->fotografia!=null )
            {
              printf( "<a href='../uploads/%s' target='_blank'><img src='../uploads/%s' height='100' /></a>", $obj2->fotografia, $obj2->fotografia );
	    }
	  ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Apellido paterno &bull;</td>
          <td>Apellido materno &bull;</td>
          <td>Nombre(s) &bull;</td>
          <td>Fecha de nacimiento &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="apellido_paterno" size="25" maxlength="50" required="required" value="<?php echo $obj2->apellido_paterno; ?>" />
          </td>
          <td><input type="text" name="apellido_materno" size="25" maxlength="50" required="required" value="<?php echo $obj2->apellido_materno; ?>" />
          </td>
          <td><input type="text" name="nombre" size="25" maxlength="50" required="required" value="<?php echo $obj2->nombre; ?>" /></td>
          <td><input type="date" name="fecha_nacimiento" placeholder="aaaa-mm-dd" required="required" value="<?php echo $obj2->fecha_nacimiento; ?>" />
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Sexo &bull;</td>
          <td>CURP &bull;</td>
          <td>RFC &bull;</td>
          <td>Correo electr&oacute;nico personal &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td>
          <input type="radio" name="sexo" value="1" required="required" <?php if( $obj2->sexo==1 ) { echo "checked='checked'"; } ?> /> Masculino
          <input type="radio" name="sexo" value="2" required="required" <?php if( $obj2->sexo==2 ) { echo "checked='checked'"; } ?> /> Femenino
          </td>
          <td><input type="text" name="curp" size="25" maxlength="20" required="required" value="<?php echo $obj2->curp; ?>" /></td>
          <td><input type="text" name="rfc" size="25" maxlength="20" required="required" value="<?php echo $obj2->rfc; ?>" /></td>
          <td><input type="email" name="correo" size="25" maxlength="50" required="required" value="<?php echo $obj2->correo; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Calle &bull;</td>
          <td>N&uacute;mero &bull;</td>
          <td>Colonia &bull;</td>
          <td>C&oacute;digo Postal &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="calle" size="25" maxlength="50" required="required" value="<?php echo $obj2->calle; ?>" /></td>
          <td>
          <input type="text" name="numero_exterior" size="5" maxlength="10" required="required" value="<?php echo $obj2->numero_exterior; ?>" /> Ext.
          <input type="text" name="numero_interior" size="5" maxlength="10" value="<?php echo $obj2->numero_interior; ?>" /> Int.
          </td>
          <td><input type="text" name="colonia" size="25" maxlength="50" required="required" value="<?php echo $obj2->colonia; ?>" /></td>
          <td><input type="number" name="codigo_postal" size="25" maxlength="5" min="0" required="required" value="<?php echo $obj2->codigo_postal; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Municipio &bull;</td>
          <td>Estado &bull;</td>
          <td>Tel&eacute;fono de casa (10 d&iacute;gitos) &bull;</td>
          <td>Tel&eacute;fono celular (10 d&iacute;gitos) &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="municipio" size="25" maxlength="50" required="required" value="<?php echo $obj2->municipio; ?>" /></td>
          <td>
          <select name="id_estado" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj6->id_estado );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj6->id_estado[$i]==$obj2->id_estado )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj6->id_estado[$i], $obj6->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj6->id_estado[$i], $obj6->nombre[$i] );
	      }
            }
	  ?>
          </select>
          </td>
          <td><input type="text" name="telefono" size="25" maxlength="20" required="required" value="<?php echo $obj2->telefono; ?>" /></td>
          <td><input type="text" name="celular" size="25" maxlength="20" required="required" value="<?php echo $obj2->celular; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Lugar de nacimiento &bull;</td>
          <td>Pa&iacute;s de nacimiento &bull;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="text" name="lugar_nacimiento" size="25" maxlength="50" required="required" value="<?php echo $obj2->lugar_nacimiento; ?>" />
          </td>
          <td>
          <select name="id_pais" required="required">
          <option value=''></option>
          <?php
            $max = count( $obj7->id_pais );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj7->id_pais[$i]==$obj2->id_pais )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj7->id_pais[$i], $obj7->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj7->id_pais[$i], $obj7->nombre[$i] );
	      }
            }
	  ?>
          </select>
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
        <tr class="textoTablas1">
          <td colspan="4">DATOS ACAD&Eacute;MICOS</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">&Uacute;ltimo grado de estudios &bull;</td>
          <td colspan="2">T&iacute;tulo del grado acad&eacute;mico &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2">
          <select name="grado_estudios" required="required">
          <option value=''></option>
          <option value='1' <?php if( $obj2->grado_estudios==1 ) { echo "selected='selected'"; } ?>>Licenciatura</option>
          <option value='2' <?php if( $obj2->grado_estudios==2 ) { echo "selected='selected'"; } ?>>Maestr&iacute;a</option>
          <option value='3' <?php if( $obj2->grado_estudios==3 ) { echo "selected='selected'"; } ?>>Doctorado</option>
          </select>
          </td>
          <td colspan="2"><input type="text" name="titulo" size="50" maxlength="50" required="required" value="<?php echo $obj2->titulo; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Universidad de procedencia &bull;</td>
          <td colspan="2">Promedio (base 100) &bull;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2">
          <input type="text" name="universidad" size="50" maxlength="50" required="required" value="<?php echo $obj2->universidad; ?>" /></td>
          <td colspan="2">
          <input type="number" name="promedio" size="50" maxlength="10" min="0" required="required" value="<?php echo $obj2->promedio; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Año de egreso &bull;</td>
          <td colspan="2">Idiomas que domina</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="anio_egreso" size="25" maxlength="4" required="required" value="<?php echo $obj2->anio_egreso; ?>" />
          </td>
          <td colspan="2">
          <select name="id_idioma1">
          <option value=''></option>
          <?php
            $max = count( $obj8->id_idioma );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj8->id_idioma[$i]==$obj2->id_idioma1 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj8->id_idioma[$i], $obj8->nombre[$i] );
	      }
	      else
	      {	      
	        printf( "<option value='%d'>%s</option>\n", $obj8->id_idioma[$i], $obj8->nombre[$i] );
	      }
            }
	  ?>
          </select>
          <select name="nivel_idioma1">
          <option value=''></option>
          <option value='1' <?php if( $obj2->nivel_idioma1==1 ) { echo "selected='selected'"; } ?>>B&aacute;sico</option>
          <option value='2' <?php if( $obj2->nivel_idioma1==2 ) { echo "selected='selected'"; } ?>>Intermedio</option>
          <option value='3' <?php if( $obj2->nivel_idioma1==3 ) { echo "selected='selected'"; } ?>>Avanzado</option>
          </select>
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2">&nbsp;</td>
          <td colspan="2">
          <select name="id_idioma2">
          <option value=''></option>
          <?php
            $max = count( $obj8->id_idioma );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj8->id_idioma[$i]==$obj2->id_idioma2 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj8->id_idioma[$i], $obj8->nombre[$i] );
	      }
	      else
	      {	      
	        printf( "<option value='%d'>%s</option>\n", $obj8->id_idioma[$i], $obj8->nombre[$i] );
	      }
            }
	  ?>
          </select>
          <select name="nivel_idioma2">
          <option value=''></option>
          <option value='1' <?php if( $obj2->nivel_idioma2==1 ) { echo "selected='selected'"; } ?>>B&aacute;sico</option>
          <option value='2' <?php if( $obj2->nivel_idioma2==2 ) { echo "selected='selected'"; } ?>>Intermedio</option>
          <option value='3' <?php if( $obj2->nivel_idioma2==3 ) { echo "selected='selected'"; } ?>>Avanzado</option>
          </select>
          </td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2">&nbsp;</td>
          <td colspan="2">
          <select name="id_idioma3">
          <option value=''></option>
          <?php
            $max = count( $obj8->id_idioma );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj8->id_idioma[$i]==$obj2->id_idioma3 )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj8->id_idioma[$i], $obj8->nombre[$i] );
	      }
	      else
	      {	      
	        printf( "<option value='%d'>%s</option>\n", $obj8->id_idioma[$i], $obj8->nombre[$i] );
	      }
            }
	  ?>
          </select>
          <select name="nivel_idioma3">
          <option value=''></option>
          <option value='1' <?php if( $obj2->nivel_idioma3==1 ) { echo "selected='selected'"; } ?>>B&aacute;sico</option>
          <option value='2' <?php if( $obj2->nivel_idioma3==2 ) { echo "selected='selected'"; } ?>>Intermedio</option>
          <option value='3' <?php if( $obj2->nivel_idioma3==3 ) { echo "selected='selected'"; } ?>>Avanzado</option>
          </select>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTablas1">
          <td colspan="4">DATOS LABORALES</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>¿Trabaja actualmente? &bull;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><input type="radio" name="trabajo" value="1" required="required" <?php if( $obj2->trabajo==1 ) { echo "checked='checked'"; } ?> /> Si
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <input type="radio" name="trabajo" value="2" required="required" <?php if( $obj2->trabajo==2 ) { echo "checked='checked'"; } ?> /> No</td>
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
        <tr class="textoTitulos3">
          <td colspan="2">Ocupación</td>
          <td colspan="2">Nombre de la empresa</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="ocupacion" size="50" maxlength="50" value="<?php echo $obj2->ocupacion; ?>" /></td>
          <td colspan="2"><input type="text" name="empresa" size="50" maxlength="50" value="<?php echo $obj2->empresa; ?>" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Domicilio de trabajo (calle, n&uacute;mero exterior y n&uacute;mero interior)</td>
          <td>Municipio</td>
          <td>Estado</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="domicilio_trabajo" size="50" maxlength="50" value="<?php echo $obj2->domicilio_trabajo; ?>" /></td>
          <td><input type="text" name="municipio_trabajo" size="25" maxlength="50" value="<?php echo $obj2->municipio_trabajo; ?>" /></td>
          <td>
          <select name="id_estado_trabajo">
          <option value=''></option>
          <?php
            $max = count( $obj6->id_estado );
            
            for( $i=0; $i<$max; $i++ )
            {
              if( $obj6->id_estado[$i]==$obj2->id_estado_trabajo )
	      {
                printf( "<option value='%d' selected='selected'>%s</option>\n", $obj6->id_estado[$i], $obj6->nombre[$i] );
	      }
	      else
	      {
                printf( "<option value='%d'>%s</option>\n", $obj6->id_estado[$i], $obj6->nombre[$i] );
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
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Tel&eacute;fono de trabajo (con extensi&oacute;n)</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><input type="text" name="telefono_trabajo" size="25" maxlength="20" value="<?php echo $obj2->telefono_trabajo; ?>" /></td>
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
          <td colspan="4">
          <input type="submit" name="submit" value="   Enviar   " />
          <input type="hidden" name="id_aspirante" value="<?php echo $obj2->id_aspirante; ?>" />
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
</table>
</body>
</html>