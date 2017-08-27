<?php

	class Login {
		
		private $Mysqli, $param;

		public function __construct()
        {
           $this->Mysqli = Database::getInstance();
        }

        public function set_real_escape_string($param)
        {
        	$this->Mysqli->escapeString($param);
        	return $param;
        }

		public function check_email($param)
        {
        	$Result = $this->Mysqli->check_email_login($param);
        	return $Result;
        }        

        public function check_password($param)
        {
        	$Result = $this->Mysqli->check_password_login($param);
        	return $Result;
        }


	}

?>