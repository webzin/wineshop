<?php include("top.php"); 
//check user login session is logged out or not
//include("logout_chk.php");
//current user session assign to a variable
//$user=$_SESSION["AdmID"];

$brandsel=GetCombo("An Item","items","id","item_name","","id","$item_id"); 
?>

<script>     
jQuery(document).ready(function(){
	
	$("select#item_id").change(function() {
	// myHandler($(this).val());
	$('#pkt').load('data.php?act=boxsize&item_id='+this.value, '', function(response, status, xhr) { });
});
$('#qty').keyup(function () {
	
	var pieces = $("#pkt").val();
	var sumtotal = $(this).val() * pieces ;
	$('#total').val(sumtotal);
	});
  var i = 1;
            $('#add').click(function(){
                i++;
			
                $('#dynamic_field').append("<div id='row"+i+"' class='row'><div class='col-lg-3'><div class='form-group'><select class='form-control item' name='item_id[]' id='item_id"+i+"'><?php echo $brandsel; ?></select></div></div><div class='col-lg-2'><div class='form-group'><select class='form-control' name='pkt[]' id='pkt"+i+"' ></select></div></div><div class='col-lg-2'><div class='form-group'><input type='number' class='form-control' placeholder='Quantity' name='qty[]' id='qty"+i+"' value='<?php echo $qty; ?>'></div></div><div class='col-lg-2'><div class='form-group'><input readonly type='number' class='form-control' placeholder='Total' name='total[]' id='total' value='<?php echo $qty; ?>'></div></div><div class='input-group-btn'><button id='"+i+"' class='btn btn-danger btn_remove' type='button' name='remove' > <span class='glyphicon glyphicon-minus' aria-hidden='true'></span> </button></div></div>");
					
            });
 
            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
            });
 
   

 
$('#additem').validate({

/* 
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
 */
    submitHandler: function(form) {
 
			var fd = new FormData(form);
			var files = $('#chalanfile')[0].files[0];
			fd.append('chalanfile',files);
			
        $.ajax({
			url: "add_data.php",
			type: "POST",
			data: fd,
			contentType: false,
			processData: false,
			//data: $('#additem').serialize(),
            success: function(response) {
                $('#answers').html(response);
				$('#answers').show();
				$("#additem")[0].reset() 
            }            
        });
    }
}); 

$.validator.addClassRules({
	
'form-control': {
required: true

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
                        <h1 class="page-header">Stock Inward</h1>
						 
                        <div id="messageBox" class="alert alert-danger alert-dismissable login-alert" style="display:none">
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
                                            <select class="form-control" name="store_id" id="store_id" >
                                                <?php echo GetCombo("A Store","stores","id","name","","id","$store_id") ?>
                                               </select>
                                            </div>
                                     
                                    </div>
									                                    <!-- /.col-lg-6 (nested) -->
                                    
									
									<div class="col-lg-3">
                                    <div class="form-group">
                                            <label>Depo Manager#:</label>
                                            <select class="form-control" name="depo_id">
                                                <?php echo GetCombo("Depo Manager","users","id","name","type='DEPOT'","id","$depo_id"); ?>
                                               </select>
                                            </div>
                                     
                                    </div>
                                    </div>
						<div id="dynamic_field">
						<div class="row">
						
						<div class="col-lg-3">
						<div class="form-group">
						<select class="form-control item" name="item_id[]" id="item_id"   >
						<?php echo GetCombo("An Item","items","id","item_name","","id","$item_id") ?>
						</select>
						</div>
						</div>
						<div class="col-lg-2">
						<div class="form-group">
						<select class="form-control" name="pkt" id="pkt"   >
						 
						</select>
						</div>
						</div>
						<div class="col-lg-2">      
						<div class="form-group">
						<input  type="number" class="form-control" placeholder="Quantity" name="qty" id="qty" value="<?php echo $qty; ?>">
						</div>
						</div>
						<div class="col-lg-2">      
						<div class="form-group">
						<input readonly  type="number" class="form-control" placeholder="Total" name="total" id="total" value="<?php echo $qty; ?>">
						</div>
						</div>

						<div class="input-group-btn">
						<button class="btn btn-success" type="button"  name="add" id="add"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
						</div>
						</div>
						</div>
                                    <div class="row">       
                                 <div class="col-lg-3">      
                                        <div class="form-group">
                                        
                                        <input type="text" class="form-control" placeholder="Chalan Number" name="chalan" id="chalan" value="<?php echo $chalan; ?>">
                                        
                                        </div>
                                        </div>
                                <div class="col-lg-3">      
                                <div class="form-group"> 
                                <input name="chalanfile" id="chalanfile" class="form-control" type="file">  
                                </div>
                                </div>
                                <div class="col-lg-12">       
                          <input name="stockin" id="submit" type="submit" class="btn btn-primary" value="Stock In">   
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
