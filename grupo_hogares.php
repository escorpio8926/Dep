<?php
include 'cabecera2.php';
include 'menu.php';
include './classhogar.php';
include './classcomentariohogar.php';

if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
 $id_numero=""; 
 $nombre="";
 $dni="";
 $rel_parentesco="";
 $sexo="";
 $fecha_nac="";
 $anios="";
 $sit_conyu="";
 $cober_medic="";
 $salud_1="";
 $salud_2="";
 $disc_1="";
 $disc_10="";
 $disc_100="";
 $disc_1000="";
 $disc_10000="";
 $disc_100000="";
 $disc_2="";  
 $jub_1="";
 $jub_2="";
 $edu_1="";
 $edu_2="";
 $edu_3="";
 $edu_4="";
 $id_exp=$_GET['Id'];
 $id_user=$_SESSION['id_user'];  

if (isset($_GET['mtri'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{
        $NuevoHogar_c=new Hogar_c( $_GET['Id'],$_GET['mtri']);
        $nombre=$NuevoHogar_c->getnombre();
        $dni=$NuevoHogar_c->getdni();
        $rel_parentesco=$NuevoHogar_c->getrel_parentesco();
        $sexo=$NuevoHogar_c->getsexo();
        $fecha_nac=$NuevoHogar_c->getfecha_nac();
        $anios=$NuevoHogar_c->getanios();
        $sit_conyu=$NuevoHogar_c->getsit_conyu();
        $cober_medic=$NuevoHogar_c->getcober_medic();
        $salud_1=$NuevoHogar_c->getsalud_1();
        $salud_2=$NuevoHogar_c->getsalud_2();
        $disc_1=$NuevoHogar_c->getdisc_1();
        $disc_10=$NuevoHogar_c->getdisc_10();
        $disc_100=$NuevoHogar_c->getdisc_100();
        $disc_1000=$NuevoHogar_c->getdisc_1000();
        $disc_10000=$NuevoHogar_c->getdisc_10000();
        $disc_100000=$NuevoHogar_c->getdisc_100000();
        $disc_2=$NuevoHogar_c->getdisc_2();  
        $jub_1=$NuevoHogar_c->getjub_1();
        $jub_2=$NuevoHogar_c->getjub_2();
        $edu_1=$NuevoHogar_c->getedu_1();
        $edu_2=$NuevoHogar_c->getedu_2();
        $edu_3=$NuevoHogar_c->getedu_3();
        $edu_4=$NuevoHogar_c->getedu_4();
        $id_exp=$NuevoHogar_c->getid_exp();
        $id_numero=$NuevoHogar_c->getid_numero(); 
        $id_user=$NuevoHogar_c->getid_user();

      }

      ?>
      <?php
      if(is_numeric($id_exp)&&is_numeric($id_numero))
        {$value='Modificar';
      $disa="hidden";
      $disas="";}
      else
        {$value='Agregar';
      $disa="";
      $disas="hidden";}
      ?>

      <?php 
      new Conexion();
      $id_exp_test =$_GET['Id'];
      $query="select * from hogar where id_exp = '$id_exp_test'"; 
      $result = pg_query($query); 
      if(pg_num_rows($result)=='0' || $id_numero=='1'){
        $query1="select * from ficha_exp where id_exp = '$id_exp_test' ";
        $result1 = pg_query($query1);

        while ($resultados = pg_fetch_array($result1)) {

          $nombre=$resultados['nombre'].' '.$resultados['apellido'];
          $dni=$resultados['dni'];
          $rel_parentesco='1';
          $leer="readonly";
         
        
      }//fin del while de resultados

  $cv1="disabled";
  $cv2="";
  }//fin de la fila del if
  else
  { 
    $leer="";
  
  
    $cv1="";
  $cv2="disabled";
  }

  ?>
    <?php 
      new Conexion();
      $id_exp_test =$_GET['Id'];
      $query="select * from hogar where id_exp = '$id_exp_test'"; 
      $result = pg_query($query); 
      if(pg_num_rows($result)=='0'){
        $fugi=0;
      
  }//fin de la fila del if
  else
  { 
        $fugi=1;
  }

  ?>

  <div id="cuerpo">

    <form method="POST" action="grupo_hogar.php?Id=<?php print $id_exp?>" autocomplete="off">
      <input type="hidden" name="id_exp" value="<?php print $id_exp?>">
      <input type="hidden" name="id_user" value="<?php print $id_user?>">

      <br><br>
      <table border="2">
        <tr> 
          <th colspan="20" style="text-align: left; text-indent: 40em; height: 30px;">CARACTERISTICAS DE LOS MIEMBROS DEL HOGAR <br></b></th>
          <tr>
            <th colspan="1" style="width: 2%"><b>N°</b></th>
            <th colspan="1"><b>Nombre y Apellido</b></th>
            <th colspan="1"><b>DNI</b></th>
            <th colspan="1"><b>RELACIÓN DE PARENTESCO</b></th>
            <th colspan="1"><b>SEXO</b></th>
            <th colspan="1"><b>¿EN QUÉ FECHA NACIO?</b></th>
            <th colspan="1" style="width:6%"><b>¿CUÁNTOS AÑOS CUMPLIDOS TIENE?</b></th>
            <th colspan="1"><b>¿ACTUALMENTE ESTÁ...</b></th>
            <th colspan="1"><b>¿TIENE ALGÚN TIPO DE COBERTURA MÉDICA POR LA QUE PAGA O LE DESCUENTAN?</b></th>
            <th colspan="1"><b> ¿CUÁNDO FUE LA ULTIMA VEZ QUE SE HIZO UN CONTROL MÉDICO?</b></th>
            <th colspan="1"><b>¿A QUÉ LUGAR VA HABITUALMENTE A HACERSE CONTROLES?</b></th>
            <th colspan="1"><b>¿TIENE DIFICULTAD O LIMITACIÓN...</b></th>
            <th colspan="1"><b>¿TIENE CERTIFICADO ÚNICO DE DISCAPACIDAD?</b></th>
            <th colspan="1"><b>¿COBRA JUBILACIÓN O PENSIÓN?</b></th>
            <th colspan="1"><b>¿COBRA...</b></th>
            <th colspan="1"><b>¿ASISTE O ASISTIÓ A UN ESTABLECIMIENTO EDUCATIVO?</b></th>
            <th colspan="1"><b>¿CUÁL ES EL NIVEL MAS ALTO QUE CURSA O CURSÓ?</b></th>
            <th colspan="1"><b>¿FINALIZÓ ESE NIVEL?</b></th>
            <th colspan="1"><b>¿CUÁL FUE EL ÚLTIMO GRADO/AÑO QUE APROBÓ?</b></th>
          </tr>
          <tr>
            <td colspan="1"><br><input type="text" name="id_numero" id="id_numero" value="<?php print $id_numero?>" readonly="" style="width: 80%;"></td>
            
            <td colspan="1" ><br><input type="text" style="width: 80%;" name="nombre" id="nombre" value="<?php print $nombre ?>" <?php print $leer ?> required class="texto"  oninput="tre()" onkeydown="return tab_btnf(event,getElementById('nombre'),getElementById('dni'))" readonly> </td>
            
            <td colspan="1"><br><input type="number" style="width: 80%;" min="500000" max="99999999" name="dni" id="dni" value="<?php print $dni ?>" <?php print $leer ?> required onkeypress="return check(event,value)" oninput="checkLength2()" onkeydown="return tab_btn(event,getElementById('dni'),getElementById('rel_parentesco'))" readonly  <?php print $cv2 ?> ></td>
            <td colspan="1">

              <br><input type="number" min="2" max="10"  onkeypress="return check(event,value)" oninput="checkLength()" onkeydown="return tab_btn(event,getElementById('rel_parentesco'),getElementById('sexo'))"  style="width: 80%;" name="rel_parentesco" id="rel_parentesco" value="<?php print $rel_parentesco ?>" <?php print $leer ?> readonly <?php print $cv2 ?> required>

            </td>
            
            <td colspan="1"><br><input type="number" class="sinoga" style="width: 75%;" placeholder="V(1) - M(2) -NB(3)" name="sexo" id="sexo" value="<?php print $sexo ?>" onkeypress="return check(event,value)" oninput="checkLength1()" onkeydown="return tab_btn(event,getElementById('sexo'),getElementById('fecha_nac'))" onfocus="god1()"  readonly <?php print $cv2 ?> >
            
            <td colspan="1"><br><input type="date" style="width: 80%;" name="fecha_nac" id="fecha_nac" value="<?php print $fecha_nac ?>"required <?php print $cv2 ?> <?php print $cv1 ?> oninput="dip()" onkeydown="return tab_btn1(event,getElementById('fecha_nac'),getElementById('anios'))" readonly></td>

            <td colspan="1"> <br> <input type="number" style="width: 80%;" name="anios" id="anios" min="0" max="120"  value="<?php print $anios ?>" required onkeypress="return check(event,value)" oninput="checkLength3()" onkeydown="return tab_btn(event,getElementById('anios'),getElementById('sit_conyu'))"  <?php print $cv2 ?> <?php print $cv1 ?> readonly></td>
            <td colspan="1">
              <br><input type="number" style="width: 80%;" id="sit_conyu" name="sit_conyu" value="<?php print $sit_conyu ?>" required onkeypress="return check(event,value)" min="1" max="5"  oninput="checkLength4()" onkeydown="return tab_btn(event,getElementById('sit_conyu'),getElementById('cober_medic'))" class="sinocin" <?php print $cv2 ?> <?php print $cv1 ?> readonly>
            </td>
            <td colspan="1">
              <br><input type="number" name="cober_medic" id="cober_medic" value="<?php print $cober_medic ?>"required  oninput="checkLength5()" onkeydown="return tab_btn(event,getElementById('cober_medic'),getElementById('salud_1'))" readonly class="lij3" <?php print $cv2 ?> <?php print $cv1 ?>>
            </td>
            <td colspan="1" >
              <br><input type="number" style="width: 80%;"  name="salud_1" id="salud_1" class="lij2"  value="<?php print $salud_1 ?>" onkeypress="return check(event,value)" oninput="checkLength6()" onkeydown="return tab_btn(event,getElementById('salud_1'),getElementById('salud_2'))"  readonly min="1" max="9" <?php print $cv2 ?> <?php print $cv1 ?>>
            </td>
            <td colspan="1" style="width: 7%">

              <br><input type="number" name="salud_2" id="salud_2" value="<?php print $salud_2 ?>" required  onkeypress="return check(event,value)" oninput="checkLength7()" onkeydown="return tab_btn(event,getElementById('salud_2'),getElementById('disc_1'))"  class="sinotre" readonly <?php print $cv2 ?> <?php print $cv1 ?>>
            </td>
            <td colspan="1" style="width: 8%"><b>
              <br><input type="number" placeholder="" name="disc_1" id="disc_1" style="width: 10%;"  value="<?php print $disc_1 ?>"  required onkeypress="return check(event,value)" oninput="checkLength8()" onkeydown="return tab_btn(event,getElementById('disc_1'),getElementById('disc_10'))"  class="sin" <?php print $cv2 ?> <?php print $cv1 ?> readonly>

              <input type="number" placeholder="" name="disc_10" id="disc_10" style="width: 10%;"  value="<?php print $disc_10 ?>" required onkeypress="return check(event,value)" oninput="checkLength9()" onkeydown="return tab_btn(event,getElementById('disc_10'),getElementById('disc_100'))" class="sin" <?php print $cv2 ?> <?php print $cv1 ?> readonly>

              <input type="number" placeholder="" name="disc_100" id="disc_100" style="width: 10%;"  value="<?php print $disc_100 ?>" required onkeypress="return check(event,value)" oninput="checkLength10()" onkeydown="return tab_btn(event,getElementById('disc_100'),getElementById('disc_1000'))" class="sin" <?php print $cv2 ?> <?php print $cv1 ?> readonly>

              <input type="number" placeholder="" name="disc_1000" id="disc_1000" style="width: 10%;"  value="<?php print $disc_1000 ?>" required onkeypress="return check(event,value)" oninput="checkLength11()" onkeydown="return tab_btn(event,getElementById('disc_1000'),getElementById('disc_10000'))"  class="sin" <?php print $cv2 ?> <?php print $cv1 ?> readonly>

              <input type="number" placeholder="" name="disc_10000" id="disc_10000" style="width: 10%;"  value="<?php print $disc_10000 ?>" required onkeypress="return check(event,value)" oninput="checkLength12()" onkeydown="return tab_btn(event,getElementById('disc_10000'),getElementById('disc_100000'))" class="sin" <?php print $cv2 ?> <?php print $cv1 ?> readonly>

              <input type="number" placeholder="" name="disc_100000" id="disc_100000" style="width: 10%;"  value="<?php print $disc_100000 ?>" required onkeypress="return check(event,value)" oninput="checkLength12_1()" onkeydown="return tab_btn(event,getElementById('disc_100000'),getElementById('disc_2'))"  class="sin" <?php print $cv2 ?> <?php print $cv1 ?> readonly>
            </b></td>

            <td colspan="1">
              <br><input type="number" placeholder="" name="disc_2" id="disc_2" value="<?php print $disc_2 ?>" required onkeypress="return check(event,value)" oninput="checkLength13()" onkeydown="return tab_btn(event,getElementById('disc_2'),getElementById('jub_1'))"  class="sin" <?php print $cv2 ?> <?php print $cv1 ?> readonly>
            </td>
           
            <td colspan="1" style="width: 7%">
              <br><input type="number" name="jub_1" id="jub_1"  value="<?php print $jub_1 ?>" required onkeypress="return check(event,value)" oninput="checkLength14()" onkeydown="return tab_btnq(event,getElementById('jub_1'),getElementById('jub_2'),getElementById('edu_1'))" class="sin"  <?php print $cv2 ?> <?php print $cv1 ?> readonly>
            </td>
            <td colspan="1">
              <br><input type="text" name="jub_2" id="jub_2"  value="<?php print $jub_2 ?>" onkeypress="return check(event,value)" oninput="checkLength15()" onkeydown="return tab_btn(event,getElementById('jub_2'),getElementById('edu_1'))" class="sino1"  <?php print $cv2 ?> <?php print $cv1 ?> readonly>
            </b></td>
            <td colspan="1">
              <br><input type="number" name="edu_1" id="edu_1"  value="<?php print $edu_1 ?>" required onkeypress="return check(event,value)" oninput="checkLength16()" onkeydown="return tab_btnl(event,getElementById('edu_1'),getElementById('edu_2'),getElementById('submitguardar'),getElementById('edu_3'),getElementById('edu_4'))" class="sinotre" <?php print $cv2 ?> <?php print $cv1 ?> readonly>
            </td>
            <td colspan="1">
              <br><input type="text" name="edu_2" id="edu_2"  value="<?php print $edu_2 ?>" onkeypress="return check(event,value)" oninput="checkLength17()" onkeydown="return tab_btn(event,getElementById('edu_2'),getElementById('edu_3'))"  class="sinonueve"  <?php print $cv2 ?> <?php print $cv1 ?> readonly>
            </td>
            <td colspan="1">
              <br><input type="text" name="edu_3" id="edu_3"  value="<?php print $edu_3 ?>" onkeypress="return check(event,value)" oninput="checkLength18()" onkeydown="return tab_btno(event,getElementById('edu_3'),getElementById('edu_4'),getElementById('submitguardar'))"  class="sin" <?php print $cv2 ?> <?php print $cv1 ?> readonly>
            </td>
            <td colspan="1">
              <br><input type="text" name="edu_4" id="edu_4"  value="<?php print $edu_4 ?>" onkeypress="return check(event,value)" oninput="checkLength19()" onkeydown="return tab_btn(event,getElementById('edu_4'),getElementById('submitguardar'))"  class="entero" <?php print $cv2 ?> <?php print $cv1 ?> readonly>
            </td>

          </tr>

        </table>
        <p><br></p>
   <input type="button" onclick="redirect()" style="width:15%;margin-left:34%;" value="Principal" <?php print $disa ?>>
    <input type="button" onclick="redirect1()" style="width:15%;margin-left:34%;" value="Cancelar" <?php print $disas ?>>
      <input type="submit" name="submit" id="submitguardar" style="margin-left: 0%; width: 15%; height: 5%;" value ="<?php echo $value ?>" disabled>

      <?php if(isset($_POST['submit']))
      {
        if(!empty($nombre)){
          echo "<meta http-equiv='refresh' content='2'>";
        }
      } ?>
    </form>
  </div>


  <?php

if (isset($_POST['submit'])&&!is_numeric($_POST['id_numero'])) // si presiono el boton ingresar
{
  $NuevoHogar_c=new Hogar_c ();
  $NuevoHogar_c->setid_numero($_POST['id_numero']); 
  $NuevoHogar_c->setnombre(strtoupper($_POST['nombre']));
  $NuevoHogar_c->setdni($_POST['dni']);
  $NuevoHogar_c->setrel_parentesco($_POST['rel_parentesco']);
  $NuevoHogar_c->setsexo($_POST['sexo']);
  $NuevoHogar_c->setfecha_nac($_POST['fecha_nac']);
  $NuevoHogar_c->setanios($_POST['anios']);
  $NuevoHogar_c->setsit_conyu($_POST['sit_conyu']);
  $NuevoHogar_c->setcober_medic($_POST['cober_medic']);
  $NuevoHogar_c->setsalud_1($_POST['salud_1']);
  $NuevoHogar_c->setsalud_2($_POST['salud_2']);
  $NuevoHogar_c->setdisc_1($_POST['disc_1']);
  $NuevoHogar_c->setdisc_10($_POST['disc_10']);
  $NuevoHogar_c->setdisc_100($_POST['disc_100']);
  $NuevoHogar_c->setdisc_1000($_POST['disc_1000']);
  $NuevoHogar_c->setdisc_10000($_POST['disc_10000']);
  $NuevoHogar_c->setdisc_100000($_POST['disc_100000']);
  $NuevoHogar_c->setdisc_2($_POST['disc_2']);  
  $NuevoHogar_c->setjub_1($_POST['jub_1']);
  $NuevoHogar_c->setjub_2($_POST['jub_2']);
  $NuevoHogar_c->setedu_1($_POST['edu_1']);
  $NuevoHogar_c->setedu_2($_POST['edu_2']);
  $NuevoHogar_c->setedu_3($_POST['edu_3']);
  $NuevoHogar_c->setedu_4($_POST['edu_4']);
  $NuevoHogar_c->setid_exp($_POST['id_exp']);
  $NuevoHogar_c->setid_user($_POST['id_user']); 
  print  $NuevoHogar_c->insertHogar_c($_POST['dni']); // inserta y muestra el resultado


  }
if (isset($_POST['submit'])&&is_numeric($_POST['id_exp'])&&is_numeric($_POST['id_numero'])) // si presiono el boton y es modificar
{

  $NuevoHogar_c=new Hogar_c ();
  $NuevoHogar_c->setid_numero($_POST['id_numero']); 
  $NuevoHogar_c->setnombre(strtoupper($_POST['nombre']));
  $NuevoHogar_c->setdni($_POST['dni']);
  $NuevoHogar_c->setrel_parentesco($_POST['rel_parentesco']);
  $NuevoHogar_c->setsexo($_POST['sexo']);
  $NuevoHogar_c->setfecha_nac($_POST['fecha_nac']);
  $NuevoHogar_c->setanios($_POST['anios']);
  $NuevoHogar_c->setsit_conyu($_POST['sit_conyu']);
  $NuevoHogar_c->setcober_medic($_POST['cober_medic']);
  $NuevoHogar_c->setsalud_1($_POST['salud_1']);
  $NuevoHogar_c->setsalud_2($_POST['salud_2']);
  $NuevoHogar_c->setdisc_1($_POST['disc_1']);
  $NuevoHogar_c->setdisc_10($_POST['disc_10']);
  $NuevoHogar_c->setdisc_100($_POST['disc_100']);
  $NuevoHogar_c->setdisc_1000($_POST['disc_1000']);
  $NuevoHogar_c->setdisc_10000($_POST['disc_10000']);
  $NuevoHogar_c->setdisc_100000($_POST['disc_100000']);
  $NuevoHogar_c->setdisc_2($_POST['disc_2']);  
  $NuevoHogar_c->setjub_1($_POST['jub_1']);
  $NuevoHogar_c->setjub_2($_POST['jub_2']);
  $NuevoHogar_c->setedu_1($_POST['edu_1']);
  $NuevoHogar_c->setedu_2($_POST['edu_2']);
  $NuevoHogar_c->setedu_3($_POST['edu_3']);
  $NuevoHogar_c->setedu_4($_POST['edu_4']);
  $NuevoHogar_c->setid_exp($_POST['id_exp']);
  $NuevoHogar_c->setid_user($_POST['id_user']); 
    print  $NuevoHogar_c->updateHogar_c ($_POST['dni'],$_POST['id_numero']); // inserta y muestra el resultado
  }
if (isset($_GET['brId'])&&is_numeric($_GET['brId'])) // si presiono el boton y es eliminar
{
  $NuevoHogar_c=new Hogar_c ();
    print  $NuevoHogar_c->deleteHogar_c($_GET['Id'],$_GET['brId']); // elimina el identificacion y muestra el resultado
  }

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
  $NuevoHogar_c=new Hogar_c ();
    print  $NuevoHogar_c->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
  }

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
  $NuevoHogar_c=new Hogar_c ();
    print  $NuevoHogar_c->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
  }


      new Conexion();
      $id_exp_test =$_GET['Id'];
      $query="select * from hogar where id_exp = '$id_exp_test'"; 
      $result = pg_query($query); 
      if(pg_num_rows($result)=='0'){
        $fugi=0;
      
  }//fin de la fila del if
  else
  { 
        $fugi=1;
  }



if($fugi==1){

  $NuevoHogar_c=new Hogar_c();
$NuevoHogar_c= $NuevoHogar_c->getHogar_c($_GET['Id']); // obtiene todos las salidas para despues mostrarlas
print '<div id="grilla"> <br/><br/><table style="width:180% " border=1>'
.'<th style="width:6%">N° Componenente</th>
<th>Nombre</th>                      
<th>Dni</th>
<th>Relación de Parentesco</th>
<th>Sexo</th>
<th>Nacimiento</th>
<th>Años</th>
<th>Situación Conyugal</th>
<th style="width:10%">Cobertura Medica</th>
<th>Último Control Médico</th>
<th style="width:8%">Lugar Habitual de Controles Médicos</th>
<th style="width:15%">Dificultad o Limitación para...</th>
<th>Posee Certificado Único de Discapacidad</th>
<th>Cobra Jubilación o Pensión</th>
<th>Asiste o Asistió a un Establecimiento Educativo</th>
<th>El Nivel Más Alto Que Cursa o Cursó</th>
<th>¿Finalizó ese Nivel?</th>
<th> el Último Grado/Año que Aprobó</th>

<th colspan=4></th>';

while ($row=  pg_fetch_array($NuevoHogar_c)) // recorre los identificaciones uno por uno hasta el fin de la tabla
{ 
  if ($row['id_numero']==1) {
    include './ifhogar.php';
  print '<tr height="50">'
  .'<td>'.$row['id_numero'].'</td>'
  .'<td>'.$row['nombre'].'</td>'
  .'<td>'.$row['dni'].'</td>'
  .'<td>'.$p1.'</td>'
  .'<td>'.$p2.'</td>'
  .'<td>'.$row['fecha_nac'].'</td>'
  .'<td>'.$row['anios'].'</td>'
  .'<td>'.$p3.'</td>'
  .'<td>'.$p4.'</td>'                                 
  .'<td>'.$p5.'</td>'
  .'<td>'.$p6.'</td>'
  .'<td style="width:10%">'.$p7.''. $p8.''. $p9.''. $p10.''. $p11.''. $p12.'</td>'
  .'<td>'.$p13.'</td>'
  .'<td>'.$p14.'' .$p15.'</td>'
  .'<td>'.$p16.'</td>'
  .'<td>'.$p17.'</td>'
  .'<td>'.$p18.'</td>'
  .'<td>'.$p19.'</td>'

  .'<td colspan=2><a href="grupo_hogares.php?Id='.$row['id_exp'].'&mtri='.$row['id_numero'].'">Visualizar</a></td>'
  .'</tr>';
  }
  else{
  include './ifhogar.php';
  print '<tr height="50">'
  .'<td>'.$row['id_numero'].'</td>'
  .'<td>'.$row['nombre'].'</td>'
  .'<td>'.$row['dni'].'</td>'
  .'<td>'.$p1.'</td>'
  .'<td>'.$p2.'</td>'
  .'<td>'.$row['fecha_nac'].'</td>'
  .'<td>'.$row['anios'].'</td>'
  .'<td>'.$p3.'</td>'
  .'<td>'.$p4.'</td>'                                 
  .'<td>'.$p5.'</td>'
  .'<td>'.$p6.'</td>'
  .'<td style="width:10%">'.$p7.''. $p8.''. $p9.''. $p10.''. $p11.''. $p12.'</td>'
  .'<td>'.$p13.'</td>'
  .'<td>'.$p14.'' .$p15.'</td>'
  .'<td>'.$p16.'</td>'
  .'<td>'.$p17.'</td>'
  .'<td>'.$p18.'</td>'
  .'<td>'.$p19.'</td>'

  .'<td><a href="grupo_hogares.php?Id='.$row['id_exp'].'&mtri='.$row['id_numero'].'">Visualizar</a></td>'
 

//                  .'<td><a href="javascript:;" onclick= avisoi("Salida_Mes.php?brId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Borrar</a></td>'                
//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'                  
  .'</tr>';
  }
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

<!-- comienza clase comentario -->
<?php
if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
    $id_comentario=""; 
    $comen="";    
    $id_exp=$_GET['Id'];  

if (isset($_GET['mdIde'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

    $Nuevocomentariohogar=new comentariohogar($_GET['mdIde']);
    $id_exp=$Nuevocomentariohogar->getid_exp();
    $comen=$Nuevocomentariohogar->getcomen(); 
    $id_comentario=$Nuevocomentariohogar->getid_comentariohogar(); 
}
?>

<?php 
new Conexion();
$id_exp_1=$_GET['Id'];
$query="select * from comentario_hogar where id_exp = '$id_exp_1'"; 
$result = pg_query($query); 
if(pg_num_rows($result)>'0'){
    $seguir="none";
    $confus='1';
    $se="block";
    $tus="none";
  }//fin de la fila del if
  else
  {
    $se="none";
    $seguir="block";
    $confus='0';
    $tus="block";
}
?>
<?php 
if(is_numeric($id_exp)&&is_numeric($id_comentario)) 
    {$value='Modificar';
$seguir="block";}
else
    {$value='Guardar';}
?>

<div id="cuerpo" style="display: <?php print $seguir ?>;">

    <form method="POST" action="grupo_hogar.php?Id=<?php print $id_exp ?>" autocomplete="off"> 
        <input type="hidden" name="id_exp" value="<?php print $id_exp ?>">
        <input type="hidden" name="id_comentario" value="<?php print $id_comentario ?>">
        <br></br>
        <input type="button" id="bon" disabled="" value="Cargar Observación" onclick="bos()" style=" display:<?php print $tus ?> ;margin-left:auto;margin-right: auto;"><br>
        <div id="divs" style="display:<?php print $se ?>" >
        <h3 style="text-align: center;"><u></b>Observaciones<b></u></h3>
            <textarea name="comen"  id="comen" cols="3" rows="4" style="width: 50%"><?php print $comen ?></textarea>
            <input type="submit"  style=" display: block;margin-left:auto;margin-right: auto;" name="submita" disabled="" id="submitguardar" value ="<?php echo $value ?>">
        </div>
        </form>
    </div>


    <?php

if (isset($_POST['submita'])&&!is_numeric($_POST['id_comentario'])) // si presiono el boton ingresar
{
  $Nuevocomentariohogar=new comentariohogar ();
  $Nuevocomentariohogar->setcomen($_POST['comen']); 
    $Nuevocomentariohogar->setid_exp($_POST['id_exp']); 
  print  $Nuevocomentariohogar->insertcomentariohogar(); // inserta y muestra el resultado


}
?>
<?php 

if(isset($_POST['submita'])){
  new Conexion();
  $id_exp_1=$_GET['Id'];
  $query="select * from comentario_hogar where id_exp = '$id_exp_1'"; 
  $result = pg_query($query); 
  if($seguir=='block'){
      if(pg_num_rows($result)=='1'){
          echo "<meta http-equiv='refresh' content='1'>";
  }//fin de la fila del if 1
}
  }//fin de la fila del if 2



  ?>

  <?php
  if (isset($_POST['submita'])&&is_numeric($_POST['id_exp'])&&is_numeric($_POST['id_comentario'])) // si presiono el boton y es modificar
  {
   $Nuevocomentariohogar=new comentariohogar ();
   $Nuevocomentariohogar->setcomen($_POST['comen']); 
   $Nuevocomentariohogar->setid_exp($_POST['id_exp']); 
   print  $Nuevocomentariohogar->updatecomentariohogar (); // inserta y muestra el resultado
}
//if (isset($_GET['brId'])&&is_numeric($_GET['brId'])) // si presiono el boton y es eliminar
//{
 // $Nuevocomentariohogar=new comentariohogar ();
  //print  $Nuevocomentariohogar->deleteFicha($_GET['brId']); // elimina el identificacion y muestra el resultado
//}

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
  $Nuevocomentariohogar=new comentariohogar ();
  print  $Nuevocomentariohogar->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
}

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
  $Nuevocomentariohogar=new comentariohogar ();
  print  $Nuevocomentariohogar->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
}

if($confus=='1'){
    $Nuevocomentariohogar=new comentariohogar();

$Nuevocomentariohogar= $Nuevocomentariohogar->getcomentariohogar($_GET['Id']); // obtiene todos las salidas para despues mostrarlas
print '<div id="grilla"> <br/><br/><table style="width:30%;" border=1>'
.'<th>Observacion</th>                                      ';

    while ($row=  pg_fetch_array($Nuevocomentariohogar)) // recorre los identificaciones uno por uno hasta el fin de la tabla
    {
       print '<tr>'
       .'<td>'.$row['comen'].'</td>'                   
  
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

<!-- comienzan los scripts -->

<script type="text/javascript">
 function check(e,value)
 {
      //Check Charater
      var unicode=e.charCode? e.charCode : e.keyCode;
      if (value.indexOf(".") != -1)if( unicode == 46 )return false;
      if (unicode!=8)if((unicode<48||unicode>57)&&unicode!=46)return false;
    }
    function checkLength()
    {
      var fieldLength = document.getElementById('rel_parentesco').value.length;
         var sexo = document.getElementById('sexo');


  if(fieldLength > 0){
      sexo.disabled=false;
  }
  else
  {   sexo.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 2){
      return true;
    }
    else
    {
      var str = document.getElementById('rel_parentesco').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('rel_parentesco').value = str;
    }
  }

  function checkLength1()
  {
    var fieldLength = document.getElementById('sexo').value.length;
    var fecha_nac = document.getElementById('fecha_nac');
    



     if(fieldLength > 0){
      fecha_nac.disabled=false;
  }
  else
  { fecha_nac.disabled=true;}
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('sexo').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('sexo').value = str;
    }
  }

  function checkLength2()
  {
    var fieldLength = document.getElementById('dni').value.length;
        var rel_parentesco = document.getElementById('rel_parentesco');


  if(fieldLength > 0){
      rel_parentesco.disabled=false;
  }
  else
  {   rel_parentesco.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 8){
      return true;
    }
    else
    {
      var str = document.getElementById('dni').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('dni').value = str;
    }
  }
  function checkLength3()
  {
    var fieldLength = document.getElementById('anios').value.length;
    var sit_conyu = document.getElementById('sit_conyu');


  if(fieldLength > 0){
      sit_conyu.disabled=false;
  }
  else
  { sit_conyu.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 3){
      return true;
    }
    else
    {
      var str = document.getElementById('anios').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('anios').value = str;
    }
  }
  function checkLength4()
  {
    var fieldLength = document.getElementById('sit_conyu').value.length;
        var cober_medic = document.getElementById('cober_medic');


  if(fieldLength > 0){
      cober_medic.disabled=false;
  }
  else
  { cober_medic.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('sit_conyu').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('sit_conyu').value = str;
    }
  }
  function checkLength5()
  {
    var fieldLength = document.getElementById('cober_medic').value.length;
    var salud_1 = document.getElementById('salud_1');

    var sifon = document.getElementById('sit_conyu');
    var medi = document.getElementById('cober_medic');

      if(medi.value=='1' || medi.value=='2' || medi.value=='3' || medi.value=='4' || medi.value=='5' || medi.value=='6' || medi.value=='9' 
        || medi.value=='12' 
        || medi.value=='123' 
        || medi.value=='1234' 
        || medi.value=='12345' 
        || medi.value=='13' 
        || medi.value=='134' 
        || medi.value=='1345' 
        || medi.value=='14' 
        || medi.value=='145'
        || medi.value=='15'
        || medi.value=='23'
        || medi.value=='234'
        || medi.value=='2345'
        || medi.value=='24'
        || medi.value=='245'
        || medi.value=='25'
        || medi.value=='34'
        || medi.value=='345'
        || medi.value=='35'
        || medi.value=='45'
        )
  {}
else{
    medi.value="";
    alert("Valor Incorrecto o Nulo");
    medi.focus();
}

  if(fieldLength > 1)
  {salud_1.disabled=false;}
  else
  {salud_1.disabled=true;}

   
  }
  function checkLength6()
  {
    var fieldLength = document.getElementById('salud_1').value.length;
    var salud_2 = document.getElementById('salud_2');

  if(fieldLength > 0){
      salud_2.disabled=false;
  }
  else
  { salud_2.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('salud_1').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('salud_1').value = str;
    }
  }
  function checkLength7()
  {
    var fieldLength = document.getElementById('salud_2').value.length;
    var disc_1 = document.getElementById('disc_1');

    var salud_2 = document.getElementById("salud_2");
  var salud_1 = document.getElementById("salud_1");

  if(salud_2.value=='1' || salud_2.value=='2' || salud_2.value=='3' || salud_2.value=='12' || salud_2.value=='13' || salud_2.value=='23' || salud_2.value=='32' || salud_2.value=='31' || salud_2.value=='321' || salud_2.value=='123' || salud_2.value=='213' || salud_2.value=='231'||salud_2.value=='21'||salud_2.value=='132')
  {}
else{
    alert("Valor Incorrecto o Nulo");
    salud_1.focus();
    salud_2.value="";
    salud_2.focus();
}

  if(fieldLength > 0){
      disc_1.disabled=false;
  }
  else
  { disc_1.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 3){
      return true;
    }
    else
    {
      var str = document.getElementById('salud_2').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('salud_2').value = str;
    }
  }
  function checkLength8()
  {
    var fieldLength = document.getElementById('disc_1').value.length;
    var disc_10 = document.getElementById('disc_10');

  if(fieldLength > 0){
      disc_10.disabled=false;
  }
  else
  { disc_10.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('disc_1').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('disc_1').value = str;
    }
  }
  function checkLength9()
  {
    var fieldLength = document.getElementById('disc_10').value.length;
    var disc_100 = document.getElementById('disc_100');

  if(fieldLength > 0){
      disc_100.disabled=false;
  }
  else
  { disc_100.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('disc_10').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('disc_10').value = str;
    }
  }
  function checkLength10()
  {
    var fieldLength = document.getElementById('disc_100').value.length;
    var disc_1000 = document.getElementById('disc_1000');

  if(fieldLength > 0){
      disc_1000.disabled=false;
  }
  else
  { disc_1000.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('disc_100').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('disc_100').value = str;
    }
  }
  function checkLength11()
  {
    var fieldLength = document.getElementById('disc_1000').value.length;
    var disc_10000 = document.getElementById('disc_10000');

  if(fieldLength > 0){
      disc_10000.disabled=false;
  }
  else
  { disc_10000.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('disc_1000').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('disc_1000').value = str;
    }
  }
  function checkLength12_1()
  {
    var fieldLength = document.getElementById('disc_100000').value.length;
    var disc_2 = document.getElementById('disc_2');

  if(fieldLength > 0){
      disc_2.disabled=false;
  }
  else
  { disc_2.disabled=true;}

    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('disc_100000').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('disc_100000').value = str;
    }
  }
   function checkLength12()
  {
    var fieldLength = document.getElementById('disc_10000').value.length;
    var disc_100000 = document.getElementById('disc_100000');

  if(fieldLength > 0){
      disc_100000.disabled=false;
  }
  else
  { disc_100000.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('disc_10000').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('disc_10000').value = str;
    }
  }

  function checkLength13()
  {
    var fieldLength = document.getElementById('disc_2').value.length;
    var jub_1 = document.getElementById('jub_1');

  if(fieldLength > 0){
      jub_1.disabled=false;
  }
  else
  { jub_1.disabled=true;}
   
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('disc_2').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('disc_2').value = str;
    }
  }
  function checkLength14()
  {
  var fieldLength = document.getElementById('jub_1').value.length;
  var jub_2 = document.getElementById('jub_2');

  var jub_1 = document.getElementById("jub_1");
  var edu_1 = document.getElementById("edu_1");

  if(jub_1.value=="1")
  {
    jub_2.style.margin="auto";
    jub_2.style.display="block";
    edu_1.disabled=true;
  }

if(jub_1.value=="2")
    {
     jub_2.style.display="none";
     jub_2.value="";
     edu_1.disabled=false;
    }

  if(fieldLength > 0){
      jub_2.disabled=false;
  }
  else
  { jub_2.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('jub_1').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('jub_1').value = str;
    }
  }
  function checkLength15()
  {
    var fieldLength = document.getElementById('jub_2').value.length;
    var edu_1 = document.getElementById('edu_1');

  var jub_1 = document.getElementById("jub_1");
  var jub_2 = document.getElementById("jub_2");
  

  if(jub_1.value=="1")
  {}
else{
  alert("Valor Incorrecto");
     jub_1.value="";
     jub_2.value="";
     jub_1.focus();
    }



  if(fieldLength > 0){
      edu_1.disabled=false;
  }
    if(fieldLength == ''){
      edu_1.disabled=true;
  }

    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('jub_2').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('jub_2').value = str;
    }
  }
  function checkLength16()
  {
    var fieldLength = document.getElementById('edu_1').value.length;
    var edu_2 = document.getElementById('edu_2');

  var cap2 = document.getElementById("edu_1");
  var cap3 = document.getElementById("edu_2");
  var cap4 = document.getElementById("edu_3");
  var cap5 = document.getElementById("edu_4");
  var sub = document.getElementById("submitguardar");

  if(cap2.value == "3")
  {
    sub.disabled=false;
    cap3.value="";
    cap3.disabled=false;
    cap3.style.display="none";
    cap4.value="";
    cap4.disabled=false;
    cap4.style.display="none";
    cap5.value="";
    cap5.disabled=false;
    cap5.style.display="none";
  }
  if(cap2.value == "1" || cap2.value == "2")
  {   
    cap3.style.margin="auto";
    cap3.style.display="block";
    cap4.style.margin="auto";
    cap4.style.display="block";
    cap5.style.margin="auto";
    cap5.style.display="block";
    cap5.disabled=true;
    cap4.disabled=true;
    cap3.disabled=false;
    sub.disabled=true;

  }
  else
  { edu_2.disabled=true;}

   if(fieldLength == ''){
     sub.disabled=true;
  }


    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('edu_1').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('edu_1').value = str;
    }
  }
  function checkLength17()
  {
    var fieldLength = document.getElementById('edu_2').value.length;
    var edu_3 = document.getElementById('edu_3');
    var ed1 = document.getElementById("edu_1");
    var ed2 = document.getElementById("edu_2");


  if(ed2.value >= "1" && ed1.value=="3"  )
  {
    ed1.focus();
    ed1.value="";

  }


  if(fieldLength > 0){
      edu_3.disabled=false;
  }
  else
  { edu_3.disabled=true;}
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('edu_2').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('edu_2').value = str;
    }
  }
  function checkLength18()
  {
    var fieldLength = document.getElementById('edu_3').value.length;
    var edu_4 = document.getElementById('edu_4');
    var c3 = document.getElementById("edu_3");
    var c4 = document.getElementById("edu_4");
    var c5 = document.getElementById("submitguardar");
  


  if(c3.value == "1")
  {
    c5.disabled=false;
    c4.value="";
    c4.style.display="none";

  }
    if(c3.value == "2")
  {   
    c4.style.margin="auto";
    c4.style.display="block";
    c4.value="";
    c5.disabled=true;
  }

  if(fieldLength > 0){
      edu_4.disabled=false;
  }
  else
  { edu_4.disabled=true;}

  if(fieldLength == ''){
      c5.disabled=true;
  }
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
    }
    else
    {
      var str = document.getElementById('edu_3').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('edu_3').value = str;
    }
  }
  function checkLength19()
  {
    var fieldLength = document.getElementById('edu_4').value.length;
    var ed3 = document.getElementById("edu_3");
    var ed4 = document.getElementById("edu_4");
    var sub = document.getElementById("submitguardar");


  if(ed4.value >= "0" && (ed3.value=="1"))
  {
    ed3.focus();
    ed3.value="2";
   
  }

    //Suppose u want 4 number of character
    if(ed4.value=='0' ||  ed4.value=='1' || ed4.value=='2' ||  ed4.value=='3' || ed4.value=='4' || ed4.value=='5' || ed4.value=='6' || ed4.value=='7' || ed4.value=='8' || ed4.value=='9' || ed4.value=='99')
    {sub.disabled=false;}
  else
  {
    ed4.focus();
    sub.disabled=true;
    alert("Valor Incorrecto o Nulo");
    ed4.value="";
    sub.disable=true;
  }
    //Suppose u want 4 number of character
    if(fieldLength <= 2){
      return true;
    }
    else
    {
      var str = document.getElementById('edu_4').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('edu_4').value = str;
    }
  }
</script>

<script type="text/javascript">

  function dip()
  {
    
    var anios = document.getElementById('anios');
    var fecha_nac = document.getElementById('fecha_nac');

     if(fecha_nac.value > '0000-00-00'){
      anios.disabled=false;
  }
  else
  { anios.disabled=true;}
   
}
  function tre()
  {
    
    var nombre = document.getElementById('nombre').value;
    var dni = document.getElementById('dni');

     if(nombre.length > 0){
      dni.disabled=false;
  }
  else
  { dni.disabled=true;}
   
}

function god()
{
   var nombre = document.getElementById('nombre');
   var dni = document.getElementById('dni');
   var aux;
  if(nombre.value.length > 0){
    
  aux=nombre.value;
  nombre.value="";
  nombre.value=aux;
  dni.disabled=false;
}
else
{}

}

function god1()
{
    var sexo = document.getElementById('sexo');
    var fecha_nac = document.getElementById('fecha_nac');
    var aux;
  
  if(sexo.value > 0){

  aux=sexo.value;
  sexo.value="";
  sexo.value=aux;

  fecha_nac.disabled=false;
  }
else
{}

}

function ponleFocus(){
document.getElementById("nombre").focus();
aux=nombre.value;
  nombre.value="";
  nombre.value=aux;
}
function ponleFocus1(){
document.getElementById("sexo").focus();
  aux=sexo.value;
  sexo.value="";
  sexo.value=aux;
}
var id_numero = document.getElementById('id_numero').value;
if(id_numero==1){ponleFocus1();}else{ponleFocus();}


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

  function tab_btn1(event,p1,p2)
{
  var x1=p1 // fecha_nac
  var x2=p2; // anios
  //var x3=new date("2000","03","01");

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value > "0000-00-00" ) 
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

  function tab_btnf(event,p1,p2)
{
  var x1=p1;
  var x2=p2;
  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value.length > 0) 
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

    function tab_btno(event,p1,p2,p3)
{
  var x1=p1;
  var x2=p2;
  var x3=p3;
  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value == 2) 
  { 
 x2.style.display="block"; 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }

  if (t == 9 && x1.value == 1) 
  {
    x2.disabled=false;
  x2.style.display="none"; 
  x3.disabled=false;
  x3.focus();

  return false;
  }  
    return true;

  }

    function tab_btnl(event,p1,p2,p3,p4,p5)
{
  var x1=p1;
  var x2=p2;
  var x3=p3;
  var x4=p4;
  var x5=p5;
  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && (x1.value == 1 ||  x1.value == 2)) 
  { 

  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }

  if (t == 9 && x1.value == 3) 
  {
  x2.disabled=false;
  x2.style.display="none";
  x4.disabled=false;
  x4.style.display="none"; 
  x5.disabled=false;
  x5.style.display="none"; 
  x3.disabled=false;
  x3.focus();

  return false;
  }  
    return true;

  }

      function tab_btnq(event,p1,p2,p3)
{
  var x1=p1;
  var x2=p2;
  var x3=p3;
  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && (x1.value == 1 )) 
  { 

  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }

  if (t == 9 && x1.value == 2) 
  {

  x3.disabled=false;
  aux=x3.value;
  x3.value="";
  x3.value=aux;
  x2.disabled=false;
  x2.style.display="none"; 
  x3.focus();

  return false;
  }  
    return true;

  }
        function bos()
{
 var d = document.getElementById('divs');
 d.style.display="block";
 var t = document.getElementById('comen');
 t.focus();

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

var str2 = "grupo_hogares.php?Id=";
window.location = str2.concat(product);

}
//-->
</script>
</body>
</html>
    