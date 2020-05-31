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
						
								
$fql="SELECT * FROM brands WHERE name='$brandname'";
$fel=mysqli_query($con,$fql);
$row=mysqli_affected_rows($con);
if($row>0)
{
$msg1="$brandname Already Exhist..!";
$Msg=3;
echo "<script>location.href='manage_brands.php?msg=$Msg&msg1=$msg1'</script>";
}


else{
 

$insquery = "INSERT INTO brands SET name='$brandname'";



$insresult = mysqli_query($con,$insquery);
//message call for success
$Msg=1;
	echo "<script>location.href='manage_brands.php?msg=$Msg'</script>";	  

	 
}


}
 
if($id){
	$fql="SELECT * FROM brands WHERE name='$brandname'";
$fel=mysqli_query($con,$fql);
$row=mysqli_affected_rows($con);
if($row>0)
{
$msg1="$brandname Already Exhist..!";

}


else{	

$query = "UPDATE brands SET name='$brandname' where id='$id'";

			$result = mysqli_query($con,$query);
			//message call for success
			$Msg=2;
			echo "<script>location.href='manage_brands.php?msg=$Msg'</script>";	  
			
	}		
	
}
}
 if($id)
//select query to get the values
{

/* get through the values */
$sel="SELECT * FROM brands WHERE id='$id'";
$selqry=mysqli_query($con,$sel);
$selrow=mysqli_fetch_object($selqry);
$brandname=$selrow->name;

}
 
 
 

$sqlSelectclient="SELECT * FROM brands order by name ASC";
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
            });

			 jQuery(document).ready(function(){
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
	$('#addBrand').validate({ // initialize the plugin
        rules: {
		load_id: {
		required: true,
		},
		 
		Brand_no: {
		required: true,
		number:true,
		},
		 
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
                        <h1 class="page-header">Manage Brands</h1>
						<div class="alert alert-danger alert-dismissable login-alert em" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11 ?>
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php if($msg==1) { ?>Brand Added Sucessfully!!!<? } ?>
                                    <?php if($msg==2) { ?>Brand Updated Sucessfully!!!<? } ?>
                                    
                                </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
				
				<div class="row">
                                <form role="form" name="addBrand" id="addBrand" method="post" enctype="multipart/form-data">

                                                                        <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-4">
                              
                                           
                                            <div class="form-group">
                                               <input type="text" class="form-control" placeholder="Brand Name" name="brandname" value="<?php echo $selrow->name; ?>" required>
                                            </div>
											</div>
                                          <div class="col-lg-4">
                                             <input name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add<? } ?> Brands">                                     
                                        
                                        
                                    </div>
                                    </form>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Brand Details
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                             <th width="10%">Sl No</th>
                                                <th>Brand Name</th>
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
                                                <td class="center">
												<a class="btn btn-success btn-circle" href="manage_brands.php?action=view&id=<? echo stripslashes($resultclient->id); ?>"><i class="fa fa-search"></i></a>
												<a class="btn btn-info btn-circle" href="manage_brands.php?action=edit&id=<? echo stripslashes($resultclient->id); ?>"><i class="fa fa-edit"></i></a>
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
