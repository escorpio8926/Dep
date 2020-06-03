<?php
include 'cabecera.php';
include 'menu.php';
include './classcomentario.php';
include './classprograma.php';
include './classderivaciones.php';
include './classfin.php';


if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
    $id_comentario=""; 
    $ini="";    
    $id_exp=$_GET['Id'];  

if (isset($_GET['mdIde'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

    $Nuevocomentario=new comentario($_GET['mdIde']);
    $id_exp=$Nuevocomentario->getid_exp();
    $ini=$Nuevocomentario->getini(); 
    $id_comentario=$Nuevocomentario->getid_comentario(); 
}
?>

<?php 
new Conexion();
$id_exp_1=$_GET['Id'];
$query="select * from evaluacion where id_exp = '$id_exp_1'"; 
$result = pg_query($query); 
if(pg_num_rows($result)>'0'){
    $seguir="none";
    $confus='1';
  }//fin de la fila del if
  else
  {
    $seguir="block";
    $confus='0';
}
?>
<?php 
if(is_numeric($id_exp)&&is_numeric($id_comentario)) 
    {$value='Modificar';
$disa="hidden";
$seguir="block";
$disas="";}
else
    {$value='Guardar';
$disa="";
$disas="hidden";}
?>

<div id="cuerpo" style="display: <?php print $seguir ?>;">

    <form method="POST" action="evaluacion_trabajo.php?Id=<?php print $id_exp ?>" autocomplete="off"> 
        <input type="hidden" name="id_exp" value="<?php print $id_exp ?>">
        <input type="hidden" name="id_comentario" value="<?php print $id_comentario ?>">
        <br></br>
        <h3 style="text-align: center;"><u></b>Evaluación del caso y Plan de trabajo <b></u></h3>
            <textarea name="ini" id="ini" cols="5" rows="5" style="display: block; margin-left: auto;margin-right: auto;" autofocus><?php print $ini ?></textarea>
            <input type="button" onclick="redirect()" style="width:10%;margin-left:35%;" value="Principal" <?php print $disa ?>>
              <input type="button" onclick="redirect1()" style="width:10%;margin-left:35%;" value="Cancelar"  readonly="" <?php print $disas ?> >
            <input type="submit" style="margin-left: 10%;width:10%" name="submit" id="submitguardar" value ="<?php echo $value ?>" disabled>
            
        </form>
    </div>


    <?php


if (isset($_POST['submit'])&&!is_numeric($_POST['id_comentario'])) // si presiono el boton ingresar
{
    $Nuevocomentario=new comentario ();
    $Nuevocomentario->setini($_POST['ini']); 
    $Nuevocomentario->setid_exp($_POST['id_exp']); 
    print  $Nuevocomentario->insertcomentario(); // inserta y muestra el resultado
}
?>
<?php 

if(isset($_POST['submit'])){
  new Conexion();
  $id_exp_1=$_GET['Id'];
  $query="select * from evaluacion where id_exp = '$id_exp_1'"; 
  $result = pg_query($query); 
  if($seguir=='block'){
      if(pg_num_rows($result)=='1'){
          echo "<meta http-equiv='refresh' content='1'>";
  }//fin de la fila del if 1
}
  }//fin de la fila del if 2



  ?>

  <?php
  if (isset($_POST['submit'])&&is_numeric($_POST['id_exp'])&&is_numeric($_POST['id_comentario'])) // si presiono el boton y es modificar
  {
   $Nuevocomentario=new comentario ();
   $Nuevocomentario->setini($_POST['ini']); 
   $Nuevocomentario->setid_exp($_POST['id_exp']); 
   print  $Nuevocomentario->updatecomentario (); // inserta y muestra el resultado
}
if (isset($_GET['brId'])&&is_numeric($_GET['brId'])) // si presiono el boton y es eliminar
{
    $Nuevocomentario=new comentario ();
    print  $Nuevocomentario->deleteFicha($_GET['brId']); // elimina el identificacion y muestra el resultado
}

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
    $Nuevocomentario=new comentario ();
    print  $Nuevocomentario->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
}

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
    $Nuevocomentario=new comentario ();
    print  $Nuevocomentario->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
}

if($confus=='1'){
    $Nuevocomentario=new comentario();

$Nuevocomentario= $Nuevocomentario->getcomentario($_GET['Id']); // obtiene todos las salidas para despues mostrarlas
print '<div id="grilla"> <br/><br/><table style="width:50%;" border=1>'
.'<th>Evaluacion del caso y plan de trabajo</th>                                      
<th></th>';

    while ($row=  pg_fetch_array($Nuevocomentario)) // recorre los identificaciones uno por uno hasta el fin de la tabla
    {
       print '<tr>'
       .'<td>'.$row['ini'].'</td>'                   
       .'<td><a href="javascript:;" onclick="redirect()">Principal</a></td>'
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


<!-- Comienza Programa -->

<?php
if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
    $id_prg=""; 
    $progra="";
    $id_exp=$_GET['Id'];
    $id_user=$_SESSION['id_user'];        

if (isset($_GET['mio'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

        $Nuevopg=new pg($_GET['mio']);// instancio la clase identificacion pasandole el nro de identificacion, de esta forma lo busca
        $progra=$Nuevopg->getprogra();
        $id_exp=$Nuevopg->getid_exp();
        $id_prg=$Nuevopg->getid_prg();
    }
    ?>


    <div id="cuerpo">
        <?php 
        if(is_numeric($id_exp)&&is_numeric($id_prg)) 
            {$value='Modificar';} 
        else
            {$value='Agregar';
    }
        ?> 
        <form method="POST" action="evaluacion_trabajo.php?Id=<?php print $id_exp ?>" autocomplete="off"> 
            <input type="hidden" name="id_exp" id="id_exp" value="<?php print $id_exp ?>">
            <input type="hidden" name="id_prg" value="<?php print $id_prg ?>">
            <input type="hidden" name="id_user" value="<?php print $id_user ?>">
            <br></br>

            <table>
            <tr>
            <th class="selector-progra" style="text-align: center;"><label for="Programas" >Asignación de Programas</label><select name="progra" style="   text-align-last: center;
   text-align: center;
   -ms-text-align-last: center;
   -moz-text-align-last: center;"  id="progra"></select></th> 
            <td colspan="3" id="boton"><input type="submit" name="submita" id="submitguardara" value ="<?php echo $value ?>" tabindex="8" required disabled>
             
            </td>
            
            </tr>
            </table>

        </form>
    </div>

    <?php


if (isset($_POST['submita'])&&!is_numeric($_POST['id_prg'])) // si presiono el boton pgresar
{
    $Nuevopg=new pg();
    $Nuevopg->setid_prg($_POST['id_prg']); 
    $Nuevopg->setprogra($_POST['progra']);
    $Nuevopg->setid_exp($_POST['id_exp']); 
    print  $Nuevopg->insertpg($_POST['progra']); // inserta y muestra el resultado


}
if (isset($_POST['submita'])&&is_numeric($_POST['id_exp'])&&is_numeric($_POST['id_prg'])) // si presiono el boton y es modificar
{
    $Nuevopg=new pg ();
    $Nuevopg->setid_prg($_POST['id_prg']); 
    $Nuevopg->setprogra($_POST['progra']);
    $Nuevopg->setid_exp($_POST['id_exp']); 
    print  $Nuevopg->updatepg ();// inserta y muestra el resultado
}

if (isset($_GET['brIds'])&&is_numeric($_GET['brIds'])) // si presiono el boton y es eliminar
{
    $Nuevopg=new pg ();
    print  $Nuevopg->deletepg($_GET['Id'],$_GET['brIds']);
}

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
    $Nuevopg=new pg ();
    print  $Nuevopg->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
}

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
    $Nuevopg=new pg ();
    print  $Nuevopg->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
}
?>
<?php 
new Conexion();
$id_exp_1 =$_GET['Id'];
$query="select * from program where id_exp = '$id_exp_1'"; 
$result = pg_query($query); 
if(pg_num_rows($result)>'0'){
    $tin="1";
  }//fin de la fila del if
  else
  {
    $tin="2";
}
?>

<?php
 print '<br>';
if($tin=='1'){
    $Nuevopg=new pg();

$Nuevopg= $Nuevopg->getpg($_GET['Id']); // obtiene todos las salidas para despues mostrarlas
print '<div id="grilla"><h3 style="text-align: center;">Programas Asignados</h3> <br/><br/><table style="width:50%" border=1 >'
.'<th>Programa</th>                      

';

    while ($row=  pg_fetch_array($Nuevopg)) // recorre los identificaciones uno por uno hasta el fin de la tabla
    { include './ifprograma.php';
        print '<tr>'
        .'<td>'.$puno.'</td>'
        
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

<?php 

if(is_numeric($id_exp)&&is_numeric($id_comentario)) 
    {$value='Modificar';} 
else
    {$value='Guardar';
}
?>
<!-- termina programa -->
<?php
if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
    $id_drv=""; 
    $deriva="";
    $otro="";
    $id_exp=$_GET['Id'];
    $id_user=$_SESSION['id_user'];        

if (isset($_GET['mio'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

        $Nuevodrvs=new drvs($_GET['mio']);// instancio la clase identificacion pasandole el nro de identificacion, de esta forma lo busca
        $deriva=$Nuevodrvs->getderiva();
        $otro=$Nuevodrvs->getotro();
        $id_exp=$Nuevodrvs->getid_exp();
        $id_drv=$Nuevodrvs->getid_drv();
    }
    ?>

    <div id="cuerpo">
        <?php 
        if(is_numeric($id_exp)&&is_numeric($id_drv)) 
            {$value='Modificar';} 
        else
            {$value='Agregar';}
        ?> 
        <form method="POST" action="evaluacion_trabajo.php?Id=<?php print $id_exp ?>" autocomplete="off"> 
            <input type="hidden" name="id_exp" id="id_exp" value="<?php print $id_exp ?>">
            <input type="hidden" name="id_drv" value="<?php print $id_drv ?>">
            <input type="hidden" name="id_user" value="<?php print $id_user ?>">
            <br></br>

            <table>
            <tr>
            <th class="selector-deriva" style="text-align: center;">
                <label for="Derivaciones">Derivaciones</label>
            <select name="deriva" id="deriva"  style="text-align-last: center;
   text-align: center;
   -ms-text-align-last: center;
   -moz-text-align-last: center;" onchange="drvscheck()"></select>
   <input type="text" style="display: none;width: 50%;" class="ph-center texto" name="otro" id="otro" placeholder="¿Cual?" disabled>
        </th>
         <td colspan="3" id="boton"><input type="submit" name="submitare" id="submitguardara" value ="<?php echo $value ?>" disabled tabindex="8"></td>
            </tr>
            </table>

         

        </form>
    </div>

    <?php

if (isset($_POST['submitare'])&&!is_numeric($_POST['id_drv'])) // si presiono el boton drvsresar
{   
    $Nuevodrvs=new drvs();
    $Nuevodrvs->setid_drv($_POST['id_drv']);
    $Nuevodrvs->setotro(strtoupper($_POST['otro']));
    $Nuevodrvs->setderiva($_POST['deriva']);
    $Nuevodrvs->setid_exp($_POST['id_exp']); 
    print  $Nuevodrvs->insertdrvs($_POST['deriva'],$_POST['otro']); // inserta y muestra el resultado


}
?>

<?php
if (isset($_POST['submitare'])&&is_numeric($_POST['id_exp'])&&is_numeric($_POST['id_drv'])) // si presiono el boton y es modificar
{
    $Nuevodrvs=new drvs ();
    $Nuevodrvs->setid_drv($_POST['id_drv']); 
    $Nuevodrvs->setotro(strtoupper($_POST['otro']));
    $Nuevodrvs->setderiva($_POST['deriva']);
    $Nuevodrvs->setid_exp($_POST['id_exp']); 
    print  $Nuevodrvs->updatedrvs ();// inserta y muestra el resultado
}

if (isset($_GET['braIds'])&&is_numeric($_GET['braIds'])) // si presiono el boton y es eliminar
{
    $Nuevodrvs=new drvs ();
    print  $Nuevodrvs->deletedrvs($_GET['Id'],$_GET['braIds']);
}

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
    $Nuevodrvs=new drvs ();
    print  $Nuevodrvs->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
}

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
    $Nuevodrvs=new drvs ();
    print  $Nuevodrvs->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
}
?>
<?php 
new Conexion();
$id_exp_1 =$_GET['Id'];
$query="select * from derivacion where id_exp = '$id_exp_1'"; 
$result = pg_query($query); 
if(pg_num_rows($result)>'0'){
    $conti="1";
  }//fin de la fila del if
  else
  {
    $conti="2";
}
?>
<?php
 print '<br>';
if($conti=='1'){
    $Nuevodrvs=new drvs();
$Nuevodrvs= $Nuevodrvs->getdrvs($_GET['Id']); // obtiene todos las salidas para despues mostrarlas
print '<div id="grilla"><h3 style="text-align: center;">Derivaciones Asignadas</h3> <br/><br/><table style="width:50%" border=1 >'
.'<th>Derivaciones</th>                      

';

    while ($row= pg_fetch_array($Nuevodrvs)) // recorre los identificaciones uno por uno hasta el fin de la tabla
    {include './ifderiva.php';
        print '<tr>'

        .'<td>'.$des.'</td>'
         
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


<!-- finalizacion-->
<?php
if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
    $id_fin=""; 
    $final="";
    $id_exp=$_GET['Id'];
    $id_user=$_SESSION['id_user'];        

if (isset($_GET['mios'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

        $Nuevofinite=new finite($_GET['mios']);// instancio la clase identificacion pasandole el nro de identificacion, de esta forma lo busca
        $final=$Nuevofinite->getfinal();
        $id_exp=$Nuevofinite->getid_exp();
        $id_fin=$Nuevofinite->getid_fin();
    }
    ?>

    <?php 
new Conexion();
$id_expe =$_GET['Id'];
$quero="select * from fin where id_exp = '$id_expe'";
$resultas = pg_query($quero); 
if(pg_num_rows($resultas)>'0'){
    $sasa="none";
    $contis=1;
  }//fin de la fila del if
  else
  {
    $sasa="";
     $contis=2;
}
?>

    <div id="cuerpo" style="display:<?php print $sasa ?>">
        <?php 
        if(is_numeric($id_exp)&&is_numeric($id_fin)) 
            {$value='Modificar';} 
        else
            {$value='Aceptar';}
        ?> 
        <form method="POST" action="evaluacion_trabajo.php?Id=<?php print $id_exp ?>" autocomplete="off"> 
            <input type="hidden" name="id_exp" id="id_exp" value="<?php print $id_exp ?>">
            <input type="hidden" name="id_fin" value="<?php print $id_fin ?>">
            <input type="hidden" name="id_user" value="<?php print $id_user ?>">
            <br></br>

            <table>
            <tr height="40">
            <th>
            <input type="checkbox" id="final" name="final" value="1" >
            <label for="male">Finalizar Expediente</label><br>
            </th>
         <td colspan="3" id="boton"><input type="submit" name="submitares" id="submitguardaras" value ="<?php echo $value ?>" disabled tabindex="8"></td>
            </tr>
            </table>

         

        </form>
    </div>

    <?php

if (isset($_POST['submitares'])&&!is_numeric($_POST['id_fin'])) // si presiono el boton finiteresar
{   
    $Nuevofinite=new finite();
    $Nuevofinite->setid_fin($_POST['id_fin']);
    $Nuevofinite->setId_Usuario($_POST['id_user']);
    $Nuevofinite->setfinal($_POST['final']);
    $Nuevofinite->setid_exp($_POST['id_exp']); 
    print  $Nuevofinite->insertfinite($_POST['final']); // inserta y muestra el resultado


}
?>

<?php
if (isset($_POST['submitares'])&&is_numeric($_POST['id_exp'])&&is_numeric($_POST['id_fin'])) // si presiono el boton y es modificar
{
    $Nuevofinite=new finite ();
    $Nuevofinite->setid_fin($_POST['id_fin']); 
    $Nuevofinite->setfinal($_POST['final']);
    $Nuevofinite->setid_exp($_POST['id_exp']); 
    print  $Nuevofinite->updatefinite ();// inserta y muestra el resultado
}

if (isset($_GET['braIdsa'])&&is_numeric($_GET['braIdsa'])) // si presiono el boton y es eliminar
{
    $Nuevofinite=new finite ();
    print  $Nuevofinite->deletefinite($_GET['Id'],$_GET['braIdsa']);
}

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
    $Nuevofinite=new finite ();
    print  $Nuevofinite->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
}

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
    $Nuevofinite=new finite ();
    print  $Nuevofinite->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
}
?>
<?php 
new Conexion();
$id_expe =$_GET['Id'];
$quero="select * from fin where id_exp = '$id_expe'";
$resultas = pg_query($quero); 
if(pg_num_rows($resultas)>'0'){
    if($sasa==""){
    $contis="1";
    $sasa="none";
    echo "<meta http-equiv='refresh' content='1.5'>";
    }

  }//fin de la fila del if
  else
  {
    if($sasa=="none"){
    $contis="2";
    $sasa="";
    echo "<meta http-equiv='refresh' content='1.5'>";
}
}

?>
<?php
 print '<br>';
if($contis=='1'){
    $Nuevofinite=new finite();
$Nuevofinite= $Nuevofinite->getfinite($_GET['Id']); // obtiene todos las salidas para despues mostrarlas
print '<div id="grilla"><h3 style="text-align: center;">Expediente Terminado</h3> <br/><br/><table style="width:20%" border=1  >';

    while ($row= pg_fetch_array($Nuevofinite)) // recorre los identificaciones uno por uno hasta el fin de la tabla
    {
        print '<tr>'

        
         .'<td bgcolor="#FF0000"><a style="color:#F7F7F7;" href="javascript:;" onclick= avisoo1("evaluacion_trabajo.php?Id='.$row['id_exp'].'&braIdsa='.$row['id_fin'].'");>Habilitar</a></td>' 
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

var str2 = "evaluacion_trabajos.php?Id=";
window.location = str2.concat(product);

}
  function drvscheck()
  {
    var deriva = document.getElementById('deriva');
    var otro = document.getElementById('otro');
    

     if(deriva.value == 8){
      otro.style.display="block";
      otro.style.margin="auto";
      otro.focus();
      
  }
  else
  {     
        otro.style.display="none";
        otro.style.margin="auto";
  }

  }
//-->
</script>
</body>
</html>
