<?php

	class Session {
		private $Mysqli, $sessionName, $sessionValue, $param;

		public function __construct()
        {
           $this->Mysqli = Database::getInstance();
        }

        public function start()
        {
        	return session_start();
        }

		public function give($sessionName, $sessionValue)
        {
           return $_SESSION['$sessionName'] = $sessionValue;
        }

        public function check($sessionName)
        {
        	if (!isset($_SESSION['$sessionName']))
            {
            	return $Result = "FALSE";
            }
            else
            {
            	return $Result = "TRUE";
            }
        }

        public function get($sessionName)
        {
        	$sessionValue = $_SESSION['$sessionName'];
        	$Result = $this->Mysqli->getDataFromSession($sessionValue);
        	return $Result;
        }

        public function delete()
        {
        	return session_destroy();
        }
	}

?>