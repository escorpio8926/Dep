<?php
include 'cabecera.php';
include 'menu.php';
include 'classusuario.php';
include 'foot.php';

if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
    $usuario="";
    $password="";
    $rol="";
    $nombre="";
    $apellido="";
    $id_usuario="";
    $id_user=$_SESSION['id_user'];

if (isset($_GET['mdId'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

        $NuevoUsuario=new usuarios($_GET['mdId']);  // instancio la clase identificacion pasandole el nro de identificacion, de esta forma lo busca
        
        $usuario=$NuevoUsuario->getusuario();
        $password=$NuevoUsuario->getpassword(); // setea los datos
        $rol=$NuevoUsuario->getrol();
        $nombre=$NuevoUsuario->getnombre();
        $apellido=$NuevoUsuario->getapellido();
        $id_usuario=$NuevoUsuario->getid_usuario();
        $id_user=$NuevoUsuario->getid_user();
        
  
    }
    ?>

    <div id="cuerpo" >
        <?php
          
   if(isset($_GET['mdId']))
    {$value='Modificar';
    $disas="hidden";
    $s="disabled";
$a="readonly";}else
    {$value='Guardar';
    $disas="hidden";
    $s="";
$a="";
}



?>
<form method="POST" action="gestionusuario.php" autocomplete="off">

     <input type="hidden" name="id_user" value="<?php print $id_user?>">
    <input type="hidden" name="id_usuario" value="<?php print $id_usuario?>">
    <br></br>
    <table style="width: 30%" >

        <th colspan="3" style="border-bottom-style: solid;"><h3>Gestión de Usuarios</h3></th>
           <tr>
         <th style="text-align: :justify">Nombre <input type="text" id="nombre" name="nombre" align="right" minlength="1" maxlength="35" value = "<?php print $nombre ?>" tabindex="1" style="width:40%" required ></th>

    </tr>
       <tr>
         <th style="text-align: :justify">Apellido <input type="text" id="apellido" name="apellido" align="right" minlength="1" maxlength="35" value = "<?php print $apellido ?>" tabindex="2" style="width:40%" required ></th>

    </tr>
    <tr>
         <th style="text-align: :justify">Usuario <input type="text" id="usuario" name="usuario" align="right" minlength="1" maxlength="35" value = "<?php print $usuario ?>" tabindex="3" style="width:40%" required <?php print $a ?>></th>

    </tr>

     <tr>
         <th style="text-align: :justify">&nbsp;&nbsp;Clave &nbsp;&nbsp;<input type="Password" id="password" name="password"  minlength="1" maxlength="20" align="right" style="width:40%" value = "<?php print $password ?>" tabindex="4" id="nro_exp" required></th>
    </tr>
     <tr>
         <th style="text-align: :justify">
            <label for="rol">ROL</label>

<select name="rol" id="rol" <?php print $s ?> >
  <option value="3" >Admnistrador</option>
  <option value="1">Data enter</option>
  <option value="4">Informes</option>
</select>
        </th>
    </tr>

    <tr>
        
        <td colspan="2" id="boton">
             <input type="button" onclick="redirect1()" style="width:13%;margin-left:0%;" value="Cancelar" <?php print $disas ?>>
             <input type="submit" style="text-align:center;width:20% " name="submit" id="submitguardar" value ="<?php echo $value ?>" tabindex="24"></td>
    </tr>

   </table>
   </form>
   </div>



<?php

          

if (isset($_POST['submit']) && !is_numeric($_POST['id_usuario'])) // si presiono el boton ingresar
{
    $NuevoUsuario=new usuarios();
    $NuevoUsuario->setusuario($_POST['usuario']);
    $NuevoUsuario->setpassword($_POST['password']); // setea los datos
    $NuevoUsuario->setrol($_POST['rol']);
    $NuevoUsuario->setnombre($_POST['nombre']);
    $NuevoUsuario->setapellido($_POST['apellido']);
    $NuevoUsuario->setid_user($_POST['id_user']);
   

    print $NuevoUsuario->insertusuarios(); // inserta y muestra el resultado
}
if (isset($_POST['submit']) && is_numeric($_POST['id_usuario'])) // si presiono el boton y es modificar
{
      
    $NuevoUsuario=new usuarios();
    $NuevoUsuario->setusuario($_POST['usuario']);
    $NuevoUsuario->setpassword($_POST['password']); // setea los datos
    $NuevoUsuario->setnombre($_POST['nombre']);
    $NuevoUsuario->setapellido($_POST['apellido']);
    $NuevoUsuario->setid_user($_POST['id_user']);
    $NuevoUsuario->setid_usuario($_POST['id_usuario']);

    print  $NuevoUsuario->updateusuarios(); // inserta y muestra el resultado
}

if (isset($_GET['brId'])&&is_numeric($_GET['brId'])) // si presiono el boton y es eliminar
{
    $NuevoUsuario=new usuarios();
    print  $NuevoUsuario->deleteusuarios($_GET['brId']); // elimina el identificacion y muestra el resultado
}

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
    $NuevoUsuario=new Ficha();
    print  $NuevoUsuario->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
}

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
    $NuevoUsuario=new Ficha();
    print  $NuevoUsuario->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
}

    new Conexion();
    $identi=$_SESSION['id_user'];
    $consulta="select * from usuarios where id_usuario=$identi"; 
    $resultadox = pg_query($consulta); 
    $f=pg_num_rows($resultadox);
    if($f>0 || $_SESSION['habil']==3){ 

$NuevoUsuario=new usuarios();
$NuevoUsuario= $NuevoUsuario->getusuarios($_SESSION['id_user'],$_SESSION['habil']); // obtiene todos las salidas para despues mostrarlas

    print '<div  id="grilla"> <br/><br/><table style="display:<?php print $van ?>; width:70%"  border=1 ">'
    .'<th style="width:50%">Apellido y Nombre</th>
    <th style="width:15%">Usuario</th>


    
      <th>Cargado por</th>
        <th height="30">Id Usuario</th>
  
<th>Rol</th>
    <th  colspan=2></th>';

while ($row=pg_fetch_array($NuevoUsuario)) // recorre los identificaciones uno por uno hasta el fin de la tabla
{
include './ifusuario.php';

    
        print '<tr>'
        .'<td  height="40">'.$row['apellido'].', '.$row['nombre'].'</td>'
          .'<td>'.$row['username'].'</td>'
       
        .'<td>'.$row['id_user'].'</td>'
        .'<td>'.$row['id_usuario'].'</td>'
       
        .'<td>'.$wik.'</td>'
        .'<td colspan="1"><a href="gestionusuario.php?mdId='.$row['id_usuario'].'">Modificar Usuario</a></td>'
        .'<td colspan="1"><a href="javascript:;" onclick= avisoifract("gestionusuario.php?brId='.$row['id_usuario'].'","'.$row['id_usuario'].'");>Eliminar Usuario</a></td>'

//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    

   
   
}



print '</table>';
print '</div>';
print '<br>';
print '<br>';
print '<br>';
print '<br>';


}
 
}  
else
{
    print '<img src="./imagenes/accesoDenegado.png" style=" position: absolute; top: 40%; left: 44%;">';
}
?>

<script>

 function ponleFocus1(){

 document.getElementById("nombre");


  nombre.focus();
  aux=nombre.value;
  nombre.value="";
  nombre.value=aux;
}


ponleFocus1();

</script>
</body>

</html>