<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wineshop";

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

if ( ! $con->set_charset("utf8") )
{
   printf("Error loading character set utf8: %s\n", $con->error);
}
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
 
$addres='http://'.$_SERVER['SERVER_NAME'].'/wineshop/';
$imagepath='http://'.$_SERVER['SERVER_NAME'].'/wineshop/images/';

$stylepath='http://'.$_SERVER['SERVER_NAME'].'/wineshop/css/';

$jspath='http://'.$_SERVER['SERVER_NAME'].'/wineshop/js/';

$ADMIN_SITE_TITLE='Liquor Shop Inventory';
$ADMIN_MAIL='rkp@webzin.in';
?>