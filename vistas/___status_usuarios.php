<?php
include ("../db/conexio_bbdd.php");
include ("../db/get_datas.php");

    session_start();

    if (!isset($_SESSION['user'])){
        header("location: ..");
    }
 ?>



 ﻿<doctype html>
 <html lang="es">

 		<head>

 				<meta charset="utf-8"/>
 				<meta name="description" content="Gestion Usuarios">
 				<meta name="keywords" content="status, usuarios, gestion">
 				<meta name="author" content="Ester Mesa">

 				<!-- Enllaç a l'arxiu CSS Extern -->
 				<link rel="stylesheet" href="../css/style.css" type="text/css"/>

 				<!-- google font -->
 				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

 				<title>Gestion Usuario</title>

 		</head>

 		<body id="status">

 				<header>

 				</header>

 				<section class ="contenedor">
 							<div class="division_vertical">

 								<form action="status_usuarios.php" method="POST">


                        <?php
                        if (isset($_SESSION['code_status'])){

                            echo "--".$_SESSION['user']."--<hr>";

                            switch ($_SESSION['code_status']) {
                              case '0':
                                // ELIMINADO TEMPORALMENTE...
                                echo "Este usuario esta eliminado temporalmente...<hr>";
                                echo "Puedes eliminarlo definitivamente...<hr>";
                                echo "Si deseas recuperarlo tendras que enviar un email a :<br>";
                                echo "email@email.com";
                              //  echo "<div class='div_button'> <a href='#'>Recuperar Cuenta</a> </div>";
                                echo "<div class='div_button'><input id='button' type='submit' name='eliminar' value='Eliminar'></div>";
                                $_SESSION['change']=$_SESSION['code_status'];
                                //unset($_SESSION['user']);
                              break;
                              case '2':
                                // BANEADO...
                                echo "Este usuario esta Baneado durante 20 dias...<hr>";
                                unset($_SESSION['user']);
                                echo "<div> <a href='..'>Inicio</a> </div>";

                              break;

                              case '3':
                                // PENDIENTE...
                                echo "Este usuario esta pendiente aprovación...<hr>";
                                unset($_SESSION['user']);
                                echo "<div> <a href='..'>Inicio</a> </div>";
                              break;
                              case '4':
                                // INACTIVO...
                                echo "Este usuario esta Inactivo...<hr>";
                                //echo "PUEDES ACTIVARLO ...";
                                echo "<div class='div_button'><input id='button' type='submit' name='activar' value='ACTIVAR'></div>";
                                $_SESSION['change']=$_SESSION['code_status'];
                              //  unset($_SESSION['user']);
                              break;

                              default:
                          //      echo "<div class='div_button'><input id='button' type='submit' name='login' value='LOGIN'></div>";
                                echo "<div> <a href='..'>Inicio</a> </div>";

                                break;
                            }

                        //    session_destroy();
                        //    unset($_SESSION['code_status']);
                      //      echo "Sesion cerrada<hr>";
                        }

                        ?>

 									</form>
 							</div>
 				</section>

        <section class ="contenedor">




      <div class="division_vertical">



              <?php
                  if($_POST!=null){

                      if($_SESSION['change']!=null){


                            switch ($_SESSION['change']) {
                              case '0':
                                      // code...
                                      //ELIMINAR DE TABLA  USUARIO

                                      $conn=Connect_BBDD();
                                      $_nick = filter_var(strtolower(trim($_SESSION['user'])), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

                                      $_user = get_user_by_nick($_nick, $conn );

                                      echo "<pre>";
                                        print_r($_user);
                                      echo "</pre>";

                                      $conn=Connect_BBDD();

                                      $_id =  $_user['id'];


                                      $QUERY_delete = "DELETE FROM `users` WHERE id=$_id;";

                                      //EXCUTO LA QUERY I GUARDO A VARIABLE
                                      $registre = $conn->query($QUERY_delete);


                                     $conn->close();

                                    echo "<hr>usuario Eliminado de nuestra Base de Datos<hr>";
                                    unset($_SESSION['user']);
                                    echo "<span style='color:white'><a href='..'>Login</a></span>";
                                    //BORRO SU imagen
                                    //ELIMINO IMAGEN
                                    unlink("../img/users/".$_id.".png");
                                break;

                                case '4':
                                    // code...
                                   //ACTIVAR USUARIO
                                  //QUERY ALTA POR DEFECTO STATUS 1 ACTIVO
                                    $_nick= $_SESSION['user'];
                                    $_status='1';

                                    $_sql_Update= "UPDATE `users`
                                    SET `id_estado` = '$_status'
                                    WHERE `users`.`nick` = '$_nick';";

                                    $conn=Connect_BBDD();
                                    //EJECUTO LA QUERY update USUARIO
                                    $res_Update_QUERY = $conn->query($_sql_Update);
                                   $conn->query($_sql_Update);
                              //   unset($_SESSION['user']);

                                   $conn->close();
                            //     header("Location: ..");
                                   echo "<hr>usuario Activado<hr>";
                                   echo "<a href='..'><span style='color:white'>IR AL PERFIL</span></a></span>";

                              break;

                              default:
                              // code...
                              break;
                            }

                      }
                  }
               ?>

          </div>
        </section>

 			<br><hr>

   		<footer>Gestion Usuario 2021 by Wicka</footer>

 		</body>

 </html>
