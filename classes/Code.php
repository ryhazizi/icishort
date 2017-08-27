<?php

	class Code {
		
		  public function create()
          {
             $Data         = "AaBbCcDdEeFfGgHhIiJjKkLlMnOoPpQqRrSsTtUuVvWwXxYyZz0123456789";
             $Random       = substr(str_shuffle($Data),0,10); 
             return $Random;
          }
	}
?>