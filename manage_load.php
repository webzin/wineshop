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
		$sqlload="SELECT * FROM loads";
			$seload=mysql_query($sqlload);
			$totrows=mysql_affected_rows();
	    
?>

<?php include("top.php"); ?>
 
       
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
            });

			 jQuery(document).ready(function(){

		<? if($msg==6) { ?>

		jQuery('.login-alert').fadeIn(1000);

		jQuery('.login-alert').fadeOut(5000);
		<? } ?>

<? if($msg==2) { ?>

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
                        <h1 class="page-header">Manage Loads</h1>
						<div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Load Deleted
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <? if($msg==1) { ?>Load Added Sucessfully!!!<? } ?>
                                    <? if($msg==2) { ?>Load Updated Sucessfully!!!<? } ?>
                                    
                                </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Load Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Date Name</th>
                                                <th>Customer Name</th>
                                                <th>Order No</th>
                                                <th>User</th>
                                                <th>Railcar/Truck#:</th>
												<th>Building</th>
                                                <th>Options</th>

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	  while($resultload=mysql_fetch_object($seload))
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
		 
          
                                            <tr class="<?php echo $class; ?>" id="<? echo stripslashes($resultload->id); ?>">
                                                <td><? echo stripslashes($resultload->arrival_date); ?></td>
                                                <td>
												<? echo GetName(users,compname,id,$resultload->customer_id) ?>
												</td>
                                                <td><? echo stripslashes($resultload->order_no); ?></td>
                                                <td class="center">
												<? echo GetName(users,name,id,$resultload->user_id) ?>
												</td>
                                                <td class="center"><? echo stripslashes($resultload->vech_no); ?></td>
												<td class="center"><? echo GetName(building,name,id,$resultload->building) ?></td>
												<td class="center">
												<a class="btn btn-success btn-circle" href="add_load.php?action=view&id=<? echo stripslashes($resultload->id); ?>"><i class="fa fa-search"></i></a>
												<a class="btn btn-info btn-circle" href="add_load.php?action=edit&id=<? echo stripslashes($resultload->id); ?>"><i class="fa fa-edit"></i></a>
                                                <?php if($UTYPE=='A') {?>
												<a href="javascript:void();" class="btn btn-danger btn-circle delload"><i class="fa fa-times"></i></a>
                                                <?php } ?>
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
