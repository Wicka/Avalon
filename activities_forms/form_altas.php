<?php

  include ("../db/get_datas_aux.php");
  include ("../db/genera_vistas_html.php");

  session_start();

/*
	if(isset($_SESSION['alias_user'])){
		header("Location: ../vistas/perfil_usuario.php");
    echo "no sesion";
	}*/

?>

﻿<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Gestion Usuarios">
				<meta name="keywords" content="Altas, actividades, gestion">
				<meta name="author" content="Ester Mesa">

				<!-- Enllaç a l'arxiu CSS Extern -->
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>

				<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<!-- Enllaç a Javascript Extern -->
				<script  type="text/javascript" src="../js/functions.js"></script>

        <!--JQUERY -->
        <script type="text/javascript" src="../js/jquery-3.6.0.min.js" ></script>

				<title>New Activity</title>

		</head>

		<body id="altas_activities">
      <header>
        <div class="contenedor">
            <div   class="div_menu" >
                  <ul class="nav">
                    <li> <a href="../index.php">Inicio</a> </li>
                    <li> <a href="../actividades/actividades_bcn.php">Actividades</a> </li>
                    </ul>
            </div>
      </header>


    	<form onsubmit="return valida_form();" class="form" action="../crud_activities/altas.php" method="POST" enctype='multipart/form-data'>

            

      		<section class ="contenedor">

      					<div id="div_alta_01" class="division_vertical"> <hr><hr>

      			       	<span style="color:red">*</span> Nombre <br>
      							<input  class="form_texto"  type="text" name="alias" id="alias" placeholder="Escribe un alias que usaras para iniciar sesion" required onblur="rellena_alias()"  oninput="check_alias()" >
      							<div class="div_form_error" id="message_nick"></div>


      		         	<span style="color:red">*</span> Descripcion <br>
      							<input  class="form_texto"  type="email" name="email" id="email" placeholder="Escribe tu direccion de email"  required onblur="rellena_email();" oninput="check_email();">
      							<div class="div_form_error" id="message_email"></div>


		                <span style="color:red">*</span> Poblacion <br>
      	         	  <input  class="form_pwd"  type="password" name="pwd" id="pwd" placeholder="Escribe una contraseña"  required  onblur="rellena_password();">
      					    <div class="div_form_error" id="message_pwd"></div>

      							<span style="color:red">*</span> Direccion  <br>
      							<input  class="form_pwd"  type="password" name="pwd_2" id="pwd_2" placeholder="Vuelve a escribir la contraseña"  required  onblur="rellena_password_2();">
      							<div class="div_form_error" id="message_pwd_2"></div>

                    <span style="color:red">*</span> Ambito <br>
      							<input  class="form_texto"  type="text" name="alias" id="alias" placeholder="Escribe un alias que usaras para iniciar sesion" required onblur="rellena_alias()"  oninput="check_alias()" >
      							<div class="div_form_error" id="message_nick"></div>


      		         	<span style="color:red">*</span> Fecha Inicio <br>
      							<input  class="form_texto"  type="email" name="email" id="email" placeholder="Escribe tu direccion de email"  required onblur="rellena_email();" oninput="check_email();">
      							<div class="div_form_error" id="message_email"></div>


		                <span style="color:red">*</span> Fecha Fin <br>
      	         	  <input  class="form_pwd"  type="password" name="pwd" id="pwd" placeholder="Escribe una contraseña"  required  onblur="rellena_password();">
      					    <div class="div_form_error" id="message_pwd"></div>

      							<span style="color:red">*</span> Duracion  <br>
      							<input  class="form_pwd"  type="password" name="pwd_2" id="pwd_2" placeholder="Vuelve a escribir la contraseña"  required  onblur="rellena_password_2();">
      							<div class="div_form_error" id="message_pwd_2"></div>

      							<hr>

        						<!--	<input type='hidden' name='MAX_FILE_SIZE' value='100000'> <br> -->


                    <div class="div_estudios">

                        <?php
                            echo "Nivel de estudios<hr>";
                        
                            $_estudios = get_all_estudios();

                            $_lista     = crea_lista_html($_estudios);                       

                            echo "<select name='nivel_estudio'>";
                            echo $_lista;
                            echo "</select>";

                         ?>
                    </div>

                    <div class="div_sector">

                        <?php
                            echo "sector<hr>";                       

                            $_sector = get_all_sections();
                     
                            $_lista   = crea_lista_html($_sector);
                            echo "<select name='sector_estudio'>";
                            echo $_lista;
                            echo "</select>";

                         ?>
                    </div>

  						

  						</div>

              <div id="div_alta_02" class="division_vertical"> <hr><hr>

                

                    <div class="div_pie">    </div>  <hr>

                    <div class="div_button"><input id="button" type="submit" name="Aceptar" value="ACEPTAR"></div>

              </div>

          </section>


	    </form>

			<br><hr>

  		<footer>Avalon 2021 by Wicka</footer>

		</body>

</html>
