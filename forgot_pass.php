<?
  //connect to database
  include("connect.php");
  $email=$_POST["email"];

  $selquery="SELECT id,username,`password`, AES_DECRYPT(`password`, SHA1('aalizzwell')) AS passd FROM admin WHERE email='".mysql_real_escape_string($email)."'";
  $qryresult=mysql_query($selquery);
  $selrow=mysql_fetch_object($qryresult);
  
	$username=stripslashes($selrow->username);
 	$password=stripslashes($selrow->passd);
	 
	if(mysql_affected_rows()>0 && !is_valid_email($email))
	{
		    $subject="Login Password of the Railcar Tracker";	
			$content='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
					<html xmlns="http://www.w3.org/1999/xhtml">
					<head>
					<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
					<style>
					body {
						margin: 0px;
						font-family: Verdana, Arial, Helvetica, sans-serif;
						font-size: 11px;
						color: #3c3c3c;
						text-decoration: none;
						background-color: #42003b;
					}
					.main {
						width:925px;
						margin:0 auto;
					}
					.top {
						width:925px;
						float:left;
					}
					.header {
						width:925px;
						float:left;
					}
					.header_left {
						width:435px;
						float:left;
						padding-top:7px;
						padding-bottom:1px;
						padding-left:27px;
					}
					.header_right {
						width:444px;
						float:right;
						padding-top:22px;
						padding-bottom:22px;
						padding-right:19px;
					}
					.middle {
						width:925px;
						float:left;
					}
					.mid_right {
						width:635px;
						float:left;
						padding-left:33px;
						padding-top:5px;
					}
					.content_top {
						width:635px;
						float:left;
						padding-bottom:30px;
						line-height:18px;
					}
					h1 {
						font-family: tahoma;
						font-size: 16px;
						font-weight: bold;
						color:#d2242d;
						text-decoration: none;	
						padding-bottom:6px;	
					}
					.black_12 {
						font-family: Verdana, Arial, Helvetica, sans-serif;
						font-size: 12px;
						color: #3c3c3c;
						text-decoration: none;
					}
					
					</style>
					</head>
					
					<body>
						<div class="main">
							<div class="top">
							  <div class="header">
								<div class="header_left"><table border="0" cellpadding="0" cellspacing="0">
									   <tr>
										<td class="smallbold" align="left"><a href="'.$addres.'" target="_blank"><img src="'.$addres.'images/logo1.jpg" border="0" /></a></td>
									  </tr>
							   </table></div>
								</div>
							</div>
					
							<div class="middle">
								<div class="mid_right">
								  <div class="content_top"><BR><BR><strong>Dear '.$username.'</strong>
									  <span class="black_12">
									  <BR><BR>
												
										Your Login details are:<br>
										User Name ::- '.$username.' <BR>
										Password ::- '.$password.' <bR>
													
									</span>				
								  </div>
								</div>
						  </div>
					</div>
					</body>
					</html>';
			
			$to = $email;
			$from=$username." <".$email.">";
						
			SendHTMLMail($to,$subject,$content,$from);
			echo "<script>location.href='index.php'</script>";
			exit;
  	}
  else
  {   	 
	 echo "<script>location.href='forgot.php?em=1'</script>";	
  }
  
?>