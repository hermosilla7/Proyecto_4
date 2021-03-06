<?php
session_start();
error_reporting(0);
$user_id = $_SESSION['id'];
$foto = $_SESSION['img'];
$nom_user=$_SESSION['nombre'];
include 'conexion.proc.php';
$consulta_contactos = "SELECT * FROM contacto where id_usuario = $user_id";
$result_contactos = mysqli_query($con, $consulta_contactos);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Agenda</title>
    <link rel="icon" type="image/png" href="img/portada.png" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
    <script>
            function confirmDel(usuario) {
                var r = confirm("¿Quieres eliminar contacto?");
                if (r == true) {
                    location.href = "contactos_baja.proc.php?id="+usuario;
                } else {
                    //no hará nada
                }
            }
        </script>
        <script>
            function confirmar(){
                var txt;
                var r = confirm("¿Quieres darte de baja?");
                if (r == true){
                    location.href = "usuarios_baja.proc.php";
                }else{
                    //no hará nada
                }
            }
        </script>
</head>
<body>
    <div id="contactos">
<div class="prin-img" style="margin-bottom: 15px;">
        <input type="image" src="img/<?php echo $foto ?>"style="float: left; width: 68px; height: 68px;">
    </div>
    <h3 style="position: absolute; padding-left: 70px"><?php echo "Bienvenido " .$nom_user?></h3>
<input type="image" src="img/off.png" onclick="window.location.href='index.php'" style="float: right;">
<input type="image" src="img/baja.png" onclick="confirmar()" style="float: right;">
<input type="image" src="img/edit.png" onclick="window.location.href='usuarios_modificar.php'" style="float: right;"></br>
        <div class="contact-form">
<?php

if (isset($_SESSION['mail'])) {
    ?>
    <h2>Contactos</h2>
    <div class="prin-img" style="margin-bottom: 15px;">
        
        <input type="image" src="img/add.png" onclick="window.location.href='contactos_insert.php'" style="float: right;"></br></br>
    </div>
    <?php
} else {
    $_SESSION['error'] = "No te saltes pasos!";
    header("location: index.php");
}
$contactosArray = [];
while ($contacto = mysqli_fetch_array($result_contactos)) {
    echo "<b style='margin-top: 15px;'>Nombre:</b> ";
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

    $contactosArray[] = [
        'nombre' => $nombre_contacto,
        'latitud' => (float)$loc_lat,
        'longitud' => (float)$loc_lon,
    ];

    $fichero = "img/$contacto[img]";
    if (file_exists($fichero) && (($contacto['img']) != '')) {
        echo "<div class='perfil'><img src='$fichero' width='50' heigth='50' ></div>";
    } else {
        echo "<div class='perfil'><img src ='img/no_disponible.jpg'width='50' heigth='50'/></div>";
    }
    

    ?>

    <a href="contactos_modificar.php?id=<?php echo $contacto['id']; ?>">Editar contacto</a>
    <a href="#" onclick="confirmDel(<?php echo $contacto['id']; ?>)">Eliminar contacto</a>
    <a href="javascript: crearRuta(<?php echo (float)$loc_lat; ?>, <?php echo (float)$loc_lon; ?>);">Crear Ruta</a>

    <?php echo "<br/><br/>";
}

?>
<a href="#" class="crunchify-top"><img src ="img/btt.png" style="float: right;" width="50px" height="50px"></a>
</div>

</div>

<div id="contactMap">
<div id="rutaOps">


<!-- CREAR MAPA CON MARCADORES DE LA BD -->
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCw3Cufv_vLKO64Dtg9nwU9QJBeDpAQwpw&callback=initialize"
        async defer></script>

        <div id="rutaOps">
            <select id="modo_viaje" class="opciones_ruta">
                <option value="DRIVING">Coche</option>
                <option value="BICYCLING" >Bicicleta</option>
                <option value="WALKING">Caminando</option>
            </select>
        </div>
    <script>
        var map;
        var directionsDisplay;
        var image = 'img/green.png'

        function crearRuta(lat, lng) {
            if (navigator.geolocation) {
                var selectedMode = document.getElementById('modo_viaje').value;
                navigator.geolocation.getCurrentPosition(function (position) {
                document.getElementById("panel_ruta").style.display = "inline";
                    var directionsService = new google.maps.DirectionsService();

                    var request = {
                        origin: position.coords.latitude + "," + position.coords.longitude,
                        destination: lat + "," + lng,
                        travelMode: google.maps.TravelMode[selectedMode],
                        provideRouteAlternatives: true
                    };

                    directionsService.route(request, function (response, status) {
                        if (google.maps.DirectionsStatus.OK == status) {
                            directionsDisplay.setDirections(response);
                        } else {
                            alert("No existen rutas entre ambos puntos");
                        }
                    });
                });
            }
        }
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        function showPosition(position) {
            var marker2 = new google.maps.Marker({
                position: new google.maps.LatLng(position.coords.latitude, position.coords.longitude),
                icon:image,
            });
            marker2.setMap(map);
        }
        
        function initialize() {
            var myCenter = new google.maps.LatLng(41.384724, 2.172798);
            var positions = <?php
                echo json_encode($contactosArray);
                ?>;
            var mapProp = {
                center: myCenter,
                zoom: 9,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("googleMap"), mapProp);

            for (var x in positions) {
                var contacto = positions[x];
                var marker = new google.maps.Marker({
                    map: map,
                    position: {
                        lat: contacto.latitud,
                        lng: contacto.longitud
                    },
                    opacity: 1,
                    animation: google.maps.Animation.DROP,  //DROP, BOUNCE
                    title: contacto.nombre
                });

                var infowindow = new google.maps.InfoWindow();
                infowindow.setContent(contacto.nombre);
                infowindow.open(map, marker);
            }

            directionsDisplay = new google.maps.DirectionsRenderer();
            directionsDisplay.setMap(map);
            directionsDisplay.setPanel(document.getElementById("panel_ruta"));

            getLocation();
        }

    </script>
<div id="googleMap"></div>
<div id="panel_ruta"></div>
</div>
</body>
</html>