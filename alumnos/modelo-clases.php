<?php
  /**
  * Clase que gestiona lo relacionado a la tabla clases
  */
  
  require_once "../core/conexion.php";
  
  class Clases extends Conexion 
  {
    public $id_clase;
    public $id_programa;
    public $id_ciclo;
    public $id_asignatura;
    public $id_docente;
    public $id_aula;
    public $nrc;
    public $cupo;
    public $lun_inicio;
    public $mar_inicio;
    public $mie_inicio;
    public $jue_inicio;
    public $vie_inicio;
    public $sab_inicio;
    public $lun_fin;
    public $mar_fin;
    public $mie_fin;
    public $jue_fin;
    public $vie_fin;
    public $sab_fin;
    public $status;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarClase( )
    {
      $sql = "select id_clase from clases order by id_clase";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_clase = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	$this->id_clase = $obj->id_clase;
        $this->id_clase++;
      }
      
      $sql = "insert into clases values ( '$this->id_clase', '$this->id_programa', '$this->id_ciclo', '$this->id_asignatura', '$this->id_docente',
      '$this->id_aula', '$this->nrc', '$this->cupo', '$this->lun_inicio', '$this->mar_inicio', '$this->mie_inicio', '$this->jue_inicio', 
      '$this->vie_inicio', '$this->sab_inicio', '$this->lun_fin', '$this->mar_fin', '$this->mie_fin', '$this->jue_fin', '$this->vie_fin', 
      '$this->sab_fin', '$this->status' )";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function eliminarClase( )
    {
      $sql = "update clases set status='0' where id_clase='$this->id_clase'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarClase( )
    {
      $sql = "update clases set id_asignatura='$this->id_asignatura', id_docente='$this->id_docente', id_aula='$this->id_aula', nrc='$this->nrc',
      cupo='$this->cupo', lun_inicio='$this->lun_inicio', mar_inicio='$this->mar_inicio', mie_inicio='$this->mie_inicio', jue_inicio='$this->jue_inicio', 
      vie_inicio='$this->vie_inicio', sab_inicio='$this->sab_inicio', lun_fin='$this->lun_fin', mar_fin='$this->mar_fin', mie_fin='$this->mie_fin',
      jue_fin='$this->jue_fin', vie_fin='$this->vie_fin', sab_fin='$this->sab_fin' where id_clase='$this->id_clase'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerClase( )
    {  
      $sql = "select * from clases where id_clase='$this->id_clase' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	$res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
	$this->id_programa = $obj->id_programa;
	$this->id_ciclo = $obj->id_ciclo;
	$this->id_asignatura = $obj->id_asignatura;
	$this->id_docente = $obj->id_docente;	
	$this->id_aula = $obj->id_aula;
	$this->nrc = $obj->nrc;
	$this->cupo = $obj->cupo;
	$this->lun_inicio = $obj->lun_inicio;
	$this->mar_inicio = $obj->mar_inicio;
	$this->mie_inicio = $obj->mie_inicio;
	$this->jue_inicio = $obj->jue_inicio;
	$this->vie_inicio = $obj->vie_inicio;
	$this->sab_inicio = $obj->sab_inicio;
	$this->lun_fin = $obj->lun_fin;
	$this->mar_fin = $obj->mar_fin;
	$this->mie_fin = $obj->mie_fin;
	$this->jue_fin = $obj->jue_fin;
	$this->vie_fin = $obj->vie_fin;
	$this->sab_fin = $obj->sab_fin;	
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaClasesCiclo( )
    {
      $sql = "select * from clases where id_programa='$this->id_programa' and id_ciclo='$this->id_ciclo' and status='1' order by id_clase";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_clase[$i] = $obj->id_clase;
	$this->id_asignatura[$i] = $obj->id_asignatura;
	$this->id_docente[$i] = $obj->id_docente;
	$this->id_aula[$i] = $obj->id_aula;
	$this->nrc[$i] = $obj->nrc;
	$this->cupo[$i] = $obj->cupo;
	$this->lun_inicio[$i] = $obj->lun_inicio;
	$this->mar_inicio[$i] = $obj->mar_inicio;
	$this->mie_inicio[$i] = $obj->mie_inicio;
	$this->jue_inicio[$i] = $obj->jue_inicio;
	$this->vie_inicio[$i] = $obj->vie_inicio;
	$this->sab_inicio[$i] = $obj->sab_inicio;
	$this->lun_fin[$i] = $obj->lun_fin;
	$this->mar_fin[$i] = $obj->mar_fin;
	$this->mie_fin[$i] = $obj->mie_fin;
	$this->jue_fin[$i] = $obj->jue_fin;
	$this->vie_fin[$i] = $obj->vie_fin;
	$this->sab_fin[$i] = $obj->sab_fin;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaClasesDocente( )
    {
      $sql = "select * from clases where id_programa='$this->id_programa' and id_docente='$this->id_docente' and id_ciclo='$this->id_ciclo' and status='1'
      order by id_clase";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	$res->data_seek( $i );
        $obj = $res->fetch_object( );
	
	$this->id_clase[$i] = $obj->id_clase;
	$this->id_asignatura[$i] = $obj->id_asignatura;
	$this->id_aula[$i] = $obj->id_aula;
	$this->nrc[$i] = $obj->nrc;
	$this->cupo[$i] = $obj->cupo;
	$this->lun_inicio[$i] = $obj->lun_inicio;
	$this->mar_inicio[$i] = $obj->mar_inicio;
	$this->mie_inicio[$i] = $obj->mie_inicio;
	$this->jue_inicio[$i] = $obj->jue_inicio;
	$this->vie_inicio[$i] = $obj->vie_inicio;
	$this->sab_inicio[$i] = $obj->sab_inicio;
	$this->lun_fin[$i] = $obj->lun_fin;
	$this->mar_fin[$i] = $obj->mar_fin;
	$this->mie_fin[$i] = $obj->mie_fin;
	$this->jue_fin[$i] = $obj->jue_fin;
	$this->vie_fin[$i] = $obj->vie_fin;
	$this->sab_fin[$i] = $obj->sab_fin;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function verificarNRC( )
    {
      $sql = "select * from clases where nrc='$this->nrc' and id_ciclo='$this->id_ciclo' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	return true;
      }
      else
      {
	return false;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function verificarNRC2( )
    {
      $sql = "select * from clases where nrc='$this->nrc' and id_ciclo='$this->id_ciclo' and id_clase!='$this->id_clase' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	return true;
      }
      else
      {
	return false;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>