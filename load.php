<?php header('Access-Control-Allow-Origin: *');
include("connect.php");					
  $selc1="SELECT * FROM loads";	 
	  ?>
       <option value="" selected="selected">Select a Load</option>
       <?
    $runc1=mysql_query($selc1);
    while($getc1=mysql_fetch_object($runc1))
     {                            
    ?>                   
    <option value="<? echo stripslashes($getc1->id); ?>"><? echo stripslashes($getc1->order_no); ?></option>
    <? } ?>             