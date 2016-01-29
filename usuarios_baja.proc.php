<?php
	session_start();
	error_reporting(0);
	include_once 'conexion.proc.php';	

	$nomUsuari = $_SESSION['nombre'];
	$user_id = $_SESSION['id'];

	
	$sql_update="update usuario set activo = 0 where id = $user_id";

		mysqli_query($con,$sql_update)
		  or die("Problemas en el update".mysqli_error($con));

		mysqli_close($con);


	header("Location: index.php");
?>