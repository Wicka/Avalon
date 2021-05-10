<?php
    session_start();
    include ("../classes/Usuario.php");
?>



 <doctype html>
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

 		<body id="acti_eliminar">

        <header>
            <br><hr><br>        
            <br><hr><br>
        </header>
        <section class ="contenedor">

              <br><hr><br>
 							<div class="division_vertical" id="msj_eliminar">

                <?php


                      if($_GET!=null){

                          if(isset($_GET['id'])){

                            $_users_actividad=new Usuario($_GET['id']);

                            echo "<pre>";
                            print_r($_users_actividad);
                            echo "</pre>";  
                            $_users_actividad->elimina_actividad($_GET['id']);
                            header("Location: ..");
                           die();
                          }

                          if(isset($_GET['alias'])){

                            $_users=new Usuario($_GET['alias']);
                            $_users->delete_user_table();

                            echo "<pre>";
                            print_r($_users);
                            echo "</pre>";      
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
