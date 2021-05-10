<?php
		session_start();
		include ("../classes/Actividad.php");
		include ("../db/genera_vistas_html.php");
?>



<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Avalon Help">
				<meta name="keywords" content="actividades, apuntarse, usuario">
				<meta name="author" content="Ester Mesa">

				<!-- Enllaç a l'arxiu CSS Extern -->
				<link rel="stylesheet" href="../css/style.css" type="text/css"/>



				<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<title>apuntarse</title>
		</head>

		<body id="actividades">

				<header>
						
					<div class="contenedor">

						<div   class="div_menu" >
							<ul class="nav">
							<li> <a href="../index.php">Inicio</a> </li>                
							<li> <a href="../sesiones/destroy_session.php"> Logout</a></li>
						

							</ul>
						</div>
						
					</div>

				

				</header>
				<section class = "contenedor">
					<div  class="division_vertical">	

						<?php




							if ($_POST['id_usuario']==null){ 
								//header ("Location : ..");
								echo "no post";
								//echo $_POST['id_usuario'];
								

							}else{
								
							/*	echo $_POST['id_usuario'];
								echo "<br>";
								echo $_POST['id_actividad'];
*/
								$_actividad = new Actividad($_POST['id_actividad']);

								$_actividad->verificar_si_esta_apuntado($_POST['id_usuario']);

								$res_apuntarse = $_actividad->apuntarse_actividad($_POST['id_usuario']);
/*
								echo "<pre>";
								print_r($_actividad);
								echo "</pre>";*/

								if($res_apuntarse){

									echo "<br>SE HA APUNTADO CON EXITO<br><hr><br><br>";
									echo "<a href='../actividades/actividades_bcn.php'>Volver</a>";

								}else{
									echo "<br><br><br>YA ESTA APUNTADO EN ESTA ACTIVIDAD<br><hr><br><br>";
									echo "<a href='../actividades/actividades_bcn.php'>Volver</a>";
								}
									
							}


						?>				

					</div>
				</section>

			

			<br>
  		<footer>Avalon Help 2021 by Wicka</footer>

		</body>

</html>
