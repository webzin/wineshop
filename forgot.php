<?
//connect to database
include("connect.php");
$em=$_GET["em"];
include("login_chk.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><? echo $ADMIN_SITE_TITLE; ?></title>
<!--main style sheet-->
<link rel="stylesheet" href="<?php echo $stylepath; ?>style.default.css" type="text/css" />
<!--main style sheet-->
<!--red style sheet-->
<link id="skinstyle" rel="stylesheet" href="<?php echo $stylepath; ?>style.red.css" type="text/css" />
<!--red style sheet-->
<!--main js file-->
<script type="text/javascript" src="<?php echo $jspath; ?>jquery-1.9.1.min.js"></script>
<!--main js file-->
<script type="text/javascript">
/*jquery checks the login and show the error*/
    jQuery(document).ready(function(){
		<? if($em==1) { ?>
		jQuery('.login-alert').fadeIn();
		<? } ?>
        jQuery('#login').submit(function(){
            var u = jQuery('#email').val();
            var p = jQuery('#password').val();
			if(u == '') {
				jQuery('.login-alert').fadeIn();
                return false;
            }
			if(u == '') {
				jQuery('.login-alert').fadeIn();
                return false;
            }
        });
    });
</script>
</head>
<body class="loginpage">
<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="images/logo1.jpg" alt="" /></div>
        <form id="login" action="forgot_pass.php" method="post">
            <div class="inputwrapper login-alert">
                <div class="alert alert-error" style="width:100% !important;">Invalid Email Address</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input style="width:230px !important;" type="text" name="email" id="email" placeholder="Enter Email Address" />
            </div>
            <!--<div class="inputwrapper animate2 bounceIn">
                <input style="width:230px !important;" type="password" name="password" id="password" placeholder="Enter any password" />
            </div>-->
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit" style="width:251px !important;">Send Email</button>
            </div>
            <!--<div class="inputwrapper animate4 bounceIn">
                <label><input type="checkbox" class="remember" name="signin" /> Keep me sign in</label>
            </div>
                <label><a href="email2.php"  style="color:#FFF; float: right; margin: -24px 12px;"><span>
                Forgot Password</span></a></label>-->
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->
<div class="loginfooter">
 <p>&copy; <? echo date('Y'); ?>. Rocky Mountain Rail Car Repair. All Rights Reserved..</p>
</div>
</body>
</html>