<?php
 

 //check user login session is logged out or not
 include("logout_chk.php");

 //current user session assign to a variable
 //echo $user=$_SESSION["AdmID"];
 
 include("user_chk.php"); 
 

 ?>
<?php include("top.php"); ?>
 
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
<?php include("nav.php");?>
          

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
						 
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
										 <?php echo GetCount('users') ?>
										</div>
                                        <div>Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manage_customer.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					<div class="col-lg-2 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-shopping-bag fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo GetCount('stores') ?></div>
                                        <div>Stores</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manage_bundle.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-thumbs-up fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo GetCount('brands') ?></div>
                                        <div>Brands</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manage_load.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-glass fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo GetCount('variants') ?></div>
                                        <div>Variants</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manage_warrant.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-hourglass fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo GetCount('variants_type') ?></div>
                                        <div>Types</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manage_bundle.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
					<div class="col-lg-2 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo SumTotal('items', 'current_stock')?></div>
                                        <div>Total Stock</div>
                                    </div>
                                </div>
                            </div>
                            <a href="manage_bundle.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row --> 

                <div class="row">
                <div class="col-lg-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Daily Report (All)
                
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
               <div class="dataTable_wrapper">
				<?php  
				$cusqry="SELECT * FROM users where type='STORE' ORDER BY id DESC LIMIT 0, 5";
                $cusres=mysqli_query($con, $cusqry);
                ?>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Stock In</th>
                                                <th>Stock Out</th>
                                                <th>Current Stock</th>
                                               

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	  while($resultclient=mysqli_fetch_object($cusres))
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
		 
          
                                            <tr class="<?php echo $class; ?>" id="<?php echo stripslashes($resultclient->id); ?>">
                                                <td><?php echo GetName('stores','name','id',$resultclient->store_id) ?></td>
                                                <td><?php echo stripslashes($resultclient->name); ?></td>
                                                <td><?php echo stripslashes($resultclient->email); ?></td>
                                                
                                                <td><?php echo stripslashes($resultclient->mobile); ?></td>
												
												
                                            </tr>
                                              <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                </div>
                <!-- /.panel-body -->
                </div>
                </div>
                <div class="col-lg-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-area-chart fa-fw"></i> Monthly Report ( All )
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
               <div class="dataTable_wrapper">
				<?php  
				$cusqry="SELECT * FROM users where type='STORE' ORDER BY id DESC LIMIT 0, 5";
                $cusres=mysqli_query($con, $cusqry);
                ?>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Month</th>
                                                <th>Stock In</th>
                                                <th>Stock Out</th>
                                                <th>Current Stock</th>
                                               

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	  while($resultclient=mysqli_fetch_object($cusres))
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
		 
          
                                            <tr class="<?php echo $class; ?>" id="<?php echo stripslashes($resultclient->id); ?>">
                                                <td><?php echo GetName('stores','name','id',$resultclient->store_id) ?></td>
                                                <td><?php echo stripslashes($resultclient->name); ?></td>
                                                <td><?php echo stripslashes($resultclient->email); ?></td>
                                                
                                                <td><?php echo stripslashes($resultclient->mobile); ?></td>
												
												
                                            </tr>
                                              <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                </div>
                <!-- /.panel-body -->
                </div>
                </div>
                </div>
                
                
                
                <div class="row">
                <div class="col-lg-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-file-text fa-fw"></i> Recent Stock In
                
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                     <?php 		$sqlwrnts="SELECT * FROM stock_in ORDER BY id DESC LIMIT 0, 5";
			$selwrnt=mysqli_query($con,$sqlwrnts);
			$wrntrows=mysqli_affected_rows($con);
			?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                             <th>Date</th>
                                                <th>Store Name</th>
                                                <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Chalan No</th>
                                               

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	  while($reswrnt=mysqli_fetch_object($selwrnt))
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
		 
          
                                            <tr class="<?php echo $class; ?>" id="<?php echo stripslashes($reswrnt->id); ?>">
                                                <td><?php echo stripslashes($reswrnt->date); ?></td>
												<td><?php echo GetName('stores','name','id',$reswrnt->store_id) ?></td>
                                                <td><?php echo GetName('items','item_name','id',$reswrnt->item_id) ?></td>
                                                <td><?php echo stripslashes($reswrnt->qty); ?></td>
                                                <td><?php echo stripslashes($reswrnt->chalan_no); ?></td>
                                                
											
												
                                            </tr>
                                              <?php $i++; } ?>
                                        </tbody>
                                    </table>
                </div>
                <!-- /.panel-body -->
                </div>
                </div>
                <div class="col-lg-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-sign-in fa-fw"></i> Recent Stock Out
                
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                     <?php 		$sqlwrnts="SELECT * FROM stock_in ORDER BY id DESC LIMIT 0, 5";
			$selwrnt=mysqli_query($con,$sqlwrnts);
			$wrntrows=mysqli_affected_rows($con);
			?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                             <th>Date</th>
                                                <th>Store Name</th>
                                                <th>Item Name</th>
                                                <th>Quantity</th>
                                                <th>Chalan No</th>
                                               

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	  while($reswrnt=mysqli_fetch_object($selwrnt))
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
		 
          
                                            <tr class="<?php echo $class; ?>" id="<?php echo stripslashes($reswrnt->id); ?>">
                                                <td><?php echo stripslashes($reswrnt->date); ?></td>
												<td><?php echo GetName('stores','name','id',$reswrnt->store_id) ?></td>
                                                <td><?php echo GetName('items','item_name','id',$reswrnt->item_id) ?></td>
                                                <td><?php echo stripslashes($reswrnt->qty); ?></td>
                                                <td><?php echo stripslashes($reswrnt->chalan_no); ?></td>
                                                
											
												
                                            </tr>
                                              <?php $i++; } ?>
                                        </tbody>
                                    </table>
                </div>
                <!-- /.panel-body -->
                </div>
                </div>
                </div>
                
                
                
        		<div class="row">
                <div class="col-lg-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-users fa-fw"></i> Recent Users
                
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
               <div class="dataTable_wrapper">
				<?php  
				$cusqry="SELECT * FROM users where type='STORE' ORDER BY id DESC LIMIT 0, 5";
                $cusres=mysqli_query($con, $cusqry);
                ?>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Store Name</th>
                                                <th>Contact Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                               

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	  while($resultclient=mysqli_fetch_object($cusres))
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
		 
          
                                            <tr class="<?php echo $class; ?>" id="<?php echo stripslashes($resultclient->id); ?>">
                                                <td><?php echo GetName('stores','name','id',$resultclient->store_id) ?></td>
                                                <td><?php echo stripslashes($resultclient->name); ?></td>
                                                <td><?php echo stripslashes($resultclient->email); ?></td>
                                                
                                                <td><?php echo stripslashes($resultclient->mobile); ?></td>
												
												
                                            </tr>
                                              <?php $i++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                </div>
                <!-- /.panel-body -->
                </div>
                </div>
                <div class="col-lg-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-shopping-bag fa-fw"></i> Recent Stores
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <?php 		$sqlloads="SELECT * FROM stores ORDER BY id DESC LIMIT 0, 5";
			$seload=mysqli_query($con,$sqlloads);
			$loadrows=mysqli_affected_rows($con);
			?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Store Name</th>
                                                <th>Address</th>
                                                <th>City, State</th>
                                                <th>Country</th>
												<th>Zip</th>
                                                 

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	  while($resultload=mysqli_fetch_object($seload))
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
		 
          
                                            <tr class="<?php echo $class; ?>" id="<?php echo stripslashes($resultload->id); ?>">
                                                <td><?php echo stripslashes($resultload->name); ?></td>
                                                <td><?php echo stripslashes($resultload->address); ?></td>
                                                <td><?php echo stripslashes($resultload->city); ?>,  <?php echo stripslashes($resultload->state); ?></td>
                                                <td><?php echo stripslashes($resultload->country); ?></td>
												<td><?php echo stripslashes($resultload->zip); ?></td>
												
                                            </tr>
                                              <?php $i++; } ?>
                                        </tbody>
                                    </table>
                
                </div>
                <!-- /.panel-body -->
                </div>
                </div>
                </div>
                
                     
               </div>
               </div>     
   
    </body>
</html>
