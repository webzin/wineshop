<?php include("top.php");  

$pas=$_GET["pas"];

$log=$_GET["log"];

//include("login_chk.php");

?>



		<script type="text/javascript">

/*jquery checks the login and show the error*/

    jQuery(document).ready(function(){

		<? if($pas==1) { ?>

		jQuery('.login-alert').fadeIn();

		<? } ?>

        jQuery('#login').submit(function(){

            var u = jQuery('#username').val();

            var p = jQuery('#password').val();

			if(u == '' && p == '') {

				jQuery('.login-alert').fadeIn();

                return false;

            }

			if(u == '' || p == '') {

				jQuery('.login-alert').fadeIn();

                return false;

            }

        });

    });

</script>
    </head>
    <body>
 
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form role="form" id="login" action="password.php" method="post">
							<div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Invalid Mobile / email or password
                                </div>
                                <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="User Name" name="username" type="username" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Password" name="password" type="password" value="" required>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input name="remember" type="checkbox">Remember Me
                                        </label>
                                    </div>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-lg btn-success btn-block">Login</button>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>
</html>
