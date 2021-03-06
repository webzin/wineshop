
<?php include("top.php"); 

 
//check user login session is logged out or not
//include("logout_chk.php");
//current user session assign to a variable
//$user=$_SESSION["AdmID"];
 
 


$brandsel=GetCombo("An Item","items","id","item_name","","id","$item_id"); 


?>

<script>     
jQuery(document).ready(function(){
 
$("select#store_id").change(function() {
	// myHandler($(this).val());
	$('#store_mgr').load('data.php?act=store_mgr&store_id='+this.value, '', function(response, status, xhr) { });
	$('#bepari_id').load('data.php?act=bepari_id&store_id='+this.value, '', function(response, status, xhr) { });
	
});
$('#bepari_id').hide(); 
 $('#sale_type').change(function(){
        if($('#sale_type').val() == 'W') {
            $('#bepari_id').show(); 
        } else {
            $('#bepari_id').hide(); 
        } 
    });

$('#additem').validate({

   rules: {
       store_id: {
                required: true,
            },
        item_id: {
            required: true,
        },          
        qty: {
            required: true,
        },
		chalan: {
            required: true,
        },
		chalanfile: {
            required: true,
        },
    },

    submitHandler: function(form) {
        $.ajax({
			url: "add_data.php",
			type: "POST",
			data: $('#additem').serialize(),
            success: function(response) {
                $('#answers').html(response);
            }            
        });
    }
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
                        <h1 class="page-header">Stock Outward</h1>
						 
                        <div class="alert alert-danger alert-dismissable login-alert" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    
                                </div>

                                <div id="answers" class="alert alert-success alert-dismissable" style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    
                                    
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
                                
                                <form id="additem">
                                
                                     <div class="row">
                                                                        <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                            <label>Select a Store#:</label>
                                            <select class="form-control" name="store_id" id="store_id"  required>
                                                <?php echo GetCombo("A Store","stores","id","name","","id","$store_id") ?>
                                               </select>
                                            </div>
                                     
                                    </div>
									                                    <!-- /.col-lg-6 (nested) -->
                                    <div class="col-lg-3">
                                    <div class="form-group">
                                            <label>Store Manager#:</label>
                                            <select class="form-control" name="store_mgr" id="store_mgr"  required>
                                                
                                               </select>
                                            </div>
                                     
                                    </div>
									 
									
								 
                                    </div>
                                    <div id="dynamic_field">
                                     <div class="row">
                                        <div class="col-lg-3">
                                        
                                        <div class="form-group">
                                        
                                        
                                        <select class="form-control" name="item_id[]"  required>
                                                <?php echo GetCombo("An Item","items","id","item_name","","id","$item_id") ?>
                                               </select>
                                        </div>
                                        </div>
                                        <div class="col-lg-3">      
                                        <div class="form-group">
                                        
                                        <input required type="number" class="form-control" placeholder="Quantity" name="qty[]" id="qty" value="<?php echo $qty; ?>">
                                        
                                        </div>
                                        </div>
                                         <div class="col-lg-3">      
                                        <div class="form-group">
                                        
                                        <select class="form-control" name="sale_type[]" id="sale_type" required>
                                                <option value="">Select Sale Type</option>
												<option value="W">Wholesale</option>
												<option value="R">Retail</option>
												</select>
                                        
                                        </div>
                                        </div>
										<div class="col-lg-3">      
                                        <div class="form-group">
                                        
                                       
                                            <select class="form-control" name="bepari_id" id="bepari_id"  required>
                                                 
                                               </select>
                                        </div>
                                        </div>
                                        
                                    </div>
                                    </div>
                                    <div class="row">       
                             
                                <div class="col-lg-12">       
                          <input name="stockout" id="submit" type="submit" class="btn btn-primary" value="Stock Out">   
                                    </div>    
                                        
                                    </div>
                                    </form>
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
