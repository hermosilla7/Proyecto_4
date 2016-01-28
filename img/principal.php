<?php
	//iniciamos sesión - SIEMPRE TIENE QUE ESTAR EN LA PRIMERA LÍNEA
	session_start();
	$user_id = $_SESSION['id'];
	include 'conexion.proc.php';
	$consulta_contactos = "SELECT * FROM contacto where id_usuario = $user_id";
	$result_contactos = mysqli_query($con, $consulta_contactos);
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Página principal</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<script class="cssdeck" src="js/map.js"></script>
		<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	</head>
	<table><tr><td>
	<body onload="cargarmap()">
		<div id="demo"></div>
	    <div id="mapholder"></div>
	    <button onclick="cargarmap()">Reiniciar ubicación</button>
	   </td>
	    <td>
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

			
			while($contacto = mysqli_fetch_array($result_contactos)){
				echo "<table>";
				echo "<tr><td><b>Nombre:</b></td> ";
				echo "<td>".utf8_encode($contacto['nombre'])."</td></tr>";
				echo "<tr><td><b>Apellidos:</b></td>";
				echo "<td>".utf8_encode($contacto['apellidos'])."</td></tr>";
				echo "<tr><td><b>Correo:</b></td>";
				echo "<td>".utf8_encode($contacto['correo'])."</td></tr>";
				echo "<tr><td><b>Dirección:</b></td>";
				echo "<td>".utf8_encode($contacto['direccion'])."</td></tr>";
				echo "<tr><td><b>Teléfono:</b></td>";
				echo "<td>".utf8_encode($contacto['telf_prim'])."</td></tr>";
				echo "<tr><td><b>Teléfono secundario:</b></td>";
				echo "<td>".utf8_encode($contacto['telf_sec']);
				echo "<tr><td><b>Ubicación:</b></td>";
				echo "<td>".utf8_encode($contacto['ubicacion_prim_lat']);
				echo ", ";
				echo utf8_encode($contacto['ubicacion_prim_lon'])."</td></tr>";
				echo "<tr><td><b>Ubicación secundaria:</b> ";
				echo "<td>".utf8_encode($contacto['ubicacion_sec_lat']);
				echo ", ";
				echo utf8_encode($contacto['ubicacion_sec_lon'])."</td></tr>";
				

				$fichero="img/$contacto[img]";
                if(file_exists($fichero)&&(($contacto['img']) != '')){
                  echo "<tr><td><div class='perfil'><img src='$fichero' width='50' heigth='50' >";
                }
                else{
                  echo "<tr><td><div class='perfil'><img src ='img/no_disponible.jpg'width='50' heigth='50'/>";
                }
                echo"</div></td></tr>";

                ?>
                <tr><td><a href="contactos_modificar.php?id=<?php echo $contacto['id'];?>">Editar contacto</a></td>
                <td><a href="contactos_baja.proc.php?id=<?php echo $contacto['id'];?>">Eliminar contacto</a></td></tr>

                <?php echo "</table><br><br/>";
			}
			
		?>
		<button type="button" onclick="window.location.href='contactos_insert.php'">Crear contacto</button> 
		<br/><br/>
		<a href="usuarios_modificar.php">Editar perfil</a>
		<a href="usuarios_baja.proc.php?id=<?php echo $user_id;?>">Darse de baja</a>
		<a href="index.php">Logout</a>
		</td></tr></table>
	</body>
</html>