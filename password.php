<?
  //connect to database
 include("connect.php");
  $name=$_POST["username"];
  $pass=$_POST["password"];
  $signin=$_POST["remember"];
 
	$selquery="SELECT *, AES_DECRYPT(`password`, SHA1('aalizzwell')) AS passd FROM users WHERE (mobile='$name' or email='$name')";
	$qryresult=mysqli_query($con, $selquery);
	$row=mysqli_fetch_assoc($qryresult);
	$check=mysqli_num_rows($qryresult);
	
 
  
	$ANAME=stripslashes($row['name']);
	$AEMAL=stripslashes($row['email']);
 	$APSWD=stripslashes($row['passd']);
	echo $AID=stripslashes($row['id']);
	$utype=stripslashes($row['type']); 

/*	if($name==$ANAME || $name==$AEMAIL && $pass==$APSWD)*/
	if($check!=0)
	{
		if($signin=="on")
		{
		setcookie("adm","");
		setcookie("adm", $AID, time()+31536000);
		echo "<script1>location.href='dashboard.php'</script>";			
		}

		else
		{
		session_start();
		$_SESSION["AdmID"]=$AID;
	 
		setcookie("adm","");
		setcookie("adm", $AID, time()+31536000);
		echo "<script>location.href='dashboard.php'</script>";	
		}
  	}
  else
  {   	 
	echo "<script>location.href='index.php?pas=1'</script>";	
  }
  
?>