<?php
include 'classConexion.php';
$obj_gurpo=new Conexion();
$result=$obj_gurpo->consulta("select * from tabla_derivaciones order by id_drvs ASC");
while ( $row =  pg_fetch_array($result))    
                        { 			
			echo '<option value="'.$row['id_drvs'].'">'.$row['derivacion'].'</option>';
                        }