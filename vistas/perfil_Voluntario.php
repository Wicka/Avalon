<?php
    session_start();  
    include ("../classes/Usuario.php");

    if(isset($_SESSION['alias_user'])){     
        
       $_user =new Usuario($_SESSION['alias_user']);

        if ($_user->id_tipo==2){
            //TIPO 2 VOLUNTARIO

            if(file_exists("../img/users/".$_user->id.".png")){
                  $_foto = "../img/users/".$_user->id.".png";
                }else{
                  $_foto = "../img/users/0.png";
                }

            if ($_user->id_estado !=1){
                //estado 2 de Baja
                //estado 3 solicitud de eliminacion cuenta
            //    echo "USUARIO NO ACTIVO<hr>";
                if($_user->id_estado ==2){
                  //MENU DE ACTIVAR CUENTA

                }else{
                  header("Location: ../sesiones/destroy_session.php");
                  die();
                }
            }
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
 				<meta name="keywords" content="Login, usuarios, gestion">
 				<meta name="author" content="Ester Mesa">

 				<!-- Enllaç a l'arxiu CSS Extern -->
 				<link rel="stylesheet" href="../css/style.css" type="text/css"/>

 				<!-- google font -->
 				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">


 				<title>Perfil Voluntario</title>

 		</head>


 		<body id="perfil_voluntario">

        <p class="titulo">Avalon Help</p>

 				<header>

          <div class="contenedor">

              <div   class="div_menu" >
                    <ul class="nav">
                      <li> <a href="../users_forms/form_editar.php"> Editar</a></li>
                      


                      <?php
                          if($_user->id_estado ==2){
                            //MENU DE ACTIVAR CUENTA
                            echo "<li> <a href='../crud_users/estado.php'> Alta</a></li> ";
          
                          }else{
                            echo "<li> <a href='../users_forms/form_baja.php'> Baja</a></li> ";
                          }

                        ?>
                            

                      <li> <a href="../sesiones/destroy_session.php"> Logout</a></li>

                      </ul>
              </div>
 				</header>


 			    <section class="contenedor">

            <div id="detalle_user" class="division_vertical">

                <p>
                  <?php              
                        echo "Hola  ".strtoupper($_user->alias);
                        echo " (". $_user->get_descripcion_tipo_usuario()['descripcion']." )<hr>";
                   ?>
                </p>

                <div>

                     <?php 
                        if($_user->id_estado ==2){
                          //menu activar usuario
                          echo "
                          <nav>
                            <ul>
                            <li>Activar Cuenta Para participar actividades</li>                                                     
                            </ul>
                          </nav>
                        ";
                          
                        }else{
                          //menu normal
                          echo "
                          <nav>
                            <ul>

                                <li> <a href='../actividades/actividades_bcn.php'> Ver Actividades</a></li>
                                <li> <a href='../actividades/parques.php'> Parques</a></li>
                                <li><a href='../actividades/actividades_voluntario.php'>Ver tus Actividades</a></li>      
                  
                                               
                            </ul>
                          </nav>
                        ";
                        }
                     
                     ?>
                 
                </div>

            </div>


           <div class="division_vertical">

                     <img  class='foto_perfil' src=  <?php if ($_user->id!=-1){echo $_foto;} ?> alt="foto perfil">
           

                     <div>
                          <?php
                        

                            $_actividades = $_user->get_activities_by_volunter();
                            $_count_actividades_apuntadas =  count($_actividades);
                            $_total_horas = $_user->get_total_horas();
                        
                      
                            echo "Tienes : ".$_count_actividades_apuntadas." Actividades Activas <hr>";     
                            echo "tienes acumuladas ".$_total_horas['horas']." horas de activides <hr>";                      
                    

                          ?>
                      </div>


                     
           </div>


 				</section>

 			<br><hr>

   		<footer>Avalon Help 2021 by Wicka</footer>

 		</body>

 </html>
