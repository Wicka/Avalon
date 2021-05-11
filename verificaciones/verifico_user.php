<?php     
      include ("../sesiones/sesiones.php");   
      include ("../classes/Usuario.php");
      verifica_Login();

      function verifica_Login(){         

          if($_POST != null){

              if($_POST['alias']!=null){
                  $_alias = filter_var($_POST["alias"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
              }else{
                  $_alias = "";
              }
         

              if($_POST['pwd']!=null){
                  $_pwd = filter_var($_POST["pwd"], FILTER_SANITIZE_STRING);
              }else{
                  $_pwd = "";
              }

         
              $_user = new Usuario($_alias);
             
              if($_user->id==-1){
          
                    header("Location: ..");
                    die();
              }else{
                    $_pwd_hash =  $_user->pwd;

        
                    $_login = $_user->verifica_Pwd($_pwd);


                    if ($_login){
             //           echo '¡La contraseña es válida!';
             //           echo "<hr>YA VERE A DONDE TE ENVIO .... SERA TU PAGINA DE PERFIL<hr>";

                        Crear_Usuario_Sesion($_user);
                      //  session_start();

                        $caducitat=time()+(60*60);

                        if(isset($_POST['mem_user'])){

              //              echo "<hr>ENTRO EN CHECK SELECCIONADO<hr>";
                            //POR LO QUE GENERO LA COOKIE



                            if(isset($_COOKIE['user'])){

          //                    echo "Caducitat : ".$caducitat."<hr>";
                              setcookie("usuario", $_SESSION["alias_user"]."-".$caducitat ,time()+(60*60), "/");

                            }
                              else{
                                setcookie("usuario", $_SESSION["alias_user"]."-".$caducitat ,time()+(60*60), "/");
                            }

                         }else{

               //             echo "No check.!.";
                            setcookie("usuario", $_SESSION["alias_user"]."-".$caducitat ,time()-4000, "/");
                        }

                
                        $_user->actualizar_Conexion();
                   

                        $_SESSION['code_tipo_usuario']=$_user->id_tipo;

                        switch ( $_SESSION['code_tipo_usuario']) {
                            case 1:
                                 // usuario Administrador...                     
                          //  echo "USUARIO ADMININSTRADOR : ".$_SESSION['code_tipo_usuario']."<hr>";
                           // header ("Location: ../vistas/perfil_Admin.php");
                           header ("Location: https://avalon-help.000webhostapp.com/vistas/perfil_Admin.php");
                          

                            break;
                            case 2:
                                // usuario Voluntarior...                          
                          //  echo "USUARIO ADMININSTRADOR : ".$_SESSION['code_tipo_usuario']."<hr>";
                            header ("Location: https://avalon-help.000webhostapp.com/vistas/perfil_Voluntario.php");
                            //header ("Location: ../vistas/perfil_Voluntario.php");

                            break;
                            case 3:
                              //   usuario Usuario...                         
                           // echo "USUARIO ADMININSTRADOR : ".$_SESSION['code_tipo_usuario']."<hr>";
                            //header ("Location: ../vistas/perfil_Usuario.php");
                            header ("Location: https://avalon-help.000webhostapp.com/vistas/perfil_Usuario.php");

                            break;
                            
                            default:
                                # code...
                            break;
                        }

                    }else{
               //         echo 'Contraseña erronea !';
               //         echo "<hr>TE ENVIO A INDEX PQ NO ESA PWD NO ES CORRECTA TE MOSTRARE ESTE MSJ<hr>";
                        header("Location: ..");
                        die();
                    }
              }

          }else{
          //      echo "NO RECIBO NADA DE FORMULARIO POST <hr>";
                header("Location: ..");
                die();
          }
      }
?>



