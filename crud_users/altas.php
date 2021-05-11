<?php
    include ("../sesiones/sesiones.php");
    include ("../classes/Usuario.php");

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


                    $_user = new Usuario("");
       
                
                    $_user->id_tipo             =   $_POST['tipo_usuario'];        
                    $_user->id_estado           =   "";
                    $_user->id_disponibilidad   =   $_disponibilidad;
                    $_user->alias               =   filter_var(strtolower(trim($_POST['alias'])), FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
                    $_user->email               =   filter_var(trim($_POST['email']), FILTER_SANITIZE_STRING);
                    $_user->telefono            =   filter_var(trim($_POST['telefono']), FILTER_SANITIZE_STRING);

                    $_user->pwd                 =   filter_var($_POST["pwd"], FILTER_SANITIZE_STRING);

              
                
                    $_user->id_tipo_documento   =   filter_var(trim($_POST['documento']), FILTER_SANITIZE_NUMBER_INT);
                    $_user->num_documento       =   filter_var(trim($_POST['num_doc']), FILTER_SANITIZE_STRING);       
                    
                    $_user->name                =   filter_var($_POST['name'], FILTER_SANITIZE_STRING);
                    $_user->surname_01          =   filter_var($_POST['surname_1'], FILTER_SANITIZE_STRING);
                    $_user->surname_02          =   filter_var($_POST['surname_2'], FILTER_SANITIZE_STRING);
                
                    $_user->birth_date          =   filter_var(trim($_POST['birth']), FILTER_SANITIZE_NUMBER_INT);
                    
                    $_user->id_titulacion       =   filter_var(trim($_POST['nivel_estudio']), FILTER_SANITIZE_NUMBER_INT);                      
                    $_user->sector_estudios     =  filter_var(trim($_POST['sector_estudio']), FILTER_SANITIZE_STRING);
        
               
                  /*  echo "<pre>";
                    print_r( $_user);
                    echo "</pre>";
                    echo "<hr>";*/

                $_user->create_user_table();        

                $_alias_nuevo_user = $_user->alias;

               // echo "alias :".$_user->alias;
                
                $_user_creado = new Usuario($_user->alias);

            /*    echo "nuevo user despues de creado para recuperarlo de la tabla";
                echo "<pre>";
                print_r($_user_creado);
                echo "</pre>";
                echo "<hr>";*/

                Crear_Usuario_Sesion($_user_creado);      



                if ($_FILES['userfile']['error']!=0){

                //        echo "ERROR EN LA SUBIDA <hr>";
                //        echo $_FILES['userfile']['error']."<hr>";
                        // header("Location: ..");
                }else {

                //    echo "FICHERO SUBIDO CON EXITO<hr>";  
                    $_nom_foto_ID="../img/users/". $_user_creado->id.".png";

                    if(is_uploaded_file($_FILES['userfile']['tmp_name'])){

                        if($_FILES['userfile']['size'] > 5120000){
               //                 echo "TAMAÑO INCORRECTO <hr>";
                        }elseif(!(strpos($_FILES['userfile']['type'],"jpeg")) && !(strpos($_FILES['userfile']['type'],"jpg"))  && !(strpos($_FILES['userfile']['type'],"png")) ){
                   //             echo "TIPO DE ARCHIVO INCORRECTO <hr>";
                                }else{
                                    move_uploaded_file($_FILES['userfile']['tmp_name'],$_nom_foto_ID);
                      //              echo "MOVIDO CON EXITO A CARPETA <hr>";
                                }
                    }else{
                //        echo "no subes nada <hr>";
                    }
                                       
                }


              //  echo "SESSION .".$_SESSION['tipo_user']."<HR>";

                if ($_SESSION['tipo_user']==1){
             //       echo "TE ENVIO A ADMIN";
                    header("Location: ../vistas/perfil_admin.php");
                    die();

                    }
                    
                if ($_SESSION['tipo_user']==2){
            //        echo "TE ENVIO A VOLUNTARIO";
                    header("Location: ../vistas/perfil_voluntario.php");
                    die();
                }
                
                if ($_SESSION['tipo_user']==3){
           //         echo "TE ENVIO A USUARIO";
                header("Location: ../vistas/perfil_usuario.php");
                   die();
                }


        }else{
      //      echo "CAMPOS DEL POST ALGUNO VACIO<hr>";
            header("Location: ../formularios/form_altas.php");
            die();

        }

    }else{
   //     echo "NADA POR POST PARA ALTA USUARIO .";
        header("Location: ..");
        die();
    }








    function _verifica_alias($_alias,$conn ){

    //    echo "verifica alias<hr>";
        $Query = "SELECT `pwd` FROM `users` WHERE `alias` = '$_alias'" ;

        $user = $conn->query($Query);

        if($user->num_rows > 0){
            $_user = true;
        }else{
   //       echo "<br>No Existe este usuario";
          $_user= false;
        }

        return $_user;
    }

?>
