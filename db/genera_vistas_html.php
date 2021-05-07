<?php
 

      //include ("../json/actividades.php");

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
                        <td> <a href='../formularios/form_editar.php?id=$value[alias]'> Editar </a> </td>
                  </tr>";

        

        }
          return $_lista;
      }

      function crea_lista_actividades($_actividades){

        $_items="";

          foreach ($_actividades as $Key => $value){
              $_items=$_items.
              "<div class='div_actividades'>"
              .$value['direccion'].
              "</div>";
          }


/*

          echo "formulario actividades : <hr>";
          echo "<pre>";
          print_r(  $_actividades );
          echo "</pre>";

*/

           return $_items;

      }
?>