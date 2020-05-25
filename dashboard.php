<?php
//connect to database
 include("connect.php");

 //check user login session is logged out or not
 include("logout_chk.php");

 //current user session assign to a variable
 $user=$_SESSION["AdmID"];
 
 	$id=$_GET["id"];

 include("user_chk.php") 
 

 ?>
<?php include("top.php"); ?>
 
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
<?php include("nav.php"); ?>
          

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">
										<?php
										$uquery="SELECT * FROM users where type='C' ";
	
	$uresult=mysql_query($uquery);
	echo mysql_error();
	echo $row_total= mysql_affected_rows();	
	
	?>
										</div>
                                        <div>Customers</div>
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
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-tasks fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><? echo GetCount(loads) ?></div>
                                        <div>Loads</div>
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
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text-o fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><? echo GetCount(warrants) ?></div>
                                        <div>Warrents</div>
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
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><? echo GetCount(bundles) ?></div>
                                        <div>Bundles</div>
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
                <i class="fa fa-users fa-fw"></i> Recent Cusotmers
                
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
               <div class="dataTable_wrapper">
				<?php  
				$cusqry="SELECT * FROM users where type='C' ORDER BY id DESC LIMIT 0, 5";
                $cusres=mysql_query($cusqry);
                ?>
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Company Name</th>
                                                <th>Contact Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                               

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	  while($resultclient=mysql_fetch_object($cusres))
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
                                                <td><? echo stripslashes($resultclient->compname); ?></td>
                                                <td><? echo stripslashes($resultclient->name); ?></td>
                                                <td><? echo stripslashes($resultclient->email); ?></td>
                                                
                                                <td><? echo stripslashes($resultclient->contactno); ?></td>
												
												
                                            </tr>
                                              <? $i++; } ?>
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
                <i class="fa fa-tasks fa-fw"></i> Recent Loads
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <?php 		$sqlloads="SELECT * FROM loads ORDER BY id DESC LIMIT 0, 5";
			$seload=mysql_query($sqlloads);
			$loadrows=mysql_affected_rows();
			?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Customer Name</th>
                                                <th>Order No</th>
                                                 
                                                <th>Railcar/Truck#:</th>
												<th>Building</th>
                                                 

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
                                                 
                                                <td class="center"><? echo stripslashes($resultload->vech_no); ?></td>
												<td class="center"><? echo GetName(building,name,id,$resultload->building) ?></td>
												
                                            </tr>
                                              <? $i++; } ?>
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
                <i class="fa fa-file-text fa-fw"></i> Recent Warrants
                
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                     <?php 		$sqlwrnts="SELECT * FROM warrants ORDER BY id DESC LIMIT 0, 5";
			$selwrnt=mysql_query($sqlwrnts);
			$wrntrows=mysql_affected_rows();
			?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                             <th>Date</th>
                                                <th>Company Name</th>
                                                <th>Order No</th>
                                                <th>Warrant No</th>
                                                <th>Veichle No</th>
                                               

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	  while($reswrnt=mysql_fetch_object($selwrnt))
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
		 
          
                                            <tr class="<?php echo $class; ?>" id="<? echo stripslashes($reswrnt->id); ?>">
                                                <td><? echo stripslashes($reswrnt->w_date); ?></td>
                                                <td><? echo GetName(users,compname,id,$reswrnt->customer_id) ?></td>
                                                <td><? echo GetName(loads,order_no,id,$reswrnt->load_id) ?></td>
                                                <td class="center"><? echo stripslashes($reswrnt->warrant_no); ?></td>
                                                <td class="center"><? echo GetName(loads,vech_no,id,$reswrnt->load_id) ?></td>
											
												
                                            </tr>
                                              <? $i++; } ?>
                                        </tbody>
                                    </table>
                </div>
                <!-- /.panel-body -->
                </div>
                </div>
                <div class="col-lg-6">
                <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-support fa-fw"></i> Recent Bundles
                
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                
                         <?php 		$sqlbndls="SELECT * FROM `bundles` ORDER BY id DESC LIMIT 0, 5";
			$selbndl=mysql_query($sqlbndls);
			$bndlrows=mysql_affected_rows();
			?>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Order#</th>
                                              	<th>Warrant#</th>
                                                <th>Batch#</th>
                                                <th>Brand</th>
                                                <th>Pieces</th>
                                              

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
	   $i=0;
	  while($resbndls=mysql_fetch_object($selbndl))
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
		 
          
                                            <tr class="<?php echo $class; ?>" id="<? echo stripslashes($resbndls->id); ?>">
                                                <td><? echo stripslashes($resbndls->arrival_date); ?></td>
                                                 <td><? echo GetName(loads,order_no,id,$resbndls->load_id) ?></td>
                                         		<td><? echo GetName(warrants,warrant_no,id,$resbndls->warrant_id) ?></td>
                                                <td><? echo stripslashes($resbndls->batch_id); ?></td>
                                                <td><? echo GetName(brands,name,id,$resbndls->brand) ?></td>
                                                <td><? echo stripslashes($resbndls->pieces); ?></td>
                                             
											
												
                                            </tr>
                                              <? $i++; } ?>
                                        </tbody>
                                    </table>
                </div>
                <!-- /.panel-body -->
                </div>
                </div>
                </div>
                <?php if($UTYPE=='A') {?>
                <div class="row">
                <div class="col-lg-12 admin">
                <div class="panel panel-default">
                <div class="panel-heading">
                <i class="fa fa-support fa-fw"></i> User Activity Log
                
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                <div id="morris-area-chart"></div>
                </div>
                <!-- /.panel-body -->
                </div>
                </div>
                
                </div>
                    <?php } ?>
               </div>
               </div>     
   
    </body>
</html>
