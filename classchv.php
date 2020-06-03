<?php
include 'classConexion.php';

class Indicador
{
	var $id_hv; 
    var $p1;      
    var $p2;
    var $p3;
    var $p4;
    var $p5;
    var $p6;
    var $p7;
    var $p8;
    var $p9;
    var $p10;
    var $p11;
    var $p12;  
    var $p13;
    var $p14;
    var $p15;
    var $p16;
    var $p17;
    var $p18;
    var $p19;
    var $p20;
    var $p18_1;
    var $p18_2;
    var $id_exp;		

	function Indicador($val1='') // declara el constructor, si trae el id de ficha la busca , si no, trae todas las fichas
	{
		if ($val1!='')
		{
			$obj_Chv=new Conexion();
			$result=$obj_Chv->consulta("select * from carac_hv where id_hv = '$val1'"); // ejecuta la consulta para traer la ficha
            if($obj_Chv->num_rows()!=0){
                $row=  pg_fetch_array($result);
                $this->id_hv=$row['id_hv']; 
                $this->p1=$row['p1'];
                $this->p2=$row['p2'];
                $this->p3=$row['p3'];
                $this->p4=$row['p4'];
                $this->p5=$row['p5'];
                $this->p6=$row['p6'];
                $this->p7=$row['p7'];
                $this->p8=$row['p8'];
                $this->p9=$row['p9'];
                $this->p10=$row['p10'];
                $this->p11=$row['p11'];
                $this->p12=$row['p12'];  
                $this->p13=$row['p13'];
                $this->p14=$row['p14'];
                $this->p15=$row['p15'];
                $this->p16=$row['p16'];
                $this->p17=$row['p17'];
                $this->p18=$row['p18'];
                $this->p19=$row['p19'];
                $this->p20=$row['p20'];
                $this->p18_1=$row['p18_1'];
                $this->p18_2=$row['p18_2'];
                $this->id_exp=$row['id_exp'];
            }
            else{
            }
        }
    }
	function getIndicador($val1) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las fichas
  {
    $obj_Chv=new Conexion();
    $query = "select * from carac_hv where id_exp = '$val1' order by id_exp ASC";
                            $result=$obj_Chv->consulta($query); // ejecuta la consulta para traer los informantes   
                            return $result; // retorna todos los informantes
                        }

	// metodos que devuelven valores
                        function getid_hv(){ return $this->id_hv;} 
                        function getp1(){ return $this->p1;}
                        function getp2(){ return $this->p2;}
                        function getp3(){ return $this->p3;}
                        function getp4(){ return $this->p4;}
                        function getp5(){ return $this->p5;}
                        function getp6(){ return $this->p6;}
                        function getp7(){ return $this->p7;}
                        function getp8(){ return $this->p8;}
                        function getp9(){ return $this->p9;}
                        function getp10(){ return $this->p10;}
                        function getp11(){ return $this->p11;}
                        function getp12(){ return $this->p12;}  
                        function getp13(){ return $this->p13;}
                        function getp14(){ return $this->p14;}
                        function getp15(){ return $this->p15;}
                        function getp16(){ return $this->p16;}
                        function getp17(){ return $this->p17;}
                        function getp18(){ return $this->p18;}
                        function getp19(){ return $this->p19;}
                        function getp20(){ return $this->p20;}
                        function getp18_1(){ return $this->p18_1;}
                        function getp18_2(){ return $this->p18_2;}
                        function getid_exp(){ return $this->id_exp;} 




	// metodos que setean los valores

                        function setid_hv($val){ return $this->id_hv=$val;} 
                        function setp1($val){ return $this->p1=$val;}
                        function setp2($val){ return $this->p2=$val;}
                        function setp3($val){ return $this->p3=$val;}
                        function setp4($val){ return $this->p4=$val;}
                        function setp5($val){ return $this->p5=$val;}
                        function setp6($val){ return $this->p6=$val;}
                        function setp7($val){ return $this->p7=$val;}
                        function setp8($val){ return $this->p8=$val;}
                        function setp9($val){ return $this->p9=$val;}
                        function setp10($val){ return $this->p10=$val;}
                        function setp11($val){ return $this->p11=$val;}
                        function setp12($val){ return $this->p12=$val;}  
                        function setp13($val){ return $this->p13=$val;}
                        function setp14($val){ return $this->p14=$val;}
                        function setp15($val){ return $this->p15=$val;}
                        function setp16($val){ return $this->p16=$val;}
                        function setp17($val){ return $this->p17=$val;}
                        function setp18($val){ return $this->p18=$val;}
                        function setp19($val){ return $this->p19=$val;}
                        function setp20($val){ return $this->p20=$val;}
                        function setp18_1($val){ return $this->p18_1=$val;}
                        function setp18_2($val){ return $this->p18_2=$val;}
                        function setid_exp($val){ return $this->id_exp=$val;} 

	function updateIndicador()	// actualiza la identificacion cargada en los atributos
	{
     $obj_Chv=new Conexion();
     $qverifica="select * from carac_hv where id_exp='$this->id_exp'";
     $obj_Chv->consulta($qverifica);
     if($obj_Chv->num_rows()<>0){                          
         $query="update carac_hv set p1='$this->p1',
         p2='$this->p2',
         p3='$this->p3',
         p4='$this->p4',
         p5='$this->p5',
         p6='$this->p6',
         p7='$this->p7',
         p8='$this->p8',
         p9='$this->p9',
         p10='$this->p10',
         p11='$this->p11',
         p12='$this->p12',  
         p13='$this->p13',
         p14='$this->p14',
         p15='$this->p15',
         p16='$this->p16',
         p17='$this->p17',
         p18='$this->p18',
         p19='$this->p19',
         p20='$this->p20',
         p18_1='$this->p18_1',
         p18_2='$this->p18_2'"
         . "where id_exp='$this->id_exp'";
			$obj_Chv->consulta($query); // ejecuta la consulta para traer la identificacion 
			return '<div id="mensaje"><p/><h4>Se Modifico:  '.$obj_Chv->getAffect().'  registro con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
           return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
       }
   }
        function updateEstadoSalidaMes($val)	// actualiza el estado de la salida
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
        function BuscarSalidaMes()	// inserta la identificacion cargada en los atributos
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
	function insertIndicador()	// inserta la identificacion cargada en los atributos
	{
     $obj_Chv=new Conexion();                    
     $qverifica="select * from carac_hv where id_exp='$this->id_exp'";
     $obj_Chv->consulta($qverifica);                       
     if($obj_Chv->num_rows()==0){                      
        $query="insert into carac_hv( p1,
        p2,
        p3,
        p4,
        p5,
        p6,
        p7,
        p8,
        p9,
        p10,
        p11,
        p12,  
        p13,
        p14,
        p15,
        p16,
        p17,
        p18,
        p19,
        p20,
        p18_1,
        p18_2,
        id_exp ) 
        values( '$this->p1',
        '$this->p2',
        '$this->p3',
        '$this->p4',
        '$this->p5',
        '$this->p6',
        '$this->p7',
        '$this->p8',
        '$this->p9',
        '$this->p10',
        '$this->p11',
        '$this->p12',  
        '$this->p13',
        '$this->p14',
        '$this->p15',
        '$this->p16',
        '$this->p17',
        '$this->p18',
        '$this->p19',
        '$this->p20',
        '$this->p18_1',
        '$this->p18_2',
        '$this->id_exp')";			                       
                        $obj_Chv->consulta($query); // ejecuta la consulta para traer la identificacion
			return '<div id="mensaje"><p/><h4>La ficha número:  '.$this->id_exp.'  guardo con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
           return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA FICHA NUMERO '.$this->id_exp.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
       }
   }	
	function deleteSalidaMes($val)	// elimina la identificacion
	{
     $obj_Chv=new Conexion();
     $query="delete from salidas_mes where id_salida_mes=$val";
			$obj_Chv->consulta($query); // ejecuta la consulta para  borrar la identificacion
			return '<div id="mensaje"><p/><h4>Se elimino:  '.$obj_Chv->getAffect().'  registro con exito</h4></div>'; // retorna todos los registros afectados

       }
        function CerrarSalidaMes($val)	// elimina la identificacion
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
        function FinalizarSalidaMes($val)	// elimina la identificacion
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
        function buscaFormularios($val)	// elimina la identificacion
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

        function deleteIndicador($val)  // elimina la identificacion
    {

   $obj_Ficha=new Conexion();                        
   $query="delete from carac_hv where id_exp=$val;";             
            $obj_Ficha->consulta($query); // ejecuta la consulta para  borrar la identificacion
            return '<div id="mensaje"><p/><h4>Se elimino:    registro con exito</h4></div>'; // retorna todos los registros afectados

   }

}
?>