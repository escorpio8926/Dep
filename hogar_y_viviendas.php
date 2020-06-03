<?php
include 'cabecera.php';
include 'menu.php';
include './classchv.php';


if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
   $id_hv=""; 
   $p1="";
   $p2="";
   $p3="";
   $p4="";
   $p5="";
   $p6="";
   $p7="";
   $p8="";
   $p9="";
   $p10="";
   $p11="";
   $p12="";  
   $p13="";
   $p14="";
   $p15="";
   $p16="";
   $p17="";
   $p18="";
   $p19="";
   $p20="";
   $dp1="";
   $dp2="";
   $dp3="";
   $dp4="";
   $dp5="";
   $dp6="";
   $dp7="";
   $dp8="";
   $dp9="";
   $dp10="";
   $dp11="";
   $dp12="";  
   $dp13="";
   $dp14="";
   $dp15="";
   $dp16="";
   $dp17="";
   $dp18="";
   $dp19="";
   $dp20="";
   $p18_1="";
   $p18_2="";
   $id_exp=$_GET['Id'];
   $id_user=$_SESSION['id_user'];  

if (isset($_GET['mdIdi'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

        $NuevoIndicador=new Indicador($_GET['mdIdi']);  // instancio la clase identificacion pasandole el nro de identificacion, de esta forma lo busca
       $p1=$NuevoIndicador->getp1();
        $p2=$NuevoIndicador->getp2();
        $p3=$NuevoIndicador->getp3();
        $p4=$NuevoIndicador->getp4();
        $p5=$NuevoIndicador->getp5();
        $p6=$NuevoIndicador->getp6();
        $p7=$NuevoIndicador->getp7();
        $p8=$NuevoIndicador->getp8();
        $p9=$NuevoIndicador->getp9();
        $p10=$NuevoIndicador->getp10();
        $p11=$NuevoIndicador->getp11();
        $p12=$NuevoIndicador->getp12();  
        $p13=$NuevoIndicador->getp13();
        $p14=$NuevoIndicador->getp14();
        $p15=$NuevoIndicador->getp15();
        $p16=$NuevoIndicador->getp16();
        $p17=$NuevoIndicador->getp17();
        $p18=$NuevoIndicador->getp18();
        $p19=$NuevoIndicador->getp19();
        $p20=$NuevoIndicador->getp20();
        $p18_1=$NuevoIndicador->getp18_1();
        $p18_2=$NuevoIndicador->getp18_2();
        $id_exp=$NuevoIndicador->getid_exp();
        $id_hv=$NuevoIndicador->getid_hv(); 
        include './ifhabitacional.php';
        $dis1="";
        $dis="disabled";
        $bn=3;
      

    }

    ?>
    <div id="cuerpo">


<?php
if(is_numeric($id_exp)&&is_numeric($id_hv))
        {$value='Modificar';
              $disa="hidden";
      $disas="";
      $car="margin-left:30%";
      }
else
    {$value='Guardar';
    $disa="";
      $disas="hidden";
}
?>

 <?php
 if(!isset($_GET['mdIdi'])){
    new Conexion();
    $id_exp_3 =$_GET['Id'];
    $query="select * from carac_hv where id_exp = '$id_exp_3'"; 
    $result = pg_query($query); 
    if(pg_num_rows($result)>'0'){
    $NuevoIndicador=new Indicador();
$NuevoIndicador= $NuevoIndicador->getIndicador($_GET['Id']); // obtiene todos las salidas para despues 

while ($row=  pg_fetch_array($NuevoIndicador)) // recorre los identificaciones uno por uno hasta el fin de la tabla
{
     $p1=$row['p1'];
    $p2=$row['p2'];
    $p3=$row['p3'];
    $p4=$row['p4'];
    $p5=$row['p5'];
    $p6=$row['p6'];
    $p7=$row['p7'];
    $p8=$row['p8'];
    $p9=$row['p9'];
    $p10=$row['p10'];
    $p11=$row['p11'];
    $p12=$row['p12'];
    $p13=$row['p13'];
    $p14=$row['p14'];
    $p15=$row['p15'];
    $p16=$row['p16'];
    $p17=$row['p17'];
    $p18=$row['p18'];
    $p19=$row['p19'];
    $p20=$row['p20'];
    $p18_1=$row['p18_1'];
    $p18_2=$row['p18_2'];
   $id_exp=$row['id_exp'];
   $id_hv=$row['id_hv'];
    include './ifhabitacional.php';

    //
    //'<td><a href="hogar_y_vivienda.php?Id='.$row['id_exp'].'&brId='.$row['id_exp'].'" >Eliminar</a>             
    
} 
  $disa="hidden";

$bn=1;       
$dis="readonly";
$dis1="readonly";
$car="";

}
  else
{ $dis1="readonly";
$disa="";
  $dis="readonly";
  $bn=3;
  $car="margin-left:30%";
  
  } 
    }
?>

<form method="POST" action="hogar_y_vivienda.php?Id=<?php print $id_exp?>" autocomplete="off">
    <input type="hidden" name="id_exp" value="<?php print $id_exp?>">
    <input type="hidden" name="id_hv" value="<?php print $id_hv?>">
    <input type="hidden" name="id_user" value="<?php print $id_user?>">

 <table border="2">
        <br><br>
        <tr>
            <th colspan="3">CARACTERÍSTICAS DEL HOGAR Y LA VIVIENDA</th>
        </tr>

        <tr><th colspan="3"><p></p></th>
            <tr>
                <th class="sino1" rowspan="1"><b>1 ¿CUÁL ES EL MATERIAL PREDOMINANTE EN LOS PISOS?</b>
                 
                </th>
                <td style="width:5%;border-right: none;" rowspan="1" style="background-color: #8acdf9;"><input style="width: 90%;padding: 0px 0px 0px 0px;"  name="p1" id="p1" type="text" class="sino1" maxlength="1" required value="<?php print $p1 ?>" <?php print $dis1 ?> onkeydown="return tab_btn(event,getElementById('p1'),getElementById('p2'))" oninput="checkLength1()">   
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp1" id="dp1" cols="1" rows="3" disabled><?php print $dp1 ?></textarea>
                </td>
            </tr>

            <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>2 ¿CUÁL ES EL MATERIAL PREDOMINANTE DdE LAS PAREDES EXTERIORES?</b>
                </th>

                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
                    <input type="text" style="width: 90%" class="sino2" maxlength="1" name="p2" id="p2" required=""  value="<?php print $p2 ?>" oninput="checkLength2()" <?php print $dis?> onkeydown="return tab_btn1(event,getElementById('p2'),getElementById('p3'),getElementById('p4'))">  
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp2" id="dp2" cols="1" rows="3" disabled><?php print $dp2 ?></textarea>
                </td>
            </tr>

            <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>3 LAS PAREDES EXTERIORES ¿TIENEN REVESTIMIENTO EXTERNO O REVOQUE? incluye terminación "Ladrillo a la vista"</b>
                </th>

                <td style="width:5%;border-right: none" style="background-color: #8acdf9;">
                    <input name="p3" id="p3" type="text" maxlength="1" class="sin" style="width: 90%" value="<?php print $p3 ?>" oninput="checkLength3()" <?php print $dis?> onkeydown="return tab_btn(event,getElementById('p3'),getElementById('p4'))">
                </td>
              <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp3" id="dp3" cols="1" rows="3" disabled><?php print $dp3 ?></textarea>
                </td>
            </tr>

             <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>4 ¿CUÁL ES EL MATERIAL PREDOMINANTE DE LA  CUBIERTA EXTERIOR DEL TECHO?Si la vivienda forma parte de un edificio de dptos, se considera el techo del último piso del edificio.</b>
                </th>

                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
                     <input style="width: 90%" name="p4" id="p4" type="text" maxlength="1"  class="sinocin" required value="<?php print $p4 ?>" oninput="checkLength4()" <?php print $dis?> onkeydown="return tab_btn(event,getElementById('p4'),getElementById('p5'))"  >
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp4" id="dp4" cols="1" rows="3" disabled><?php print $dp4 ?></textarea>
                </td>
            </tr>

             <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>5 EL TECHO ¿TIENEN REVESTIMIENTO INTERIOR O CIELORRASO?</b>
                </th>

                <td style="width:5%;border-right: none" style="background-color: #8acdf9;">
                   <input name="p5" id="p5"  type="text" maxlength="1" class="sin" required value="<?php print $p5 ?>" style="width: 90%" 
                   oninput="checkLength5()" onkeydown="return tab_btn(event,getElementById('p5'),getElementById('p6'))" <?php print $dis?> >
                </td>
               <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp5" id="dp5" cols="1" rows="3" disabled><?php print $dp5 ?></textarea>
                </td>
            </tr>

             <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>6 ¿TIENE AGUA...</b>
                </th>

                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
                   <input type="text" style="width: 90%"  maxlength="1"  name="p6" id="p6" class="sinotre" required="" value="<?php print $p6 ?>" oninput="checkLength6()" <?php print $dis?> onkeydown="return tab_btn(event,getElementById('p6'),getElementById('p7'))" >
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp6" id="dp6" cols="1" rows="3" disabled><?php print $dp6 ?></textarea>
                </td>
            </tr>

            <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>7 EL AGUA QUE USA ESTE HOGAR  PARA BEBER Y COCINAR, ¿PROVIENE...</b>
                </th>

                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
                 <input type="text" maxlength="1" class="sinocin" name="p7" id="p7" required value="<?php print $p7 ?>" oninput="checkLength7()" style="width: 90%" <?php print $dis?> onkeydown="return tab_btn(event,getElementById('p7'),getElementById('p8'))"> 
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp7" id="dp7" cols="1" rows="3" disabled><?php print $dp7 ?></textarea>
                </td>
            </tr>

              <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>8 ESTE HOGAR ¿TIENE BAÑO O LETRINA...</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
                 <input class="sinotre" type="text" maxlength="1" name="p8" id="p8" required value="<?php print $p8 ?>" oninput="checkLength8()" style="width: 90%" <?php print $dis?> onkeydown="return tab_btn2(event,getElementById('p8'),getElementById('p9'),getElementById('p10'),getElementById('p11'),getElementById('p12'))"> 
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp8" id="dp8" cols="1" rows="3" disabled><?php print $dp8 ?></textarea>
                </td>
            </tr>

             <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>9 EL BAÑO ¿TIENE...(Si tiene mas de un baño, se considera el baño principal)</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
                 <input type="text" class="sinotre" maxlength="1"  name="p9" id="p9" value="<?php print $p9 ?>" oninput="checkLength9()" onkeydown="return tab_btn(event,getElementById('p9'),getElementById('p10'))" style="width: 90%" <?php print $dis?>> 
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp9" id="dp9" cols="1" rows="3" disabled><?php print $dp9 ?></textarea>
                </td>
            </tr>

             <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>10 EL DESAGUE DEL INODORO ¿ES...</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
                 <input name="p10" class="sino1" id="p10" maxlength="1" type="text" value="<?php print $p10 ?>" oninput="checkLength10()" onkeydown="return tab_btn(event,getElementById('p10'),getElementById('p11'))" style="width: 90%" <?php print $dis?>>
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp10" id="dp10" cols="1" rows="3" disabled><?php print $dp10 ?></textarea>
                </td>
            </tr>


           <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>11 EL BAÑO O LETRINA ¿ES...</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
                <input type="text" maxlength="1" class="sin" name="p11" id="p11" value="<?php print $p11 ?>" oninput="checkLength11()" onkeydown="return tab_btn(event,getElementById('p11'),getElementById('p12'))" style="width: 90%" <?php print $dis?> >
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp11" id="dp11" cols="1" rows="3" disabled><?php print $dp11 ?></textarea>
                </td>
            </tr>
            
            <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>12 ESTE HOGAR ¿TIENE UN LUGAR O CUARTO PARA COCINAR..</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
               <input type="text" class="sino1" maxlength="1" name="p12" id="p12" required="" value="<?php print $p12 ?>" onkeydown="return tab_btn(event,getElementById('p12'),getElementById('p13'))" oninput="checkLength12()" style="width: 90%" <?php print $dis?>>
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp12" id="dp12" cols="1" rows="3" disabled><?php print $dp12 ?></textarea>
                </td>
            </tr>

              <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>13 PARA COCINAR, ¿UTILIZA PRINCIPALMENTE…</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
              <input type="text" maxlength="1" name="p13" id="p13" class="sinocin" required value="<?php print $p13 ?>" oninput="checkLength13()" onkeydown="return tab_btn(event,getElementById('p13'),getElementById('p14'))" style="width: 90%" <?php print $dis?> >
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp13" id="dp13" cols="1" rows="3" disabled><?php print $dp13 ?></textarea>
                </td>
              </tr>

                <tr><th colspan="3"><p></p></th>

            <tr>
                <th class="sino1" rowspan="1"><b>14 ESTE HOGAR ¿TIENE AGUA CALIENTE A TRAVÉS DE…</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
            <input type="text" maxlength="1" name="p14" id="p14" class="sinocin" required="" value="<?php print $p14 ?>" oninput="checkLength14()" onkeydown="return tab_btn(event,getElementById('p14'),getElementById('p15'))" style="width: 90%" <?php print $dis?>>
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp14" id="dp14" cols="1" rows="3" disabled><?php print $dp14 ?></textarea>
                </td>
              </tr>
            
              <tr><th colspan="3"><p></p></th>

                 <tr>
                <th class="sino1" rowspan="1"><b>15 EN TOTAL, ¿CUÁNTOS AMBIENTES, HABITACIONES O PIEZAS TIENE ESTE HOGAR (SIN CONTAR BAÑOS NI COCINAS)?</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
                <input type="text" maxlength="2" name="p15" id="p15" required="" value="<?php print $p15 ?>" oninput="checkLength15()" onkeydown="return tab_btn(event,getElementById('p15'),getElementById('p16'))" style="width: 90%" <?php print $dis?>>
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp15" id="dp15" cols="1" rows="3" disabled><?php print $dp15 ?></textarea>
                </td>
              </tr>

            <tr><th colspan="3"><p></p></th>

                 <tr>
                <th class="sino1" rowspan="1"><b>16 DE ESOS, ¿CUÁNTOS USAN HABITUALMENTE PARA DORMIR?</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
               <input type="text" maxlength="2" name="p16" id="p16" required value="<?php print $p16 ?>" oninput="checkLength16()" onkeydown="return tab_btn(event,getElementById('p16'),getElementById('p17'))" style="width: 90%" <?php print $dis?>>
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp16" id="dp16" cols="1" rows="3" disabled><?php print $dp16 ?></textarea>
                </td>
              </tr>

              <tr><th colspan="3"><p></p></th>

                 <tr>
                <th class="sino1" rowspan="1"><b>17 DE ESOS, ¿CUÁNTOS USAN HABITUALMENTE PARA DORMIR?</b>
                </th>
                
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
               <input type="text" maxlength="1" name="p17" id="p17" class="sinonueve" required value="<?php print $p17 ?>" oninput="checkLength17()" onkeydown="return tab_btn(event,getElementById('p17'),getElementById('p18'))" style="width: 90%" <?php print $dis?>>
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp17" id="dp17" cols="1" rows="3" disabled><?php print $dp17 ?></textarea>
                </td>
              </tr>

               <tr><th colspan="3"><p></p></th>

                 <tr>
                <th class="sino1" rowspan="1"><b>18 SITUACIÓN DOMINIAL DE LA VIVIENDA</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
              <input type="text" maxlength="1" name="p18" id="p18" onkeyup="wipe()" class="sino2" required="" value="<?php print $p18 ?>" oninput="checkLength18()" style="width: 90%" <?php print $dis?> onkeydown="return tab_btn3(event,getElementById('p18'),getElementById('p19'))" >
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp18" id="dp18" cols="1" rows="3" disabled><?php print $dp18 ?></textarea>
               <input type="text" name="p18_1" id="p18_1" onkeydown="return tab_btn4(event,getElementById('p18_1'),getElementById('p19'))" style="display:none;" placeholder="Especificar" value="<?php print $p18_1?>">
                <input   type="text" class="entero" name="p18_2" id="p18_2" onkeydown="return tab_btn4(event,getElementById('p18_2'),getElementById('p19'))" style="display:none;" placeholder="Nro de Expediente" value="<?php print $p18_2 ?>">
                <br>
                </td>
              </tr>
            
            <tr><th colspan="3"><p></p></th>

                 <tr>
                <th class="sino1" rowspan="1"><b>19 EN SU VIVIENDA, ¿TIENE MEDIDOR DE ENERGÍA ELÉCTRICA?</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
              <input type="text" maxlength="1" name="p19" id="p19" class="sin" required value="<?php print $p19 ?>"  oninput="checkLength19()" onkeydown="return tab_btn(event,getElementById('p19'),getElementById('p20'))" style="width: 90%" <?php print $dis?>>
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp19" id="dp19" cols="1" rows="3" disabled><?php print $dp19 ?></textarea>
                </td>
              </tr>

              <tr><th colspan="3"><p></p></th>

                 <tr>
                <th class="sino1" rowspan="1"><b>20 A LOS RESIDUOS DEL HOGAR LOS…</b>
                </th>
  
                <td style="width:5%;border-right: none" rowspan="1" style="background-color: #8acdf9;">
              <input type="text" maxlength="1" name="p20" id="p20" class="sinocin" required  value="<?php print $p20 ?>" oninput="checkLength20()" onkeydown="return tab_btn(event,getElementById('p20'),getElementById('submitguardar'))"style="width: 90%" <?php print $dis?>>
                </td>
                <td style="width:40%;border-left:none"> 
              <textarea style="width:95%" name="dp20" id="dp20" cols="1" rows="3" disabled><?php print $dp20 ?></textarea>
                </td>
              </tr>

   
            </tr>
                <td colspan="<?php print $bn ?>" id="boton">
                   <input type="button" onclick="redirect()" style="width:18%" value="Principal" <?php print $disa ?> >
                      <input type="button" onclick="redirect1()" style="width:15%;margin-left:12%;" value="Cancelar" <?php print $disas ?>>
                
          
                  </td>


                 <?php
 if(!isset($_GET['mdIdi'])){
    new Conexion();
    $id_exp_3 =$_GET['Id'];
    $query="select * from carac_hv where id_exp = '$id_exp_3'"; 
    $result = pg_query($query); 
    if(pg_num_rows($result)>'0'){
    $NuevoIndicador=new Indicador();
$NuevoIndicador= $NuevoIndicador->getIndicador($_GET['Id']); // obtiene todos las salidas para despues 

while ($row=  pg_fetch_array($NuevoIndicador)) // recorre los identificaciones uno por uno hasta el fin de la tabla
{

        

     print               
    
       '<td colspan="2"><a href="javascript:;" onclick="redirect()">Principal</a></td>';
     

}        

}
}

?>
            </tr>

             
          
            </table>
        </form>
    </div>


    <?php

if (isset($_POST['submit'])&&!is_numeric($_POST['id_hv'])) // si presiono el boton ingresar
{
    $NuevoIndicador=new Indicador ();
    $NuevoIndicador->setid_hv($_POST['id_hv']); 
    $NuevoIndicador->setp1($_POST['p1']);
    $NuevoIndicador->setp2($_POST['p2']);
    $NuevoIndicador->setp3($_POST['p3']);
    $NuevoIndicador->setp4($_POST['p4']);
    $NuevoIndicador->setp5($_POST['p5']);
    $NuevoIndicador->setp6($_POST['p6']);
    $NuevoIndicador->setp7($_POST['p7']);
    $NuevoIndicador->setp8($_POST['p8']);
    $NuevoIndicador->setp9($_POST['p9']);
    $NuevoIndicador->setp10($_POST['p10']);
    $NuevoIndicador->setp11($_POST['p11']);
    $NuevoIndicador->setp12($_POST['p12']);  
    $NuevoIndicador->setp13($_POST['p13']);
    $NuevoIndicador->setp14($_POST['p14']);
    $NuevoIndicador->setp15($_POST['p15']);
    $NuevoIndicador->setp16($_POST['p16']);
    $NuevoIndicador->setp17($_POST['p17']);
    $NuevoIndicador->setp18($_POST['p18']);
    $NuevoIndicador->setp19($_POST['p19']);
    $NuevoIndicador->setp20($_POST['p20']);
    $NuevoIndicador->setp18_1(strtoupper($_POST['p18_1']));
    $NuevoIndicador->setp18_2($_POST['p18_2']);
    $NuevoIndicador->setid_exp($_POST['id_exp']); 
    print  $NuevoIndicador->insertIndicador();
    echo "<meta http-equiv='refresh' content='0'>"; // inserta y muestra el resultado


}
if (isset($_POST['submit'])&&is_numeric($_POST['id_exp'])&&is_numeric($_POST['id_hv'])) // si presiono el boton y es modificar
{
    $NuevoIndicador=new Indicador ();
    $NuevoIndicador->setid_hv($_POST['id_hv']); 
    $NuevoIndicador->setp1($_POST['p1']);
    $NuevoIndicador->setp2($_POST['p2']);
    $NuevoIndicador->setp3($_POST['p3']);
    $NuevoIndicador->setp4($_POST['p4']);
    $NuevoIndicador->setp5($_POST['p5']);
    $NuevoIndicador->setp6($_POST['p6']);
    $NuevoIndicador->setp7($_POST['p7']);
    $NuevoIndicador->setp8($_POST['p8']);
    $NuevoIndicador->setp9($_POST['p9']);
    $NuevoIndicador->setp10($_POST['p10']);
    $NuevoIndicador->setp11($_POST['p11']);
    $NuevoIndicador->setp12($_POST['p12']);  
    $NuevoIndicador->setp13($_POST['p13']);
    $NuevoIndicador->setp14($_POST['p14']);
    $NuevoIndicador->setp15($_POST['p15']);
    $NuevoIndicador->setp16($_POST['p16']);
    $NuevoIndicador->setp17($_POST['p17']);
    $NuevoIndicador->setp18($_POST['p18']);
    $NuevoIndicador->setp19($_POST['p19']);
    $NuevoIndicador->setp20($_POST['p20']);
    $NuevoIndicador->setp18_1(strtoupper($_POST['p18_1']));
    $NuevoIndicador->setp18_2($_POST['p18_2']); 
    $NuevoIndicador->setid_exp($_POST['id_exp']); 
    print  $NuevoIndicador->updateIndicador ();
    echo "<meta http-equiv='refresh' content='0'>";
     // inserta y muestra el resultado
}
   new Conexion();
    $id_exp_3 =$_GET['Id'];
    $query="select * from carac_hv where id_exp = '$id_exp_3'"; 
    $result = pg_query($query); 
    if(pg_num_rows($result)>'0')
    {$i=1;}
  else
    {$i=0;}
if (isset($_GET['brId'])&&is_numeric($_GET['brId'])&&$i==1) // si presiono el boton y es eliminar
{
    $NuevoIndicador=new Indicador ();
    print  $NuevoIndicador->deleteIndicador($_GET['brId']);
    echo "<meta http-equiv='refresh' content='0'>";

  // elimina el identificacion y muestra el resultado
}

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
    $NuevoIndicador=new Indicador ();
    print  $NuevoIndicador->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
}

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
    $NuevoIndicador=new Indicador ();
    print  $NuevoIndicador->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
}
    
}
else
{
    print '<img src="./imagenes/accesoDenegado.png" style=" position: absolute; top: 40%; left: 44%;">';       
}
?>


</script>

<script type="text/javascript">
    function wipe(){
     var camp18 = document.getElementById("p18");
     var camp18_1 = document.getElementById("p18_1");
     var camp18_2 = document.getElementById("p18_2");

     if(camp18.value == "5"){
        camp18_1.value='';
        camp18_2.style.display="block";
        camp18_2.style.margin="auto";
    }
    else
    {
        camp18_2.value="";
        camp18_2.style.display="none";
        camp18_2.style.margin="auto";
    }
    if(camp18.value == "6"){
        camp18_2.value="";
        camp18_1.style.display="block";
        camp18_1.style.margin="auto";
    }
    else
    {
        camp18_1.style.display="none";
        camp18_1.style.margin="auto";
    }
}   
</script>



<script type="text/javascript">

    function checkLength1()
    {

    var p1 = document.getElementById('p1');
    var p2 = document.getElementById('p2');
    var dp1 = document.getElementById('dp1');


    //Suppose u want 4 number of character
    if(p1.value == 1){
      dp1.value="Cerámica, mosaico, mármol, alfombra, madera, vinílico,microcemento o cemento alisado";
          p2.disabled=false;
  }
      if(p1.value == 2){
      dp1.value="Carpeta, Contrapiso o Ladrillo fijo";
      p2.disabled=false;
  }
      if(p1.value == 3){
      dp1.value="Tierra o Ladrillo suelto";
      p2.disabled=false;
  }
      if(p1.value == 4){
      dp1.value="Otros";
      p2.disabled=false;
  }
  if(p1.value == ''){
      dp1.value="";
      p2.disabled=true;
  }
}
function checkLength2()
{

        var p2 = document.getElementById('p2');
        var p3 = document.getElementById('p3');
        var dp2 = document.getElementById('dp2');
        var camp2 = document.getElementById("p2");
        var camp3 = document.getElementById("p3");
        var camp4 = document.getElementById("p4");
   
        if(camp2.value == "3" || camp2.value == "4" || camp2.value == "5" || camp2.value == "6" )
        {

            camp4.disabled=false;
            camp4.value="";
            camp3.value="";
            camp3.style.display="none";
        }
        else
        {   camp4.disabled=true;  
            camp3.style.margin="auto";
            camp3.style.display="block";
        }

    //Suppose u want 4 number of character
    if(p2.value == 1){
      dp2.value="Ladrillo, Piedra, Bloque, hormigón o Panel Premoldeado";
      p3.disabled=false;
  }
      if(p2.value == 2){
      dp2.value="Adobe";
      p3.disabled=false;
  }
      if(p2.value == 3){
      dp2.value="Madera";
      p3.disabled=false;
  }
      if(p2.value == 4){
      dp2.value="Chapa de metal o fibrocemento";
      p3.disabled=false;
  }

  if(p2.value == 5){
      dp2.value="Chorizo, cartón, palma, paja sola o material de desecho";
      p3.disabled=false;
  }

  if(p2.value == 6){
      dp2.value="Otros";
      p3.disabled=false;
  }
  if(p2.value == ''){
      dp2.value="";
      p3.disabled=true;
  }
}

function checkLength3()
{

     var camp2 = document.getElementById("p2");
       var camp3 = document.getElementById("p3");
       var p3 = document.getElementById('p3');
       var p4 = document.getElementById('p4');
       var dp3 = document.getElementById('dp3');

    //Suppose u want 4 number of character
    if(p3.value == 1){
      dp3.value="Si";
      p4.disabled=false;
  }
      if(p3.value == 2){
      dp3.value="No";
      p4.disabled=false;
  }
      if(p3.value == ''){
      dp3.value="";
      p4.disabled=true;
  }

       if(camp2.value > "2"  && (camp3.value == "1" || camp3.value == "2")  )
       {
        camp2.focus();
        camp2.value="";
        
    }

}
function checkLength4()
{
   var p5 = document.getElementById('p5');
   var p4 = document.getElementById('p4');
   var dp4 = document.getElementById('dp4');

    //Suppose u want 4 number of character
    if(p4.value == 1){
      dp4.value="Baldaso, membrana, pintura, asfáltica, pizarra o teja";
      p5.disabled=false;
  }
      if(p4.value == 2){
      dp4.value="Losa o carpeta a la vista(Sin cubierta)";
      p5.disabled=false;
  }
      if(p4.value == 3){
      dp4.value="Chapa de metal";
      p5.disabled=false;
  }
      if(p4.value == 4){
      dp4.value="Chapa de cartón, caña, palma, tabla con barro, paja con barro o paja sola";
      p5.disabled=false;
  }

  if(p4.value == 5){
      dp4.value="Otros";
      p5.disabled=false;
  }

  if(p4.value == ''){
      dp4.value="";
      p5.disabled=true;
  } 
}
function checkLength5()
{
  var p6 = document.getElementById('p6');
   var p5 = document.getElementById('p5');
   var dp5 = document.getElementById('dp5');

    //Suppose u want 4 number of character
    if(p5.value == 1){
      dp5.value="Si";
      p6.disabled=false;
  }
      if(p5.value == 2){
      dp5.value="No";
      p6.disabled=false;
  }
      if(p5.value == ''){
      dp5.value="";
      p6.disabled=true;
  }

}
function checkLength6()
{     var p7 = document.getElementById('p7');
      var p6 = document.getElementById('p6');
      var dp6 = document.getElementById('dp6');

    //Suppose u want 4 number of character
    if(p6.value == 1){
      dp6.value="Por cañeria dentro de la vivienda";
      p7.disabled=false;

  }
      if(p6.value == 2){
      dp6.value="Fuera de la vivienda, pero dentro del terreno";
      p7.disabled=false;
  }
      if(p6.value == 3){
      dp6.value="Fuera del terreno";
      p7.disabled=false;
  }

   if(p6.value == ''){
      dp6.value="";
      p7.disabled=true;
  }
}
function checkLength7()
{       var p8 = document.getElementById('p8');
        var p7 = document.getElementById('p7');
        var dp7 = document.getElementById('dp7');

    //Suppose u want 4 number of character
    if(p7.value == 1){
      dp7.value="de Red pública(agua Corriente)";
      p8.disabled=false;
  }
      if(p7.value == 2){
      dp7.value="de perforación con bomba a motor";
      p8.disabled=false;
  }
      if(p7.value == 3){
      dp7.value="de perforación con bomba manual";
      p8.disabled=false;
  }
      if(p7.value == 4){
      dp7.value="de pozo sin bomba";
      p8.disabled=false;
  }
      if(p7.value == 5){
      dp7.value="Otro";
      p8.disabled=false;
  }
      if(p7.value == ''){
      dp7.value="";
      p8.disabled=true;
  }

}
function checkLength8()
{
        var camp8 = document.getElementById("p8");
        var camp9 = document.getElementById("p9");
        var camp10 = document.getElementById("p10");
        var camp11 = document.getElementById("p11");
        var camp12 = document.getElementById("p12");
        var p8 = document.getElementById('p8');
        var p9 = document.getElementById('p9');
        var dp8 = document.getElementById('dp8');

    //Suppose u want 4 number of character
    if(p8.value == 1){
      dp8.value="Dentro de la vivienda";
      p9.disabled=false;
  }
      if(p8.value == 2){
      dp8.value="Fuera de la vivienda, pero dentro del terreno";
      p9.disabled=false;
  }
      if(p8.value == 3){
      dp8.value="No tiene";
      p9.disabled=false;
  }
      if(p8.value == ''){
      dp8.value="";
      p9.disabled=true;
  }

        if(camp8.value =="3")
        {   
            camp12.disabled=false;
            camp12.value="";
            camp9.style.display="none";
            camp10.style.display="none";
            camp11.style.display="none";
            camp9.value="";
            camp10.value="";
            camp11.value="";
        }
        else
        {
         
         camp9.style.margin="auto";
         camp9.style.display="block";
         camp10.style.margin="auto";
         camp10.style.display="block";
         camp11.style.margin="auto";
         camp11.style.display="block";

     }
}
function checkLength9()
{
        var camp8 = document.getElementById("p8");
        var camp9 = document.getElementById("p9");
        var camp10 = document.getElementById("p10");
        var camp11 = document.getElementById("p11");

       var p10 = document.getElementById('p10');
       var p9 = document.getElementById('p9');
       var dp9 = document.getElementById('dp9');

      

    //Suppose u want 4 number of character
    if(p9.value == 1){
      dp9.value="Inodoro con boton, mochila o cadena(con arrastre de agua)";
      p10.disabled=false;
  }
      if(p9.value == 2){
      dp9.value="Inodoro sin botón o sin cadena (a balde)";
      p10.disabled=false;
  }
      if(p9.value == 3){
      dp9.value="Pozo";
      p10.disabled=false;
  }
      if(p9.value == ''){
      dp9.value="";
      p10.disabled=true;
  }

  
        if((camp9.value >= "1" || camp10.value >= "1" || camp11.value > "1") && camp8.value=="3" )
        {   
            camp8.focus();
            camp8.value="";
        }

}
function checkLength10()
{

  var camp8 = document.getElementById("p8");
  var camp9 = document.getElementById("p9");
  var camp10 = document.getElementById("p10");
  var camp11 = document.getElementById("p11");

  var p10 = document.getElementById('p10');
  var p11 = document.getElementById('p11');
  var dp10 = document.getElementById('dp10');

  if(p10.value == 1){
      dp10.value="Red pública (Cloaca)";
      p11.disabled=false;
  }
      if(p10.value == 2){
      dp10.value="Solo a pozo ciego";
      p11.disabled=false;
  }
      if(p10.value == 3){
      dp10.value="Pozo";
      p11.disabled=false;
  }
      if(p10.value == 4){
      dp10.value="A hoyo, excavación en la tierra, etc.";
      p11.disabled=false;
  }
 
      if(p10.value == ''){
      dp10.value="";
      p11.disabled=true;
  }

    //Suppose u want 4 number of character
 
  
        if((camp9.value >= "1" || camp10.value >= "1" || camp11.value > "1") && camp8.value=="3" )
        {
            camp8.focus();
            camp8.value="";
        }
}
function checkLength11()
{

  var camp8 = document.getElementById("p8");
  var camp9 = document.getElementById("p9");
  var camp10 = document.getElementById("p10");
  var camp11 = document.getElementById("p11");

  var p11 = document.getElementById('p11');
  var p12 = document.getElementById('p12');
  var dp11 = document.getElementById('dp11');

  if(p11.value == 1){
      dp11.value="Usado solo por este hogar";
      p12.disabled=false;
  }
      if(p11.value == 2){
      dp11.value="Compartido con otros hogares";
      p12.disabled=false;
  }
      if(p11.value == ''){
      dp11.value="";
      p12.disabled=true;
  }
  
  if((camp9.value >= "1" || camp10.value >= "1" || camp11.value > "1") && camp8.value=="3" )
    {
        camp8.focus();
        camp8.value="";
    }

}
function checkLength12()
{

  var p12 = document.getElementById('p12');
  var p13 = document.getElementById('p13');
  var dp12 = document.getElementById('dp12');

  if(p12.value == 1){
      dp12.value="Con instalación de agua y desague";
      p13.disabled=false;
  }
      if(p12.value == 2){
      dp12.value="Con instalación de agua sin desague";
      p13.disabled=false;
  }
      if(p12.value == 3){
      dp12.value="Sin instalación de agua";
      p13.disabled=false;
  }
        if(p12.value == 4){
      dp12.value="No Tiene lugar o cuarto para cocinar";
      p13.disabled=false;
  }
        if(p12.value == ''){
      dp12.value="";
      p13.disabled=true;
  }

}
function checkLength13()
{

  var p13 = document.getElementById('p13');
  var p14 = document.getElementById('p14');
  var dp13 = document.getElementById('dp13');

  if(p13.value == 1){
      dp13.value="Electricidad";
      p14.disabled=false;
  }
      if(p13.value == 2){
      dp13.value="Gas de red";
       p14.disabled=false;
  }
      if(p13.value == 3){
      dp13.value="Gas en garrafa, en tubo o a granel (zeppelin)";
       p14.disabled=false;
  }
        if(p13.value == 4){
      dp13.value="Leña o carbón";
       p14.disabled=false;
  }
        if(p13.value == 5){
      dp13.value="Otro";
       p14.disabled=false;
  }

      if(p13.value == ''){
      dp13.value="";
       p14.disabled=true;
  }

}
function checkLength14()
{
  var p14 = document.getElementById('p14');
  var p15 = document.getElementById('p15');
  var dp14 = document.getElementById('dp14');

  if(p14.value == 1){
      dp14.value="Calefón o termotanque a gas";
      p15.disabled=false;
  }
      if(p14.value == 2){
      dp14.value="Calefón o termotanque eléctrico";
      p15.disabled=false;
  }
      if(p14.value == 3){
      dp14.value="Caldera central";
      p15.disabled=false;
  }
        if(p14.value == 4){
      dp14.value="Panel solar";
      p15.disabled=false;
  }
        if(p14.value == 5){
      dp14.value="No tiene agua caliente";
      p15.disabled=false;
  }

      if(p14.value == ''){
      dp14.value="";
      p15.disabled=true;
  }

}
function checkLength15()
{
  var p16 = document.getElementById('p16');
  var p15 = document.getElementById('p15');
  var dp15 = document.getElementById('dp15');

  if(p15.value >= 0){
      dp15.value=p15.value;
      p16.disabled=false;
  }
  if(p15.value == '')
{p16.disabled=true;}
}
function checkLength16()
{

  var p16 = document.getElementById('p16');
  var p17 = document.getElementById('p17');
  var dp16 = document.getElementById('dp16');

  if(p16.value >= 0){
      dp16.value=p16.value;
      p17.disabled=false;
  }
   if(p16.value == '')
{p17.disabled=true;}
}
function checkLength17()
{
  var p17 = document.getElementById('p17');
  var p18 = document.getElementById('p18');
  var dp17 = document.getElementById('dp17');

  if(p17.value == 1){
      dp17.value='Propietario de la vivienda y el terreno';
      p18.disabled=false;
  }
  if(p17.value == 2){
      dp17.value='propietario de la vivienda solamente';
      p18.disabled=false;
  }
  if(p17.value == 3){
      dp17.value='Inquilino/arrendatario de la vivienda';
      p18.disabled=false;
  }
  if(p17.value == 4){
      dp17.value='Ocupante por pago de impuestos/expensas';
      p18.disabled=false;
  }
  if(p17.value == 5){
      dp17.value='Ocupante en relación de dependencia';
      p18.disabled=false;
  }
  if(p17.value == 6){
      dp17.value='Ocupante gratuito (con permiso)';
      p18.disabled=false;
  }
  if(p17.value == 7){
      dp17.value='Ocupante de hecho (sin permiso)';
      p18.disabled=false;
  }
  if(p17.value == 8){
      dp17.value='Está en sucesión';
      p18.disabled=false;
  }
  if(p17.value == 9){
      dp17.value='Otro';
      p18.disabled=false;
  }
  if(p17.value == ''){
      dp17.value='';
      p18.disabled=true;
  }
}
function checkLength18()
{
   var p18 = document.getElementById('p18');
   var p19 = document.getElementById('p19');
  var dp18 = document.getElementById('dp18');

  if(p18.value == 1){
      dp18.value='Escritura';
      p19.disabled=false;
  }
  if(p18.value == 2){
      dp18.value='Boleto de compra/venta';
      p19.disabled=false;
  }
  if(p18.value == 3){
      dp18.value='Terreno fiscal';
      p19.disabled=false;
  }
  if(p18.value == 4){
      dp18.value='Asentamiento';
      p19.disabled=false;
  }
  if(p18.value == 5){
      dp18.value='Expediente trámite dominial. Nro.';
      p19.disabled=false;
  }
  if(p18.value == 6){
      dp18.value='Otro (especificar)';
      p19.disabled=false;
  }
  if(p18.value == ''){
      dp18.value='';
      p19.disabled=true;
  }

}

function checkLength19()
{
     var p19 = document.getElementById('p19');
     var p20 = document.getElementById('p20');
   var dp19 = document.getElementById('dp19');

    //Suppose u want 4 number of character
    if(p19.value == 1){
      dp19.value="Si";
      p20.disabled=false;
  }
      if(p19.value == 2){
      dp19.value="No";
      p20.disabled=false;
  }
      if(p19.value == ''){
      dp19.value="";
      p20.disabled=true;
  }
}
function checkLength20()
{
   var p20 = document.getElementById('p20');
   var submitguardar = document.getElementById('submitguardar');
   var dp20 = document.getElementById('dp20');

    //Suppose u want 4 number of character
    if(p20.value == 1){
      dp20.value="Recolectan a domicilio";
      submitguardar.disabled=false;
  }
     if(p20.value == 2){
      dp20.value="Lleva a contenedor";
      submitguardar.disabled=false;
  }
     if(p20.value == 3){
      dp20.value="Entierra y quema";
      submitguardar.disabled=false;
  }
     if(p20.value == 4){
      dp20.value="Arroja a pozo basurero";
      submitguardar.disabled=false;
  }
     if(p20.value == 5){
      dp20.value="Sin tratamiento";
      submitguardar.disabled=false;
  }
     if(p20.value == ''){
      dp20.value="";
      submitguardar.disabled=true;
  }
}
</script>
 <script>
function ponleFocus(){
  document.getElementById("p1").focus();
  aux=p1.value;
  p1.value="";
  p1.value=aux;
}

ponleFocus();


function tab_btn(event,p1,p2)
{
  var x1=p1;
  var x2=p2;
  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value > 0) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }  
    return true;

  }
  function tab_btn1(event,p2,p3,p4)
{
  var x1=p2;
  var x2=p3;
  var x3=p4;
  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && (x1.value == 1 || x1.value == 2)) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }  

  if (t == 9 && (x1.value >=3)) 
  {

  x3.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;
  x2.style.display="none";
    
  return false;
  }  
  
    return true;
  }

   function tab_btn2(event,p8,p9,p10,p11,p12)
{
  var x1=p8;
  var x2=p9;
  var x3=p12;
  var x4=p10;
  var x5=p11;
  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && (x1.value == 1 || x1.value == 2)) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }  

  if (t == 9 && (x1.value ==3)) 
  {

 
  aux=x3.value;
  x3.value="";
  x3.value=aux;
  x2.style.display="none";
  x4.style.display="none";
  x5.style.display="none";
   x3.disabled=false;
  x3.focus();
    
  return false;
  }  
  
    return true;
  }

  function tab_btn3(event,p1,p2)
{
  var x1=p1;
  var x2=p2;
  var x3=document.getElementById('18_1');
  var x4=document.getElementById('18_2');
  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && (x1.value == 1 || x1.value == 2 || x1.value == 3 || x1.value == 4)) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }  

   if (t == 9 && x1.value == 6 ) 
  { 
  x2.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;

  return false;
  }  

if (t == 9 && x1.value == 5 ) 
  { 
  x2.disabled=false;
  x4.focus();
  aux=x4.value;
  x4.value="";
  x4.value=aux;

  return false;
  } 
    return true;

  }

function tab_btn4(event,p1,p2)
{
  var x1=p1;
  var x2=p2;
  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 ) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }  
    return true;

  }

</script>
<script type="text/javascript">
<!--
function redirect() {
  window.location = "visualizar_ficha.php";
}
//-->
</script>
<script type="text/javascript">
<!--
function redirect1(q1) {
const queryString = window.location.search;
console.log(queryString);
const urlParams = new URLSearchParams(queryString);
const product = urlParams.get('Id');
console.log(product);

var str2 = "hogar_y_vivienda.php?Id=";
window.location = str2.concat(product);

}
//-->
</script>

</body>
</html>