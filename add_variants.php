<?php
//connect to database
include("top.php");
//check user login session is logged out or not
include("logout_chk.php");
include("user_chk.php");
//current user session assign to a variable
$user=$_SESSION["AdmID"]; 

if(is_array($_GET))

{
foreach($_GET as $var=>$valu)
{
//grabs the $_GET variables and adds slashes
$$var = addslashes($valu);
}
}
//gets the current date 
	$curdate=date("Y-m-d");

//loop throgh post values
if(is_array($_POST))

{
foreach($_POST as $var=>$valu)
{
//grabs the $_POST variables and adds slashes
$$var = addslashes($valu);
}
}



	if($_POST["submit"])
	{

		if(!$id)
		
					    {
						
								
$fql="SELECT * FROM variants WHERE vtype='category' AND name='$variants'";
$fel=mysqli_query($con,$fql);
$row=mysqli_affected_rows($con);
if($row>0)
{
$msg1="$variants Already Exhist..!";

}


else{
 

$insquery = "INSERT INTO variants SET vtype='$category', name='$variants'";



$insresult = mysqli_query($con,$insquery);
//message call for success
$Msg=1;
echo "<script>location.href='add_variants.php?msg=$Msg'</script>";

	 
}


}
 
if($id)
		
{
$query = "UPDATE variants_type SET vtype='$category', name='$variants' where id='$id'";

			$result = mysqli_query($con,$query);
			//message call for success
			$Msg=2;
			echo "<script>location.href='manage_variants.php?msg=$Msg'</script>";	  
			
	}		
	
 
}
 if($id)
//select query to get the values
{

/* get through the values */
$sel="SELECT * FROM variants WHERE id='$id'";
$selqry=mysqli_query($con,$sel);
$selrow=mysqli_fetch_object($selqry);
echo $category=$selrow->vtype;
echo $variants=$selrow->name;

}
 
 
 
 ?>
 
<script type="text/javascript">  
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

	$('#addType').validate({ // initialize the plugin
        rules: {
		category: {
		required: true,
		},
		 
		variants: {
		required: true,
		 
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
                        <h1 class="page-header"><?php if($action=='edit') { ?>Edit <? } if($action=='view')  { ?>View <? } else {?>Add <?php } ?>Types</h1>
                        <div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11 ?>
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php if($msg==1) { ?>Type Added Sucessfully!!!<? } ?>
                                    <?php if($msg==2) { ?>Type Updated Sucessfully!!!<? } ?>
                                    
                                </div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Fill The Details Below
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                <form role="form" name="addType" id="addType" method="post" enctype="multipart/form-data">

                                                                        <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                              
                                           <div class="form-group">
                                            <label>Category Type#:</label>
                                            <select required class="form-control" name="category"  <? if($action=='view')  { ?>disabled <?php } ?>>
                                            <?php echo GetCombo("Category","variants_type","id","name","","id","$category") ?>
                                            </select>
                                               
                                            </div>
                                            <div class="form-group">
                                            <label>Type Name:</label>
              
                                               <input <? if($action=='view')  { ?>disabled <?php } ?> type="text" class="form-control" placeholder="Type Name" name="variants" value="<?php echo $selrow->name; ?>" required>
                                            </div>
                                          
                                             <input <? if($action=='view')  { ?>disabled <?php } ?> name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add<? } ?> Types">                                     
                                        
                                        
                                    </div>
                                    </form>
                                    <!-- /.col-lg-6 (nested) -->
                                </div>
                                <!-- /.row (nested) -->
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
