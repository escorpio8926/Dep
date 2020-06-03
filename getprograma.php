<?php
include 'classConexion.php';
$obj_gurpo=new Conexion();
$result=$obj_gurpo->consulta("select * from tabla_programa order by id_p ASC");
while ( $row =  pg_fetch_array($result))    
                        { 			
			echo '<option value="'.$row['id_p'].'">'.$row['prgs'].'</option>';
                        }