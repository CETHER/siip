<?php
	error_reporting(0);
	require_once "../../core/conexion.php";
	
	Class Eventos extends Conexion
	{
        public $id_evento;

	public function __construct( ) 
    	{ 
      	   parent::__construct( );
    	}

	public function listaEventos()
	{

	  $sql = "select id_evento, descripcion, fecha_inicio, fecha_fin, status FROM calendario_eventos WHERE status='1' ORDER BY fecha_inicio";
    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          for( $i=0; $i<$max; $i++ )
          {
	    $res->data_seek( $i );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> id_evento = $obj->id_evento;
	    $aux -> descripcion = $obj->descripcion;
	    $aux -> fecha_hora = $obj->fecha_inicio;
	    $aux -> fecha_fin = $obj->fecha_fin;
	    $aux -> lugar = $obj->lugar;
            $eventos[] = $aux;
          }

          echo json_encode($eventos);
          
	  $res->close( );
          $this->mysqli->close( );
        }

        public function obtenerEvento()
	{

	  $sql = "select id_evento, descripcion, fecha_hora, status FROM calendario_eventos WHERE id_evento='$this->id_evento'";
    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          if( $max!=0 )
          {
	    $res->data_seek( 0 );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> id_evento = $obj->id_evento;
	    $aux -> descripcion = $obj->descripcion;
	    $aux -> fecha_hora = $obj->fecha_hora;
	    $aux -> lugar = $obj->lugar;
            $eventos[] = $aux;
          }

          echo json_encode($eventos);
          
	  $res->close( );
          $this->mysqli->close( );
      }
   }
?>