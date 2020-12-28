<?php
  /**
  * Clase que gestiona lo relacionado a la tabla visitantes
  */
  
  require_once "../core/conexion.php";
  require_once "../core/modelo-paises.php";
  
  class Visitantes extends Conexion 
  {
    public $id_visitante;
    public $id_programa;
    public $id_pais;
    public $nombre;
    public $institucion;
    public $evento;
    public $fecha_inicio;
    public $fecha_termino;
    public $status;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarVisitante( )
    {
      $sql = "select id_visitante from visitantes order by id_visitante";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_visitante = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	      $this->id_visitante = $obj->id_visitante;
        $this->id_visitante++;
      }
      
      $sql = "insert into visitantes values ( 
        '$this->id_visitante', 
        '$this->id_programa', 
        '$this->id_pais', 
        '$this->nombre',
        '$this->institucion',
        '$this->evento',
        '$this->fecha_inicio',
        '$this->fecha_termino',
        '$this->status' )";
        $res = $this->mysqli->query( $sql );
      
        $this->mysqli->close( );
    }
    
    
    public function eliminarVisitante( )
    {
      $sql = "update visitantes set status='0' where id_visitante='$this->id_visitante'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarVisitante( )
    { 
      
      $sql = "update visitantes set 
      id_pais='$this->id_pais', 
      nombre='$this->nombre',
      institucion='$this->institucion',
      evento='$this->evento',
      fecha_inicio='$this->fecha_inicio',
      fecha_termino='$this->fecha_termino'
      where id_visitante='$this->id_visitante'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerVisitante( )
    {  
      $sql = "select * from visitantes where id_visitante='$this->id_visitante' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	      $res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
        $this->id_programa = $obj->id_programa;
        $this->id_pais = $obj->id_pais;
        $this->nombre = $obj->nombre;
        $this->institucion = $obj->institucion;
        $this->evento = $obj->evento;
        $this->fecha_inicio = $obj->fecha_inicio;
        $this->fecha_termino = $obj->fecha_termino;

      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaVisitantesPrograma( )
    {
      $sql = "select * from visitantes where id_programa='$this->id_programa' and status='1' order by id_visitante";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	      $res->data_seek( $i );
        $obj = $res->fetch_object( );
        
        $obj4 = new Paises( );
        $obj4->id_pais = $obj->id_pais;
        $obj4->obtenerPais( );
	
        $this->id_visitante[$i] = $obj->id_visitante;
        $this->pais[$i] = $obj4->nombre;
        $this->nombre[$i] = $obj->nombre;
        $this->institucion[$i] = $obj->institucion;
        $this->evento[$i] = $obj->evento;
        $this->fecha_inicio[$i] = $obj->fecha_inicio;
        $this->fecha_termino[$i] = $obj->fecha_termino;

      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>