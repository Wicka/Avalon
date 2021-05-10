<?php
    session_start();
  //  include ("../sesiones/sesiones.php");
    include ("../classes/Actividad.php");
    

    if(isset($_SESSION['alias_user'])){
        //     header("Location: ../vistas/perfil_usuario.php");
            echo "no sesion";
          
        }else{
            echo "sesion alias : ".$_SESSION['alias_user'];
        }

    if($_POST!=null){

        if($_POST['nombre_actividad']!=null and $_POST['descripcion_actividad']!=null and $_POST['direccion']!=null and $_POST['fecha_inicio']!=null and $_POST['fecha_fin']!=null and $_POST['duracion']!=null  and $_POST['num_participantes']!=null  and $_POST['hora_inicio']!=null  and $_POST['hora_fin']!=null ){


                    $_actividad = new Actividad("");
       
                
                    $_actividad->name                   =   filter_var(trim($_POST['nombre_actividad']), FILTER_SANITIZE_STRING);   
                    $_actividad->descripcion            =   filter_var(trim($_POST['descripcion_actividad']), FILTER_SANITIZE_STRING); 
                    $_actividad->direccion              =   filter_var(trim($_POST['direccion']), FILTER_SANITIZE_STRING); 

                    $_actividad->fecha_inicio           =   filter_var(trim($_POST['fecha_inicio']), FILTER_SANITIZE_NUMBER_INT);
                    $_actividad->fecha_fin              =   filter_var(trim($_POST['fecha_fin']), FILTER_SANITIZE_NUMBER_INT);

                    $_actividad->duracion               =   filter_var(trim($_POST['duracion']), FILTER_SANITIZE_NUMBER_INT);
                 
                    $_actividad->ambito                 =   filter_var(trim($_POST['ambito']), FILTER_SANITIZE_NUMBER_INT);                 
                    $_actividad->poblacion              =   filter_var(trim($_POST['poblacion']), FILTER_SANITIZE_NUMBER_INT);

                    $_actividad->num_participante       =  filter_var(trim($_POST['num_participantes']), FILTER_SANITIZE_NUMBER_INT);  

                    if (!empty($_POST['adaptada'])) {                   
                        $_adaptada='1';
                    } else {                   
                        $_adaptada='0';
                    }     

                    $_actividad->adaptada               =  filter_var(trim($_adaptada), FILTER_SANITIZE_NUMBER_INT);  
                

                    $_actividad->hora_inicio            =  filter_var(trim($_POST['hora_inicio']), FILTER_SANITIZE_NUMBER_INT);                    
                    $_actividad->hora_fin               =  filter_var(trim($_POST['hora_fin']), FILTER_SANITIZE_NUMBER_INT);
    
                    $_actividad->voluntario          =   filter_var(trim($_POST['id_user']), FILTER_SANITIZE_NUMBER_INT);
                                 
                   
        
               
                    echo "<pre>";
                    print_r( $_actividad);
                    echo "</pre>";
                    echo "<hr>";

                    $_actividad->create_actividad_table();  
           
                    header("Location: ../actividades/actividades_bcn.php");

        }else{
            echo "CAMPOS DEL POST ALGUNO VACIO<hr>";
            header("Location: ../activities_forms/form_altas.php");
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
