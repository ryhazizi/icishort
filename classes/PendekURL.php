<?php

	class PendekURL {

		public function MembuatURLPendek()
          {
             $Data         = "AaBbCcDdEeFfGgHhIiJjKkLlMnOoPpQqRrSsTtUuVvWwXxYyZz0123456789";
             $Random       = substr(str_shuffle($Data),0,4); 
             return $Random;
          }
	}

?>