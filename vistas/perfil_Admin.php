<?php
    
    session_start();    
    include ("../classes/Usuario.php");
    include ("../db/genera_vistas_html.php");
 

    if(isset($_SESSION['alias_user'])){

        $_user = new Usuario($_SESSION['alias_user']);

          if ($_user->id_tipo == 1){
               //TIPO 1 ADMIN

            if(file_exists("../img/users/".$_user->id.".png")){
                  $_foto = "../img/users/".$_user->id.".png";
                }else{
                  $_foto = "../img/users/0.png";
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

	    <!-- Enllaç a JQuery primero para usar usar en functions Extern -->
      <script  type="text/javascript" src="../js/jquery-3.6.0.min.js"></script>
      <!-- Enllaç a Javascript Extern -->
      <script  type="text/javascript" src="../js/functions.js"></script>

 				<title>Perfil Administrador</title>

 		</head>

 		<body id="perfil_admin">
   
    
 				<header>

          <div class="contenedor">
   
              <div   class="div_menu" >
              <br><br>
                    <ul class="nav">
                      <li> <a href="../formularios/form_editar.php"> Editar</a></li>
                      <li> <a href="../formularios/form_eliminar.php"> Eliminar</a></li>
                      <li> <a href="../sesiones/destroy_session.php"> Logout</a></li>

                      </ul>
              </div>
              <div class="division_vertical">
              
                   <?php echo "<br>".strtoupper($_user->alias)."<br><br><br>". $_user->get_descripcion_tipo_usuario()['descripcion']."<hr>"; ?>               
               
             </div>
             <div class="division_vertical">
             <img  class='foto_perfil' src=<?php if ($_user->id!=-1){echo $_foto;} ?> alt="foto perfil">
       
             </div>

 				</header>


 			  <form action="perfil_Admin.php" method="POST">



            <section class="contenedor">

                      <div class="division_vertical">


                            <div id="seleccion_01"  class="div_checkbox_tabla"> 
                                  <input type="checkbox" id="voluntario" name="voluntario" onChange='mostrar_menu("voluntario")' >
                                  <label for="voluntario">Mostrar Voluntarios (2)</label><br>
                                  <input type="checkbox" id="usuario" name="usuario"  onChange='mostrar_menu("usuario")'>
                                  <label for="usuario">Mostrar Usuarios (3)</label><br>
                                  <input type="checkbox" id="actividades" name="actividades"  onChange='mostrar_menu("actividades")'>
                                  <label for="actividades">Mostrar Actividades</label><br>                         
                              </div>  
                           
  
                      </div>


                      <div  class="division_vertical">
                        
                              <div id="seleccion_users"  class="div_checkbox_tabla invisible">                          
                                <input type="checkbox" id="user_activo" name="user_activo">
                                <label for="user_activos">Activos (1)</label><br>
                                <input type="checkbox" id="user_baja" name="user_baja" >
                                <label for="user_baja">Bajas (2)</label><br>
                                
                            </div>

                            <div id="seleccion_actividades"  class="div_checkbox_tabla invisible">                          
                                <input type="checkbox" id="act_abiertas" name="act_abiertas">
                                <label for="act_abiertas">Abiertas</label><br>
                                <input type="checkbox" id="act_bajas" name="act_bajas" >
                                <label for="act_bajas">Cerradas</label><br>
                                
                            </div>


                       <div>
                                   

                                                    
            </section>
            <br>

            <section  class="contenedor">

                     <input type="submit" value="Mostrar" name ="btn_mostrar">

             </section>


         
         </form>

         <section class="contenedor">

          <div id="listados" class="division_vertical">


                <div>
                  <?php

                
                    if( $_POST !=null){
                 //     echo "si post<hr>";

                            if(isset($_POST['actividades'])){

                                echo "<hr>MOSTRAR TABLA ACTIVIDADES<hr>"; 
                            }else{
                                    $arry_users=[];
                                    $_user_registro = new Usuario("");

                 //                   echo "SELECCIONADO A USUARIO O A VOLUNTARIOS<HR>";

                                    if(isset($_POST['user_activo'])){
                                      $_user_registro->id_estado=1;
                                    }

                                    if(isset($_POST['user_baja'])){
                                      $_user_registro->id_estado=2;
                                    }
                                    

                                    if(isset($_POST['usuario'])){
                //                      echo "USUARIO<HR>";
                                    $_user_registro->id_tipo=3; 
                                    }

                                    if(isset($_POST['voluntario'])){
              //                        echo "VOLUNTARIO<HR>";
                                      $_user_registro->id_tipo=2; 
                                    }
/*
                                    echo "<pre>";
                                    print_r(  $_user_registro);
                                    echo "</pre>";
                                    */
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
                                        <th>EDITAR</th>  
                                    </tr>";
                               
                                    echo crea_tabla_html($arry_users );
                                    echo " </table>";
                                    
                            }

                     

                    }else{
                      echo "NO POST <hr>";
                    }


                  ?>                

                       
                         
                    
                </div>

          </div>


        
                  
          </section>

 			<br><hr>

   		<footer>Avalon Help 2021 by Wicka</footer>
   

 		</body>

 </html>
