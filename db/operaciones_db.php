<?php


function crea_lista_html($_array){
  $_lista="";

  foreach ($_array as $key => $value) {
    $_lista=$_lista."<option value='".$value['id']."'>".$value['descripcion']."</option>";
 
  }
    return $_lista;
}







//ACTUALIZA FECHA LAST UPDATE EN TABLA USERS
  function actualizar_Conexion($_nick, $conn){
    echo "dentro actualizar conexion<hr>";
      $_now = getdate();

      echo "<pre>";
      print_r($_now);
      echo "</pre>";

      $_hoy = $_now['year']."-".$_now['mon']."-".$_now['mday']." ".$_now['hours'].":".$_now['minutes'].":".$_now['seconds'];

      echo $_hoy;


      $_QUERY ="UPDATE `users` SET `last_connection`= '$_hoy'  WHERE  `nick`= '$_nick'";

      $conn->query($_QUERY);

  //    header("Location: ../vistas/perfil_usuario.php");

  }

  function status_user($_alias, $conn){
    $_QUERY ="SELECT `id_tipo` FROM `users` WHERE  `alias`= '$_alias'";

    $_tipo= $conn->query($_QUERY);

    echo "<pre>";
    print_r($_tipo);
    echo "</pre>";

    if($_tipo->num_rows > 0){
        $tipos_usuario = $_tipo->fetch_assoc();

    }else{
      echo "<br>No Existe este usuario";
      $tipos_usuario=-1;
    }

    return $tipos_usuario;

  }




 ?>
