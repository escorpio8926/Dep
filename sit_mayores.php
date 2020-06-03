<?php
include 'cabecera.php';
include 'menu.php';
include './classsit_may.php';

if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
 $id_my=""; 
 $num_com="";
 $nombre="";
 $q1="";
 $q2="";
 $q3="";
 $q4="";
 $q5="";
 $q6="";
 $q7="";
 $q8="";
 $q9="";
 $q10="";
 $q11="";
 $q12="";  
 $q13="";
 $q14="";
 $q15="";
 $q16="";
 $q17="";
 $dp1="";
 $dp2="";
 $dp3="";
 $dp4="";
 $dp5="";
 $dp6="";
 $dp7="";
 $dp8="";
 $dp9="";
 $dp14="";
 $dp16="";
 $id_exp=$_GET['Id'];
 $id_user=$_SESSION['id_user'];  

if (isset($_GET['mdIdi'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

        $Nuevosima=new sima($_GET['mdIdi']);  // instancio la clase identificacion pasandole el nro de identificacion, de esta forma lo busca
        $num_com=$Nuevosima->getnum_com();
        $nombre=$Nuevosima->getnombre();
        $q1=$Nuevosima->getq1();
        $q2=$Nuevosima->getq2();
        $q3=$Nuevosima->getq3();
        $q4=$Nuevosima->getq4();
        $q5=$Nuevosima->getq5();
        $q6=$Nuevosima->getq6();
        $q7=$Nuevosima->getq7();
        $q8=$Nuevosima->getq8();
        $q9=$Nuevosima->getq9();
        $q10=$Nuevosima->getq10();
        $q11=$Nuevosima->getq11();
        $q12=$Nuevosima->getq12();  
        $q13=$Nuevosima->getq13();
        $q14=$Nuevosima->getq14();
        $q15=$Nuevosima->getq15();
        $q16=$Nuevosima->getq16();
        $q17=$Nuevosima->getq17();
        $id_exp=$Nuevosima->getid_exp();
        $id_my=$Nuevosima->getid_my(); 
        include './ifsitma.php';
        $bloquear='';
      }

if (isset($_GET['vdIdi'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

        $Nuevosima=new sima($_GET['vdIdi']);  // instancio la clase identificacion pasandole el nro de identificacion, de esta forma lo busca
        $num_com=$Nuevosima->getnum_com();
        $nombre=$Nuevosima->getnombre();
        $q1=$Nuevosima->getq1();
        $q2=$Nuevosima->getq2();
        $q3=$Nuevosima->getq3();
        $q4=$Nuevosima->getq4();
        $q5=$Nuevosima->getq5();
        $q6=$Nuevosima->getq6();
        $q7=$Nuevosima->getq7();
        $q8=$Nuevosima->getq8();
        $q9=$Nuevosima->getq9();
        $q10=$Nuevosima->getq10();
        $q11=$Nuevosima->getq11();
        $q12=$Nuevosima->getq12();  
        $q13=$Nuevosima->getq13();
        $q14=$Nuevosima->getq14();
        $q15=$Nuevosima->getq15();
        $q16=$Nuevosima->getq16();
        $q17=$Nuevosima->getq17();
        $id_exp=$Nuevosima->getid_exp();
        $id_my=$Nuevosima->getid_my(); 
        include './ifsitma.php';
        $bloquear='readonly';
      }

      ?>
      <div id="cuerpo">


        <?php
        if(is_numeric($id_exp)&&is_numeric($id_my))
          {$value='Modificar';
             $bius="readonly";
             $bloquear='';
             $disa="hidden";
      $disas="";
      }
      else
        {$value='Guardar';
      $bius="readonly";
    $bloquear='';
  $disa="";
      $disas="hidden";}
      ?>
      <form method="POST" action="sit_mayor.php?Id=<?php print $id_exp?>" autocomplete="off">
        <input type="hidden" name="id_exp" id="id_exp" value="<?php print $id_exp?>">
        <input type="hidden" name="id_my" value="<?php print $id_my?>">
        <input type="hidden" name="id_user" value="<?php print $id_user?>">

        <table border="2" >
          <br><br>
          <tr>
            <th colspan="3"><b>N° Componente</b><input type="number" name="num_com" id="num_com" style="width: 15%;"  maxlength="2" required="" value="<?php print $num_com ?>"  <?php print $bius ?> >
              <input type="text" name="nombre" id="nombre" value="<?php print $nombre ?>" style="width: 40%;" readonly=""></th>
          </tr>
            
          <tr>
              <th colspan="3">Situación Laboral mayores de 14 años</th>
          </tr>
    
            
          <tr>
              <th class="sin" rowspan="1"><b>1 DURANTE LA SEMANA PASADA, ¿TRABAJÓ POR LO MENOS UNA HORA? (sin contar las tareas de su hogar)</b></th>
              <td style="width:4%;border-right: none;background:#9cf;
              " rowspan="1">
                <input maxlength="1" type="text"  name="q1" id="q1" class="sin" value="<?php print $q1 ?>" style="width:100%" oninput="checkLength1()" onkeydown="return tab_btnz(event,getElementById('q1'),getElementById('q2'),getElementById('q5'))" disabled <?php print $bloquear ?> readonly >
              </td>
               
              <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp1" id="dp1" cols="1" rows="3" disabled><?php print $dp1 ?></textarea>
              </td>
          </tr>
<tr><th colspan="3"><p></p></th>
            
          <tr>
              <th class="sin" rowspan="1"><b>2 EN ESA SEMANA, ¿HIZO ALGUNA CHANGA, FABRICÓ ALGO PARA VENDER AFUERA, AYUDÓ A UN FAMILIAR O AMIGO EN SU CHACRA O
              NEGOCIO?</b></th>
              <td style="width:4%;border-right: none;background:#9cf;" rowspan="1">
                <input type="text" name="q2" id="q2" class="sin" value="<?php print $q2 ?>" style="width:100%" maxlength="1"  oninput="checkLength2()" onkeydown="return tab_btnf(event,getElementById('q2'),getElementById('q3'),getElementById('q5'))" disabled readonly >
              </td>
           
              <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp2" id="dp2" cols="1" rows="3" disabled><?php print $dp2 ?></textarea>
              </td>
          </tr>

    <tr><th colspan="3"><p></p></th>
            
            <tr>
              <th class="sin" rowspan="1"><b>3 EN ESA SEMANA, ¿TENÍA TRABAJO, PERO ESTUVO DE LICENCIA POR VACACIONES O ENFERMEDAD, SUSPENSIÓN CON PAGO, CONFLICTO LABORAL, ETC.?</b></th>
              <td style="width:4%;border-right: none;background:#9cf;" rowspan="1">
                <input type="text" maxlength="1" name="q3" id="q3" class="sin" value="<?php print $q3 ?>" style="width:100%" oninput="checkLength3()" onkeydown="return tab_btnp(event,getElementById('q3'),getElementById('q4'),getElementById('q5'))" disabled readonly>
              </td>
               
              <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp3" id="dp3" cols="1" rows="3" disabled><?php print $dp3 ?></textarea>
              </td>
            </tr>

   <tr><th colspan="3"><p></p></th>

            <tr>
              <th class="sin" rowspan="1"><b>4 DURANTE LAS ÚLTIMAS 4 SEMANAS, ¿BUSCÓ TRABAJO: CONTESTÓ ,AVISOS, CONSULTÓ AMIGOS O PARIENTES, PUSO CARTELES, HIZO ALGO PARA PONERSE POR SU CUENTA? Incluye la búsqueda en forma personal, por medios de comunicación, por internet, etc.</b></th>
              <td style="width:4%;border-right: none;background:#9cf;" rowspan="1">
                <input type="text" maxlength="1" name="q4" id="q4" class="sin"  value="<?php print $q4 ?>" style="width:100%" oninput="checkLength4()" onkeydown="return tab_btn1(event,getElementById('q4'),getElementById('q14'))" disabled readonly>
              </td>
              
              <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp4" id="dp4" cols="1" rows="3" disabled><?php print $dp4 ?></textarea>
              </td>
            </tr>


   <tr><th colspan="3"><p></p></th>
    
            <tr>
              <th class="sin" rowspan="1"><b>5 ¿TRABAJÓ POR UN PAGO EN DINERO O EN ESPECIE?</b></th>
              <td style="width:4%;border-right: none;background:#9cf;" rowspan="1">
              <input name="q5" id="q5" maxlength="1" type="text" class="oby" value="<?php print $q5 ?>" style="width:100%" oninput="checkLength5()"  onkeydown="return tab_btn2(event,getElementById('q5'),getElementById('q6'))" disabled readonly>
              </td>
                
              <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp5" id="dp5" cols="1" rows="3" disabled><?php print $dp5 ?></textarea>
              </td>
           </tr>

    <tr><th colspan="3"><p></p></th>

            <tr>
              <th class="sin" rowspan="1"><b>6 EL TRABAJO PRINCIPAL, EN EL QUE TRABAJA MÁS HORAS…</b></th>
              <td style="width:4%;border-right: none;background:#9cf;" rowspan="1">
              <input type="text" name="q6" maxlength="1" id="q6" class="sinocin"  value="<?php print $q6 ?>" oninput="checkLength6()" onkeydown="return tab_btn3(event,getElementById('q6'),getElementById('q7'),getElementById('q8'))" style="width:100%" disabled readonly>
              </td>
                
              <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp6" id="dp6" cols="1" rows="3" disabled><?php print $dp6 ?></textarea>
              </td>
            </tr>

    <tr><th colspan="3"><p></p></th>

            <tr>
              <th class="sin" rowspan="1"><b>7 EN ESE TRABAJO, ¿LE DESCUENTAN PARA LA JUBILACIÓN?</b></th>
              <td style="width:4%;border-right: none;background:#9cf;" rowspan="1">
             <input type="text" maxlength="1" class="oby" name="q7" id="q7" value="<?php print $q7 ?>"  oninput="checkLength7()" onkeydown="return tab_btn4(event,getElementById('q7'),getElementById('q8'),getElementById('q9'))" style="width:100%" disabled readonly>
              </td>
            
              <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp7" id="dp7" cols="1" rows="3" disabled><?php print $dp7 ?></textarea>
              </td>
            </tr>

    <tr><th colspan="3"><p></p></th>

            <tr>
              <th class="sin" rowspan="1"><b>8 EN ESE TRABAJO, ¿APORTA POR SÍ MISMO PARA LA JUBILACIÓN?</b></th>
              <td style="width:4%;border-right: none;background:#9cf;" rowspan="1">
             <input type="text" class="oby" maxlength="1" name="q8" id="q8"  value="<?php print $q8 ?>" oninput="checkLength8()" onkeydown="return tab_btn2(event,getElementById('q8'),getElementById('q9'))" style="width:100%" disabled readonly>
              </td>
               
              <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp8" id="dp8" cols="1" rows="3" disabled><?php print $dp8 ?></textarea>
              </td>
        </tr>

    <tr><th colspan="3"><p></p></th>

            <tr>
              <th class="sin" rowspan="1"><b>9 ¿ESE TRABAJO ES…</b></th>
              <td style="width:4%;border-right: none;background:#9cf;" rowspan="1">
            <input type="text" class="sino1" maxlength="1" name="q9" id="q9" value="<?php print $q9 ?>" oninput="checkLength9()" onkeydown="return tab_btn5(event,getElementById('q9'),getElementById('q10'),getElementById('q11'))" style="width:100%" disabled readonly>
              </td>
              
                <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp9" id="dp9" cols="1" rows="3" disabled><?php print $dp9 ?></textarea>
                </td>
            </tr>

    <tr><th colspan="3"><p></p></th>

     
              <tr>
                 <th class="sino1" rowspan="1" height="50" ><b>10 MENCIONE EL PLAN DE EMPLEO </b>
                  <td rowspan="1" colspan="2" style="background-color: #8acdf9;"><textarea style="width: 90%" name="q10" id="q10" oninput="tip1()" onkeydown="return tab_btn6(event,getElementById('q10'),getElementById('q11'))" disabled><?php print $q10 ?></textarea></td>
                </th>
              </tr>

    <tr><th colspan="3"><p></p></th>

              <tr>
                <th class="sino1" rowspan="1"><b>11 ¿CUÁL ES EL NOMBRE DE LA OCUPACIÓN QUE REALIZA EN ESE TRABAJO? Ej: quintero, profesor, jefe de mecánicos, vendedor, chofer, peón de campo, secretaria, etc</b>
                  <td rowspan="1" colspan="2" style="background-color: #8acdf9;"><textarea style="width: 90%" name="q11" id="q11" oninput="tiq1()"  onkeydown="return tab_btn6(event,getElementById('q11'),getElementById('q12'))" disabled ><?php print $q11 ?></textarea></td>
                </th>
              </tr>

    <tr><th colspan="3"><p></p></th>
      
             <tr>
                <th class="sino1" rowspan="1"><b>12 ¿QUÉ TAREAS REALIZA? Ej: manejo el camión de la fábrica, superviso a los
                    mecánicos y arreglo maquinarias, vendo electrométricos, siembro y cosecho verduras, doy de comer a los animales y limpio los corrales, etc.</b> 
                    <td rowspan="1" colspan="2" style="background-color: #8acdf9;"><textarea style="width: 90%" name="q12" id="q12" oninput="tik1()"  onkeydown="return tab_btn6(event,getElementById('q12'),getElementById('q13'))" disabled><?php print $q12 ?></textarea></td>
                </th>
              </tr>

    <tr><th colspan="3"><p></p></th>
  
            <tr>
                <th class="sino1"  rowspan="1"><b>13 ¿A QUÉ SE DEDICA O QUÉ PRODUCE LA ACTIVIDAD, NEGOCIO,
                    EMPRESA O INSTITUCIÓN EN LA QUE TRABAJA? Ej: fábrica de ropa, fábrica
                    de tractores, clínica, cría de ovejas, venta de electrodomésticos, reparación de
                    calzado, tintorería, alquiler de maquinarias, cultivo de verduras, servicios de
                  fumigación aérea, etc.</b> 
                  <td rowspan="1" colspan="2" style="background-color: #8acdf9;"><textarea style="width: 90%" name="q13"  id="q13" value="<?php print $q13 ?>" oninput="tiy1()" onkeydown="return tab_btn6(event,getElementById('q13'),getElementById('q14'))" disabled><?php print $q13 ?></textarea></td>
              </th>
            </tr>

    <tr><th colspan="3"><p></p></th>
          
        <tr>
              <th class="sin" rowspan="1"><b>14 ¿SE FORMÓ O TOMÓ CAPACITACIONES PARA MEJORAR SU EMPLEABILIDAD Y COMPETITIVIDAD?</b></th>
              <td style="width:4%;border-right: none;background:#9cf;" rowspan="1">
           <input type="text" name="q14" id="q14" maxlength="1" class="oby" required="" value="<?php print $q14 ?>" oninput="checkLength14()" onkeydown="return tab_btn7(event,getElementById('q14'),getElementById('q15'),getElementById('q16'))" style="width:100%" disabled readonly>
              </td>
             
              <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp14" id="dp14" cols="1" rows="3" disabled><?php print $dp14 ?></textarea>
              </td>
      </tr>
      
    <tr><th colspan="3"><p></p></th>

        <tr>
              <th class="sino1" height="50" rowspan="1"><b>15 ¿QUÉ TIPO DE FORMACIÓN O CAPACITACIÓN HIZO? Ej: carpintería,
              computación, mecánica, albañilería, etc..</b> 
              <td rowspan="1" colspan="2" style="background-color: #8acdf9;"><textarea style="width: 90%" name="q15" id="q15" oninput="tip2()" onkeydown="return tab_btn6(event,getElementById('q15'),getElementById('q16'))"  disabled><?php print $q15 ?></textarea></td>
              </th>
        </tr>
          
    <tr><th colspan="3"><p></p></th>
        
        <tr>
              <th class="sin" rowspan="1"><b>16 ADEMÁS DE SU TRABAJO, ¿SABE ALGÚN OFICIO CON EL CUAL PODRÍA SUSTENTARSE? (construcción, cuidado de personas, cocinar, cultivos, etc.)</b></th>
              <td style="width:4%;border-right: none;background:#9cf;" rowspan="1">
            <input type="text" class="oby" maxlength="1" name="q16" id="q16" required="" value="<?php print $q16 ?>" oninput="checkLength15()"onkeydown="return tab_btn7(event,getElementById('q16'),getElementById('q17'),getElementById('submitguardar'))" style="width:100%" disabled readonly>
              </td>
             
              <td style="width:38%;border-left:none;background: #9cf;"> 
              <textarea style="width:95%" name="dp16" id="dp16" cols="1" rows="3" disabled><?php print $dp16 ?></textarea>
              </td>
        </tr>

    <tr><th colspan="3"><p></p></th>

     <tr>
          <th class="sino1" height="50" rowspan="1"><b>17 ¿QUÉ TIPO DE OFICIO?</b> 
            <td rowspan="1" colspan="2" style="background-color: #8acdf9;"><textarea style="width: 90%" name="q17" id="q17" oninput="tip3()" onkeydown="return tab_btn6(event,getElementById('q17'),getElementById('submitguardar'))" disabled><?php print $q17 ?></textarea></td>
          </th>
    </tr>

    <tr>
          <td colspan="3" id="boton">
 <input type="button" onclick="redirect()" style="width:15%;margin-left:1%;" value="Principal" <?php print $disa ?>>
    <input type="button" onclick="redirect1()" style="width:15%;margin-left:1%;" value="Cancelar" <?php print $disas ?>>
            

          </td>
    </tr>

    

      </table>
    </form>
  </div>

  <?php

if (isset($_POST['submit'])&&!is_numeric($_POST['id_my'])) // si presiono el boton ingresar
{
  $Nuevosima=new sima ();
  $Nuevosima->setid_my($_POST['id_my']);
  $Nuevosima->setnum_com($_POST['num_com']);
  $Nuevosima->setnombre($_POST['nombre']);
  $Nuevosima->setq1($_POST['q1']);
  $Nuevosima->setq2($_POST['q2']);
  $Nuevosima->setq3($_POST['q3']);
  $Nuevosima->setq4($_POST['q4']);
  $Nuevosima->setq5($_POST['q5']);
  $Nuevosima->setq6($_POST['q6']);
  $Nuevosima->setq7($_POST['q7']);
  $Nuevosima->setq8($_POST['q8']);
  $Nuevosima->setq9($_POST['q9']);
  $Nuevosima->setq10($_POST['q10']);
  $Nuevosima->setq11($_POST['q11']);
  $Nuevosima->setq12($_POST['q12']);  
  $Nuevosima->setq13($_POST['q13']);
  $Nuevosima->setq14($_POST['q14']);
  $Nuevosima->setq15($_POST['q15']);
  $Nuevosima->setq16($_POST['q16']);
  $Nuevosima->setq17($_POST['q17']);
  $Nuevosima->setid_exp($_POST['id_exp']); 
    print  $Nuevosima->insertsima($_POST['num_com']); // inserta y muestra el resultado


  }
if (isset($_POST['submit'])&&is_numeric($_POST['id_exp'])&&is_numeric($_POST['id_my'])) // si presiono el boton y es modificar
{
  $Nuevosima=new sima ();
  $Nuevosima->setid_my($_POST['id_my']);
  $Nuevosima->setnum_com($_POST['num_com']);
  $Nuevosima->setnombre($_POST['nombre']);
  $Nuevosima->setq1($_POST['q1']);
  $Nuevosima->setq2($_POST['q2']);
  $Nuevosima->setq3($_POST['q3']);
  $Nuevosima->setq4($_POST['q4']);
  $Nuevosima->setq5($_POST['q5']);
  $Nuevosima->setq6($_POST['q6']);
  $Nuevosima->setq7($_POST['q7']);
  $Nuevosima->setq8($_POST['q8']);
  $Nuevosima->setq9($_POST['q9']);
  $Nuevosima->setq10($_POST['q10']);
  $Nuevosima->setq11($_POST['q11']);
  $Nuevosima->setq12($_POST['q12']);  
  $Nuevosima->setq13($_POST['q13']);
  $Nuevosima->setq14($_POST['q14']);
  $Nuevosima->setq15($_POST['q15']);
  $Nuevosima->setq16($_POST['q16']);
  $Nuevosima->setq17($_POST['q17']);
  $Nuevosima->setid_exp($_POST['id_exp']); 
    print  $Nuevosima->updatesima ($_POST['num_com']); // inserta y muestra el resultado
  }
if (isset($_GET['brId'])&&is_numeric($_GET['brId'])) // si presiono el boton y es eliminar
{
  $Nuevosima=new sima ();
    print  $Nuevosima->deletesima($_GET['Id'],$_GET['brId'],$_GET['paso']); // elimina el identificacion y muestra el resultado
  }

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
  $Nuevosima=new sima ();
    print  $Nuevosima->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
  }

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
  $Nuevosima=new sima ();
    print  $Nuevosima->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
  }

    
    new Conexion();
    $id_exp_2 =$_GET['Id'];
    $query="select * from sima where id_exp = '$id_exp_2'"; 
    $result = pg_query($query); 
    if(pg_num_rows($result)>0)
    {$ti1="seguir";}
    else
    {$ti1="";} 



if($ti1=='seguir'){
  $Nuevosima=new sima();
$Nuevosima= $Nuevosima->getsima($_GET['Id']); // obtiene todos las salidas para despues mostrarlas
print '<div id="grilla"> <br/><br/><table border=1 style="width:50%">'
.'<th style="width=1%">Nº Componente</th>                      
<th>Nombre</th>

<th colspan=2></th>';

while ($row=  pg_fetch_array($Nuevosima)) // recorre los identificaciones uno por uno hasta el fin de la tabla
{
  print '<tr>'
  .'<td style="width:10%">'.$row['num_com'].'</td>'
  .'<td>'.$row['nombre'].'</td>'
  
  .'<td style="width:10%"><a href="sit_mayores.php?Id='.$row['id_exp'].'&vdIdi='.$row['id_my'].'" >Ver</a></td>'


//                  .'<td><a href="javascript:;" onclick= avisoi("Salida_Mes.php?brId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Borrar</a></td>'                
//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'                  
  .'</tr>';
}
print '</table>';
print '</div>';
}

}
else
{
  print '<img src="./imagenes/accesoDenegado.png" style=" position: absolute; top: 40%; left: 44%;">';       
}
?>


<script type="text/javascript">
  function Habilitar()
  {   
    var camq2 = document.getElementById("q2");
    var camq3 = document.getElementById("q3");
    var camq4 = document.getElementById("q4");

    if(camq2.value == "3" || camq2.value == "4" || camq2.value == "5" || camq2.value == "6" )
    {
      camq4.focus();
      camq3.value="";
      camq3.style.display="none";
    }
    else
    {   
      camq3.style.margin="auto";
      camq3.style.display="block";
    }
  }
</script>

<script type="text/javascript">
  function emli(){
    var camq8 = document.getElementById("q8");
    var camq9 = document.getElementById("q9");
    var camq10 = document.getElementById("q10");
    var camq11 = document.getElementById("q11");
    var camq12 = document.getElementById("q12");

    if(camq8.value =="3")
    {
      camq12.focus();
      camq9.style.display="none";
      camq10.style.display="none";
      camq11.style.display="none";
      camq9.value="";
      camq10.value="";
      camq11.value="";
    }
    else
    {
     camq9.style.margin="auto";
     camq9.style.display="block";
     camq10.style.margin="auto";
     camq10.style.display="block";
     camq11.style.margin="auto";
     camq11.style.display="block";

   }
 }
</script>

<script type="text/javascript">
  function wipe(){
   var camq18 = document.getElementById("q18");
   var camq18_1 = document.getElementById("q18_1");
   var camq18_2 = document.getElementById("q18_2");

   if(camq18.value == "5"){
    camq18_2.style.display="block";
    camq18_2.style.margin="auto";
  }
  else
  {
    camq18_2.value="";
    camq18_2.style.display="none";
    camq18_2.style.margin="auto";
  }
  if(camq18.value == "6"){
    camq18_1.style.display="block";
    camq18_1.style.margin="auto";
  }
  else
  {
    camq18_1.style.display="none";
    camq18_1.style.margin="auto";
  }
}   
</script>

<script type="text/javascript">
  function corroborar(){
   var camq2 = document.getElementById("q2");
   var camq3 = document.getElementById("q3");

   if(camq2.value > "2"  && (camq3.value == "1" || camq3.value == "2")  )
   {
    camq2.focus();
    camq2.value="";
    
  }

}
</script>

<script type="text/javascript">
 
  function checkLength1()
  {
    var q5 = document.getElementById('q5');
    var q2 = document.getElementById('q2');
    var q3 = document.getElementById('q3');
    var q4 = document.getElementById('q4');
    var q1 = document.getElementById('q1');
    var dp1 = document.getElementById('dp1');

    //control menos el q5 que esta arriba
    var q6 = document.getElementById('q6');
    var q7 = document.getElementById('q7');
    var q8 = document.getElementById('q8');
    var q9 = document.getElementById('q9');
    var q10 = document.getElementById('q10');
    var q11 = document.getElementById('q11');
    var q12 = document.getElementById('q12');
    var q13 = document.getElementById('q13');
    var dp2 = document.getElementById('dp2');
    var dp3 = document.getElementById('dp3');
    var dp4 = document.getElementById('dp4');

    if(q1.value == 1){
      dp1.value="Si";
      q2.disabled=false;}

    if(q1.value == 2){
      dp1.value="No";
      q2.disabled=false;}

    if(q1.value == ''){
      dp1.value="";
      q2.disabled=true;}

    if(q1.value == '1'){
      q2.style.display="none";
      q3.style.display="none";
      q4.style.display="none";
      q2.value="";
      q3.value="";
      q4.value="";

      q5.disabled=false;
      q5.style.display="block";
      q6.style.display="block";
      q7.style.display="block";
      q8.style.display="block";
      q9.style.display="block";
      q10.style.display="block";
      q11.style.display="block";
      q12.style.display="block";
      q13.style.display="block";
      q5.style.margin="auto";
      q6.style.margin="auto";
      q7.style.margin="auto";
      q8.style.margin="auto";
      q9.style.margin="auto";
      q10.style.margin="auto";
      q11.style.margin="auto";
      q12.style.margin="auto";
      q13.style.margin="auto";
      dp2.value="";
      dp3.value="";
      dp4.value="";
      q3.disabled=false;
      q4.disabled=false;
    }
    else
    {
      q2.style.display="block";
      q3.style.display="block";
      q4.style.display="block";
      q2.style.margin="auto";
      q3.style.margin="auto";
      q4.style.margin="auto";
      q5.disabled=true;
    }
  }
  function checkLength2()
  {

    var q2 = document.getElementById('q2');
    var q5 = document.getElementById('q5');
    var q1 = document.getElementById('q1');
    var q3 = document.getElementById('q3');
    var q4 = document.getElementById('q4');
    var dp2 = document.getElementById('dp2');

       //control menos el q5 que esta arriba
    var q6 = document.getElementById('q6');
    var q7 = document.getElementById('q7');
    var q8 = document.getElementById('q8');
    var q9 = document.getElementById('q9');
    var q10 = document.getElementById('q10');
    var q11 = document.getElementById('q11');
    var q12 = document.getElementById('q12');
    var q13 = document.getElementById('q13');
    var dp2 = document.getElementById('dp2');
    var dp3 = document.getElementById('dp3');
    var dp4 = document.getElementById('dp4');



    if(q2.value == 1){
      dp2.value="Si";
      q3.disabled=false;}

    if(q2.value == 2){
      dp2.value="No";
      q3.disabled=false;}

    if(q2.value == ''){
      dp2.value="";
      q3.disabled=true;}

    if(q1.value == '2'){
      if(q2.value == '1'){
        q3.style.display="none";
        q4.style.display="none";
        q3.value="";
        q4.value="";
        q5.disabled=false;

        q5.style.display="block";
        q6.style.display="block";
        q7.style.display="block";
        q8.style.display="block";
        q9.style.display="block";
        q10.style.display="block";
        q11.style.display="block";
        q12.style.display="block";
        q13.style.display="block";
        q5.style.margin="auto";
        q6.style.margin="auto";
        q7.style.margin="auto";
        q8.style.margin="auto";
        q9.style.margin="auto";
        q10.style.margin="auto";
        q11.style.margin="auto";
        q12.style.margin="auto";
        q13.style.margin="auto";
        q4.disabled=false;;

        dp3.value="";
        dp4.value="";
      }
      else
      {
        q3.style.display="block";
        q4.style.display="block";
        q3.style.margin="auto";
        q4.style.margin="auto";
        q5.disabled=true;
      }
    }
    else
    {
      alert("Debe completar el campo anterior");
      q2.value="";
      q1.focus();

    }
  }

  function checkLength3()
  {
    var q1 = document.getElementById('q1');
    var q5 = document.getElementById('q5');
    var q2 = document.getElementById('q2');
    var q3 = document.getElementById('q3');
    var q4 = document.getElementById('q4');
    var dp3 = document.getElementById('dp3');

    //control menos el q5 que esta arriba
    var q6 = document.getElementById('q6');
    var q7 = document.getElementById('q7');
    var q8 = document.getElementById('q8');
    var q9 = document.getElementById('q9');
    var q10 = document.getElementById('q10');
    var q11 = document.getElementById('q11');
    var q12 = document.getElementById('q12');
    var q13 = document.getElementById('q13');
    var dp2 = document.getElementById('dp2');
    var dp3 = document.getElementById('dp3');
    var dp4 = document.getElementById('dp4');

    if(q3.value == 1){
      dp3.value="Si";
      q4.disabled=false;}

    if(q3.value == 2){
      dp3.value="No";
      q4.disabled=false;}

    if(q3.value == ''){
      dp3.value="";
      q4.disabled=true;}

    if(q2.value == '2'){
      if(q3.value == '1'){
        q4.style.display="none";
        q4.value="";
        q5.disabled=false;

        q5.style.display="block";
        q6.style.display="block";
        q7.style.display="block";
        q8.style.display="block";
        q9.style.display="block";
        q10.style.display="block";
        q11.style.display="block";
        q12.style.display="block";
        q13.style.display="block";
        q5.style.margin="auto";
        q6.style.margin="auto";
        q7.style.margin="auto";
        q8.style.margin="auto";
        q9.style.margin="auto";
        q10.style.margin="auto";
        q11.style.margin="auto";
        q12.style.margin="auto";
        q13.style.margin="auto";
        
        dp4.value="";
      }
      else
      {
        q2.style.display="block";
        q1.style.display="block";
        q4.style.display="block";
        q2.style.margin="auto";
        q1.style.margin="auto";
        q4.style.margin="auto";
        q5.disabled=true;
      }
    }

    else
    {
      alert("Debe completar el campo anterior");
      q3.value="";
      q2.focus();

    }
  }
  function checkLength4()
  {

    var q4 = document.getElementById('q4');
    var q14 = document.getElementById('q14');
    // id para deshabilitar los botones si es q4
    var q5 = document.getElementById('q5');
    var q6 = document.getElementById('q6');
    var q7 = document.getElementById('q7');
    var q8 = document.getElementById('q8');
    var q9 = document.getElementById('q9');
    var q10 = document.getElementById('q10');
    var q11 = document.getElementById('q11');
    var q12 = document.getElementById('q12');
    var q13 = document.getElementById('q13');
    //validar si algunos de los botnes anteriores
    var q1 = document.getElementById('q1');
    var q2 = document.getElementById('q2');
    var q3 = document.getElementById('q3');

    var dp4 = document.getElementById('dp4');

    if(q4.value == 1){
      dp4.value="Si";
      q14.disabled=false;}

    if(q4.value == 2){
      dp4.value="No";
      q14.disabled=false;}

    if(q4.value == ''){
      dp4.value="";
      q14.disabled=true;}


    if (q1.value=="2" && q2.value=="2" && q3.value=="2") {

    //Suppose u want 4 number of character
    if(q4.value == '1' | q4.value == '2'){
      q5.style.display="none";
      q6.style.display="none";
      q7.style.display="none";
      q8.style.display="none";
      q9.style.display="none";
      q10.style.display="none";
      q11.style.display="none";
      q12.style.display="none";
      q13.style.display="none";
      q5.value="";
      q6.value="";
      q7.value="";
      q8.value="";
      q9.value="";
      q10.value="";
      q11.value="";
      q12.value="";
      q13.value="";
      q5.disabled=false;
      q6.disabled=false;
      q7.disabled=false;
      q8.disabled=false;
      q9.disabled=false;
      q10.disabled=false;
      q11.disabled=false;
      q12.disabled=false;
      q13.disabled=false;
    }
    else
    {
      q5.style.display="block";
      q6.style.display="block";
      q7.style.display="block";
      q8.style.display="block";
      q9.style.display="block";
      q10.style.display="block";
      q11.style.display="block";
      q12.style.display="block";
      q13.style.display="block";
      q5.style.margin="auto";
      q6.style.margin="auto";
      q7.style.margin="auto";
      q8.style.margin="auto";
      q9.style.margin="auto";
      q10.style.margin="auto";
      q11.style.margin="auto";
      q12.style.margin="auto";
      q13.style.margin="auto";
      q5.disabled=true;
      q6.disabled=true;
      q7.disabled=true;
      q8.disabled=true;
      q9.disabled=true;
      q10.disabled=true;
      q11.disabled=true;
      q12.disabled=true;
      q13.disabled=true;
    }
  }
  else
  {
    alert("Debe Completar los campos anteriores");
    q4.value="";
    q4.focus();
  }
  }
  function checkLength5()
  {
  var q1 = document.getElementById('q1');
  var q2 = document.getElementById('q2');
  var q3 = document.getElementById('q3');
  var q5 = document.getElementById('q5');
  var dp5 = document.getElementById('dp5');

    if(q5.value == 1){
      dp5.value="Si";
      q6.disabled=false;}

  if(q5.value == 2){
      dp5.value="No";
      q6.disabled=false;}

  if(q5.value == 9){
      dp5.value="Ignorado";
      q6.disabled=false;}

  if(q5.value == ''){
      dp5.value="";
      q6.disabled=true;}

  if(q1.value == '1' || q2.value == '1' || q3.value == '1'){

  }
  else
  {
    q1.focus();
    q1.value="";
    q2.value="";
    q3.value="";
    alert("El campo 1,2 o 3 debe ser igual a 1");
    q5.value="";

    q1.style.display="block";
    q1.style.margin="auto";
    q2.style.display="block";
    q2.style.margin="auto";
    q3.style.display="block";
    q3.style.margin="auto";
  }
  }
  function checkLength6()
  {
  var q5 = document.getElementById('q5');
  var q6 = document.getElementById('q6');
  var q7 = document.getElementById('q7');
  var q8 = document.getElementById('q8');

  var dp6 = document.getElementById('dp6');
  var dp7 = document.getElementById('dp7');

    if(q6.value == 1){
      dp6.value="Es una actividad o empresa propia que emplea personas asalariadas";
      q7.disabled=false;}

    if(q6.value == 2){
      dp6.value="Es una actividad o empresa propia que no emplea personas asalariadas";
      q7.disabled=false;}

    if(q6.value == 3){
    dp6.value="Lo hace como servicio doméstico";
    q7.disabled=false;}

    if(q6.value == 4){
    dp6.value="Lo hace como obrero o empleado para un patrón, empresa o institución? (incluye agencia de empleo)";
    q7.disabled=false;}

    if(q6.value == 5){
    dp6.value="Lo hace para el negocio o actividad de un familiar";
    q7.disabled=false;}

    if(q6.value == ''){
    dp6.value="";
    dp7.value="";
    q7.disabled=true;}

  if(q5.value=='1' || q5.value=='2' || q5.value=='9'){
    if(q6.value == '1' || q6.value=='2'){
      q8.disabled=false;
      q7.style.display="none";
      q7.value="";
    }
    else
    {
      q7.style.display="block";
      q7.style.margin="auto";
      q8.disabled=true;
    }
  }
  else
  {
    q6.value="";
    q5.focus();
    q5.value="";
    alert("Se debe completar el campo 5");
  }
  }
  function checkLength7()
  {
  var q6 = document.getElementById('q6');
  var q7 = document.getElementById('q7');
  var q8 = document.getElementById('q8');
  var q9 = document.getElementById('q9');

    var dp7 = document.getElementById('dp7');
    var dp8 = document.getElementById('dp8');

    if(q7.value == 1){
      dp7.value="Si";
      q8.disabled=false;
      dp8.value="";}

       if(q7.value == 2){
      dp7.value="No";
      q8.disabled=false;}

       if(q7.value == 9){
      dp7.value="Ignorado";
      q8.disabled=false;}


       if(q7.value == ''){
      dp7.value="";
      dp8.value="";
      q8.disabled=true;}


    if (q6.value=='3' || q6.value=='4' || q6.value=='5') {
      if(q7.value == '1'){
        q8.style.display="none";
        q8.value="";
        q9.disabled=false;
      }
      else
      {
        q8.style.display="block";
        q8.style.margin="auto";
         q9.disabled=true;
      }
    }
    else{
      alert("Debe completar el campo anterior o Valor no valido");
      q7.value="";
      q6.focus();

    }
  }
  function checkLength8()
  {
  var q6 = document.getElementById('q6');
  var q7 = document.getElementById('q7');
  var q8 = document.getElementById('q8');

  var dp8 = document.getElementById('dp8');

    if(q8.value == 1){
      dp8.value="Si";
      q9.disabled=false;}

    if(q8.value == 2){
      dp8.value="No";
      q9.disabled=false;}

    if(q8.value == 9){
      dp8.value="Ignorado";
      q9.disabled=false;}

    if(q8.value == ''){
      dp8.value="";
      q9.disabled=true;}

  if(q6.value == '1' || q6.value == '2' || q6.value == '3' || q6.value == '4' || q6.value == '5') {
    if(q7.value == '2' || q7.value=='9' || q7.value==""){

    }
    else
    {
      alert("Debe completar el campo anterior")
      q7.style.display="block";
      q7.style.margin="auto";
      q8.value="";
      q7.focus();


    }
  }
  else{
    alert("Debe completar el campo anterior")
    q8.value="";
    q6.focus();
  }
  }
  function checkLength9()
  {
    var q7 = document.getElementById('q7');
    var q8 = document.getElementById('q8');
    var q9 = document.getElementById('q9');
    var q10 = document.getElementById('q10');
    var q11 = document.getElementById('q11');

    var dp9 = document.getElementById('dp9');

    if(q9.value == 1){
      dp9.value="Un plan de empleo";
      q10.disabled=false;}

    if(q9.value == 2){
      dp9.value="Un período de prueba";
      q10.disabled=false;}

    if(q9.value == 3){
      dp9.value="Una beca/pasantía/aprendizaje";
      q10.disabled=false;}

    if(q9.value == 4){
      dp9.value="Otro";
      q10.disabled=false;}

    if(q9.value == ''){
      dp9.value="";
      q10.disabled=true;}

    if(q7.value=="1" || q8.value=="1" || q8.value=="2" || q8.value=="9"){

      if(q9.value == '2' || q9.value=='3' || q9.value=='4'){
        q10.style.display="none";
        q10.value="";
        q11.disabled=false;
      }
      else
      {
        q10.style.display="block";
        q10.style.margin="auto";
        q10.value="";
        q11.disabled=true;
      }
    }
    else
    {
     alert("Debe completar el campo anterior");
     q7.style.display="block";
     q7.style.margin="auto";

     q9.value="";
     q7.focus();
     q7.value="";
     q8.value="";

   }

  }

  function checkLength14()
  {
  var q9 = document.getElementById('q9');
  var q14 = document.getElementById('q14');
  var q15 = document.getElementById('q15');
  var q16 = document.getElementById('q16');
  var q4 = document.getElementById('q4');

  var dp14 = document.getElementById('dp14');

    if(q14.value == 1){
      dp14.value="Si";
      q15.disabled=false;}

    if(q14.value == 2){
      dp14.value="No";
      q15.disabled=false;}

    if(q14.value == 9){
      dp14.value="Ignorado";
      q15.disabled=false;}

    if(q14.value == ''){
      dp14.value="";
      q15.disabled=true;}

  if(q9.value=="1" || q9.value=="2" || q9.value=="3" || q9.value=="4" || q4.value=='1' || q4.value=='2'){
    if(q14.value == '2' || q14.value =='9' ){
      q16.disabled=false;
      q15.style.display="none";
      q15.value="";
    }
    else
    {
      q15.style.display="block";
      q15.style.margin="auto";
      q15.value="";
      q16.disabled=true;
    }
  }
  else
  {
    if(q4.value=='1' || q4.value=='2')
    {}
  else{
      q14.value="";
    q9.value="";
    q9.focus();
    alert("Completar campo 11");
  }
  

  }
  }
  function checkLength15()
  {
  var q14 = document.getElementById('q14');
  var q16 = document.getElementById('q16');
  var q17 = document.getElementById('q17');
  var submitguardar = document.getElementById('submitguardar');

  var dp16 = document.getElementById('dp16');

  if(q16.value == 1){
      dp16.value="Si";
      q17.disabled=false;}

  if(q16.value == 2){
      dp16.value="No";
      q17.disabled=false;}

  if(q16.value == 9){
      dp16.value="Ignorado";
      q17.disabled=false;}

  if(q16.value == ''){
      dp16.value="";
      q17.disabled=true;}

  if(q14.value=="1"||q14.value=="2"||q14.value=="9"){
    if(q16.value == '2' || q16.value=='9' ){
      submitguardar.disabled=false;
      q17.style.display="none";
      q17.value="";
    }
    else
    {
      q17.style.display="block";
      q17.style.margin="auto";
      q17.value="";
      submitguardar.disabled=true;
    }
  }
  else
  {
    q16.value="";
    q14.value="";
    q14.focus();
    alert("Completar el campo 14");
  }
  }
</script>

<script>
function tip1()
{
  var q9 = document.getElementById('q9');
  var q10 = document.getElementById('q10');
  var q11 = document.getElementById('q11');

  if(q9.value == '1' ){

  }
  else
  {
   alert("Debe completar el campo anterior")
   q10.value="";
   q9.focus();
 }

 if(q10.value.length >= 1){
  q11.disabled=false;
 }
 else
 {
  q11.disabled=true;
  q11.value="";
 }

}

function tiq1()
{
  var q11 = document.getElementById('q11');
  var q12 = document.getElementById('q12');

 if(q11.value.length >= 1){
  q12.disabled=false;
 }
 else
 {
  q12.disabled=true;
  q12.value="";
 }
}

function tik1()
{
  var q12 = document.getElementById('q12');
  var q13 = document.getElementById('q13');

 if(q12.value.length >= 1){
  q13.disabled=false;
 }
 else
 {
  q13.disabled=true;
  q13.value="";
 }
}

function tiy1()
{
  var q13 = document.getElementById('q13');
  var q14 = document.getElementById('q14');

 if(q13.value.length >= 1){
  q14.disabled=false;
 }
 else
 {
  q14.disabled=true;
  q14.value="";
 }
}
function tip2()
{
  var q15 = document.getElementById('q15');
  var q16 = document.getElementById('q16');

 if(q15.value.length >= 1){
  q16.disabled=false;
 }
 else
 {
  q16.disabled=true;
  q16.value="";
 }

}

function tip3()
{
  var q17 = document.getElementById('q17');
  var submitguardar = document.getElementById('submitguardar');

 if(q17.value.length >= 1){
  submitguardar.disabled=false;
 }
 else
 {
  submitguardar.disabled=true;
  submitguardar.value="";
 }
}
</script>
<script>
  $(document).ready(function(){
    $("#num_com").change(function(){
      var c = document.getElementById('num_com').value;
      var p = document.getElementById('num_com');
      var t = document.getElementById('id_exp').value;
      var nombre = document.getElementById('nombre');
      var q1 = document.getElementById('q1');
      var dp1 = document.getElementById('dp1');
      nombre.value="";

      $.ajax({

        type: "POST",
        url: "getcomponente1.php",
        data:{t:t,c:c},

        success: function(response){
          console.log(response);
          if(response != 'error'){
            var info= JSON.parse(response);
            console.log(info);
            $('#nombre').val(info.nombre);
           q1.disabled=false;
           q1.focus();
           aux=q1.value;
           q1.value="";
           q1.value=aux;
          }
          if(info=="error")
          {
          q1.value="";
          dp1.value="";
          q1.focus();
          alert("Componente Inexistente");
          p.value="";
          p.focus();
          q1.disabled=true;
          }

        },

 error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
      }
      })
     
    });
  });
 

if(num_com.value==""){
ponleFocus1();
}
else{
const queryString = window.location.search;
console.log(queryString);
const urlParams = new URLSearchParams(queryString);
const product = urlParams.get('vdIdi');
console.log(product);

if(product == null ){
ponleFocus2();}

else{ponleFocus1();}

}


  function tab_btnz(event,q1,q2,q3)
{
  var x1=q1;
  var x2=q2;
  var x3=q3;

  var q2 = document.getElementById('q2');
  var q3 = document.getElementById('q3');
  var q4 = document.getElementById('q4');

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value==2 ) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }
    if (t == 9 && x1.value==1 ) 
  { 
  x3.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;

  q2.disabled=false;
  q3.disabled=false;
  q4.disabled=false;

  return false;
  }  

return true;

  }

    function tab_btnf(event,q1,q2,q3)
{
  var x1=q1;
  var x2=q2;
  var x3=q3;


  var q3 = document.getElementById('q3');
  var q4 = document.getElementById('q4');

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value==2 ) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }
    if (t == 9 && x1.value==1 ) 
  { 
  x3.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;


  q3.disabled=false;
  q4.disabled=false;

  return false;
  }  

return true;

  }

      function tab_btnp(event,q1,q2,q3)
{
  var x1=q1;
  var x2=q2;
  var x3=q3;

  var q4 = document.getElementById('q4');

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value==2 ) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }
    if (t == 9 && x1.value==1 ) 
  { 
  x3.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;

  q4.disabled=false;

  return false;
  }  
return true;
  }

    function tab_btn1(event,q1,q2)
{
  var x1=q1;
  var x2=q2;

    var q5 = document.getElementById('q5');
    var q6 = document.getElementById('q6');
    var q7 = document.getElementById('q7');
    var q8 = document.getElementById('q8');
    var q9 = document.getElementById('q9');
    var q10 = document.getElementById('q10');
    var q11 = document.getElementById('q11');
    var q12 = document.getElementById('q12');
    var q13 = document.getElementById('q13');

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && (x1.value==2 || x1.value==1) ) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;


      q5.disabled=false;
      q6.disabled=false;
      q7.disabled=false;
      q8.disabled=false;
      q9.disabled=false;
      q10.disabled=false;
      q11.disabled=false;
      q12.disabled=false;
      q13.disabled=false;

  return false;
  }
return true;

  }
      function tab_btn2(event,q1,q2)
{
  var x1=q1;
  var x2=q2;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && (x1.value==2 || x1.value==1 || x1.value==9) ) 
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

 function tab_btn3(event,q1,q2,q3)
{
  var x1=q1;
  var x2=q2;
  var x3=q3;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && (x1.value==3 ||x1.value==4 ||x1.value==5 ) ) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }
    if (t == 9 && (x1.value==1 || x1.value==2 ) ) 
  { 
  x3.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;
  x2.disabled=false;
  return false;
  }  

return true;

  }
function tab_btn4(event,q1,q2,q3)
{
  var x1=q1;
  var x2=q2;
  var x3=q3;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && (x1.value==2 ||x1.value==9 ) ) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }
    if (t == 9 && x1.value==1 ) 
  { 
  x3.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;
  x2.disabled=false;
  return false;
  }  

return true;

  }
  function tab_btn5(event,q1,q2,q3)
{
  var x1=q1;
  var x2=q2;
  var x3=q3;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value==1 ) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }
    if (t == 9 && (x1.value==2 || x1.value==3 ||  x1.value==4  ) ) 
  { 
  x3.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;
  x2.disabled=false;
  return false;
  }  
return true;
  }

function tab_btn6(event,q1,q2)
{
  var x1=q1;
  var x2=q2;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value.length >= 1 ) 
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

 function tab_btn7(event,q1,q2,q3)
{
  var x1=q1;
  var x2=q2;
  var x3=q3;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value==1 ) 
  { 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }
    if (t == 9 && (x1.value==2 || x1.value==9) ) 
  { 
  x3.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;
  x2.disabled=false;
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

var str2 = "sit_mayores.php?Id=";
window.location = str2.concat(product);

}
//-->
</script>
</body>
</html>
