<?php
//connect to database
include("top.php");
//check user login session is logged out or not
include("logout_chk.php");
//current user session assign to a variable
$user=$_SESSION["AdmID"];
 

$id=$_GET["id"];
$msg=$_GET['msg'];
$act=$_GET['action'];
include("user_chk.php");
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
						
								
$fql="SELECT * FROM loads WHERE order_no='$order_no'";
$fel=mysql_query($fql);
$row=mysql_affected_rows();
if($row>0)
{
$msg1="$order_no Already Exhist..!";

}


else{

$insquery = "INSERT INTO loads SET arrival_date='$curdate',customer_id='$customer_id',order_no='$order_no',user_id='$user',vech_no='$vech_no',building='$building'";


			$insresult = mysql_query($insquery);
			//message call for success
			$Msg=1;
			$lastid = mysql_insert_id();
			echo "<script>location.href='add_warrant.php?lid=$lastid&action=add'</script>";
			/*echo "<script>location.href='manage_load.php?msg=$Msg&action=add'</script>";*/
	 
}
 
			
	 }
	

 

if($id)
		
{
$query = "UPDATE loads SET arrival_date='$curdate',customer_id='$customer_id',order_no='$order_no',vech_no='$vech_no',building='$building' where id='$id'";

			$result = mysql_query($query);
			//message call for success
			$Msg=2;
			echo "<script>location.href='add_load.php?msg=$Msg&id=$id&action=edit'</script>";	  
			
	}		
	
 
}
 if($id)
//select query to get the values
{

/* get through the values */
$sel="SELECT * FROM loads WHERE id='$id'";
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
 $('#addload').validate({ // initialize the plugin
        rules: {
		customer_id: {
		required: true,
		},
		 
		order_no: {
		required: true,
		number:true,
		},
		vech_no: {
		required: true,
		},
		building: {
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
                        <h1 class="page-header"><?php if($act==edit) { ?>Edit <? } if($act==view)  { ?>View <? } if($act==add) {?>Add <?php } ?>Load</h1>
                        <div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11 ?>
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <? if($msg==1) { ?>Load Added Sucessfully!!!<? } ?>
                                    <? if($msg==2) { ?>Load Updated Sucessfully!!!<? } ?>
                                    
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
                                <form role="form" name="addload" id="addload" method="post" enctype="multipart/form-data">

                                                                        <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Customer Name:</label>
                                            <select class="form-control" name="customer_id" required <? if($act==view)  { ?>disabled <?php } ?>>
                                                <?php echo GetCombo("Customer","users","id","compname","type='C'","id","$selrow->customer_id") ?>
                                               </select>
                                            </div>
                                            <div class="form-group">
                                            <label>Order Number:</label>
              
                                               <input type="number" class="form-control" placeholder="Order Number" name="order_no" value="<?php echo $selrow->order_no; ?>" required <? if($act==view)  { ?>disabled <?php } ?>>
                                            </div>
                                            <div class="form-group">
                                            <label>Veichle/ Railcar/Truck # Number:</label>
                                               <input class="form-control" placeholder="Veichle/ Railcar/Truck # Number" name="vech_no" value="<?php echo $selrow->vech_no; ?>" required <? if($act==view)  { ?>disabled <?php } ?>>
                                               
                                            </div>
                                            <div class="form-group">
                                            <label>Building#:</label>
                                            <select class="form-control" name="building" required <? if($act==view)  { ?>disabled <?php } ?>>
                                          
                                                <?php echo GetCombo("Building","building","id","name","","id","$selrow->building") ?>
                                                
                                            </select>
                                               
                                            </div>
                                            
                                
                                         
                          <input name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add<? } ?> Load" <? if($act==view)  { ?>disabled <?php } ?>>                                     
                                        
                                        
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
