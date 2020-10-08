<?php
    	error_reporting(0);
    require_once "../../core/conexion.php";
	
	

    Class Buscador extends Conexion
	{
	
	public $persona_buscada;

	public $id_docente;

	public $id_alumno;


	public function __construct( ) 
    	{ 
      	   parent::__construct( );
    	}

	public function listaPersonas()
	{

	  
	$sql = "select 
	a.id_alumno, CONCAT(a.apellido_paterno, ' ',a.apellido_materno, ' ',a.nombre) as nombre_completo, a.fotografia, '1' as tipo 
	from alumnos as a 
	where CONCAT(a.nombre, a.apellido_paterno, a.apellido_materno) like '%$this->persona_buscada%' 
	and status='1'
	union
	select 
	d.id_docente, CONCAT(d.apellido_paterno, ' ',d.apellido_materno, ' ',d.nombre) as nombre_completo, d.fotografia, '2' as tipo  
	from docentes as d 
	where CONCAT(d.nombre, d.apellido_paterno, d.apellido_materno) like '%$this->persona_buscada%' 
	and status='1'";

	$res = $this->mysqli->query( $sql );
	  
	$max = $res->num_rows;

        if( $max == 0 ){
	
	$otra = '';
        $otra -> resultado = 'vacio';
        $per[] = $otra;
        echo json_encode($per);

	} else {
	
	for( $i=0; $i<$max; $i++ )  
	{
	    
	  $res->data_seek( $i );            
	  $obj = $res->fetch_object( );	
            
	  
	  $aux = '';
	    
	  $aux -> id = $obj->id_alumno;
	  $aux -> nombre_completo = $obj->nombre_completo;
	  $aux -> fotografia = 'http://agavia.com.mx/proyectos/siip/uploads/'.$obj->fotografia;
	  $aux -> tipo = $obj->tipo;
	    
	  $personas[] = $aux;

	}

	echo json_encode($personas);
	
$res->close( );
	  $this->mysqli->close( );
	
	}
	
	}

       
public function obtenerAlumno()	
{	  
	  $sql = "SELECT al.id_alumno as id, al.fotografia, CONCAT(al.apellido_paterno, ' ',al.apellido_materno, ' ', al.nombre)as nombre_completo, al.sexo, 
	  p.nombre as nombre_pais, prog.nombre as nombre_programa, asp.correo as email
	  FROM alumnos as al 
	  join paises as p on al.id_pais = p.id_pais 
	  join programas as prog on al.id_programa = prog.id_programa
	  join aspirantes as asp on al.id_aspirante = asp.id_aspirante
	  where al.id_alumno = '$this->id_alumno' and al.status = '1'";

	$res = $this->mysqli->query( $sql );	  
	$max = $res->num_rows;

	if( $max!=0 )  
	{
	    
	  $res->data_seek( 0 );
            
	  $obj = $res->fetch_object( );
	
            
	  $aux = '';
	  $aux -> id = $obj->id;

	  $aux -> fotografia = 'http://agavia.com.mx/proyectos/siip/uploads/'.$obj->fotografia;
	  $aux -> nombre_completo = $obj->nombre_completo;
	  $aux -> sexo = $obj->sexo;
	  $aux -> nombre_pais = $obj->nombre_pais;
	  $aux -> nombre_programa = $obj->nombre_programa;
	  $aux -> email = $obj->email;
	  $alumno[] = $aux;
          
	}

	echo json_encode($alumno);
            
	$res->close( );          
	$this->mysqli->close( );
       
}


public function obtenerCVUAlumno(){

	  $sql2 = "SELECT descripcion as descripcion, fecha_inicio as fecha
	  FROM cvu_alumnos 
	  where id_alumno = '$this->id_alumno' and status = '1'";

	$res2 = $this->mysqli->query( $sql2 );	  
	$max2 = $res2->num_rows;

        if( $max2!=0 )  
	{

            for( $i=0; $i<$max2; $i++ )
            {
	      $res2->data_seek( $i );
              $obj2 = $res2->fetch_object( );
	
              $aux2 = '';

	  $aux2 -> descripcion = $obj2->descripcion;
	  $aux2 -> fecha = $obj2->fecha;
	  $alumno2[] = $aux2;
            }
          
	}

	echo json_encode($alumno2);
            
	$res2->close( );          
	$this->mysqli->close( );

}



public function obtenerDocente()
	
{
	  
	  $sql = "SELECT do.id_docente as id, do.fotografia, CONCAT(do.apellido_paterno, ' ', do.apellido_materno, ' ', do.nombre)as nombre_completo, do.sexo, do.correo as email, p.nombre as nombre_pais
	  FROM docentes as do 
	  join paises as p on do.id_pais = p.id_pais 
	  where do.id_docente = '$this->id_docente' and do.status = '1'";


	$res = $this->mysqli->query( $sql );	  
	$max = $res->num_rows;

	if( $max!=0 )
	{
	    
	  $res->data_seek( 0 );
            
	  $obj = $res->fetch_object( );
	
            
	  $aux = '';
	  $aux -> id = $obj->id;

	  $aux -> fotografia = 'http://agavia.com.mx/proyectos/siip/uploads/'.$obj->fotografia;
	  $aux -> nombre_completo = $obj->nombre_completo;
	  $aux -> sexo = $obj->sexo;
	  $aux -> nombre_pais = $obj->nombre_pais;
	  $aux -> nombre_programa = 'Maestría en Tecnologías de Información';
	  $aux -> email = $obj->email;
	  $docente[] = $aux;
          
	}

	echo json_encode($docente);
            
	$res->close( );          
	$this->mysqli->close( );
       
}

public function obtenerCVUDocente(){

	  $sql2 = "SELECT descripcion as descripcion, fecha as fecha
	  FROM cvu_docentes 
	  where id_docente = '$this->id_docente' and status = '1'";

	$res2 = $this->mysqli->query( $sql2 );	  
	$max2 = $res2->num_rows;

        if( $max2!=0 )  
	{

            for( $i=0; $i<$max2; $i++ )
            {
	      $res2->data_seek( $i );
              $obj2 = $res2->fetch_object( );
	
              $aux2 = '';

	  $aux2 -> descripcion = $obj2->descripcion;
	  $aux2 -> fecha = $obj2->fecha;
	  $docente2[] = $aux2;
            }
          
	}

	echo json_encode($docente2);

	$res2->close( );          
	$this->mysqli->close( );


}

 
   
}

?>