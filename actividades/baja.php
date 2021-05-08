<?php
include ("../classes/Actividad.php");
include ("../db/genera_vistas_html.php");
session_start();





if (isset($_GET['id'])==null){ 

}else{

      $_actividad = new Actividad($_GET['id']);
        
}



?>

﻿<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Avalon Help">
				<meta name="keywords" content="actividades, baja, usuario">
				<meta name="author" content="Ester Mesa">

				<!-- Enllaç a l'arxiu CSS Extern -->
				<link rel="stylesheet" href="../css/style.css" type="text/css"/>



				<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<title>activitats_bcn</title>
		</head>

		<body id="actividades">

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
				<section class = "contenedor">
					<div  class="division_vertical">
						<?php 
                         
                                echo "<div class='div_actividades_propias'>"
                                .$_actividad->name."<hr>"
                                .$_actividad->direccion."<br>"
                                .$_actividad->fecha_inicio."<hr>
                                Participantes : ".$_actividad->num_participante."<hr>"
                                .$_actividad->descripcion."<br><hr>
                                Voluntario id : ".$_actividad->voluntario."<hr>
                        
                                </div>";
                            
						?>
					</div>

                    <div  class="division_vertical">
						<?php 

                              echo "Usuario Id : ". $_SESSION['id_user']." ( ".  $_SESSION['tipo_user']." )<br>";
                              echo "Nombre : ".  $_SESSION['alias_user'];
                              echo "<hr><br>";
                           
                          //    $_plazas=$_actividad->get_num_plazas();                             
                          //    $_plazas_libres = $_actividad->num_participante - $_plazas['plazas'];

                          //    if ( $_plazas_libres > 0){
                           //         echo "Quedan ".$_plazas_libres." plazas libres <br><hr><br>";  
                                   
                               $id_user = $_SESSION['id_user'];
                               $_actividad->delete_user_actividad($id_user);
                                   
                                    
                         /*           echo    "<form action = '../crud_activities/apuntarse.php' method='POST'>
                                                <input type='hidden' name='id_usuario' id='id_usuario' value =' $id_user'>
                                                <input type='hidden' name='id_actividad' id='id_actividad' value =' $_actividad->id'>
                                                <input type='submit' value='Darme de Baja'>
                                            </form>";*/
                          //    }else{
                           //     echo "NO Quedan plazas libres ";        
                          //    }
                                            
                            
						?>

					</div>
				</section>

				<section>

						<div class="div_contenedor_actividad">		


						
						</div>

				</section>


			<br>
  		<footer>Avalon Help 2021 by Wicka</footer>

		</body>

</html>
