<?php
  include ("../db/get_datas_aux.php");
  include ("../db/genera_vistas_html.php");
  session_start();


	if(isset($_SESSION['alias_user'])){
	//	header("Location: ../vistas/perfil_usuario.php");
    //	echo $_SESSION['alias_user'];
	}

?>

<doctype html>
<html lang="es">

		<head>

				<meta charset="utf-8"/>
				<meta name="description" content="Gestion Usuarios">
				<meta name="keywords" content="Altas, actividades, gestion">
				<meta name="author" content="Ester Mesa">

				<!-- Enllaç a l'arxiu CSS Extern -->
        		<link rel="stylesheet" href="../css/style.css" type="text/css"/>

				<!-- google font -->
				<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">

				<!-- Enllaç a Javascript Extern -->
				<script  type="text/javascript" src="../js/functions.js"></script>

				<!--JQUERY -->
				<script type="text/javascript" src="../js/jquery-3.6.0.min.js" ></script>

				<title>New Activity</title>

		</head>

		<body id="altas_activities">

     		 <header>
				<div class="contenedor">
					<div   class="div_menu" >
						<ul class="nav">
							<li> <a href="../index.php">Inicio</a> </li>
							<li> <a href="../actividades/actividades_bcn.php">Actividades</a> </li>
							</ul>
					</div>
			</header>

		<section  class ="contenedor">
			<h2>Nueva Actividad</h2>
		</section>

    	<form onsubmit="return valida_form_actividades();" class="form" action="../crud_activities/altas.php" method="POST" >
						
						<input type="hidden" id="id_user" name ="id_user" value='<?php echo $_SESSION['id_user'] ?>'>
            
      		<section class ="contenedor">

      					<div id="div_alta_01" class="division_vertical"> <hr><hr>

      			       			<div class="div_alta">

									 <span style="color:red">*</span> Nombre <br>
									<input  class="form_texto"  type="text" name="nombre_actividad" id="nombre_actividad" placeholder="Nombre actividad" required onblur="rellena_nombre_actividad()" >
									<div class="div_form_error" id="message_nombre_actividad"></div>


									<span style="color:red">*</span> Descripcion <br>
									<input  class="form_texto"  type="text" name="descripcion_actividad" id="descripcion_actividad" placeholder="Explica brevemente la actividad"  required onblur="rellena_descripcion_actividad();">
									<div class="div_form_error" id="message_descripcion_actividad"></div>



									<span style="color:red">*</span> Participantes <br>
									<input  class="form_texto"  type="number" name="num_participantes" id="num_participantes"  min=1 required onblur="rellena_num_participantes();">
									<div class="div_form_error" id="message_num_participantes"></div>



									<div id="div_checkbox_adaptada" class="div_checkbox">							
                	    				                   
									    <input type="checkbox" id="adaptada" name="adaptada">
										<label for="adaptada">Adaptada</label><br>
                        
                    				</div>
															
								</div><hr>






								

								<div class="div_alta">
										<?php
											echo "<span style='color:red'>*</span>Poblacion";                        
											$_poblacion = get_all_poblacion();
											$_lista     = crea_lista_html($_poblacion); 
											echo "<select name='poblacion'>";
											echo $_lista;
											echo "</select>";
										?>
										<br><br>
										<span style="color:red">*</span> Direccion  <br>
      									<input  class="form_texto"  type="text" name="direccion" id="direccion" placeholder="Indica la direccion de la actividad"  required  onblur="rellena_direccion_actividad();">
      									<div class="div_form_error" id="message_direccion"></div>
			
								</div><hr>

  						</div>

              <div id="div_alta_02" class="division_vertical"> <hr><hr>

			  <div class="div_alta">
                        <?php
                            echo "<span style='color:red'>*</span>ambito<hr>";  
                            $_ambito = get_all_ambitos();                     
                            $_lista   = crea_lista_html($_ambito);
                            echo "<select name='ambito'>";
                            echo $_lista;
                            echo "</select>";

                         ?>
                    </div>

								<div class ="div_alta">
								<span style="color:red">*</span> Fecha Inicio <br>
      							<input  class="form_texto"  type="date" name="fecha_inicio" id="fecha_inicio"   required onblur="rellena_fecha_inicio();">
      							<div class="div_form_error" id="message_fecha_inicio"></div>


								<input  class="form_texto"  type="time" name="hora_inicio" id="hora_inicio"   required onblur="rellena_hora_inicio();">
      							<div class="div_form_error" id="message_hora_inicio"></div>


		                		<span style="color:red">*</span> Fecha Fin <br>
      	         	  			<input  class="form_texto"  type="date" name="fecha_fin" id="fecha_fin"  required  onblur="rellena_fecha_fin();">
      					    	<div class="div_form_error" id="message_fecha_fin"></div>

								<input  class="form_texto"  type="time" name="hora_fin" id="hora_fin"   required onblur="rellena_hora_fin();">
      							<div class="div_form_error" id="message_hora_fin"></div>

      							<span style="color:red">*</span> Duracion  <br>
      							<input  class="form_number"  type="number" name="duracion" id="duracion" min =1 max =24  required  onblur="rellena_duracion();">
      							<div class="div_form_error" id="message_duracion"></div>

      							<hr>

					</div>

                    <div class="div_pie">    </div>  <hr>

                    <div class="div_button"><input id="button" type="submit" name="Aceptar" value="ACEPTAR"></div>

              </div>

          </section>


	    </form>

			<br><hr>

  		<footer>Avalon 2021 by Wicka</footer>

		</body>

</html>
