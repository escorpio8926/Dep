<?php
class drvs
{
	var $id_exp;
  var $id_drv;
  var $deriva;
  var $id_user;
  var $otro;




	function drvs($val1='', $val2='') // declara el constructor, si trae el id de ficha la busca , si no, trae todas las fichas
	{
		if ($val1!='')
		{       
			$obj_Gurpo=new Conexion();
			$result=$obj_Gurpo->consulta("select * from derivacion where id_exp = '$val1' and id_drv = '$val2'"); // ejecuta la consulta para traer la ficha
      if($obj_Gurpo->num_rows()!=0){
        $row=  drvs_fetch_array($result);
        $this->id_exp=$row['id_exp'];
        $this->id_drv=$row['id_drv'];
        $this->deriva=$row['deriva'];
        $this->deriva=$row['otro'];
      }
      else{

      }
    }
  }
	function getdrvs($val1) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las fichas
  {
    $obj_Gurpo=new Conexion();
    $query = "select * from derivacion where id_exp = '$val1' order by id_drv ASC";
                    $result=$obj_Gurpo->consulta($query); // ejecuta la consulta para traer los informantes   
                    return $result; // retorna todos los informantes
                    
                  }

	// metodos que devuelven valores
                  function getid_exp()
                  { return $this->id_exp;}
                  function getid_drv()
                  { return $this->id_drv;}         
                  function getderiva()
                  { return $this->deriva;}                  
                  function getId_Usuario()
                  { return $this->id_user;}
                  function getotro()
                  { return $this->otro;} 


	// metodos que setean los valores

                  function setid_exp($val)
                  {  $this->id_exp=$val;} 

                  function setid_drv($val)
                  {  $this->id_drv=$val;} 

                  function setderiva($val)
                  {  $this->deriva=$val;}  

                  function setId_Usuario($val)
                  {  $this->id_user=$val;}

                  function setotro($val)
                  {  $this->otro=$val;}

	function updatedrvs()	// actualiza la identificacion cargada en los atributos
	{
   $obj_Gurpo=new Conexion();
   $qverifica="select * from derivacion where id_drv = $this->id_drv and id_exp=$this->id_exp";
   $obj_Gurpo->consulta($qverifica);
   if($obj_Gurpo->num_rows()<>0){                          
     $query="update drvss set "
     . "apellido='$this->apellido', "
     . "nombre='$this->nombre', "
     . "edad='$this->edad', "
     . "parentesco='$this->parentesco',  "
     . "observacion='$this->observacion'"
     . "where id_drv = '$this->id_drv' and id_exp='$this->id_exp'";
			$obj_Gurpo->consulta($query); // ejecuta la consulta para traer la identificacion 
			return '<div id="mensaje"><p/><h4>Se Modifico:  '.$obj_Gurpo->getAffect().'  registro con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }
        function updateEstadodrvs($val)	// actualiza el estado de la salida
        {
         $obj_Gurpo=new Conexion();                       
         $qverifica="select * from derivacion where deriva='$this->deriva";                      
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
        function Buscardrvs()	// inserta la identificacion cargada en los atributos
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
	function insertdrvs($val1,$val2)	// inserta la identificacion cargada en los atributos
	{

   $obj_Gurpo=new Conexion();
   $ypf="select * from derivacion where id_exp=$this->id_exp and otro=UPPER('$val2') and deriva='$val1'  ";




   $obj_Gurpo->consulta($ypf);
   if($obj_Gurpo->num_rows()==0 ){
echo $obj_Gurpo->num_rows();
     $obj_Gurpo=new Conexion();
     $qdrvs="select max(id_drv) from derivacion where id_exp=$this->id_exp";
     $result=$obj_Gurpo->consulta($qdrvs);
     $row=pg_fetch_array($result);                     
     if($row['max']>0){
      $this->id_drv=$row['max']+1;
    }
    else{
      $this->id_drv=1;
    }
    $qverifica="select * from derivacion where id_drv = $this->id_drv and id_exp=$this->id_exp";
    $obj_Gurpo->consulta($qverifica);                       
    if($obj_Gurpo->num_rows()==0){
      $query="insert into derivacion(id_drv, deriva, id_exp, otro) values ($this->id_drv, '$this->deriva', '$this->id_exp', '$this->otro')";			                                              
                        $obj_Gurpo->consulta($query); // ejecuta la consulta para traer la identificacion
			return '<div id="mensaje"><p/><h4>La derivación se guardo con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA DERIVACIÓN, COMPRUEBE LA OPCIÓN ELEGIDA </h4></div>'; 
   }

 }
 else{
  return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA DERIVACION, COMPRUEBE LA OPCIÓN ELEGIDA</h4></div>'; 
}
}	
	function deletedrvs($val1,$val2)	// elimina la identificacion
	{ //select * from hogar where id_exp=$this->id_exp and id_numero = $this->id_numero
   $obj_Gurpo=new Conexion();
   $query="delete from derivacion where id_exp=$val1 and id_drv=$val2";
			$obj_Gurpo->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se elimino la derivación con exito</h4></div>'; // retorna todos los registros afectados

   }
        function Cerrardrvs($val)	// elimina la identificacion
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
        function Finalizardrvs($val)	// elimina la identificacion
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