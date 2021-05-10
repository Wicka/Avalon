<?php
  include ("../db/conexio_bbdd.php");

//**********************************************************************/
//**********************************************************************/
//******************DATAS TABLAS AUXILIARES*****************************/
//**********************************************************************/
//**********************************************************************/

 function get_all_estudios(){

        $conn  = Connect_BBDD();
        $_estudios=[];

        $Query = "SELECT * FROM `aux_nivel_estudios`" ;

        $estudios = $conn->query($Query);

        if($estudios->num_rows > 0){

            while($fila = $estudios->fetch_assoc()) {

                array_push($_estudios,$fila) ;
            }

        }else{
          echo "<br>No Existe este usuario";
          $_estudios=-1;
        }

        $conn->close();
        return $_estudios;
 }
 

 function get_all_sections(){

        $conn  = Connect_BBDD();
        $_sectores=[];

        $Query = "SELECT * FROM `aux_estudios`" ;

        $sectores = $conn->query($Query);

        if($sectores->num_rows > 0){

            while($fila = $sectores->fetch_assoc()) {

                array_push($_sectores,$fila) ;
            }

        }else{
          echo "<br>No Existe este usuario";
          $_sectores=-1;
        }

        $conn->close();
        return $_sectores;

 }




 //////////////////////ACTIVIDADES ///////////////////////////////



      function get_all_ambitos(){

        $conn  = Connect_BBDD();
        $_ambitos=[];

        $Query = "SELECT * FROM `aux_ambito`" ;

        $ambitos = $conn->query($Query);

        if($ambitos->num_rows > 0){

            while($fila = $ambitos->fetch_assoc()) {

                array_push($_ambitos,$fila) ;
            }

        }else{
          echo "<br>No Existe este usuario";
          $_ambitos=-1;
        }

        $conn->close();
        return $_ambitos;

      }


      

      function get_all_poblacion(){

        $conn  = Connect_BBDD();
        $_poblacion=[];

        $Query = "SELECT * FROM `aux_poblacion`" ;

        $poblacion = $conn->query($Query);

        if($poblacion->num_rows > 0){

            while($fila = $poblacion->fetch_assoc()) {

                array_push($_poblacion,$fila) ;
            }

        }else{
          echo "<br>No Existe este usuario";
          $_poblacion=-1;
        }

        $conn->close();
        return $_poblacion;

      }




//**********************************************************************/
//**********************************************************************/
//****************** ETIQUESTAS HTML RELLENAS***************************/
//**********************************************************************/
//**********************************************************************/


 /*
      function crea_lista_html($_array){
        $_lista="";

        foreach ($_array as $key => $value) {
          $_lista=$_lista."<option value='".$value['id']."'>".$value['descripcion']."</option>";

        }
          return $_lista;
      }
*/

 ?>
