<?php
	error_reporting(0);
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
			//
			$sql = "INSERT INTO contacto (nombre, apellidos, correo, direccion, telf_prim, telf_sec, ubicacion_prim_lat, ubicacion_prim_lon, ubicacion_sec_lat, ubicacion_sec_lon, img, id_usuario)  VALUES ('$_REQUEST[nombre]', '$_REQUEST[apellidos]', '$_REQUEST[correo]', '$_REQUEST[direccion]', '$_REQUEST[telefono_prim]', '$_REQUEST[telefono_sec]', '$_REQUEST[ubicacion_prim_lat]' , '$_REQUEST[ubicacion_prim_lon]', '$_REQUEST[ubicacion_sec_lat]', '$_REQUEST[ubicacion_sec_lon]', '$foto', '1')";
			$sql=utf8_decode($sql);

			//lanzamos la sentencia sql
			mysqli_query($con, $sql);

			$message = 'Contacto dado de alta';
			echo "<SCRIPT type='text/javascript'> //not showing me this
		        alert('$message');
		        window.location.replace(\"principal.php\");
		    </SCRIPT>";
		?>
	</body>
</html>
