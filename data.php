<?php 
ob_start();


header('Access-Control-Allow-Origin: *');

include("connect.php");			

if(is_array($_GET))

{
foreach($_GET as $var=>$valu)
{
//grabs the $_GET variables and adds slashes
$$var = addslashes($valu);
}
}

 
if($act=='store_mgr')
//select query to get the values
{

echo GetCombo("Manager","users","id","name","type='STORE' AND store_id='$store_id'","id","$store_id");
} 
?>