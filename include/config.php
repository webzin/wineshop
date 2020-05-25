<?php
error_reporting( error_reporting() & ~E_NOTICE );
/********  local Config  ***********/
//session_start();
  define('DBSERVER','localhost');
  define('DATABASENAME','wineinventory');
  define('USERNAME','root');
  define('PASSWORD','');

  $addres='http://'.$_SERVER['SERVER_NAME'].'/';
  
  $imagepath='http://'.$_SERVER['SERVER_NAME'].'/wineshop/images/';
  $stylepath='http://'.$_SERVER['SERVER_NAME'].'/wineshop/css/';
  $jspath='http://'.$_SERVER['SERVER_NAME'].'/wineshop/js/';
?>