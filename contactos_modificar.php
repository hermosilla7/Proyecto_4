<?php
	session_start();
	include_once 'conexion.proc.php';	

	$nomUsuari = $_SESSION['nombre'];
	$user_id = $_SESSION['id'];
	$contacto_id = $_REQUEST['id'];

	
	$consulta_contactos = ("SELECT * FROM contacto where id = $contacto_id");
	$result_contactos = mysqli_query($con, $consulta_contactos);

	if(mysqli_num_rows($result_contactos)>0){
		$contacto=mysqli_fetch_array($result_contactos);
?>
		<form action="contactos_modificar.proc.php" method="post" enctype="multipart/form-data">
		Nombre:
		<input type="text" name="nombre" value="<?php echo $contacto['nombre']; ?>"><br>
		Apellidos:
		<input type="text" name="apellidos" value="<?php echo $contacto['apellidos']; ?>"><br>
		Correo:
		<input type="text" name="correo" value="<?php echo $contacto['correo']; ?>"><br>

		Dirección:
		<input type="text" name="direccion" value="<?php echo $contacto['direccion']; ?>"><br>
		Teléfono:
		<input type="text" name="telf_prim" value="<?php echo $contacto['telf_prim']; ?>"><br>
		Teléfono secundario:
		<input type="text" name="telf_sec" value="<?php echo $contacto['telf_sec']; ?>"><br>
		Ubicación primaria lat:
		<input type="text" name="ubicacion_prim_lat" value="<?php echo $contacto['ubicacion_prim_lat']; ?>"><br>
		Ubicación primaria lon:
		<input type="text" name="ubicacion_prim_lon" value="<?php echo $contacto['ubicacion_prim_lon']; ?>"><br>
		Ubicación secundaria lat:
		<input type="text" name="ubicacion_sec_lat" value="<?php echo $contacto['ubicacion_sec_lat']; ?>"><br>	
		Ubicación secundaria lon:
		<input type="text" name="ubicacion_sec_lon" value="<?php echo $contacto['ubicacion_sec_lon']; ?>"><br>
		<br>	

		Imagen:
		<?php		
		$fichero="img/$contacto[img]";
		$foto = $contacto['img'];
		
		// echo $foto;
		echo "<img src='$fichero' width='50' heigth='50' ></div></br>";
		?>
		
		<input type="file" name="foto" id="foto"></br><br>

		<input type="hidden" name="id" value="<?php echo $contacto['id']; ?>">
		<?php echo $contacto_id; ?>
		<!-- <input type="hidden" name="foto_usuario" value="<?php echo $foto_new; ?>"> -->

		<input id="boton" type="submit" value="Guardar">

		<?php

	}
?>