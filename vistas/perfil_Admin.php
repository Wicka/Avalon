<?php
    session_start();
    include ("../db/conexio_bbdd.php");
    include ("../db/get_datas.php");

    if(isset($_SESSION['user'])){

        $conn  = Connect_BBDD();
        $_user = get_user_by_alias($_SESSION['user'], $conn );

        if ($_user!=-1  and $_user['id_tipo']==1){
            //usuario en tabla encontrado
            //usuario administrador

            if(file_exists("../img/users/".$_user['id'].".png")){
                  $_foto = "../img/users/".$_user['id'].".png";
                }else{
                  $_foto = "../img/users/0.png";
                }
        }else{
          echo "NO EXISTE USUARIO desde perfil_usuario o no esta activo<hr>";
         // header("Location: ../sesiones/destroy_session.php");
         header ("Location: ..");
        }

    }else{
      //     header("Location: ../sesiones/destroy_session.php");
      header ("Location: ..");
      die();
    }
 ?>


 ﻿<doctype html>
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


 				<title>Perfil Administrador</title>

 		</head>

 		<body id="perfil_admin">

 				<header>

          <div class="contenedor">

              <div   class="div_menu" >
                    <ul class="nav">
                      <li> <a href="../formularios/form_editar.php"> Editar</a></li>
                      <li> <a href="../formularios/form_eliminar.php"> Eliminar</a></li>
                      <li> <a href="../sesiones/destroy_session.php"> Logout</a></li>

                      </ul>
              </div>
 				</header>


 			    <section class="contenedor">

            <div id="detalle_user" class="division_vertical">

                <p>
                  <?php
                    if ($_user!=-1 and $_user['id_estado']==1){

                     
                   /*   echo "Nombre : ".$_user['name']."<br>";
                      echo "Apellido 1 : ".$_user['surname_01']."<br>";
                      echo "Apellido 2 : ".$_user['surname_02']."<br>";
                      echo "<hr>";
                      echo "Email : ".$_user['email'];
                      echo "<hr>";
                      echo "Fecha Nacimiento : ".$_user['birth_date'];
                      echo "<hr>";
                      echo "Antiguedad : ".$_user['create_date'];
                      echo "<hr>";
                      echo "Ultima conexion : ".$_user['last_connection'];
                      echo "<hr>";
                      */

                  
                      $conn =Connect_BBDD();
       
                      $_tipo_usuario=get_tipo_usuario_by_id($_user['id_tipo'], $conn);


                      echo "".strtoupper($_user['alias']);                            
                
                      echo "  ( ".$_tipo_usuario['descripcion']." )";
                      echo "<hr>";
                     }

                    ?>
                  </p>

                  <div>
                        <nav>
                            <ul>
                                <li>Listar Voluntarios</li>
                                <li>Listar Usuarios</li>
                                <li>Listar Actividades</li>
                                <li>Listar Sugerencias</li>
                            </ul>
                        </nav>
                  </div>

            </div>

<!--
           <div class="division_vertical">


                     <img  class='foto_perfil' src=<?php if ($_user!=-1){
                       echo $_foto;} ?> alt="foto perfil">
           
                      <div>
                          <?php
                            echo "tienes acumuladas X horas de activides <hr>";
                            echo "tienes X ACTIVIDADES ABIERTAS POR FINALIZAR <hr>";
                            echo "tienes acumuladas X horas de activides <hr>";
                          ?>
                      </div>
           </div>

                     -->
 				</section>

 			<br><hr>

   		<footer>Avalon 2021 by Wicka</footer>

 		</body>

 </html>
