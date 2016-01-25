<?php
	//iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
	session_start();
	include 'conexion.proc.php';
	$consulta_actividades = "SELECT * FROM contacto";
	$datos = mysqli_query($con, $consulta_actividades);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Página principal</title>
	</head>
	<body>
		<?php

			//el include está comentado ya que en esta página no estamos accediendo a base de datos, de momento
			//include("conexion.proc.php");

			if(isset($_SESSION['mail'])){
				echo "Bienvenido: " . $_SESSION['nombre'] . "<br/>";
				echo "<br/>";
				/*if($_SESSION['nivel']==1){
					echo "Eres administrador. A administrar!!";
				} elseif ($_SESSION['nivel']==2){
					echo "Eres editor. A editar!!";
				} else {
					echo "Eres usuario. A tomar café!!";
				}*/
			} else {
				//como han intentado acceder de manera incorrecta, redirigimos a la página index.php con un mensaje de error
				$_SESSION['error']="No te saltes pasos!";
				header("location: index.php");
			}

			while($actividad = mysqli_fetch_array($datos)){
				echo "<b>Nombre:</b> ";
				echo utf8_encode($actividad['act_nombre']);
				echo "<br/>";
				echo "<b>Descripción:</b> ";
				echo utf8_encode($actividad['act_descripcion']);
				echo "<br/>";
				echo "<b>Plazas totales:</b> ";
				echo utf8_encode($actividad['act_plazas']);
				echo "<br/>";
				// echo "<b>Plazas libres:</b> ";
				// echo utf8_encode($actividad['act_plazas']);
				// echo "<br/>";
				// echo "<b>En cola:</b> ";
				// echo utf8_encode($actividad['act_plazas']);
				// echo "<br/>";

				//enlace a la página que modifica el producto pasándole la id (clave primaria)
					if($prod['pro_actiu']==1){
						echo "<a href='modificar.php?id=$prod[pro_id]'><i class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar'></i></a>";
					}
					
				echo "<br/>";
			}
			echo "APUNTARSE/BORRARSE";



		?>
		<br/><br/>
		<a href="index.php">Logout</a>
	</body>
</html>