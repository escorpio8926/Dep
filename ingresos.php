<?php
include 'cabecera.php';
include 'menu.php';
include './classIngreso.php';
include './classcompo.php';

if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
    $id_ingreso=""; 
    $ingreso="";
    $singreso="";
    $miembro="";
    $total="";
    $id_exp=$_GET['Id'];
    $id_user=$_SESSION['id_user'];        

if (isset($_GET['mdIds'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

        $NuevoIng=new Ing($_GET['mdIds']);// instancio la clase identificacion pasandole el nro de identificacion, de esta forma lo busca
        $ingreso=$NuevoIng->getingreso();
        $singreso=$NuevoIng->getsingreso();
        $miembro=$NuevoIng->getmiembro();
        $total=$NuevoIng->gettotal();
        $id_exp=$NuevoIng->getid_exp();
        $id_ingreso=$NuevoIng->getid_ingreso();
    }
    ?>
    <?php
    new Conexion();
    $id_exp_2 =$_GET['Id'];
    $query="select * from ingresos where id_exp = '$id_exp_2'"; 
    $result = pg_query($query); 
    if(pg_num_rows($result)>'0'){
        $query1="select miembro from ingresos where id_exp = '$id_exp_2'";
        $result1 = pg_query($query1);
 
 $ti1="autofocus";
    $ti="";
        $lbv="none";
  }//fin de la fila del if
  else
  { 
    $lbv="block";
          $ti="autofocus";
        $ti1="";
} 
?>
<!-- aqui termina la  clase ingre -->
<?php

if(is_numeric($id_exp)&&is_numeric($id_ingreso)) 
    {$value='Modificar';
$lbv="block";
$gh='autofocus';
$wata="block";
$disa="hidden";
      $disas="";
} 
else
    {$value='Guardar';
     $disa="";
      $disas="hidden"; 
$gh='';
$wata="none";
}
?>     
<div id="cuerpo" style="display: <?php print $lbv ?>";>

    <form method="POST" action="ingresos.php?Id=<?php print $id_exp ?>" autocomplete="off"> 
        <input type="hidden" name="id_exp" value="<?php print $id_exp ?>">
        <input type="hidden" name="id_ingreso" value="<?php print $id_ingreso ?>">
        <input type="hidden" name="id_user" value="<?php print $id_user ?>">
        <br></br>
        <table border="2" >
            <tr colspan="2">
                <th  colspan="2" style="border-bottom-style: solid;"><h3>Ingresos del Hogar</h3></th>
            </tr>
            <tr>
                <td><b>¿Cuál fue el ingreso total del hogar el último mes? $</b><input type="text" name="ingreso" id="ingreso" class="entero"  style="width: 40%;" onchange="www()" value="<?php print $ingreso ?>"  onkeydown="return tab_btn(event,getElementById('ingreso'),getElementById('miembro'),getElementById('singreso'),getElementById('io'),getElementById('clu'),getElementById('submitguardar'),getElementById('total'))" ></td>
            </tr>
            <tr>
                <td id="io" style="display:<?php print $wata ?>;width: 100%"><input  type="text" name="singreso" id="singreso" class="entero" style="width: 30%;" placeholder="Sin Ing (2) - Ns/Nr (99)" value="<?php print $singreso ?>" onchange="www1()" onkeydown="return tab_btn1(event,getElementById('singreso'),getElementById('total'),getElementById('miembro'),getElementById('sti'),getElementById('ingreso'),getElementById('clu'))"  maxlength="2" disabled></td>
            </tr>
            <tr>
                <td id="sti" style="display: <?php print $wata ?>;width: 100%"><b> ¿Me podría indicar en cuál de estos tramos se ubica el
                ingreso total mensual del hogar?</b><input type="text" name="total" maxlength="2" id="total" class="entero" value="<?php print $total ?>" style="width: 30%;" onchange="www2()" onkeydown="return tab_btn2(event,getElementById('total'),getElementById('miembro'),getElementById('clu'))"  disabled></td>
            </tr>
            <tr>
                <td id="clu" style="display:<?php print $wata ?>;width: 100%" colspan="3" style="border-bottom-style: solid;"><b>Durante el mes de … ¿algún miembro del hogar cobró la Asignación Universal por Hijo (AUH) y/o Asignación por embarazo?</b><input type="text" name="miembro" id="miembro" value="<?php print $miembro ?>" class="oby" onkeydown="return tab_btn3(event,getElementById('miembro'),getElementById('submitguardar'))"  required onkeypress="return check(event,value)" oninput="checkLength3()"  disabled>
                </td>
            </tr>
                        
            <tr>
                <td colspan="3" id="boton">
                <input type="button" onclick="redirect()" style="width:15%;margin-left:0%;" value="Principal" <?php print $disa ?>>
                <input type="button" onclick="redirect1()" style="width:15%;margin-left:0%;" value="Cancelar" <?php print $disas ?>>
                <input type="submit" name="submit" id="submitguardar" style="width: 15%" value ="<?php echo $value ?>" disabled>
                <a href=""></a>
                </td>

            </tr>     

        </table>
    </form>
</div>
<?php
if(isset($_POST['submit']))
      {
        if($lbv=='block'){
         echo "<meta http-equiv='refresh' content='2'>";
        }
      }      
?> 

<?php

if (isset($_POST['submit'])&&!is_numeric($_POST['id_ingreso'])) // si presiono el boton ingresar
{
    $NuevoIng=new Ing();
    $NuevoIng->setid_ingreso($_POST['id_ingreso']); 
    $NuevoIng->setingreso($_POST['ingreso']);
    $NuevoIng->setsingreso($_POST['singreso']);
    $NuevoIng->setmiembro($_POST['miembro']);
    $NuevoIng->settotal($_POST['total']);
    $NuevoIng->setid_exp($_POST['id_exp']); 
    print  $NuevoIng->insertIng(); // inserta y muestra el resultado
}
if (isset($_POST['submit'])&&is_numeric($_POST['id_exp'])&&is_numeric($_POST['id_ingreso'])) // si presiono el boton y es modificar
{
    $NuevoIng=new Ing ();
    $NuevoIng->setid_ingreso($_POST['id_ingreso']); 
    $NuevoIng->setingreso($_POST['ingreso']);
    $NuevoIng->setsingreso($_POST['singreso']);
    $NuevoIng->setmiembro($_POST['miembro']);
    $NuevoIng->settotal($_POST['total']);
    $NuevoIng->setid_exp($_POST['id_exp']); 
    print  $NuevoIng->updateIng ();// inserta y muestra el resultado
}
if (isset($_GET['brId'])&&is_numeric($_GET['brId'])) // si presiono el boton y es eliminar
{
    $NuevoIng=new Ing ();
    print  $NuevoIng->deleteFicha($_GET['brId']); // elimina el identificacion y muestra el resultado
}

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
    $NuevoIng=new Ing ();
    print  $NuevoIng->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
}

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
    $NuevoIng=new Ing ();
    print  $NuevoIng->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
}

if($lbv=='none'){
$NuevoIng=new Ing();
$NuevoIng= $NuevoIng->getingreso1($_GET['Id']); // obtiene todos las salidas para despues mostrarlas
print '<div id="grilla"> <br/><br/><table border=1 style="width:80%">'
.'<th>El ingreso total del hogar el último mes</th>                      
<th>¿Ingresos?</th>
<th>Ingresos Aproximados</th>
<th>¿Algún miembro del hogar cobró la Asignación Universal por Hijo (AUH) y/o Asignación por embarazo?</th>

<th colspan=1></th>';

while ($row=  pg_fetch_array($NuevoIng)) // recorre los identificaciones uno por uno hasta el fin de la tabla

{
        include './ifingresos.php';
    print '<tr>'
    .'<td style="width:25%">'.'$'.$row['ingreso'].'</td>'
    .'<td style="width:10%">'.$p1.'</td>'
    .'<td style="width: 15%">'.$p2.'</td>'
    .'<td>'.$p3.'</td>'
    .'<td style="width:10%"><a href="ingresos.php?Id='.$row['id_exp'].'&mdIds='.$row['id_ingreso'].'">Modificar</a>
    &nbsp&nbsp<a href="nueva_ficha.php">Principal</a>
    </td>'
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
<!-- aqui termina la  clase ingre -->
<?php 
new Conexion();
$id_exp_1 =$_GET['Id'];
$query="select * from ingresos where id_exp = '$id_exp_1'"; 
$result = pg_query($query); 
if(pg_num_rows($result)>'0'){
    $query1="select miembro from ingresos where id_exp = '$id_exp_1'";
    $result1 = pg_query($query1);


    while ($resultados = pg_fetch_array($result1)) {

        $miembrosk=$resultados['miembro'];
        if($miembrosk=='1'){
            $seguir='block';
            $t=1;}
            else{$seguir="none";$t=0;}
      }//fin del while de resultados
  }//fin de la fila del if
  else
  {
    $seguir="none";
  }
?>
<!-- empieza la clase de componentes -->

<?php
if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
    $id_cmpt=""; 
    $c1="";
    $c2="";
    $c3="";
    $c4="";
    $id_exp=$_GET['Id'];
    $id_user=$_SESSION['id_user'];        

if (isset($_GET['mio'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

        $Nuevocompo=new compo($_GET['mio']);// instancio la clase identificacion pasandole el nro de identificacion, de esta forma lo busca
        $c1=$Nuevocompo->getc1();
        $c2=$Nuevocompo->getc2();
        $c3=$Nuevocompo->getc3();
        $c4=$Nuevocompo->getc4();
        $id_exp=$Nuevocompo->getid_exp();
        $id_cmpt=$Nuevocompo->getid_cmpt();
    }
    ?>


    

    <div id="cuerpo" style="display: <?php print $seguir ?>;">
        <?php 
        if(is_numeric($id_exp)&&is_numeric($id_cmpt)) 
            {$value='Modificar';
            $uio="readonly";
              $clap="autofocus";
              $clap1=""; 
               $claps="";
               $dim=""; } 
        else
            {$value='Agregar';
            $uio="";
         $clap="";
          $claps="autofocus";
         $clap1="disabled";
         $dim="hidden"; }
        ?> 
        <form method="POST" action="ingresos.php?Id=<?php print $id_exp ?>" autocomplete="off"> 
            <input type="hidden" name="id_exp" id="id_exp" value="<?php print $id_exp ?>">
            <input type="hidden" name="id_cmpt" value="<?php print $id_cmpt ?>">
            <input type="hidden" name="id_user" value="<?php print $id_user ?>">
            <br></br>

            <table style="width: 50%;" border="2">

               <tr>
                <th colspan="1" style="width: 30%;"><b>N° de Componente</b><br>
                    <input type="text" name="c1" id="c1" class="entero" style="width: 60%;" onkeypress="return check(event,value)" oninput="checkLength100()" value="<?php print $c1 ?>"<?php print $uio ?>  <?php print $claps ?> required> 
                    <input type="text" name="c4" id="c4" readonly="" style="width: 60%;" value="<?php print $c4 ?>"></th>
                    <th colspan="1"><b>Cobró por¿Cuántos beneficios?</b><br>
                        <input type="text" name="c2" id="c2" onkeydown="return tab_btn4(event,getElementById('c2'),getElementById('c3'))" class="entero" onkeypress="return check(event,value)" oninput="checkLength200()" value="<?php print $c2 ?>" <?php print $clap1 ?>></th>
                    <th colspan="1"><b>Monto cobrado</b><br><input type="text" name="c3" id="c3" class="entero" onkeypress="return check(event,value)" onkeydown="return tab_btn4(event,getElementById('c3'),getElementById('submitguardara'))" oninput="checkLength300()" value="<?php print $c3 ?>" disabled></th>
                </tr>

                <tr>
                    
                    <td colspan="3" id="boton">
                        <input type="button" onclick="redirect1()" style="width:11%;margin-left:0%;" value="Cancelar" <?php print $dim ?>><input type="submit" name="submita" id="submitguardara" value ="<?php echo $value ?>" disabled>
                    </td>
                </tr>     
            </table>
        </form>
    </div>
<?php 


if (isset($_POST['submita'])&&!is_numeric($_POST['id_cmpt'])) // si presiono el boton comporesar
{
    $Nuevocompo=new compo();
    $Nuevocompo->setid_cmpt($_POST['id_cmpt']); 
    $Nuevocompo->setc1($_POST['c1']);
    $Nuevocompo->setc2($_POST['c2']);
    $Nuevocompo->setc3($_POST['c3']);
    $Nuevocompo->setc4($_POST['c4']);
    $Nuevocompo->setid_exp($_POST['id_exp']); 
    print  $Nuevocompo->insertcompo($_POST['c1']); // inserta y muestra el resultado


}
if (isset($_POST['submita'])&&is_numeric($_POST['id_exp'])&&is_numeric($_POST['id_cmpt'])) // si presiono el boton y es modificar
{
    $Nuevocompo=new compo ();
    $Nuevocompo->setid_cmpt($_POST['id_cmpt']); 
    $Nuevocompo->setc1($_POST['c1']);
    $Nuevocompo->setc2($_POST['c2']);
    $Nuevocompo->setc3($_POST['c3']);
    $Nuevocompo->setc4($_POST['c4']);
    $Nuevocompo->setid_exp($_POST['id_exp']); 
    print  $Nuevocompo->updatecompo ($_POST['c1']);// inserta y muestra el resultado
}
if (isset($_GET['brIds'])&&is_numeric($_GET['brIds'])) // si presiono el boton y es eliminar
{
    $Nuevocompo=new compo ();
    print  $Nuevocompo->deletecompo($_GET['Id'],$_GET['brIds'],$_GET['paso']); // elimina el identificacion y muestra el resultado
}

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
    $Nuevocompo=new compo ();
    print  $Nuevocompo->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
}

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
    $Nuevocompo=new compo ();
    print  $Nuevocompo->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
}
new Conexion();
$id_exp_10 =$_GET['Id'];
$query="select * from componente where id_exp = '$id_exp_10'"; 
$result = pg_query($query); 
if(pg_num_rows($result)>'0'){
 
 $segui="block";
  }//fin de la fila del if
  else
  {
    $segui="none";
}

if($segui=="block" && $t=='1'){
    $Nuevocompo=new compo();

$Nuevocompo= $Nuevocompo->getcompo($_GET['Id']); // obtiene todos las salidas para despues mostrarlas
print '<div id="grilla" > <br/><br/><table border=1 style="width:80%" >'
.'<th>N° Componente</th> 
<th>Nombre</th>                     
<th>Total de beneficios</th>
<th>Monto Cobrado ($)</th>


<th colspan=1></th>
<th colspan=1></th>';

while ($row=  pg_fetch_array($Nuevocompo)) // recorre los identificaciones uno por uno hasta el fin de la tabla
{
 include './ifcomponente.php';
    print '<tr>'
    .'<td style="width:11%">'.$row['c1'].'</td>'
    .'<td style="width:25%">'.$row['c4'].'</td>'
    .'<td style="width:13%">'.$wik.'</td>'
    .'<td style="width:13%">'.$wik2.'</td>'
    
    .'<td><a href="ingresos.php?Id='.$row['id_exp'].'&mio='.$row['id_cmpt'].'">Modificar</a></td>'
    .'<td><a href="javascript:;" onclick= avisoz("ingresos.php?Id='.$row['id_exp'].'&brIds='.$row['id_cmpt'].'&paso='.$row['c1'].'","'.$row['c1'].'");>Eliminar Ficha</a></td>'

  
         
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
<!-- termina la clase componentes-->



<script type="text/javascript"> // aqui empiezan los scripts
function www()
{   
    var c = document.getElementById("ingreso");
    var f = document.getElementById("singreso");
    var h = document.getElementById("io");
    var t = document.getElementById("miembro");
    var l = document.getElementById("total");
    var sti = document.getElementById("sti");

    if(c.value > "0" )
    {
        io.style.display="none";
        t.focus();
        t.value="";
        f.value="";
        l.value="";
        sti.style.display="none";


    }
    if(c.value == "0")
    {   
        io.style.display="block";
        io.style.width="100%";
        f.style.width="30%";
        f.focus();
        t.value="";
    
    }
}

function www1()
{   
    var io = document.getElementById("io");
    var k = document.getElementById("ingreso");
    var c = document.getElementById("singreso");
    var h = document.getElementById("sti");
    var t = document.getElementById("miembro");
    var l = document.getElementById("total");

    if(c.value == "2" || c.value=="99" )
    {
        io.style.width="100%";
        if (c.value == "2") 
            {t.focus();
              
                l.value="";
                h.style.display="none";}
                if (c.value == "99") 
                {
                    io.style.width="100%";
                    h.style.display="block";
                    h.style.width="100%";
                    h.position="center";
                    l.focus();
                    k.value="";

                }

            }
            else
            {    
                io.style.width="100%";
                c.value="";
                alert("Valor Incorrecto");     
                c.focus();

            }
           
        }
        function www2()
        {   
            var l = document.getElementById("total");
            var ms = document.getElementById("singreso");

            if(ms.value=="99"){

                if(l.value=="99" ||l.value=="1" || l.value=="2" || l.value=="3" || l.value=="4" || l.value=="5" || l.value=="6" || l.value=="7" || l.value=="8" || l.value=="9" || l.value=="10" || l.value=="11" || l.value=="12" || l.value=="13" || l.value=="14" || l.value=="15" ||  l.value=="16" || l.value=="17" || l.value=="")
                {

                }
                else
                {
                    alert("Valor Incorrecto o Nulo");
                    l.value="";
                    l.focus();
                }

            }
            else
            {
                ms.value="99";
                ms.focus();
            }
        }
        function checkLength1()
        {
            var fieldLength = document.getElementById('singreso').value.length;
    //Suppose u want 4 number of character
    if(fieldLength <= 2){
      return true;
  }
  else
  {
    var str = document.getElementById('singreso').value;
    str = str.substring(0, str.length - 1);
    document.getElementById('singreso').value = str;
}
}
function checkLength2()
{
    var fieldLength = document.getElementById('total').value.length;
    //Suppose u want 4 number of character
    if(fieldLength <= 2){
      return true;
  }
  else
  {
    var str = document.getElementById('total').value;
    str = str.substring(0, str.length - 1);
    document.getElementById('total').value = str;
}
}
function checkLength3()
{
    var fieldLength = document.getElementById('miembro').value.length;
    //Suppose u want 4 number of character
    if(fieldLength <= 1){
      return true;
  }
  else
  {
    var str = document.getElementById('miembro').value;
    str = str.substring(0, str.length - 1);
    document.getElementById('miembro').value = str;
}
}

function checkLength100()
{
    var fieldLength = document.getElementById('c1').value.length;
    //Suppose u want 4 number of character
    if(fieldLength <= 2){
      return true;
  }
  else
  {
    var str = document.getElementById('c1').value;
    str = str.substring(0, str.length - 1);
    document.getElementById('c1').value = str;
}
}
function checkLength200()
{
    var fieldLength = document.getElementById('c2').value.length;
    //Suppose u want 4 number of character
    if(fieldLength <= 2){
      return true;
  }
  else
  {
    var str = document.getElementById('c2').value;
    str = str.substring(0, str.length - 1);
    document.getElementById('c2').value = str;
}
}
function checkLength300()
{
    var fieldLength = document.getElementById('c3').value.length;
    //Suppose u want 4 number of character
    if(fieldLength <= 10){
      return true;
  }
  else
  {
    var str = document.getElementById('c3').value;
    str = str.substring(0, str.length - 1);
    document.getElementById('c3').value = str;
}
}

function tab_btn(event,p1,p2,p3,p4,p5,p6,p7)
{
  var x1=p1;
  var x2=p2;
  var x3=p3;
  var x4=p4;
  var x5=p5;
  var x6=p6;
  var x7=p7;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value > 0) 
  { 
  x5.style.display="block";
  x5.style.width="100%";
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  x7.disabled=false;
  x3.disabled=false;
  return false;
  }
  if (t == 9 && x1.value == '0') 
  { 
  x4.style.display="block";
  x4.style.width="100%";
  x3.style.width="30%";
  x3.disabled=false;
  aux=x3.value;
  x3.value="";
  x3.value=aux;
  x3.focus();
  return false;
  }
  else{
    x2.disabled=true;
    x6.disabled=true;
  }
    return true;

  }

  function tab_btn1(event,p1,p2,p3,p4,p5,p6)
{

  var x1=p1;
  var x2=p2;
  var x3=p3;
  var x4=p4;
  var x5=p5;
  var x6=p6;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  

  if (t == 9 && x1.value == '2') 
  {
  p6.style.display="block";
  p6.style.width="100%"; 
  x3.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;
  x2.disabled=false;

  return false;

  }
  if (t == 9 && x1.value=='99') 
  { 
  x4.style.display="block";
  x4.style.width="100%";
  x2.style.width="30%";
  x2.disabled=false;
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  x2.focus();
  return false;
  }

  if (t == 9 && x1.value=="") 
  { 
 x1.focus();
 alert("Valor Nulo");
  return false;
  }

    return true;
  }

   function tab_btn2(event,p1,p2,p3)
{

  var x1=p1;
  var x2=p2;
  var x3=p3;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  


 if (t == 9 &&  x1.value=='' ) 
  {
     alert("Valor Incorrecto o Nulo");
 x1.focus();
  return false;

  }

  if (t == 9 && ( x1.value=='1' || x1.value=='2'|| x1.value=='3' || x1.value=='4'|| x1.value=='5'|| x1.value=='6' || x1.value=='7' || x1.value=='8' || x1.value=='9' || x1.value=='10' || x1.value=='11'|| x1.value=='12' || x1.value=='13' || x1.value=='14' || x1.value=='15' || x1.value=='16' || x1.value=='17'|| x1.value=='99')) 
  {
  x3.style.display="block";
  x3.style.width="100%"; 
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;

  }

    x1.focus();
    return true;

  }

     function tab_btn3(event,p1,p2)
{

  var x1=p1;
  var x2=p2;
  
  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  

  if (t == 9 && x1.value > 0) 
  {

  x2.disabled=false;
  x2.focus();
  return false;

  }
   
    return true;

  }

       function tab_btn4(event,p1,p2)
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

function ponleFocus(){
  document.getElementById("ingreso").focus();
  aux=ingreso.value;
  ingreso.value="";
  ingreso.value=aux;
}
ponleFocus();

function ponleFocus1(){
  document.getElementById("c2").focus();
   aux=c2.value;
  c2.value="";
  c2.value=aux;
}
ponleFocus1();
</script>
<script>
    $(document).ready(function(){
        $("#c1").change(function(){
            var c = document.getElementById('c1').value;
            var c1 = document.getElementById('c1');
            var t = document.getElementById('id_exp').value;
            var t1 = document.getElementById('id_exp');
            var g = document.getElementById('c2');
            var o = document.getElementById('c4');
            var l = document.getElementById('c3');
            var or = document.getElementById('submitguardara');

            c4.value="";

            $.ajax({

                type: "POST",
                url: "getcomponente.php",
                data:{t:t,c:c},

                success: function(response){
                    console.log(response);
                    if(response != 'error'){
                        var info= JSON.parse(response);
                        console.log(info);
                        $('#c4').val(info.nombre);
                        g.disabled=false;
                        g.focus();
                    }
                     if(info=="error")
          {
          c2.focus();
          c2.value="";
          c2.disabled=true;
          l.disabled=true;
          l.value="";
          or.disabled=true;
          alert("Componente Inexistente");
          c1.value="";
          c1.focus();


          }

                },

                error: function(error){
                    console.log(error);

                }

            })
        });
    });
    
</script>
<script type="text/javascript">
<!--
function redirect() {
   window.location = "nueva_ficha.php";
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

var str2 = "ingresos.php?Id=";
window.location = str2.concat(product);

}
//-->
</script>
</body>
</html>
