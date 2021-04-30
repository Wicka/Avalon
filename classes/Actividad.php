<?php

    class Actividad{

      public $ID;
      public $descripcion;
      public $cognom;
      public $telefon;

        function __construct($_ID, $_nom, $_cognom, $_telefon){

          $this->ID = $_ID;
          $this->nom = $_nom;
          $this->cognom = $_cognom;
          $this->telefon = $_telefon;

        }

        function mostrar_datos(){
          return "Registro : ".$this->ID." <br>Nombre :".$this->nom." ".$this->cognom."<br> Telèfon: ".$this->telefon.".<hr>";
        }
    }

 ?>
