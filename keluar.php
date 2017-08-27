<?php

	require_once 'core/init.php';
	$session->start();
	$Result = "";

	if ($Result = $session->check('Email') AND $Result == "FALSE")
	{
		header("location: ".$baseurl->get()."404.html");
	}
	else
	{
		$session->delete();
		header("location: ".$baseurl->get()."");
	}
?>