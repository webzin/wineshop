<?php header('Access-Control-Allow-Origin: *');
include("connect.php");					
  $selc1="SELECT * FROM customers";	 
	  ?>
       <option value="" selected="selected">Select a Customer</option>
       <?
    $runc1=mysql_query($selc1);
    while($getc1=mysql_fetch_object($runc1))
     {                            
    ?>                   
    <option value="<? echo stripslashes($getc1->disp_name); ?>"><? echo stripslashes($getc1->disp_name); ?></option>
    <? } ?>             