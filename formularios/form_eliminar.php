<?php   session_start();
  include ("../classes/Usuario.php");


  if(isset($_SESSION['alias_user'])){
     
          $_user = new Usuario($_SESSION['alias_user']);

          if ($_user->id_tipo == 1){
            //TIPO 1 ADMIN
             
            }else{
                header("Location: ../sesiones/destroy_session.php");
                die();
            }

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

				<title>Delete User</title>

		</head>

		<body id="eliminar">
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

      <form onsubmit="return valida_form();" class="login" action="../form_eliminar.php" method="POST" enctype='multipart/form-data'>


				    <section class ="contenedor">

                <div id="div_eliminar" class="division_vertical">

                     
                        <h1><?php echo strtoupper($_user->alias)." (";
                                 echo $_user->get_descripcion_tipo_usuario()['descripcion']." )";
                                  
                                  ?></h1><hr>
                    
                    <div id="div_option_delete" class="div_radio">
                          
                          <input type="radio" id="del_voluntarios" name="radio_delete" value=11>
                          <label for="voluntario">Voluntarios</label><br>

                          <input type="radio" id="del_usuarios" name="radio_delete" value=12  checked>
                          <label for="usuario">Usuarios</label> <br>

                          <input type="radio" id="del_actividades" name="radio_delete" value=21  checked>
                          <label for="usuario">Actividades</label>  <hr>

                    </div>


                </div>

      						<div id="div_alta" class="division_vertical">


                    <p>
                      <?php
                      echo "Hola  ".strtoupper($_user->alias);
                      echo "<hr>";
                  
                      echo "<hr>";
                      ?>
                      </p>

      									<hr>
      									<div class="div_button" ><input id="button" type="submit" name="Aceptar" value="MOSTRAR"></div>

      							</div>

				      </section>

         </form>
         <section  class ="contenedor">
          <?php
            echo "RESULTADOR DE POST <HR>";
            echo "TABLA SEGUN OPCON";
          ?>

<div> solo los registros que tengan su campo id_esta a borrar por solicitud de usuario
                     <p>tabla</p>
                     <table>
                          <tr>
                            <th>alias</th>
                            <th>tipo</th>
                            <th>estado</th>
                            <th>email</th>
                            <th>disponiblidad</th>
                            <th>sector</th>
                            <th>name</th>
                            <th>surname</th>                           
                            <th>ELIMINAR</th>

                          </tr>
                          <td>pepe</td>
                          <td>pepe</td>
                          <td>pepe</td>
                          <td>pepe</td>
                          <td>pepe</td>
                          <td>pepe</td>
                          <td>pepe</td>
                          <td>pepe</td>
                          <td>pepe</td>
                        
                     </table>
                </div>
         </section>

			<br><hr>

  		<footer>Avalon Help 2021 by Wicka</footer>

		</body>

</html>
