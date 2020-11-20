<?php
  header( "Content-Type: application/vnd.ms-excel" );
  header( "Content-Disposition: attachment; filename=reporte-capitulos-docentes.xls" );
  
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
  require_once "modelo-docentes.php";
  require_once "modelo-capitulos-docentes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  $obj2 = new Docentes( );
  $obj2->id_docente = $_POST["id_docente"];
  $obj2->obtenerDocente( );
  
  $obj3 = new Capitulos_Docentes( );
  $obj3->id_docente = $obj2->id_docente;
  $obj3->listaCapitulosDocente( );
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
      <td colspan="4">Cap&iacute;tulos del docente</td>
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
      <td>T&Iacute;TULO</td>
      <td>LIBRO</td>
      <td>AUTOR</td>
      <td>EDITORIAL</td>
      <td>PA&Iacute;S</td>
      <td>AÑO</td>
      <td>LGAC</td>
      <td>ISBN</td>
      <td>COLABORACI&Oacute;N</td>
    </tr>
    <?php
      $max = count( $obj3->id_capitulo_docente );
            
      for( $i=0; $i<$max; $i++ ) {
    ?>
    <tr>
      <td><?php echo $obj3->id_capitulo_docente[$i]; ?></td>
      <td><?php echo $obj3->titulo[$i]; ?></td>
      <td><?php echo $obj3->libro[$i]; ?></td>
      <td><?php echo $obj3->autor[$i]; ?></td>
      <td><?php echo $obj3->editorial[$i]; ?></td>
      <td><?php echo $obj3->pais[$i]; ?></td>
      <td><?php echo $obj3->anio[$i]; ?></td>
      <td><?php echo $obj3->lgac[$i]; ?></td>
      <td><?php echo $obj3->isbn[$i]; ?></td>
      <td><?php echo $obj3->colaboracion_txt[$i]; ?></td>
    </tr>
    <?php
      }
    ?>
  </table>
</body>
</html>