<?php
	
	spl_autoload_register(function($class){
  		require_once 'classes/'.$class.'.php';
	});

	$system    =  new Database;
	$short     =  new PendekURL;
	$urlshort  =  $short->MembuatURLPendek();
	$securityf =  new SecurityForm();
	$history   =  new History;
	$baseurl   =  new BaseURL;
	$register  =  new Register;
	$validation = new validation;
	$session    = new Session;
	$login      = new Login;
	$code       = new Code;

?>