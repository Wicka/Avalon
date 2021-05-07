
<?php
		session_start();
		if(isset($_SESSION['alias_user'])){

			echo "user : ".$_SESSION['alias_user'];
			echo "tipo : ".$_SESSION['tipo_user'];
	//		echo "HOLA";
			
			if($_SESSION['tipo_user']==1){
				header("Location: vistas/perfil_admin.php");
	//			echo "1";
			}
			
			if($_SESSION['tipo_user']==2){
				header("Location: vistas/perfil_voluntario.php");
	//			echo "2";
			}

			if($_SESSION['tipo_user']==3){
				header("Location: vistas/perfil_usuario.php");
		//		echo "3";
			}
		//	echo "000";

		}
	
 ?>

﻿<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Avalon">
				<meta name="keywords" content="Login, usuarios, Avalon, ayuda, ong, tiempo, solidaridad">
				<meta name="author" content="Ester Mesa">

				<!-- Enllaç a l'arxiu CSS Extern -->
				<link rel="stylesheet" href="css/style.css" type="text/css"/>

				<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<!-- Enllaç a Javascript Extern -->
				<script  type="text/javascript" src="js/functions.js"></script>

				<title>Avalon</title>

		</head>

		<body id="index">

				<header>

				</header>

				<section class ="contenedor">

							<div id="div_login" class="division_vertical">
									<h1>Bienvenido a Avalon</h1><hr><br>

								<form onsubmit="return valida_login();" class="login" action="verificaciones/verifico_user.php" method="POST">

												<div class="div_form_field">
														<input  class="form_texto"  type="text" name="alias" id="alias"
																			value ='<?php
																									if(isset($_COOKIE['usuario'])){
																									echo explode('-',$_COOKIE['usuario'])[0];
																								}
																			?>'
																			placeholder="User name" onblur="rellena_alias();">
														<div class="div_form_error" id="message_nick"></div>
												</div>

												<div class="div_form_field">
														<input  class="form_texto"  type="password" name="pwd" id="pwd" placeholder="User password" onblur="rellena_login_password();">
														<div class="div_form_error" id="message_pwd"></div>
												</div>

												<div class="div_button"><input id="button" type="submit" name="login" value="LOGIN"></div>

											<div class="div_pie">
													<label>Mantener Usuario
																<input type="checkbox" id="mem_user" name="mem_user" value="mem_user">
													</label>
											</div>
									</form>

									<article class="">
											<a href="users_forms/form_altas.php" >Registrate si eres nuevo !! </a>
									</article>
							</div>

				</section>

			<br><hr>

  		<footer>Avalon 2021 by Wicka</footer>

		</body>

</html>
