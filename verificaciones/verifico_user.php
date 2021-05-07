<?php
     
      include ("../sesiones/sesiones.php");   
      include ("../classes/usuario.php");

      //include ("../verificaciones/funciones_seguridad.php");



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



              echo "PWD : ".$_pwd."<hr>";


              $_user = new Usuario($_alias);

          /*    echo "OBJETO USUARIO ";
              echo "<pre>";
              print_r($_user );
              echo "</pre>";*/
             
              if($_user->id==-1){
                    echo "<hr>No hay usuario con este nombre<hr>";
                    echo "<hr>TE ENVIO A INDEX NO TE MOSTRARE ESTE MSJ<hr>";
   //                 header("Location: ..");
   //                 die();
              }else{
                    $_pwd_hash =  $_user->pwd;

                 //   echo "PWD tabla : ".$_pwd_hash ."<hr>";

                    $_login = $_user->verifica_Pwd($_pwd);

                    echo "comprobacion PWD RETURN DE LA FUNCION: ".$_login."<hr>";


                    if ($_login){
                        echo '¡La contraseña es válida!';
                        echo "<hr>YA VERE A DONDE TE ENVIO .... SERA TU PAGINA DE PERFIL<hr>";

                        Crear_Usuario_Sesion($_user);
                      //  session_start();

                        $caducitat=time()+(60*60);

                        if(isset($_POST['mem_user'])){

                            echo "<hr>ENTRO EN CHECK SELECCIONADO<hr>";
                            //POR LO QUE GENERO LA COOKIE



                            if(isset($_COOKIE['user'])){

                              echo "Caducitat : ".$caducitat."<hr>";
                              setcookie("usuario", $_SESSION["alias_user"]."-".$caducitat ,time()+(60*60), "/");

                            }
                              else{
                                setcookie("usuario", $_SESSION["alias_user"]."-".$caducitat ,time()+(60*60), "/");
                            }

                         }else{

                            echo "No check.!.";
                            setcookie("usuario", $_SESSION["alias_user"]."-".$caducitat ,time()-4000, "/");
                        }

                        //ACTUALIZAR FECHA CONEXION
                        //$conn = Connect_BBDD();
                        $_user->actualizar_Conexion();

                        //COMPROBAR SI ESTA ACTIVO
                     //   $conn = Connect_BBDD();
                       // $_tipo_user = get_id_tipo_by_user($_alias,$conn);
                      
                    //    echo "<pre>";
                    //    print_r( $_tipo_user);
                   //     echo "</pre>";

                    //    $conn->close();

                        $_SESSION['code_tipo_usuario']=$_user->id_tipo;

                        switch ( $_SESSION['code_tipo_usuario']) {
                            case 1:
                                 // usuario Administrador...
                            header ("Location: ../vistas/perfil_Admin.php");
                            echo "USUARIO ADMININSTRADOR : ".$_SESSION['code_tipo_usuario']."<hr>";

                            break;
                            case 2:
                                // usuario Voluntarior...
                            header ("Location: ../vistas/perfil_Voluntario.php");
                            echo "USUARIO ADMININSTRADOR : ".$_SESSION['code_tipo_usuario']."<hr>";

                            break;
                            case 3:
                              //   usuario Usuario...
                           header ("Location: ../vistas/perfil_Usuario.php");
                            echo "USUARIO ADMININSTRADOR : ".$_SESSION['code_tipo_usuario']."<hr>";

                            break;
                            
                            default:
                                # code...
                            break;
                        }

                    }else{
                        echo 'Contraseña erronea !';
                        echo "<hr>TE ENVIO A INDEX PQ NO ESA PWD NO ES CORRECTA TE MOSTRARE ESTE MSJ<hr>";
                        header("Location: ..");
                        die();
                    }
              }

          }else{
                echo "NO RECIBO NADA DE FORMULARIO POST <hr>";
                header("Location: ..");
                die();
          }
      }
?>



