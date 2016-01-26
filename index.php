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
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	</head>
	<body>
		<?php
			if(isset($error)){
				echo "ERROR: " . $error;
				echo "<br/><br/>";
			}
		?>		
		<div class="login-form">
			<h1>My Contacts</h1>
     		<div class="form-group ">
				<form name="f1" action="login.proc.php" method="get">
					<input type="text" name="mail" class="form-control" placeholder="Correo"maxlength="50">
			</div>
				    <div class="form-group">
				       <input type="password" name="pass" class="form-control" placeholder="Contraseña">
				       <i class="fa fa-lock"></i>
				    </div>
					<span class="alert">Invalid Credentials</span>
    				<button type="button" class="log-btn" name="acce">Entrar</button>
     				<button type="button" class="sign-btn" onclick="window.location.href='usuarios_insert.php'">Registrarme</button>  
   			
				</form>
			</div>
		</div>
	</body>
</html>