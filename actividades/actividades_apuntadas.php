<?php
include ("../classes/Usuario.php");
include ("../db/genera_vistas_html.php");
session_start();
?>

﻿<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Avalon Help">
				<meta name="keywords" content="actividades, apuntadas, usuario">
				<meta name="author" content="Ester Mesa">

				<!-- Enllaç a l'arxiu CSS Extern -->
				<link rel="stylesheet" href="../css/style.css" type="text/css"/>



				<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<title>apuntadas activitats_bcn</title>
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
						echo "Usuario Id : ". $_SESSION['id_user']." ( ".  $_SESSION['tipo_user']." )<br>";
						echo "Nombre : ".  $_SESSION['alias_user']."<hr>";
						$_user=new Usuario ($_SESSION['alias_user']);
                        $_actividades = $_user->get_activities_by_user();
                        $_count_actividades_apuntadas =  count($_actividades);
                    
                        echo "Estas apuntado a : ".$_count_actividades_apuntadas." Actividades <hr>";
					
						?>
					</div>
				</section>

				<section class ="contenedor">

                <div class="div_contenedor_actividad">

                        <?php

                
						echo crea_lista_actividades_apuntadas($_actividades);

                        ?>
                   </div>

				</section>

            

			<br>
  		<footer>Avalon Help 2021 by Wicka</footer>

		</body>

</html>
