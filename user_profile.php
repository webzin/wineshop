<?php
//connect to database
include("connect.php");
//check user login session is logged out or not
include("logout_chk.php");
//current user session assign to a variable
$user=$_SESSION["AdmID"];
include("user_chk.php");
  
/* get through the values */
$sel="SELECT *,`password`, AES_DECRYPT(`password`, SHA1('aalizzwell')) AS passd FROM users WHERE id='$user'";
$selqry=mysql_query($sel);
$selrow=mysql_fetch_object($selqry);

 
 
 
 ?>
<?php include("top.php"); ?>
 
         
    </head>
    <body>

        <div id="wrapper">

            <!-- Navigation -->
             <?php include("nav.php"); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Welcome <?php echo $selrow->name; ?></h1>
                        
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                               User Details
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                 

                                    <div class="col-lg-6">
                                                                                    <div class="form-group">
                                            <label>FullName:</label>
<input class="form-control" placeholder="Full Name" name="fullname" value="<?php echo $selrow->name; ?>" readonly="readonly">
                                               
                                            </div>
                                            <div class="form-group">
                                            <label>Username:</label>
                                            <div class="form-group input-group">
                                            
                                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
<input type="text" class="form-control" placeholder="Username" name="username" value="<?php echo $selrow->username; ?>" readonly="readonly">
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label>Password:</label>
                                            <div class="form-group input-group">
                                            
                                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
<input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $selrow->passd; ?>" readonly="readonly">
                                            </div>
                                            </div>
                                               
                                               <div class="form-group">
                                            <label>Eamil Address:</label>
                                            <div class="form-group input-group">
                                            
                                                <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>
 <input type="text" class="form-control" placeholder="Email Address" name="email" value="<?php echo $selrow->email; ?>" readonly="readonly">
                                            </div>
                                            </div>
                                             <div class="form-group">
                                            <label>Phone Number:</label>
                                             <div class="form-group input-group">
                                             
                                                <span class="input-group-addon"><i class="fa fa-phone"></i>
                                                </span>
<input type="text" class="form-control" placeholder="Phone Number" name="contactno" value="<?php echo $selrow->contactno; ?>" readonly="readonly">
                                            </div>
                                            </div>
                                            
                                            
                                     
                                           
                                    </div>
                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Address:</label>
                                                <input class="form-control" placeholder="Address" name="address" value="<?php echo $selrow->address; ?>" readonly="readonly">
                                               
                                            </div>
                                            <div class="form-group">
                                            <label>City:</label>
              <input class="form-control" placeholder="City" name="city" value="<?php echo $selrow->city; ?>" readonly="readonly">
                                               
                                            </div>
                                            <div class="form-group">
                                            <label>State:</label>
                                               <select name="state" id="disabledSelect" class="form-control" readonly="readonly" >
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
                                                <select class="form-control" name="country" readonly="readonly" id="disabledSelect">
                                                    <option value="">Select One</option>
													<option value="USA"<? if($selrow->country==USA) {  echo "selected "; } ?>>United States Of America</option>
                                                     
                                                </select>
                                               
                                            </div>
                                            
                                <div class="form-group">
                                    <label>User Type</label>
                                    <label class="radio-inline">
        <input readonly="readonly" type="radio" name="type" id="optionsRadiosInline1" value="A" <? if($selrow->type==A) {  echo "checked "; } ?>>Admin
    </label>
    <label class="radio-inline">
        <input readonly="readonly" type="radio" name="type" id="optionsRadiosInline2" value="U" <? if($selrow->type==U) {  echo "checked "; } ?>>User
    </label>
                                     
                                            </div>
                                         
                         <a class="btn btn-block btn-social btn-bitbucket" href="add_user.php?id=<?php echo $user?>&action=edit">
                                    <i class="fa fa-edit"></i> Edit Your Profile
                                </a>                                 
                                        
                                        
                                    </div>
                                    
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
