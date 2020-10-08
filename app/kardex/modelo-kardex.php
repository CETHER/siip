<?php
	error_reporting(0);
	require_once "../../core/conexion.php";
	
	Class Kardex extends Conexion
	{

        public $id_alumno;

	public function __construct( ) 
    	{ 
      	   parent::__construct( );
    	}

	public function listadoKardex()
	{

	  $sql = "select al.id_alumno, cal.calificacion_ordinario as cal_ordinario, cal.calificacion_extraordinario as cal_extraordinario, cl.nrc as nrc, asg.nombre as nombre_asignatura, asg.clave as clave, asg.creditos as creditos
                  from alumnos as al
                  join calificaciones as cal on al.id_alumno = cal.id_alumno
                  join clases as cl on cal.id_clase = cl.id_clase
                  join asignaturas as asg on cl.id_asignatura = asg.id_asignatura
                  where al.status='1' AND al.id_alumno = '$this->id_alumno'";

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
	    $aux -> nombre_asignatura = $obj->nombre_asignatura;
	    $aux -> nrc = $obj->nrc;
	    $aux -> clave = $obj->clave;
            if($obj->cal_ordinario != ""){$aux -> calificacion = $obj->cal_ordinario; $aux -> tipo = 'ordinario';} else {$aux -> calificacion = $obj->cal_extraordinario; $aux -> tipo = 'extraordinario';}
	    $aux -> creditos = $obj->creditos;
            $kardex[] = $aux;
            }

            echo json_encode($kardex); 
	  }
          
	  
          
	  $res->close( );
          $this->mysqli->close( );
        }

    }
?>
