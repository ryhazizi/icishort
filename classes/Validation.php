<?php
	
	class Validation {

		private $Mysqli, $param;

		public function __construct()
        {
           $this->Mysqli = Database::getInstance();
        }

		public function empty_field($param)
		{
		   if (!$param)
		   {
		   	  return "TRUE";
		   }
		   else
		   {
		   	  return "FALSE";
		   }	
		}

		public function regex_name($param)
		{
			if (preg_match("/^[a-zA-Z ]*$/", $param))
			{
			   return "TRUE";
			}
			else
			{
			   return "FALSE";
			}
		}

		public function regex_address($param)
		{
			if (preg_match("/^[a-zA-Z-0-9 ]*$/", $param))
		    {
		       return "TRUE";
		    }
		    else
		    {
		       return "FALSE";
		    }
		}

		public function regex_email($param)
		{
			if(preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $param))
			{
				return "TRUE";
			}
			else
			{
				return "FALSE";
			}
		}

		public function check_email($param)
		{
		   $Status = $this->Mysqli->check_email_register($param);
		   return $Status;
		}

		public function check_phone($param)
		{
		  if (preg_match("/08?[0-9]{10}$/", $param))
		    {
		       return "TRUE";
		    }	
		    else
		    {
		       return "FALSE";
		    }
		}

		public function regex_password($param)
		{
			if (preg_match("/^[a-zA-Z-0-9]*$/", $param))
		    {
		       return "TRUE";
		    }
		    else
		    {
		       return "FALSE";
		    }
		}

		public function regex_phone($param)
		{
		    if (preg_match("/08?[0-9]{10}$/", $param))
		    {
		       return "TRUE";
		    }	
		    else
		    {
		       return "FALSE";
		    }
		}

		public function amount_character($param)
		{
			if (strlen($param) < 4)
			{
				return "Short";
			}
			else if (strlen($param) > 30)
			{
				return "Long";
			}
		}

		public function amount_number($param)
		{
			if (strlen($param) < 12)
			{
				return "FALSE";
			}
			else if (strlen($param) > 12)
			{
				return "FALSE";
			}
		}

     }

 ?>