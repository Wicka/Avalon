<?php
      include  ("../db/conexio_bbdd.php");
      include ("../db/get_datas.php");
      include ("funciones_seguridad.php");
      include ("../sesiones/sesiones.php");
      include ("../db/operaciones_db.php");

      //FUNCIONES VALIDACION USUARIO

      verifica_Login();

      function verifica_Login(){

         

          if($_POST != null){


              if($_POST['alias']!=null){
                  $_alias = filter_var($_POST["alias"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
              }else{
                  $_alias = "";
              }


              echo "ALIAS : ".$_alias."<hr>";

              if($_POST['pwd']!=null){
                  $_pwd = filter_var($_POST["pwd"], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW);
              }else{
                  $_pwd = "";
              }

              echo "PWD : ".$_pwd."<hr>";

              $conn = Connect_BBDD();

              $_tipo_User_pwd = get_pwd_by_alias($_alias, $conn);

              echo "EXISTE : ";
              echo "<pre>";
              print_r($_tipo_User_pwd );
              echo "</pre>";
             
              if($_tipo_User_pwd==-1){
                    echo "<hr>No hay usuario con este nombre<hr>";
                    echo "<hr>TE ENVIO A INDEX NO TE MOSTRARE ESTE MSJ<hr>";
   //                 header("Location: ..");
   //                 die();
              }else{
                    $_pwd_hash =  $_tipo_User_pwd['pwd'];

                    echo "PWD tabla : ".$_pwd_hash ."<hr>";

                    $_login = verifica_Pwd($_pwd, $_pwd_hash);

                    echo "comprobacion PWD : ".$_login ."<hr>";


                    if ($_login){
                        echo '¡La contraseña es válida!';
                        echo "<hr>YA VERE A DONDE TE ENVIO .... SERA TU PAGINA DE PERFIL<hr>";

                        Crear_Usuario_Sesion($_alias, $_tipo_User_pwd['id_tipo']);
                      //  session_start();

                        $caducitat=time()+(60*60);

                        if(isset($_POST['mem_user'])){

                            echo "<hr>ENTRO EN CHECK SELECCIONADO<hr>";
                            //POR LO QUE GENERO LA COOKIE



                            if(isset($_COOKIE['user'])){

                              echo "Caducitat : ".$caducitat."<hr>";
                              setcookie("usuario", $_SESSION["user"]."-".$caducitat ,time()+(60*60), "/");

                            }
                              else{
                                setcookie("usuario", $_SESSION["user"]."-".$caducitat ,time()+(60*60), "/");
                            }

                         }else{

                            echo "No check.!.";
                            setcookie("usuario", $_SESSION["user"]."-".$caducitat ,time()-4000, "/");
                        }

                        //ACTUALIZAR FECHA CONEXION
                        $conn = Connect_BBDD();
                        actualizar_Conexion($_alias,$conn);

                        //COMPROBAR SI ESTA ACTIVO
                        $conn = Connect_BBDD();
                        $_status_user = status_user($_alias,$conn);
                      
                        echo "<pre>";
                        print_r( $_status_user);
                        echo "</pre>";

                        $conn->close();

                        $_SESSION['code_tipo_usuario']=$_status_user['id_tipo'];

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
                                // usuario Usuario...
                            header ("Location: ../vistas/perfil_Usuario.php");
                            echo "USUARIO ADMININSTRADOR : ".$_SESSION['code_tipo_usuario']."<hr>";

                            break;
                            
                            default:
                                # code...
                            break;
                        }

              /*          if  ($_SESSION['code_status'] == 1){
                            // usuario Administrador...
                            header ("Location: ../vistas/perfil_Admin.php");
                            echo "USUARIO ADMININSTRADOR : ".$_SESSION['code_status']."<hr>";
                        }else{
                            $_SESSION['code_status']=$_status_user['id_tipo'];
                            
                            echo "USUARIO --- : ".$_SESSION['code_status']."<hr>";
     //                       header ("Location: ../vistas/status_usuarios.php");
                        }*/
                          // '0': usuario eliminado temporalmente...
                          // '1': usuario activo...
                          // '2': usuario baneado...
                          // '3': usuario pendiente...
                          // '4': usuario inactivo...

                    }else{
                        echo 'Contraseña erronea !';
                        echo "<hr>TE ENVIO A INDEX PQ NO ESA PWD NO ES CORRECTA TE MOSTRARE ESTE MSJ<hr>";
       //                 header("Location: ..");
                        die();
                    }
              }

          }else{
                echo "NO RECIBO NADA DE FORMULARIO POST <hr>";
       //         header("Location: ..");
                die();
          }
      }
?>
