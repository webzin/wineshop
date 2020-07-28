<?php
//connect to database
include("top.php");
//check user login session is logged out or not
include("logout_chk.php");
//user customer session assign to a variable
$user=$_SESSION["AdmID"];
$id=$_GET["id"];
$msg=$_GET['msg'];
$act=$_GET['action'];
include("user_chk.php");


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

if($email || $phone) {

echo $fql="SELECT * FROM stores WHERE email='$email' or phone='$phone'";
$fel=mysqli_query($con,$fql);
$row=mysqli_affected_rows($con);
$flw=mysqli_fetch_object($fel);
if($row>0)
{
if ($phone==$flw->phone)
{
$msg1="$phone Already Exhist..! Choose Another";
}
elseif($email==$flw->email) // change it to just else
{
$msg1="$email Already Exhist..! Choose Another";
}



}



else

{
 
echo $insquery = "INSERT INTO stores SET name='$disp_name',incharge_name='$contact_name', email='$email', phone='$phone',state='$state',country='$country',address='$address',city='$city',zip='$zip'";


			$insresult = mysqli_query($con,$insquery);
			//message call for success
			$Msg=1;
			echo "<script>location.href='manage_customer.php?msg=$Msg&action=add'</script>";
	 
}
 
	 }
	
}
 

if($id)
		
{
$query = "UPDATE users SET compname='$disp_name',name='$contact_name',email='$email',phone='$phone',state='$state',country='$country',address='$address',city='$city',zip='$zip' WHERE id='$id'";

			$result = mysqli_query($con,$query);
			//message call for success
			$Msg=2;
			echo "<script>location.href='add_customer.php?msg=$Msg&id=$id&action=edit'</script>";	  
			
	}		
	
 
}
 if($id)
//select query to get the values
{

/* get through the values */
$sel="SELECT * FROM users WHERE id='$id'";
$selqry=mysqli_query($con,$sel);
$selrow=mysqli_fetch_object($selqry);


}
 
 
 
 ?>
 
<script>  
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

	 $('#addcustomer').validate({ // initialize the plugin
        rules: {
		disp_name: {
		required: true,
		},
		contact_name: {
		required: true,
		},
		email: {
		required: true,
		email:true,
		},
		phone: {
		required: true,
		number:true,
		},
		address: {
		required: true,
		},
		city: {
		required: true,
		},
		state: {
		required: true,
		},
		country: {
		required: true,
		},
		zip: {
		required: true,
		number: true,
		minlength: 5,
		maxlength: 6,
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
                        <h1 class="page-header"><?php if($act=='edit') { ?>Edit <? } if($act=='view')  { ?>View <? } else {?>Add <?php } ?>Bepari</h1>
                        <div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11 ?>
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <? if($msg==1) { ?>Bepari Added Sucessfully!!!<? } ?>
                                    <? if($msg==2) { ?>Bepari Updated Sucessfully!!!<? } ?>
                                    
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
                                <form role="form" name="addcustomer" id="addcustomer" method="post" enctype="multipart/form-data">

                                    <div class="col-lg-6">
                                                                                  

                                            <div class="form-group">
                                            <label>Bepari Name</label>
                                            <div class="form-group input-group">
                                            
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" class="form-control" placeholder="Contact Person" name="contact_name" value="<?php echo $selrow->name; ?>" <?php if($id) { ?>readonly="readonly"<? }?> required>
                                            </div>
                                            </div>
                                             
                                               
                                               <div class="form-group">
                                            <label>Eamil Address:</label>
                                            <div class="form-group input-group">
                                            
                                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
 <input type="email" class="form-control" placeholder="name@example.com" name="email" value="<?php echo $selrow->email; ?>"<?php if($id) { ?>readonly="readonly"<? }?> required>
                                            </div>
                                            </div>
                                             <div class="form-group">
                                            <label>Phone Number:</label>
                                             <div class="form-group input-group">
                                             
                                                <span class="input-group-addon"><i class="fa fa-phone"></i>
                                                </span>
<input type="number" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $selrow->contactno; ?>" required>
                                            </div>
                                            </div>
											    <div class="form-group">
                                            <label>Credit Limit:</label>
                                             <div class="form-group input-group">
                                             
                                                <span class="input-group-addon"><i class="fa fa-rupee"></i>
                                                </span>
<input type="number" class="form-control" placeholder="Phone Number" name="phone" value="<?php echo $selrow->contactno; ?>" required>
                                            </div>
                                            </div>
                                            
                                            
                                     
                                           
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Address:</label>
                                                <input class="form-control" placeholder="Address" name="address" value="<?php echo $selrow->address; ?>" required>
                                               
                                            </div>
                                            <div class="form-group">
                                            <label>City:</label>
              <input class="form-control" placeholder="City" name="city" value="<?php echo $selrow->city; ?>" required>
                                               
                                            </div>
                                            <div class="form-group">
                                            <label>State:</label>
                                               <select name="state" id="state" class="form-control" required>
  <option value="Odisha" selected >Odisha</option> 

</select>
                                               
                                            </div>
                                            <div class="form-group">
                                            <label>Country:</label>
                                                <select class="form-control" name="country" required>
                                                    <option value="India" selected>India</option>
													 
                                                     
                                                </select>
                                               
                                            </div>
                                            
                                 <div class="form-group">
                                            <label>Zip:</label>
                                              
<input type="number" class="form-control" placeholder="Zip Code" name="zip" value="<?php echo $selrow->zip; ?>" required>
                                           
                                            </div>
                                         
                          <input name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add Customer<? } ?>">                                     
                                        
                                        
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
