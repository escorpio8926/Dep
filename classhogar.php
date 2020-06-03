<?php
include 'classConexion.php';

class Hogar_c
{
    var $id_numero;
    var $nombre;      
    var $dni;
    var $rel_parentesco;
    var $sexo;
    var $fecha_nac;
    var $anios;
    var $sit_conyu;
    var $cober_medic;
    var $salud_1;
    var $salud_2;
    var $disc_1;
    var $disc_10;
    var $disc_100;
    var $disc_1000;
    var $disc_10000;
    var $disc_100000;
    var $disc_2;
    var $jub_1;
    var $jub_2;
    var $edu_1;
    var $edu_2;
    var $edu_3;
    var $edu_4;
    var $id_user;
    var $id_exp;        

    function Hogar_c($val1='', $val2='') // declara el constructor, si trae el id de ficha la busca , si no, trae todas las fichas
    {
        if ($val1!='')
        {
            $obj_Chv=new Conexion();
            $result=$obj_Chv->consulta("select * from hogar  where id_exp = '$val1' and id_numero = '$val2'"); // ejecuta la consulta para traer la ficha
            if($obj_Chv->num_rows()!=0){
                $row=  pg_fetch_array($result);
                $this->id_numero=$row['id_numero']; 
                $this->nombre=$row['nombre'];
                $this->dni=$row['dni'];
                $this->rel_parentesco=$row['rel_parentesco'];
                $this->sexo=$row['sexo'];
                $this->fecha_nac=$row['fecha_nac'];
                $this->anios=$row['anios'];
                $this->sit_conyu=$row['sit_conyu'];
                $this->cober_medic=$row['cober_medic'];
                $this->salud_1=$row['salud_1'];
                $this->salud_2=$row['salud_2'];
                $this->disc_1=$row['disc_1'];
                $this->disc_10=$row['disc_10'];
                $this->disc_100=$row['disc_100'];
                $this->disc_1000=$row['disc_1000'];
                $this->disc_10000=$row['disc_10000'];
                $this->disc_100000=$row['disc_100000'];
                $this->disc_2=$row['disc_2'];  
                $this->jub_1=$row['jub_1'];
                $this->jub_2=$row['jub_2'];
                $this->edu_1=$row['edu_1'];
                $this->edu_2=$row['edu_2'];
                $this->edu_3=$row['edu_3'];
                $this->edu_4=$row['edu_4'];
                $this->id_user=$row['id_user'];
                $this->id_exp=$row['id_exp'];
            }
            else{
            }
        }
    }
    function getHogar_c($val1) // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todas las fichas
    {
        $obj_Chv=new Conexion();
        $query = "select * from hogar where id_exp = '$val1' order by rel_parentesco ASC";
                            $result=$obj_Chv->consulta($query); // ejecuta la consulta para traer los informantes   
                            return $result; // retorna todos los informantes
                        }

    // metodos que devuelven valores
                        function getid_numero(){ return $this->id_numero;} 
                        function getnombre(){ return $this->nombre;}
                        function getdni(){ return $this->dni;}
                        function getrel_parentesco(){ return $this->rel_parentesco;}
                        function getsexo(){ return $this->sexo;}
                        function getfecha_nac(){ return $this->fecha_nac;}
                        function getanios(){ return $this->anios;}
                        function getsit_conyu(){ return $this->sit_conyu;}
                        function getcober_medic(){ return $this->cober_medic;}
                        function getsalud_1(){ return $this->salud_1;}
                        function getsalud_2(){ return $this->salud_2;}
                        function getdisc_1(){ return $this->disc_1;}
                        function getdisc_10(){ return $this->disc_10;}
                        function getdisc_100(){ return $this->disc_100;}
                        function getdisc_1000(){ return $this->disc_1000;}
                        function getdisc_10000(){ return $this->disc_10000;}
                        function getdisc_100000(){ return $this->disc_100000;}
                        function getdisc_2(){ return $this->disc_2;}  
                        function getjub_1(){ return $this->jub_1;}
                        function getjub_2(){ return $this->jub_2;}
                        function getedu_1(){ return $this->edu_1;}
                        function getedu_2(){ return $this->edu_2;}
                        function getedu_3(){ return $this->edu_3;}
                        function getedu_4(){ return $this->edu_4;}
                  
                        function getid_user(){ return $this->id_user;}
                        function getid_exp(){ return $this->id_exp;} 




    // metodos que setean los valores

                        function setid_numero($val){ return $this->id_numero=$val;} 
                        function setnombre($val){ return $this->nombre=$val;}
                        function setdni($val){ return $this->dni=$val;}
                        function setrel_parentesco($val){ return $this->rel_parentesco=$val;}
                        function setsexo($val){ return $this->sexo=$val;}
                        function setfecha_nac($val){ return $this->fecha_nac=$val;}
                        function setanios($val){ return $this->anios=$val;}
                        function setsit_conyu($val){ return $this->sit_conyu=$val;}
                        function setcober_medic($val){ return $this->cober_medic=$val;}
                        function setsalud_1($val){ return $this->salud_1=$val;}
                        function setsalud_2($val){ return $this->salud_2=$val;}
                        function setdisc_1($val){ return $this->disc_1=$val;}
                        function setdisc_10($val){ return $this->disc_10=$val;}
                        function setdisc_100($val){ return $this->disc_100=$val;}
                        function setdisc_1000($val){ return $this->disc_1000=$val;}
                        function setdisc_10000($val){ return $this->disc_10000=$val;}
                        function setdisc_100000($val){ return $this->disc_100000=$val;}
                        function setdisc_2($val){ return $this->disc_2=$val;}  
                        function setjub_1($val){ return $this->jub_1=$val;}
                        function setjub_2($val){ return $this->jub_2=$val;}
                        function setedu_1($val){ return $this->edu_1=$val;}
                        function setedu_2($val){ return $this->edu_2=$val;}
                        function setedu_3($val){ return $this->edu_3=$val;}
                        function setedu_4($val){ return $this->edu_4=$val;}
                   
                        function setid_user($val){ return $this->id_user=$val;}
                        function setid_exp($val){ return $this->id_exp=$val;} 

    function updateHogar_c($val1,$val2)  // actualiza la identificacion cargada en los atributos
    {

new Conexion();
$qverifica1="select dni from hogar where id_exp=$this->id_exp and id_numero = $this->id_numero";
$result = pg_query($qverifica1);
while ($resultados = pg_fetch_array($result))
{
    $seguir=$resultados['dni'];
}

     $obj_Grupo=new Conexion();
     $qverifica="select * from hogar where id_exp=$this->id_exp and dni=$val1";
     $obj_Grupo->consulta($qverifica);
     if($obj_Grupo->num_rows()==0 || $val1==$seguir){                          
         $query="update hogar set nombre='$this->nombre',
         dni='$this->dni',
         rel_parentesco='$this->rel_parentesco',
         sexo='$this->sexo',
         fecha_nac='$this->fecha_nac',
         anios='$this->anios',
         sit_conyu='$this->sit_conyu',
         cober_medic='$this->cober_medic',
         salud_1='$this->salud_1',
         salud_2='$this->salud_2',
         disc_1='$this->disc_1',
         disc_10='$this->disc_10',
         disc_100='$this->disc_100',
         disc_1000='$this->disc_1000',
         disc_10000='$this->disc_10000',
         disc_100000='$this->disc_100000',
         disc_2='$this->disc_2',
         jub_1='$this->jub_1',
         jub_2='$this->jub_2',
         edu_1='$this->edu_1',
         edu_2='$this->edu_2',
         edu_3='$this->edu_3',
         edu_4='$this->edu_4'"
         . "where id_exp='$this->id_exp' and id_numero='$this->id_numero'";
            $obj_Grupo->consulta($query); // ejecuta la consulta para traer la identificacion 
            return '<div id="mensaje"><p/><h4>Se Modifico el componente N°'.$this->id_numero.' con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
           return '<div id="mensaje"><p/><h4>ERROR: YA ESTA DADO DE ALTA EL FORMULARIO, COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
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


    function insertHogar_c($val1)  // inserta la identificacion cargada en los atributos
    {

        $obj_Grupo=new Conexion();
        $qnumero="select max(id_numero) from hogar where id_exp=$this->id_exp";
        $result=$obj_Grupo->consulta($qnumero);
        $row=  pg_fetch_array($result);                     
        if($row['max']>0){
            $this->id_numero=$row['max']+1;
        }
        else{
            $this->id_numero=1;
        }

        $qverifica="select * from hogar where dni=$val1 and id_exp=$this->id_exp";
        $obj_Grupo->consulta($qverifica);                       
        if($obj_Grupo->num_rows()==0){     
            $query="insert into hogar( id_numero,
            nombre,
            dni,
            rel_parentesco,
            sexo,
            fecha_nac,
            anios,
            sit_conyu,
            cober_medic,
            salud_1,
            salud_2,
            disc_1,
            disc_10,
            disc_100,
            disc_1000,
            disc_10000,
            disc_100000,
            disc_2,  
            jub_1,
            jub_2,
            edu_1,
            edu_2,
            edu_3,
            edu_4,
            id_user,
            id_exp ) 
            values( '$this->id_numero',
            '$this->nombre',
            '$this->dni',
            '$this->rel_parentesco',
            '$this->sexo',
            '$this->fecha_nac',
            '$this->anios',
            '$this->sit_conyu',
            '$this->cober_medic',
            '$this->salud_1',
            '$this->salud_2',
            '$this->disc_1',
            '$this->disc_10',
            '$this->disc_100',
            '$this->disc_1000',
            '$this->disc_10000',
            '$this->disc_100000',
            '$this->disc_2',  
            '$this->jub_1',
            '$this->jub_2',
            '$this->edu_1',
            '$this->edu_2',
            '$this->edu_3',
            '$this->edu_4',
            '$this->id_user',
            '$this->id_exp')";                                 
                        $obj_Grupo->consulta($query); // ejecuta la consulta para traer la identificacion
            return '<div id="mensaje"><p/><h4>El componente N°'.$this->id_numero.' se  guardo con exito</h4></div>'; // retorna todos los registros afectados
        }
        else{
            return '<div id="mensaje"><p/><h4>ERROR: YA FUE CARGADA LA FICHA NUMERO , COMPRUEBE QUE LOS DATOS SEAN CORRECTOS </h4></div>'; 
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

          function deleteHogar_c($val1,$val2)  // elimina la identificacion
    {

   $obj_Ficha=new Conexion();                        
   $query="delete from hogar where id_exp=$val1 and id_numero = $val2";             
            $obj_Ficha->consulta($query); // ejecuta la consulta para  borrar la identificacion
            return '<div id="mensaje"><p/><h4>Se elimino el componente N°'.$val2.' con exito</h4></div>'; // retorna todos los registros afectados

   }

}
?>