<?php
	error_reporting(0);
	require_once "../../core/conexion.php";
	
	Class Horarios extends Conexion
	{

        public $id_alumno;

	public function __construct( ) 
    	{ 
      	   parent::__construct( );
    	}

	public function getHorariosById()
	{

	  $sql = "select al.id_alumno, al.id_ciclo,
          ci.fecha_inicio as fecha_inicio, ci.fecha_fin as fecha_fin,
          cl.nrc as NRC, cl.lun_inicio, cl.lun_fin, cl.mar_inicio, cl.mar_fin, cl.mie_inicio, cl.mie_fin,
          cl.jue_inicio, cl.jue_fin, cl.vie_inicio, cl.vie_fin, cl.sab_inicio, cl.sab_fin,
          asg.nombre as Nombre_Asignatura,
          CONCAT(doc.apellido_paterno, ' ',doc.apellido_materno, ' ',doc.nombre) as Nombre_Docente,
          CONCAT('Salón ',au.edificio,' ',au.aula) as Salon
          from alumnos as al 
          join ciclos as ci on al.id_ciclo = ci.id_ciclo
          join clases as cl on al.id_ciclo = cl.id_ciclo and al.id_programa = cl.id_programa
          join asignaturas as asg on cl.id_asignatura = asg.id_asignatura
          join docentes as doc on cl.id_docente = doc.id_docente
          join aulas as au on cl.id_aula = au.id_aula
          where al.status='1' AND al.id_alumno = '$this->id_alumno' ";

    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

	  if($max < 1 || $max == null){
	
	       $aux = '';
	     $aux -> error = 'sin registros';
	     $kardex[] = $aux;
	     echo json_encode($kardex);

	  
	  } else {

          for( $i=0; $i<$max; $i++ )
          {
	    $res->data_seek( $i );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> inicio_ciclo = $obj->fecha_inicio;
	    $aux -> fin_ciclo = $obj->fecha_fin;
	    $aux -> Nombre_Asignatura = $obj->Nombre_Asignatura;
	    $aux -> NRC = $obj->NRC;
	    $aux -> Nombre_Docente = $obj->Nombre_Docente;
	    $aux -> Salon = $obj->Salon;
            if($obj->lun_inicio != ""){$aux -> lunes_inicio = $obj->lun_inicio; $aux -> lunes_fin = $obj->lun_fin;}
            if($obj->mar_inicio != ""){$aux -> martes_inicio = $obj->mar_inicio; $aux -> martes_fin = $obj->mar_fin;}
            if($obj->mie_inicio != ""){$aux -> miercoles_inicio = $obj->mie_inicio; $aux -> miercoles_fin = $obj->mie_fin;}
            if($obj->jue_inicio != ""){$aux -> jueves_inicio = $obj->jue_inicio; $aux -> jueves_fin = $obj->jue_fin;}
            if($obj->vie_inicio != ""){$aux -> viernes_inicio = $obj->vie_inicio; $aux -> viernes_fin = $obj->vie_fin;}
            if($obj->sab_inicio != ""){$aux -> sabado_inicio = $obj->sab_inicio; $aux -> sabado_fin = $obj->sab_fin;}
            $horarios[] = $aux;
          }

          echo json_encode($horarios);
	  }
          
	  $res->close( );
          $this->mysqli->close( );
        }

    }
?>

