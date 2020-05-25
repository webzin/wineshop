<?php
//connect to database
 include("connect.php");
 //check user login session is logged out or not
 include("logout_chk.php");
 //current user session assign to a variable
 $user=$_SESSION["AdmID"];
 	$id=$_GET["id"];
	 include("user_chk.php"); 

	//gets the current date 
	$curdate=date("Y-m-d");
	//get the message of the railcars page 
	$msg=$_GET['msg'];
	//loop throgh post values
	if(is_array($_POST))

	{
		//grabs the $_POST variables and adds slashes
		foreach($_POST as $var=>$valu)
		{
		 $$var = addslashes($valu);
		}
	}
			$sqlu="SELECT * FROM users";
			$selu=mysql_query($sqlu);
			$totrows=mysql_affected_rows();
	    
?>
 <?php if($UTYPE=='U') { ?>
 <script>alert('You are not authorised to access this page');
 location.href='javascript:history.go(-1)'</script>";
 <?php } ?>
<?php include("top.php"); ?>
 
       

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });

			 jQuery(document).ready(function(){

		<? if($msg==5) { ?>

		jQuery('.login-alert').fadeIn(1000);

		jQuery('.login-alert').fadeOut(5000);
		<? } ?>

<? if($msg==1) { ?>

		jQuery('.sm').fadeIn(1000);

		jQuery('.sm').fadeOut(5000);
		<? } ?>
    });

</script>
         


    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
            <?php include("nav.php"); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Manage Users</h1>
						<div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    User Deleted
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <? if($msg==1) { ?>User Added Sucessfully!!!<? } ?>
                                    <? if($msg==2) { ?>User Updated Sucessfully!!!<? } ?>
                                    
                                </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                User Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Type</th>
												<th>Options</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	   while($resultu=mysql_fetch_object($selu))
        	  {
			
				 if($i % 2 != "0")
  				 {
     			 $class = 'odd';
   					}
  				 else
   				{
      			$class = 'even';
   				}

				  ?>
		 
          
                                            <tr class="<?php echo $class; ?>" id="<? echo stripslashes($resultu->id); ?>">
                                                <td><? echo stripslashes($resultu->name); ?></td>
                                                <td><? echo stripslashes($resultu->username); ?></td>
                                                <td><? echo stripslashes($resultu->email); ?></td>
                                                <td class="center"><? echo stripslashes($resultu->contactno); ?></td>
                                                <td class="center">
												<?php if($resultu->type=="A")  echo "<span>Admin</span>" ?>
												<?php if($resultu->type=="U") echo "<span>User</span>" ?>
												</td>
												<td class="center">
												<a class="btn btn-success btn-circle" href="user_profile.php?id=<? echo stripslashes($resultu->id); ?>"><i class="fa fa-search"></i></a>
												<a class="btn btn-info btn-circle" href="add_user.php?action=edit&id=<? echo stripslashes($resultu->id); ?>"><i class="fa fa-edit"></i></a>
												<a href="javascript:void();" class="btn btn-danger btn-circle deluser"><i class="fa fa-times"></i></a>
												</td>
                                            </tr>
                                              <? $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.table-responsive -->
                          </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                      <!-- /.panel -->
                  </div>
                <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                      <!-- /.panel -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                      <!-- /.panel -->
                  </div>
                <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                      <!-- /.panel -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-6">
                      <!-- /.panel -->
                  </div>
                <!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                      <!-- /.panel -->
                  </div>
                  <!-- /.col-lg-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
 
       

    </body>
</html>
