<?php
header('Content-Type: application/vdn.ms-excel');
header('Content-Disposition: attachment; filename=reporte.xls');

require('../librerias/ExcelLibrary/PHPExcel.php');
require('../classconect.php');


$f1=$_GET['fecha_alta1'];
$f2=$_GET['fecha_alta2'];


$excel = new PHPExcel();

$excel->getProperties()->setCreator('Emmanuel')->setLastModifiedBy('Emmanuel')->setTitle('Reporte PEA');


$pagina= $excel->getActiveSheet();

$pagina->setTitle('Fichas');

$pagina->mergeCells('A1:X1');
$pagina->setCellValue('A1','CARATULA');
   $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );

$pagina->getStyle("A1")->applyFromArray($style);
$pagina->getStyle("A1")->getFont()->setBold(true);
$pagina->getStyle("A1")->getFont()->setSize(12);

$pagina->mergeCells('Y1:AT1');
$pagina->setCellValue('Y1','CARACTERÍSTICAS DEL HOGAR Y LA VIVIENDA');
$pagina->getStyle("Y1")->applyFromArray($style);
$pagina->getStyle("Y1")->getFont()->setBold(true);
$pagina->getStyle("Y1")->getFont()->setSize(12);


new Conect();

$query1="SELECT f.* from ficha_exp f 
where fecha_ei between '$f1' and '$f2' order by id_exp ASC";

$export = pg_query($query1);
$fields = pg_num_rows( $export );

if($fields >= 1){

	while($row = pg_fetch_array($export)) {	

	$fichas[] = $row;

	$pagina->setCellValue('A2','ID EXPEDIENTE');
	$pagina->setCellValue('B2','FECHA DE ALTA');
	$pagina->setCellValue('C2','ENTREVISTA');
	$pagina->setCellValue('D2','DNI');
	$pagina->setCellValue('E2','APELLIDO');
	$pagina->setCellValue('F2','NOMBRE ');
	$pagina->setCellValue('G2','CALLE');
	$pagina->setCellValue('H2','NUMERO ');
	$pagina->setCellValue('I2','PISO');
	$pagina->setCellValue('J2','DEPARTAMENTO ');
	$pagina->setCellValue('K2','BARRIO');
	$pagina->setCellValue('L2','LOCALIDAD');
	$pagina->setCellValue('M2','PROVINCIA');
	$pagina->setCellValue('N2','N° PADRÓN CATASTRAL');
	$pagina->setCellValue('O2','TELÉFONO DE CONTACTO');
	$pagina->setCellValue('P2','TARJETA ALIMENTARIA');
	$pagina->setCellValue('Q2','PROGRAMA ALIMENTARIO');
	$pagina->setCellValue('R2','ASISTENCIA A COMEDOR O MERENDERO COMUNITARIO');
	$pagina->setCellValue('S2','¿CUAL?');
	$pagina->setCellValue('T2','PROGRAMA TAFICEÑITOS');
	$pagina->setCellValue('U2','PROGRAMA VIVIR MEJOR');
	$pagina->setCellValue('V2','PROGRAMA INCLUSIÓN SOCIAL CON INGRESOS');
	$pagina->setCellValue('W2','PROGRAMA ACOMPAÑAMIENTO INTEGRAL AL ADULTO MAYOR');
	$pagina->setCellValue('X2','RELEVADOR DE DATOS');
	
	$pagina->setCellValue('Y2','¿CUÁL ES EL MATERIAL PREDOMINANTE EN LOS PISOS?');
	$pagina->setCellValue('Z2','CUÁL ES EL MATERIAL PREDOMINANTE DE LAS PAREDES EXTERIORES');
	$pagina->setCellValue('AA2','LAS PAREDES EXTERIORES ¿TIENEN REVESTIMIENTO EXTERNO O REVOQUE?');
	$pagina->setCellValue('AB2','¿CUÁL ES EL MATERIAL PREDOMINANTE DE LA CUBIERTA EXTERIOR DEL TECHO?');
	$pagina->setCellValue('AC2','EL TECHO ¿TIENEN REVESTIMIENTO INTERIOR O CIELORRASO?');
	$pagina->setCellValue('AD2','¿TIENE AGUA...');
	$pagina->setCellValue('AE2','EL AGUA QUE USA ESTE HOGAR PARA BEBER Y COCINAR, ¿PROVIENE...');
	$pagina->setCellValue('AF2','ESTE HOGAR ¿TIENE BAÑO O LETRINA..');
	$pagina->setCellValue('AG2','EL BAÑO ¿TIENE...');
	$pagina->setCellValue('AH2','EL DESAGUE DEL INODORO ¿ES...');
	$pagina->setCellValue('AI2','EL BAÑO O LETRINA ¿ES...');
	$pagina->setCellValue('AJ2','ESTE HOGAR ¿TIENE UN LUGAR O CUARTO PARA COCINAR..');
	$pagina->setCellValue('AK2','PARA COCINAR, ¿UTILIZA PRINCIPALMENTE…');
	$pagina->setCellValue('AL2','ESTE HOGAR ¿TIENE AGUA CALIENTE A TRAVÉS DE…');
	$pagina->setCellValue('AM2','EN TOTAL, ¿CUÁNTOS AMBIENTES, HABITACIONES O PIEZAS TIENE ESTE HOGAR (SIN CONTAR BAÑOS NI COCINAS)?');
	$pagina->setCellValue('AN2','DE ESOS, ¿CUÁNTOS USAN HABITUALMENTE PARA DORMIR?');
	$pagina->setCellValue('AO2','DE ESOS, ¿CUÁNTOS USAN HABITUALMENTE PARA DORMIR?');
	$pagina->setCellValue('AP2','SITUACIÓN DOMINIAL DE LA VIVIENDA');
	$pagina->setCellValue('AQ2','EXPEDIENTE TRÁMITE DOMINIAL. NRO:');
	$pagina->setCellValue('AR2','OTRO (ESPECIFICAR)');
	$pagina->setCellValue('AS2','EN SU VIVIENDA, ¿TIENE MEDIDOR DE ENERGÍA ELÉCTRICA?');
	$pagina->setCellValue('AT2','A LOS RESIDUOS DEL HOGAR LOS…');


	for ($i=0; $i <count($fichas); $i++) {

		$pagina->setCellValue('A'.($i+3),$fichas[$i]['id_exp']);
		$pagina->setCellValue('B'.($i+3),$fichas[$i]['fecha_ei']);
		$pagina->setCellValue('C'.($i+3),$fichas[$i]['entre']);
		$pagina->setCellValue('D'.($i+3),$fichas[$i]['dni']);
		$pagina->setCellValue('E'.($i+3),$fichas[$i]['apellido']);
		$pagina->setCellValue('F'.($i+3),$fichas[$i]['nombre']);
		$pagina->setCellValue('G'.($i+3),$fichas[$i]['calle']);
		$pagina->setCellValue('H'.($i+3),$fichas[$i]['nro']);
		$pagina->setCellValue('I'.($i+3),$fichas[$i]['piso']);
		$pagina->setCellValue('J'.($i+3),$fichas[$i]['dpto']);
		$pagina->setCellValue('K'.($i+3),$fichas[$i]['barrio']);
		$pagina->setCellValue('L'.($i+3),$fichas[$i]['localidad']);
		$pagina->setCellValue('M'.($i+3),$fichas[$i]['provincia']);
		$pagina->setCellValue('N'.($i+3),$fichas[$i]['padron']);
		$pagina->setCellValue('O'.($i+3),$fichas[$i]['telcon']);
		$pagina->setCellValue('P'.($i+3),$fichas[$i]['t_ali']);
		$pagina->setCellValue('Q'.($i+3),$fichas[$i]['p_ali']);
		$pagina->setCellValue('R'.($i+3),$fichas[$i]['meren']);
		$pagina->setCellValue('S'.($i+3),$fichas[$i]['meren_co']);
		$pagina->setCellValue('T'.($i+3),$fichas[$i]['muni']);
		$pagina->setCellValue('U'.($i+3),$fichas[$i]['muni1']);
		$pagina->setCellValue('V'.($i+3),$fichas[$i]['muni2']);
		$pagina->setCellValue('W'.($i+3),$fichas[$i]['muni3']);
		$pagina->setCellValue('X'.($i+3),$fichas[$i]['encuestador']);

		$control[$i]=$fichas[$i]['id_exp'];


}//foreach inicial
}//while inicial


for ($i=0; $i < $fields; $i++) { 
	 
	  	$controler=$control[$i];
	  	$query2="SELECT c.* from carac_hv c
		where id_exp=$controler ";
		$exportar = pg_query($query2);
		$fieldshv = pg_num_rows( $exportar );


		while($ros = pg_fetch_array($exportar)) {	

		$fico[] = $ros;
    	for ($z=0; $z <count($fico); $z++) {
    	
		$pagina->setCellValue('Y'.($i+3),$fico[$z]['p1']);
		$pagina->setCellValue('Z'.($i+3),$fico[$z]['p2']);
		$pagina->setCellValue('AA'.($i+3),$fico[$z]['p3']);
		$pagina->setCellValue('AB'.($i+3),$fico[$z]['p4']);
		$pagina->setCellValue('AC'.($i+3),$fico[$z]['p5']);
		$pagina->setCellValue('AD'.($i+3),$fico[$z]['p6']);
		$pagina->setCellValue('AE'.($i+3),$fico[$z]['p7']);
		$pagina->setCellValue('AF'.($i+3),$fico[$z]['p8']);
		$pagina->setCellValue('AG'.($i+3),$fico[$z]['p9']);
		$pagina->setCellValue('AH'.($i+3),$fico[$z]['p10']);
		$pagina->setCellValue('AI'.($i+3),$fico[$z]['p11']);
		$pagina->setCellValue('AJ'.($i+3),$fico[$z]['p12']);
		$pagina->setCellValue('AK'.($i+3),$fico[$z]['p13']);
		$pagina->setCellValue('AL'.($i+3),$fico[$z]['p14']);
		$pagina->setCellValue('AM'.($i+3),$fico[$z]['p15']);
		$pagina->setCellValue('AN'.($i+3),$fico[$z]['p16']);
		$pagina->setCellValue('AO'.($i+3),$fico[$z]['p17']);
		$pagina->setCellValue('AP'.($i+3),$fico[$z]['p18']);
		$pagina->setCellValue('AQ'.($i+3),$fico[$z]['p18_1']);
		$pagina->setCellValue('AR'.($i+3),$fico[$z]['p18_2']);
		$pagina->setCellValue('AS'.($i+3),$fico[$z]['p19']);
		$pagina->setCellValue('AT'.($i+3),$fico[$z]['p20']);
		

}//fin del foreach caracteristicas hogar vivienda
}//fin del while caracteristicas hogar vivienda
}// fin de for de control


$centar=0;


//GRUPO HOGAR
$hogar=2; // titulo columna
$ñ=0; //control de filas que van bajando
for ($i=0; $i < $fields; $i++) { 
$m=0; // hoja 1 columnas


	  	$controlers=$control[$i];
	  	$query3="SELECT h.* from hogar h
		where id_exp=$controlers  order by id_numero ASC";
		$exportare = pg_query($query3);
		$fieldshv3 = pg_num_rows( $exportare );

		
		
		for ($k=1; $k <= $fieldshv3; $k++) {

		while($rosa = pg_fetch_array($exportare)) {	
		$ficos[$k] = $rosa;
		
		
    	$pagina->setCellValueByColumnAndRow(46+$m, $hogar,'COMPONENTE '.$ficos[$k]['id_numero']);
    	$pagina->setCellValueByColumnAndRow(47+$m, $hogar,'DNI');
		$pagina->setCellValueByColumnAndRow(48+$m, $hogar,'RELACIÓN DE PARENTESCO');
		$pagina->setCellValueByColumnAndRow(49+$m, $hogar,'SEXO');
		$pagina->setCellValueByColumnAndRow(50+$m, $hogar,'FECHA DE NACIMIENTO');
		$pagina->setCellValueByColumnAndRow(51+$m, $hogar,'EDAD');
		$pagina->setCellValueByColumnAndRow(52+$m, $hogar,'SITUACIÓN CONYUGAL');
		$pagina->setCellValueByColumnAndRow(53+$m, $hogar,'COBERTURA_MEDICA');
		$pagina->setCellValueByColumnAndRow(54+$m, $hogar,'ÚLTIMO CONTROL MEDICO');
		$pagina->setCellValueByColumnAndRow(55+$m, $hogar,'LUGAR HABITUAL DE CONTROLES MÉDICOS');
		$pagina->setCellValueByColumnAndRow(56+$m, $hogar,'DIFICULTAD O LIMITACION PARA SUBIR ESCALERAS');
		$pagina->setCellValueByColumnAndRow(57+$m, $hogar,' DIFICULTAD O LIMITACION PARA ENTENDER, RECORDAR O CONCENTRARSE');
		$pagina->setCellValueByColumnAndRow(58+$m, $hogar,'DIFICULTAD O LIMITACION PARA HABLAR O COMUNICARSE');
		$pagina->setCellValueByColumnAndRow(59+$m, $hogar,'DIFICULTAD O LIMITACION PARA OÍR');
		$pagina->setCellValueByColumnAndRow(60+$m, $hogar,'DIFICULTAD O LIMITACION PARA VER');
		$pagina->setCellValueByColumnAndRow(61+$m, $hogar,'DIFICULTAD O LIMITACION PARA COMER, BAÑARSE O VESTIRSE SOLO/A');
		$pagina->setCellValueByColumnAndRow(62+$m, $hogar,'Posee Certificado Único de Discapacidad');
		$pagina->setCellValueByColumnAndRow(63+$m, $hogar,'Cobra Jubilación o Pensión');
		$pagina->setCellValueByColumnAndRow(64+$m, $hogar,'COBRA');
		$pagina->setCellValueByColumnAndRow(65+$m, $hogar,'ASISTE O ASISTIÓ A UN ESTABLECIMIENTO EDUCATIVO');
		$pagina->setCellValueByColumnAndRow(66+$m, $hogar,'EL NIVEL MÁS ALTO QUE CURSA O CURSÓ');
		$pagina->setCellValueByColumnAndRow(67+$m, $hogar,'¿FINALIZÓ ESE NIVEL?');
		$pagina->setCellValueByColumnAndRow(68+$m, $hogar,'EL ÚLTIMO GRADO/AÑO QUE APROBÓ');
	
		$pagina->setCellValueByColumnAndRow(46+$m, $ñ+3,$ficos[$k]['nombre']);
		$pagina->setCellValueByColumnAndRow(47+$m, $ñ+3,$ficos[$k]['dni']);
		$pagina->setCellValueByColumnAndRow(48+$m, $ñ+3,$ficos[$k]['rel_parentesco']);
		$pagina->setCellValueByColumnAndRow(49+$m, $ñ+3,$ficos[$k]['sexo']);
		$pagina->setCellValueByColumnAndRow(50+$m, $ñ+3,$ficos[$k]['fecha_nac']);
		$pagina->setCellValueByColumnAndRow(51+$m, $ñ+3,$ficos[$k]['anios']);
		$pagina->setCellValueByColumnAndRow(52+$m, $ñ+3,$ficos[$k]['sit_conyu']);
		$pagina->setCellValueByColumnAndRow(53+$m, $ñ+3,$ficos[$k]['cober_medic']);
		$pagina->setCellValueByColumnAndRow(54+$m, $ñ+3,$ficos[$k]['salud_1']);
		$pagina->setCellValueByColumnAndRow(55+$m, $ñ+3,$ficos[$k]['salud_2']);
		$pagina->setCellValueByColumnAndRow(56+$m, $ñ+3,$ficos[$k]['disc_1']);
		$pagina->setCellValueByColumnAndRow(57+$m, $ñ+3,$ficos[$k]['disc_10']);
		$pagina->setCellValueByColumnAndRow(58+$m, $ñ+3,$ficos[$k]['disc_100']);
		$pagina->setCellValueByColumnAndRow(59+$m, $ñ+3,$ficos[$k]['disc_1000']);
		$pagina->setCellValueByColumnAndRow(60+$m, $ñ+3,$ficos[$k]['disc_10000']);
		$pagina->setCellValueByColumnAndRow(61+$m, $ñ+3,$ficos[$k]['disc_100000']);
		$pagina->setCellValueByColumnAndRow(62+$m, $ñ+3,$ficos[$k]['disc_2']);
		$pagina->setCellValueByColumnAndRow(63+$m, $ñ+3,$ficos[$k]['jub_1']);
		$pagina->setCellValueByColumnAndRow(64+$m, $ñ+3,$ficos[$k]['jub_2']);
		$pagina->setCellValueByColumnAndRow(65+$m, $ñ+3,$ficos[$k]['edu_1']);
		$pagina->setCellValueByColumnAndRow(66+$m, $ñ+3,$ficos[$k]['edu_2']);
		$pagina->setCellValueByColumnAndRow(67+$m, $ñ+3,$ficos[$k]['edu_3']);
		$pagina->setCellValueByColumnAndRow(68+$m, $ñ+3,$ficos[$k]['edu_4']);
	
//$k=$k+1; // titulo
$m=$m+23;// se mueve horizontalmente
if($m > $centar ){
	$centar=$m;
	}

}//fin del foreach caracteristicas hogar vivienda

}//fin del while caracteristicas hogar vivienda
$ñ=$ñ+1;

}// fin de form de control

$centarhogar=$centar+40;

$filasa=0;
for ($i=0; $i < $fields; $i++) { 
	 
	  	$controlera=$control[$i];
	  	$query4="SELECT co.* from comentario_hogar co
		where id_exp=$controlera ";
		$exportarm = pg_query($query4);
		$fieldshvq = pg_num_rows( $exportarm );


			$filasa=$filasa+1;

		while($rost = pg_fetch_array($exportarm)) {	

		$ficoz[] = $rost;
    	for ($lip=0; $lip < count($ficoz); $lip++) {
    	
		$pagina->setCellValueByColumnAndRow($centarhogar, $filasa+2,$ficoz[$lip]['comen']);
		

}//fin del foreach observacion
}//fin del while observacion
}// fin de for de control


$filasas=0;
for ($i=0; $i < $fields; $i++) { 
	 
	  	$controleran=$control[$i];
	  	$query5="SELECT ing.* from ingresos ing
		where id_exp=$controleran ";
		$exportarma = pg_query($query5);
		$fieldshvqt = pg_num_rows( $exportarma );


			$filasas=$filasas+1;

		while($rosti = pg_fetch_array($exportarma)) {	

		$ficozi[] = $rosti;
    	for ($lipa=0; $lipa < count($ficozi); $lipa++) {

    	$pagina->setCellValueByColumnAndRow($centarhogar+1, 2,'EL INGRESO TOTAL DEL HOGAR EL ÚLTIMO MES');
		$pagina->setCellValueByColumnAndRow($centarhogar+2, 2,'¿INGRESOS?');
		$pagina->setCellValueByColumnAndRow($centarhogar+3, 2,'INGRESOS APROXIMADOS');
		$pagina->setCellValueByColumnAndRow($centarhogar+4, 2,'¿ALGÚN MIEMBRO DEL HOGAR COBRÓ LA ASIGNACIÓN UNIVERSAL POR HIJO (AUH) Y/O ASIGNACIÓN POR EMBARAZO?');
    	
		$pagina->setCellValueByColumnAndRow($centarhogar+1, $filasas+2,$ficozi[$lipa]['ingreso']);
		$pagina->setCellValueByColumnAndRow($centarhogar+2, $filasas+2,$ficozi[$lipa]['singreso']);
		$pagina->setCellValueByColumnAndRow($centarhogar+3, $filasas+2,$ficozi[$lipa]['total']);
		$pagina->setCellValueByColumnAndRow($centarhogar+4, $filasas+2,$ficozi[$lipa]['miembro']);
		
		

}//fin del foreach ingresos
}//fin del while ingresos
}// fin de for de control


$wip=0;
//GRUPO HOGAR
$hogarcito=2;
$ñato=0; //control de filas que van bajando
for ($i=0; $i < $fields; $i++) { 
$mas=0;

	  	$controlersop=$control[$i];
	  	$query6="SELECT * from componente
		where id_exp=$controlersop  order by c1 ASC";
		$exportaremos = pg_query($query6);
		$fieldshv3m = pg_num_rows( $exportaremos );

		for ($ka=1; $ka <= $fieldshv3m; $ka++) {

		while($rosalinda = pg_fetch_array($exportaremos)) {	
		$ficosit[$ka] = $rosalinda;

    	$pagina->setCellValueByColumnAndRow($centarhogar+$mas+5, $hogarcito,'COMPONENTE N°');
    	$pagina->setCellValueByColumnAndRow($centarhogar+$mas+6, $hogarcito,'NOMBRE');
		$pagina->setCellValueByColumnAndRow($centarhogar+$mas+7, $hogarcito,'COBRÓ POR¿CUÁNTOS BENEFICIOS?');
		$pagina->setCellValueByColumnAndRow($centarhogar+$mas+8, $hogarcito,'MONTO COBRADO');

		$pagina->setCellValueByColumnAndRow($centarhogar+$mas+5, $ñato+3,$ficosit[$ka]['c1']);
		$pagina->setCellValueByColumnAndRow($centarhogar+$mas+6, $ñato+3,$ficosit[$ka]['c4']);
		$pagina->setCellValueByColumnAndRow($centarhogar+$mas+7, $ñato+3,$ficosit[$ka]['c2']);
		$pagina->setCellValueByColumnAndRow($centarhogar+$mas+8, $ñato+3,$ficosit[$ka]['c3']);

//$ka=$ka+1; // titulo

$mas=$mas+4;// se mueve horizontalmente
if($mas > $wip ){
	$wip=$mas;
}

}//fin del foreach componente ingresos

}//fin del while componente ingresos
$ñato=$ñato+1;

}// fin de form de control

$centaringrec=$centarhogar+$wip+4;


$centar3=0;
//GRUPO HOGAR
$hogars=2; // titulo columna
$ñ=0; //control de filas que van bajando
for ($i=0; $i < $fields; $i++) { 
$mis=0; // hoja 1 columnas


	  	$controlersa=$control[$i];
	  	$query20="SELECT * from sima 
		where id_exp=$controlersa  order by num_com ASC";
		$exportarex = pg_query($query20);
		$fieldshv3mty = pg_num_rows( $exportarex );

		for ($k=1; $k <= $fieldshv3mty; $k++) {

		while($rosalita = pg_fetch_array($exportarex)) {	
		$lubum[$k] = $rosalita;

		
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+1, $hogars,'COMPONENTE N°');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+2, $hogars,'NOMBRE');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+3, $hogars,'DURANTE LA SEMANA PASADA, ¿TRABAJÓ POR LO MENOS UNA HORA?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+4, $hogars,'EN ESA SEMANA, ¿HIZO ALGUNA CHANGA, FABRICÓ ALGO PARA VENDER AFUERA, AYUDÓ A UN FAMILIAR O AMIGO EN SU CHACRA O NEGOCIO?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+5, $hogars,'EN ESA SEMANA, ¿TENÍA TRABAJO, PERO ESTUVO DE LICENCIA POR VACACIONES O ENFERMEDAD, SUSPENSIÓN CON PAGO, CONFLICTO LABORAL, ETC.?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+6, $hogars,'DURANTE LAS ÚLTIMAS 4 SEMANAS, ¿BUSCÓ TRABAJO: CONTESTÓ ,AVISOS, CONSULTÓ AMIGOS O PARIENTES, PUSO CARTELES, HIZO ALGO PARA PONERSE POR SU CUENTA?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+7, $hogars,'¿TRABAJÓ POR UN PAGO EN DINERO O EN ESPECIE?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+8, $hogars,'EL TRABAJO PRINCIPAL, EN EL QUE TRABAJA MÁS HORAS…');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+9, $hogars,'EN ESE TRABAJO, ¿LE DESCUENTAN PARA LA JUBILACIÓN?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+10, $hogars,'EN ESE TRABAJO, ¿APORTA POR SÍ MISMO PARA LA JUBILACIÓN?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+11, $hogars,'¿ESE TRABAJO ES…');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+12, $hogars,'MENCIONE EL PLAN DE EMPLEO');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+13, $hogars,'¿CUÁL ES EL NOMBRE DE LA OCUPACIÓN QUE REALIZA EN ESE TRABAJO?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+14, $hogars,'¿QUÉ TAREAS REALIZA?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+15, $hogars,'¿A QUÉ SE DEDICA O QUÉ PRODUCE LA ACTIVIDAD, NEGOCIO, EMPRESA O INSTITUCIÓN EN LA QUE TRABAJA?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+16, $hogars,'SE FORMÓ O TOMÓ CAPACITACIONES PARA MEJORAR SU EMPLEABILIDAD Y COMPETITIVIDAD');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+17, $hogars,'¿QUÉ TIPO DE FORMACIÓN O CAPACITACIÓN HIZO?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+18, $hogars,' ADEMÁS DE SU TRABAJO, ¿SABE ALGÚN OFICIO CON EL CUAL PODRÍA SUSTENTARSE?');
    	$pagina->setCellValueByColumnAndRow($centaringrec+$mis+19, $hogars,'¿QUÉ TIPO DE OFICIO?');

		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+1, $ñ+3,$lubum[$k]['num_com']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+2, $ñ+3,$lubum[$k]['nombre']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+3, $ñ+3,$lubum[$k]['q1']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+4, $ñ+3,$lubum[$k]['q2']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+5, $ñ+3,$lubum[$k]['q3']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+6, $ñ+3,$lubum[$k]['q4']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+7, $ñ+3,$lubum[$k]['q5']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+8, $ñ+3,$lubum[$k]['q6']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+9, $ñ+3,$lubum[$k]['q7']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+10, $ñ+3,$lubum[$k]['q8']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+11, $ñ+3,$lubum[$k]['q9']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+12, $ñ+3,$lubum[$k]['q10']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+13, $ñ+3,$lubum[$k]['q11']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+14, $ñ+3,$lubum[$k]['q12']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+15, $ñ+3,$lubum[$k]['q13']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+16, $ñ+3,$lubum[$k]['q14']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+17, $ñ+3,$lubum[$k]['q15']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+18, $ñ+3,$lubum[$k]['q16']);
		$pagina->setCellValueByColumnAndRow($centaringrec+$mis+19, $ñ+3,$lubum[$k]['q17']);

//$k=$k+1; // titulo


$mis=$mis+19;// se mueve horizontalmente
if($mis > $centar3 ){
	$centar3=$mis;
	}
}//fin del foreach caracteristicas hogar vivienda

}//fin del while caracteristicas hogar vivienda
$ñ=$ñ+1;

}// fin de form de control

$cenfi=$centaringrec+$centar3;

$fifi=0;
$ñov=0;
for ($i=0; $i < $fields; $i++) { 
	 
	  	$controler11=$control[$i];
	  	$query11="SELECT * from evaluacion 
		where id_exp=$controler11 ";
		$exportar11 = pg_query($query11);
		$fieldshv11 = pg_num_rows( $exportar11 );

		while($ros11 = pg_fetch_array($exportar11)) {	

		$fico11[] = $ros11;
    	for ($z=0; $z <count($fico11); $z++) {
    	
    	$pagina->setCellValueByColumnAndRow($cenfi+1 , 2,'OBSERVACIÓN');

		$pagina->setCellValueByColumnAndRow($cenfi+1 , $ñov+3,$fico11[$z]['ini']);
		

}//fin del foreach caracteristicas hogar vivienda
}//fin del while caracteristicas hogar vivienda
$ñov=$ñov+1;
}// fin de for de control


$lazos=0;
$ñov42=0;
for ($i=0; $i < $fields; $i++) { 
	$pasari=0; 
	   	$controlersop113=$control[$i];
	  	$query6113="SELECT * from program
		where id_exp=$controlersop113 ";
		$exportaremos113 = pg_query($query6113);
		$fieldshv3m113 = pg_num_rows( $exportaremos113 );

		for ($ka=1; $ka <= $fieldshv3m113; $ka++) {

		while($rosalinda113 = pg_fetch_array($exportaremos113)) {	
		$ficosit113[$ka] = $rosalinda113;

    	$pagina->setCellValueByColumnAndRow($cenfi+$pasari+2, 2,'PROGRAMA');


		$pagina->setCellValueByColumnAndRow($cenfi+$pasari+2, $ñov42+3,$ficosit113[$ka]['progra']);
		


$pasari=$pasari+1;// se mueve horizontalmente
if($pasari > $lazos ){
	$lazos=$pasari;}

}//fin del foreach caracteristicas hogar vivienda
}//fin del while caracteristicas hogar vivienda
$ñov42=$ñov42+1;
}// fin de for de control

$try=$cenfi+$lazos+1;


$lazo=0;
//GRUPO HOGAR
$ñatoq=0; //control de filas que van bajando
for ($i=0; $i < $fields; $i++) { 
$faqn=0;

	  	$controlersop11=$control[$i];
	  	$query611="SELECT * from derivacion
		where id_exp=$controlersop11 ";
		$exportaremos11 = pg_query($query611);
		$fieldshv3m11 = pg_num_rows( $exportaremos11 );

		for ($ka=1; $ka <= $fieldshv3m11; $ka++) {

		while($rosalinda11 = pg_fetch_array($exportaremos11)) {	
		$ficosit11[$ka] = $rosalinda11;

    	$pagina->setCellValueByColumnAndRow($try+$faqn+1, 2,'DERIVACIÓN');


		$pagina->setCellValueByColumnAndRow($try+$faqn+1, $ñatoq+3,$ficosit11[$ka]['deriva'].' '.$ficosit11[$ka]['otro']);


//$ka=$ka+1; // titulo

$faqn=$faqn+1;// se mueve horizontalmente
if($faqn > $lazo ){
	$lazo=$faqn;
}

}//fin del foreach componente ingresos

}//fin del while componente ingresos
$ñatoq=$ñatoq+1;

}// fin de form de control

$final=$try+$lazo;

//seguir

$pagina->mergeCellsByColumnAndRow(46, 1, $centarhogar, 1);
$pagina->setCellValueByColumnAndRow(46, 1,'GRUPO HOGAR');
$pagina->getStyleByColumnAndRow(46,1)->applyFromArray($style);
$pagina->getStyleByColumnAndRow(46,1)->getFont()->setBold(true);
$pagina->getStyleByColumnAndRow(46,1)->getFont()->setSize(12);


$pagina->setCellValueByColumnAndRow($centarhogar, 2,'OBSERVACIÓN');

$pagina->mergeCellsByColumnAndRow($centarhogar+1, 1, $centarhogar+4, 1);
$pagina->setCellValueByColumnAndRow($centarhogar+1, 1,'INGRESOS');
$pagina->getStyleByColumnAndRow($centarhogar+1,1)->applyFromArray($style);
$pagina->getStyleByColumnAndRow($centarhogar+1,1)->getFont()->setBold(true);
$pagina->getStyleByColumnAndRow($centarhogar+1,1)->getFont()->setSize(12);

$pagina->mergeCellsByColumnAndRow($centarhogar+5, 1, $centaringrec, 1);
$pagina->setCellValueByColumnAndRow($centarhogar+5, 1,'INGRESOS (COMPONENTES)');
$pagina->getStyleByColumnAndRow($centarhogar+5,1)->applyFromArray($style);
$pagina->getStyleByColumnAndRow($centarhogar+5,1)->getFont()->setBold(true);
$pagina->getStyleByColumnAndRow($centarhogar+5,1)->getFont()->setSize(12);

$pagina->mergeCellsByColumnAndRow($centaringrec+1 , 1, $cenfi , 1);
$pagina->setCellValueByColumnAndRow($centaringrec+1, 1,'SITUACIÓN LABORAL MAYORES DE 14 AÑOS');
$pagina->getStyleByColumnAndRow($centaringrec+1,1)->applyFromArray($style);
$pagina->getStyleByColumnAndRow($centaringrec+1,1)->getFont()->setBold(true);
$pagina->getStyleByColumnAndRow($centaringrec+1,1)->getFont()->setSize(12);

$pagina->mergeCellsByColumnAndRow($cenfi+1 , 1, $final , 1);
$pagina->setCellValueByColumnAndRow($cenfi+1, 1,'EVALUACIÓN DEL CASO Y PLAN DE TRABAJO');
$pagina->getStyleByColumnAndRow($cenfi+1,1)->applyFromArray($style);
$pagina->getStyleByColumnAndRow($cenfi+1,1)->getFont()->setBold(true);
$pagina->getStyleByColumnAndRow($cenfi+1,1)->getFont()->setSize(12);

//$pagina->setCellValueByColumnAndRow($try+1, 1,'probeeeeeeeeeeeeeeeeeeeee');


 for ($gui=0; $gui < $final + 1 ; $gui++) { //estilos columna 2
   	$pagina->getStyleByColumnAndRow($gui,2)->getFont()->setBold(true);
   	$pagina->getStyleByColumnAndRow($gui,2)->getFont()->setSize(12);
   	$pagina->getStyleByColumnAndRow($gui,2)->applyFromArray($style);
   	$pagina->getColumnDimensionByColumn($gui)->setAutoSize(true);
 }

for ($uo=3; $uo < $fields+3 ; $uo++) {  //estilos finales
   	  for ($ui=0; $ui < $final+2 ; $ui++) { 
   	$pagina->getStyleByColumnAndRow($ui,$uo)->applyFromArray($style);
   }
 }


$excel->setActiveSheetIndex();


	$objWriter= PHPExcel_IOFactory::createWriter($excel,'Excel5');
	$objWriter -> save('php://output');
}
else
	{$w='No se Registran Datos En el rango Asignado';
$pagina->setCellValue('A1',$w);
$objWriter= PHPExcel_IOFactory::createWriter($excel,'Excel5');

$objWriter -> save('php://output');

}

?>
