<?php
  header( "Content-Type: application/vnd.ms-excel" );
  header( "Content-Disposition: attachment; filename=reporte-visitantes.xls" );
  
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "modelo-visitantes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Programas( );
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->obtenerPrograma( );
  
  $obj3 = new Visitantes( );
  $obj3->id_programa = $obj2->id_programa;
  $obj3->listaVisitantesPrograma( );
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Sistema Integral de Informaci&oacute;n de Posgrados</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<table>
  <tr>
    <td colspan="4">M&oacute;dulo Alumnos</td>
  </tr>
  <tr>
    <td colspan="4">Administraci&oacute;n de profesores visitantes</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">Programa:</td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $obj2->nombre; ?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>ID</td>
    <td>NOMBRE</td>
    <td>INSTITUCION</td>
    <td>EVENTO</td>
    <td>PA&Iacute;S</td>
    <td>FECHA INICIO</td>
    <td>FECHA T&Eacute;RMINO</td>
  </tr>
  <?php
    $max = count( $obj3->id_visitante );
          
    for( $i=0; $i<$max; $i++ )
    {
  ?>
  <tr>
    <td><?php echo $obj3->id_visitante[$i]; ?></td>
    <td><?php echo $obj3->nombre[$i]; ?></td>
    <td><?php echo $obj3->institucion[$i]; ?></td>
    <td><?php echo $obj3->evento[$i]; ?></td>
    <td><?php echo $obj3->pais[$i]; ?></td>
    <td><?php echo $obj3->fecha_inicio[$i]; ?></td>
    <td><?php echo $obj3->fecha_termino[$i]; ?></td>
  </tr>
  <?php
    }
  ?>
</table>
</body>
</html>