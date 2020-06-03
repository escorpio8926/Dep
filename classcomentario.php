<?php
include 'classConexion.php';

class comentario
{ var $id_comentario; 
  var $ini; 
  var $id_exp;    

  function comentario($val1='') // declara el constructor, si trae el id de ficha la busca , si no, trae todas las fichas
  {
    if ($val1!='')
    {
      $obj_Chv=new Conexion();
      $result=$obj_Chv->consulta("select * from evaluacion where id_comentario = '$val1'"); // ejecuta la consulta para traer la ficha
      if($obj_Chv->num_rows()!=0){
        $row=  pg_fetch_array($result);
        $this->id_comentario=$row['id_comentario']; 
        $this->ini=$row['ini']; 
        $this->id_exp=$row['id_exp'];
      }
      else{
      }
    }
  }
  function getcomentario($val1) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las fichas
  {
    $obj_Chv=new Conexion();
    $query = "select * from evaluacion where id_exp = '$val1' order by id_exp ASC";
                            $result=$obj_Chv->consulta($query); // ejecuta la consulta para traer los informantes   
                            return $result; // retorna todos los informantes
                          }

  // metodos que devuelven valores
                          function getid_comentario(){ return $this->id_comentario;} 
                          function getini(){ return $this->ini;} 
                          function getid_exp(){ return $this->id_exp;} 




  // metodos que setean los valores
                          function setid_comentario($val){ return $this->id_comentario=$val;} 
                          function setini($val){ return $this->ini=$val;}
                          function setid_exp($val){ return $this->id_exp=$val;} 

  function updatecomentario()  // actualiza la identificacion cargada en los atributos
  {
   $obj_Chv=new Conexion();
   $qverifica="select * from evaluacion where id_exp='$this->id_exp'";
   $obj_Chv->consulta($qverifica);
   if($obj_Chv->num_rows()<>0){                          
    $query="update evaluacion set ini='$this->ini'"
    . "where id_exp='$this->id_exp'";
      $obj_Chv->consulta($query); // ejecuta la consulta para traer la identificacion 
      return '<div id="mensaje"><p/><h4>Se Modifico con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }
        function updateEstadoSalidaMes($val)  // actualiza el estado de la salida
        {
         $obj_Chv=new Conexion();                       
         $qverifica="select * from salidas_mes where id_salida_mes='$val'";                      
         $obj_Chv->consulta($qverifica);
         if($obj_Chv->num_rows()<>0){                          
           $query="update salidas_mes set estado='FINALIZADA' where id_salida_mes = '$val'";                      
      $obj_Chv->consulta($query); // ejecuta la consulta para actualizar estado 
      $query1="update precios set consistir=0 where id_salida_mes = '$val'";                    
                        $obj_Chv->consulta($query1);// ejecuta la consulta para desconsistir
                        date_default_timezone_set('America/Argentina/Tucuman');
                        $fecha = date('Y-m-d');
                        $hora=  date("H:i:s");  
                        $query2="insert into reapertura( fecha, hora, id_salida_mes, id_usuario) values ('$fecha', '$hora', '$val', '$this->id_user')";
                        $obj_Chv->consulta($query2);
                        $resultado="select salidas_mes.estado, salidas_mes.id_salida_mes, salidas_mes.anio, salidas_mes.mes, salidas_mes.id_salida, salidas.panel, salidas.tarea, informantes.cod_informante, informantes.empresa 
                        from informantes, salidas, salidas_mes
                        where salidas_mes.id_salida = salidas.id_salida 
                        AND salidas.id_informante=informantes.cod_informante
                        AND salidas_mes.id_salida_mes='$val'                                               
                        order by anio , mes , panel, tarea, cod_informante ASC";                        
                        $result=$obj_Chv->consulta($resultado);
      return $result; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }
        function BuscarSalidaMes()  // inserta la identificacion cargada en los atributos
        {
         $obj_Chv=new Conexion();                    
         $qverifica="select * from salidas_mes "
         ."where anio='$this->año' and mes='$this->mes' and id_salida='$this->id_salida'";                        
         $result=$obj_Chv->consulta($qverifica);                       
         if($obj_Chv->num_rows()<>0){                      
      return $result;// retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: AUN NO FUE CARGADA LA SALIDA, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS</h4></div>'; 
   }
 }  
  function insertcomentario()  // inserta la identificacion cargada en los atributos
  {
   $obj_Chv=new Conexion();                    
   $qverifica="select * from evaluacion where id_exp='$this->id_exp'";
   $obj_Chv->consulta($qverifica);                       
   if($obj_Chv->num_rows()==0){                      
    $query="insert into evaluacion( ini,
    id_exp ) 
    values( '$this->ini',
    '$this->id_exp')";                             
                        $obj_Chv->consulta($query); // ejecuta la consulta para traer la identificacion
      return '<div id="mensaje"><p/><h4>Se guardo con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
     return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA FICHA NUMERO '.$this->id_exp.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
   }
 }  
  function deleteSalidaMes($val)  // elimina la identificacion
  {
   $obj_Chv=new Conexion();
   $query="delete from salidas_mes where id_salida_mes=$val";
      $obj_Chv->consulta($query); // ejecuta la consulta para  borrar la identificacion
      return '<div id="mensaje"><p/><h4>Se elimino:  '.$obj_Chv->getAffect().'  registro con exito</h4></div>'; // retorna todos los registros afectados

    }
        function CerrarSalidaMes($val)  // elimina la identificacion
        {
         $obj_Chv=new Conexion();
         $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
         $obj_Chv->consulta($qverifica);                        
         if($obj_Chv->num_rows()== 0){
           $query="update salidas_mes set estado = 'CERRADA' where id_salida_mes=$val";                        
      $obj_Chv->consulta($query); // ejecuta la consulta para  borrar la identificacion
      return '<div id="mensaje"><p/><h4>Se cerro:  '.$obj_Chv->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
      return '<div id="mensaje"><p/><h4>NO ES POSIBLE CERRAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
    } 
  }
        function FinalizarSalidaMes($val) // elimina la identificacion
        {
         $obj_Chv=new Conexion();
         $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
         $obj_Chv->consulta($qverifica);                        
         if($obj_Chv->num_rows()== 0){
           $query="update salidas_mes set estado = 'FINALIZADA' where id_salida_mes=$val";                        
      $obj_Chv->consulta($query); // ejecuta la consulta para  borrar la identificacion
      return '<div id="mensaje"><p/><h4>Se Finalizo:  '.$obj_Chv->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
    }
    else{
      return '<div id="mensaje"><p/><h4>NO ES POSIBLE FINALIZAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
    } 
  }
        function buscaFormularios($val) // elimina la identificacion
        {
         $obj_Chv=new Conexion();
         if ($val!=''){
          $query="select formularios.id_formulario, formularios.nombre from formularios, informantes_formularios
          where informantes_formularios.id_informante= $val and informantes_formularios.id_formulario=formularios.id_formulario;";
      $result=$obj_Chv->consulta($query); // ejecuta la consulta para  borrar la identificacion
      return $result;    
    }
    else{
      $query="select formularios.id_formulario, formularios.nombre from formularios;";
      $result=$obj_Chv->consulta($query); // ejecuta la consulta para  borrar la identificacion
      return $result;      
    }

  } 

}
?>