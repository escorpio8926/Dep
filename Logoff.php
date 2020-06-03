<?php
include 'cabecera.php';
session_start();
session_destroy();
echo"<script type='text/javascript'>
	 alert('La sesión fué cerrada correctamente');
	window.location='index.php';
	</script>";
?>

