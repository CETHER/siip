<?php
  /**
  * Clase que gestiona lo relacionado a la tabla noticias
  */
  
  require_once "conexion.php";
  
  class Noticias extends Conexion 
  {
    public $id_noticia;
    public $id_programa;
    public $titulo;
    public $subtitulo;
    public $descricion;
    public $fecha;
    public $imagen;
    public $status;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarNoticia( )
    {
      $sql = "select id_noticia from noticias order by id_noticia";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_noticia = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_noticia = $obj->id_noticia;
        $this->id_noticia++;
      }
      
      if( $this->imagen!=null )
      {
        $ext = pathinfo( $this->imagen, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->imagen, "../uploads/N-".$this->id_noticia.".".$ext );
	$this->imagen = "N-".$this->id_noticia.".".$ext;
      }
      
      $sql = "insert into noticias values ( '$this->id_noticia', '$this->id_programa', '$this->titulo', '$this->subtitulo', '$this->descripcion', 
      '$this->fecha', '$this->imagen', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarNoticia( )
    {
      $sql = "update noticias set status='0' where id_noticia='$this->id_noticia'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarNoticia( )
    {
      if( $this->imagen!=null )
      {
        $ext = pathinfo( $this->imagen, PATHINFO_EXTENSION );
        rename( "../uploads/".$this->imagen, "../uploads/N-".$this->id_noticia.".".$ext );
	$this->imagen = "N-".$this->id_noticia.".".$ext;
	
	$sql = "update noticias set imagen='$this->imagen' where id_noticia='$this->id_noticia'";
        $res = $this->mysqli->query( $sql );
      }
      
      $sql = "update noticias set titulo='$this->titulo', subtitulo='$this->subtitulo', descripcion='$this->descripcion', fecha='$this->fecha' 
      where id_noticia='$this->id_noticia'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerNoticia( )
    {  
      $sql = "select * from noticias where id_noticia='$this->id_noticia' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_programa = $obj->id_programa;
	$this->titulo = $obj->titulo;
	$this->subtitulo = $obj->subtitulo;
	$this->descripcion = $obj->descripcion;
	$this->fecha = $obj->fecha;
	$this->imagen = $obj->imagen;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaNoticiasPrograma( )
    {
      $sql = "select * from noticias where id_programa='$this->id_programa' and status='1' order by id_noticia";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_noticia[$i] = $obj->id_noticia;
	$this->titulo[$i] = $obj->titulo;
	$this->subtitulo[$i] = $obj->subtitulo;
	$this->descripcion[$i] = $obj->descripcion;
	$this->fecha[$i] = $obj->fecha;
	$this->imagen[$i] = $obj->imagen;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>