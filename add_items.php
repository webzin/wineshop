
<?php include("top.php"); 

 
//check user login session is logged out or not
//include("logout_chk.php");
//current user session assign to a variable
//$user=$_SESSION["AdmID"];
 
$brand_id=isset($_GET["bid"]);
$id=isset($_GET["id"]);
$msg=isset($_GET['msg']);
$act=isset($_GET['action']);
 
 
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


		
 /*
		if(!$id)
		
	   {
 

$fql="SELECT * FROM bundles WHERE brand_id='$curdate'AND type_id='$cid' AND variant_id='$cuid' AND vol_id='$warrant_id'";
$fel=mysqli_query($con,$fql);
$row=mysqli_affected_rows();
if($row>0)
{
$msg1="Item () Already Exhist..!";

}


else{
 */
echo $itemname= GetName('brands','name','id','$brand_id'); 
echo $insquery = "INSERT INTO items SET brand_id='$brand_id', type_id='$category', variant_id='$variants', vol_id='$volume', item_name='$itemname', buy_price='$bprice', wholesale_price='$wprice', retail_price='$rprice'";


$insresult = mysqli_query($con,$insquery);
//message call for success
$Msg=1;
//echo "<script>location.href='add_items.php?msg=$Msg&action=add&lid=$warrant_id'</script>";
/*
}*/
 }
			
 
	

 /*

if($id)
		
{


$result = mysql_query("SELECT SUM(list_w) AS value_sum FROM bundles where warrant_id='$warrant_id'"); 
$row1 = mysql_fetch_assoc($result); 
$sum = $row1['value_sum'];


if($sum>3255) {
 

$msgwgt="Total Weight is $sum : Limit Exhusted..! Can't Update";
}
else {
$query = "UPDATE bundles SET arrival_date='$curdate', warrant_id='$warrant_id', batch_id='$batch_id', brand='$brand', pieces='$pieces', list_w='$list_w', scale_w='$scale_w', location='$locaton' where id='$id'";

			$result = mysql_query($query);
			//message call for success
			$Msg=2;
			echo "<script>location.href='manage_bundle.php?msg=$Msg'</script>";	  
			
	}		
}	
 */
 
 if($id)
//select query to get the values
{

/* get through the values */
$sel="SELECT * FROM bundles WHERE id='$id'";
$selqry=mysql_query($sel);
$selrow=mysql_fetch_object($selqry);
$warrant_id=$selrow->warrant_id;
$batch_id=$selrow->batch_id;
$brand=$selrow->brand;
$pieces=$selrow->pieces;
$list_w=$selrow->list_w;
$scale_w=$selrow->scale_w;
$location=$selrow->location;
 

}
 
 
 
 ?>

<script>  
jQuery(document).ready(function(){

<? if($rowi>0) { ?>
jQuery('.login-alert').fadeIn();
<? } ?>
<? if($sum1>3255)  { ?>
jQuery('.login-alert').fadeIn();
<? } ?>

<? if($row>0) { ?>
jQuery('.login-alert').fadeIn();
<? } ?>

<? if($msg==1 && $sum1<3255)  { ?>
 
jQuery('.sm').fadeIn();
<? } ?>

<? if($msg==2)  { ?>
 
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
                        <h1 class="page-header"><?php if($act=='edit') { ?>Edit <? } if($act=='view')  { ?>View <? } else {?>Add <?php } ?>Items</h1>
                        <div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11 ?><?php echo $msgwgt ?>
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <? if($msg==1) { ?>Item Added Sucessfully!!!<? } ?>
                                    <? if($msg==2) { ?>Item Updated Sucessfully!!!<? } ?>
                                    
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
                                            <label>Brands#:</label>
                                            <select class="form-control" name="brand_id"  <? if($act=='view')  { ?>disabled <?php } ?> required>
                                                <?php echo GetCombo("Brands","brands","id","name","","id","$brand_id") ?>
                                               </select>
                                            </div>
                                            
                                             
                                            <div class="form-group">
                                            <label>Category#:</label>
                                            <select required class="form-control" name="category"  <? if($act=='view')  { ?>disabled <?php } ?>>
                                            <?php echo GetCombo("Category","variants_type","id","name","","id","$category") ?>
                                            </select>
                                               
                                            </div>
											
											 <div class="form-group">
                                            <label>Variants#:</label>
                                            <select required class="form-control" name="variants"  <? if($act=='view')  { ?>disabled <?php } ?>>
                                            <?php echo GetCombo("Variants","variants","id","name","","id","$variants") ?>
                                            </select>
                                               
                                            </div>
											
											 <div class="form-group">
                                            <label>Volume Size#:</label>
                                            <select required class="form-control" name="volume"  <? if($act=='view')  { ?>disabled <?php } ?>>
											<?php echo GetCombo("Volumes","volume","id","name","","id","$volume") ?>
                                            </select>
                                               
                                            </div>
                                                                                
                                        
                                        
                                    </div>
                                    <div class="col-lg-6">
                                     
                                            <div class="form-group">
                                            <label>Purchase Price:</label>
              
                                               <input required type="number" class="form-control" placeholder="Purchase Price" name="bprice" value="<?php echo $bprice; ?>"  <? if($act=='view')  { ?>disabled <?php } ?>>
                                            </div>
                                            <div class="form-group">
                                            <label>Wholesale Price:</label>
                                               <input required type="number" class="form-control" id="wprice" placeholder="Wholesale Price" name="wprice" value="<?php echo $wprice; ?>"  <? if($act=='view')  { ?>disabled <?php } ?> onBlur="add_number()"> 
                                             
                                            </div>
                                            <div class="form-group">
                                            <label>Retail Price:</label>
                                               <input required type="number" class="form-control" placeholder="Retail Price" name="rprice" id="rprice" value="<?php echo $rprice; ?>"  <? if($act=='view')  { ?>disabled <?php } ?>>
                                               
                                            </div>
                                             
                                           
                                
                                         
                          <input name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add<? } ?> Bundle" <? if($act=='view')  { ?>disabled <?php } ?> >   
                                        
                                        
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
