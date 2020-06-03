<?php
include 'cabecera.php';
include 'menu.php';
include 'classFicha.php';
include 'foot.php';
?>
<br>

<form action="Listado.php" method="GET" class="form_search">
    <input type="text" name="busqueda" id="busqueda" style="width:
    15%;margin-left: 37.5%">
    <input type="submit" value="Buscar" class="btn_search" style="width: 10%; height: 20px; font-weight: bold;" >
</form> 

<div id="metodo_busqueda" class="search_method"> <!-- comienzo del div de busqueda -->
    <?php  // metodo de busqueda
    if(isset($_GET['busqueda'])){
    if ($_SESSION['habil']>1) {     // nivel de permiso 2 o mayor
    $busqueda =$_GET['busqueda'];    //paso el parametro busqueda
    if (empty($busqueda))             // si busqueda esta vacia
    {echo "<strong> <p>Ingrese Apellido/DNI/Numero de Expediente</p></strong>";}
    else{
        new conexion();
        if(is_numeric($busqueda)){               //si el dato ingresado es numerico
            $query="SELECT * from ficha_exp where (
            dni = '$busqueda' OR
            id_exp = '$busqueda'
        )";
    }
    else{                                           // si el dato no es numerico
        $busqueda=strtoupper($busqueda);
        $query="SELECT * from ficha_exp where apellido LIKE '%$busqueda%'
        ";}
   $i=0;     
$result = pg_query($query); //Resultado del IF
if($total = pg_num_rows($result)){
    print '<u><h2 align="center">Resultados de la busqueda</h2></u>';

        while ($resultados = pg_fetch_array($result)) { //Recorrido de la fichas
            $NuevaFicha=new Ficha();
            $NuevaFicha= $NuevaFicha->getFicha($_SESSION['id_user'],$_SESSION['habil']);

            if($_SESSION['habil']>1){
                print '<div id="grilla"> <br/><br/><table border=1>'
                .'<th>Nro Expediente</th>
                <th>Fecha Alta</th>
                <th>Apellido y Nombre</th>
                <th>D.N.I.</th>
                <th colspan=8></th>';

 $controlarfina=$resultados['id_exp'];
  $query="select final from fin  where id_exp = $controlarfina"; 
  $resulta = pg_query($query);
  $dato=pg_num_rows($resulta);

   $war='</b>';
    if($dato==1){
    $color="FINALIZADO";}
    else{$color="ACTIVO";}

    if ( $color == 'ACTIVO' )
    $fal ='<b style="color: green">'; // You can replace with class=""
else if ( $color == 'FINALIZADO' )
    $fal ='<b style="color: red;">'; // You can replace with class=""
 

    if($resultados['t_ali']==1 || $resultados['p_ali']==1 || $resultados['meren']==1 || $resultados['muni']==1  ){
        print '<tr>'
        .'<td  height="40">'.$resultados['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($resultados['fecha_ei'])) .'</td>'
        .'<td>'.$resultados['apellido'].', '.$resultados['nombre'].'</td>'
        .'<td>'.$resultados['dni'].'</td>'
        .'<td colspan="3"><a href="nueva_ficha.php?mdId='.$resultados['id_exp'].'">Modificar Caratula</a></td>'
        .'<td colspan="4    "><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$resultados['id_exp'].'","'.$resultados['id_exp'].'");>Eliminar Ficha</a></td>'
        .'<td colspan=2><b>'.'INACTIVO'.'</b></td>'

//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$resultados['id_salida_mes'].'","'.$resultados['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }

        if($resultados['t_ali']==2 && $resultados['p_ali']==2 &&$resultados['meren']==2 && $resultados['muni']==2  ){
        print '<tr>'
        .'<td height="40">'.$resultados['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($resultados['fecha_ei'])) .'</td>'
        .'<td>'.$resultados['apellido'].', '.$resultados['nombre'].'</td>'
        .'<td>'.$resultados['dni'].'</td>'
        .'<td><a href="nueva_ficha.php?mdId='.$resultados['id_exp'].'">Modificar Caratula</a></td>'
        .'<td><a href="hogar_y_vivienda.php?Id='.$resultados['id_exp'].'">Características del Hogar y Vivienda</a></td>'
        .'<td><a href="grupo_hogar.php?Id='.$resultados['id_exp'].'">Características de los Miembros del Hogar</a></td>'
        .'<td><a href="ingresos.php?Id='.$resultados['id_exp'].'">Ingresos del Hogar</a></td>'
        .'<td><a href="sit_mayor.php?Id='.$resultados['id_exp'].'">Situación Laboral mayores de 14 años</a></td>'
        .'<td><a href="evaluacion_trabajo.php?Id='.$resultados['id_exp'].'">Evaluación del Caso y Plan de Trabajo</a></td>'
        .'<td><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$resultados['id_exp'].'","'.$resultados['id_exp'].'");>Eliminar Ficha</a></td>'
        .'<td>'.$fal.$color.$war.'</td>'
//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$resultados['id_salida_mes'].'","'.$resultados['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }

                print '</table>';
                print '</div>';

            }

        }
        print '<h2 align="center">______________________________________________________________________________________________________________</h2>';
    }
}
}
else{ // si es usuario nivel de permiso 1
         $s=$_SESSION['id_user']; // paso el parametro de usuario
     $busqueda =$_GET['busqueda'];    //paso el parametro busqueda
    if (empty($busqueda))             // si busqueda esta vacia
    {echo "Ingrese Apellido/DNI/Numero de Ficha";}
    else{
       new conexion();
        if(is_numeric($busqueda)){             //si el dato ingresado es numerico
            $query1="SELECT * from ficha_exp where
            dni = '$busqueda' OR
            id_exp = '$busqueda'
            AND  id_usuario = '$s'
            ";
        }
        else{
                       // si el dato no es numerico
            $busqueda=strtoupper($busqueda);
            $query1="SELECT * from ficha_exp where apellido
            LIKE '%$busqueda%' AND  id_usuario = '$s'" ;
        }


$result1 = pg_query($query1); //Resultado del IF
if($total1 = pg_num_rows($result1)){
    print '<u><h2 align="center">Resultados de la busqueda</h2></u>';

        while ($resultados1 = pg_fetch_array($result1)) { //Recorrido de la fichas
            $NuevaFicha=new Ficha();
            $NuevaFicha= $NuevaFicha->getFicha($_SESSION['id_user'],$_SESSION['habil']);

            if($_SESSION['habil']==1){
                  print '<div id="grilla"> <br/><br/><table border=1>'
                .'<th>Nro Expediente</th>
                <th>Fecha Alta</th>
                <th>Apellido y Nombre</th>
                <th>D.N.I.</th>
                <th colspan=8></th>';

 $controlarfinas=$resultados1['id_exp'];
  $query="select final from fin  where id_exp = $controlarfinas"; 
  $resulta = pg_query($query);
  $dato=pg_num_rows($resulta);

   $war='</b>';
    if($dato==1){
    $color="FINALIZADO";}
    else{$color="ACTIVO";}

    if ( $color == 'ACTIVO' )
    $fal ='<b style="color: green">'; // You can replace with class=""
else if ( $color == 'FINALIZADO' )
    $fal ='<b style="color: red;">'; // You can replace with class=""
 

    if($resultados1['t_ali']==1 || $resultados1['p_ali']==1 || $resultados1['meren']==1 || $resultados1['muni']==1  ){
        print '<tr>'
        .'<td  height="40">'.$resultados1['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($resultados1['fecha_ei'])) .'</td>'
        .'<td>'.$resultados1['apellido'].', '.$resultados1['nombre'].'</td>'
        .'<td>'.$resultados1['dni'].'</td>'
        .'<td colspan="3"><a href="nueva_ficha.php?mdId='.$resultados1['id_exp'].'">Modificar Caratula</a></td>'
        .'<td colspan="4    "><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$resultados1['id_exp'].'","'.$resultados1['id_exp'].'");>Eliminar Ficha</a></td>'
        .'<td colspan=2><b>'.'INACTIVO'.'</b></td>'

//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$resultados1['id_salida_mes'].'","'.$resultados1['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }

        if($resultados1['t_ali']==2 && $resultados1['p_ali']==2 &&$resultados1['meren']==2 && $resultados1['muni']==2  ){
        print '<tr>'
        .'<td height="40">'.$resultados1['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($resultados1['fecha_ei'])) .'</td>'
        .'<td>'.$resultados1['apellido'].', '.$resultados1['nombre'].'</td>'
        .'<td>'.$resultados1['dni'].'</td>'
        .'<td><a href="nueva_ficha.php?mdId='.$resultados1['id_exp'].'">Modificar Caratula</a></td>'
        .'<td><a href="hogar_y_vivienda.php?Id='.$resultados1['id_exp'].'">Características del Hogar y Vivienda</a></td>'
        .'<td><a href="grupo_hogar.php?Id='.$resultados1['id_exp'].'">Características de los Miembros del Hogar</a></td>'
        .'<td><a href="ingresos.php?Id='.$resultados1['id_exp'].'">Ingresos del Hogar</a></td>'
        .'<td><a href="sit_mayor.php?Id='.$resultados1['id_exp'].'">Situación Laboral mayores de 14 años</a></td>'
        .'<td><a href="evaluacion_trabajo.php?Id='.$resultados1['id_exp'].'">Evaluación del Caso y Plan de Trabajo</a></td>'
        .'<td><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$resultados1['id_exp'].'","'.$resultados1['id_exp'].'");>Eliminar Ficha</a></td>'
        .'<td>'.$fal.$color.$war.'</td>'
//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$resultados1['id_salida_mes'].'","'.$resultados1['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }

                print '</table>';
                print '</div>';

            }

        }
        print '<h2 align="center">______________________________________________________________________________________________________________</h2>';

    }
}


    }
}// si las busqueda esta vacia termina ISSET

?>
</div> <!-- fin del div de busqueda -->

<?php
$NuevaFicha=new Ficha();
$NuevaFicha= $NuevaFicha->getFicha($_SESSION['id_user'],$_SESSION['habil']); // obtiene todos las salidas para despues mostrarlas
  new Conexion();
    $identi=$_SESSION['id_user'];
    $consulta="select * from ficha_exp where id_usuario=$identi"; 
    $resultadox = pg_query($consulta); 
    $f=pg_num_rows($resultadox);
  
    if($f>0 || $_SESSION['habil']==3){ 
if($_SESSION['habil']>1){
    print '<div  id="grilla"> <br/><br/><table border=1 ">'
    .'<th height="50">Nº Expediente</th>
    <th>Fecha</th>
    <th>Apellido y Nombre</th>
    <th>D.N.I.</th>
    <th colspan=8></th>

    ';
    


while ($row=pg_fetch_array($NuevaFicha)) // recorre los identificaciones uno por uno hasta el fin de la tabla
{
  new Conexion();
  $controlarfin=$row['id_exp'];
  $query="select final from fin  where id_exp = $controlarfin"; 
  $result = pg_query($query);
  $dato=pg_num_rows($result);

  $war='</b>';
    if($dato==1){
    $color="FINALIZADO";}
    else{$color="ACTIVO";}




    if($row['t_ali']==1 || $row['p_ali']==1 || $row['meren']==1 || $row['muni']==1  ){
        print '<tr>'
        .'<td  height="40">'.$row['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($row['fecha_ei'])) .'</td>'
        .'<td>'.$row['apellido'].', '.$row['nombre'].'</td>'
        .'<td>'.$row['dni'].'</td>'
        .'<td colspan="3"><a href="nueva_ficha.php?mdId='.$row['id_exp'].'">Modificar Caratula</a></td>'
        .'<td colspan="4    "><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$row['id_exp'].'","'.$row['id_exp'].'");>Eliminar Ficha</a></td>'
        .'<td colspan=2><b>'.'INACTIVO'.'</b></td>'
    

//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }



if ( $color == 'ACTIVO' )
    $fal ='<b style="color: green">'; // You can replace with class=""
else if ( $color == 'FINALIZADO' )
    $fal ='<b style="color: red;">'; // You can replace with class=""


    if($row['t_ali']==2 && $row['p_ali']==2 &&$row['meren']==2 && $row['muni']==2  ){
        print '<tr>'
        .'<td height="40">'.$row['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($row['fecha_ei'])) .'</td>'
        .'<td>'.$row['apellido'].', '.$row['nombre'].'</td>'
        .'<td>'.$row['dni'].'</td>'
         .'<td><a href="nueva_ficha.php?mdId='.$row['id_exp'].'">Modificar Caratula</a></td>'
        .'<td><a href="hogar_y_vivienda.php?Id='.$row['id_exp'].'">Características del Hogar y Vivienda</a></td>'
        .'<td><a href="grupo_hogar.php?Id='.$row['id_exp'].'">Características de los Miembros del Hogar</a></td>'
        .'<td><a href="ingresos.php?Id='.$row['id_exp'].'">Ingresos del Hogar</a></td>'
        .'<td><a href="sit_mayor.php?Id='.$row['id_exp'].'">Situación Laboral mayores de 14 años</a></td>'
        .'<td><a href="evaluacion_trabajo.php?Id='.$row['id_exp'].'">Evaluación del Caso y Plan de Trabajo</a></td>'
        .'<td><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$row['id_exp'].'","'.$row['id_exp'].'");>Eliminar Ficha</a></td>'
        .'<td>'.$fal.$color.$war.'</td>'
        
       

//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }
    
   
}
print '</table>';
print '</div>';
print '<br>';
print '<br>';
print '<br>';
print '<br>';
}
else
{
     print '<div  id="grilla"> <br/><br/><table border=1 ">'
    .'<th height="50">Nº Expediente</th>
    <th>Fecha</th>
    <th>Apellido y Nombre</th>
    <th>D.N.I.</th>
    <th colspan=8></th>

    ';
    


while ($row=pg_fetch_array($NuevaFicha)) // recorre los identificaciones uno por uno hasta el fin de la tabla
{
  new Conexion();
  $controlarfin=$row['id_exp'];
  $query="select final from fin  where id_exp = $controlarfin"; 
  $result = pg_query($query);
  $dato=pg_num_rows($result);

  $war='</b>';
    if($dato==1){
    $color="FINALIZADO";}
    else{$color="ACTIVO";}




    if($row['t_ali']==1 || $row['p_ali']==1 || $row['meren']==1 || $row['muni']==1  ){
        print '<tr>'
        .'<td  height="40">'.$row['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($row['fecha_ei'])) .'</td>'
        .'<td>'.$row['apellido'].', '.$row['nombre'].'</td>'
        .'<td>'.$row['dni'].'</td>'
        .'<td colspan="3"><a href="nueva_ficha.php?mdId='.$row['id_exp'].'">Modificar Caratula</a></td>'
        .'<td colspan="4    "><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$row['id_exp'].'","'.$row['id_exp'].'");>Eliminar Ficha</a></td>'
        .'<td colspan=2><b>'.'INACTIVO'.'</b></td>'
    

//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }



if ( $color == 'ACTIVO' )
    $fal ='<b style="color: green">'; // You can replace with class=""
else if ( $color == 'FINALIZADO' )
    $fal ='<b style="color: red;">'; // You can replace with class=""


    if($row['t_ali']==2 && $row['p_ali']==2 &&$row['meren']==2 && $row['muni']==2  ){
        print '<tr>'
        .'<td height="40">'.$row['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($row['fecha_ei'])) .'</td>'
        .'<td>'.$row['apellido'].', '.$row['nombre'].'</td>'
        .'<td>'.$row['dni'].'</td>'
         .'<td><a href="nueva_ficha.php?mdId='.$row['id_exp'].'">Modificar Caratula</a></td>'
        .'<td><a href="hogar_y_vivienda.php?Id='.$row['id_exp'].'">Características del Hogar y Vivienda</a></td>'
        .'<td><a href="grupo_hogar.php?Id='.$row['id_exp'].'">Características de los Miembros del Hogar</a></td>'
        .'<td><a href="ingresos.php?Id='.$row['id_exp'].'">Ingresos del Hogar</a></td>'
        .'<td><a href="sit_mayor.php?Id='.$row['id_exp'].'">Situación Laboral mayores de 14 años</a></td>'
        .'<td><a href="evaluacion_trabajo.php?Id='.$row['id_exp'].'">Evaluación del Caso y Plan de Trabajo</a></td>'
        .'<td><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$row['id_exp'].'","'.$row['id_exp'].'");>Eliminar Ficha</a></td>'
        .'<td>'.$fal.$color.$war.'</td>'
        
       

//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }
    
   
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
{print '<br>';
print '<br>';
print '<br>';}
//else
//{
  //  print '<img src="./imagenes/accesoDenegado.png" style=" position: absolute; top: 40%; left: 44%;">';
//}
?>
