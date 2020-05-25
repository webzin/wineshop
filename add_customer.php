<?php
//connect to database
include("connect.php");
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
$username = substr(str_replace('@','',strtolower($email)), 0, 9).rand(1,9);
$password = randomPassword();
if(!$id)

{

if($email || $phone) {

echo $fql="SELECT * FROM users WHERE email='$email' or contactno='$phone'";
$fel=mysql_query($fql);
$row=mysql_affected_rows();
$flw=mysql_fetch_object($fel);
if($row>0)
{
if ($phone==$flw->contactno)
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
 
echo $insquery = "INSERT INTO users SET compname='$disp_name',name='$contact_name',username='$username',email='$email',password=AES_ENCRYPT('$password', SHA1('aalizzwell')),contactno='$phone',state='$state',country='$country',address='$address',city='$city',zip='$zip', type='C', activated='Y'";


			$insresult = mysql_query($insquery);
			//message call for success
			$Msg=1;
			/*echo "<script>location.href='manage_customer.php?msg=$Msg&action=add'</script>";*/
	 
}
 
	 }
	
}
 

if($id)
		
{
$query = "UPDATE users SET compname='$disp_name',name='$contact_name',email='$email',contactno='$phone',state='$state',country='$country',address='$address',city='$city',zip='$zip' WHERE id='$id'";

			$result = mysql_query($query);
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
$selqry=mysql_query($sel);
$selrow=mysql_fetch_object($selqry);


}
 
 
 
 ?>
<?php include("top.php"); ?>
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
                        <h1 class="page-header"><?php if($act==edit) { ?>Edit <? } if($act==view)  { ?>View <? } if($act==add) {?>Add <?php } ?>Customer</h1>
                        <div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11 ?>
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <? if($msg==1) { ?>Customer Added Sucessfully!!!<? } ?>
                                    <? if($msg==2) { ?>Customer Updated Sucessfully!!!<? } ?>
                                    
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
                                            <label>Company Name</label>
                                            <div class="form-group input-group">
                                            
                                                <span class="input-group-addon"><i class="fa fa-industry"></i></span>
<input type="text" class="form-control" placeholder="Company Name" name="disp_name" value="<?php echo $selrow->compname; ?>" <?php if($id) { ?>readonly="readonly"<? }?> required>
                                            </div>
                                            </div>

                                            <div class="form-group">
                                            <label>Contact Person</label>
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
  <option value="" >Select a State</option>
<option <? if($selrow->state==AL) {  echo "selected "; } ?>value="AL">Alabama</option>
<option <? if($selrow->state==AK) {  echo "selected "; } ?>value="AK">Alaska</option>
<option <? if($selrow->state==AZ) {  echo "selected "; } ?>value="AZ">Arizona</option>
<option <? if($selrow->state==AR) {  echo "selected "; } ?>value="AR">Arkansas</option>
<option <? if($selrow->state==CA) {  echo "selected "; } ?>value="CA">California</option>
<option <? if($selrow->state==CO) {  echo "selected "; } ?>value="CO">Colorado</option>
<option <? if($selrow->state==CT) {  echo "selected "; } ?>value="CT">Connecticut</option>
<option <? if($selrow->state==DE) {  echo "selected "; } ?>value="DE">Delaware</option>
<option <? if($selrow->state==DC) {  echo "selected "; } ?>value="DC">District Of Columbia</option>
<option <? if($selrow->state==FL) {  echo "selected "; } ?>value="FL">Florida</option>
<option <? if($selrow->state==GA) {  echo "selected "; } ?>value="GA">Georgia</option>
<option <? if($selrow->state==HI) {  echo "selected "; } ?>value="HI">Hawaii</option>
<option <? if($selrow->state==ID) {  echo "selected "; } ?>value="ID">Idaho</option>
<option <? if($selrow->state==IL) {  echo "selected "; } ?>value="IL">Illinois</option>
<option <? if($selrow->state==IN) {  echo "selected "; } ?>value="IN">Indiana</option>
<option <? if($selrow->state==IA) {  echo "selected "; } ?>value="IA">Iowa</option>
<option <? if($selrow->state==KS) {  echo "selected "; } ?>value="KS">Kansas</option>
<option <? if($selrow->state==KY) {  echo "selected "; } ?>value="KY">Kentucky</option>
<option <? if($selrow->state==LA) {  echo "selected "; } ?>value="LA">Louisiana</option>
<option <? if($selrow->state==ME) {  echo "selected "; } ?>value="ME">Maine</option>
<option <? if($selrow->state==MD) {  echo "selected "; } ?>value="MD">Maryland</option>
<option <? if($selrow->state==MA) {  echo "selected "; } ?>value="MA">Massachusetts</option>
<option <? if($selrow->state==MI) {  echo "selected "; } ?>value="MI">Michigan</option>
<option <? if($selrow->state==MN) {  echo "selected "; } ?>value="MN">Minnesota</option>
<option <? if($selrow->state==MS) {  echo "selected "; } ?>value="MS">Mississippi</option>
<option <? if($selrow->state==MO) {  echo "selected "; } ?>value="MO">Missouri</option>
<option <? if($selrow->state==MT) {  echo "selected "; } ?>value="MT">Montana</option>
<option <? if($selrow->state==NE) {  echo "selected "; } ?>value="NE">Nebraska</option>
<option <? if($selrow->state==NV) {  echo "selected "; } ?>value="NV">Nevada</option>
<option <? if($selrow->state==NH) {  echo "selected "; } ?>value="NH">New Hampshire</option>
<option <? if($selrow->state==NJ) {  echo "selected "; } ?>value="NJ">New Jersey</option>
<option <? if($selrow->state==NM) {  echo "selected "; } ?>value="NM">New Mexico</option>
<option <? if($selrow->state==NY) {  echo "selected "; } ?>value="NY">New York</option>
<option <? if($selrow->state==NC) {  echo "selected "; } ?>value="NC">North Carolina</option>
<option <? if($selrow->state==ND) {  echo "selected "; } ?>value="ND">North Dakota</option>
<option <? if($selrow->state==OH) {  echo "selected "; } ?>value="OH">Ohio</option>
<option <? if($selrow->state==OK) {  echo "selected "; } ?>value="OK">Oklahoma</option>
<option <? if($selrow->state=='OR') {  echo "selected "; } ?>value="OR">Oregon</option>
<option <? if($selrow->state==PA) {  echo "selected "; } ?>value="PA">Pennsylvania</option>
<option <? if($selrow->state==RI) {  echo "selected "; } ?>value="RI">Rhode Island</option>
<option <? if($selrow->state==SC) {  echo "selected "; } ?>value="SC">South Carolina</option>
<option <? if($selrow->state==SD) {  echo "selected "; } ?>value="SD">South Dakota</option>
<option <? if($selrow->state==TN) {  echo "selected "; } ?>value="TN">Tennessee</option>
<option <? if($selrow->state==TX) {  echo "selected "; } ?>value="TX">Texas</option>
<option <? if($selrow->state==UT) {  echo "selected "; } ?>value="UT">Utah</option>
<option <? if($selrow->state==VT) {  echo "selected "; } ?>value="VT">Vermont</option>
<option <? if($selrow->state==VA) {  echo "selected "; } ?>value="VA">Virginia</option>
<option <? if($selrow->state==WA) {  echo "selected "; } ?>value="WA">Washington</option>
<option <? if($selrow->state==WV) {  echo "selected "; } ?>value="WV">West Virginia</option>
<option <? if($selrow->state==WI) {  echo "selected "; } ?>value="WI">Wisconsin</option>
<option <? if($selrow->state==WY) {  echo "selected "; } ?>value="WY">Wyoming</option>

</select>
                                               
                                            </div>
                                            <div class="form-group">
                                            <label>Country:</label>
                                                <select class="form-control" name="country" required>
                                                    <option value="">Select One</option>
													<option value="USA"<? if($selrow->country==USA) {  echo "selected "; } ?>>United States Of America</option>
                                                     
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
