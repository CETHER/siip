<?php
  header( "Content-Type: application/vnd.ms-excel" );
  header( "Content-Disposition: attachment; filename=reporte.xls" );
  
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "../core/modelo-orientaciones.php";
  require_once "../core/modelo-ciclos.php";
  require_once "modelo-aspirantes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Programas( );
  $obj2->id_programa = $_SESSION["id_programa"];
  $obj2->obtenerPrograma( );
  
  if( !isset( $_GET["id_ciclo"] ) )
  {
    $_GET["id_ciclo"] = 0;
  }
  
  $obj3 = new Ciclos( );
  $obj3->id_ciclo = $_GET["id_ciclo"];
  $obj3->obtenerCiclo( );
  
  $obj4 = new Aspirantes( );
  $obj4->id_programa = $obj2->id_programa;
  $obj4->id_ciclo = $_GET["id_ciclo"];
  $obj4->listaAspirantesCiclo( );
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
    <td colspan="4">M&oacute;dulo Aspirantes</td>
  </tr>
  <tr>
    <td colspan="4">Administraci&oacute;n de aspirantes</td>
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
    <td colspan="4">Ciclo de ingreso a consultar:</td>
  </tr>
  <tr>
    <td colspan="4"><?php echo $obj3->nombre; ?></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td>ID</td>
    <td>APELLIDO PATERNO</td>
    <td>APELLIDO MATERNO</td>
    <td>NOMBRE</td>
    <td>ORIENTACI&Oacute;N</td>
    <td>CAMPO</td>
    <td>CAMPO</td>
    <td>CAMPO</td>
    <td>CAMPO</td>
    <td>CAMPO</td>
    <td>CAMPO</td>
    <td>CAMPO</td>
    <td>CAMPO</td>
    <td>CAMPO</td>
    <td>CAMPO</td>
  </tr>
  <?php
    $max = count( $obj4->id_aspirante );
    
    for( $i=0; $i<$max; $i++ )
    {
      $obj5 = new Orientaciones( );
      $obj5->id_orientacion = $obj4->id_orientacion[$i];
      $obj5->obtenerOrientacion( );
  ?>
  <tr>
    <td><?php echo $obj4->id_aspirante[$i]; ?></td>
    <td><?php echo $obj4->apellido_paterno[$i]; ?></td>
    <td><?php echo $obj4->apellido_materno[$i]; ?></td>
    <td><?php echo $obj4->nombre[$i]; ?></td>
    <td><?php echo $obj5->nombre; ?></td>
    <td>...</td>
    <td>...</td>
    <td>...</td>
    <td>...</td>
    <td>...</td>
    <td>...</td>
    <td>...</td>
    <td>...</td>
    <td>...</td>
    <td>...</td>
  </tr>
  <?php
    }
  ?>
</table>
</body>
</html>