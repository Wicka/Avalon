<?php
    include ("../sesiones/sesiones.php");
    include ("../classes/Actividad.php");

  //  include ("../verificaciones/funciones_seguridad.php");



    if($_POST!=null){

        if($_POST['tipo_usuario']!=null and $_POST['alias']!=null and $_POST['pwd']!=null and $_POST['name']!=null and $_POST['surname_1']!=null and $_POST['birth']!=null and $_POST['email']!=null){

               if (!empty($_POST['manana'])) {                   
                        $_manana='1';
                    } else {                   
                        $_manana='0';
                    }                  

                if (!empty($_POST['mediodia'])){                    
                        $_mediodia='1';
                    }else{                    
                        $_mediodia='0';
                    }
                  
                if (!empty($_POST['tarde'])) {                     
                        $_tarde='1';
                    } else {                   
                        $_tarde='0';
                    }
               
                if (!empty($_POST['noche'])) {                 
                        $_noche='1';
                    } else {                     
                        $_noche='0';
                    }                  

                $_disponibilidad    =   $_manana.$_mediodia.$_tarde.$_noche;


                    $_actividad = new Actividad("");
       
                
                    $_actividad->descripcion            =   $_POST['tipo_usuario'];        
                    $_actividad->direccion          =   "";
                    $_actividad->duracion                =   $_disponibilidad;
                 
                    $_actividad->fecha_inicio               =   filter_var(strtolower(trim($_POST['alias'])), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
                    $_actividad->fecha_fin               =   filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
                    $_actividad->hora_inicio                 =   filter_var($_POST["pwd"], FILTER_SANITIZE_STRING);               
                    $_actividad->hora_fin            =   filter_var(trim($_POST['documento']), FILTER_SANITIZE_NUMBER_INT);


                    $_actividad->habilitada       =   filter_var(trim($_POST['num_doc']), FILTER_SANITIZE_STRING);       
                    
                    $_actividad->ambito                =   filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                    $_actividad->grupo          =   filter_var($_POST['surname_1'], FILTER_SANITIZE_STRING);
                    $_actividad->pobalcion          =   filter_var($_POST['surname_2'], FILTER_SANITIZE_STRING);
                
                    $_actividad->voluntario          =   filter_var(trim($_POST['birth']), FILTER_SANITIZE_NUMBER_INT);
                    
                    $_actividad->name       =   filter_var(trim($_POST['nivel_estudio']), FILTER_SANITIZE_NUMBER_INT);                      
                    $_actividad->num_participante     =  filter_var(trim($_POST['sector_estudio']), FILTER_SANITIZE_STRING);
        
               
                    echo "<pre>";
                    print_r( $_actividad);
                    echo "</pre>";
                    echo "<hr>";

                $_actividad->create__actividad_table();        

                $_alias_nuevo_actividad = $_actividad->id;

                echo "alias :".$_actividad->name;
                
                $_actividad_creado = new Usuario($_actividad->name);

                echo "nuevo user despues de creado para recuperarlo de la tabla";
                echo "<pre>";
                print_r($_actividad_creado);
                echo "</pre>";
                echo "<hr>";


        }else{
            echo "CAMPOS DEL POST ALGUNO VACIO<hr>";
            header("Location: ../formularios/form_altas.php");
            die();

        }

    }else{
        echo "NADA POR POST PARA ALTA USUARIO .";
        header("Location: ..");
        die();
    }








    function _verifica_alias($_alias,$conn ){

        echo "verifica alias<hr>";
        $Query = "SELECT `pwd` FROM `users` WHERE `alias` = '$_alias'" ;

        $user = $conn->query($Query);

        if($user->num_rows > 0){
            $_user = true;
        }else{
          echo "<br>No Existe este usuario";
          $_user= false;
        }

        return $_user;
    }

?>
