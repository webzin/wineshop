<?php
//connect to database
include("connect.php"); 

//gets the current date 
$curdate=date("Y-m-d");

//loop throgh post values
if(is_array($_POST))

{
foreach($_POST as $var=>$valu)
{
//grabs the $_POST variables and adds slashes
$$var = addslashes($valu);
}
}
	if($_POST["submit"])
	{

		if(!$id)
		
					    {
						
								
$fql="SELECT * FROM variants WHERE vtype='category' AND name='$variants'";
$fel=mysqli_query($con,$fql);
$row=mysqli_affected_rows($con);
if($row>0)
{
$msg1="$variants Already Exhist..!";

}


else{
 

$insquery = "INSERT INTO variants SET vtype='$category', name='$variants'";



$insresult = mysqli_query($con,$insquery);
//message call for success

echo "Record Added Sucessfully";

	 
}


}
 
if($id)
		
{
$query = "UPDATE variants_type SET vtype='$category', name='$variants' where id='$id'";

			$result = mysqli_query($con,$query);
			//message call for success

			echo "Record Updated Sucessfully";	  
			
	}		
	
 
}
 
 
 
 
 
 ?>
 