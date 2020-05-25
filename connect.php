<?php
//session starts 
	session_start();
	include ("include/config.php");
	include ("include/admin.config.inc.php");
	include ("include/functions.php");

	$db=mysql_connect(DBSERVER,USERNAME,PASSWORD)or die("Could not connect");
	mysql_select_db(DATABASENAME,$db);
	
	
	
	?>