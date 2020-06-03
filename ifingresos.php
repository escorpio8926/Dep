<?php

if($row['singreso']==2)
	{$p1="Sin ingresos";}

if($row['singreso']==99)
	{$p1="Ns/Nr";}

if($row['singreso']=='')
	{$p1="";}

if($row['total']==1)
	{$p2="$1 a 3.000";}

if($row['total']==2)
	{$p2="$3.001 a 5.000";}

if($row['total']==3)
	{$p2="$5.001 a 8.000";}

if($row['total']==4)
	{$p2="$8.001 a 12.000";}

if($row['total']==5)
	{$p2="$12.001 a 15.000";}

if($row['total']==6)
	{$p2="$15.001 a 18.000";}

if($row['total']==7)
	{$p2="$18.001 a 23.000";}

if($row['total']==8)
	{$p2="$23.001 a 27.000";}

if($row['total']==9)
	{$p2="$27.001 a 31.000";}

if($row['total']==10)
	{$p2="$31.001 a 35.000";}

if($row['total']==11)
	{$p2="$35.001 a 38.000";}

if($row['total']==12)
	{$p2="$38.001 a 41.000";}

if($row['total']==13)
	{$p2="$41.001 a 45.000";}

if($row['total']==14)
	{$p2="$45.001 a 49.000";}

if($row['total']==15)
	{$p2="$49.001 a 53.000";}

if($row['total']==16)
	{$p2="$53.001 a 60.000";}

if($row['total']==17)
	{$p2="$60.001 y más";}

if($row['total']==99)
	{$p2="Ns/Nr";}

if($row['total']=='')
	{$p2="";}

if($row['miembro']==1)
	{$p3="Si";}

if($row['miembro']==2)
	{$p3="No";}

if($row['miembro']==9)
	{$p3="Ns/Nr";}




?>