<?php

	class Database 
    {

		private $Server     = "localhost";
		private $Username   = "root";
		private $Password   = "";
		private $Database   = "icishort";
		private $Mysqli;    
		private static $INSTANCE = null;
		private $sql, $param, $param2, $data, $success;

		public function __construct()
		{
		  $this->Mysqli = new mysqli($this->Server, $this->Username, $this->Password, $this->Database);

		}

		public static function getInstance()
		{
    	   if (!isset(self::$INSTANCE))
    	   {
              self::$INSTANCE = new Database();
           }
             return self::$INSTANCE;
        }

		public function insert($URLAsli, $URLPendek, $Nama, $Total, $Code) 
		{
			if ($this->Mysqli->query("INSERT INTO data (URLAsli, URLPendek, Nama, Dikunjungi, Code) VALUES ('$URLAsli','$URLPendek','$Nama','$Total','$Code')"))
			{
			   return $Result = "TRUE";
			}
			else
			{
			   return $Result = "FALSE";
			}

		}

		public function select($URLPendek)
	    {
	      $searchData = $this->Mysqli->query("SELECT * FROM data WHERE URLPendek='$URLPendek'");
	      return $searchData;
	    }	

	    public function gethistory($param)
	    {
	      $getHistory = $this->Mysqli->query("SELECT * FROM data WHERE Nama='$param'");
	      return $getHistory;
	    }

	    public function escapeString($param)
	    {
	      $this->success = $this->Mysqli->real_escape_string($param);
	      return $this->success;
	    }

	    public function insertRegister($sql)
	    {
	      $success = $this->Mysqli->query($sql);
	      return $success;
	    }

	    public function check_email_register($param)
	    {
	      $sql   = $this->Mysqli->query("SELECT * FROM pengguna WHERE Email='$param'");
	      $data  = $sql->fetch_assoc();

	      if ($data['Email'] == $param)
	      {
		     return $Status = "FALSE";
	      }
	    }

	    public function check_phone_register($param)
	    {
	      $sql   = $this->Mysqli->query("SELECT * FROM pengguna WHERE Ponsel='$param'");
	      $data  = $sql->fetch_assoc();

	      if ($data['Ponsel'] == $param)
	      {
		     return $Status = "FALSE";
	      }
	    }

	    public function check_email_login($param)
	    {
	       $sql  = $this->Mysqli->query("SELECT * FROM pengguna WHERE Email='$param'");
	       $data = $sql->fetch_assoc();

	       if ($data['Email'] == $param)
	       {
	       	  return $Result = "TRUE";
	       }
	    }

	    public function check_password_login($param)
	    {
	       $sql  = $this->Mysqli->query("SELECT * FROM pengguna");
	       $data = $sql->fetch_assoc();

	       if (password_verify($param, $data['Katasandi']))
	       {
	       	  return $Result = "TRUE";
	       }
	    }

	    public function getDataFromSession($param)
	    {
	       $sql  = $this->Mysqli->query("SELECT * FROM pengguna WHERE Email='$param'");
	       $data = $sql->fetch_assoc();

	       return $Result = $data['NamaDepan']." ".$data['NamaBelakang'];
	        
	    }

	    public function update($param, $param2)
	    {
	       $data = $param2 + "1";
	       $this->Mysqli->query("UPDATE data SET Dikunjungi='$data' WHERE URLPendek='$param'");
	       return $Result = "TRUE";
	    }
	}

?>