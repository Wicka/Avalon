<?php   
  session_start();
  include ("../classes/Actividad.php");


          if (isset($_GET['id'])==null){ 


          }else{


                $_actividad = new Actividad($_GET['id']);

                  //SOLO PUEDE EDITAR SUS PROPIAS
                  if($_actividad->voluntario != $_SESSION['id_user']){
                      header ("Location : ../actividades/actividades_bcn.php");
                  }
           

                  
          }


?>


<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Gestion Usuarios">
				<meta name="keywords" content="Editar, actividades, gestion">
				<meta name="author" content="Ester Mesa">

				<!-- Enllaç a l'arxiu CSS Extern -->
        <link rel="stylesheet" href="../css/style.css" type="text/css"/>

  			<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<!-- Enllaç a Javascript Extern -->
				<script  type="text/javascript" src="../js/functions.js"></script>

        <!--JQUERY -->
        <script type="text/javascript" src="../js/jquery-3.6.0.min.js" ></script>

				<title>Edit Activity</title>

		</head>

		<body id="editar_activities">
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

      <form class="login" action= "../crud_activities/editar.php" method="POST" >


				    <section class ="contenedor">

                <div class="division_vertical">

                      <hr><hr>
                   
                        <h1><?php echo strtoupper($_actividad->name);?></h1><hr>
                      <!--  <span style="color:red"> * Campos Obligatorios </span>-->
                        <hr>
                        Nombre <br>
      								
                      <input  class="form_texto"  type="text" name="name" id="name" placeholder="name"  required
                       value='<?php echo $_actividad->name;?>'>      										
                       <br>
                  
                </div>

      						<div id="div_alta" class="division_vertical">

                            <input  class="form_texto"  type="hidden" name="id_actividad" id="id_actividad" 
                             value='<?php echo $_actividad->id;?>'>      										
               
      			               	Descripcion <br>
      											<input  class="form_texto"  type="text" name="descripcion" id="descripcion" placeholder="descripcion"  required
                             value='<?php echo $_actividad->descripcion;?>'>      										
                            <br>

      			             	  Direccion <br>
      			                <input  class="form_texto"  type="text" name="direccion" id="direccion" placeholder="direccion"  required
                            value='<?php echo $_actividad->direccion;?>'>
                            <br>
      			              
      			               	Fecha Inicio <br>
      			                <input  class="form_date"  type="date" name="fecha_inicio" id="fecha_inicio" placeholder="fecha_inicio"  required
                            value='<?php echo $_actividad->fecha_inicio;?>'>



                             Participantes <br>
                            <input  class="form_texto"  type="number" name="num_participantes" id="num_participantes"  min=1 required 
                            value='<?php echo $_actividad->num_participante;?>'>
                         
                                        

      			          
      											<hr>
      											<div class="div_button"><input id="button" type="submit" name="Aceptar" value="ACEPTAR"></div>


      							</div>

				      </section>

         </form>

			<br><hr>

  		<footer>Avalon 2021 by Wicka</footer>

		</body>

</html>
