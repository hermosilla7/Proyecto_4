<?php
	include_once 'conexion.php';
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//imagen avatar
			$foto=$_FILES["foto"]["name"];
			$ruta=$_FILES["foto"]["tmp_name"];
			$destino="img/".$foto;
			copy($ruta, $destino);
			echo $foto;
			echo $ruta;
			echo $destino;
			//
			$sql = "INSERT INTO usuario (nombre, apellidos, correo, pass, img) VALUES ('$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[correo]', '$_REQUEST[pass]', '$foto')";
			$sql=utf8_decode($sql);
			echo $sql;

			//lanzamos la sentencia sql
			mysqli_query($con, $sql);

			header("location: index.php")
		?>
	</body>
</html>
