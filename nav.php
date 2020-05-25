
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <a class="navbar-brand" href="dashboard.php"><img src="logo.png" alt="" height="30" /></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <ul class="nav navbar-nav navbar-left navbar-top-links">
                    <li><a href="#"><i class="fa fa-home fa-fw"></i> Admin Panel</a></li> 
                </ul>
 

                <ul class="nav navbar-right navbar-top-links">
 
					<li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
						
                            <li>
                          
                                    <strong>Alerts</strong>
                                    
                               
                            </li>
							<li class="divider"></li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-comment fa-fw"></i> New Comment
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                        <span class="pull-right text-muted small">12 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div>
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small">4 minutes ago</span>
                                    </div>
                                </a>
                            </li>
                            
                        </ul>
                    </li>
				 
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $addres; ?>editprofile.php">
                            <i class="fa fa-user fa-fw"></i> <? echo GetName('users','name','id',$user) ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="user_profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
<?php if($UTYPE=='ADMIN') {?>
                            <li><a href="add_user.php"><i class="fa fa-plus fa-fw"></i> Add User</a></li>
                            <li><a href="manage_user.php"><i class="fa fa-users fa-fw"></i> Manage Users</a></li>
                            <li class="divider"></li>
							 <?php } ?>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>

				<!-- /.navbar-top-links -->
 
                <div class="navbar-default sidebar" role="navigation">
                    <div class="sidebar-nav navbar-collapse">
                        <ul class="nav" id="side-menu">
                            
                            <li>
                                <a href="dashboard.php" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                            </li>
                            <?php if($UTYPE=='ADMIN' || $UTYPE=='STORE')  {?>
                            <li>
                                <a href="manage_customer.php"><i class="fa fa-users fa-fw"></i> Stores<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="add_customer.php"> Add Stores</a>
                                    </li>
									
                                    <li>
                                        <a href="manage_customer.php"> Manage Stores</a>
                                    </li>
									
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="manage_loads.php"><i class="fa fa-tasks fa-fw"></i> Brands<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="add_load.php"> Add Brands</a>
                                    </li>
                                    <li>
                                        <a href="manage_load.php"> Manage Brands</a>
                                    </li>
									
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
							<li>
                                <a href="manage_warrant.php"><i class="fa fa-file-text fa-fw"></i>Types<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                      </i><a href="add_warrant.php"> Add Types</a>
                                    </li>
									
                                    <li>
                                      <a href="manage_warrant.php"> Manage Types</a>
                                    </li>
                                   
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="manage_warrant.php"><i class="fa fa-glass fa-fw"></i> Variants<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                      </i><a href="add_warrant.php"> Add Variants</a>
                                    </li>
									
                                    <li>
                                      <a href="manage_warrant.php"> Manage Variants</a>
                                    </li>
                                   
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="manage_bundle.php"><i class="fa fa-support fa-fw"></i>Inventory<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
								<li> <a href="add_bundle.php"> Add Items</a> </li>
								<li> <a href="manage_bundle.php"> Manage Items</a> </li>
								<li><a href="add_bundle.php"> Stock In</a></li> 
								<li> <a href="manage_bundle.php"> Stock Out</a> </li>
								<li> <a href="manage_bundle.php"> Manage Stocks</a> </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <?php } ?>
                            
							<?php if($UTYPE=='A') {?>
                            <li>
                                <a href="load_report.php"><i class="fa fa-tasks fa-fw"></i> Load Reports</a>
                            </li>
                            <li>
                                <a href="warrant_report.php"><i class="fa fa-file-text fa-fw"></i> Warrant Reports</a>
                            </li>
                           <?php } ?>
                           
                            <li>
                                <a href="#"><i class="fa fa-map fa-fw"></i> Stock Report<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
                                    <li>
                                        <a href="storewise_stock_report.php"><i class="fa fa-arrow-right fa-fw"></i>Storewise Stock Report</a>
                                    </li>
									
                                    <li>
                                        <a href="brandwise_stock_report.php"><i class="fa fa-arrow-right fa-fw"></i>Brandwise Stock Report</a>
                                    </li>
									
									<li>
                                        <a href="brandwise_stock_report.php"><i class="fa fa-arrow-right fa-fw"></i>Typewise Stock Report</a>
                                    </li>
									
									<li>
                                        <a href="brandwise_stock_report.php"><i class="fa fa-arrow-right fa-fw"></i>Variantwise Stock Report</a>
                                    </li>
									
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </nav>