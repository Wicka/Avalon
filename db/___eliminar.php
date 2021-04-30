<?php
    session_start();
    include ("conexio_bbdd.php");
    include ("get_datas.php");
    include ("../seguridad/funciones_seguridad.php");
    include ("../sesiones/sesiones.php");
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

                    if(!isset($_SESSION['user'])){
                      header ("Location: ..");

                    }else{

                      if($_POST!=null){

                          if($_POST['eliminar']!= null ){

                            $conn=Connect_BBDD();
                            $_nick = filter_var(strtolower(trim($_SESSION['user'])), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);

                            $_user = get_user_by_nick($_nick, $conn );

                            $conn=Connect_BBDD();

                            $_id =  $_user['id'];
                            $_nom =$_user['nick'];


                            if ($_POST['eliminar']=='-1'){   // -1 BORRAR DE LA BBDD


                                  $QUERY_delete = "DELETE FROM `users` WHERE id=$_id;";

                                  //EXCUTO LA QUERY I GUARDO A VARIABLE
                                  $registre = $conn->query($QUERY_delete);

                              //    echo "<hr> Registre eliminat..<hr>";
                                  echo "Usuario : ".strtoupper($_nom). " Ha sido eliminado permanentemente...<hr>";
                                  session_destroy();
                                  echo "<a href='../index.php'>INICIO</a>";
                                  //ELIMINO IMAGEN 
                                  unlink("../img/users/".$_id.".png");
                                  //echo "elimnada imagen tambien ".$_id.".png<hr>";

                                }else{

                                    //CAMBIO STATUS 4 INACTIVO / 0 ELIMINADO
                                    $_status = $_POST['eliminar'];

                                    $_sql_Update= "UPDATE `users`
                                    SET `id_estado` = '$_status'
                                    WHERE `users`.`nick` = '$_nom';";

                                    $conn->query($_sql_Update);

                                    if ($_POST["eliminar"]==4){
                                      $msj=" Desactivado ";
                                    }else{
                                      $msj=" Eliminado temporalmente
                                            <br> Tus datos quedan en nuestra BBDD para comunicaciones
                                            <br>Siempre podras borrarlo definitivamente en el siguiente acceso ";
                                    }
                                    echo "<h1> * ".strtoupper($_nom). " Ha sido ".$msj." ...</h1><hr>";
                                    session_destroy();
                                    echo "<a href='../index.php'>INICIO</a>";
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
