<?php
  /**
  * Clase que gestiona lo relacionado a la tabla organismos
  */
  
  require_once "../core/conexion.php";
  require_once "../core/modelo-paises.php";
  require_once "../core/modelo-estados.php";
  
  class Organismos extends Conexion 
  {
    public $id_organismo;
    public $id_programa;
    public $id_estado;
    public $id_pais;
    public $nombre;
    public $titular;
    public $ciudad;
    public $correo;
    public $telefono;
    public $status;
    
    
    public function __construct( ) 
    { 
      parent::__construct( );
    }
    
    
    public function agregarOrganismo( )
    {
      $sql = "select id_organismo from organismos order by id_organismo";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max==0 )
      {
        $this->id_organismo = 1;
      }
      else
      {
        $res->data_seek( $max-1 );
        $obj = $res->fetch_object( );
	
	      $this->id_organismo = $obj->id_organismo;
        $this->id_organismo++;
      }
      
      $sql = "insert into organismos values ( 
        '$this->id_organismo', 
        '$this->id_programa', 
        '$this->id_estado', 
        '$this->id_pais', 
        '$this->nombre', 
        '$this->titular', 
        '$this->ciudad', 
        '$this->correo', 
        '$this->telefono', 
        '$this->status' )";
        $res = $this->mysqli->query( $sql );
      
        $this->mysqli->close( );
    }
    
    
    public function eliminarOrganismo( )
    {
      $sql = "update organismos set status='0' where id_organismo='$this->id_organismo'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function modificarOrganismo( )
    { 
      
      $sql = "update organismos set 
      id_estado='$this->id_estado', 
      id_pais='$this->id_pais', 
      nombre='$this->nombre', 
      titular='$this->titular', 
      ciudad='$this->ciudad', 
      correo='$this->correo',
      telefono='$this->telefono' 
      where id_organismo='$this->id_organismo'";
      $res = $this->mysqli->query( $sql );
      
      $this->mysqli->close( );
    }
    
    
    public function obtenerOrganismo( )
    {  
      $sql = "select * from organismos where id_organismo='$this->id_organismo' and status='1'";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      if( $max!=0 )
      {
	      $res->data_seek( 0 );
        $obj = $res->fetch_object( );
	
        $this->id_programa = $obj->id_programa;
        $this->id_estado = $obj->id_estado;
        $this->id_pais = $obj->id_pais;
        $this->nombre = $obj->nombre;
        $this->titular = $obj->titular;
        $this->ciudad = $obj->ciudad;
        $this->correo = $obj->correo;
        $this->telefono = $obj->telefono;
      }
      
      $res->close( );
      $this->mysqli->close( );
    }
    
    
    public function listaOrganismosPrograma( )
    {
      $sql = "select * from organismos where id_programa='$this->id_programa' and status='1' order by id_organismo";
      $res = $this->mysqli->query( $sql );
      $max = $res->num_rows;
      
      for( $i=0; $i<$max; $i++ )
      {
	      $res->data_seek( $i );
        $obj = $res->fetch_object( );
        
        $obj4 = new Paises( );
        $obj4->id_pais = $obj->id_pais;
        $obj4->obtenerPais( );

        $obj5 = new Estados( );
        $obj5->id_estado = $obj->id_estado;
        $obj5->obtenerEstado( );
	
        $this->id_organismo[$i] = $obj->id_organismo;
        $this->estado[$i] = $obj5->nombre;
        $this->pais[$i] = $obj4->nombre;
        $this->nombre[$i] = $obj->nombre;
        $this->titular[$i] = $obj->titular;
        $this->ciudad[$i] = $obj->ciudad;
        $this->correo[$i] = $obj->correo;
        $this->telefono[$i] = $obj->telefono;

      }
      
      $res->close( );
      $this->mysqli->close( );
    }
  }
?>