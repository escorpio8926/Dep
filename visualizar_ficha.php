<?php
include 'cabecera.php';
include 'menu.php';
include 'classFicha.php';
include 'foot.php';

if(isset($_SESSION['nick']) and isset($_SESSION['habil'])){
    $id_exp="";
    $fecha_ei="";
     $entre="";
    $dni="";
    $apellido="";
    $nombre="";
    $calle="";
    $nro="";
    $piso="";
    $dpto="";
    $barrio="";
    $localidad="";
    $provincia="";
    $t_ali="";
    $p_ali="";
    $meren="";    
    $meren_co="";
    $padron="";
    $telcon="";
    $muni="";
    $muni1="";
    $muni2="";
    $muni3="";
    $encuestador="";
    $id_user=$_SESSION['id_user'];

if (isset($_GET['mdId'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{

        $NuevaFicha=new Ficha($_GET['mdId']);  // instancio la clase identificacion pasandole el nro de identificacion, de esta forma lo busca
        $id_exp=$NuevaFicha->getid_exp();
        $fecha_ei=$NuevaFicha->getfecha_ei(); // setea los datos
        $entre=$NuevaFicha->getentre();
        $dni=$NuevaFicha->getDni();
        $apellido=$NuevaFicha->getApellido();
        $nombre=$NuevaFicha->getNombre();
        $calle=$NuevaFicha->getcalle();
        $nro=$NuevaFicha->getnro();
        $piso=$NuevaFicha->getpiso();
        $dpto=$NuevaFicha->getdpto();
        $barrio=$NuevaFicha->getbarrio();
        $localidad=$NuevaFicha->getlocalidad();
        $provincia=$NuevaFicha->getprovincia();
        $t_ali=$NuevaFicha->gett_ali();
        $p_ali=$NuevaFicha->getp_ali();
        $meren=$NuevaFicha->getmeren();
        $meren_co=$NuevaFicha->getmeren_co();
        $muni=$NuevaFicha->getmuni();
        $muni1=$NuevaFicha->getmuni1();
        $muni2=$NuevaFicha->getmuni2();
        $muni3=$NuevaFicha->getmuni3();
        $padron=$NuevaFicha->getpadron();
        $telcon=$NuevaFicha->gettelcon();
        $encuestador=$NuevaFicha->getencuestador();
        $id_user=$NuevaFicha->getId_Usuario();
    }
    ?>

    <div id="cuerpo" >
        <?php
        if(is_numeric($id_exp))
            {$value='Modificar';
        $s="readonly";
        $disas="";
    }
    else
        {$value='Guardar';
    $disas="hidden";
    $s="";

}
?>
<form method="POST" action="nueva_ficha.php" autocomplete="off">

    <input type="hidden" name="id_exp" value="<?php print $id_exp ?>">
    <input type="hidden" name="id_user" value="<?php print $id_user ?>">
    <br></br>
    <table style="width: 65%">

        <th colspan="3" style="border-bottom-style: solid;"><h3>FORMULARIO DE ALTA</h3></th>

    </tr>
    <tr>
        <th></th>

        <th style="text-align: :justify">Número de Expediente <input type="number" id="nro_exp" name="nro_exp" class="numero" min="1" max="99999" align="right" value = "<?php print $id_exp ?>" tabindex="1" id="nro_exp" <?php print $s ?> onkeypress="return check(event,value)" oninput="checkLength1()" readonly ></th>
    </tr>
    <tr>
        <th></th>
        <th style="text-align: :justify">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Fecha&nbsp;&nbsp; <input type="date" name="fecha_ei" id="fecha_ei" value = "<?php print $fecha_ei ?>" oninput="dip()" onkeydown="return tab_btn(event,getElementById('fecha_ei'),getElementById('apellido'),getElementById('dni'))" class="fecha" tabindex="1" required disabled></th>
    </tr>
     <tr>
        <th></th>
        <th style="text-align: :justify">  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Entrevista&nbsp;&nbsp; <input type="text" maxlength="1" name="entre" id="entre" class="oby" value = "<?php print $entre ?>" oninput="dipis()" onkeydown="return tab_btn(event,getElementById('entre'),getElementById('apellido'),getElementById('dni'))"   readonly ></th>
    </tr>
    <tr><th><p> </p></th></tr>
    <tr>
        <th colspan="2" style="border-top-style: solid;border-bottom-style: solid;"><h3>TITULAR DEL PROGRAMA(preferentemente jefe/a de hogar)</h3></th>
    </tr>
    <tr><th><p> </p></th></tr>
    <tr>

        <th colspan="1"  style="text-align: center;">
            D.N.I.: <input type="number" style="width:30%" class="dni" min="500000" max="99999999" name="dni" id="dni"  value = "<?php print $dni ?>" tabindex="2" onkeypress="return check(event,value)" oninput="checkLength2()" <?php print $s ?> readonly>
        </th>

    </tr>
    <tr>
       <th colspan="2" style="text-align: center;text-indent: 3.0%">
           Apellido: <input type="text" style="width: 70.2%" class="texto" maxlength="40" name="apellido" id="apellido"  value = "<?php print $apellido ?>" oninput="checkLengthq()" onkeydown="return tab_btn1(event,getElementById('apellido'),getElementById('nombre'))" tabindex="3" readonly>
        </th>

    </tr>
    <tr>
         <th colspan="2"  style="text-align: center;text-indent: 3.5%">
        Nombre: <input type="text" class="texto" style="width: 70.5%" maxlength="40" name="nombre" id="nombre"  value = "<?php print $nombre ?>" oninput="checkLengthw()" onkeydown="return tab_btn1(event,getElementById('nombre'),getElementById('calle'))" tabindex="4" readonly>
        </th>

    </tr>

    <tr><th><p> </p></th></tr>
    <tr>
        <th colspan="2" style="border-top-style: solid;border-bottom-style: solid;"><h3>DOMICILIO</h3></th>
    </tr>
    <tr><th><p> </p></th></tr>
    <tr>

        <th colspan="1"  style="text-align: right;">
            Calle:<input type="text" class="texto" style="width: 60%" name="calle" id="calle"  value = "<?php print $calle ?>" tabindex="5" oninput="checkLengthe()" onkeydown="return tab_btn1(event,getElementById('calle'),getElementById('nro'))" readonly>
        </th>
        <th colspan="1"  style="text-align: justify;">
           &nbsp;&nbsp; Nro:&nbsp; <input type="text" class="entero" style="width: 50%"  maxlength="10" name="nro" id="nro"  value = "<?php print $nro ?>" tabindex="6"  onkeydown="return tab_btn2(event,getElementById('nro'),getElementById('barrio'),getElementById('piso'))" readonly>
        </th>

    </tr>
    <tr><th><p> </p></th></tr>
    <tr>

        <th class="cantidad" colspan="1"  style="text-align: right;">
            Piso:<input type="text" class="numero" style="width: 60%"  name="piso" id="piso" class="cantidad" value="<?php print $piso ?>" tabindex="7" onkeydown="return tab_btn11(event,getElementById('piso'),getElementById('dpto'))" readonly>
        </th>
        <th colspan="1"  style="text-align: justify;">
            &nbsp;&nbsp;Dpto: <input type="text" class="texto" style="width: 50%"  name="dpto" id="dpto"  value ="<?php print $dpto ?>" onkeydown="return tab_btn1(event,getElementById('dpto'),getElementById('barrio'))" tabindex="8" readonly>
        </th>

    </tr>
    <tr><th><p> </p></th></tr>
    <tr>
        <th colspan="2"  style="text-align: center; ">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Barrio:<input type="text" class="texto" style="width: 69%;" maxlength="40" name="barrio" id="barrio"  value = "<?php print $barrio ?>" tabindex="9" oninput="checkLengthr()" onkeydown="return tab_btnb(event,getElementById('barrio'),getElementById('localidad'))" readonly>
        </th>

    </tr>

    <tr>
        <th colspan="2"  style="text-align: center;">
           &nbsp;Localidad:<input type="text" class="texto" style="width: 69.4%" maxlength="40" name="localidad" id="localidad" oninput="checkLengtht()" onkeydown="return tab_btn1(event,getElementById('localidad'),getElementById('provincia'))"  value ="<?php print $localidad ?>" tabindex="10" readonly>
        </th>

    </tr>

    <tr>
        <th colspan="2"  style="text-align: center;">
            &nbsp;&nbsp;Provincia:<input type="text" class="texto" style="width: 69.3%" maxlength="40" name="provincia" id="provincia" oninput="checkLengthy()" onkeydown="return tab_btn1(event,getElementById('provincia'),getElementById('padron'))"  value = "<?php print $provincia ?>" tabindex="11" readonly>
        </th>

    </tr>
   <tr>

        <th colspan="1"  style="text-align: right;">
        N° padrón catastral:<input type="text" class="entero" maxlength="6" minlength="6"
             style="width: 43%" name="padron" id="padron" value ="<?php print $padron ?>" tabindex="12" onkeydown="return tab_btn11(event,getElementById('padron'),getElementById('telcon'))" readonly >
        </th>
        <th colspan="1"  style="text-align: left;">
           &nbsp;&nbsp;Teléfono de contacto: <input type="text" class="entero" maxlength="10" placeholder="Ej. 3815484027" style="width: 30.7%"  name="telcon" id="telcon"  value = "<?php print $telcon ?>" tabindex="13" onkeypress="return check(event,value)"  onkeydown="return tab_btn11(event,getElementById('telcon'),getElementById('t_ali'))" readonly>
        </th>

    </tr>
    <tr><th><p> </p></th></tr>
    <tr>
        <th colspan="2" style="border-top-style: solid;border-bottom-style: solid;"><h3>PROGRAMAS ALIMENTARIOS</h3></th>
    </tr>
    <tr><th><p> </p></th></tr>
    <tr>
        <th colspan="2">
            <b> ¿Algún integrante de este hogar recibe tarjeta alimentaria?</b>
            <input type="number"  value="<?php print $t_ali ?>" name="t_ali" class="sin" id="t_ali" min="1" max="2" style="width:13%" placeholder="SI(1) NO(2)"  onkeypress="return check(event,value)" oninput="checkLength4()" onkeydown="return tab_btn1(event,getElementById('t_ali'),getElementById('p_ali'))" tabindex="14" required readonly>

        </th> 
    </tr>
    <tr>
        <th colspan="2"  style="text-align: center;">
            <b>¿Algún integrante de este hogar recibe otro programa alimentario?</b>
            <input type="number" value="<?php print $p_ali ?>" name="p_ali" class="sin" id="p_ali" min="1" max="2" style="width:13%" placeholder="SI(1) NO(2)" onkeypress="return check(event,value)" oninput="checkLength5()" onkeydown="return tab_btn1(event,getElementById('p_ali'),getElementById('meren'))" tabindex="15" required readonly>


        </th> 
    </tr>
    <tr>
        <th colspan="2"  style="text-align: center;">
            <b> ¿Algún integrante de este hogar asiste a un comedor o merendero comunitario? </b>
            <input type="number" name="meren" value="<?php print $meren ?>" class="sin" id="meren" min="1" max="2" style="width:13%" placeholder="SI(1) NO(2)"onkeypress="return check(event,value)" oninput="checkLength6()" onkeydown="return tab_btn3(event,getElementById('meren'),getElementById('meren_co'),getElementById('muni'))" tabindex="16" required  readonly><br>
            <input type="text" style="display:none;" class="texto" name="meren_co" id="meren_co" value="<?php print $meren_co ?>" tabindex="17" placeholder="¿Cuál?" onkeydown="return tab_btn1(event,getElementById('meren_co'),getElementById('muni'))">
        </th> 
    </tr>

    <tr><th><p> </p></th></tr>
    <tr>
        <th colspan="2" style="border-top-style: solid;border-bottom-style: solid;"><h3>PROGRAMAS MUNICIPALES</h3></th>
    </tr>

    <tr>
        <th colspan="2"  style="text-align: center;">
            <b>¿Algún integrante de este hogar recibe el programa Taficeñitos?</b>
            <input type="number" value="<?php print $muni ?>" name="muni" class="sin" id="muni" min="1" max="2" style="width:13%" placeholder="SI(1) NO(2)"  onkeypress="return check(event,value)" oninput="checkLength7()" onkeydown="return tab_btn1(event,getElementById('muni'),getElementById('muni1'))" tabindex="18" required readonly><br>
        </th> 
    </tr>
    
        <tr>
        <th colspan="2"  style="text-align: center;">
            <b>¿Algún integrante de este hogar recibe el programa Vivir Mejor?</b>
            <input type="number" value="<?php print $muni1 ?>" name="muni1" class="sin" id="muni1" min="1" max="2" style="width:13%" placeholder="SI(1) NO(2)"  onkeypress="return check(event,value)" oninput="checkLength7a()" onkeydown="return tab_btn1(event,getElementById('muni1'),getElementById('muni2'))" tabindex="19" required readonly><br>
        </th> 
    </tr>
        <tr>
        <th colspan="2"  style="text-align: center;">
            <b>¿Algún integrante de este hogar recibe el programa Inclusión Social con Ingresos?</b>
            <input type="number" value="<?php print $muni2 ?>" name="muni2" class="sin" id="muni2" min="1" max="2" style="width:13%" placeholder="SI(1) NO(2)"  onkeypress="return check(event,value)" oninput="checkLength7b()" onkeydown="return tab_btn1(event,getElementById('muni2'),getElementById('muni3'))" tabindex="20" required readonly><br>
        </th> 
    </tr>
        <tr>
        <th colspan="2"  style="text-align: center;">
            <b>¿Algún integrante de este hogar recibe el programa Acompañamiento integral al adulto mayor?</b>
            <input type="number" value="<?php print $muni3 ?>" name="muni3" class="sin" id="muni3" min="1" max="2" style="width:13%" placeholder="SI(1) NO(2)"  onkeypress="return check(event,value)" oninput="checkLength7c()" onkeydown="return tab_btn1(event,getElementById('muni3'),getElementById('encuestador'))" tabindex="21" required readonly><br>
        </th> 
    </tr>


  <tr><th><p> </p></th></tr>
    <tr>
        <th colspan="2" style="border-top-style: solid;border-bottom-style: solid;"><h3>RELEVADOR DE DATOS</h3></th>
    </tr>
    <tr><th><p> </p></th></tr>
        <tr>
        <th colspan="2"  style="text-align: center;">
            <b>Apellido y nombre</b>
           <input type="text" style="width:50%"  class="texto" name="encuestador" id="encuestador" value="<?php print $encuestador ?>" tabindex="22" onkeypress="return check(event,value)" oninput="checkLength7d()" onkeydown="return tab_btn1(event,getElementById('encuestador'),getElementById('submitguardar'))" required readonly>


        </th> 
    </tr>

    <tr><th><p> </p></th></tr>
    <tr>
        
        <td colspan="2" id="boton">
             <input type="button" onclick="redirect1()" style="width:13%;margin-left:0%;" value="Cancelar" <?php print $disas ?>>
             <input type="submit" style="text-align:center;width:13% " name="submit" id="submitguardar" value ="<?php echo $value ?>" tabindex="23" readonly disabled></td>
    </tr>

</table>
</form>
</div>

<!--
<br>
<form action="nueva_ficha.php" method="GET" class="form_search">
    <input type="text" name="busqueda" id="busqueda" style="width:
    150px">
    <input type="submit" value="Buscar" class="btn_search" style="width: 75px; height: 20px; font-weight: bold;" >
</form> 



<div id="metodo_busqueda" class="search_method"> 
    <?php  // metodo de busqueda
    if(isset($_GET['busqueda'])){
    if ($_SESSION['habil']>1) {     // nivel de permiso 2 o mayor
    $busqueda =$_GET['busqueda'];    //paso el parametro busqueda
    if (empty($busqueda))             // si busqueda esta vacia
    {echo "<strong> <p>Ingrese Apellido/DNI/Numero de Ficha</p></strong>";}
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
                <th colspan=7></th>';

    if($resultados['t_ali']==1 || $resultados['p_ali']==1 || $resultados['meren']==1 || $resultados['muni']==1  ){
        print '<tr>'
        .'<td  height="40">'.$resultados['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($resultados['fecha_ei'])) .'</td>'
        .'<td>'.$resultados['apellido'].', '.$resultados['nombre'].'</td>'
        .'<td>'.$resultados['dni'].'</td>'
        .'<td colspan="3"><a href="nueva_ficha.php?mdId='.$resultados['id_exp'].'">Modificar Caratula</a></td>'
        .'<td colspan="4    "><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$resultados['id_exp'].'","'.$resultados['id_exp'].'");>Eliminar Ficha</a></td>'

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
            $query1="SELECT * from ficha_pea_titular where
            dni = '$busqueda' OR
            id_exp = '$busqueda'
            AND  id_usuario = '$s'
            ";
        }
        else{
                       // si el dato no es numerico
            $busqueda=strtoupper($busqueda);
            $query1="SELECT * from ficha_pea_titular where apellido
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
                <th colspan=7></th>';

              if($resultados['t_ali']==1 || $resultados['p_ali']==1 || $resultados['meren']==1 || $resultados['muni']==1  ){
        print '<tr>'
        .'<td  height="40">'.$resultados['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($resultados['fecha_ei'])) .'</td>'
        .'<td>'.$resultados['apellido'].', '.$resultados['nombre'].'</td>'
        .'<td>'.$resultados['dni'].'</td>'
        .'<td colspan="3"><a href="nueva_ficha.php?mdId='.$resultados['id_exp'].'">Modificar Caratula</a></td>'
        .'<td colspan="4    "><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$resultados['id_exp'].'","'.$resultados['id_exp'].'");>Eliminar Ficha</a></td>'

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
}// si las busqueda esta vacia termina ISSET

?>
</div> fin del div de busqueda -->




<?php
if (isset($_POST['submit'])&&!is_numeric($_POST['id_exp'])) // si presiono el boton ingresar
{
    $NuevaFicha=new Ficha();
    $NuevaFicha->setid_exp($_POST['nro_exp']);
    $NuevaFicha->setfecha_ei($_POST['fecha_ei']); // setea los datos
    $NuevaFicha->setentre($_POST['entre']);
    $NuevaFicha->setDni($_POST['dni']);
    $NuevaFicha->setApellido(strtoupper($_POST['apellido']));
    $NuevaFicha->setNombre(strtoupper($_POST['nombre']));
    $NuevaFicha->setcalle(strtoupper($_POST['calle']));
    $NuevaFicha->setnro($_POST['nro']);
    $NuevaFicha->setpiso($_POST['piso']);
    $NuevaFicha->setdpto(strtoupper($_POST['dpto']));
    $NuevaFicha->setbarrio(strtoupper($_POST['barrio']));
    $NuevaFicha->setlocalidad(strtoupper($_POST['localidad']));
    $NuevaFicha->setprovincia(strtoupper($_POST['provincia']));
    $NuevaFicha->sett_ali($_POST['t_ali']);
    $NuevaFicha->setp_ali($_POST['p_ali']);
    $NuevaFicha->setmeren($_POST['meren']);
    $NuevaFicha->setmeren_co(strtoupper($_POST['meren_co']));
    $NuevaFicha->setmuni($_POST['muni']);
    $NuevaFicha->setmuni1($_POST['muni1']);
    $NuevaFicha->setmuni2($_POST['muni2']);
    $NuevaFicha->setmuni3($_POST['muni3']);
    $NuevaFicha->setpadron($_POST['padron']);
    $NuevaFicha->settelcon($_POST['telcon']);
    $NuevaFicha->setencuestador(strtoupper($_POST['encuestador']));
    $NuevaFicha->setId_Usuario($_POST['id_user']);
    print $NuevaFicha->insertFicha(); // inserta y muestra el resultado
}
if (isset($_POST['submit'])&&is_numeric($_POST['id_exp'])) // si presiono el boton y es modificar
{
    $NuevaFicha=new Ficha($_POST['id_exp']);  // instancio la clase pasandole el nro de identificacion para cargar los datos
    $NuevaFicha=new Ficha();
    $NuevaFicha->setid_exp($_POST['nro_exp']);
    $NuevaFicha->setfecha_ei($_POST['fecha_ei']); // setea los datos
    $NuevaFicha->setentre($_POST['entre']);
    $NuevaFicha->setDni($_POST['dni']);
    $NuevaFicha->setApellido(strtoupper($_POST['apellido']));
    $NuevaFicha->setNombre(strtoupper($_POST['nombre']));
    $NuevaFicha->setcalle(strtoupper($_POST['calle']));
    $NuevaFicha->setnro($_POST['nro']);
    $NuevaFicha->setpiso($_POST['piso']);
    $NuevaFicha->setdpto(strtoupper($_POST['dpto']));
    $NuevaFicha->setbarrio(strtoupper($_POST['barrio']));
    $NuevaFicha->setlocalidad(strtoupper($_POST['localidad']));
    $NuevaFicha->setprovincia(strtoupper($_POST['provincia']));
    $NuevaFicha->sett_ali($_POST['t_ali']);
    $NuevaFicha->setp_ali($_POST['p_ali']);
    $NuevaFicha->setmeren($_POST['meren']);
    $NuevaFicha->setmeren_co(strtoupper($_POST['meren_co']));
    $NuevaFicha->setmuni($_POST['muni']);
    $NuevaFicha->setmuni1($_POST['muni1']);
    $NuevaFicha->setmuni2($_POST['muni2']);
    $NuevaFicha->setmuni3($_POST['muni3']);
    $NuevaFicha->setpadron($_POST['padron']);
    $NuevaFicha->settelcon($_POST['telcon']);
    $NuevaFicha->setencuestador(strtoupper($_POST['encuestador']));
    $NuevaFicha->setId_Usuario($_POST['id_user']);
    print  $NuevaFicha->updateFicha(); // inserta y muestra el resultado
}

if (isset($_GET['brId'])&&is_numeric($_GET['brId'])) // si presiono el boton y es eliminar
{
    $NuevaFicha=new Ficha();
    print  $NuevaFicha->deleteFicha($_GET['brId']); // elimina el identificacion y muestra el resultado
}

if (isset($_GET['frId'])&&is_numeric($_GET['frId'])) // si presiono el boton y es cerrar
{
    $NuevaFicha=new Ficha();
    print  $NuevaFicha->FinalizarFicha($_GET['frId']); // finaliza la salida y muestra el resultado
}

if (isset($_GET['crId'])&&is_numeric($_GET['crId'])) // si presiono el boton y es cerrar
{
    $NuevaFicha=new Ficha();
    print  $NuevaFicha->CerrarFicha($_GET['crId']); // cierra la salida y muestra el resultado
}
    new Conexion();
        $identi=$_SESSION['id_user'];
    $consulta="select * from ficha_exp where id_usuario=$identi"; 
    $resultadox = pg_query($consulta); 
    $f=pg_num_rows($resultadox);
    if($f>0 || $_SESSION['habil']>=3){ 

$NuevaFicha=new Ficha();
$NuevaFicha= $NuevaFicha->getFicha($_SESSION['id_user'],$_SESSION['habil']); // obtiene todos las salidas para despues mostrarlas
if($_SESSION['habil']>1){
    print '<div  id="grilla"> <br/><br/><table style="display:<?php print $van ?>"  border=1 ">'
    .'<th height="50">Nº Expediente</th>
    <th>Fecha</th>
    <th>Apellido y Nombre</th>
    <th>D.N.I.</th>
    <th  colspan=7></th>';


while ($row=  pg_fetch_array($NuevaFicha)) // recorre los identificaciones uno por uno hasta el fin de la tabla
{
new Conexion();
  $controlarfin=$row['id_exp'];
  $query="select final from fin  where id_exp = $controlarfin"; 
  $result = pg_query($query);
  $dato=pg_num_rows($result);

    if($dato!=1){
    if($row['t_ali']==1 || $row['p_ali']==1 || $row['meren']==1 || $row['muni']==1  ){
        print '<tr>'
        .'<td  height="40">'.$row['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($row['fecha_ei'])) .'</td>'
        .'<td>'.$row['apellido'].', '.$row['nombre'].'</td>'
        .'<td>'.$row['dni'].'</td>'
        .'<td colspan="6"><a href="visualizar_ficha.php?mdId='.$row['id_exp'].'">Visualizar Caratula</a></td>'
     
        .'</tr>';

//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'
        
    }

    if($row['t_ali']==2 && $row['p_ali']==2 &&$row['meren']==2 && $row['muni']==2  ){
        print '<tr>'
        .'<td height="40">'.$row['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($row['fecha_ei'])) .'</td>'
        .'<td>'.$row['apellido'].', '.$row['nombre'].'</td>'
        .'<td>'.$row['dni'].'</td>'
        .'<td><a href="visualizar_ficha.php?mdId='.$row['id_exp'].'">Visualizar Caratula</a></td>'
        .'<td><a href="hogar_y_viviendas.php?Id='.$row['id_exp'].'">Características del Hogar y Vivienda</a></td>'
        .'<td><a href="grupo_hogares.php?Id='.$row['id_exp'].'">Características de los Miembros del Hogar</a></td>'
        .'<td><a href="ingresosv.php?Id='.$row['id_exp'].'">Ingresos del Hogar</a></td>'
        .'<td><a href="sit_mayores.php?Id='.$row['id_exp'].'">Situación Laboral mayores de 14 años</a></td>'
        .'<td><a href="evaluacion_trabajos.php?Id='.$row['id_exp'].'">Evaluación del Caso y Plan de Trabajo</a></td>'
   
//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }
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
    <th  colspan=7></th>';

while ($row=  pg_fetch_array($NuevaFicha)) // recorre los identificaciones uno por uno hasta el fin de la tabla
{
  new Conexion();
  $controlarfin=$row['id_exp'];
  $query="select final from fin  where id_exp = $controlarfin"; 
  $result = pg_query($query);
  $dato=pg_num_rows($result);

    if($dato!=1){
    if($row['t_ali']==1 || $row['p_ali']==1 || $row['meren']==1 || $row['muni']==1  ){
        print '<tr>'
        .'<td  height="40">'.$row['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($row['fecha_ei'])) .'</td>'
        .'<td>'.$row['apellido'].', '.$row['nombre'].'</td>'
        .'<td>'.$row['dni'].'</td>'
        .'<td colspan="3"><a href="visualizar_ficha.php?mdId='.$row['id_exp'].'">Modificar Caratula</a></td>'
        .'<td colspan="4    "><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$row['id_exp'].'","'.$row['id_exp'].'");>Eliminar Ficha</a></td>'

//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }

    if($row['t_ali']==2 && $row['p_ali']==2 &&$row['meren']==2 && $row['muni']==2  ){
        print '<tr>'
        .'<td height="40">'.$row['id_exp'].'</td>'
        .'<td>'.strftime("%d-%m-%Y", strtotime($row['fecha_ei'])) .'</td>'
        .'<td>'.$row['apellido'].', '.$row['nombre'].'</td>'
        .'<td>'.$row['dni'].'</td>'
        .'<td><a href="visualizar_ficha.php?mdId='.$row['id_exp'].'">Modificar Caratula</a></td>'
        .'<td><a href="hogar_y_viviendas.php?Id='.$row['id_exp'].'">Características del Hogar y Vivienda</a></td>'
        .'<td><a href="grupo_hogares.php?Id='.$row['id_exp'].'">Características de los Miembros del Hogar</a></td>'
        .'<td><a href="ingresosv.php?Id='.$row['id_exp'].'">Ingresos del Hogar</a></td>'
        .'<td><a href="sit_mayores.php?Id='.$row['id_exp'].'">Situación Laboral mayores de 14 años</a></td>'
        .'<td><a href="evaluacion_trabajos.php?Id='.$row['id_exp'].'">Evaluación del Caso y Plan de Trabajo</a></td>'
        .'<td><a href="javascript:;" onclick= avisoi("nueva_ficha.php?brId='.$row['id_exp'].'","'.$row['id_exp'].'");>Eliminar Ficha</a></td>'
//                  .'<td><a href="javascript:;" onclick= avisoj("Salida_Mes.php?crId='.$row['id_salida_mes'].'","'.$row['mes'].'");>Cerrar Salida</a></td>'
        .'</tr>';
    }
   } 
}
print '</table>';
print '</div>';
print '<br>';
print '<br>';
print '<br>';

}
}
else
{print '<br>';
print '<br>';
print '<br>';}
}   
else
{
    print '<img src="./imagenes/accesoDenegado.png" style=" position: absolute; top: 40%; left: 44%;">';
}
?>
<script type="text/javascript">
    function checkLength1()
    {
        var fieldLength = document.getElementById('nro_exp').value.length;
        var fieldLength1 = document.getElementById('nro_exp').value;
        var paso = document.getElementById('fecha_ei');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
          paso.value='00-00-0000'; 
        }
 
    if(fieldLength <= 5 ){
      return true;
  }
  else
  {
      var str = document.getElementById('nro_exp').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('nro_exp').value = str;
  }
}
function checkLength2()
{
    var fieldLength = document.getElementById('dni').value.length;
    
        var fieldLength1 = document.getElementById('dni').value;
        var paso = document.getElementById('apellido');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
          
        }

    if(fieldLength <= 8 ){
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
    var fieldLength = document.getElementById('nro').value.length;

        var fieldLength1 = document.getElementById('nro').value;
        var paso = document.getElementById('barrio');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
            
        }

    if(fieldLength <= 5 ){
      return true;
  }
  else
  {
      var str = document.getElementById('nro').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('nro').value = str;
  }
}
function checkLength4()
{
    var fieldLength = document.getElementById('t_ali').value.length;
    
    var fieldLength1 = document.getElementById('t_ali').value;
    var paso = document.getElementById('p_ali');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
            
        }

    if(fieldLength <= 1 ){
      return true;
  }
  else
  {
      var str = document.getElementById('t_ali').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('t_ali').value = str;
  }
}
function checkLength5()
{
    var fieldLength = document.getElementById('p_ali').value.length;
    
        var fieldLength1 = document.getElementById('p_ali').value;
        var paso = document.getElementById('meren');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
            
        }

    if(fieldLength <= 1 ){
      return true;
  }
  else
  {
      var str = document.getElementById('p_ali').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('p_ali').value = str;
  }
}
function checkLength6()
{
    var fieldLength = document.getElementById('meren').value.length;
    
        var fieldLength1 = document.getElementById('meren').value;
        var paso = document.getElementById('muni');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
            
        }

    var meren = document.getElementById('meren');
    var meren_co = document.getElementById('meren_co');
    if(meren.value == '1'){
      meren_co.style.display="block";
      meren_co.style.width="50%";
      meren_co.style.margin="auto";
  
  }
  else
  {
      meren_co.style.display="none";
      meren_co.value="";
  }

    if(fieldLength <= 1 ){
      return true;
  }
  else
  {
      var str = document.getElementById('meren').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('meren').value = str;
  }
}
function checkLength7()
{
    var fieldLength = document.getElementById('muni').value.length;
    
        var fieldLength1 = document.getElementById('muni').value;
        var paso = document.getElementById('muni1');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
        }

    if(fieldLength <= 1 ){
      return true;
  }
  else
  {
      var str = document.getElementById('muni').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('muni').value = str;
  }
}
function checkLength7a()
{
    var fieldLength = document.getElementById('muni1').value.length;
    
        var fieldLength1 = document.getElementById('muni1').value;
        var paso = document.getElementById('muni2');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
        }

    if(fieldLength <= 1 ){
      return true;
  }
  else
  {
      var str = document.getElementById('muni1').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('muni1').value = str;
  }
}
function checkLength7b()
{
    var fieldLength = document.getElementById('muni2').value.length;
    
        var fieldLength1 = document.getElementById('muni2').value;
        var paso = document.getElementById('muni3');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
        }

    if(fieldLength <= 1 ){
      return true;
  }
  else
  {
      var str = document.getElementById('muni2').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('muni2').value = str;
  }
}
function checkLength7c()
{
    var fieldLength = document.getElementById('muni3').value.length;
    
        var fieldLength1 = document.getElementById('muni3').value;
        var paso = document.getElementById('encuestador');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
        }

    if(fieldLength <= 1 ){
      return true;
  }
  else
  {
      var str = document.getElementById('muni3').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('muni3').value = str;
  }
}
function checkLength7d()
{
    var fieldLength = document.getElementById('encuestador').value.length;
    
        var fieldLength1 = document.getElementById('encuestador').value;
        var paso = document.getElementById('submitguardar');

        if(fieldLength >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
        }

    if(fieldLength <= 120 ){
      return true;
  }
  else
  {
      var str = document.getElementById('encuestador').value;
      str = str.substring(0, str.length - 1);
      document.getElementById('encuestador').value = str;
  }
}
 function dip()
  {
    
    var dni = document.getElementById('dni');
    var fecha_ei = document.getElementById('fecha_ei');

     if(fecha_ei.value > '0000-00-00')
     {dni.disabled=false;}
  else
     {dni.disabled=true;}
   
}

function checkLengthq()
{   
        var fieldLength1 = document.getElementById('apellido').value.length;
        var paso = document.getElementById('nombre');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
            
        }
}
function checkLengthw()
{   
        var fieldLength1 = document.getElementById('nombre').value.length;
        var paso = document.getElementById('calle');
        var paso1 = document.getElementById('piso');
        var paso2 = document.getElementById('dpto');
        var paso3 = document.getElementById('barrio');
        

        if(fieldLength1 >= 1){
            paso.disabled=false;
            paso1.disabled=false;
            paso2.disabled=false;
            paso3.disabled=false;
        }
        else
        {
          paso.disabled=true;
           paso1.disabled=true;
            paso2.disabled=true;
            paso3.disabled=true;
            
        }
}
function checkLengthe()
{   
        var fieldLength1 = document.getElementById('calle').value.length;
        var paso = document.getElementById('nro');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
            
        }
}
function checkLengthr()
{   
        var fieldLength1 = document.getElementById('barrio').value.length;
        var paso = document.getElementById('localidad');

        if(fieldLength1 >= 0){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
            
        }
}
function checkLengtht()
{   
        var fieldLength1 = document.getElementById('localidad').value.length;
        var paso = document.getElementById('provincia');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
            
        }
}
function checkLengthy()
{   
        var fieldLength1 = document.getElementById('provincia').value.length;
        var paso = document.getElementById('padron');
        var paso1 = document.getElementById('telcon');
        var paso2 = document.getElementById('t_ali');
        

        if(fieldLength1 >= 1){
            paso.disabled=false;
            paso1.disabled=false;
            paso2.disabled=false;
        }
        else
        {
          paso.disabled=true;
           paso1.disabled=true;
            paso2.disabled=true;
            
        }
}
function checkLengthye()
{   
        var fieldLength1 = document.getElementById('padron').value.length;
        var paso = document.getElementById('telcon');

        if(fieldLength1 >= 1){
            paso.disabled=false;
        }
        else
        {
          paso.disabled=true;
            
        }
}



 function ponleFocus1(){

 document.getElementById("nro_exp");

 nro_exp.disabled=false;
  nro_exp.focus();
  aux=nro_exp.value;
  nro_exp.value="";
  nro_exp.value=aux;
}
 function ponleFocus2(){
 document.getElementById("fecha_ei");

 fecha_ei.disabled=false;
 fecha_ei.focus();
  aux=fecha_ei.value;
  fecha_ei.value="";
  fecha_ei.value=aux;
}




 function tab_btn(event,q1,q2,q3)
{
  var x1=q1;
  var x2=q2;
  var x3=q3;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value >= '0000-00-00' && x3.value.length >= 1  ) 
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

  function tab_btn1(event,q1,q2)
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
    function tab_btn11(event,q1,q2)
{
  var x1=q1;
  var x2=q2;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value.length >= 0 ) 
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

    function tab_btn2(event,q1,q2,q3)
{
  var x1=q1;
  var x2=q2;
  var x3=q3;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value.length >= 0 ) 
  {
  x3.disabled=false; 
  x2.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;
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
  if (t == 9 && x1.value==1 ) 
  { 
  x2.style.display="block";
  x2.style.width="50%";
  x2.style.margin="auto";
  x2.disabled=false;
  x2.focus();
  aux=x2.value;
  x2.value="";
  x2.value=aux;
  return false;
  }
    if (t == 9 && x1.value==2 ) 
  { 
  x3.disabled=false;
  x3.focus();
  aux=x3.value;
  x3.value="";
  x3.value=aux;
  x2.value="";
  x2.disabled=false;
  x2.style.display="none";
  return false;
  } 

return true;

  }
    function tab_btnb(event,q1,q2)
{
  var x1=q1;
  var x2=q2;

  var t = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
  if (t == 9 && x1.value.length >= 0 ) 
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
function redirect1(q1) {
const queryString = window.location.search;
console.log(queryString);
const urlParams = new URLSearchParams(queryString);
const product = urlParams.get('Id');
console.log(product);

var str2 = "visualizar_ficha.php?Id=";
window.location = str2.concat(product);

}
//-->
</script>

</body>

</html>