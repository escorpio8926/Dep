<?php
include 'classConexion.php';

class sima
{
    var $id_my; 
    var $q1;      
    var $q2;
    var $q3;
    var $q4;
    var $q5;
    var $q6;
    var $q7;
    var $q8;
    var $q9;
    var $q10;
    var $q11;
    var $q12;  
    var $q13;
    var $q14;
    var $q15;
    var $q16;
    var $q17;
    var $nombre;
    var $num_com;
    var $id_exp;        

    function sima($val1='') // declara el constructor, si trae el id de ficha la busca , si no, trae todas las fichas
    {
        if ($val1!='')
        {
            $obj_Chv=new Conexion();
            $result=$obj_Chv->consulta("select * from sima where id_my = '$val1'"); // ejecuta la consulta para traer la ficha
            if($obj_Chv->num_rows()!=0){
                $row=  pg_fetch_array($result);
                $this->id_my=$row['id_my']; 
                $this->q1=$row['q1'];
                $this->q2=$row['q2'];
                $this->q3=$row['q3'];
                $this->q4=$row['q4'];
                $this->q5=$row['q5'];
                $this->q6=$row['q6'];
                $this->q7=$row['q7'];
                $this->q8=$row['q8'];
                $this->q9=$row['q9'];
                $this->q10=$row['q10'];
                $this->q11=$row['q11'];
                $this->q12=$row['q12'];  
                $this->q13=$row['q13'];
                $this->q14=$row['q14'];
                $this->q15=$row['q15'];
                $this->q16=$row['q16'];
                $this->q17=$row['q17'];
                $this->nombre=$row['nombre'];
                $this->num_com=$row['num_com'];
                $this->id_exp=$row['id_exp'];
            }
            else{
            }
        }
    }
    function getsima($val1) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las fichas
    {
        $obj_Chv=new Conexion();
        $query = "select * from sima where id_exp = '$val1' order by id_exp ASC";
                            $result=$obj_Chv->consulta($query); // ejecuta la consulta para traer los informantes   
                            return $result; // retorna todos los informantes
                        }

    // metodos que devuelven valores
                        function getid_my(){ return $this->id_my;} 
                        function getq1(){ return $this->q1;}
                        function getq2(){ return $this->q2;}
                        function getq3(){ return $this->q3;}
                        function getq4(){ return $this->q4;}
                        function getq5(){ return $this->q5;}
                        function getq6(){ return $this->q6;}
                        function getq7(){ return $this->q7;}
                        function getq8(){ return $this->q8;}
                        function getq9(){ return $this->q9;}
                        function getq10(){ return $this->q10;}
                        function getq11(){ return $this->q11;}
                        function getq12(){ return $this->q12;}  
                        function getq13(){ return $this->q13;}
                        function getq14(){ return $this->q14;}
                        function getq15(){ return $this->q15;}
                        function getq16(){ return $this->q16;}
                        function getq17(){ return $this->q17;}
                        function getnombre(){ return $this->nombre;}
                        function getnum_com(){ return $this->num_com;}
                        function getid_exp(){ return $this->id_exp;} 




    // metodos que setean los valores

                        function setid_my($val){ return $this->id_my=$val;} 
                        function setq1($val){ return $this->q1=$val;}
                        function setq2($val){ return $this->q2=$val;}
                        function setq3($val){ return $this->q3=$val;}
                        function setq4($val){ return $this->q4=$val;}
                        function setq5($val){ return $this->q5=$val;}
                        function setq6($val){ return $this->q6=$val;}
                        function setq7($val){ return $this->q7=$val;}
                        function setq8($val){ return $this->q8=$val;}
                        function setq9($val){ return $this->q9=$val;}
                        function setq10($val){ return $this->q10=$val;}
                        function setq11($val){ return $this->q11=$val;}
                        function setq12($val){ return $this->q12=$val;}  
                        function setq13($val){ return $this->q13=$val;}
                        function setq14($val){ return $this->q14=$val;}
                        function setq15($val){ return $this->q15=$val;}
                        function setq16($val){ return $this->q16=$val;}
                        function setq17($val){ return $this->q17=$val;}
                        function setnombre($val){ return $this->nombre=$val;}
                        function setnum_com($val){ return $this->num_com=$val;}
                        function setid_exp($val){ return $this->id_exp=$val;} 

    function updatesima($val1)  // actualiza la identificacion cargada en los atributos
    {
       $obj_Chv=new Conexion();
       $qverifica="select * from sima where id_exp=$this->id_exp and num_com=$val1";
       $obj_Chv->consulta($qverifica);
       if($obj_Chv->num_rows()<>0){                          
         $query="update sima set q1='$this->q1',
         q2='$this->q2',
         q3='$this->q3',
         q4='$this->q4',
         q5='$this->q5',
         q6='$this->q6',
         q7='$this->q7',
         q8='$this->q8',
         q9='$this->q9',
         q10='$this->q10',
         q11='$this->q11',
         q12='$this->q12',  
         q13='$this->q13',
         q14='$this->q14',
         q15='$this->q15',
         q16='$this->q16',
         q17='$this->q17',
         nombre='$this->nombre',
         num_com='$this->num_com'"
         . "where id_exp='$this->id_exp' and num_com=$val1";
            $obj_Chv->consulta($query); // ejecuta la consulta para traer la identificacion 
            return '<div id="mensaje"><p/><h4>Se Modifico el componente:  '.$this->num_com.' con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
         return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL COMPONENTE '.$this->num_com.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
     }
 }
        function updateEstadoSalidaMes($val)    // actualiza el estado de la salida
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
    function insertsima($val1)  // inserta la identificacion cargada en los atributos
    {
       $obj_Chv=new Conexion();                    
       $qverifica="select * from sima where id_exp=$this->id_exp and num_com=$val1";
       $obj_Chv->consulta($qverifica);                       
       if($obj_Chv->num_rows()==0){                      
        $query="insert into sima( q1,
        q2,
        q3,
        q4,
        q5,
        q6,
        q7,
        q8,
        q9,
        q10,
        q11,
        q12,
        q13,
        q14,
        q15,
        q16,
        q17,
        nombre,
        num_com,
        id_exp ) 
        values( '$this->q1',
        '$this->q2',
        '$this->q3',
        '$this->q4',
        '$this->q5',
        '$this->q6',
        '$this->q7',
        '$this->q8',
        '$this->q9',
        '$this->q10',
        '$this->q11',
        '$this->q12',  
        '$this->q13',
        '$this->q14',
        '$this->q15',
        '$this->q16',
        '$this->q17',
        '$this->nombre',
        '$this->num_com',
        '$this->id_exp')";                                 
                        $obj_Chv->consulta($query); // ejecuta la consulta para traer la identificacion
            return '<div id="mensaje"><p/><h4>El componente número:  '.$this->num_com.'  guardo con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
         return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADO el componente '.$this->num_com.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
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
        function FinalizarSalidaMes($val)   // elimina la identificacion
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

              function deletesima($val1,$val2,$val3)  // elimina la identificacion
    {

   $obj_Ficha=new Conexion();                        
   $query="delete from sima where id_exp=$val1 and id_my = $val2";             
            $obj_Ficha->consulta($query); // ejecuta la consulta para  borrar la identificacion
            return '<div id="mensaje"><p/><h4>Se elimino el componente: '.$val3.' con exito</h4></div>'; // retorna todos los registros afectados
   }

}
?>