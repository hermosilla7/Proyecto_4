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
				echo "<b>Ubicación secundaria:</b> ";
				echo utf8_encode($contacto['ubicacion_sec_lat']);
				echo ", ";
				echo utf8_encode($contacto['ubicacion_sec_lon']);
				echo "<br/>";
				

				$fichero="img/$contacto[img]";
                if(file_exists($fichero)&&(($contacto['img']) != '')){
                  echo "<div class='perfil'><img src='$fichero' width='50' heigth='50' ></div>";
                }
                else{
                  echo "<div class='perfil'><img src ='img/no_disponible.jpg'width='50' heigth='50'/></div>";
                }
                echo"</div>";

				//enlace a la página que modifica el producto pasándole la id (clave primaria)
					// if($prod['pro_actiu']==1){
					// 	echo "<a href='modificar.php?id=$prod[pro_id]'><i class='fa fa-pencil fa-2x fa-pull-left fa-border' title='modificar'></i></a>";
					// }
					
				echo "<br/>";
			}
			
		?>
		<button type="button" onclick="window.location.href='contactos_insert.php'">Crear contacto</button> 
		<br/><br/>
		<a href="usuarios_modificar.php">Editar perfil</a>
		<a href="index.php">Logout</a>
	</body>
</html>