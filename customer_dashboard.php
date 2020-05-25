<?php
//connect to database
 include("connect.php");

 //check user login session is logged out or not
 include("logout_chk.php");

 //current user session assign to a variable
 $user=$_SESSION["AdmID"];
 
 	$id=$_GET["id"];
			$sqlSelectclient="SELECT * FROM bundles where custo_id='$user'";
			$selectclient=mysql_query($sqlSelectclient);
			$totrows=mysql_affected_rows();

 ?>
<?php include("top.php"); ?>
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
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                
                <!-- /.row --> 
 
                
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                My Inventory
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                            <th>Date</th>
                                            <th>Order#</th>
                                            <th>Veichle#:</th>
                                            <th>Company</th>
                                            <th>Warrant#</th>
                                            <th>Batch#</th>
                                            <th>Brand</th>
                                            <th>Pieces</th>
                                            <th>List Weight</th>
                                            <th>Scale Weight</th>
                                            <th>Building</th>
                                            <th>Location</th>
												

                                            </tr>
                                        </thead>
                                        
                                        <tbody>
                                        <?php 
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
                                                <td><? echo stripslashes($resultclient->arrival_date); ?></td>
                                                 <td><? echo GetName(loads,order_no,id,$resultclient->load_id) ?></td>
                                                 <td><? echo GetName(loads,vech_no,id,$resultclient->load_id) ?></td>
                                                 <td><? echo GetName(users,compname,id,$resultclient->custo_id) ?></td>
                                                <td><? echo GetName(warrants,warrant_no,id,$resultclient->warrant_id) ?></td>
                                                <td><? echo stripslashes($resultclient->batch_id); ?></td>
                                                <td><? echo GetName(brands,name,id,$resultclient->brand) ?></td>
                                                <td><? echo stripslashes($resultclient->pieces); ?></td>
                                                <td class="center"><? echo stripslashes($resultclient->list_w); ?></td>
                                                <td class="center"><? echo stripslashes($resultclient->scale_w); ?></td>
                                                 <td class="center"><? 
												 $bid=GetName(loads,building,id,$resultclient->load_id);
												 echo GetName(building,name,id,$bid) ?></td>
                                             <td class="center"><? echo GetName(location,name,id,$resultclient->location) ?></td>
											
												
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
          
               </div>
               </div>     
   
    </body>
</html>
