<?php
	error_reporting(0);
	require_once "../../core/conexion.php";
	
	Class Login extends Conexion
	{

        public $codigo;
        public $contrasena;

	public function __construct( ) 
    	{ 
      	   parent::__construct( );
    	}

	public function login()
	{

          $data = '';

	  $sql = "select id_alumno, codigo, contrasena from alumnos
                  where codigo = '$this->codigo' AND contrasena = '$this->contrasena'";

    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;
          $obj = $res->fetch_object( );

          if($max > 0){
          $data->status = "Success";          
          $data->id_alumno = $obj->id_alumno;
          
          } else {
          $data->status = "Error";
          $data->id_alumno = "0";
          }

          echo json_encode($data);
          
	  $res->close( );
          $this->mysqli->close( );
        }

    }
?>