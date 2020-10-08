<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
	
	require_once "../../core/conexion.php";
	
	Class Noticias extends Conexion
	{
        public $id_noticia;

	public function __construct( ) 
    	{ 
      	   parent::__construct( );
    	}

	public function listaNoticias()
	{

	  $sql = "select id_noticia, id_programa, titulo, subtitulo, descripcion, fecha, imagen, status FROM noticias WHERE status='1' && id_programa = '18' ORDER BY fecha desc";
    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          for( $i=0; $i<$max; $i++ )
          {
	    $res->data_seek( $i );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> id_noticia = $obj->id_noticia;
	    $aux -> titulo = $obj->titulo;
	    $aux -> subtitulo = $obj->subtitulo;
	    $aux -> descripcion = $obj->descripcion;
	    $aux -> fecha_hora = $obj->fecha;
	    $aux -> imagenUrl = 'http://agavia.com.mx/proyectos/siip/uploads/'.$obj->imagen;
            $noticias[] = $aux;
          }

          echo json_encode($noticias);
          
	  $res->close( );
          $this->mysqli->close( );
        }

        public function obtenerNoticia()
	{

	  $sql = "select id_noticia, titulo, subtitulo, descripcion, fecha, imagen, status FROM noticias WHERE id_noticia='$this->id_noticia'";
    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          if( $max!=0 )
          {
	    $res->data_seek( 0 );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> id_noticia = $obj->id_noticia;
	    $aux -> titulo = $obj->titulo;
	    $aux -> subtitulo = $obj->subtitulo;
	    $aux -> descripcion = $obj->descripcion;
	    $aux -> fecha_hora = $obj->fecha;
	    $aux -> imagenUrl = 'http://agavia.com.mx/proyectos/siip/uploads/'.$obj->imagen;
            $noticias[] = $aux;
          }

          echo json_encode($noticias);
          
	  $res->close( );
          $this->mysqli->close( );
      }
   }
?>