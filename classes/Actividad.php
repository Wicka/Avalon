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
              public $adaptada;     

              public $fecha_inicio;
              public $fecha_fin;
              public $hora_inicio;
              public $hora_fin;

              public $duracion;
              public $voluntario;

              public $grupo;

              public $poblacion;
              public $direccion;

              public $num_participante;     
              public $llena;       
              public $id_estado;           
       
          

              
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
                      $this->adaptada           = $fila['adaptada'];
                      
                      $this->fecha_inicio       = $fila['fecha_inicio'];
                      $this->fecha_fin          = $fila['fecha_fin'];
                      $this->hora_inicio        = $fila['hora_inicio'];
                      $this->hora_fin           = $fila['hora_fin'];

                      $this->duracion           = $fila['duracion'];
                      $this->voluntario         = $fila['id_voluntario'];

                      $this->grupo              = $fila['id_grupo'];
                      $this->poblacion          = $fila['id_poblacion'];
                      $this->direccion          = $fila['direccion'];     
                      
                      $this->num_participante   = $fila['num_participante'];                      

                      $this->llena              = $fila['llena'];  
                      $this->id_estado          = $fila['id_estado'];  
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


            function delete_user_actividad($_iduser){
              $conn=Connect_BBDD();

              $Query="DELETE FROM `apuntados_actividad` WHERE id_user = '$_iduser' AND id_actividad = '$this->id' ";
              
              $registre = $conn->query($Query);
              $conn->close();     
              echo "Ha sido dado de Baja"; 

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
            echo "dentro de actividad : <hr>";
            echo "<pre>";
            print_r($this);
            echo "</pre>";


                  $conn=Connect_BBDD();
                 //QUERY ALTA POR DEFECTO STATUS 1 ACTIVO


                 $_sql_Update=" UPDATE `actividades` SET
                 
                 name='$this->name',
                 descripcion='$this->descripcion',
                 direccion='$this->direccion',
                 fecha_inicio='$this->fecha_inicio',
                 id_estado='$this->id_estado',
                 num_participante='$this->num_participantes'
                 WHERE  id = '$this->id';";


                //EJECUTO LA QUERY INSERTAR NUEVO USUARIO
                $res_QUERY = $conn->query($_sql_Update);

                echo "<pre>";
                print_r($res_QUERY);
                echo "</pre>";

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


            

              echo "Dentro CREATE de clase ";
              echo "<pre>";
              print_r($this);
              echo "</pre>";

                $conn=Connect_BBDD();

                $SQL_insert= "INSERT INTO `actividades`
                (`id_ambito`,
                `adaptada`,
                `name`,
                `descripcion`,
                `num_participante`,
                `fecha_inicio`,
                `fecha_fin`,

                `hora_inicio`,
                `hora_fin`,

                `duracion`,
                `id_voluntario`,

                `id_poblacion`,
                `direccion`,
                `id_grupo`,
                `llena`,
                `id_estado`
                
                )
      
                  VALUES
                  ('$this->ambito  ',
                    '$this->adaptada',
                    '$this->name',
                    '$this->descripcion',
                    '$this->num_participante ',                    
                    '$this->fecha_inicio',
                    '$this->fecha_fin ',

                    '$this->hora_inicio',
                    '$this->hora_fin ',

                    '$this->duracion ',
                    '$this->voluntario',

                    '$this->poblacion ',
                    '$this->direccion',
                    '$this->grupo',
                    '0',
                    '1'
                    );";



                //EJECUTO LA QUERY INSERTAR NUEVO USUARIO
                $res_Insert_QUERY = $conn->query($SQL_insert);
              
                echo "PASADO LA QUERY : <hr>";
                echo "query".$res_Insert_QUERY;
                echo "<pre>";
                print_r($res_Insert_QUERY);
                echo "</pre>";
      
      

                $conn->close();
            

          }



          function get_num_plazas(){

                $conn=Connect_BBDD();
                $Query = "SELECT count(*) AS plazas FROM `apuntados_actividad` WHERE `id_actividad`= '$this->id' ";
                       
                $res_QUERY = $conn->query($Query);

                if($res_QUERY->num_rows > 0){
  
                  $plazas = $res_QUERY->fetch_assoc();
        
              }

              
                $conn->close();

                return   $plazas ;

          }



          function verificar_si_esta_apuntado($id_user){

                $conn=Connect_BBDD();

                $QUERY ="SELECT * FROM `apuntados_actividad` WHERE `id_user`= '$id_user' AND `id_actividad` = '$this->id' ";

                $res_QUERY = $conn->query($QUERY);

                if($res_QUERY->num_rows > 0){
      
                    return true;
        
                }else{
                  //NO APUNTADO
                    return false;
                }

                $conn->close();

          }

          function apuntarse_actividad($id_user){

            $apuntado = $this->verificar_si_esta_apuntado($id_user);
                  
              if (!$apuntado){

                    $conn=Connect_BBDD();


                    $SQL_insert= "INSERT INTO `apuntados_actividad`
                    (`grupo`,
                    `id_actividad`,
                    `id_user`
                    )
          
                      VALUES
                      ('1',
                        '$this->id',                  
                        '$id_user'                 
                        );";
                        
                    $res_Insert_QUERY = $conn->query($SQL_insert);

                    $conn->close();
                    return true;
                    
              }else{
                    return false;
              }

        }


  }

 ?>
