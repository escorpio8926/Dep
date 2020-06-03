<?php
include 'classConexion.php';

class Ing
{
	var $id_ingreso; 
    var $ingreso;
    var $singreso;
    var $miembro;
    var $total;
    var $id_exp;		

	function Ing($val1='') // declara el constructor, si trae el id de ficha la busca , si no, trae todas las fichas
	{
		if ($val1!='')
		{
			$obj_Ing=new Conexion();
			$result=$obj_Ing->consulta("select * from ingresos where id_ingreso = '$val1'"); // ejecuta la consulta para traer la ficha
            if($obj_Ing->num_rows()!=0){
                $row=pg_fetch_array($result);
                $this->id_ingreso=$row['id_ingreso']; 
                $this->ingreso=$row['ingreso'];
                $this->singreso=$row['singreso'];
                $this->miembro=$row['miembro'];
                $this->total=$row['total'];
                $this->id_exp=$row['id_exp'];
            }
            else{


            }
        }
    }

	function getingreso1($val1) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las fichas
  {
    $obj_Ing=new Conexion();
    $query = "select * from ingresos where id_exp = '$val1' order by id_exp ASC";
                            $result=$obj_Ing->consulta($query); // ejecuta la consulta para traer los informantes   
                            return $result; // retorna todos los informantes
                        }

	// metodos que devuelven valores
                        function getid_ingreso(){ return $this->id_ingreso;} 
                        function getingreso(){ return $this->ingreso;}
                        function getsingreso(){ return $this->singreso;}
                        function getmiembro(){ return $this->miembro;}
                        function gettotal(){ return $this->total;}
                        function getid_exp(){ return $this->id_exp;} 




	// metodos que setean los valores

                        function setid_ingreso($val){ return $this->id_ingreso=$val;} 
                        function setingreso($val){ return $this->ingreso=$val;}
                        function setsingreso($val){ return $this->singreso=$val;}
                        function setmiembro($val){ return $this->miembro=$val;}
                        function settotal($val){ return $this->total=$val;}
                        function setid_exp($val){ return $this->id_exp=$val;}


	function updateIng()	// actualiza la identificacion cargada en los atributos
	{
       $obj_Ing=new Conexion();
       $qverifica="select * from ingresos where id_exp='$this->id_exp'";
       $obj_Ing->consulta($qverifica);
       if($obj_Ing->num_rows()<>0){                          
        $query="update ingresos set ingreso='$this->ingreso' ,
        singreso='$this->singreso',
        miembro='$this->miembro',
        total='$this->total'"
        . "where id_exp='$this->id_exp'";
			$obj_Ing->consulta($query); // ejecuta la consulta para traer la identificacion 
			return '<div id="mensaje"><p/><h4>Se Modifico el ingreso de la ficha:  '.$obj_Ing->getAffect().' se registro con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
         return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
     }
 }
        function updateEstadoSalidaMes($val)	// actualiza el estado de la salida
        {
           $obj_Ing=new Conexion();                       
           $qverifica="select * from salidas_mes where id_salida_mes='$val'";                      
           $obj_Ing->consulta($qverifica);
           if($obj_Ing->num_rows()<>0){                          
               $query="update salidas_mes set estado='FINALIZADA' where id_salida_mes = '$val'";                      
			$obj_Ing->consulta($query); // ejecuta la consulta para actualizar estado 
            $query1="update precios set consistir=0 where id_salida_mes = '$val'";                    
                        $obj_Ing->consulta($query1);// ejecuta la consulta para desconsistir
                        date_default_timezone_set('America/Argentina/Tucuman');
                        $fecha = date('Y-m-d');
                        $hora=  date("H:i:s");  
                        $query2="insert into reapertura( fecha, hora, id_salida_mes, id_usuario) values ('$fecha', '$hora', '$val', '$this->id_user')";
                        $obj_Ing->consulta($query2);
                        $resultado="select salidas_mes.estado, salidas_mes.id_salida_mes, salidas_mes.anio, salidas_mes.mes, salidas_mes.id_salida, salidas.panel, salidas.tarea, informantes.cod_informante, informantes.empresa 
                        from informantes, salidas, salidas_mes
                        where salidas_mes.id_salida = salidas.id_salida 
                        AND salidas.id_informante=informantes.cod_informante
                        AND salidas_mes.id_salida_mes='$val'                                               
                        order by anio , mes , panel, tarea, cod_informante ASC";                        
                        $result=$obj_Ing->consulta($resultado);
			return $result; // retorna todos los registros afectados
        }
        else{
         return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
     }
 }
        function BuscarSalidaMes()	// inserta la identificacion cargada en los atributos
        {
           $obj_Ing=new Conexion();                    
           $qverifica="select * from salidas_mes "
           ."where anio='$this->año' and mes='$this->mes' and id_salida='$this->id_salida'";                        
           $result=$obj_Ing->consulta($qverifica);                       
           if($obj_Ing->num_rows()<>0){                      
			return $result;// retorna todos los registros afectados
        }
        else{
         return '<div id="mensaje"><p/><h4>ERROR: AUN NO FUE CARGADA LA SALIDA, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS</h4></div>'; 
     }
 }	
	function insertIng()	// inserta la identificacion cargada en los atributos
	{
       $obj_Ing=new Conexion();                    
       $qverifica="select * from ingresos where id_exp=$this->id_exp";
       $obj_Ing->consulta($qverifica);                       
       if($obj_Ing->num_rows()==0){                      
        $query="insert into ingresos(ingreso,
        singreso,
        miembro,
        total,
        id_exp)
        values('$this->ingreso',
        '$this->singreso',
        '$this->miembro',
        '$this->total',     
        '$this->id_exp')";
                        $obj_Ing->consulta($query); // ejecuta la consulta para traer la identificacion
			return '<div id="mensaje"><p/><h4>El ingreso de la ficha número:  '.$this->id_exp.' se guardo con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
           return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA FICHA NUMERO '.$this->id_exp.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
     }
 }	
	function deleteSalidaMes($val)	// elimina la identificacion
	{
       $obj_Ing=new Conexion();
       $query="delete from salidas_mes where id_salida_mes=$val";
			$obj_Ing->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se elimino:  '.$obj_Ing->getAffect().'  registro con exito</h4></div>'; // retorna todos los registros afectados

     }
        function CerrarSalidaMes($val)	// elimina la identificacion
        {
           $obj_Ing=new Conexion();
           $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
           $obj_Ing->consulta($qverifica);                        
           if($obj_Ing->num_rows()== 0){
               $query="update salidas_mes set estado = 'CERRADA' where id_salida_mes=$val";                        
			$obj_Ing->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se cerro:  '.$obj_Ing->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
            return '<div id="mensaje"><p/><h4>NO ES POSIBLE CERRAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
        } 
    }
        function FinalizarSalidaMes($val)	// elimina la identificacion
        {
           $obj_Ing=new Conexion();
           $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
           $obj_Ing->consulta($qverifica);                        
           if($obj_Ing->num_rows()== 0){
               $query="update salidas_mes set estado = 'FINALIZADA' where id_salida_mes=$val";                        
			$obj_Ing->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se Finalizo:  '.$obj_Ing->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
            return '<div id="mensaje"><p/><h4>NO ES POSIBLE FINALIZAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
        } 
    }
        function buscaFormularios($val)	// elimina la identificacion
        {
           $obj_Ing=new Conexion();
           if ($val!=''){
            $query="select formularios.id_formulario, formularios.nombre from formularios, informantes_formularios
            where informantes_formularios.id_informante= $val and informantes_formularios.id_formulario=formularios.id_formulario;";
			$result=$obj_Ing->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return $result;    
        }
        else{
            $query="select formularios.id_formulario, formularios.nombre from formularios;";
			$result=$obj_Ing->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return $result;      
        }

    }	


}
?>