
<?php
    if ($_POST == null){
        header ("Location: ../index.php");
        die();
    }else if($_POST['text_buscar']!=null){

                //INICIO SESSIO
                session_start();

                if ($_POST['text_buscar']==""){
                    //DESTRUEIXO LA SESSIO CRIDANT AL PHP
                    header("Location: destroy_session.php");
                    die();
                }else{
                      $_SESSION['filtro'] = filter_var($_POST['text_buscar'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
                }
                header ("Location: ../index.php");
                die();
            }else{
                //SI VARIABLE POST NULL TB DESTRUEIXO SESSIO
                header("Location: destroy_session.php");
        }
 ?>
