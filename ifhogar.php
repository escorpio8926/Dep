<?php

if($row['rel_parentesco']==1)
	{$p1="Titular PEA";}

if($row['rel_parentesco']==2)
	{$p1="Cónyuge / pareja";}


if($row['rel_parentesco']==3)
	{$p1="Hijo/a / Hijastro/a";}

if($row['rel_parentesco']==4)
	{$p1="Yerno / Nuera";}

if($row['rel_parentesco']==5)
	{$p1="Nieto/a";}

if($row['rel_parentesco']==6)
	{$p1="Madre / Padre";}

if($row['rel_parentesco']==7)
	{$p1="Suegro/a";}

if($row['rel_parentesco']==8)
	{$p1="Hermano/a";}

if($row['rel_parentesco']==9)
	{$p1="Otros familiares";}

if($row['rel_parentesco']==10)
	{$p1="No familiares";}

if($row['sexo']==1)
	{$p2="Varón";}

if($row['sexo']==2)
	{$p2="Mujer";}

if($row['sexo']==3)
	{$p2="No Binario";}

if($row['sit_conyu']==1)
	{$p3="unido/a";}

if($row['sit_conyu']==2)
	{$p3="casado/a";}

if($row['sit_conyu']==3)
	{$p3="separado/a o divorciado/a";}

if($row['sit_conyu']==4)
	{$p3="viudo/a";}

if($row['sit_conyu']==5)
	{$p3="soltero/a";}

if($row['cober_medic']==1)
	{$p4="OSPIA";}

if($row['cober_medic']==2)
	{$p4="OSPRERA";}

if($row['cober_medic']==3)
	{$p4="Programa Federal Incluir Salud (ex PROFE)";}

if($row['cober_medic']==4)
	{$p4="PAMI";}

if($row['cober_medic']==5)
	{$p4=" Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['cober_medic']==6)
	{$p4="(No tiene ninguna";}


if($row['cober_medic']==9)
	{$p4="Ns/Nr";}

if($row['cober_medic']==12)
	{$p4="OSPIA - OSPRERA";}

if($row['cober_medic']==123)
	{$p4="OSPIA - OSPRERA - Programa Federal Incluir Salud (ex PROFE)";}

if($row['cober_medic']==1234)
	{$p4="OSPIA - OSPRERA - Programa Federal Incluir Salud (ex PROFE) - PAMI";}

if($row['cober_medic']==12345)
	{$p4="OSPIA - OSPRERA - Programa Federal Incluir Salud (ex PROFE) - PAMI - Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['cober_medic']==13)
	{$p4="OSPIA - Programa Federal Incluir Salud (ex PROFE) ";}

if($row['cober_medic']==134)
	{$p4="OSPIA - Programa Federal Incluir Salud (ex PROFE) - PAMI ";}

if($row['cober_medic']==1345)
	{$p4="OSPIA - Programa Federal Incluir Salud (ex PROFE) - PAMI - Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['cober_medic']==14)
	{$p4="OSPIA - PAMI";}

if($row['cober_medic']==145)
	{$p4="OSPIA - PAMI -Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['cober_medic']==15)
	{$p4="OSPIA - Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['cober_medic']==23)
	{$p4="OSPRERA - Programa Federal Incluir Salud (ex PROFE)";}

if($row['cober_medic']==234)
	{$p4="OSPRERA - Programa Federal Incluir Salud (ex PROFE) - PAMI";}

if($row['cober_medic']==2345)
	{$p4="OSPRERA - Programa Federal Incluir Salud (ex PROFE) - PAMI -  Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['cober_medic']==24)
	{$p4="OSPRERA - PAMI";}

if($row['cober_medic']==245)
	{$p4="OSPRERA - PAMI - Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['cober_medic']==25)
	{$p4="OSPRERA - Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['cober_medic']==34)
	{$p4="Programa Federal Incluir Salud (ex PROFE) - PAMI";}

if($row['cober_medic']==345)
	{$p4="Programa Federal Incluir Salud (ex PROFE) - PAMI - Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['cober_medic']==35)
	{$p4="Programa Federal Incluir Salud (ex PROFE) - Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['cober_medic']==45)
	{$p4="PAMI - Otra Obra Social / Mutual / Prepaga / Serv. de emergencia / Planes y Seguros Públicos";}

if($row['salud_1']==1)
	{$p5="Menos de 1 año";}

if($row['salud_1']==2)
	{$p5="de 1 a 2 años";}

if($row['salud_1']==3)
	{$p5="Más de 2 años";}

if($row['salud_1']==4)
	{$p5="Ns/Nr";}

if($row['salud_2']==1)
	{$p6="Público municipal";}

if($row['salud_2']==2)
	{$p6="Público provincial";}

if($row['salud_2']==3)
	{$p6="Privado";}

if($row['salud_2']==12)
	{$p6=" Público municipal - Público provincial";}

if($row['salud_2']==13)
	{$p6=" Público municipal - Privado";}

if($row['salud_2']==23)
	{$p6="Público provincial - Privado";}

if($row['salud_2']==23)
	{$p6="Privado - Público provincial ";}

if($row['salud_2']==31)
	{$p6="Privado - Público municipal ";}

if($row['salud_2']==321)
	{$p6="Privado - Público provincial - Público municipal ";}

if($row['salud_2']==123)
	{$p6="Público municipal - Público provincial - Privado";}

if($row['salud_2']==213)
	{$p6="Público provincial - Público municipal - Privado";}

if($row['salud_2']==231)
	{$p6="Público provincial - Privado - Público municipal ";}

if($row['salud_2']==21)
	{$p6="Público provincial - Público municipal";}

if($row['salud_2']==132)
	{$p6="Público municipal - Privado - Público provincial";}

if($row['disc_1']==1)
	{$p7="caminar o subir escaleras - ";}

if($row['disc_1']==2)
	{$p7="";}

if($row['disc_10']==1)
	{$p8=" entender, recordar o concentrarse - ";}

if($row['disc_10']==2)
	{$p8="";}

if($row['disc_100']==1)
	{$p9=" hablar o comunicarse - ";}

if($row['disc_100']==2)
	{$p9="";}

if($row['disc_1000']==1)
	{$p10=" Oír - ";}

if($row['disc_1000']==2)
	{$p10="";}

if($row['disc_10000']==1)
	{$p11=" ver - ";}

if($row['disc_10000']==2)
	{$p11="";}

if($row['disc_100000']==1)
	{$p12=" comer, bañarse o vestirse solo/a";}

if($row['disc_100000']==2)
	{$p12="";}

if($row['disc_2']==1)
	{$p13="Si";}

if($row['disc_2']==2)
	{$p13="No";}

if($row['jub_1']==1)
	{$p14="Si :";}

if($row['jub_1']==2)
	{$p14="No ";}

if($row['jub_2']==1)
	{$p15="Solo jubilación";}

if($row['jub_2']==2)
	{$p15="Solo pensión por fallecimiento ";}

if($row['jub_2']==3)
	{$p15="jubilación y pensión por fallecimiento";}

if($row['jub_2']==4)
	{$p15="solo pensión de otro tipo";}

if($row['jub_2']=='')
	{$p15="";}

if($row['edu_1']==1)
	{$p16="Asiste";}

if($row['edu_1']==2)
	{$p16="No asiste, pero asistió";}

if($row['edu_1']==3)
	{$p16="Nunca asistió";}

if($row['edu_2']==1)
	{$p17="Jardín / Preescolar";}

if($row['edu_2']==2)
	{$p17="Primario";}

if($row['edu_2']==3)
	{$p17="E.G.B";}

if($row['edu_2']==4)
	{$p17="Secundario";}

if($row['edu_2']==5)
	{$p17="Polimodal";}

if($row['edu_2']==6)
	{$p17="Terciario";}

if($row['edu_2']==7)
	{$p17="Universitario";}

if($row['edu_2']==8)
	{$p17="Posgrado universitario";}

if($row['edu_2']==9)
	{$p17="Educación especial";}

if($row['edu_2']=='')
	{$p17="";}


if($row['edu_3']==1)
	{$p18="Si";}

if($row['edu_3']==2)
	{$p18="No";}

if($row['edu_3']=='')
	{$p18="";}

if($row['edu_4']==0)
	{$p19="Ninguno";}

if($row['edu_4']==1)
	{$p19="Primero";}

if($row['edu_4']==2)
	{$p19="Segundo";}

if($row['edu_4']==3)
	{$p19="Tercero";}

if($row['edu_4']==4)
	{$p19="Cuarto";}

if($row['edu_4']==5)
	{$p19="Quinto";}

if($row['edu_4']==6)
	{$p19="Sexto";}

if($row['edu_4']==7)
	{$p19="Séptimo";}

if($row['edu_4']==8)
	{$p19="Octavo";}

if($row['edu_4']==9)
	{$p19="Noveno";}

if($row['edu_4']==99)
	{$p19="Ns/Nr";}

if($row['edu_4']=='')
	{$p19="";}

?>