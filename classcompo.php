<?php

class compo
{
    var $id_cmpt; 
    var $c1;
    var $c2;
    var $c3;
    var $c4;
    var $id_exp;        

    function compo($val1='') // declara el constructor, si trae el id de ficha la busca , si no, trae todas las fichas
    {
        if ($val1!='')
        {
            $obj_compo=new Conexion();
            $result=$obj_compo->consulta("select * from componente where id_cmpt = '$val1'"); // ejecuta la consulta para traer la ficha
            if($obj_compo->num_rows()!=0){
                $row=pg_fetch_array($result);
                $this->id_cmpt=$row['id_cmpt']; 
                $this->c1=$row['c1'];
                $this->c2=$row['c2'];
                $this->c3=$row['c3'];
                $this->c4=$row['c4'];
                $this->id_exp=$row['id_exp'];
            }
            else{


            }
        }
    }

    function getcompo($val1) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las fichas
    {
        $obj_compo=new Conexion();
        $query = "select * from componente where id_exp = '$val1' order by id_exp ASC";
                            $result=$obj_compo->consulta($query); // ejecuta la consulta para traer los informantes   
                            return $result; // retorna todos los informantes
                        }

    // metodos que devuelven valores
                        function getid_cmpt(){ return $this->id_cmpt;} 
                        function getc1(){ return $this->c1;}
                        function getc2(){ return $this->c2;}
                        function getc3(){ return $this->c3;}
                        function getc4(){ return $this->c4;}
                        function getid_exp(){ return $this->id_exp;} 




    // metodos que setean los valores

                        function setid_cmpt($val){ return $this->id_cmpt=$val;} 
                        function setc1($val){ return $this->c1=$val;}
                        function setc2($val){ return $this->c2=$val;}
                        function setc3($val){ return $this->c3=$val;}
                        function setc4($val){ return $this->c4=$val;}
                        function setid_exp($val){ return $this->id_exp=$val;}

                        
    function updatecompo($val1)    // actualiza la identificacion cargada en los atributos
    {
     $obj_compo=new Conexion();
     $qverifica="select * from componente where id_exp='$this->id_exp' and id_cmpt ='$this->id_cmpt' and c1='$val1'";
     $obj_compo->consulta($qverifica);
     if($obj_compo->num_rows()<>0){                          
        $query="update componente set c1='$this->c1' ,
        c2='$this->c2',
        c3='$this->c3',
        c4='$this->c4'"
        . "where id_exp='$this->id_exp' and id_cmpt='$this->id_cmpt'";
            $obj_compo->consulta($query); // ejecuta la consulta para traer la identificacion 
            return '<div id="mensaje"><p/><h4>Se Modifico el componente:  '.$val1.' con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
           return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
       }
   }
        function updateEstadoSalidaMes($val)    // actualiza el estado de la salida
        {
         $obj_compo=new Conexion();                       
         $qverifica="select * from salidas_mes where id_salida_mes='$val'";                      
         $obj_compo->consulta($qverifica);
         if($obj_compo->num_rows()<>0){                          
             $query="update salidas_mes set estado='FINALIZADA' where id_salida_mes = '$val'";                      
            $obj_compo->consulta($query); // ejecuta la consulta para actualizar estado 
            $query1="update precios set consistir=0 where id_salida_mes = '$val'";                    
                        $obj_compo->consulta($query1);// ejecuta la consulta para desconsistir
                        date_default_timezone_set('America/Argentina/Tucuman');
                        $fecha = date('Y-m-d');
                        $hora=  date("H:i:s");  
                        $query2="insert into reapertura( fecha, hora, id_salida_mes, id_usuario) values ('$fecha', '$hora', '$val', '$this->id_user')";
                        $obj_compo->consulta($query2);
                        $resultado="select salidas_mes.estado, salidas_mes.id_salida_mes, salidas_mes.anio, salidas_mes.mes, salidas_mes.id_salida, salidas.panel, salidas.tarea, informantes.cod_informante, informantes.empresa 
                        from informantes, salidas, salidas_mes
                        where salidas_mes.id_salida = salidas.id_salida 
                        AND salidas.id_informante=informantes.cod_informante
                        AND salidas_mes.id_salida_mes='$val'                                               
                        order by anio , mes , panel, tarea, cod_informante ASC";                        
                        $result=$obj_compo->consulta($resultado);
            return $result; // retorna todos los registros afectados
        }
        else{
           return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
       }
   }
        function BuscarSalidaMes()  // inserta la identificacion cargada en los atributos
        {
         $obj_compo=new Conexion();                    
         $qverifica="select * from salidas_mes "
         ."where anio='$this->año' and mes='$this->mes' and id_salida='$this->id_salida'";                        
         $result=$obj_compo->consulta($qverifica);                       
         if($obj_compo->num_rows()<>0){                      
            return $result;// retorna todos los registros afectados
        }
        else{
           return '<div id="mensaje"><p/><h4>ERROR: AUN NO FUE CARGADA LA SALIDA, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS</h4></div>'; 
       }
   }  

    function insertcompo($val1)    // inserta la identificacion cargada en los atributos
    {
     $obj_compo=new Conexion();  
     $qnumero="select max(id_cmpt) from componente where id_exp=$this->id_exp";
     $result=$obj_compo->consulta($qnumero);
     $row=  pg_fetch_array($result);                     
     if($row['max']>0){
        $this->id_cmpt=$row['max']+1;
    }
    else{
        $this->id_cmpt=1;
    }



    $qverifica="select * from componente where id_exp=$this->id_exp and c1='$val1'";
    $obj_compo->consulta($qverifica);                       
    if($obj_compo->num_rows()==0){                      
        $query="insert into componente(c1,
        c2,
        c3,
        c4,
        id_cmpt,
        id_exp)
        values('$this->c1',
        '$this->c2',
        '$this->c3',
        '$this->c4',
        '$this->id_cmpt',
        '$this->id_exp')";
                        $obj_compo->consulta($query); // ejecuta la consulta para traer la identificacion
            return '<div id="mensaje"><p/><h4>El componente:  '.$val1.' se guardo con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
         return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADO EL COMPONENTE '.$val1.', COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
     }
 }  
    function deleteSalidaMes($val)  // elimina la identificacion
    {
     $obj_compo=new Conexion();
     $query="delete from salidas_mes where id_salida_mes=$val";
            $obj_compo->consulta($query); // ejecuta la consulta para  borrar la identificacion
            return '<div id="mensaje"><p/><h4>Se elimino:  '.$obj_compo->getAffect().'  registro con exito</h4></div>'; // retorna todos los registros afectados

        }
        function CerrarSalidaMes($val)  // elimina la identificacion
        {
         $obj_compo=new Conexion();
         $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
         $obj_compo->consulta($qverifica);                        
         if($obj_compo->num_rows()== 0){
             $query="update salidas_mes set estado = 'CERRADA' where id_salida_mes=$val";                        
            $obj_compo->consulta($query); // ejecuta la consulta para  borrar la identificacion
            return '<div id="mensaje"><p/><h4>Se cerro:  '.$obj_compo->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
            return '<div id="mensaje"><p/><h4>NO ES POSIBLE CERRAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
        } 
    }
        function FinalizarSalidaMes($val)   // elimina la identificacion
        {
         $obj_compo=new Conexion();
         $qverifica="select * from precios where id_salida_mes = '$val' and consistir = '0'"; 
         $obj_compo->consulta($qverifica);                        
         if($obj_compo->num_rows()== 0){
             $query="update salidas_mes set estado = 'FINALIZADA' where id_salida_mes=$val";                        
            $obj_compo->consulta($query); // ejecuta la consulta para  borrar la identificacion
            return '<div id="mensaje"><p/><h4>Se Finalizo:  '.$obj_compo->getAffect().'  Salida con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
            return '<div id="mensaje"><p/><h4>NO ES POSIBLE FINALIZAR LA SALIDA PORQUE AUN HAY FORMULARIOS SIN CONSISTIR</h4></div>';     
        } 
    }
        function buscaFormularios($val) // elimina la identificacion
        {
         $obj_compo=new Conexion();
         if ($val!=''){
            $query="select formularios.id_formulario, formularios.nombre from formularios, informantes_formularios
            where informantes_formularios.id_informante= $val and informantes_formularios.id_formulario=formularios.id_formulario;";
            $result=$obj_compo->consulta($query); // ejecuta la consulta para  borrar la identificacion
            return $result;    
        }
        else{
            $query="select formularios.id_formulario, formularios.nombre from formularios;";
            $result=$obj_compo->consulta($query); // ejecuta la consulta para  borrar la identificacion
            return $result;      
        }

    }

            function deletecompo($val1,$val2,$val3)  // elimina la identificacion
    {

   $obj_Ficha=new Conexion();                        
   $query="delete from componente where id_exp=$val1 and id_cmpt = $val2";             
            $obj_Ficha->consulta($query); // ejecuta la consulta para  borrar la identificacion
            return '<div id="mensaje"><p/><h4>Se elimino el componente '.$val3.' con exito</h4></div>'; // retorna todos los registros afectados

   }     


}
?>