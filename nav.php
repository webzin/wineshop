
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
 
					 
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $addres; ?>editprofile.php">
                            <i class="fa fa-user fa-fw"></i> <?php echo GetName('users','name','id','1') ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="user_profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
 
                            <li><a href="add_user.php"><i class="fa fa-plus fa-fw"></i> Add User</a></li>
                            <li><a href="manage_user.php"><i class="fa fa-users fa-fw"></i> Manage Users</a></li>
                            <li class="divider"></li>
						 
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
                            
                            <li>
                                <a href="manage_customer.php"><i class="fa fa-building fa-fw"></i> Stores<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li> <a href="add_stores.php"><i class="fa fa-plus-square fa-fw"></i> Add Stores</a> </li>
									
                                    <li> <a href="manage_stores.php"><i class="fa fa-tasks fa-fw"></i> Manage Stores</a></li>
									
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
							<li>
                                <a href="manage_types.php"><i class="fa fa-file-text fa-fw"></i>Manage Wine Types<span class="fa arrow"></span></a>
                                 
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="manage_brands.php"><i class="fa fa-tasks fa-fw"></i> Manage Wine Brands<span class="fa arrow"></span></a>
                                  
                                <!-- /.nav-second-level -->
                            </li>
							<li>
                                <a href="manage_variants.php"><i class="fa fa-glass fa-fw"></i>Manage Variant Names<span class="fa arrow"></span></a>
                                  
                                <!-- /.nav-second-level -->
                            </li>
							<li>
                                <a href="manage_variants.php"><i class="fa fa-thermometer-full fa-fw"></i>Manage Volumes<span class="fa arrow"></span></a>
                                  
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-support fa-fw"></i>Inventory<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
								<li> <a href="add_items.php"><i class="fa fa-plus fa-fw"></i> Add Items</a> </li>
								<li> <a href="manage_items.php"><i class="fa fa-tasks fa-fw"></i> Manage Items</a> </li>
								<li> <a href="stock_out.php"><i class="fa fa-arrow-circle-o-left fa-fw"></i> Stock Out</a> </li>
								<li><a href="stock_in.php"><i class="fa fa-arrow-circle-o-right fa-fw"></i> Stock In</a></li> 
								<li> <a href="stock_transfer.php"><i class="fa fa-exchange fa-fw"></i> Stock Transfer</a> </li>
								<li> <a href="manage_stocks.php"><i class="fa fa-th-list fa-fw"></i> Manage Stocks</a> </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                          
                            
                           
                            <li>
                                <a href="#"><i class="fa fa-map fa-fw"></i> Stock Report<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
							  <li>
                                        <a href="stock_report.php"><i class="fa fa-bar-chart fa-fw"></i>Stock Report</a>
                                    </li>
									<li>
                                        <a href="govt_stock_report.php"><i class="fa fa-pie-chart fa-fw"></i>Govt Stock Report</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </nav>
			
		