<?php

	class SecurityForm {

		public function Data($Param) 
		{
          $Param  = htmlspecialchars($Param);                    
          $Param  = trim($Param); 
          return $Param; 
        }
	}

?>