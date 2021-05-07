<?php

    include ("../db/conexio_bbdd.php");
    //CONEXION BBDDD
     
     class Actividad
      {
            //ATRIBUTS USUARIO
               //ATRIBUTS USUARIO
              public $id;
              public $ambito;
              public $name;
              public $descripcion;
              public $habilitada;     

              public $fecha_inicio;
              public $fecha_fin;
              public $hora_inicio;
              public $hora_fin;

              public $duracion;
              public $voluntario;

              public $grupo;

              public $poblacion;
              public $direccion;
          

              
          ////////////////////////////////////////////////////////////////
          //////////////////** NEW OBJETO ACTIVIDAD **////////////////
          ////////////////////////////////////////////////////////////////
                         
              //CONSTRUCTOR
             
             function __construct($_id){        
                  
                  $this->id                 = $_id;        
                  
                  $conn=Connect_BBDD();
                  $Query = "SELECT * FROM actividades WHERE id = '$this->id'";    

                
               

                  if($conn->connect_error){
                    echo "Fallo en la conexion a la BBDD : ".$conn->connect_error;
                 //   die();
                  }

                  $_actividad = $conn->query($Query);

                  if($_actividad->num_rows > 0){
        
                    while($fila = $_actividad->fetch_assoc()) {
        
                  
                      
                      //$this->id                 = $fila['id'];
                      $this->name               = $fila['name'];
                      $this->ambito             = $fila['id_ambito'];
                      $this->descripcion        = $fila['descripcion'];
                      $this->habilitada         = $fila['habilitada'];
                      
                      $this->fecha_inicio       = $fila['fecha_inicio'];
                      $this->fecha_fin          = $fila['fecha_fin'];
                      $this->hora_inicio        = $fila['hora_inicio'];
                      $this->hora_fin           = $fila['hora_fin'];

                      $this->duracion           = $fila['duracion'];
                      $this->voluntario         = $fila['id_voluntario'];

                      $this->grupo              = $fila['id_grupo'];
                      $this->poblacion             = $fila['id_poblacion'];
                      $this->direccion          = $fila['direccion'];                
                      
                    }
          
                }

                $conn->close();
          /*
                echo "dentro de CONSTRUCTOR  : <hr>";
                echo "<pre>";
                print_r( $this );
                echo "</pre>";
          */
         
          }




          function get_all_activities(){
        
                $Query="SELECT * FROM actividades";
               
                $_arry_actividades=[];
     
                $conn=Connect_BBDD();
           
        
     
                 if($conn->connect_error){
                   echo "Fallo en la conexion a la BBDD : ".$conn->connect_error;
                   die();
                 }
     
                 $_actividades = $conn->query($Query);
     
                 if($_actividades->num_rows > 0){
       
                   while($fila = $_actividades->fetch_assoc()) {
     
                     array_push($_arry_actividades , $fila);
                     
                   }
         
               }
     
               $conn->close();
     
     
                 return $_arry_actividades;
             }
     
     











          


          ////////////////////////////////////////////////////////////////
          //////////////////** ELIMINAR USUARIO **////////////////
          ////////////////////////////////////////////////////////////////

         function delete_actividad_table(){

            $conn=Connect_BBDD();
                                    
            $QUERY_delete = "DELETE FROM `actividad` WHERE id='$this->id';";

            //EXCUTO LA QUERY I GUARDO A VARIABLE
            $registre = $conn->query($QUERY_delete);
            $conn->close();           

         }





            
          ////////////////////////////////////////////////////////////////
          //////////////////** ACTUALIZAR ACTIVIDAD **////////////////
          ////////////////////////////////////////////////////////////////

          function update_actividad_table(){

            echo "dentro de update actividad : <hr>";
            echo "<pre>";
            print_r($this);
            echo "</pre>";


                  $conn=Connect_BBDD();
                 //QUERY ALTA POR DEFECTO STATUS 1 ACTIVO
                 $_sql_Update="UPDATE `actividad`
                 SET


                 email='$this->email',
                 name='$this->name',
                 surname_01='$this->surname_01',
                 surname_02='$this->surname_02',
                 birth_date='$this->birth'


                 WHERE  alias= '$this->alias';";


                //EJECUTO LA QUERY INSERTAR NUEVO USUARIO
                $res_QUERY = $conn->query($_sql_Update);

                $conn->close();
            

          }


          ////////////////////////////////////////////////////////////////
          //////////////////** ACTUALIZAR ESTADO USUARIO **////////////////
          ////////////////////////////////////////////////////////////////

          function cambiar_estado_actividad($_nuevo_estado){




            echo "dentro de cambiar estado user : <hr>";
            echo "<pre>";
            print_r($this);
            echo "</pre>";


                  $conn=Connect_BBDD();
                 //QUERY ALTA POR DEFECTO STATUS 1 ACTIVO
                 $_sql_Update="UPDATE `actividad`
                 SET
                 id_estado='$_nuevo_estado'               
                 WHERE  alias= '$this->alias';";


                //EJECUTO LA QUERY INSERTAR NUEVO USUARIO
                $res_QUERY = $conn->query($_sql_Update);

                $conn->close();


          }




          ////////////////////////////////////////////////////////////////
          //////////////////** NUEVO USUARIO **////////////////
          ////////////////////////////////////////////////////////////////

          function create_actividad_table(){


              $_hash_pwd = $this->codifica_PWD($this->pwd);

              echo "Dentro CREATE de clase ";
              echo "<pre>";
              print_r($this);
              echo "</pre>";

                $conn=Connect_BBDD();

                $SQL_insert= "INSERT INTO `actividad`
                (`id_tipo`,
                `id_estado`,
                `id_disponibilidad`,
                `alias`,
                `email`,
                `pwd`,
                `create_date`,
                `last_connection`,
                `id_tipo_documento`,
                `num_documento`,
                `name`,
                `surname_01`,
                `surname_02`,
                `birth_date`,
                `id_titulacion`,
                `sector_estudios`)
      
                  VALUES
                  ('$this->id_tipo  ',
                    '1',
                    '$this->id_disponibilidad',
                    '$this->alias',
                    '$this->email ',
                    '$_hash_pwd ',
                    current_timestamp(),
                    current_timestamp(),
                    '$this->id_tipo_documento',
                    '$this->num_documento ',
                    '$this->name',
                    '$this->surname_01 ',
                    '$this->surname_02 ',
                    '$this->birth_date',
                    '$this->id_titulacion ',
                    '$this->sector_estudios');";



                //EJECUTO LA QUERY INSERTAR NUEVO USUARIO
                $res_Insert_QUERY = $conn->query($SQL_insert);
              
                echo "PASADO LA QUERY : <hr>";
                echo "query".$res_Insert_QUERY;
                echo "<pre>";
                print_r($res_Insert_QUERY);
                echo "</pre>";
      
      

                $conn->close();
            

          }



     /*   


          function get_all_user_by_tipo_and_by_estado(){
       //     echo "Tipo usuario : ".$this->id_tipo."<hr>"; 
      //      echo "Estado usuario : ".$this->id_estado."<hr>";
      $Query="SELECT * FROM users";

            if (($this->id_tipo!="") && ($this->id_estado!="")){
              $Query = "SELECT * FROM users WHERE id_tipo = '$this->id_tipo' AND id_estado = '$this->id_estado'";

            }else{


              if ($this->id_tipo!=""){
                $Query = "SELECT * FROM users WHERE id_tipo = '$this->id_tipo'";
              }

              if ($this->id_estado!=""){
                $Query = "SELECT * FROM users WHERE id_estado = '$this->id_estado'";

              }
            }

            $_arry_user=[];


      //      echo "query: ".$Query."<hr>";
            $conn=Connect_BBDD();
      
   

            if($conn->connect_error){
              echo "Fallo en la conexion a la BBDD : ".$conn->connect_error;
           //   die();
            }

            $_usuario = $conn->query($Query);
/*
            echo "dentro de clase user : <hr>";
            echo "<pre>";
            print_r( $_usuario );
            echo "</pre>";
   */  
/*
            if($_usuario->num_rows > 0){
  
              while($fila = $_usuario->fetch_assoc()) {

                array_push($_arry_user,$fila);
                
              }
    
          }

          $conn->close();


     /*     
          echo "dentro de clase user ARRAY : <hr>";
          echo "<pre>";
          print_r(  $_arry_user );
          echo "</pre>";

*/

/*


            return $_arry_user;
        }



*/

          ////////////////////////////////////////////////////////////////
          //////////////////** METODOS CONTROL **/////////////////////////
          ////////////////////////////////////////////////////////////////

/*

          function codifica_PWD($_pwd){       
        
            return password_hash($_pwd,PASSWORD_DEFAULT);
        
          }

          

                
          function verifica_Pwd($_pwd){

                echo "pwd que paso ". $_pwd."<hr>";
                echo "pwd que tiene objeto ". $this->pwd."<hr>";

                $_pwd_hash = trim($this->pwd);

                if (password_verify ($_pwd, $_pwd_hash)) {
                  echo "ok <hr>";
                  $login = true;
                } else {
                  $login = false;
                  echo "error <hr>";
                }
              return $login;
          }

*/


          ////////////////////////////////////////////////////////////////
          //////////////////** TABLAS AUXILIARES **///////////////////////
          ////////////////////////////////////////////////////////////////

/*
          function get_descripcion_tipo_usuario(){

            $conn=Connect_BBDD();           
            $sql = "SELECT `descripcion` FROM `aux_tipo_usuarios` 
                    WHERE `id`='$this->id_tipo' ";
              
            $tipo_usuario = $conn->query($sql);           
            $_tipo = $tipo_usuario->fetch_assoc();  
         
            $conn->close();
  
            return $_tipo;
      }
*/


  }

 ?>
