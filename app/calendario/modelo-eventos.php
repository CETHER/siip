<?php
	error_reporting(0);
	require_once "../../core/conexion.php";
	
	Class Eventos extends Conexion
	{

	public function __construct( ) 
    	{ 
      	   parent::__construct( );
    	}

	public function listaEventos()
	{

	  $sql = "select id_evento, fecha_inicio, fecha_fin, titulo, descripcion, status FROM calendario_eventos WHERE status='1' ORDER BY fecha_inicio";
    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          for( $i=0; $i<$max; $i++ )
          {
	    $res->data_seek( $i );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> id_evento = $obj->id_evento;
	    $aux -> fecha_inicio = $obj->fecha_inicio;
	    $aux -> fecha_fin = $obj->fecha_fin;
	    $aux -> titulo = $obj->titulo;
	    $aux -> descripcion = $obj->descripcion;
            $eventos[] = $aux;
          }

          echo json_encode($eventos);
          
	  $res->close( );
          $this->mysqli->close( );
        }

    }
?>

