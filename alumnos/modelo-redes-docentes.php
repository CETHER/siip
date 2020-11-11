<?php
  /**
  * Clase que gestiona lo relacionado a la tabla cvu_docentes
  */
  
  require_once "../core/conexion.php";
  
  class Redes_Docentes extends Conexion 
  {
    public $id_red_docente;
    public $id_docente;
    public $nombre;
    public $categoria;
    public $instituciones;
    public $fecha_inicio;
    public $url;
    public $categoria_txt;
    public $status;
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarRed( )
    {
      $sql = "select id_red_docente from redes_docentes order by id_red_docente";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_red_docente = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	      $this->id_red_docente = $obj->id_red_docente;
        $this->id_red_docente++;
      }
      
      $sql = "insert into redes_docentes values ( '$this->id_red_docente', '$this->id_docente', 
      '$this->nombre',
      '$this->categoria',
      '$this->instituciones',
      '$this->fecha_inicio',
      '$this->url',
      '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarRed( )
    {
      $sql = "update redes_docentes set status='0' where id_red_docente='$this->id_red_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarRed( )
    { 
      $sql = "update redes_docentes set 
      nombre='$this->nombre',
      categoria='$this->categoria',
      instituciones='$this->instituciones',
      fecha_inicio='$this->fecha_inicio',
      url='$this->url' 
      where id_red_docente='$this->id_red_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerRed( )
    {  
      $sql = "select * from redes_docentes where id_red_docente='$this->id_red_docente' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	      $res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
        $this->id_docente = $obj->id_docente;
        $this->nombre = $obj->nombre;
        $this->categoria = $obj->categoria;
        $this->instituciones = $obj->instituciones;
        $this->fecha_inicio = $obj->fecha_inicio;
        $this->url = $obj->url;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaRedesDocente( )
    {
      $sql = "select * from redes_docentes where id_docente='$this->id_docente' and status='1' order by fecha_inicio desc";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	      $res->data_seek( $i );
        $obj = $res->fetch_object( );
	
        $this->id_red_docente[$i] = $obj->id_red_docente;
        $this->nombre[$i] = $obj->nombre;
        $this->categoria[$i] = $obj->categoria;
        $this->instituciones[$i] = $obj->instituciones;
        $this->fecha_inicio[$i] = $obj->fecha_inicio;
        $this->url[$i] = $obj->url;
        switch( $this->categoria[$i] )
        {
          case 1: $this->categoria_txt[$i] = "Nacional"; break;
          case 2: $this->categoria_txt[$i] = "Internacional"; break;
        }
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>