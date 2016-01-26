<?php
	session_start();
	include_once 'conexion.php';	
	$user_id = $_SESSION['id'];
	
	$consulta_usuarios = ("SELECT * FROM usuario where id = $user_id");
	$result_usuarios = mysqli_query($con, $consulta_usuarios);

	if(mysqli_num_rows($result_usuarios)>0){
		$usuario=mysqli_fetch_array($result_usuarios);
		// $id = $usuario['id_user'];
		// echo $id;
?>
		<form action="usuarios_modificar.proc.php" method="post" enctype="multipart/form-data">
		Nombre:
		<input type="text" name="nombre" value="<?php echo utf8_encode($usuario['nombre']); ?>"><br>
		Descripción:<br/>
		<textarea name="descr" id="textarea_insert" cols="20" rows="5" maxlength="255" ><?php echo utf8_encode($usuario['descr']); ?></textarea><br>

	


		Imagen:
		<?php		
		$fichero="img/$usuario[img]";
		$foto = $usuario['img'];
		
		echo $foto;
		echo "<img src='$fichero' width='200' heigth='200' ></div>";
		?>
		
		<input type="file" name="foto" id="foto"></br><br>

		<input type="hidden" name="id_recurso_seleccionado" value="<?php echo $id_anterior; ?>">

		<input id="boton" type="submit" value="Guardar">

		<?php

	}
?>
