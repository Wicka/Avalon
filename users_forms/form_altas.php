<?php

  include ("../db/get_datas_aux.php");
  include ("../db/genera_vistas_html.php");

  session_start();


	if(isset($_SESSION['alias_user'])){
		header("Location: ../vistas/perfil_usuario.php");
     echo "no sesion";
	}

?>

﻿<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Gestion Usuarios">
				<meta name="keywords" content="Altas, usuarios, gestion">
				<meta name="author" content="Ester Mesa">

				<!-- Enllaç a l'arxiu CSS Extern -->
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>

				<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<!-- Enllaç a Javascript Extern -->
				<script  type="text/javascript" src="../js/functions.js"></script>

        <!--JQUERY -->
        <script type="text/javascript" src="../js/jquery-3.6.0.min.js" ></script>

				<title>New User</title>

		</head>

		<body id="altas">
      <header>
        <div class="contenedor">
            <div   class="div_menu" >
                  <ul class="nav">
                    <li> <a href="../index.php">Inicio</a> </li>
                    </ul>
            </div>
      </header>


    	<form onsubmit="return valida_form();" class="form" action="../crud_users/altas.php" method="POST" enctype='multipart/form-data'>

             <section class ="contenedor">

                <div class="division_vertical">

                      <div id="div_radio_user" class="div_radio">
                            <span style="color:red">*</span> PERFIL <br>
                            <input type="radio" id="radio_voluntario" name="tipo_usuario" value=2>
                            <label for="voluntario">Voluntario</label><br>
                            <input type="radio" id="radio_usuario" name="tipo_usuario" value=3  checked>
                            <label for="usuario">Usuario</label>  <hr>
                      </div>

                </div>

                <div class="division_vertical">

                    <div id="div_checkbox_disponibilidad" class="div_checkbox">
                        <span style="color:red">*</span> DISPONIBILIDAD <br>
                        <input type="checkbox" id="c_manana" name="manana">
                        <label for="manana">Mañanas</label><br>
                        <input type="checkbox" id="c_mediodia" name="mediodia" >
                        <label for="mediodia">Mediodia</label><br>
                        <input type="checkbox" id="c_tarde" name="tarde" >
                        <label for="tarde">Tardes</label><br>
                        <input type="checkbox" id="c_noche" name="noche" >
                        <label for="noches">Noches</label><br>  <hr>
                    </div>
              </div>


          </section>

      		<section class ="contenedor">

      					<div id="div_alta_01" class="division_vertical"> <hr><hr>

      			       	<span style="color:red">*</span> ALIAS <br>
      							<input  class="form_texto"  type="text" name="alias" id="alias" placeholder="Escribe un alias que usaras para iniciar sesion" required onblur="rellena_alias()"  oninput="check_alias()" >
      							<div class="div_form_error" id="message_nick"></div>


      		         	<span style="color:red">*</span> EMAIL <br>
      							<input  class="form_texto"  type="email" name="email" id="email" placeholder="Escribe tu direccion de email"  required onblur="rellena_email();" oninput="check_email();">
      							<div class="div_form_error" id="message_email"></div>


		                <span style="color:red">*</span> CONTRASEÑA <br>
      	         	  <input  class="form_pwd"  type="password" name="pwd" id="pwd" placeholder="Escribe una contraseña"  required  onblur="rellena_password();">
      					    <div class="div_form_error" id="message_pwd"></div>

      							<span style="color:red">*</span> REPITE PASSWORD <br>
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

  									<div class="div_pie">
  											<label>Acepto la Politica de datos
  															<input type="checkbox" id="politica" name="politica" value="politica">
  											</label>
  											<a href="../vistas/politica_datos.php" target="_blank">Leer politica de datos !! </a>
										</div><hr>

  						</div>

              <div id="div_alta_02" class="division_vertical"> <hr><hr>

                    <div id="div_documento" >
                          <span style="color:red">*</span> DOCUMENTO <br>
                          <select name="documento">
                               <option value="1">DNI</option>
                               <option value="2">Pasaporte</option>
                               <option value="3">T. Extranjeria</option>
                          </select>
                         <input  class="form_documento"  type="text" name="num_doc" id="num_doc" placeholder="Escribe tu numero idenficacion"  required  onblur="rellena_doc();">
                         <div class="div_form_error" id="message_num_doc"></div> 
                   </div><hr>

                   <span style="color:red">*</span>   Telefono <br>
                    <input  class="form_texto"  type="text" name="telefono" id="telefono" placeholder="Escribe tu telefono"  required  onblur="rellena_telefono();">
                    <div class="div_form_error" id="message_telefono"></div>


                    <span style="color:red">*</span>   NOMBRE <br>
                    <input  class="form_texto"  type="text" name="name" id="name" placeholder="Escribe tu Nombre"  required  onblur="rellena_name();">
                    <div class="div_form_error" id="message_name"></div>

                    <span style="color:red">*</span> PRIMER APELLIDO <br>
                    <input  class="form_texto"  type="text" name="surname_1" id="surname_1" placeholder="Escribe tu primer Apellido"  required  onblur="rellena_surname_1();">
                    <div class="div_form_error" id="message_surname_1"></div>

                    SEGUNDO APELLIDO <br>
                    <input  class="form_texto"  type="text" name="surname_2" id="surname_2" placeholder="Escribe tu segundo Apellido">
                    <div class="div_form_error" id="message_surname_2"></div>

                    <span style="color:red">*</span> FECHA NACIMIENTO <br>
                    <input  class="form_date"  type="date" name="birth" id="birth"  required  onblur="rellena_birth();">
                    <div class="div_form_error" id="message_birth"></div>

                    <hr>
                    <!--	<input type='hidden' name='MAX_FILE_SIZE' value='100000'> <br> -->
                    <div class="fitxer">
                        <br>
                       <label>Sube una foto de un tamaño no superior a 50 KB.
                             <br><br> <input name='userfile' type='file'> <br><br>
                        </label>
                    </div>

                    <div class="div_pie">    </div>  <hr>

                    <div class="div_button"><input id="button" type="submit" name="Aceptar" value="ACEPTAR"></div>

              </div>

          </section>


	    </form>

			<br><hr>

  		<footer>Avalon 2021 by Wicka</footer>

		</body>

</html>
