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
						
								
$fql="SELECT * FROM variants WHERE vtype='$category' AND name='$variants'";
$fel=mysqli_query($con,$fql);
$row=mysqli_affected_rows($con);
if($row>0)
{
$msg1="$variants Already Exhist..!";
$Msg=3;
echo "<script>location.href='manage_variants.php?msg=$Msg&msg1=$msg1'</script>";
}


else{
 

$insquery = "INSERT INTO variants SET vtype='$category', name='$variants'";



$insresult = mysqli_query($con,$insquery);
//message call for success
$Msg=1;
echo "<script>location.href='manage_variants.php?msg=$Msg'</script>";

	 
}


}
 
if($id)
		
{
$fql="SELECT * FROM variants WHERE vtype='$category' AND `name`='$variants'";
$fel=mysqli_query($con,$fql);
$row=mysqli_affected_rows($con);
if($row>0)
{
$msg1="$variants Already Exhist..!";  

}

else{
$query = "UPDATE variants SET vtype='$category', `name`='$variants' where id='$id'";

$result = mysqli_query($con,$query);
//message call for success
$Msg=2;
echo "<script>location.href='manage_variants.php?msg=$Msg'</script>";	  
			
	}		
	
} 
}
	
	if($id)
		
{
$sel="SELECT * FROM variants WHERE id='$id'";
$selqry=mysqli_query($con,$sel);
$selrow=mysqli_fetch_object($selqry);
$category=$selrow->vtype;
$variants=$selrow->name;
 
}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
		$sqlSelectclient="SELECT * FROM variants order by id desc";
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
				 $('#addType').validate({ // initialize the plugin
        rules: {
            category: {
                required: true,
            },
			 
            variants: {
                required: true,
            }
			 },
			
       
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
                        <h1 class="page-header">Manage Variants</h1>

					  <div class="alert alert-danger alert-dismissable login-alert em" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11 ?>
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button Variant="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <? if($msg==1) { ?>Variant Added Sucessfully!!!<? } ?>
                                    <? if($msg==2) { ?>Variant Updated Sucessfully!!!<? } ?>
                                    
                                </div>
                    
				 <div class="row">
                    <div class="col-lg-12">
					
					  <form role="form" name="addType" id="addType" method="post" enctype="multipart/form-data">

                                                                        <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-4">
                              
                                           <div class="form-group">
                                           
                                            <select required class="form-control" name="category">
                                            <?php echo GetCombo("Category","variants_type","id","name","","id","$category") ?>
                                            </select>
                                               
                                            </div>
                                            </div>
											<div class="col-lg-4">
											<div class="form-group">
                                           
              
                                               <input type="text" class="form-control" placeholder="Type Name" name="variants" value="<?php echo $selrow->name; ?>" required>
                                            </div>
                                          
                                                                                  
                                        
                                      </div>  
									  <div class="col-lg-4">
									 <input name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add<? } ?> Types"> 
							 
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
                                Variant Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                             <th width="10%">Sl No</th>
											<th>Variant Type</th>	
											 <th>Variant Name</th>
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
												<td><? echo $vname = GetName('variants_type','name','id',$resultclient->vtype); ?></td>
                                                <td><? echo stripslashes($resultclient->name); ?></td>
                                                <td class="center">
												 
												<a class="btn btn-info btn-circle" href="manage_variants.php?action=edit&id=<? echo stripslashes($resultclient->id); ?>"><i class="fa fa-edit"></i></a>
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
