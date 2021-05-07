<?php


        $fp = fopen("../csv/equipaments.csv", "r");
        $_parques_csv = [];

        while (!feof($fp)) {

            $_parques_csv[] = fgetcsv($fp,0,',');
      }
      fclose($fp);

      echo "<pre>";
      print_r($_parques_csv);
      echo "</pre>";

     
?>