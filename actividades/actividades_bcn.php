<?php
include ("../classes/Actividad.php");
include ("../db/genera_vistas_html.php");
session_start();
?>

﻿<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Avalon Help">
				<meta name="keywords" content="actividades, voluntario">
				<meta name="author" content="Ester Mesa">

				<!-- Enllaç a l'arxiu CSS Extern -->
				<link rel="stylesheet" href="../css/style.css" type="text/css"/>



				<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<title>activitats_bcn</title>
		</head>

		<body id="actividades">

				<header>
						
					<div class="contenedor">

						<div   class="div_menu" >
							<ul class="nav">
							<li> <a href="../index.php">Inicio</a> </li>                
							<li> <a href="../sesiones/destroy_session.php"> Logout</a></li>
							<li> <a href="../activities_forms/form_altas.php"> Nueva</a></li>

							</ul>
						</div>
						
					</div>

				

				</header>
				<section class = "contenedor">
					<div>
						<?php 
						echo "Usuario Id : ". $_SESSION['id_user']."<br>";
						echo "Nombre : ".  $_SESSION['alias_user'];
						?>
					</div>
				</section>

				<section>
					






						<div class="div_contenedor_actividad">

								<?php									
									
									$_actividad = new Actividad(-1);
									$_arry_actividades = $_actividad->get_all_activities();

									echo crea_lista_actividades($_arry_actividades);

								?>

							
						</div>

				</section>


			<br>
  		<footer>Avalon Help 2021 by Wicka</footer>

		</body>

</html>
