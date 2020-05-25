<?
  //connect to database
 include("connect.php");
  $name=$_POST["username"];
  $pass=$_POST["password"];
  $signin=$_POST["remember"];

  $selquery="SELECT *, AES_DECRYPT(`password`, SHA1('aalizzwell')) AS passd FROM users WHERE (username='$name' or email='$name')";
  $qryresult=mysql_query($selquery);
  $check=mysql_num_rows($qryresult);
	
  $selrow=mysql_fetch_object($qryresult);
  
	$ANAME=stripslashes($selrow->username);
	$AEMAL=stripslashes($selrow->email);
 	$APSWD=stripslashes($selrow->passd);
	$AID=stripslashes($selrow->id);
	$utype=stripslashes($selrow->type); 

/*	if($name==$ANAME || $name==$AEMAIL && $pass==$APSWD)*/
	if($check!=0)
	{
		if($signin=="on")
		{
			setcookie("adm","");
			setcookie("adm", $AID, time()+31536000);
			//session_register("AdmID");
			$rrr=$_SESSION["AdmID"]=$AID;
			echo "<script>location.href='dashboard.php'</script>";			
		}
		 
		else
		{
			setcookie("adm","");
			//session_register("AdmID");
			$rrr=$_SESSION["AdmID"]=$AID;
			echo "<script>location.href='dashboard.php'</script>";	
		}
  	}
  else
  {   	 
	 echo "<script>location.href='index.php?pas=1'</script>";	
  }
  
?>