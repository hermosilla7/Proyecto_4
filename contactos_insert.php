<?php
	error_reporting(0);
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Página de login</title>
		<link rel="icon" type="image/png" href="img/portada.png" />
		<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
		<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw3Cufv_vLKO64Dtg9nwU9QJBeDpAQwpw&callback=initMap"async defer></script>
	</head>
	<body>
		<div id="contactMap">
		<script>
		var map;
		var markers = [];
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 41.384724, lng: 2.172798},
          zoom: 8
        });
        google.maps.event.addListener(map, 'click', function (e) {
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
		<div id="contactos">
		<div class="contact-form">
			<h1>Nuevo Contacto</h1>
     		<div class="form-group ">
				<form action="contactos_insert.proc.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" required><br>
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
						<input type="number" name="telefono_prim" class="form-control" placeholder="Teléfono" required><br>
					</div>
					<div class="form-group">
						<input type="number" name="telefono_sec" class="form-control" placeholder="Teléfono secundario"><br>
					</div>
					<div class="form-group">
						<input type="text" name="ubicacion_prim_lat" class="form-control" placeholder="Latitud"><br>
					</div>
					<div class="form-group">
						<input type="text" name="ubicacion_prim_lon" class="form-control" placeholder="Longitud"><br>
					</div>
					<div class="form-group">
						<input type="text" name="ubicacion_sec_lat" class="form-control" placeholder="Latitud"><br>
					</div>
					<div class="form-group">
						<input type="text" name="ubicacion_sec_lon" class="form-control" placeholder="Longitud"><br>
					</div>

					<div class="form-group">
						<input type="file" name="foto" id="foto" class="form-control"></br>
					</div>


					<button type="submit" class="sign-btn" name="acce">Registrar</button>
					<button type="button" class="log-btn" onClick="window.location.href='principal.php'">Volver</button>
				</form>
			</div>
		</div>
	</div>
	</body>
</html>