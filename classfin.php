<?php
class finite
{
	var $id_exp;
  var $id_fin;
  var $final;
  var $id_user;


	function finite($val1='', $val2='') // declara el constructor, si trae el id de ficha la busca , si no, trae todas las fichas
	{
		if ($val1!='')
		{       
			$obj_Gurpo=new Conexion();
			$result=$obj_Gurpo->consulta("select * from fin where id_exp = '$val1' and id_fin = '$val2'"); // ejecuta la consulta para traer la ficha
      if($obj_Gurpo->num_rows()!=0){
        $row=  finite_fetch_array($result);
        $this->id_exp=$row['id_exp'];
        $this->id_fin=$row['id_fin'];
        $this->final=$row['final'];
        $this->id_user=$row['id_user'];
      }
      else{

      }
    }
  }
	function getfinite($val1) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las fichas
  {
    $obj_Gurpo=new Conexion();
    $query = "select * from fin where id_exp = '$val1' order by id_fin ASC";
                    $result=$obj_Gurpo->consulta($query); // ejecuta la consulta para traer los informantes   
                    return $result; // retorna todos los informantes
                    
                  }

	// metodos que devuelven valores
                  function getid_exp()
                  { return $this->id_exp;}
                  function getid_fin()
                  { return $this->id_fin;}         
                  function getfinal()
                  { return $this->final;}                  
                  function getId_Usuario()
                  { return $this->id_user;} 


	// metodos que setean los valores

                  function setid_exp($val)
                  {  $this->id_exp=$val;} 

                  function setid_fin($val)
                  {  $this->id_fin=$val;} 

                  function setfinal($val)
                  {  $this->final=$val;}  

                  function setId_Usuario($val)
                  {  $this->id_user=$val;}

	function updatefinite()	// actualiza la identificacion cargada en los atributos
	{
   $obj_Gurpo=new Conexion();
   $qverifica="select * from finalcion where id_fin = $this->id_fin and id_exp=$this->id_exp";
   $obj_Gurpo->consulta($qverifica);
   if($obj_Gurpo->num_rows()<>0){                          
     $query="update finites set "
     . "apellido='$this->apellido', "
     . "nombre='$this->nombre', "
     . "edad='$this->edad', "
     . "parentesco='$this->parentesco',  "
     . "observacion='$this->observacion'"
     . "where id_fin = '$this->id_fin' and id_exp='$this->id_exp'";
			$obj_Gurpo->consulta($query); // ejecuta la consulta para traer la identificacion 
			return '<div id="mensaje"><p/><h4>Se Modifico:  '.$obj_Gurpo->getAffect().'  registro con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }
        function updateEstadofinite($val)	// actualiza el estado de la salida
        {
         $obj_Gurpo=new Conexion();                       
         $qverifica="select * from finalcion where final='$this->final";                      
         $obj_Gurpo->consulta($qverifica);
         if($obj_Gurpo->num_rows()<>0){                          
           $query="update salidas_mes set estado='FINALIZADA' where id_salida_mes = '$val'";                      
			$obj_Gurpo->consulta($query); // ejecuta la consulta para actualizar estado 
      $query1="update precios set consistir=0 where id_salida_mes = '$val'";                    
                        $obj_Gurpo->consulta($query1);// ejecuta la consulta para desconsistir
                        date_default_timezone_set('America/Argentina/Tucuman');
                        $fecha = date('Y-m-d');
                        $hora=  date("H:i:s");  
                        $query2="insert into reapertura( fecha, hora, id_salida_mes, id_usuario) values ('$fecha', '$hora', '$val', '$this->id_user')";
                        $obj_Gurpo->consulta($query2);
                        $resultado="select salidas_mes.estado, salidas_mes.id_salida_mes, salidas_mes.anio, salidas_mes.mes, salidas_mes.id_salida, salidas.panel, salidas.tarea, informantes.cod_informante, informantes.empresa 
                        from informantes, salidas, salidas_mes
                        where salidas_mes.id_salida = salidas.id_salida 
                        AND salidas.id_informante=informantes.cod_informante
                        AND salidas_mes.id_salida_mes='$val'                                               
                        order by anio , mes , panel, tarea, cod_informante ASC";                        
                        $result=$obj_Gurpo->consulta($resultado);
			return $result; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }
        function Buscarfinite()	// inserta la identificacion cargada en los atributos
        {
         $obj_Gurpo=new Conexion();                    
         $qverifica="select * from salidas_mes "
         ."where anio='$this->año' and mes='$this->mes' and id_salida='$this->id_salida'";                        
         $result=$obj_Gurpo->consulta($qverifica);                       
         if($obj_Gurpo->num_rows()<>0){                      
			return $result;// retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: AUN NO FUE CARGADA LA SALIDA, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS</h4></div>'; 
   }
 }	
	function insertfinite($val1)	// inserta la identificacion cargada en los atributos
	{
   $obj_Gurpo=new Conexion();
   $ypf="select * from fin where id_exp=$this->id_exp and final=$val1";
   $obj_Gurpo->consulta($ypf);
   if($obj_Gurpo->num_rows()==0){



     $obj_Gurpo=new Conexion();
     $qfinite="select max(id_fin) from fin where id_exp=$this->id_exp";
     $result=$obj_Gurpo->consulta($qfinite);
     $row=pg_fetch_array($result);                     
     if($row['max']>0){
      $this->id_fin=$row['max']+1;
    }
    else{
      $this->id_fin=1;
    }
    $qverifica="select * from fin where id_fin = $this->id_fin and id_exp=$this->id_exp";
    $obj_Gurpo->consulta($qverifica);                       
    if($obj_Gurpo->num_rows()==0){
      $query="insert into fin(id_fin, final, id_exp, id_usuario ) values ($this->id_fin, '$this->final', '$this->id_exp',$this->id_user)";			                                              
                        $obj_Gurpo->consulta($query); // ejecuta la consulta para traer la identificacion
			return '<div id="mensaje"><p/><h4>El expediente Finalizo con éxito</h4></div>'; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA finalCIÓN, COMPRUEBE LA OPCIÓN ELEGIDA </h4></div>'; 
   }

 }
 else{
  return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA finalCION, COMPRUEBE LA OPCIÓN ELEGIDA</h4></div>'; 
}
}	
	function deletefinite($val1,$val2)	// elimina la identificacion
	{ //select * from hogar where id_exp=$this->id_exp and id_numero = $this->id_numero
   $obj_Gurpo=new Conexion();
   $query="delete from fin where id_exp=$val1 and id_fin=$val2";
			$obj_Gurpo->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se Habilito el Expediente</h4></div>'; // retorna todos los registros afectados

   }
        function Cerrarfinite($val)	// elimina la identificacion
        {
         $obj_Gurpo=new Conexion();
         $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
         $obj_Gurpo->consulta($qverifica);                        
         if($obj_Gurpo->num_rows()== 0){
           $query="update salidas_mes set estado = 'CERRADA' where id_salida_mes=$val";                        
			$obj_Gurpo->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se cerro:  '.$obj_Gurpo->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
      return '<div id="mensaje"><p/><h4>NO ES POSIBLE CERRAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
    } 
  }
        function Finalizarfinite($val)	// elimina la identificacion
        {
         $obj_Gurpo=new Conexion();
         $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
         $obj_Gurpo->consulta($qverifica);                        
         if($obj_Gurpo->num_rows()== 0){
           $query="update salidas_mes set estado = 'FINALIZADA' where id_salida_mes=$val";                        
			$obj_Gurpo->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se Finalizo:  '.$obj_Gurpo->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
      return '<div id="mensaje"><p/><h4>NO ES POSIBLE FINALIZAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
    } 
  }
        function buscaFormularios($val)	// elimina la identificacion
        {
         $obj_Gurpo=new Conexion();
         if ($val!=''){
          $query="select formularios.id_formulario, formularios.nombre from formularios, informantes_formularios
          where informantes_formularios.id_informante= $val and informantes_formularios.id_formulario=formularios.id_formulario;";
			$result=$obj_Gurpo->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return $result;    
    }
    else{
      $query="select formularios.id_formulario, formularios.nombre from formularios;";
			$result=$obj_Gurpo->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return $result;      
    }

  }	

}
?>