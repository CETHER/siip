<?php
  /**
  * Clase que gestiona lo relacionado a la tabla cvu_docentes
  */
  
  require_once "../core/conexion.php";
  require_once "../core/modelo-paises.php";
  
  class Estancias_Docentes extends Conexion 
  {
    public $id_estancia_docente;
    public $id_docente;
    public $id_pais;
    public $ciudad;
    public $institucion;
    public $departamento;
    public $proyecto;
    public $fecha_inicio;
    public $fecha_termino;
    public $apoyo_financiero;
    public $monto_financiero;
    public $fuente_financiamiento;
    public $status;
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarEstancia( )
    {
      $sql = "select id_estancia_docente from estancias_docentes order by id_estancia_docente";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_estancia_docente = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	      $this->id_estancia_docente = $obj->id_estancia_docente;
        $this->id_estancia_docente++;
      }
      
      $sql = "insert into estancias_docentes values ( '$this->id_estancia_docente', '$this->id_docente', 
      '$this->id_pais',
      '$this->ciudad',
      '$this->institucion',
      '$this->departamento',
      '$this->proyecto',
      '$this->fecha_inicio',
      '$this->fecha_termino',
      '$this->apoyo_financiero',
      '$this->monto_financiero',
      '$this->fuente_financiamiento',
      '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarEstancia( )
    {
      $sql = "update estancias_docentes set status='0' where id_estancia_docente='$this->id_estancia_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarEstancia( )
    { 
      $sql = "update estancias_docentes set 
      id_pais='$this->id_pais',
      ciudad='$this->ciudad',
      institucion='$this->institucion',
      departamento='$this->departamento',
      proyecto='$this->proyecto',
      fecha_inicio='$this->fecha_inicio',
      fecha_termino='$this->fecha_termino',
      apoyo_financiero='$this->apoyo_financiero',
      monto_financiero='$this->monto_financiero',
      fuente_financiamiento='$this->fuente_financiamiento'
      where id_estancia_docente='$this->id_estancia_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerEstancia( )
    {  
      $sql = "select * from estancias_docentes where id_estancia_docente='$this->id_estancia_docente' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	      $res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
        $this->id_docente = $obj->id_docente;
        $this->id_pais = $obj->id_pais;
        $this->ciudad = $obj->ciudad;
        $this->institucion = $obj->institucion;
        $this->departamento = $obj->departamento;
        $this->proyecto = $obj->proyecto;
        $this->fecha_inicio = $obj->fecha_inicio;
        $this->fecha_termino = $obj->fecha_termino;
        $this->apoyo_financiero = $obj->apoyo_financiero;
        $this->monto_financiero = $obj->monto_financiero;
        $this->fuente_financiamiento = $obj->fuente_financiamiento;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaEstanciasDocente( )
    {
      $sql = "select * from estancias_docentes where id_docente='$this->id_docente' and status='1' order by proyecto desc";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      
      for( $i=0; $i<$max; $i++ )
      {
	      $res->data_seek( $i );
        $obj = $res->fetch_object( );
        
        $obj2 = new Paises( );
        $obj2->id_pais = $obj->id_pais;
        $obj2->obtenerPais( );
	
        $this->id_estancia_docente[$i] = $obj->id_estancia_docente;
        $this->id_pais[$i] = $obj->id_pais;
        $this->ciudad[$i] = $obj->ciudad;
        $this->institucion[$i] = $obj->institucion;
        $this->departamento[$i] = $obj->departamento;
        $this->proyecto[$i] = $obj->proyecto;
        $this->fecha_inicio[$i] = $obj->fecha_inicio;
        $this->fecha_termino[$i] = $obj->fecha_termino;
        $this->apoyo_financiero[$i] = $obj->apoyo_financiero;
        $this->monto_financiero[$i] = $obj->monto_financiero;
        $this->fuente_financiamiento[$i] = $obj->fuente_financiamiento;
        $this->pais[$i] = $obj2->nombre;
        switch( $this->apoyo_financiero[$i] )
        {
          case 1: $this->apoyo_financiero_txt[$i] = "SI"; break;
          case 2: $this->apoyo_financiero_txt[$i] = "NO"; break;
        }
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>