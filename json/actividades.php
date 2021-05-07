<?php

//ver_actividades_bcn();

function ver_actividades_bcn(){


$URL="http://opendata.amb.cat/activitats/search";


$string_json = file_get_contents($URL);



		//PASO STRING A ARRAY PER TREBALLAR AMB ELL
            $array_json = json_decode($string_json, true);

            $arry_dades=[];



				//OBJECTE JSON AMB LES DADES UNIQUES QUE VULL BUIT
				$array_dades_dia = [
					"id" => "",
					"detail_url" => "",
					"enlace" => "",
                              "descripcio_formatted" => "",
                              "entradeta" => "",
                              "titol" => "",
                              "inici" => "",
                              "fin"  => "",
                              "ubicacio" => "",
                              "adaptada" => "",
                              "tipus"    =>""
				];




                        for ($i=0; $i<count($array_json["items"]); $i++){

                              $array_dades_dia["id"]                            = $array_json["items"][$i]["_id"];
                              $array_dades_dia["detail_url"]                    = $array_json["items"][$i]["detail_url"];
                              $array_dades_dia["enlace"]                        = $array_json["items"][$i]["enllac_inscripcio"];
                              $array_dades_dia["descripcio_formatted"]          = $array_json["items"][$i]["descripcio_formatted"];
                              $array_dades_dia["entradeta"]                     = $array_json["items"][$i]["entradeta"];
                              $array_dades_dia["titol"]                         = $array_json["items"][$i]["titol"];
                              $array_dades_dia["inici"]                         = $array_json["items"][$i]["data_rang"]["data_rang_inici"];
                              $array_dades_dia["fin"]                           = $array_json["items"][$i]["data_rang"]["data_rang_fi"];
                              $array_dades_dia["ubicacio"]                      = $array_json["items"][$i]["on"][0]["nom_ubicacio"];
                              $array_dades_dia["adaptada"]                      = $array_json["items"][$i]["adaptada"];
                              $array_dades_dia["tipus"]                         = $array_json["items"][$i]["tipus"];
                      

                              array_push($arry_dades, $array_dades_dia);
            }
   /*        
       echo "<pre>";
       print_r($arry_dades);
       echo "</pre>";*/

                  return $arry_dades;
      }


//*************************************************************************//
//*************************************************************************//
//***********************ACCESO AL FICHERO CSV*****************************//
//*************************************************************************//
//*************************************************************************//

     /*   $fp = fopen("../csv/activitats.csv", "r");
        $actividades_csv = [];
        $_actividades = [];

        while (!feof($fp)) {

            $actividades_csv[] = fgetcsv($fp,0,',');
       }
       fclose($fp);

       //echo "<pre>";
       //print_r($actividades_csv);
       //echo "</pre>";

       for ($i=0; $i < count($actividades_csv) -1; $i++){
           $_actividades[$i][$actividades_csv[0][0]] = $actividades_csv[$i][0];
           $_actividades[$i][$actividades_csv[0][1]] = $actividades_csv[$i][1];
           $_actividades[$i][$actividades_csv[0][2]] = $actividades_csv[$i][2];
           $_actividades[$i][$actividades_csv[0][3]] = $actividades_csv[$i][3];
       }
       echo "<pre>";
       print_r($_actividades);
       echo "</pre>";

       echo $_actividades[38]["Id"]."<br>";
       echo $_actividades[38]["detail_url"]."<br>";
       echo $_actividades[38]["Subàmbit"]."<br>";
*/

?>
