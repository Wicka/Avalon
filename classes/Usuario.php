<?php

    include ("../db/conexio_bbdd.php");
    //CONEXION BBDDD
     
     


      class Usuario
      {
            //ATRIBUTS USUARIO
               //ATRIBUTS USUARIO
              public $id=-1;
              public $id_tipo;
              public $id_estado;
              public $id_disponibilidad;
              public $alias;
              public $email;
              public $pwd;
              public $create_date;
              public $last_connection;
              public $id_tipo_documento;
              public $num_documento;
              public $name;
              public $surname_01;
              public $surname_02;
              public $birth_date;
              public $id_titulacion;
              public $sector_estudios;

              
          ////////////////////////////////////////////////////////////////
          //////////////////** NEW OBJETO USUARIO **////////////////
          ////////////////////////////////////////////////////////////////
                    
     

              //CONSTRUCTOR
             
             function __construct($_alias ){
                  $this->alias = $_alias;              
                  
                  $conn=Connect_BBDD();
                  $Query = "SELECT * FROM users WHERE alias = '$this->alias'";

         

                  if($conn->connect_error){
                    echo "Fallo en la conexion a la BBDD : ".$conn->connect_error;
                 //   die();
                  }

                  $_usuario = $conn->query($Query);
/*
                  echo "dentro de CONSTRUCTOR user : <hr>";
                  echo "<pre>";
                  print_r( $_usuario );
                  echo "</pre>";
           */ 

                  if($_usuario->num_rows > 0){
        
                    while($fila = $_usuario->fetch_assoc()) {


                      $this->id                 = $fila['id'];
                      $this->id_tipo            = $fila['id_tipo'];
                      $this->id_estado          = $fila['id_estado'];
                      $this->id_disponibilidad  = $fila['id_disponibilidad'];
                      
                      $this->email              = $fila['email'];
                      $this->pwd                = $fila['pwd'];
                      $this->create_date        = $fila['create_date'];
                      $this->last_connection    = $fila['last_connection'];
                      $this->id_tipo_documento  = $fila['id_tipo_documento'];
                      $this->num_documento      = $fila['num_documento'];
                      $this->name               = $fila['name'];
                      $this->surname_01         = $fila['surname_01'];
                      $this->surname_02         = $fila['surname_02'];
                      $this->birth_date         = $fila['birth_date'];
                      $this->id_titulacion      = $fila['id_titulacion'];
                      $this->sector_estudios    = $fila['sector_estudios'];   
                      
                    }
          
                }

                $conn->close();
        /*  
                echo "dentro de CONSTRUCTOR objeto user : <hr>";
                echo "<pre>";
                print_r( $this );
                echo "</pre>";
        */  
         
          }





          


          ////////////////////////////////////////////////////////////////
          //////////////////** ELIMINAR USUARIO **////////////////
          ////////////////////////////////////////////////////////////////

         function delete_user_table(){

            $conn=Connect_BBDD();
                                    
            $QUERY_delete = "DELETE FROM `users` WHERE id='$this->id';";

            //EXCUTO LA QUERY I GUARDO A VARIABLE
            $registre = $conn->query($QUERY_delete);
            $conn->close();           

         }





         

          ////////////////////////////////////////////////////////////////
          //////////////////** ACTUALIZAR ULTIMA CONEXION USUARIOS **////////////////
          ////////////////////////////////////////////////////////////////

          function actualizar_Conexion(){

            $conn=Connect_BBDD();

            $_now = getdate();
            $_hoy = $_now['year']."-".$_now['mon']."-".$_now['mday']." ".$_now['hours'].":".$_now['minutes'].":".$_now['seconds'];

  
            $_QUERY ="UPDATE `users` SET `last_connection`= '$_hoy'  WHERE  `id`= '$this->id'";

            $conn->query($_QUERY);

            $conn->close();
      
        }



          ////////////////////////////////////////////////////////////////
          //////////////////** ACTUALIZAR PWD USUARIO **////////////////
          ////////////////////////////////////////////////////////////////



            function update_pwd_user(){
/*
              echo "dentro de update user : <hr>";
              echo "<pre>";
              print_r($this);
              echo "</pre>";
  */
  
                    $conn=Connect_BBDD();

                    $_sql_Update="UPDATE `users`
                    SET
                    pwd='$this->pwd'
                    WHERE  id= '$this->id';";

                //EJECUTO LA QUERY INSERTAR NUEVO USUARIO
                $res_QUERY = $conn->query($_sql_Update);

                    $conn->close();            

            }

            
          ////////////////////////////////////////////////////////////////
          //////////////////** ACTUALIZAR USUARIO **////////////////
          ////////////////////////////////////////////////////////////////

          function update_user_table(){

            echo "dentro de update user : <hr>";
            echo "<pre>";
            print_r($this);
            echo "</pre>";


                  $conn=Connect_BBDD();
                 //QUERY ALTA POR DEFECTO STATUS 1 ACTIVO
                 $_sql_Update="UPDATE `users`
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

          function cambiar_estado_user($_nuevo_estado){




            echo "dentro de cambiar estado user : <hr>";
            echo "<pre>";
            print_r($this);
            echo "</pre>";


                  $conn=Connect_BBDD();
                 //QUERY ALTA POR DEFECTO STATUS 1 ACTIVO
                 $_sql_Update="UPDATE `users`
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

          function create_user_table(){


              $_hash_pwd = $this->codifica_PWD($this->pwd);

              echo "Dentro CREATE de clase ";
              echo "<pre>";
              print_r($this);
              echo "</pre>";

                $conn=Connect_BBDD();

                $SQL_insert= "INSERT INTO `users`
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




            return $_arry_user;
        }





          ////////////////////////////////////////////////////////////////
          //////////////////** METODOS CONTROL **/////////////////////////
          ////////////////////////////////////////////////////////////////



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




          ////////////////////////////////////////////////////////////////
          //////////////////** TABLAS AUXILIARES **///////////////////////
          ////////////////////////////////////////////////////////////////


          function get_descripcion_tipo_usuario(){

            $conn=Connect_BBDD();           
            $sql = "SELECT `descripcion` FROM `aux_tipo_usuarios` 
                    WHERE `id`='$this->id_tipo' ";
              
            $tipo_usuario = $conn->query($sql);           
            $_tipo = $tipo_usuario->fetch_assoc();  
         
            $conn->close();
  
            return $_tipo;
      }



  }

 ?>
