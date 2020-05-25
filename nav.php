
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
                    <?php if($UTYPE=='A') {?><li><a href="#"><i class="fa fa-home fa-fw"></i> Admin Panel</a></li> <?php } elseif($UTYPE=='U') { ?>

					<li><a href="#"><i class="fa fa-home fa-fw"></i> User Panel</a></li> <?php } elseif($UTYPE=='C') {?><li><a href="#"><i class="fa fa-home fa-fw"></i> Customer Panel</a></li><?php } ?>
                </ul>
 

                <ul class="nav navbar-right navbar-top-links">
<?php if($UTYPE=='AA') {?>
					<li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
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
                            <li class="divider"></li>
                            <li>
                                <a class="text-center" href="#">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
					 <?php } ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="<?php echo $addres; ?>editprofile.php">
                            <i class="fa fa-user fa-fw"></i> <? echo GetName(users,name,id,$user) ?><b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="user_profile.php"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
<?php if($UTYPE=='A') {?>
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
                            <?php if($UTYPE=='A' || $UTYPE=='U')  {?>
                            <li>
                                <a href="manage_customer.php"><i class="fa fa-users fa-fw"></i> Customers<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="add_customer.php"> Add Customer</a>
                                    </li>
									
                                    <li>
                                        <a href="manage_customer.php"> Manage Customers</a>
                                    </li>
									
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="manage_loads.php"><i class="fa fa-tasks fa-fw"></i> Load<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="add_load.php"> Add Load</a>
                                    </li>
                                    <li>
                                        <a href="manage_load.php"> Manage Loads</a>
                                    </li>
									
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="manage_warrant.php"><i class="fa fa-file-text fa-fw"></i> Warrants<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                      </i><a href="add_warrant.php"> Add Warrant</a>
                                    </li>
									
                                    <li>
                                      <a href="manage_warrant.php"> Manage Warrants</a>
                                    </li>
                                   
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            <li>
                                <a href="manage_bundle.php"><i class="fa fa-support fa-fw"></i> Bundles<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="add_bundle.php"> Add Bundle</a>
                                    </li>
									
                                    <li>
                                        <a href="manage_bundle.php"> Manage Bundle</a>
                                    </li>
									
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
                                <a href="#"><i class="fa fa-map fa-fw"></i> Availbility Report<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <?php
									$sm="SELECT * FROM building";
			$sesm=mysql_query($sm);
			$smrows=mysql_affected_rows();
			 while($smo=mysql_fetch_object($sesm))
        	  {
			?>
                                    
                                    <li>
                                        <a href="map.php?id=<?php echo $smo->id ?>"> <?php echo $smo->name ?></a>
                                    </li>
							 	<?php } ?>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                            
                            
                        </ul>
                    </div>
                </div>
            </nav>