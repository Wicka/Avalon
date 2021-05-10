<?php
      function crea_lista_html($_array){
        $_lista="";

        foreach ($_array as $key => $value) {
          $_lista=$_lista."<option value='".$value['id']."'>".$value['descripcion']."</option>";

        }
          return $_lista;
      }


      
      function crea_tabla_html($_array){
        $_lista="";


        foreach ($_array as $key => $value) {
            $_lista = $_lista.
                  "<tr>
                        <td>".$value['alias']."</td>
                        <td>".$value['id_tipo']."</td>
                        <td>".$value['id_estado']."</td>
                        <td>".$value['email']."</td>
                        <td>".$value['id_disponibilidad']."</td>
                        <td>".$value['sector_estudios']."</td>
                        <td>".$value['name']."</td>
                        <td>".$value['surname_01']."</td>                       
                        <td> <a href='../users_forms/form_editar.php?id=$value[alias]'> Editar </a> </td>
                  </tr>";

        

        }
          return $_lista;
      }

      function crea_lista_actividades($_actividades){

        $_items="";

          foreach ($_actividades as $Key => $value){

              if ($_SESSION['tipo_user']==2){//VOLUNCTARIO
                            

                        if($value['id_voluntario']!=$_SESSION['id_user']){

                          $_items=$_items.
                          "<div class='div_actividades_otros'>"                
                          .$value['name']."<hr>"
                          .$value['direccion']."<br>"
                          .$value['fecha_inicio']."<hr>
                          Participantes : ".$value['num_participante']."<hr>"
                          .$value['descripcion']."<br><hr>
                          Voluntario id : ".$value['id_voluntario']."<hr>              
                          </div>";

                      }else{

                          $_items=$_items.
                          "<div class='div_actividades_propias'>"
                            .$value['name']."<hr>"
                            .$value['direccion']."<br>"
                            .$value['fecha_inicio']."<hr>
                            Participantes : ".$value['num_participante']."<hr>"
                            .$value['descripcion']."<br><hr>
                            Voluntario id : ".$value['id_voluntario']."<hr>
                            <a href='../activities_forms/form_editar.php?id=$value[id]'> Editar </a>
                            </div>";
                      }
              }else{  //USUARIO

                $_items=$_items.
                "<div class='div_actividades_usuario'>"
                  .$value['name']."<hr>"
                  .$value['direccion']."<br>"
                  .$value['fecha_inicio']."<hr>
                  Participantes : ".$value['num_participante']."<hr>"
                  .$value['descripcion']."<br><hr>                 
                  <a href='../actividades/apuntarse.php?id=$value[id]'> Apuntarse </a>
                  </div>";

              }
          }
/*

          echo "formulario actividades : <hr>";
          echo "<pre>";
          print_r(  $_actividades );
          echo "</pre>";

*/

           return $_items;

      }


      function crea_lista_actividades_apuntadas($_actividades){

        $_items="";
        foreach ($_actividades as $Key => $value){


              if ($_SESSION['tipo_user']==2){//VOLUNTARIO

                $_items=$_items.
                "<div class='div_actividades_usuario'>"
                  .$value['name']."<hr>"
                  .$value['direccion']."<br>"
                  .$value['fecha_inicio']."<hr>
                  Participantes : ".$value['num_participante']."<hr>"
                  .$value['descripcion']."<br><hr>                 
                  <a href='../actividades/cerrar.php?id=$value[id]'> Cerrar Actividad </a>
                  </div>";

              }else{

                    $_items=$_items.
                    "<div class='div_actividades_usuario'>"
                    .$value['name']."<hr>"
                    .$value['direccion']."<br>"
                    .$value['fecha_inicio']."<hr>
                    Participantes : ".$value['num_participante']."<hr>"
                    .$value['descripcion']."<br><hr>                 
                    <a href='../actividades/baja.php?id=$value[id]'> Darse de Baja </a>
                    </div>";

              }

          
        }
          
          return $_items;
      }
?>