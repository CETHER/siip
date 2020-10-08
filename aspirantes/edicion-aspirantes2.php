<?php
  require_once "../core/modelo-usuarios.php";
  require_once "modelo-aspirantes.php";
  
  session_start( );
  $obj = new Usuarios( );
  $obj->id_usuario = $_SESSION["id_usuario"];
  $obj->codigo = $_SESSION["codigo"];
  $obj->contrasena = $_SESSION["contrasena"];
  $obj->validarSession( );
  
  if( !isset( $_POST["modalidad2"] ) )
  {
    $_POST["modalidad2"] = 0;
  }
  
  if( !isset( $_POST["id_estado"] ) )
  {
    $_POST["id_estado"] = 33;
  }
  
  $exito = 0;
  if( is_uploaded_file( $_FILES["archivo"]["tmp_name"] ) )
  {
    if( $_FILES["archivo"]["size"]<5000000 )
    {
      if( $_FILES["archivo"]["type"]=="image/jpeg" || $_FILES["archivo"]["type"]=="image/pjpeg" )
      {
        move_uploaded_file( $_FILES["archivo"]["tmp_name"], "../uploads/".$_FILES["archivo"]["name"] );
        $exito = 1;
      }
    }
  }
  
  if( $_FILES["archivo"]["name"]!=null && $exito==0 )
  {
    header( "Location: edicion-aspirantes.php?id_aspirante=".$_POST["id_aspirante"]."&error=1" );
    exit( );
  }
  
  $obj2 = new Aspirantes( );
  $obj2->id_aspirante = $_POST["id_aspirante"];
  $obj2->id_orientacion = $_POST["id_orientacion"];
  $obj2->id_ciclo = $_POST["id_ciclo"];
  $obj2->id_pais = $_POST["id_pais"];
  $obj2->id_estado = $_POST["id_estado"];
  $obj2->id_estado_trabajo = $_POST["id_estado_trabajo"];
  $obj2->modalidad = $_POST["modalidad"];
  $obj2->fotografia = $_FILES["archivo"]["name"];
  $obj2->apellido_paterno = $_POST["apellido_paterno"];
  $obj2->apellido_materno = $_POST["apellido_materno"];
  $obj2->nombre = $_POST["nombre"];
  $obj2->fecha_nacimiento = $_POST["fecha_nacimiento"];
  $obj2->sexo = $_POST["sexo"];
  $obj2->curp = $_POST["curp"];
  $obj2->rfc = $_POST["rfc"];
  $obj2->correo = $_POST["correo"];
  $obj2->calle = $_POST["calle"];
  $obj2->numero_exterior = $_POST["numero_exterior"];
  $obj2->numero_interior = $_POST["numero_interior"];
  $obj2->colonia = $_POST["colonia"];
  $obj2->codigo_postal = $_POST["codigo_postal"];
  $obj2->municipio = $_POST["municipio"];
  $obj2->telefono = $_POST["telefono"];
  $obj2->celular = $_POST["celular"];
  $obj2->lugar_nacimiento = $_POST["lugar_nacimiento"];
  $obj2->grado_estudios = $_POST["grado_estudios"];
  $obj2->titulo = $_POST["titulo"];
  $obj2->universidad = $_POST["universidad"];
  $obj2->promedio = $_POST["promedio"];
  $obj2->anio_egreso = $_POST["anio_egreso"];
  $obj2->id_idioma1 = $_POST["id_idioma1"];
  $obj2->id_idioma2 = $_POST["id_idioma2"];
  $obj2->id_idioma3 = $_POST["id_idioma3"];
  $obj2->nivel_idioma1 = $_POST["nivel_idioma1"];  
  $obj2->nivel_idioma2 = $_POST["nivel_idioma2"];
  $obj2->nivel_idioma3 = $_POST["nivel_idioma3"];
  $obj2->trabajo = $_POST["trabajo"];
  $obj2->ocupacion = $_POST["ocupacion"];
  $obj2->empresa = $_POST["empresa"];
  $obj2->domicilio_trabajo = $_POST["domicilio_trabajo"];
  $obj2->municipio_trabajo = $_POST["municipio_trabajo"];
  $obj2->telefono_trabajo = $_POST["telefono_trabajo"];
  $obj2->modificarAspirante( );
  
  header( "Location: edicion-aspirantes3.php?id_aspirante=$obj2->id_aspirante" );
  exit( );
?>