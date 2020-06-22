
<?php include("top.php"); 

 
//check user login session is logged out or not
//include("logout_chk.php");
//current user session assign to a variable
//$user=$_SESSION["AdmID"];
 
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
	if (isset($_POST["submit"]))
	{

$bname = GetName('brands','name','id',$brand_id);
$tname = GetName('variants','name','id',$variants);
$vname = GetName('variants_type','name','id',$category);
$vol = GetName('volume','name','id',$vol_id);
$itemname =addslashes( $bname." ".$tname." ".$vname ." ".$vol);		
 
		if(!$id)
		
	   {
 

$fql="SELECT * FROM items WHERE brand_id='$brand_id' AND type_id='$category' AND variant_id='$variants' AND vol_id='$vol_id'";
$fel=mysqli_query($con,$fql);
$row=mysqli_affected_rows($con);
if($row>0)
{
$msg1="Item () Already Exhist..!";

}


else{
 

$insquery = "INSERT INTO items SET brand_id='$brand_id', type_id='$category', variant_id='$variants', vol_id='$vol_id', item_name='$itemname', buy_price='$bprice', wholesale_price='$wprice', retail_price='$rprice'";


$insresult = mysqli_query($con,$insquery);
//message call for success
$Msg='addsuccess';
echo "<script>location.href='add_items.php?msg=$Msg'</script>";

}
 }
			
 
	



if($id)
		
{


$fql="SELECT * FROM items WHERE brand_id='$brand_id' AND type_id='$category' AND variant_id='$variants' AND vol_id='$vol_id' AND id !='$id'";
$fel=mysqli_query($con,$fql);
$row=mysqli_affected_rows($con);
if($row>0)
{
$msg1="This Item is Already Exhist..! Duplicate not allowed";

}
 
else {
$query = "UPDATE items SET brand_id='$brand_id', type_id='$category', variant_id='$variants', vol_id='$vol_id', item_name='$itemname', buy_price='$bprice', wholesale_price='$wprice', retail_price='$rprice' where id='$id'";

$result = mysqli_query($con,$query);
//message call for success
$Msg='editsuccess';
echo "<script>location.href='manage_items.php?msg=$Msg'</script>";	  
			
	}		
}	

 	}
 
 if($id)
//select query to get the values
{

/* get through the values */
$sel="SELECT * FROM items WHERE id='$id'";
$selqry=mysqli_query($con,$sel);
$selrow=mysqli_fetch_object($selqry);
$brand_id=$selrow->brand_id;
$category=$selrow->type_id;
$variants=$selrow->variant_id;
$vol_id=$selrow->vol_id;
$bprice=$selrow->buy_price;
$wprice=$selrow->wholesale_price;
$rprice=$selrow->retail_price; 

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

<? if($msg=='addsuccess') { ?>
 
jQuery('.sm').fadeIn();
<? } ?>

<? if($msg=='editsuccess')  { ?>
 
jQuery('.sm').fadeIn();
<? } ?>

 
	$('#additem').validate({ // initialize the plugin
        rules: {
		brand_id: {
		required: true,
		},
		brand: {
		required: true,
		},
		pieces: {
		required: true,
		number:true,
		},
		list_w: {
		required: true,
		number:true,
		},
		scale_w: {
		required: true,
		number:true,
		},
		locaton: {
		required: true,
		},
		
	},
		 
       
    });
});

</script>
 

    <body>

        <div id="wrapper">

            <!-- Navigation -->
             <?php include("nav.php"); ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><?php if($action=='edit') { ?>Edit <? } if($action=='view')  { ?>View <? } else {?>Add <?php } ?>Items</h1>
						 
                        <div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11 ?><?php echo $msgwgt ?>
                                </div>

                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php 
									
									if($msg=='addsuccess') { ?>Item Added Sucessfully!!!<? } ?>
                                    <?php if($msg=='editsuccess') { ?>Item Updated Sucessfully!!!<? } ?>
                                    
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
                                <form role="form" name="additem" id="additem" method="post" enctype="multipart/form-data">

                                                                        <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                    
                                            
                                             
                                            <div class="form-group">
                                            <label>Wine Category#:</label>
                                            <select required class="form-control" name="category" required>
                                            <?php echo GetCombo("Category","variants_type","id","name","","id","$category") ?>
                                            </select>
                                               
                                            </div>
											<div class="form-group">
                                            <label>Wine Brands#:</label>
                                            <select class="form-control" name="brand_id" required>
                                                <?php echo GetCombo("Brands","brands","id","name","","id","$brand_id") ?>
                                               </select>
                                            </div>
											 <div class="form-group">
                                            <label>Variant Name#:</label>
                                            <select required class="form-control" name="variants"  required>
                                            <?php echo GetCombo("Variants","variants","id","name","","id","$variants") ?>
                                            </select>
                                               
                                            </div>
											
											 <div class="form-group">
                                            <label>Volume Size#:</label>
                                            <select required class="form-control" name="vol_id" required>
											<?php echo GetCombo("Volumes","volume","id","name","","id","$vol_id") ?>
                                            </select>
                                               
                                            </div>
                                                                                
                                        
                                        
                                    </div>
                                    <div class="col-lg-6">
                                     
                                            <div class="form-group">
                                            <label>Purchase Price:</label>
              
                                               <input required type="number" class="form-control" placeholder="Purchase Price" name="bprice" value="<?php echo $bprice; ?>"  <? if($action=='view')  { ?>disabled <?php } ?>>
                                            </div>
                                            <div class="form-group">
                                            <label>Wholesale Price:</label>
                                               <input required type="number" class="form-control" id="wprice" placeholder="Wholesale Price" name="wprice" value="<?php echo $wprice; ?>"  <? if($action=='view')  { ?>disabled <?php } ?> onBlur="add_number()"> 
                                             
                                            </div>
                                            <div class="form-group">
                                            <label>Retail Price:</label>
                                               <input required type="number" class="form-control" placeholder="Retail Price" name="rprice" id="rprice" value="<?php echo $rprice; ?>"  <? if($action=='view')  { ?>disabled <?php } ?>>
                                               
                                            </div>
                                             
                                           
                                
                                         
                          <input name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add<? } ?> Items" <? if($action=='view')  { ?>disabled <?php } ?> >   
                                        
                                        
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
