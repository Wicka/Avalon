<?php
      include ("conexio_bbdd.php");

      $conn = Connect_BBDD();

      //comprovem connexió
      if ($conn->connect_error) {
        return "DATABASE ERROR: ".$conn->connect_error;
        die();
      }

      if(!empty($_POST['alias'])) { //si s’han enviat dades pel post
        $_nick = $_POST['alias'];
        $sql = "SELECT * FROM users WHERE alias='$_nick'"; //construïm consulta

        //llancem la consulta
        $result = $conn->query($sql);

        if ($result->num_rows == 0) { //si no hi ha resultats, el nom d’usuari està disponible
          echo "0";
        }else{ //si no, es que ja està utilitzat.
          echo "1";
        }
      }else{
        echo "NO POST<hr>";
      }

      //close connection
      $conn->close();
?>
