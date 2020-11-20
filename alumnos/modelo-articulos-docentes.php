<?php
  /**
  * Clase que gestiona lo relacionado a la tabla cvu_docentes
  */
  
  require_once "../core/conexion.php";
  require_once "../core/modelo-paises.php";
  
  class Articulos_Docentes extends Conexion 
  {
    public $id_articulo_docente;
    public $id_docente;
    public $id_pais;
    public $anio;
    public $titulo;
    public $revista;
    public $editorial;
    public $isbn;
    public $colaboracion;
    public $lgac;
    public $status;
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarArticulo( )
    {
      $sql = "select id_articulo_docente from articulos_docentes order by id_articulo_docente";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_articulo_docente = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	      $this->id_articulo_docente = $obj->id_articulo_docente;
        $this->id_articulo_docente++;
      }
      
      $sql = "insert into articulos_docentes values ( '$this->id_articulo_docente', '$this->id_docente', 
      '$this->id_pais',
      '$this->anio',
      '$this->titulo',
      '$this->revista',
      '$this->editorial',
      '$this->isbn',
      '$this->colaboracion',
      '$this->lgac',
      '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarArticulo( )
    {
      $sql = "update articulos_docentes set status='0' where id_articulo_docente='$this->id_articulo_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarArticulo( )
    { 
      $sql = "update articulos_docentes set 
      id_pais='$this->id_pais',
      anio='$this->anio',
      titulo='$this->titulo',
      revista='$this->revista',
      editorial='$this->editorial',
      isbn='$this->isbn',
      colaboracion='$this->colaboracion',
      lgac='$this->lgac' 
      where id_articulo_docente='$this->id_articulo_docente'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerArticulo( )
    {  
      $sql = "select * from articulos_docentes where id_articulo_docente='$this->id_articulo_docente' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	      $res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
        $this->id_docente = $obj->id_docente;
        $this->id_pais = $obj->id_pais;
        $this->anio = $obj->anio;
        $this->titulo = $obj->titulo;
        $this->revista = $obj->revista;
        $this->editorial = $obj->editorial;
        $this->isbn = $obj->isbn;
        $this->colaboracion = $obj->colaboracion;
        $this->lgac = $obj->lgac;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaArticulosDocente( )
    {
      $sql = "select * from articulos_docentes where id_docente='$this->id_docente' and status='1' order by anio desc";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;

      
      
      for( $i=0; $i<$max; $i++ )
      {
	      $res->data_seek( $i );
        $obj = $res->fetch_object( );
        
        $obj2 = new Paises( );
        $obj2->id_pais = $obj->id_pais;
        $obj2->obtenerPais( );
	
        $this->id_articulo_docente[$i] = $obj->id_articulo_docente;
        $this->id_pais[$i] = $obj->id_pais;
        $this->anio[$i] = $obj->anio;
        $this->titulo[$i] = $obj->titulo;
        $this->revista[$i] = $obj->revista;
        $this->editorial[$i] = $obj->editorial;
        $this->isbn[$i] = $obj->isbn;
        $this->colaboracion[$i] = $obj->colaboracion;
        $this->lgac[$i] = $obj->lgac;
        $this->pais[$i] = $obj2->nombre;
        switch( $this->colaboracion[$i] )
        {
          case 1: $this->colaboracion_txt[$i] = "Con profesores"; break;
          case 2: $this->colaboracion_txt[$i] = "Con estudiantes"; break;
          case 3: $this->colaboracion_txt[$i] = "Con profesores y estudiantes"; break;
        }

      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>