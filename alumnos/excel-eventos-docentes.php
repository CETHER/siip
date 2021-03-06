<?php
  header( "Content-Type: application/vnd.ms-excel" );
  header( "Content-Disposition: attachment; filename=reporte-eventos-docentes.xls" );
  
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "modelo-docentes.php";
  require_once "modelo-eventos-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Docentes( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->obtenerDocente( );
  
  $obj3 = new Eventos_Docentes( );
  $obj3->id_docente = $obj2->id_docente;
  $obj3->listaEventosDocente( );
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
      <td colspan="4">Eventos acad&eacute;micos del docente</td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4">Docente:</td>
    </tr>
    <tr>
      <td colspan="4"><?php echo $obj2->apellido_paterno." ".$obj2->apellido_materno." ".$obj2->nombre; ?></td>
    </tr>
    <tr>
      <td colspan="4">&nbsp;</td>
    </tr>
    <tr>
      <td>ID</td>
      <td>NOMBRE DEL EVENTO</td>
      <td>NOMBRE DE LA PONENCIA</td>
      <td>INSTITUCI&Oacute;N</td>
      <td>PAÍS</td>
      <td>CIUDAD</td>
      <td>FECHA DE INICIO</td>
      <td>FECHA DE T&Eacute;RMINO</td>
    </tr>
    <?php
      $max = count( $obj3->id_evento_docente );
            
      for( $i=0; $i<$max; $i++ ) {
    ?>
    <tr>
      <td><?php echo $obj3->id_evento_docente[$i]; ?></td>
      <td><?php echo $obj3->evento[$i]; ?></td>
      <td><?php echo $obj3->ponencia[$i]; ?></td>
      <td><?php echo $obj3->institucion[$i]; ?></td>
      <td><?php echo $obj3->pais[$i]; ?></td>
      <td><?php echo $obj3->ciudad[$i]; ?></td>
      <td><?php echo $obj3->fecha_inicio[$i]; ?></td>
      <td><?php echo $obj3->fecha_termino[$i]; ?></td>
    </tr>
    <?php
      }
    ?>
  </table>
</body>
</html>