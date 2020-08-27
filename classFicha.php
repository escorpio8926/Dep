 <?php
 include 'classConexion.php';

 class Ficha
 {
   var $id_exp;
   var $fecha_ei;
   var $entre;
   var $dni;
   var $apellido;
   var $nombre;
   var $calle;     
   var $nro;
   var $piso;
   var $dpto;
   var $barrio;
   var $localidad;
   var $provincia;
   var $t_ali;
   var $p_ali;
   var $meren;
   var $meren_co;
   var $muni;
   var $id_usuario;
   var $padron;
   var $telcon;
   var $muni1;
   var $muni2;
   var $muni3;
   var $encuestador;


	function Ficha($val1='') // declara el constructor, si trae el id de ficha la busca , si no, trae todas las fichas
	{
		if ($val1!='')
		{
			$obj_Ficha=new Conexion();
			$result=$obj_Ficha->consulta("select * from ficha_exp where id_exp = '$val1'"); // ejecuta la consulta para traer la ficha
      $row=  pg_fetch_array($result);
      $this->id_exp=$row['id_exp'];   
      $this->fecha_ei=$row['fecha_ei'];
      $this->entre=$row['entre'];
      $this->dni=$row['dni'];
      $this->apellido=$row['apellido'];
      $this->nombre=$row['nombre'];
      $this->calle=$row['calle'];
      $this->nro=$row['nro'];
      $this->piso=$row['piso'];
      $this->dpto=$row['dpto'];
      $this->barrio=$row['barrio'];
      $this->localidad=$row['localidad'];
      $this->provincia=$row['provincia'];
      $this->t_ali=$row['t_ali'];
      $this->p_ali=$row['p_ali'];
      $this->meren=$row['meren'];
      $this->meren_co=$row['meren_co'];
      $this->muni=$row['muni'];
      $this->muni1=$row['muni1'];
      $this->muni2=$row['muni2'];
      $this->muni3=$row['muni3'];
      $this->padron=$row['padron'];
      $this->encuestador=$row['encuestador'];
      $this->telcon=$row['telcon'];
      $this->id_user=$row['id_usuario'];
    }
  }
	function getFicha($val1,$val2) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las fichas
  {
    if($val2>1){
      $obj_Ficha=new Conexion();
      $query = "select * from ficha_exp order by id_exp ASC";
                            $result=$obj_Ficha->consulta($query); // ejecuta la consulta para traer las fichas                             
                            return $result; // retorna todas las fichas
                          }
                          else{
                            $obj_Ficha=new Conexion();
                            $query = "select * from ficha_exp where id_usuario = '$val1' order by id_exp ASC";
                            $result=$obj_Ficha->consulta($query); // ejecuta la consulta para traer los informantes   
                            return $result; // retorna todos los informantes
                          }
                        }

	// metodos que devuelven valores
                        function getid_exp()
                        { return $this->id_exp;}    
                        function getfecha_ei()
                        { return $this->fecha_ei;}
                        function getentre()
                        { return $this->entre;}     
                        function getDni()
                        { return $this->dni;}
                        function getApellido()
                        { return $this->apellido;}
                        function getNombre()
                        { return $this->nombre;} 
                        function getcalle()
                        { return $this->calle;} 
                        function getnro()
                        { return $this->nro;}
                        function getpiso()
                        { return $this->piso;}
                        function getdpto()
                        { return $this->dpto;}
                        function getbarrio()
                        { return $this->barrio;}
                        function getlocalidad()
                        { return $this->localidad;}
                        function getprovincia()
                        { return $this->provincia;}
                        function gett_ali()
                        { return $this->t_ali;}
                        function getp_ali()
                        { return $this->p_ali;}
                        function getmeren()
                        { return $this->meren;}
                        function getmeren_co()
                        { return $this->meren_co;}
                        function getmuni()
                        { return $this->muni;}
                        function getmuni1()
                        { return $this->muni1;}
                        function getmuni2()
                        { return $this->muni2;}
                        function getmuni3()
                        { return $this->muni3;}
                        function getpadron()
                        { return $this->padron;}
                        function gettelcon()
                        { return $this->telcon;}
                        function getencuestador()
                        { return $this->encuestador;}
                        function getId_Usuario()
                        { return $this->id_user;} 


	// metodos que setean los valores

                        function setid_exp($val)
                        {  $this->id_exp=$val;} 

                        function setfecha_ei($val)
                        {  $this->fecha_ei=$val;} 

                         function setentre($val)
                        {  $this->entre=$val;} 

                        function setDni($val)
                        {  $this->dni=$val;}  

                        function setApellido($val)
                        {  $this->apellido=$val;}

                        function setNombre($val)
                        {  $this->nombre=$val;}

                        function setcalle($val)
                        {  $this->calle=$val;} 

                        function setnro($val)
                        {  $this->nro=$val;}

                        function setpiso($val)
                        { $this->piso=$val;}

                        function setdpto($val)
                        { $this->dpto=$val;}

                        function setbarrio($val)
                        { $this->barrio=$val;}

                        function setlocalidad($val)
                        { $this->localidad=$val;} 

                        function setprovincia($val)
                        { $this->provincia=$val;}

                        function sett_ali($val)
                        { $this->t_ali=$val;}

                          function setp_ali($val)
                        { $this->p_ali=$val;}

                        function setmeren($val)
                        { $this->meren=$val;} 

                        function setmeren_co($val)
                        { $this->meren_co=$val;}

                        function setmuni($val)
                        { $this->muni=$val;} 

                        function setId_Usuario($val)
                        {  $this->id_user=$val;}

                        function setmuni1($val)
                        {$this->muni1=$val;}

                        function setmuni2($val)
                        {$this->muni2=$val;}

                        function setmuni3($val)
                        {$this->muni3=$val;}

                        function setpadron($val)
                        {$this->padron=$val;}

                        function settelcon($val)
                        {$this->telcon=$val;}

                        function setencuestador($val)
                        {$this->encuestador=$val;}

	function updateFicha()	// actualiza la identificacion cargada en los atributos
	{
   $obj_Ficha=new Conexion();
   $qverifica="select * from ficha_exp where dni='$this->dni'";                                  
   $obj_Ficha->consulta($qverifica);
   if($obj_Ficha->num_rows()<>0){                          
     $query="update ficha_exp set id_exp='$this->id_exp', "
     . "fecha_ei='$this->fecha_ei', "
     . "entre='$this->entre', "
     . "apellido='$this->apellido', "
     . "nombre='$this->nombre', "
     . "calle='$this->calle', "
     . "nro='$this->nro'," 
     . "piso='$this->piso',"
     . "dpto='$this->dpto',"
     . "barrio='$this->barrio', "
     . "localidad='$this->localidad', "
     . "provincia='$this->provincia', "
     . "t_ali='$this->t_ali', "
     . "muni='$this->muni', "
     . "muni1='$this->muni1', "
     . "muni2='$this->muni2', "
     . "muni3='$this->muni3', "
     . "encuestador='$this->encuestador', "
     . "telcon='$this->telcon', "
     . "padron='$this->padron', "
     . "meren='$this->meren', "
     . "meren_co='$this->meren_co', "
     . "p_ali='$this->p_ali', "
     . "id_usuario='$this->id_user'"
     . "where dni='$this->dni'";                       
			$obj_Ficha->consulta($query); // ejecuta la consulta para traer la identificacion 
			return '<div id="mensaje"><p/><h4>La ficha número:  '.$this->id_exp.'  fue modificada con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
      return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA FICHA NUMERO '.$this->id_exp.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
    }
  }
        function updateEstadoSalidaMes($val)	// actualiza el estado de la salida
        {
         $obj_Ficha=new Conexion();                       
         $qverifica="select * from salidas_mes where id_salida_mes='$val'";                      
         $obj_Ficha->consulta($qverifica);
         if($obj_Ficha->num_rows()<>0){                          
           $query="update salidas_mes set estado='FINALIZADA' where id_salida_mes = '$val'";                      
			$obj_Ficha->consulta($query); // ejecuta la consulta para actualizar estado 
      $query1="update precios set consistir=0 where id_salida_mes = '$val'";                    
                        $obj_Ficha->consulta($query1);// ejecuta la consulta para desconsistir
                        date_default_timezone_set('America/Argentina/Tucuman');
                        $fecha = date('Y-m-d');
                        $hora=  date("H:i:s");  
                        $query2="insert into reapertura( fecha, hora, id_salida_mes, id_usuario) values ('$fecha', '$hora', '$val', '$this->id_user')";
                        $obj_Ficha->consulta($query2);
                        $resultado="select salidas_mes.estado, salidas_mes.id_salida_mes, salidas_mes.anio, salidas_mes.mes, salidas_mes.id_salida, salidas.panel, salidas.tarea, informantes.cod_informante, informantes.empresa 
                        from informantes, salidas, salidas_mes
                        where salidas_mes.id_salida = salidas.id_salida 
                        AND salidas.id_informante=informantes.cod_informante
                        AND salidas_mes.id_salida_mes='$val'                                               
                        order by anio , mes , panel, tarea, cod_informante ASC";                        
                        $result=$obj_Ficha->consulta($resultado);
			return $result; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }
        function BuscarSalidaMes()	// inserta la identificacion cargada en los atributos
        {
         $obj_Ficha=new Conexion();                    
         $qverifica="select * from salidas_mes "
         ."where anio='$this->año' and mes='$this->mes' and id_salida='$this->id_salida'";                        
         $result=$obj_Ficha->consulta($qverifica);                       
         if($obj_Ficha->num_rows()<>0){                      
			return $result;// retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: AUN NO FUE CARGADA LA SALIDA, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS</h4></div>'; 
   }
 }	
	function insertFicha()	// inserta la identificacion cargada en los atributos
	{
   $obj_Ficha=new Conexion();
   $qverifica1="select * from ficha_exp where id_exp=$this->id_exp";
   $obj_Ficha->consulta($qverifica1); 
  if($obj_Ficha->num_rows()==0){                
   $qverifica="select * from ficha_exp where dni='$this->dni'";
   $obj_Ficha->consulta($qverifica);                       
   if($obj_Ficha->num_rows()==0){                      
     $query="insert into ficha_exp(id_exp, fecha_ei, entre, dni, apellido, nombre, calle, nro, piso, dpto, barrio, localidad, provincia, t_ali, p_ali, meren, meren_co, muni, muni1, muni2, muni3, encuestador, telcon, padron, id_usuario ) values ('$this->id_exp','$this->fecha_ei','$this->entre', '$this->dni', '$this->apellido', '$this->nombre','$this->calle', '$this->nro', '$this->piso', '$this->dpto', '$this->barrio', '$this->localidad', '$this->provincia', '$this->t_ali','$this->p_ali','$this->meren','$this->meren_co', '$this->muni','$this->muni1','$this->muni2','$this->muni3','$this->encuestador','$this->telcon','$this->padron', '$this->id_user')";			                       
                        $obj_Ficha->consulta($query); // ejecuta la consulta para traer la identificacion
			return '<div id="mensaje"><p/><h4>La Ficha:  '.$this->id_exp.'  se guardo con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADO EL DNI '.$this->dni.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
  }  
   else
   {
      return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA FICHA NUMERO '.$this->id_exp.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }	
	function deleteFicha($val)	// elimina la identificacion
	{

   $obj_Ficha=new Conexion();                        
   $query="delete from ficha_exp where id_exp=$val;"

   . "delete from hogar where id_exp=$val;"
   . "delete from fin where id_exp=$val;"
   . "delete from comentario_hogar where id_exp=$val;"
   . "delete from evaluacion where id_exp=$val;"
   . "delete from derivacion where id_exp=$val;"
   . "delete from program where id_exp=$val;"
   . "delete from ingresos  where id_exp=$val;"
   . "delete from componente where id_exp=$val;"
   . "delete from sima where id_exp=$val;"
   . "delete from carac_hv where id_exp=$val;";             
			$obj_Ficha->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se elimino:    registro con exito</h4></div>'; // retorna todos los registros afectados

   }
        function CerrarSalidaMes($val)	// elimina la identificacion
        {
         $obj_Ficha=new Conexion();
         $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
         $obj_Ficha->consulta($qverifica);                        
         if($obj_Ficha->num_rows()== 0){
           $query="update salidas_mes set estado = 'CERRADA' where id_salida_mes=$val";                        
			$obj_Ficha->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se cerro:  '.$obj_Ficha->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
      return '<div id="mensaje"><p/><h4>NO ES POSIBLE CERRAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
    } 
  }
        function FinalizarSalidaMes($val)	// elimina la identificacion
        {
         $obj_Ficha=new Conexion();
         $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
         $obj_Ficha->consulta($qverifica);                        
         if($obj_Ficha->num_rows()== 0){
           $query="update salidas_mes set estado = 'FINALIZADA' where id_salida_mes=$val";                        
			$obj_Ficha->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se Finalizo:  '.$obj_Ficha->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
      return '<div id="mensaje"><p/><h4>NO ES POSIBLE FINALIZAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
    } 
  }
        function buscaFormularios($val)	// elimina la identificacion
        {
         $obj_Ficha=new Conexion();
         if ($val!=''){
          $query="select formularios.id_formulario, formularios.nombre from formularios, informantes_formularios
          where informantes_formularios.id_informante= $val and informantes_formularios.id_formulario=formularios.id_formulario;";
			$result=$obj_Ficha->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return $result;    
    }
    else{
      $query="select formularios.id_formulario, formularios.nombre from formularios;";
			$result=$obj_Ficha->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return $result;      
    }

  }	

}
?>