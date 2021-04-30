<?php

  //** FUNCIONES DE PROCESAMIENTOS
    function codifica_PWD($_pwd){       
        
        return password_hash($_pwd,PASSWORD_DEFAULT);
      }


    function verifica_Pwd($_pwd, $_pwd_hash){

      echo "dentro de funcion verifica PWD <hr>";
      echo "PWD pasada : ".$_pwd."<hr>";
      echo "PWD pasada hash tabla : ".$_pwd_hash."<hr>";


      if (password_verify($_pwd, $_pwd_hash)) {
            echo "ok <hr>";
            $login= true;
        } else {
            $login= false;
            echo "error <hr>";
          }
        return $login;
    }
 ?>
