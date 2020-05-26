<?php 
include("connect.php"); 

if(is_array($_GET))
{ 
foreach($_GET as $var=>$valu)
{ 
$$var = $valu;  

} 

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">



 <title>
 <?php echo $ADMIN_SITE_TITLE ;  ?>
</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $stylepath; ?>bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo $stylepath; ?>metisMenu.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo $stylepath; ?>startmin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?php echo $stylepath; ?>font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- Social Buttons CSS -->
        <link href="<?php echo $stylepath; ?>bootstrap-social.css" rel="stylesheet">
        <!-- Timeline CSS -->
        <link href="<?php echo $stylepath; ?>timeline.css" rel="stylesheet">
 
        <!-- Morris Charts CSS -->
        <link href="<?php echo $stylepath; ?>morris.css" rel="stylesheet"> 

        <!-- DataTables CSS -->
        <link href="<?php echo $stylepath; ?>dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo $stylepath; ?>dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
<style>
label.error {
    color: red;
    font-size: 12px;
    margin-left: 31px;
    font-weight: normal;
	display:none !important;
}
input.error,select.error {
    border: solid 1px red !important;
	color:red;
}
</style>
		
           <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="js/metisMenu.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="js/startmin.js"></script>
  
        <!-- Jquery Validation Plugin-->
        <script src="js/jquery.validate.min.js"></script>
       <!-- DataTables JavaScript -->
        <script src="js/dataTables/jquery.dataTables.min.js"></script>
        <script src="js/dataTables/dataTables.bootstrap.min.js"></script>


		 <script type="text/javascript">
//delete only particular row
 jQuery(document).ready(function(){

	jQuery('.deluser').click(function(){
	   var conf = confirm('Continue delete This User?');
	   if(conf)
		  jQuery(this).parents('tr').fadeOut(function(){
			 jQuery(this).remove();
			 var current_id =  jQuery(this).attr('id');
				 
			  
				window.location='alldel.php?' + 'id=' + current_id + '&ti=ru';
		  });
	   return false;
	}); 


	jQuery('.delcustomer').click(function(){
	   var conf = confirm('Continue delete the Client Details?');
	   if(conf)
		  jQuery(this).parents('tr').fadeOut(function(){
			 jQuery(this).remove();
			 var current_id =  jQuery(this).attr('id');
			  window.location='alldel.php?' + 'id=' + current_id + '&ti=rc';
		  });
	   return false;
	}); 
	
	jQuery('.delwarrant').click(function(){
	   var conf = confirm('Continue delete the Warrant Details?');
	   if(conf)
		  jQuery(this).parents('tr').fadeOut(function(){
			 jQuery(this).remove();
			 var current_id =  jQuery(this).attr('id');
			  window.location='alldel.php?' + 'id=' + current_id + '&ti=wr';
		  });
	   return false;
	}); 
	
	jQuery('.delbundle').click(function(){
	   var conf = confirm('Continue delete the Bundle Details?');
	   if(conf)
		  jQuery(this).parents('tr').fadeOut(function(){
			 jQuery(this).remove();
			 var current_id =  jQuery(this).attr('id');
			  window.location='alldel.php?' + 'id=' + current_id + '&ti=bl';
		  });
	   return false;
	}); 
	
	jQuery('.delload').click(function(){
	   var conf = confirm('Continue delete the Load Details?');
	   if(conf)
		  jQuery(this).parents('tr').fadeOut(function(){
			 jQuery(this).remove();
			 var current_id =  jQuery(this).attr('id');
			  window.location='alldel.php?' + 'id=' + current_id + '&ti=ld';
		  });
	   return false;
	}); 
	}); 
</script> 