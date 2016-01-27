<?php
	session_start();
	include_once 'conexion.proc.php';	

	$nomUsuari = $_SESSION['nombre'];
	$user_id = $_SESSION['id'];

	
	$consulta_usuarios = ("SELECT * FROM usuario where id = $user_id");
	$result_usuarios = mysqli_query($con, $consulta_usuarios);

	if(mysqli_num_rows($result_usuarios)>0){
		$user=mysqli_fetch_array($result_usuarios);
?>
		<form action="usuarios_modificar.proc.php" method="post" enctype="multipart/form-data">
		Nombre:
		<input type="text" name="nombre" value="<?php echo $user['nombre']; ?>"><br>
		Apellidos:
		<input type="text" name="apellidos" value="<?php echo $user['apellidos']; ?>"><br>
		Correo:
		<input type="text" name="correo" value="<?php echo $user['correo']; ?>"><br>
		Contraseña:
		<input type="password" name="pass" value="<?php echo $user['pass']; ?>"><br>	
		<br>	

		Imagen:
		<?php		
		$fichero="img/$user[img]";
		$foto = $user['img'];
		
		// echo $foto;
		echo "<img src='$fichero' width='50' heigth='50' ></div></br>";
		?>
		
		<input type="file" name="foto" id="foto"></br><br>

		<input type="hidden" name="id_usuario_seleccionado" value="<?php echo $id_anterior; ?>">

		<!-- <input type="hidden" name="foto_usuario" value="<?php echo $foto_new; ?>"> -->

		<input id="boton" type="submit" value="Guardar">

		<?php

	}
?>