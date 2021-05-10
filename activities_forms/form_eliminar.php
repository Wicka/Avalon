<?php   
  session_start();
  include ("../classes/Usuario.php");  
  include ("../db/genera_vistas_html.php"); 

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

      <form action="form_eliminar.php" method="POST" >


				    <section class ="contenedor">

                <div id="div_eliminar" class="division_vertical">

                     
                        <h1><?php echo strtoupper($_user->alias)." (";
                                 echo $_user->get_descripcion_tipo_usuario()['descripcion']." )";
                                  
                                  ?></h1><hr>
                    
                    <div id="div_option_delete" class="div_radio">
                          
                          <input type="radio" id="del_voluntarios" name="radio_delete" value=12>
                          <label for="voluntario">Voluntarios</label><br>

                          <input type="radio" id="del_usuarios" name="radio_delete" value=13  checked>
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
               if( $_POST !=null){

                 // echo $_POST['radio_delete'];
                  //12 MOSTRAR VOLUNTARIOS
                  //13 MOSTRAR USUARIOS
                  //12 MOSTRAR ACTVIDADES


                  $_actividades=[];

                  //    echo "<hr>MOSTRAR TABLA ACTIVIDADES<hr>"; 

                  

                if($_POST['radio_delete']==21){ //ACTIVIDADES

                  $_user_actividades = $_user->get_all_activities($_POST['radio_delete']);
                      
                  echo "<table>
                  <tr>
                      <th>voluntario</th>
                      <th>participante</th>
                      <th>fecha_inicio</th>
                      <th>hora_inicio</th>
                      <th>id_ambito</th>
                      <th>id_poblacion</th>
                      <th>name</th>                                 
                      <th>id_estado</th>  
                      <th>ELIMINAR</th>  
                  </tr>";
             
                  echo crea_tabla_Actividades_html_del($_user_actividades );
                  echo " </table>";     

                }else{

                 
                    $arry_users=[];
                    $_user_registro = new Usuario("");
                    $_user_registro->id_estado=3;

  //                   echo "SELECCIONADO A USUARIO O A VOLUNTARIOS<HR>";

                  if($_POST['radio_delete']==12){//VOLUNTARIO
                      $_user_registro->id_tipo=2; 

                  }

                  if($_POST['radio_delete']==13){//USUARIO
                     $_user_registro->id_tipo=3; 

                  }

               /*   echo "<pre>";
                  print_r(  $_user_registro);
                  echo "</pre>";*/
                  
                  $arry_users = $_user_registro->get_all_user_by_tipo_and_by_estado();

                  
                  echo "<table>
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
                  </tr>";
             
                  echo crea_tabla_html_del($arry_users );
                  echo " </table>";



                }





               }

         
         
         ?>
        

                   
         </section>

			<br><hr>

  		<footer>Avalon Help 2021 by Wicka</footer>

		</body>

</html>
