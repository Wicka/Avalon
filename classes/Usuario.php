<?php
    //CONEXION BBDDD
      include ("../db/conexio_bbdd");

      $_conn = Connect_BBDD();



    //CONSULTA

      $Query = "SELECT * FROM `urser`" ;

      $_usuarios = $conn->query($Query);
      
      $_arry_user=[];

      if($_usuarios->num_rows > 0){

          while($fila = $_usuarios->fetch_assoc()) {

            array_push($_arry_user , $fila) ;
          }

      }else{
        echo "<br>No Existe este usuario";
        $_usuarios=-1;
      }

      $conn->close();



class Usuario
{
      //ATRIBUTS USUARIO
       public $id;
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




       function __construct($_arry_user ){

            $this->id = $_arry_user['id'];
            $this->id_tipo = $_arry_user['id_tipo'];
            $this->id_estado = $_arry_user['id_estado'];
            $this->id_disponibilidad =  $_arry_user['id_disponibilidad'];
            $this->alias =  $_arry_user['alias'];
            $this->email =  $_arry_user['email'];
            $this->pwd =  $_arry_user['pwd'];
            $this->create_date =  $_arry_user['create_date'];
            $this->last_connection =  $_arry_user['last_connection'];
            $this->id_tipo_documento = $_arry_user['id_tipo_documento'];
            $this->num_documento =  $_arry_user['num_documento'];
            $this->name =  $_arry_user['name'];
            $this->surname_01 =  $_arry_user['surname_01'];
            $this->surname_02 =  $_arry_user['surname_02'];
            $this->birth_date =  $_arry_user['birth_date'];
            $this->id_titulacion =  $_arry_user['id_titulacion'];
            $this->sector_estudios =  $_arry_user['sector_estudios'];
    }



       //CONSTRUCTOR
  /*     function __construct(
                                 $id,
                                 $id_tipo,
                                 $id_estado,
                                 $id_disponibilidad,
                                 $alias,
                                 $email,
                                 $pwd,
                                 $create_date,
                                 $last_connection,
                                 $id_tipo_documento,
                                 $num_documento,
                                 $name,
                                 $surname_01,
                                 $surname_02,
                                 $birth_date,
                                 $id_titulacion,
                                $sector_estudios
        ){

              $this->id = $id;
              $this->id_tipo = $id_tipo;
              $this->id_estado = $id_estado;
              $this->id_disponibilidad = $id_disponibilidad;
              $this->alias = $alias;
              $this->email = $email;
              $this->pwd = $pwd;
              $this->create_date = $create_date;
              $this->last_connection = $last_connection;
              $this->id_tipo_documento = $id_tipo_documento;
              $this->num_documento = $num_documento;
              $this->name = $name;
              $this->surname_01 = $surname_01;
              $this->surname_02 = $surname_02;
              $this->birth_date = $birth_date;
              $this->id_titulacion = $id_titulacion;
              $this->sector_estudios = $sector_estudios;
          }


*/














       //METODES
       function buscar_registre($_ID){
            $clave=-1;
            foreach ($this->registros as $key => $person) {
                if($person->ID === $_ID){
                    $clave=$key;
                  }
                }
            return $clave;
          }


      function afegir_registre($_persona){
            array_push($this->registros,$_persona);
            echo "Registre _".$_persona->ID." s'ha creat.<br>";
          }


      function veure_registre(){
            foreach ($this->registros as $key => $person) {
                  echo "Id. : ".$person->ID." / Nom : ".$person->nom." ".$person->cognom." / Telèfon : ".$person->telefon."<hr>";
               }
          }


      function eliminar_registre($_ID){
           $clave = $this->buscar_registre($_ID);
           if ($clave!=-1){
                array_splice($this->registros, $clave ,1);
                echo "Registre _".$_ID." s'ha eliminat amb exit.";
              }else{
                  echo "<h3 style='color:red'>No s'ha trobat cap registre amb id : ".$_ID."</h3>";
                }
        }


      function editar_registre($_ID, $_nom, $_cognom, $_telefon){
            $clave = $this->buscar_registre($_ID);
            if ($clave!=-1){
                  $this->registros[$clave]->nom = $_nom;
                  $this->registros[$clave]->cognom = $_cognom;
                  $this->registros[$clave]->telefon = $_telefon;
                  echo "Registre _".$_ID." s'ha modificat.";
              }else{
                    echo "<h3 style='color:red'>No s'ha trobat cap registre amb id : ".$_ID."</h3>";
                }
          }

  }

 ?>
