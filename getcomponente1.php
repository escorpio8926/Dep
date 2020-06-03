<?php
include 'classConexion.php';
if(!empty($_POST))
{	
	$componente=$_POST['c']	;
	$id_expediente=$_POST['t'];
	new conexion();
	$query="SELECT nombre from hogar where id_numero = $componente AND id_exp= $id_expediente AND anios >= 14";
	
	$result = pg_query($query);
	$total = pg_num_rows($result);
	if($total > 0)
	{
		$data=pg_fetch_assoc($result);
		echo json_encode($data,JSON_UNESCAPED_UNICODE);
		pg_close();
	}
	else{
		$er='error';
		echo json_encode($er,JSON_UNESCAPED_UNICODE);
		exit;

	}


}