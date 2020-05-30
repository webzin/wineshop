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
if(is_array($_POST))

{
//grabs the $_POST variables and adds slashes
foreach($_POST as $var=>$valu)
{
$$var = addslashes($valu);
}
}

if (isset($_POST["update"]))
	{
 

	}



















$sqlSelectclient="SELECT * FROM govt_report";
$selectclient=mysqli_query($con,$sqlSelectclient);
$totrows=mysqli_affected_rows($con);

?>
 
 
       
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
		 
			jQuery("#genrpt").on('click', function(){

			jQuery.ajax({
			url: 'govtreport.php',
			success: function(result){
			$("#div1").html(result);
			jQuery('#rptdata').fadeIn(1000);
					 
			}
			});
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
                        <h1 class="page-header">Stock Report for Government</h1> 
    
<button name="genrpt" id="genrpt" type="button" class="btn btn-primary">Generate Report</button>

<div id="rptdata" class="alert alert-success alert-dismissable" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                 <p id="div1"></p>
                                    
                                </div>
						<div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    
<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    Item Deleted
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    
                                    <? if($msg==2) { ?>Item Updated Sucessfully!!!<? } ?>
                                    
                                </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				<div class="row">
                    <div class="col-lg-12">
					&nbsp;
					</div>
					</div>
					
                <!-- /.row -->
                <div class="row" id="govtreport">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Item Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
											<th>Sl No</th>
                                                <th>Store Name</th>
                                                <th>Variants Type</th>
                                              
                                                <th>Stock</th>
												
												<th>Options</th>

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
                                                 <td><?php echo GetName('stores','name','id',$resultclient->store_id); ?></td>
                                                <td><?php echo GetName('variants_type','name','id',$resultclient->variant_type_id); ?></td>
                                                 <td><?php echo $resultclient->total_stock; ?></td>
												<td class="center">
												<a class="btn btn-success btn-circle" href="add_items.php?action=view&id=<?php echo stripslashes($resultclient->id); ?>"><i class="fa fa-search"></i></a>
												<a class="btn btn-info btn-circle" href="add_items.php?action=edit&id=<?php echo stripslashes($resultclient->id); ?>"><i class="fa fa-edit"></i></a>
												 
														<?php if($UTYPE=='A') {?>
 										<a href="javascript:void();" class="btn btn-danger btn-circle delwarrant"><i class="fa fa-times"></i></a>
												<?php }?>
                                                 
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
                
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
 
       

    </body>
</html>
