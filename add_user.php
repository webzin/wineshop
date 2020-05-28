<?php
//connect to database
include("top.php");
//check user login session is logged out or not
include("logout_chk.php");
//current user session assign to a variable
echo $user=$_SESSION["AdmID"];
echo $id=$_GET["id"];
$msg=$_GET['msg'];
$act=$_GET['action'];
include("user_chk.php");

?>
 <?php if($UTYPE=='U' && $id!==$user && $act=='edit') { ?>
 <script>alert('You are not authorised to access this page');
 location.href='javascript:history.go(-1)'</script>
 <?php } ?>

<?php
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
						
								
$fql="SELECT * FROM users WHERE username='$username' OR email='$email' OR contactno='$contactno'";
$fel=mysql_query($fql);
$row=mysql_affected_rows();
if($row>0)
{
$msg1="$username or $email or $contactno Already Exhist..!";

}


else{

$insquery = "INSERT INTO users SET name='$fullname',username='$username',email='$email',password=AES_ENCRYPT('$password', SHA1('aalizzwell')),contactno='$contactno',state='$state',country='$country',address='$address',city='$city',type='$type'";


			$insresult = mysql_query($insquery);
			//message call for success
			$Msg=1;
			echo "<script>location.href='manage_user.php?msg=$Msg&action=add'</script>";
	 
}
 
			
	 }
	

 

if($id)
		
{
$query = "UPDATE users SET name='$fullname',username='$username',email='$email',password=AES_ENCRYPT('$password', SHA1('aalizzwell')),contactno='$contactno',state='$state',country='$country',address='$address',city='$city',type='$type' WHERE id='$id'";

			$result = mysql_query($query);
			//message call for success
			$Msg=2;
			echo "<script>location.href='add_user.php?msg=$Msg&id=$id&action=edit'</script>";	  
			
	}		
	
 
}
 if($id)
//select query to get the values
{

/* get through the values */
$sel="SELECT *,`password`, AES_DECRYPT(`password`, SHA1('aalizzwell')) AS passd FROM users WHERE id='$id'";
$selqry=mysql_query($sel);
$selrow=mysql_fetch_object($selqry);


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
                        <h1 class="page-header"><?php if($act=='edit') { ?>Edit <? } if($act=='view')  { ?>View <? } else {?>Add <?php } ?>User</h1>
                        <div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11 ?>
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <? if($msg==1) { ?>User Added Sucessfully!!!<? } ?>
                                    <? if($msg==2) { ?>User Updated Sucessfully!!!<? } ?>
                                    
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
                                <form role="form" name="profile" id="profile" method="post" enctype="multipart/form-data">

                                    <div class="col-lg-6">
                                                
												 <div class="form-group">
                                    <label>Select a Store </label>
                                    
                                      <select class="form-control" name="store_id"  <? if($act=='view')  { ?>disabled <?php } ?> required>
                                                <?php echo GetCombo("Store","stores","id","name","","id","$store_id") ?>
                                               </select>
                                            </div>
												
												
                                            <div class="form-group">
                                            <label>FullName:</label>
                                            <div class="form-group input-group">
                                            
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
<input class="form-control" placeholder="Full Name" name="fullname" value="<?php echo $selrow->name; ?>" required>
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
<input type="number" class="form-control" placeholder="Phone Number" name="contactno" value="<?php echo $selrow->contactno; ?>" required>
                                            </div>
                                            </div>
											
                                            <div class="form-group">
                                            <label>Password:</label>
                                            <div class="form-group input-group">
                                            
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
<input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $selrow->passd; ?>" required>
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
                                                    <option value="India" selected >India</option>
												  
                                                </select>
                                               
                                            </div>
                                            
                                <div class="form-group">
                                    <label>User Type</label>
                                    
                                      <select class="form-control" name="type" required>
											<option value="STORE" selected >Store Manager</option>
											<option value="DEPOT" selected >Depot Manager</option>
											<option value="AUDIT" selected >Auditor</option>
                                                </select>
                                            </div>
                                         
                          <input name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add User<? } ?>">                                     
                                        
                                        
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
