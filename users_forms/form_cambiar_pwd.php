<?php   
  session_start();
  include ("../classes/Usuario.php");

  if(isset($_SESSION['alias_user'])){
          //$conn  = Connect_BBDD();
          //$_user = get_user_by_alias($_SESSION['alias_user'], $conn );
          $_user = new Usuario($_SESSION['alias_user']);

      }else{
          header("Location: ../sesiones/destroy_session.php");
          die();
        }
?>


﻿<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Gestion Usuarios">
				<meta name="keywords" content="cambiar, usuarios, gestion">
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

		<body id="cambiar_pwd">
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

      <form onsubmit="return valida_pwd_nuevos();" class="login" action="form_cambiar_pwd.php" method="POST" enctype='multipart/form-data'>


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
                        <hr><br><br><hr>

                </div>

      						<div id="div_alta" class="division_vertical">

      			               Introduce tu contraseña <br><br>
      			            	 <input  class="form_pwd"  type="password" name="actual_pwd" id="actual_pwd" placeholder="User password"  required >
                          <br><br>  <hr><hr><br>
                        <!--    <div class="div_form_error" id="message_pwd"></div> -->

      											Nueva contraseña <br>
      											<input  class="form_pwd"  type="password" name="pwd" id="pwd" placeholder="New password"  required
                            onblur="rellena_password();" >
      											<div class="div_form_error" ><small id="message_pwd"></small></div>

                            Repite Nueva contraseña
                            <input  class="form_pwd"  type="password" name="pwd_2" id="pwd_2" placeholder="Repeat password"  required
                            onblur="rellena_password_2();" >
                            <div class="div_form_error"><small id="message_pwd_2"></small></div>


      											<hr>
      											<div class="div_button"><input id="button" type="submit" name="cambiar" value="CAMBIAR"></div>


      							</div>

				      </section>

         </form>
         <div id ="resultado" class="division_vertical">

             <?php
               if($_POST==null){
                  //  echo "no post <hr> ";
               }else {
                //    echo "si post <hr>";
                    if($_POST['actual_pwd']==null){
                //        echo "no hay contraseña actual <hr>";
                      }else{
                //          echo "si hay contraseña actual <hr>";
                          //VERIFICA SI PWD ES CORRECTO
                //          echo "VERIFICAR PWD<hr>";
              


                          if ($_user->verifica_Pwd($_POST['actual_pwd'])){
                //            echo "PWD CORRECTO : <hr>";
                //            echo "VOY A CAMBIAR TU CONTRASEÑA <hr>";
                //            echo "CODIFICARE TU NUEVA PWD<hr>";
                            $_user->pwd =  $_user->codifica_PWD($_POST['pwd']);
                            //genero sql update y guardo nueva $_nueva_pwd_hash

                            $_user->update_pwd_user();

                         //   $conn=Connect_BBDD();
                        
                              echo "CONTRASEÑA MODIFICADA<hr>";
                          }else{
                              echo "CONTRASEÑA INCORRECTA<hr>";
                          }
                      }
               }
             ?>
         </div>

			<br><hr>

  		<footer>Gestion Usuario 2021 by Wicka</footer>

		</body>

</html>
