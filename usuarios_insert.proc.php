<?php
	include_once 'conexion.proc.php';
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
			$sql = "INSERT INTO usuario (nombre, apellidos, correo, pass, img) VALUES ('$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[correo]', md5('$_REQUEST[pass]'), '$foto')";
			$sql=utf8_decode($sql);
			echo $sql;

			//lanzamos la sentencia sql
			mysqli_query($con, $sql);

			$message = 'Usuario dado de alta';
			echo "<SCRIPT type='text/javascript'> //not showing me this
		        alert('$message');
		        window.location.replace(\"http://localhost/Proyecto_4/index.php\");
		    </SCRIPT>";
		?>
	</body>
</html>
