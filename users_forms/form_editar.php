<?php   session_start();

  //include ("../db/conexio_bbdd.php");
  //include ("../db/get_datas.php");
  include ("../classes/Usuario.php");


if (isset($_GET['id'])==null){
 

      if(isset($_SESSION['alias_user'])){
        //$conn  = Connect_BBDD();
        //$_user = get_user_by_alias($_SESSION['alias_user'], $conn );
        $_user = new Usuario($_SESSION['alias_user']);

    }else{
    //     header("Location: ../sesiones/destroy_session.php");
    //    die();
    echo "NO SESSION USER<HR>";
      }

}else{


      $_user = new Usuario($_GET['id']);
    //  echo "llego con get <hr>";

        
}


?>


 ﻿<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Gestion Usuarios">
				<meta name="keywords" content="Editar, usuarios, gestion">
				<meta name="author" content="Ester Mesa">

				<!-- Enllaç a l'arxiu CSS Extern -->
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>

  			<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<!-- Enllaç a Javascript Extern -->
				<script  type="text/javascript" src="../js/functions.js"></script>

        <!--JQUERY -->
        <script type="text/javascript" src="../js/jquery-3.6.0.min.js" ></script>

				<title>Edit User</title>

		</head>

		<body id="editar">
      <header>

        <div class="contenedor">

              <div   class="div_menu" >
                  <ul class="nav">
                    <li> <a href="../index.php">Inicio</a> </li>
                    <li> <a href="form_cambiar_pwd.php">Contraseña</a> </li>
                    <li> <a href="../sesiones/destroy_session.php"> Logout</a></li>

                  </ul>
              </div>
        </div>

      </header>

      <form onsubmit="return valida_form();" class="login" action="../crud_users/editar.php" method="POST" enctype='multipart/form-data'>


				    <section class ="contenedor">

                <div class="division_vertical">

                      <hr><hr>
                      <?php
                          if(file_exists("../img/users/".$_user->id.".png")){
                                $_foto = "../img/users/".$_user->id.".png";
                              }else{
                                $_foto = "../img/users/0.png";
                            }

                            echo "<img src=$_foto alt='foto perfil'>";

                        ?>
                        <h1><?php echo strtoupper($_user->alias);?></h1><hr>
                      <!--  <span style="color:red"> * Campos Obligatorios </span>-->
                        <hr>
                        <input type="hidden" name="alias_oculto" id="alias_oculto" value=<?php echo  $_user->alias ?>>

                        <!--	<input type='hidden' name='MAX_FILE_SIZE' value='100000'> <br> -->
                        <div class="fitxer">
                            <br>
                            <label>Cambiar Imagen <br> <br> - tamaño no superior a 50 KB. -
                                  <br><br> <input name='userfile' type='file'> <br><br>
                            </label>

                        </div>
                        <br>  <br>
                        <hr>
                </div>

      						<div id="div_alta" class="division_vertical">


      			               	<span style="color:red">*</span> EMAIL <br>
      											<input  class="form_texto"  type="email" name="email" id="email" placeholder="email"  required
                            onblur="rellena_email();" oninput="check_email();"
                            value='<?php echo $_user->email;?>'>
      											<div class="div_form_error" id="message_email"></div>

      			             		<span style="color:red">*</span>   NAME <br>
      			                <input  class="form_texto"  type="text" name="name" id="name" placeholder="name"  required
                            onblur="rellena_name();" value='<?php echo $_user->name;?>'>
      			                <div class="div_form_error" id="message_name"></div>

      			               	<span style="color:red">*</span> SURNAME_1 <br>
      			                <input  class="form_texto"  type="text" name="surname_1" id="surname_1" placeholder="surname_1"  required
                            onblur="rellena_surname_1();" value='<?php echo $_user->surname_01;?>'>
      			                <div class="div_form_error" id="message_surname_1"></div>

      			               	SURNAME_2 <br>
      			                <input  class="form_texto"  type="text" name="surname_2" id="surname_2" placeholder="surname_2"
                            value='<?php echo $_user->surname_02;?>'>
      			                <div class="div_form_error" id="message_surname_2"></div>

      			               	<span style="color:red">*</span> BIRTH DATE <br>
      			                <input  class="form_date"  type="date" name="birth" id="birth" placeholder="birth"  required
                            onblur="rellena_birth();" value='<?php echo $_user->birth_date;?>'>


      			                <div class="div_form_error" id="message_birth"></div>
<!--
      			                <span style="color:red">*</span> PASSWORD <br>
      			            	  <input  class="form_pwd"  type="password" name="pwd" id="pwd" placeholder="User password"  required
                            onblur="rellena_password();" >
      									    <div class="div_form_error" id="message_pwd"></div>

      											<span style="color:red">*</span> REPITE PASSWORD <br>
      											<input  class="form_pwd"  type="password" name="pwd_2" id="pwd_2" placeholder="User password"  required
                            onblur="rellena_password_2();" >
      											<div class="div_form_error" id="message_pwd_2"></div>

-->
      											<hr>
      											<div class="div_button"><input id="button" type="submit" name="Aceptar" value="ACEPTAR"></div>


      							</div>

				      </section>

         </form>

			<br><hr>

  		<footer>Avalon 2021 by Wicka</footer>

		</body>

</html>
