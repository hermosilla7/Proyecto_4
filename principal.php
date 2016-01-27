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

			while($contacto = mysqli_fetch_array($result_contactos)){
				echo "<b>Nombre:</b> ";
				echo utf8_encode($contacto['nombre']);
				echo "<br/>";
				echo "<b>Apellidos:</b> ";
				echo utf8_encode($contacto['apellidos']);
				echo "<br/>";
				echo "<b>Correo:</b> ";
				echo utf8_encode($contacto['correo']);
				echo "<br/>";
				echo "<b>Dirección:</b> ";
				echo utf8_encode($contacto['direccion']);
				echo "<br/>";
				echo "<b>Teléfono:</b> ";
				echo utf8_encode($contacto['telf_prim']);
				echo "<br/>";
				echo "<b>Teléfono secundario:</b> ";
				echo utf8_encode($contacto['telf_sec']);
				echo "<br/>";
				echo "<b>Ubicación:</b> ";
				echo utf8_encode($contacto['ubicacion_prim_lat']);
				echo ", ";
				echo utf8_encode($contacto['ubicacion_prim_lon']);
				echo "<br/>";

				$nombre_contacto = utf8_encode($contacto['nombre']) . " " . utf8_encode($contacto['apellidos']);
				$loc_lat = utf8_encode($contacto['ubicacion_prim_lat']);
				$loc_lon = utf8_encode($contacto['ubicacion_prim_lon']);

				// echo $loc_lat;
				// echo $loc_lon;
				

				$fichero="img/$contacto[img]";
                if(file_exists($fichero)&&(($contacto['img']) != '')){
                  echo "<div class='perfil'><img src='$fichero' width='50' heigth='50' ></div>";
                }
                else{
                  echo "<div class='perfil'><img src ='img/no_disponible.jpg'width='50' heigth='50'/></div>";
                }
                echo"</div>";

                ?>
                


				<a href="contactos_modificar.php?id=<?php echo $contacto['id'];?>">Editar contacto</a>
		                <a href="contactos_baja.proc.php?id=<?php echo $contacto['id'];?>">Eliminar contacto</a>
		                <a href="">Crear Ruta</a>

		                <?php echo "<br><br/>";
					}
					
				?>

		        <!-- CREAR MAPA CON MARCADORES DE LA BD -->
                <?php echo utf8_encode($contacto['ubicacion_prim_lat']);
				echo ", ";
				echo utf8_encode($contacto['ubicacion_prim_lon']);?>
				<!DOCTYPE html>
				<html>
				<head>
				<script
				src="http://maps.googleapis.com/maps/api/js">
				</script>

				<script>
				var myCenter=new google.maps.LatLng(41.384724, 2.172798);
				var lat_js = "<?php echo $loc_lat; ?>" ;
				var lon_js = "<?php echo $loc_lon; ?>" ;
				var nombre_js = "<?php echo $nombre_contacto; ?>" ;
				// console.log(variablejs1);
				// console.log(variablejs2);
				function initialize()
				{
				var mapProp = {
				  center:myCenter,
				  zoom:5,
				  mapTypeId:google.maps.MapTypeId.ROADMAP
				  };

				var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);

				var marker=new google.maps.Marker({
				  position:new google.maps.LatLng(lat_js , lon_js),
				  });

				marker.setMap(map);

				var infowindow = new google.maps.InfoWindow({
				  content:nombre_js
				  });

				infowindow.open(map,marker);
				}

				google.maps.event.addDomListener(window, 'load', initialize);
				</script>
				</head>

				<body>
				<div id="googleMap" style="width:500px;height:380px;"></div>
				</body>
				</html>
				<!-- CREAR MAPA CON MARCADORES DE LA BD -->


		<button type="button" onclick="window.location.href='contactos_insert.php'">Crear contacto</button> 
		<br/><br/>
		<a href="usuarios_modificar.php">Editar perfil</a>
		<a href="usuarios_baja.proc.php?id=<?php echo $user_id;?>">Darse de baja</a>
		<a href="index.php">Logout</a>
	</body>
</html>