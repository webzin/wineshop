<?php
header('Access-Control-Allow-Origin: *');

include("connect.php");	



//Login
if(isset($_POST['login']))
{
	$mobile=mysqli_real_escape_string($con,htmlspecialchars(trim(strtolower($_POST['mobile']))));
	$password=mysqli_real_escape_string($con,htmlspecialchars(trim($_POST['password'])));
	$selquery="SELECT *, AES_DECRYPT(`password`, SHA1('aalizzwell')) AS passd FROM users WHERE mobile='$mobile'";
	$qryresult=mysqli_query($con,$selquery);
	$selrow=mysqli_fetch_object($qryresult);

	$MBL=stripslashes($selrow->mobile);
	$PSW=stripslashes($selrow->passd);
	$ACT=stripslashes($selrow->activated);

	if($mobile==$MBL && $password==$PSW && $ACT=='Y')
	{
 		echo json_encode(array("value1" => "<div class='green'>Authentication Sucessful. Loging you in................</div>","value2" => "S","value3" => "$selrow->name","value4" => "$selrow->email","value5" => "$selrow->address","value6" => "$selrow->city","value7" => "$selrow->state","value8" => "$selrow->country","value9" => "$selrow->type","value10" => "$selrow->id","value11" => "$selrow->store_id","value12" => "$selrow->adharno","value13" => "$selrow->profile_pic"));
	}
	else if($mobile==$MBL && $password==$PSW && $ACT=='N')
	{
		echo json_encode(array("value1" => "<div class='red'>Account Not activated, Please Contact Administrator</div>","value2" => "N"));
	}
	else if($mobile!=$MBL)
	{
		echo json_encode(array("value1" => "<div class='red'>Mobile not Registrated with us, Please Register</div>","value2" => "E"));
	}
	else if($password!=$PSW)
	{
		echo json_encode(array("value1" => "<div class='red'>Incorrect Password, Request your password now.</div>","value2" => "P"));
	}
	
}

//Change Password
if(isset($_POST['change_password']))
{
	$email=mysqli_real_escape_string(htmlspecialchars(trim(strtolower($_POST['email']))));
	$old_password=mysqli_real_escape_string(htmlspecialchars(trim($_POST['old_password'])));
	$new_password=mysqli_real_escape_string(htmlspecialchars(trim($_POST['new_password'])));
	$check=mysqli_num_rows(mysqli_query("select * from `phonegap_login` where `email`='$email' and `password`='$old_password'"));
	if($check!=0)
	{
		mysqli_query("update `phonegap_login` set `password`='$new_password' where `email`='$email'");
		echo "success";
	}
	else
	{
		echo "incorrect";
	}
}

// Forget Password
if(isset($_POST['forgot']))
{
	$email=mysqli_real_escape_string(htmlspecialchars(trim(strtolower($_POST['email']))));
	$q=mysqli_query("SELECT *, AES_DECRYPT(`password`, SHA1('aalizzwell')) AS passd FROM users WHERE email='$email'");
	$check=mysqli_num_rows($q);
	if($check!=0)
	{
		echo "success";
		$data=mysqli_fetch_array($q);
		echo $string="Hey,".$data['name'].", Your password is ".$data['passd'];
		mail($email, "Your Password", $string);
	}
	else
	{
		echo "invalid";
	}
}

























//Add Load
if(isset($_POST['load']))
{
	$customername=mysqli_real_escape_string($con,htmlspecialchars(trim($_POST['customername'])));
	$orderno=mysqli_real_escape_string(htmlspecialchars(trim($_POST['orderno'])));
	$veichle=mysqli_real_escape_string(htmlspecialchars(trim($_POST['veichle'])));
	$building=mysqli_real_escape_string(htmlspecialchars(trim($_POST['building'])));
	$eml=mysqli_real_escape_string(htmlspecialchars(trim($_POST['eml'])));
	$login=mysqli_num_rows(mysqli_query("select * from `loads` where `order_no`='$orderno'"));
	if($login!=0)
	{
		echo json_encode(array("value1" => "<div class='red'>Order Number Already Exist</div>","value2" => "E"));
	}
	else
	{
		$uid=GetName(users,id,email,$eml);
		$date=date("y-m-d");
		$q=mysqli_query("insert into `loads` (`arrival_date`,`customer_id`,`order_no`,`user_id`,`vech_no`,`building`) values ('$date','$customername','$orderno','$uid','$veichle','$building')");
		 
		if($q)
		{
			/*echo "<div class='green'>Bundle Added successfully !</div>";*/
			$lastid = mysqli_insert_id();
			echo json_encode(array("value1" => "<div class='green'>Load Added successfully !</div>","value2" => "$lastid","value3" => "S"));
		}
		else
		{
			/*echo "<div class='red'>Bundle Not Added !</div>";*/
			echo json_encode(array("value1" => "<div class='red'>Load Not Added !</div>","value2" => "F"));
		}
	}

	echo mysqli_error();
}
//Add Warrant
if(isset($_POST['warrant']))
{
	$loads=mysqli_real_escape_string(htmlspecialchars(trim($_POST['loads'])));
	$warrantno=mysqli_real_escape_string(htmlspecialchars(trim($_POST['warrantno'])));
	$login=mysqli_num_rows(mysqli_query("select * from `warrants` where `warrant_no`='$warrantno'"));
	if($login!=0)
	{
		echo json_encode(array("value1" => "<div class='red'>Warrant Number Already Exist</div>","value2" => "E"));
	}
	else
	{
		$cid=GetName(loads,customer_id,id,$loads);
		$date=date("y-m-d");
		$q=mysqli_query("insert into `warrants` (`w_date`,`load_id`,`customer_id`,`warrant_no`) values ('$date','$loads','$cid','$warrantno')");
		if($q)
		{
			$lastid = mysqli_insert_id();
			echo json_encode(array("value1" => "<div class='green'>Warrant Added successfully !</div>","value2" => "$lastid","value3" => "S"));
		}
		else
		{
			echo json_encode(array("value1" => "<div class='red'>Warrant Not Added !</div>","value2" => "F"));
		}
	}
	echo mysqli_error();
}


//Add Bundle
if(isset($_POST['bundle']))
{
	$warantno=mysqli_real_escape_string(htmlspecialchars(trim($_POST['warantno'])));
	$batchid=mysqli_real_escape_string(htmlspecialchars(trim($_POST['batchid'])));
	$brand=mysqli_real_escape_string(htmlspecialchars(trim($_POST['brand'])));
	$pieces=mysqli_real_escape_string(htmlspecialchars(trim($_POST['pieces'])));
	$listw=mysqli_real_escape_string(htmlspecialchars(trim($_POST['listw'])));
	$scalew=mysqli_real_escape_string(htmlspecialchars(trim($_POST['scalew'])));
	$location=mysqli_real_escape_string(htmlspecialchars(trim($_POST['location'])));
	
	$login=mysqli_num_rows(mysqli_query("select * from `bundles` where `batch_id`='$batchid'"));
	
	if($login!=0)
	{
		/*echo "<div class='red'>Batch ID Already Exist</div>";*/
		echo json_encode(array("value1" => "<div class='red'>Batch ID Already Exist</div>","value2" => "E"));
	}
	
	else
	{
	$result = mysqli_query("SELECT SUM(list_w) AS value_sum FROM bundles where warrant_id='$warantno'"); 
	$row1 = mysqli_fetch_assoc($result); 
	$sum = $row1['value_sum'];
	
	$sum1 = $sum + $listw;
	
	if($sum1>3255) {



/*echo $msgwgt="<div class='red'>Total Weight is $sum1 : Limit Exhusted..! Choose Another or Add New Warrant</div>";*/
echo json_encode(array("value1" => "<div class='red'>Total Weight is $sum1 : Limit Exhusted..! Choose Another or Add New Warrant</div>","value2" => "L"));

}
else {
	$lid=GetName(warrants,load_id,id,$warantno);
	
	$cid=GetName(loads,customer_id,id,$lid);
		$date=date("y-m-d");
		$q=mysqli_query("insert into `bundles` (`arrival_date`,`custo_id`,`load_id`,`warrant_id`,`batch_id`,`brand`,`pieces`,`list_w`,`scale_w`,`location`) values ('$date','$cid','$lid','$warantno','$batchid','$brand','$pieces','$listw','$scalew','$location')");
		if($q)
		{
			/*echo "<div class='green'>Bundle Added successfully !</div>";*/
			echo json_encode(array("value1" => "<div class='green'>Bundle Added successfully !</div>","value2" => "S"));
		}
		else
		{
			/*echo "<div class='red'>Bundle Not Added !</div>";*/
			echo json_encode(array("value1" => "<div class='red'>Bundle Not Added !</div>","value2" => "F"));
		}
	}
	}
	echo mysqli_error();
}
//Create New Account
if(isset($_POST['signup']))
{
	$compname=mysqli_real_escape_string(htmlspecialchars(trim($_POST['compname'])));
	$fullname=mysqli_real_escape_string(htmlspecialchars(trim($_POST['fullname'])));
	$email=mysqli_real_escape_string(htmlspecialchars(trim(strtolower($_POST['email']))));
	$contactno=mysqli_real_escape_string(htmlspecialchars(trim($_POST['phoneno'])));
	$password=mysqli_real_escape_string(htmlspecialchars(trim($_POST['password'])));
	$ctype=mysqli_real_escape_string(htmlspecialchars(trim($_POST['ctype'])));
	$city=mysqli_real_escape_string(htmlspecialchars(trim($_POST['city'])));
	$region=mysqli_real_escape_string(htmlspecialchars(trim($_POST['region'])));
	$country=mysqli_real_escape_string(htmlspecialchars(trim($_POST['country'])));
	$org=mysqli_real_escape_string(htmlspecialchars(trim($_POST['org'])));
	$zip=mysqli_real_escape_string(htmlspecialchars(trim($_POST['zip'])));
	$search = array('@', '.');
	$replace = array('', '');
	$subject = $email;
	//$username = substr(str_replace('@','','',strtolower($email)), 0, 9).rand(1,9);
	$username = str_replace($search, $replace, $subject);
	
	
	
	$fql="SELECT * FROM users WHERE username='$username' OR email='$email' OR contactno='$contactno'";
	$fel=mysqli_query($fql);
	$row=mysqli_affected_rows();
	$flw=mysqli_fetch_object($fel);
	if($row>0)
	{
	if ($contactno==$flw->contactno)
	{
	echo json_encode(array("value1" => "<div class='red'>Mobile Number already exists</div>","value2" => "E"));
	}
	elseif($email==$flw->email) // change it to just else
	{
	echo json_encode(array("value1" => "<div class='red'>Email already exists</div>","value2" => "E"));
	}

	}
	else
	{
	
		$q=mysqli_query("INSERT INTO users SET compname='$compname',name='$fullname',username='$username',email='$email',password=AES_ENCRYPT('$password', SHA1('aalizzwell')),contactno='$contactno', state='$region',country='$country',address='$org',city='$city',zip='$zip',type='$ctype'");
		
		if($q)
		{
			echo json_encode(array("value1" => "<div class='green'>Thank you for Registering with us! you can login now</div>","value2" => "S"));
		}
		else
		{
			echo "failed";
		}
		
	}
	echo mysqli_error();
	 
}




//Profile Update
if(isset($_POST['update']))
{
	$compname=mysqli_real_escape_string(htmlspecialchars(trim($_POST['compname'])));
	$fullname=mysqli_real_escape_string(htmlspecialchars(trim($_POST['fullname'])));
	$email=mysqli_real_escape_string(htmlspecialchars(trim(strtolower($_POST['email']))));
	$contactno=mysqli_real_escape_string(htmlspecialchars(trim($_POST['phoneno'])));
	$password=mysqli_real_escape_string(htmlspecialchars(trim($_POST['password'])));
	$ctype=mysqli_real_escape_string(htmlspecialchars(trim($_POST['ctype'])));
	$city=mysqli_real_escape_string(htmlspecialchars(trim($_POST['city'])));
	$state=mysqli_real_escape_string(htmlspecialchars(trim($_POST['state'])));
	$country=mysqli_real_escape_string(htmlspecialchars(trim($_POST['country'])));
	$address=mysqli_real_escape_string(htmlspecialchars(trim($_POST['address']))); 
	$zip=mysqli_real_escape_string(htmlspecialchars(trim($_POST['zip'])));
	$id=$_POST['id'];
	if ($password=='')
	{
	$q=mysqli_query("UPDATE users SET compname='$compname', name='$fullname',email='$email',contactno='$contactno', state='$state', country='$country', address='$address',city='$city',zip='$zip' where id='$id'");
	}
	else {
	$q=mysqli_query("UPDATE users SET compname='$compname',name='$fullname',email='$email',password=AES_ENCRYPT('$password', SHA1('aalizzwell')),contactno='$contactno', state='$state',country='$country',address='$address',city='$city',zip='$zip' where id='$id'");
	}
	$selquery="SELECT * from users WHERE id='$id'";
	$qryresult=mysqli_query($selquery);
	$selrow=mysqli_fetch_object($qryresult);
	if($q)
		{
			echo json_encode(array("value1" => "<div class='green'>Data Updated</div>","value2" => "$selrow->compname","value3" => "$selrow->name","value4" => "$selrow->contactno","value5" => "$selrow->address","value6" => "$selrow->city","value7" => "$selrow->state","value8" => "$selrow->country","value9" => "$selrow->type","value10" => "$selrow->id","value11" => "$selrow->zip"));
		}
		else
		{
			echo json_encode(array("value1" => "<div class='red'>Data Not Updated</div>"));
		}	

	echo mysqli_error();
	 
}
?>