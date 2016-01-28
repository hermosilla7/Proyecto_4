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
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Página de login</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw3Cufv_vLKO64Dtg9nwU9QJBeDpAQwpw&callback=initMap"async defer></script>
	</head>
	<body>
		<div id="contactos">
		<div class="contact-form">
			<h1>Modificar contacto</h1>
     		<div class="form-group ">
				<form action="contactos_modificar.proc.php" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<input type="text" name="nombre" class="form-control" value="<?php echo $contacto['nombre']; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="apellidos" class="form-control" value="<?php echo $contacto['apellidos']; ?>">
				</div>
				<div class="form-group">
					<input type="text" name="correo" class="form-control" value="<?php echo $contacto['correo']; ?>">
				</div>
				<div class="form-group">
				<input type="text" name="direccion" class="form-control" value="<?php echo $contacto['direccion']; ?>">
				</div>
				<div class="form-group">
				<input type="text" name="telf_prim" class="form-control" value="<?php echo $contacto['telf_prim']; ?>">
				</div>
				<div class="form-group">
				<input type="text" name="telf_sec" class="form-control" value="<?php echo $contacto['telf_sec']; ?>">
				</div>
				<div class="form-group">
				<input type="text" name="ubicacion_prim_lat" class="form-control" value="<?php echo $contacto['ubicacion_prim_lat']; ?>">
				</div>
				<div class="form-group">
				<input type="text" name="ubicacion_prim_lon" class="form-control" value="<?php echo $contacto['ubicacion_prim_lon']; ?>">
				</div>
				<div class="form-group">
				<input type="text" name="ubicacion_sec_lat" class="form-control" value="<?php echo $contacto['ubicacion_sec_lat']; ?>">	
				</div>
				<div class="form-group">
				<input type="text" name="ubicacion_sec_lon" class="form-control" value="<?php echo $contacto['ubicacion_sec_lon']; ?>">
				</div>

				Imagen:
				<?php		
				$fichero="img/$contacto[img]";
				$foto = $contacto['img'];
				
				// echo $foto;
				echo "<img src='$fichero' width='50' heigth='50' ></div></br>";
				?>
				
				<input type="file" class="form-control" name="foto" id="foto"></br><br>

				<input type="hidden" name="id" value="<?php echo $contacto['id']; ?>">
				<!-- <input type="hidden" name="foto_usuario" value="<?php echo $foto_new; ?>"> -->

				<input id="boton" type="submit" class="log-btn" value="Guardar">
				<button type="button" class="sign-btn" onClick="window.location.href='principal.php'">Volver</button>
				<?php

			}
		?>
	</div>
		</div>
	</div>
	<div id="contactMap">
		<script>
		var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 41.384724, lng: 2.172798},
          zoom: 8
        });
        google.maps.event.addListener(map, 'click', function (e) {
            //alert("Latitude: " + e.latLng.lat() + "\r\nLongitude: " + e.latLng.lng());
            document.getElementsByName('ubicacion_prim_lat')[0].value = e.latLng.lat();
            document.getElementsByName('ubicacion_prim_lon')[0].value = e.latLng.lng();
            var marker=new google.maps.Marker({
			  	position:new google.maps.LatLng(e.latLng.lat(), e.latLng.lng()),
			});
			marker.setMap(map);
        });
      	
        
      }

    </script>
        <div id="map" style="width:800px;height:550px;"></div>
	</div>
	</body>
</html>