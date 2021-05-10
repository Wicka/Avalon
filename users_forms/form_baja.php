<?php   
  session_start();
  include ("../classes/Usuario.php");


  if(isset($_SESSION['alias_user'])){
     
          $_user = new Usuario($_SESSION['alias_user']);    

      }else{
          header("Location: ../sesiones/destroy_session.php");
          die();
        }

?>


<doctype html>
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

				<title>Baja User</title>

		</head>

		<body id="baja">
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

      <form onsubmit="return valida_form();" class="login" action="../crud_users/eliminar.php" method="POST" enctype='multipart/form-data'>


				    <section class ="contenedor">

                <div id="div_eliminar" class="division_vertical">

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
                    
                        <span style="color:red"> SEGURO QUIERES DARTE DE BAJA DE AVALON HELP ?</span>
                        <hr>

                        <div class="eliminar_op">
                 
                      
                            <input type="radio" id="baja" name="eliminar" value="2"  checked>
                            <label for="permanecer">Darse de Baja</label>
                            <p>se conservaran los datos para comunicaciones</p><br><hr>

                            <input type="radio" id="eliminar" name="eliminar" value="3" >
                            <label for="eliminar"><span style="color:red">Eliminar <br> * Se perderan todos los datos y tu historial actividades y horas !!.</span></label><br><hr>

                        </div>
                        <div class="div_cancelar">
                            <a id="cancelar_botones" href="..">CANCELAR</a>
                        </div>
                        <hr>
                </div>

      						<div id="div_alta" class="division_vertical">


                    <p>
                      <?php
                      echo "Hola  ".strtoupper($_user->alias);
                      echo "<hr>";
                      echo "Nombre : ".$_user->name."<br>";
                      echo "Apellido 1 : ".$_user->surname_01."<br>";
                      echo "Apellido 2 : ".$_user->surname_02."<br>";
                      echo "<hr>";
                      echo "Email : ".$_user->email;
                      echo "<hr>";
                      echo "Fecha Nacimiento : ".$_user->birth_date;
                      echo "<hr>";
                      echo "Antiguedad : ".$_user->create_date;
                      echo "<hr>";
                      echo "Ultima conexion : ".$_user->last_connection;
                      echo "<hr>";
                      ?>
                      </p>

      									<hr>
      									<div class="div_button" ><input id="button" type="submit" name="Aceptar" value="ELIMINAR"></div>

      							</div>

				      </section>

         </form>

			<br><hr>

  		<footer>Avalon Help 2021 by Wicka</footer>

		</body>

</html>
