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
 
	
	    
?>

<?php include("top.php"); ?>
 
       
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
            $(document).ready(function() {
                $('#dataTables-example').DataTable({
                        responsive: true
                });
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
                        <h1 class="page-header">Warrant Reports</h1>
						
                                
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Warrant Reports
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                             <th>Warrant No</th>
                                                <th>Company Name</th>
                                                <th>Total Bundles</th>
                                                <th>Total Weight</th>
                                                <th>Total Pieces</th>
                                               <th>Building</th>
												<th>Locations</th>

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
											$sqlSelectclient="SELECT * FROM warrants";
			$selectclient=mysql_query($sqlSelectclient);
			$totrows=mysql_affected_rows();
	   $i=0;
	  while($resultclient=mysql_fetch_object($selectclient))
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
                                                <td><? echo stripslashes($resultclient->warrant_no); ?></td>
                                                <td><? echo GetName(users,compname,id,$resultclient->customer_id) ?></td>
                                                <td><? echo GetTotal(bundles,warrant_id,$resultclient->id) ?></td>
                                                <td class="center">
												<?php 
												$sql = mysql_query("SELECT SUM(list_w) as total FROM bundles where warrant_id='$resultclient->id'");
												$row = mysql_fetch_array($sql);
												echo $sum = $row['total'];
												
												?>
                                                
                                                </td>
                                                <td class="center">
												<?php 
												$sql = mysql_query("SELECT SUM(pieces) as total FROM bundles where warrant_id='$resultclient->id'");
												$row = mysql_fetch_array($sql);
												echo $sum = $row['total'];
												
												?></td>
											
												<td class="center">
                                                
                                                <? 
												$bid=GetName(loads,building,id,$resultclient->load_id);
												
												echo GetName(building,name,id,$bid); ?>
										 </td>
                                         <td class="center">
                                         <?php 
												$result= mysql_query("SELECT `location` FROM `bundles` WHERE `warrant_id`='$resultclient->id' ");
												while($row = mysql_fetch_assoc($result)){
												$lid=$row["location"];
												echo GetName(location,name,id,$lid);
												 echo ' ';
										}
												
												?>
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
