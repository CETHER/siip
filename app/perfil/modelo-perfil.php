<?php
	error_reporting(0);
	require_once "../../core/conexion.php";
	
	Class Perfil extends Conexion
	{

        public $id_alumno;

	public function __construct( ) 
    	{ 
      	   parent::__construct( );
    	}

	public function perfilCompleto()
	{

	  $sql = "select al.fotografia as foto, CONCAT(al.nombre,' ', al.apellido_paterno,' ', al.apellido_materno) as nombre_completo, prog.nombre as nombre_programa, al.codigo as codigo, al.fecha_nacimiento as fecha_nacimiento, al.lugar_nacimiento as lugar_nacimiento, al.modalidad as modalidad, al.director_tesis as director, al.asesor_tesis1 as asesor, asp.curp as curp, asp.rfc as rfc, asp.correo as email, asp.sexo as sexo, asp.telefono as telefono, asp.celular as celular, asp.titulo as titulo, asp.universidad as universidad
                 from alumnos as al
                 join programas as prog on al.id_programa = prog.id_programa
                 join aspirantes as asp on al.id_aspirante = asp.id_aspirante
                 where al.status='1' AND al.id_alumno = '$this->id_alumno'";

    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          for( $i=0; $i<$max; $i++ )
          {
	    $res->data_seek( $i );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> foto = 'http://agavia.com.mx/proyectos/siip/uploads/'.$obj->foto;
	    $aux -> nombre_completo = $obj->nombre_completo;
	    $aux -> nombre_programa = $obj->nombre_programa;
	    $aux -> codigo = $obj->codigo;
	    $aux -> fecha_nacimiento = $obj->fecha_nacimiento;
	    $aux -> lugar_nacimiento = $obj->lugar_nacimiento;
	    if($obj->director != ""){$aux -> director = $obj->director;} else {$aux -> director = 'Aun no registrado';}
	    if($obj->asesor != ""){$aux -> asesor = $obj->asesor;} else {$aux -> asesor = 'Aun no registrado';}
	    if($obj->modalidad == "2"){$aux -> modalidad = 'Estudiante de tiempo parcial';} else {$aux -> modalidad = 'Estudiante de tiempo completo';}
	    $aux -> curp = $obj->curp;
	    $aux -> rfc = $obj->rfc;
	    $aux -> email = $obj->email;
	    $aux -> telefono = $obj->telefono;
            if($obj->sexo == "1"){$aux -> sexo = 'Hombre';} else {$aux -> sexo = 'Mujer';}
	    $aux -> celular = $obj->celular;
	    $aux -> titulo = $obj->titulo;
	    $aux -> universidad = $obj->universidad;

            $perfilCompleto[] = $aux;
          }

          echo json_encode($perfilCompleto);
          
	  $res->close( );
          $this->mysqli->close( );
        }


public function perfilSencillo()
	{

	  $sql = "select al.fotografia as foto, CONCAT(al.nombre,' ', al.apellido_paterno,' ', al.apellido_materno) as nombre_completo, prog.nombre as nombre_programa
                 from alumnos as al
                 join programas as prog on al.id_programa = prog.id_programa
                 where al.status='1' AND al.id_alumno = '$this->id_alumno'";

    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          for( $i=0; $i<$max; $i++ )
          {
	    $res->data_seek( $i );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> foto = 'http://agavia.com.mx/proyectos/siip/uploads/'.$obj->foto;
	    $aux -> nombre_completo = $obj->nombre_completo;
	    $aux -> nombre_programa = $obj->nombre_programa;

            $perfilSencillo[] = $aux;
          }

          echo json_encode($perfilSencillo);
          
	  $res->close( );
          $this->mysqli->close( );
        }

    }
?>