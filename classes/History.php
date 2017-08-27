<?php

    class History {
     
     private $Mysqli;

      public function __construct()
      {
         $this->Mysqli = Database::getInstance();
      }

      function get()
      {
      	$getHistory = $this->Mysqli->getHistory("SELECT * FROM Data");
      	return $getHistory;
      }


    }