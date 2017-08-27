<?php

	require_once 'core/init.php';
	$Result = "";

	if (isset($_GET['URLPendek']))
	{
	   $Empatdigit = $_GET['URLPendek'];
	   $searchData = $system->select($Empatdigit);
	   $getField   = $searchData->fetch_assoc();
	   $EmpatdigitFromDB = $getField['URLPendek'];
	   $urlasli    = $getField['URLAsli'];
	   $Dikunjungi  = $getField['Dikunjungi'];

	   if (!$Empatdigit)
	   {
	   	 header("location: 404.html");
	   }
	   else if ($Empatdigit == $EmpatdigitFromDB)
	   {
	   	 if ($Result = $system->update($Empatdigit, $Dikunjungi) AND $Result == "TRUE")
	   	 {
	   	 	header("location: ".$urlasli."");
	     }
	   }
	   else
	   {
	   	 header("location: 404.html");
	   }
	}
	else
	{
		header("location: 404.html");
	}