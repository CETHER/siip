<?php
	error_reporting(0);
	require_once "../../core/conexion.php";
	
	Class Alumnos extends Conexion
	{
        public $id_alumno;
	public $codigo;
	public $contrasena;

	public function __construct( ) 
    	{ 
      	   parent::__construct( );
    	}

	public function listaAlumnos()
	{

	  $sql = "select * FROM alumnos WHERE status='1' ORDER BY apellido_paterno";
    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          for( $i=0; $i<$max; $i++ )
          {
	    $res->data_seek( $i );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> id_alumno = $obj->id_alumno;
	    $aux -> fotografia = $obj->fotografia;
	    $aux -> codigo = $obj->codigo;
	    $aux -> apellido_paterno = $obj->apellido_paterno;
	    $aux -> apellido_materno = $obj->apellido_materno;
	    $aux -> nombre = $obj->nombre;
	    $aux -> fecha_nacimiento = $obj->fecha_nacimiento;
	    $aux -> lugar_nacimiento = $obj->lugar_nacimiento;
	    switch( $obj->modalidad )
	     {
	      case 1: $aux -> modalidad = "Tiempo Completo"; break;
	      case 2: $aux -> modalidad = "Tiempo Parcial"; break;
	     }
	    switch( $obj->sexo )
	     {
	      case 1: $aux -> sexo = "Masculino"; break;
	      case 2: $aux -> sexo = "Femenino"; break;
	     }

		
            $alumnos[] = $aux;
          }

          echo json_encode($alumnos);
          
	  $res->close( );
          $this->mysqli->close( );
        }

        public function obtenerAlumno()
	{

	  $sql = "select * from alumnos where id_alumno='$this->id_alumno' and status='1'";
    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          if( $max!=0 )
          {
	    $res->data_seek( 0 );
            $obj = $res->fetch_object( );
	
            $aux = '';
	    $aux -> id_alumno = $obj->id_alumno;
	    $aux -> fotografia = $obj->fotografia;
	    $aux -> codigo = $obj->codigo;
	    $aux -> apellido_paterno = $obj->apellido_paterno;
	    $aux -> apellido_materno = $obj->apellido_materno;
	    $aux -> nombre = $obj->nombre;
	    $aux -> fecha_nacimiento = $obj->fecha_nacimiento;
	    $aux -> lugar_nacimiento = $obj->lugar_nacimiento;
	    switch( $obj->modalidad )
	     {
	      case 1: $aux -> modalidad = "Tiempo Completo"; break;
	      case 2: $aux -> modalidad = "Tiempo Parcial"; break;
	     }
	    switch( $obj->sexo )
	     {
	      case 1: $aux -> sexo = "Masculino"; break;
	      case 2: $aux -> sexo = "Femenino"; break;
	     }

		
            $alumno[] = $aux;
          }

          echo json_encode($alumno);
          
	  $res->close( );
          $this->mysqli->close( );
      }

      public function login()
      {         
          $password = md5($this->contrasena); 
	  //echo '  '.$password;

          $sql = "select codigo, contrasena FROM alumnos WHERE codigo='$this->codigo' and contrasena='$password' and status='1'";
    	  $res = $this->mysqli->query( $sql );
	  $max = $res->num_rows;

          if( $max!=0 )
          {
	    $res->data_seek( $i );
            $obj = $res->fetch_object( );
	
            $data = '';
	    $data -> status = 'Success';
		
          } else {

	    $res->data_seek( $i );
            $obj = $res->fetch_object( );
	
            $data = '';
	    $data -> status = 'Fail';
		
	  }

          echo json_encode($data);
          
	  $res->close( );
          $this->mysqli->close( );

      }

   }
?>