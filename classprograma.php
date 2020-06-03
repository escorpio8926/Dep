<?php
class pg
{
	var $id_exp;
  var $id_prg;
  var $progra;
  var $id_user;




	function pg($val1='', $val2='') // declara el constructor, si trae el id de ficha la busca , si no, trae todas las fichas
	{
		if ($val1!='')
		{       
			$obj_Gurpo=new Conexion();
			$result=$obj_Gurpo->consulta("select * from program where id_exp = '$val1' and id_prg = '$val2'"); // ejecuta la consulta para traer la ficha
      if($obj_Gurpo->num_rows()!=0){
        $row=  pg_fetch_array($result);
        $this->id_exp=$row['id_exp'];
        $this->id_prg=$row['id_prg'];
        $this->progra=$row['progra'];
      }
      else{

      }
    }
  }
	function getpg($val1) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las fichas
  {
    $obj_Gurpo=new Conexion();
    $query = "select * from program where id_exp = '$val1' order by id_prg ASC";
                    $result=$obj_Gurpo->consulta($query); // ejecuta la consulta para traer los informantes   
                    return $result; // retorna todos los informantes
                    
                  }

	// metodos que devuelven valores
                  function getid_exp()
                  { return $this->id_exp;}
                  function getid_prg()
                  { return $this->id_prg;}         
                  function getprogra()
                  { return $this->progra;}                  
                  function getId_Usuario()
                  { return $this->id_user;} 


	// metodos que setean los valores

                  function setid_exp($val)
                  {  $this->id_exp=$val;} 

                  function setid_prg($val)
                  {  $this->id_prg=$val;} 

                  function setprogra($val)
                  {  $this->progra=$val;}  

                  function setId_Usuario($val)
                  {  $this->id_user=$val;}

	function updatepg()	// actualiza la identificacion cargada en los atributos
	{
   $obj_Gurpo=new Conexion();
   $qverifica="select * from program where id_prg = $this->id_prg and id_exp=$this->id_exp";
   $obj_Gurpo->consulta($qverifica);
   $qverifica="select * from program where id_prg = $this->id_prg and id_exp=$this->id_exp";
   $obj_Gurpo->consulta($qverifica);
   if($obj_Gurpo->num_rows()<>0){                          
     $query="update pgs set "
     . "apellido='$this->apellido', "
     . "nombre='$this->nombre', "
     . "edad='$this->edad', "
     . "parentesco='$this->parentesco',  "
     . "observacion='$this->observacion'"
     . "where id_prg = '$this->id_prg' and id_exp='$this->id_exp'";
			$obj_Gurpo->consulta($query); // ejecuta la consulta para traer la identificacion 
			return '<div id="mensaje"><p/><h4>Se Modifico:  '.$obj_Gurpo->getAffect().'  registro con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }
        function updateEstadopg($val)	// actualiza el estado de la salida
        {
         $obj_Gurpo=new Conexion();                       
         $qverifica="select * from program where progra='$this->progra";                      
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
        function Buscarpg()	// inserta la identificacion cargada en los atributos
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
	function insertpg($val1)	// inserta la identificacion cargada en los atributos
	{
   $obj_Gurpo=new Conexion();
   $ypf="select * from program where id_exp=$this->id_exp and progra='$val1'  ";
   $obj_Gurpo->consulta($ypf);
   if($obj_Gurpo->num_rows()==0){

     $qpg="select max(id_prg) from program where id_exp=$this->id_exp";
     $result=$obj_Gurpo->consulta($qpg);
     $row=  pg_fetch_array($result);                     
     if($row['max']>0){
      $this->id_prg=$row['max']+1;
    }
    else{
      $this->id_prg=1;
    }
    $qverifica="select * from program where id_prg = $this->id_prg and id_exp=$this->id_exp";
    $obj_Gurpo->consulta($qverifica);                       
    if($obj_Gurpo->num_rows()==0){
      $query="insert into program(id_prg, progra, id_exp ) values ($this->id_prg, '$this->progra', '$this->id_exp')";			                                              
                        $obj_Gurpo->consulta($query); // ejecuta la consulta para traer la identificacion
			return '<div id="mensaje"><p/><h4>El Programa fue  guardo con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA FICHA NUMERO '.$this->id_prg.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }
 else{
  return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADO EL PROGRAMA COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
}
}	
	function deletepg($val1,$val2)	// elimina la identificacion
	{ //select * from hogar where id_exp=$this->id_exp and id_numero = $this->id_numero
   $obj_Gurpo=new Conexion();
   $query="delete from program where id_exp=$val1 and id_prg=$val2";
			$obj_Gurpo->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se elimino el programa con exito</h4></div>'; // retorna todos los registros afectados

   }
        function Cerrarpg($val)	// elimina la identificacion
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
        function Finalizarpg($val)	// elimina la identificacion
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