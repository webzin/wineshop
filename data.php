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
if($act=='bepari_id')
//select query to get the values
{

echo GetCombo("Bepari","bepari","id","name","sid='$store_id'","id","$sid");
}


if($act=='boxsize')
//select query to get the values
{
$vol_id = GetName('items','vol_id','id',$item_id);

echo GetCombo("Box Type","volume","pkt_qty","pkt","id='$vol_id'","id","$vol_id");
}  
?>