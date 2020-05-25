<?php 
  //connect to database
 include("connect.php");
 //check user login session is logged out or not
 include("logout_chk.php");
 //current user session assign to a variable
 $user=$_SESSION["AdmID"]; 
//ti is identifier to delete which id
 $ti=$_GET["ti"];
 $id=$_GET["id"];
/*for  deleteing the acting skill*/
	if($ti=="ru")
	//delete for the selected row 
	{
	$dele="DELETE FROM users WHERE id=$id";
	$deleq=mysql_query($dele);
	$msg=5;
	echo "<script>location.href='manage_user.php?msg=$msg'</script>";
	}
	if($ti=="rc")
	//delete for the selected row 
	{
	$dele="DELETE FROM customers WHERE id=$id";
	$deleq=mysql_query($dele);
	$msg=6;
	echo "<script>location.href='manage_customer.php?msg=$msg'</script>";
	}
	
	if($ti=="wr")
	//delete for the selected row 
	{
	$dele="DELETE FROM warrants WHERE id=$id";
	$deleq=mysql_query($dele);
	$msg=6;
	echo "<script>location.href='manage_warrant.php?msg=$msg'</script>";
	}
	
	if($ti=="ld")
	//delete for the selected row 
	{
	$dele="DELETE FROM loads WHERE id=$id";
	$deleq=mysql_query($dele);
	$msg=6;
	echo "<script>location.href='manage_load.php?msg=$msg'</script>";
	}
	
	if($ti=="bl")
	//delete for the selected row 
	{
	$dele="DELETE FROM customers WHERE id=$id";
	$deleq=mysql_query($dele);
	$msg=6;
	echo "<script>location.href='manage_customer.php?msg=$msg'</script>";
	}	