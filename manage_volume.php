<?php
include("top.php");
//connect to database
 
 //check user login session is logged out or not
 //include("logout_chk.php");
 //current user session assign to a variable
 $user=$_SESSION["AdmID"];
 	$id=$_GET["id"];
	 ///include("user_chk.php"); 

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
	
	
	
		if($_POST["submit"])
		{

		if(!$id)

		{
						
								
		$fql="SELECT * FROM volume WHERE name='$volume'";
		$fel=mysqli_query($con,$fql);
		$row=mysqli_affected_rows($con);
		if($row>0)
		{
		$msg1="$volume Already Exhist..!";
		$Msg=3;
		echo "<script>location.href='manage_volume.php?msg=$Msg&msg1=$msg1'</script>";
		}


			else{
			 

			$insquery = "INSERT INTO volume SET name='$volume', pkt='$pkt', pkt_qty='$qty', bl_lpl='$bl_lpl'";
			$insresult = mysqli_query($con,$insquery);
			//message call for success
			$Msg=1;
			echo "<script>location.href='manage_volume.php?msg=$Msg'</script>";


			}


}
 
if($id)
	{
		$fql="SELECT * FROM volume WHERE `name`='$volume' and pkt='$pkt' AND pkt_qty='$qty' AND bl_lpl='$bl_lpl'";
		$fel=mysqli_query($con,$fql);
		$row=mysqli_affected_rows($con);
		if($row>0)
		{
		$msg1="Nothing to Update!";  

}

else{
$query = "UPDATE volume SET name='$volume', pkt='$pkt', pkt_qty='$qty', bl_lpl='$bl_lpl' where id='$id'";
$result = mysqli_query($con,$query);
//message call for success
$Msg=2;
echo "<script>location.href='manage_volume.php?msg=$Msg'</script>";	  
			
	}		
	
} 
}
	
	if($id)
		
{
		$sel="SELECT * FROM volume WHERE id='$id'";
		$selqry=mysqli_query($con,$sel);
		$selrow=mysqli_fetch_object($selqry);

}

		$sqlSelectclient="SELECT * FROM volume order by id desc";
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
				<? if($rowi>0) { ?>
				jQuery('.login-alert').fadeIn();
				<? } ?>


				<? if($row>0) { ?>
				jQuery('.login-alert').fadeIn();
				<? } ?>

				<? if($msg==1)  { ?>

				jQuery('.sm').fadeIn();
				<? } ?>

				<? if($msg==2)  { ?>

				jQuery('.sm').fadeIn();
				<? } ?>
				<? if($msg==3)  { ?>

				jQuery('.em').fadeIn();
				<? } ?>
				 
				 
		$('#addVolume').validate({ // initialize the plugin
        rules: {
             
			 
            volume: {
                required: true,
            },
			  
			  pkt: {
                required: true,
            },
			  qty: {
                required: true,
            },
			bl_lpl: {
                required: true,
            },
		}
       
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
                        <h1 class="page-header">Manage Volumes</h1>

					  <div class="alert alert-danger alert-dismissable login-alert em" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11; ?>
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <? if($msg==1) { ?>Volume Added Sucessfully!!!<? } ?>
                                    <? if($msg==2) { ?>Volume Updated Sucessfully!!!<? } ?>
                                    
                                </div>
                    
				 <div class="row">
                    <div class="col-lg-12">
					
					  <form role="form" name="addVolume" id="addVolume" method="post" enctype="multipart/form-data">

                                 
								<div class="col-lg-3">
								<div class="form-group">
								<input type="text" class="form-control" placeholder="Volume" name="volume" value="<?php echo $selrow->name; ?>" required>
								</div>
								</div>  
																<div class="col-lg-2">
								<div class="form-group">
								<input type="text" class="form-control" placeholder="Size" name="pkt" value="<?php echo $selrow->pkt; ?>" required>
								</div>
								</div>  

								<div class="col-lg-2">
								<div class="form-group">
								<input type="number" class="form-control" placeholder="Qty" name="qty" value="<?php echo $selrow->pkt_qty; ?>" required>
								</div>
								</div>  
								<div class="col-lg-2">
								<div class="form-group">
								<input type="text" class="form-control" placeholder="BL LPL" name="bl_lpl" value="<?php echo $selrow->bl_lpl; ?>" required>
								</div>
								</div>  

									  <div class="col-lg-2">
									 <input name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add<? } ?> "> 
							 
                                    </div>
                                    </form>
				</div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Wine Variant Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                             <th>Sl No</th>
											  <th>Volmue Qty</th>
											  <th>Carton Size</th>
											  <th>Carton Qty</th>
											  <th>BL LPL</th>
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
                                                <td><? echo $i; ?></td>
												 
                                                <td><? echo stripslashes($resultclient->name); ?></td>
												<td><? echo stripslashes($resultclient->pkt); ?></td>
												<td><? echo stripslashes($resultclient->pkt_qty); ?></td>
												<td><? echo stripslashes($resultclient->bl_lpl); ?></td>
                                                <td class="center">
												 
												<a class="btn btn-info btn-circle" href="manage_volume.php?action=edit&id=<? echo stripslashes($resultclient->id); ?>"><i class="fa fa-edit"></i></a>
												<?php if($UTYPE=='A') {?>
 										<a href="javascript:void();" class="btn btn-danger btn-circle delwarrant"><i class="fa fa-times"></i></a>
												<?php }?>												</td>
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
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->
 
       

    </body>
</html>
