<?php

	class Register {
		private $Mysqli, $private, $success, $param;

	    public function __construct()
        {
           $this->Mysqli = Database::getInstance();
        }

        public function set_real_escape_string($param)
        {
        	$this->success = $this->Mysqli->escapeString($param);
        	return $this->success;
        }

        public function hash($param)
        {
           $this->success = password_hash($param, PASSWORD_DEFAULT);
           return $this->success;
        }

        public function insert($NamaDepan, $NamaBelakang, $TanggalLahir, $BulanLahir, $TahunLahir, $JenisKelamin, $Alamat2, $Email2, $Katasandihash, $Ponsel, $Code)
        {
        	$this->success = $this->Mysqli->insertRegister("INSERT INTO pengguna (NamaDepan, NamaBelakang, TanggalLahir, BulanLahir, TahunLahir, JenisKelamin, Alamat, Email, Katasandi, Ponsel, Code) VALUES ('$NamaDepan','$NamaBelakang','$TanggalLahir','$BulanLahir','$TahunLahir','$JenisKelamin','$Alamat2','$Email2','$Katasandihash','$Ponsel','$Code')");
        	return $this->success;
        }

        public function success()
        {
        	return $this->success;
        }

	}