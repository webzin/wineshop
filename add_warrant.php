<?php
//connect to database
include("connect.php");
//check user login session is logged out or not
include("logout_chk.php");
//current user session assign to a variable
$user=$_SESSION["AdmID"]; 

$lid=$_GET["lid"];
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
						
								
$fql="SELECT * FROM warrants WHERE warrant_no='$warrant_no'";
$fel=mysql_query($fql);
$row=mysql_affected_rows();
if($row>0)
{
$msg1="$warrant_no Already Exhist..!";

}


else{
$fql1="SELECT * FROM loads WHERE id='$load_id'";
$fel1=mysql_query($fql1);
$felrow=mysql_fetch_object($fel1);
$cuid=$felrow->customer_id;

$insquery = "INSERT INTO warrants SET w_date='$curdate',load_id='$load_id',customer_id='$cuid',warrant_no='$warrant_no'";



			$insresult = mysql_query($insquery);
			//message call for success
			$Msg=1;
			
			$lastid = mysql_insert_id();
			echo "<script>location.href='add_bundle.php?lid=$lastid&action=add'</script>";
			
			/*echo "<script>location.href='add_warrant.php?msg=$Msg&action=add'</script>";*/
	 
}
 
			
	 }
	

 

if($id)
		
{
$query = "UPDATE warrants SET w_date='$curdate',load_id='$load_id',warrant_no='$warrant_no' where id='$id'";

			$result = mysql_query($query);
			//message call for success
			$Msg=2;
			echo "<script>location.href='add_warrant.php?msg=$Msg&id=$id&action=edit'</script>";	  
			
	}		
	
 
}
 if($id)
//select query to get the values
{

/* get through the values */
$sel="SELECT * FROM warrants WHERE id='$id'";
$selqry=mysql_query($sel);
$selrow=mysql_fetch_object($selqry);
$lid=$selrow->load_id;

}
 
 
 
 ?>
<?php include("top.php"); ?>
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

	$('#addwarrant').validate({ // initialize the plugin
        rules: {
		load_id: {
		required: true,
		},
		 
		warrant_no: {
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
                        <h1 class="page-header"><?php if($act==edit) { ?>Edit <? } if($act==view)  { ?>View <? } if($act==add) {?>Add <?php } ?>Warrant</h1>
                        <div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <?php echo $msg1 ?><?php echo $msg11 ?>
                                </div>
                                <div class="alert alert-success alert-dismissable sm" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <? if($msg==1) { ?>Warrant Added Sucessfully!!!<? } ?>
                                    <? if($msg==2) { ?>Warrant Updated Sucessfully!!!<? } ?>
                                    
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
                                <form role="form" name="addwarrant" id="addwarrant" method="post" enctype="multipart/form-data">

                                                                        <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Select a Load:</label>
                                            <select class="form-control load" name="load_id" required <? if($act==view)  { ?>disabled <?php } ?>>
                                             
                                                <?php echo GetCombo("Load","loads","id","order_no","","id","$lid") ?>
                                               </select>
                                               
 

        </div>
                                           
                                            <div class="form-group">
                                            <label>Warrant Number:</label>
              
                                               <input <? if($act==view)  { ?>disabled <?php } ?> type="number" class="form-control" placeholder="Warrant Number" name="warrant_no" value="<?php echo $selrow->warrant_no; ?>" required>
                                            </div>
                                          
                                             <input <? if($act==view)  { ?>disabled <?php } ?> name="submit" type="submit" class="btn btn-primary" value="<?php if($id) { ?>Update<? } else { ?>Add<? } ?> Warrant">                                     
                                        
                                        
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
