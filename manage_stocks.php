<?php
//connect to database
include("top.php");
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
 
$sqlSelectclient="SELECT * FROM stock_inventory order by `id` ASC";
$selectclient=mysqli_query($con,$sqlSelectclient);
$totrows=mysqli_affected_rows($con);

?>
 
 
       
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true,
						pageLength: 100
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
                        <h1 class="page-header">Manage Stocks</h1>
						 
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                   
                                    <? if($msg==2) { ?>Item Updated Sucessfully!!!<? } ?>
                                    
                                </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               <?php echo GetName('stores','name','id',11); ?>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
											<th>Sl No</th>
											<th>Date</th>
                                                <th>Store Name</th>
                                                <th>Item Name</th>
                                                <th>Type</th>
                                                <th>In Qty</th>
                                                <th>Out Qty</th>
                                                <th>Chalan No</th>
												<th>Balance</th>
												<th>Edit</th>

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=1;
	  while($resultclient=mysqli_fetch_object($selectclient))
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
		 
          
                                            <tr class="<?php echo $class; ?>" id="<? echo stripslashes($resultclient->id); ?>">
											<td><?php echo $i; ?></td>
											<td class="center"><?php echo $resultclient->date; ?></td>
                                                <td><?php echo GetName('stores','name','id',$resultclient->store_id); ?></td>
                                                <td><?php echo GetName('items','item_name','id',$resultclient->item_id); ?></td>
                                                <td><?php $vid=GetName('items','type_id','id',$resultclient->item_id); echo GetName('variants_type','name','id',$vid); ?></td>
                                                <td class="center"><?php echo stripslashes($resultclient->in_qty); ?></td>
                                                <td class="center"><?php echo stripslashes($resultclient->out_qty); ?></td>
                                                <td class="center"><?php echo stripslashes($resultclient->chalan_no); ?></td>
												<td class="center"> <?php echo stripslashes($resultclient->stock_bal); ?></td>
												<td class="center"> 
												<a class="btn btn-info btn-circle" href="manage_stocks.php?action=edit&id=<?php echo stripslashes($resultclient->id); ?>"><i class="fa fa-edit"></i></a>
												 
														 
                                                 
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
