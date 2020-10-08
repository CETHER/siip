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
  $obj4->id_orientacion = $obj2->id_orientacion;
  $obj4->obtenerOrientacion( );
  
  $obj5 = new Ciclos( );
  $obj5->id_ciclo = $obj2->id_ciclo;
  $obj5->obtenerCiclo( );
  
  $obj6 = new Paises( );
  $obj6->id_pais = $obj2->id_pais;
  $obj6->obtenerPais( );
  
  $obj7 = new Estados( );
  $obj7->id_estado = $obj2->id_estado;
  $obj7->obtenerEstado( );
  
  $obj8 = new Estados( );
  $obj8->id_estado = $obj2->id_estado_trabajo;
  $obj8->obtenerEstado( );
  
  $obj9 = new Idiomas( );
  $obj9->id_idioma = $obj2->id_idioma1;
  $obj9->obtenerIdioma( );
  
  $obj10 = new Idiomas( );
  $obj10->id_idioma = $obj2->id_idioma2;
  $obj10->obtenerIdioma( );
  
  $obj11 = new Idiomas( );
  $obj11->id_idioma = $obj2->id_idioma3;
  $obj11->obtenerIdioma( );
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema Integral de Informaci&oacute;n de Posgrados</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
          <td colspan="4">Alta de aspirantes</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4" class="textoRojo">Proceso completado con &eacute;xito.</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
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
          <td colspan="2">Orientaci&oacute;n:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj4->nombre; ?>&nbsp;</td>
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
          <td>Ciclo escolar:</td>
          <td>&nbsp;</td>
          <td>Modalidad:</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj5->nombre; ?>&nbsp;</td>
          <td>&nbsp;</td>
          <td><?php echo $obj2->modalidad_txt; ?>&nbsp;</td>
          <td>&nbsp;</td>
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
          <td colspan="2">Fotograf&iacute;a:</td>
          <td colspan="2">&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2" valign="top">
          <?php
            if( $obj2->fotografia!=null )
            {
              printf( "<a href='../uploads/%s' target='_blank'><img src='../uploads/%s' height='100' /></a>", $obj2->fotografia, $obj2->fotografia );
	    }
	  ?>
          &nbsp;
          </td>
          <td colspan="2" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Apellido paterno:</td>
          <td>Apellido materno:</td>
          <td>Nombre(s):</td>
          <td>Fecha de nacimiento:</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->apellido_paterno; ?>&nbsp;</td>
          <td><?php echo $obj2->apellido_materno; ?>&nbsp;</td>
          <td><?php echo $obj2->nombre; ?>&nbsp;</td>
          <td><?php echo $obj2->fecha_nacimiento; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Sexo:</td>
          <td>CURP:</td>
          <td>RFC:</td>
          <td>Correo electr&oacute;nico personal:</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->sexo_txt; ?>&nbsp;</td>
          <td><?php echo $obj2->curp; ?>&nbsp;</td>
          <td><?php echo $obj2->rfc; ?>&nbsp;</td>
          <td><?php echo $obj2->correo; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Calle:</td>
          <td>N&uacute;mero:</td>
          <td>Colonia:</td>
          <td>C&oacute;digo Postal:</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->calle; ?>&nbsp;</td>
          <td>
          Exterior: <?php echo $obj2->numero_exterior; ?>&nbsp;&nbsp;&nbsp;
          Interior: <?php echo $obj2->numero_interior; ?>&nbsp;
          </td>
          <td><?php echo $obj2->colonia; ?>&nbsp;</td>
          <td><?php echo $obj2->codigo_postal; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Municipio:</td>
          <td>Estado:</td>
          <td>Tel&eacute;fono de casa (10 d&iacute;gitos):</td>
          <td>Tel&eacute;fono celular (10 d&iacute;gitos):</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->municipio; ?>&nbsp;</td>
          <td><?php echo $obj7->nombre; ?>&nbsp;</td>
          <td><?php echo $obj2->telefono; ?>&nbsp;</td>
          <td><?php echo $obj2->celular; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td>Lugar de nacimiento:</td>
          <td>Pa&iacute;s de nacimiento:</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->lugar_nacimiento; ?>&nbsp;</td>
          <td><?php echo $obj6->nombre; ?>&nbsp;</td>
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
          <td colspan="2">Último grado de estudios:</td>
          <td colspan="2">Título del grado académico:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj2->grado_estudios_txt; ?></td>
          <td colspan="2"><?php echo $obj2->titulo; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Universidad de procedencia:</td>
          <td colspan="2">Promedio (base 100):</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj2->universidad; ?></td>
          <td colspan="2"><?php echo $obj2->promedio; ?></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Año de egreso:</td>
          <td colspan="2">Idiomas que domina:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2" valign="top"><?php echo $obj2->anio_egreso; ?>&nbsp;</td>
          <td colspan="2" valign="top">
	  <?php if( $obj2->id_idioma1!=0 ) { echo $obj9->nombre." - ".$obj2->nivel_idioma1_txt."<br />"; } ?>
          <?php if( $obj2->id_idioma2!=0 ) { echo $obj10->nombre." - ".$obj2->nivel_idioma2_txt."<br />"; } ?>
          <?php if( $obj2->id_idioma3!=0 ) { echo $obj11->nombre." - ".$obj2->nivel_idioma3_txt; } ?>
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
          <td>¿Trabaja actualmente?</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td><?php echo $obj2->trabajo_txt; ?>&nbsp;</td>
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
          <td colspan="2">Ocupación:</td>
          <td colspan="2">Nombre de la empresa:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj2->ocupacion; ?>&nbsp;</td>
          <td colspan="2"><?php echo $obj2->empresa; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Domicilio de trabajo (calle, n&uacute;mero exterior y n&uacute;mero interior):</td>
          <td>Municipio:</td>
          <td>Estado:</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj2->domicilio_trabajo; ?>&nbsp;</td>
          <td><?php echo $obj2->municipio_trabajo; ?>&nbsp;</td>
          <td><?php echo $obj8->nombre; ?>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos3">
          <td colspan="2">Tel&eacute;fono de trabajo (con extensi&oacute;n):</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr class="textoTitulos4">
          <td colspan="2"><?php echo $obj2->telefono_trabajo; ?>&nbsp;</td>
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