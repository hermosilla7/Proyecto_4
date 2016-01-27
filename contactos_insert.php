<?php
	//iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
	session_start();
	// include 'conexion.proc.php';
	// $consulta_usuarios = "SELECT * FROM usuario";
	// $result_usuarios = mysqli_query($con, $consulta_usuarios);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Página de login</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	</head>
	<body>
		<div class="login-form">
			<h1>Registro</h1>
     		<div class="form-group ">
				<form action="contactos_insert.proc.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre"><br>
					</div>
					<div class="form-group">
						<input type="text" name="apellidos" class="form-control" placeholder="Apellidos"><br>
					</div>
					<div class="form-group">
						<input type="text" name="correo" class="form-control" placeholder="Correo"><br>
					</div>

					<div class="form-group">
						<input type="text" name="direccion" class="form-control" placeholder="Dirección"><br>
					</div>
					<div class="form-group">
						<input type="text" name="telefono_prim" class="form-control" placeholder="Teléfono"><br>
					</div>
					<div class="form-group">
						<input type="text" name="telefono_sec" class="form-control" placeholder="Teléfono secundario"><br>
					</div>
					<div class="form-group">
						<input type="text" name="ubicacion_prim_lat" class="form-control_prim" placeholder="Latitud"><br>
					</div>
					<div class="form-group">
						<input type="text" name="ubicacion_prim_lon" class="form-control_prim" placeholder="Longitud"><br>
					</div>
					<div class="form-group">
						<input type="text" name="ubicacion_sec_lat" class="form-control_prim" placeholder="Latitud"><br>
					</div>
					<div class="form-group">
						<input type="text" name="ubicacion_sec_lon" class="form-control_prim" placeholder="Longitud"><br>
					</div>

					<div class="form-group">
						<input type="file" name="foto" id="foto" class="form-control"></br>
					</div>
					<button type="submit" class="sign-btn" name="acce">Registrar</button>
				</form
			</div>
		</div>
	</body>
</html>