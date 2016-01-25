<?php
	//iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
	session_start();
	// include 'conexion.proc.php';
	// $consulta_usuarios = "SELECT * FROM usuario";
	// $result_usuarios = mysqli_query($con, $consulta_usuarios);
?>
	<form action="usuarios_insert.proc.php" method="post" enctype="multipart/form-data">
	Nombre:
	<input type="text" name="nombre"><br>
	Apellidos:
	<input type="text" name="apellidos"><br>
	Correo:	
	<input type="text" name="correo"><br>
	Contraseña:
	<input type="password" name="pass"><br>
	Imagen:
	<input type="file" name="foto" id="foto"></br>
	<input id="boton" type="submit" value="Registrar">