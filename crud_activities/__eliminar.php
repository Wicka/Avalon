<?php
    session_start();
    include ("../classes/Usuario.php");
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

   				<title>mensaje Usuario</title>

 		</head>

 		<body id="msj_eliminar">

        <header>
            <br><hr><br>
            <h1>SENTIMOS QUE TE VAYAS ....</h1>
            <br><hr><br>
        </header>
        <section class ="contenedor">

              <br><hr><br>
 							<div class="division_vertical" id="msj_eliminar">

                <?php

                    if(!isset($_SESSION['alias_user'])){
                      header ("Location: ..");

                    }else{

                      if($_POST!=null){

                          if($_POST['eliminar']!= null ){

                            $_user=new Usuario($_SESSION['alias_user']);

                 
                            if ($_POST['eliminar']=='0'){   // -1 BORRAR DE LA BBDD


                                

                              //    echo "<hr> Registre eliminat..<hr>";
                                  echo "Usuario : ".strtoupper($_user->alias). " Ha sido eliminado permanentemente...<hr>";

                                  session_destroy();
                                  echo "<a href='../index.php'>INICIO</a>";
                                  //ELIMINO IMAGEN 
                                  unlink("../img/users/".$_user->id.".png");
                                  //echo "elimnada imagen tambien ".$_id.".png<hr>";

                                }else{
                                    
                                    if ($_POST['eliminar']=='2'){
                                        $_user->cambiar_estado_user(2);
                                        header("Location: ..");
                                        die();
                                    }
                                    
                                    if ($_POST['eliminar']=='3'){
                                        $_user->cambiar_estado_user(3);
                                        header("Location: ..");
                                        die();
                                    }
                                                          

                                }

                          }else{
                            echo "CAMPOS DEL POST ALGUNO VACIO<hr>";
                            header("Location: ../formularios/form_altas.php");
                            die();
                          }

                      }else{
                        echo "NADA POR POST PARA ALTA USUARIO .";
                        header("Location: ..");
                       die();
                     }
                }


                 ?>
 							</div>
 				</section>

 			<br><hr>

   		<footer>Gestion Usuario 2021 by Wicka</footer>

 		</body>

 </html>
