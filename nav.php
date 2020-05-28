
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
                                <a href="manage_customer.php"><i class="fa fa-users fa-fw"></i> Stores<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="add_stores.php"> Add Stores</a>
                                    </li>
									
                                    <li>
                                        <a href="manage_stores.php"> Manage Stores</a>
                                    </li>
									
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="manage_brands.php"><i class="fa fa-tasks fa-fw"></i> Brands<span class="fa arrow"></span></a>
                                 
                                <!-- /.nav-second-level -->
                            </li>
							<li>
                                <a href="manage_types.php"><i class="fa fa-file-text fa-fw"></i>Types<span class="fa arrow"></span></a>
                                 
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="manage_variants.php"><i class="fa fa-glass fa-fw"></i> Variants<span class="fa arrow"></span></a>
                                 
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-support fa-fw"></i>Inventory<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
								<li> <a href="add_items.php"> Add Items</a> </li>
								<li> <a href="manage_items.php"> Manage Items</a> </li>
								<li><a href="stock_in.php"> Stock In</a></li> 
								<li> <a href="stock_out.php"> Stock Out</a> </li>
								<li> <a href="manage_stocks.php"> Manage Stocks</a> </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                          
                            
                           
                            <li>
                                <a href="#"><i class="fa fa-map fa-fw"></i> Stock Report<span class="fa arrow"></span></a>
                             <ul class="nav nav-second-level">
							 <li>
                                <a href="stock_report.php?type=day"><i class="fa fa-bar-chart-o fa-fw"></i> Daily Reports</a>
                            </li>
                            <li>
                                <a href="stock_report.php?type=month"><i class="fa fa-area-chart	 fa-fw"></i> Monthly Reports</a>
                            </li>
							 <li>
                                <a href="stock_report.php?type=year"><i class="fa fa-pie-chart fa-fw"></i> Yearly Reports</a>
                            </li>
                          
                                    <li>
                                        <a href="stock_report.php?type=store"><i class="fa fa-pie-chart fa-fw"></i>Storewise Stock Report</a>
                                    </li>
									
                                    <li>
                                        <a href="stock_report.php?type=brand"><i class="fa fa-pie-chart fa-fw"></i>Brandwise Stock Report</a>
                                    </li>
									
									<li>
                                        <a href="stock_report.php?type=category"><i class="fa fa-pie-chart fa-fw"></i>Typewise Stock Report</a>
                                    </li>
									
									<li>
                                        <a href="stock_report.php?type=variant"><i class="fa fa-pie-chart fa-fw"></i>Variantwise Stock Report</a>
                                    </li>
									
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </nav>