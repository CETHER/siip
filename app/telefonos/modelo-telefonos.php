<?php
	error_reporting(0);
	require_once "../../core/conexion.php";
	
	Class Telefonos extends Conexion
	{

	public function __construct( ) 
    	{ 
      	   parent::__construct( );
    	}

	public function listaTelefonos()
	{

	  $sql = "select id_telefono, id_programa, telefono, dependencia, imagen, status FROM telefonos WHERE status='1' && id_programa = '18' ORDER BY dependencia";
    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          for( $i=0; $i<$max; $i++ )
          {
	    $res->data_seek( $i );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> id_telefono = $obj->id_telefono;
	    $aux -> telefono = $obj->telefono;
	    $aux -> dependencia = $obj->dependencia;
	    $aux -> icono_url = 'http://agavia.com.mx/proyectos/siip/uploads/'.$obj->imagen;
            $telefonos[] = $aux;
          }

          echo json_encode($telefonos);
          
	  $res->close( );
          $this->mysqli->close( );
        }

    }
?>

