<?php
	//iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
	session_start();
	//si existe la variable de sesión error, la guardamos en la variable error ya que al destruir la sesión, esta desaparecería
	if(isset($_SESSION ['error'])){
		$error=$_SESSION['error'];
	}
	//destruimos la sesión para no poder llegar de manera indirecta a ninguna página posterior a la de login
	session_destroy();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Página de login</title>
	</head>
	<body>
		<?php
			if(isset($error)){
				echo "ERROR: " . $error;
				echo "<br/><br/>";
			}
		?>		
		<form name="f1" action="login.proc.php" method="get">
			Mail: <input type="text" name="mail" size="25" maxlength="50"><br/>
			Password: <input type="password" name="pass" size="25" maxlength="25"><br/>
			<input type="submit" name="acce" value="Acceder">
			<a href='usuarios_insert.php'>Dar de alta</a>
		</form>
	</body>
</html>