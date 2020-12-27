<?php
  /**
  * Clase que gestiona lo relacionado a la tabla cvu_docentes
  */
  
  require_once "../core/conexion.php";
  require_once "../core/modelo-paises.php";
  
  class Eventos_Docentes extends Conexion 
  {
    public $id_evento_docente;
    public $id_docente;
    public $id_pais;
    public $evento;
    public $ponencia;
    public $ciudad;
    public $institucion;
    public $fecha_inicio;
    public $fecha_termino;
    public $status;

    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarEvento( )
    {
      $sql = "select id_evento_docente from eventos_docentes order by id_evento_docente";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_evento_docente = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	      $this->id_evento_docente = $obj->id_evento_docente;
        $this->id_evento_docente++;
      }
      
      $sql = "insert into eventos_docentes values ( '$this->id_evento_docente', '$this->id_docente', 
      '$this->id_pais',
      '$this->evento',
      '$this->ponencia',
      '$this->ciudad',
      '$this->institucion',
      '$this->fecha_inicio',
      '$this->fecha_termino',
      '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarEvento( )
    {
      $sql = "update eventos_docentes set status='0' where id_evento_docente='$this->id_evento_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarEvento( )
    { 
      $sql = "update eventos_docentes set 
      id_pais='$this->id_pais',
      evento='$this->evento',
      ponencia='$this->ponencia',
      ciudad='$this->ciudad',
      institucion='$this->institucion',
      fecha_inicio='$this->fecha_inicio',
      fecha_termino='$this->fecha_termino'
      where id_evento_docente='$this->id_evento_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerEvento( )
    {  
      $sql = "select * from eventos_docentes where id_evento_docente='$this->id_evento_docente' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	      $res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
        $this->id_docente = $obj->id_docente;
        $this->id_pais = $obj->id_pais;
        $this->evento = $obj->evento;
        $this->ponencia = $obj->ponencia;
        $this->ciudad = $obj->ciudad;
        $this->institucion = $obj->institucion;
        $this->fecha_inicio = $obj->fecha_inicio;
        $this->fecha_termino = $obj->fecha_termino;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaEventosDocente( )
    {
      $sql = "select * from eventos_docentes where id_docente='$this->id_docente' and status='1' order by evento desc";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      
      for( $i=0; $i<$max; $i++ )
      {
	      $res->data_seek( $i );
        $obj = $res->fetch_object( );
        
        $obj2 = new Paises( );
        $obj2->id_pais = $obj->id_pais;
        $obj2->obtenerPais( );
	
        $this->id_evento_docente[$i] = $obj->id_evento_docente;
        $this->id_pais[$i] = $obj->id_pais;
        $this->evento[$i] = $obj->evento;
        $this->ponencia[$i] = $obj->ponencia;
        $this->ciudad[$i] = $obj->ciudad;
        $this->institucion[$i] = $obj->institucion;
        $this->fecha_inicio[$i] = $obj->fecha_inicio;
        $this->fecha_termino[$i] = $obj->fecha_termino;
        $this->pais[$i] = $obj2->nombre;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>