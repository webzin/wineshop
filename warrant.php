
<?php header('Access-Control-Allow-Origin: *');
include("connect.php");					
  $selc1="SELECT * FROM warrants";	 
	  ?>
       <option value="" selected="selected">Select a Warrant</option>
       <?
    $runc1=mysqli_query($con,$selc1);
    while($getc1=mysqli_fetch_object($runc1))
     {                            
    ?>                   
    <option value="<? echo stripslashes($getc1->id); ?>"><? echo stripslashes($getc1->warrant_no); ?></option>
    <? } ?>             