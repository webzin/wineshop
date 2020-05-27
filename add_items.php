<?php
//connect to database
 
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

		if(!$id)
		
	   {
						
								
$fql="SELECT * FROM bundles WHERE batch_id='$batch_id'";
$fel=mysql_query($fql);
$row=mysql_affected_rows();
if($row>0)
{
$msg1="$batch_id Already Exhist..!";

}


else{

$fql1="SELECT * FROM warrants WHERE id='$warrant_id'";
$fel1=mysql_query($fql1);
$felrow=mysql_fetch_object($fel1);
$cuid=$felrow->load_id;


$result = mysql_query("SELECT SUM(list_w) AS value_sum FROM bundles where warrant_id='$warrant_id'"); 
$row1 = mysql_fetch_assoc($result); 
$sum = $row1['value_sum'];

$sum1 = $sum + $list_w;

if($sum1>3255) {



$msgwgt="Total Weight is $sum1 : Limit Exhusted..! Choose Another Warrant";

}
else {
$cid=GetName(loads,customer_id,id,$cuid);
$insquery = "INSERT INTO bundles SET arrival_date='$curdate', custo_id='$cid', load_id='$cuid', warrant_id='$warrant_id', batch_id='$batch_id', brand='$brand', pieces='$pieces', list_w='$list_w', scale_w='$scale_w', location='$locaton'";


			$insresult = mysql_query($insquery);
			//message call for success
			$Msg=1;
			echo "<script>location.href='add_bundle.php?msg=$Msg&action=add&lid=$warrant_id'</script>";
	 
}
 }
			
	 }
	

 

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
 
}
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
<?php include("top.php"); ?>
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
                        <h1 class="page-header"><?php if($act=='edit') { ?>Edit <? } if($act=='view')  { ?>View <? } if($act=='add') {?>Add <?php } ?>Items</h1>
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
											<?php echo GetCombo("Variants","variants","id","name","","id","$variants") ?>
                                            <?php echo GetCombo("Volumes","volume-size","id","name","","id","$volume") ?>
                                            </select>
                                               
                                            </div>
                                                                                
                                        <div class="form-group">
                                            <label>Pieces:</label>
              
                                               <input required type="number" class="form-control" placeholder="Pieces" name="pieces" value="<?php echo $pieces; ?>"  <? if($act==view)  { ?>disabled <?php } ?>>
                                            </div>
                                        
                                    </div>
                                    <div class="col-lg-6">
                                     
                                            
                                            <div class="form-group">
                                            <label>List Weight</label>
                                               <input required type="number" min="0" max="3255" class="form-control" id="lw" placeholder="List Weight" name="list_w" value="<?php echo $list_w; ?>"  <? if($act==view)  { ?>disabled <?php } ?> onBlur="add_number()"> 
                                               <code id="total">Current Total Weight is : 
												<?php 
												
												$result1 = mysql_query("SELECT SUM(list_w) AS value_sum FROM bundles where warrant_id='$warrant_id'"); 
												$row11 = mysql_fetch_assoc($result1); 
												$suma1 = $row11['value_sum']
                                                
                                                ?>
                                                <i id="total1"><?php   if($suma1=="") { echo "0"; } else { echo "$suma1"; }  ?></i>
                                                </code>
                                               
												<script type="text/javascript">
                                                          function add_number() {
               
                var first_number = <?php   if($suma1=="") { echo "0"; } else { echo "$suma1"; }  ?>;
                var second_number = parseInt(document.getElementById("lw").value);
                var result = first_number + second_number;
     
                document.getElementById("total1").innerHTML  = result;
				
            }
                                                </script>
                                            </div>
                                            <div class="form-group">
                                            <label>Scale Weight:</label>
                                               <input required type="number" class="form-control" placeholder="Scale Weight" name="scale_w" id="sw" value="<?php echo $scale_w; ?>"  <? if($act==view)  { ?>disabled <?php } ?>>
                                               
                                            </div>
                                            <div class="form-group">
                                            <label>Location#:</label>
                                            <select required class="form-control" name="locaton"  <? if($act==view)  { ?>disabled <?php } ?>>
                                           <?php echo GetCombo("Location","location","id","name","","id","$location") ?>
                                             
                                            </select>
                                                
                                            </div>
                                           
                                
                                         
                          <input name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add<? } ?> Bundle" <? if($act==view)  { ?>disabled <?php } ?> >   
                                        
                                        
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
