<?php
  header( "Content-Type: application/vnd.ms-excel" );
  header( "Content-Disposition: attachment; filename=reporte-docentes.xls" );
  
  require_once "../core/modelo-usuarios.php";
  require_once "../core/modelo-programas.php";
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
  
  $obj3 = new Docentes( );
  $obj3->listaDocentes( );
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
    <td colspan="4">Administraci&oacute;n de docentes</td>
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
    <td>APELLIDO PATERNO</td>
    <td>APELLIDO MATERNO</td>
    <td>PA&Iacute;S</td>
    <td>SEXO</td>
    <td>FECHA NACIMIENTO</td>
    <td>LUGAR DE NACIMIENTO</td>
    <td>MODALIDAD</td>
    <td>ESCOLARIDAD</td>
    <td>INSTITUCION</td>
    <td>FECHA TITULACION</td>
    <td>NUMERO CVU</td>
    <td>MIEMBRO SNI</td>
    <td>NIVEL SNI</td>
    <td>PERFIL PRODEP</td>
    <td>CUERPO ACADEMICO</td>
    <td>LGAC</td>
    <td>PROYECTOS</td>
  </tr>
  <?php
    $max = count( $obj3->id_docente );
          
    for( $i=0; $i<$max; $i++ )
    {
  ?>
  <tr>
    <td><?php echo $obj3->id_docente[$i]; ?></td>
    <td><?php echo $obj3->nombre[$i]; ?></td>
    <td><?php echo $obj3->apellido_paterno[$i]; ?></td>
    <td><?php echo $obj3->apellido_materno[$i]; ?></td>
    <td><?php echo $obj3->pais[$i]; ?></td>
    <td><?php echo $obj3->sexo_txt[$i]; ?></td>
    <td><?php echo $obj3->fecha_nacimiento[$i]; ?></td>
    <td><?php echo $obj3->lugar_nacimiento[$i]; ?></td>
    <td><?php echo $obj3->modalidad_txt[$i]; ?></td>
    <td><?php echo $obj3->escolaridad[$i]; ?></td>
    <td><?php echo $obj3->institucion[$i]; ?></td>
    <td><?php echo $obj3->fecha_titulacion[$i]; ?></td>
    <td><?php echo $obj3->numero_cvu[$i]; ?></td>
    <td><?php echo $obj3->miembro_sni[$i]; ?></td>
    <td><?php echo $obj3->nivel_sni[$i]; ?></td>
    <td><?php echo $obj3->perfil_prodep[$i]; ?></td>
    <td><?php echo $obj3->cuerpo_academico[$i]; ?></td>
    <td><?php echo $obj3->lgac[$i]; ?></td>
    <td><?php echo $obj3->proyectos[$i]; ?></td>
  </tr>
  <?php
    }
  ?>
</table>
</body>
</html>