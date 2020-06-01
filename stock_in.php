
<?php include("top.php"); 

 
//check user login session is logged out or not
//include("logout_chk.php");
//current user session assign to a variable
//$user=$_SESSION["AdmID"];
 
 


$brandsel=GetCombo("An Item","items","id","item_name","","id","$item_id"); 


?>

<script>     
jQuery(document).ready(function(){
  var i = 1;
            $('#add').click(function(){
                i++;
                $('#dynamic_field').append("<div id='row"+i+"' class='row'><div class='col-lg-3'><div class='form-group'><select class='form-control' name='item_id[]' required><?php echo $brandsel; ?></select></div></div><div class='col-lg-3'><div class='form-group'><input required type='number' class='form-control' placeholder='Quantity' name='qty[]' id='qty' value='<?php echo $qty; ?>'></div></div><div class='input-group-btn'><button id='"+i+"' class='btn btn-danger btn_remove' type='button' name='remove' > <span class='glyphicon glyphicon-minus' aria-hidden='true'></span> </button></div></div>");
            });

            $(document).on('click','.btn_remove', function(){
                var button_id = $(this).attr("id");
                $("#row"+button_id+"").remove();
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

           /* $('#submit').click(function(){
                $.ajax({
                    async: false,
                    url: "add_data.php",
                    method: "POST",
                    data: $('#additem').serialize(),
                    success:function(rt)
                    {
                        alert(rt);
                        
                    }
                });
            });*/
  
  
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
                                    <div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Select a Store#:</label>
                                            <select class="form-control" name="store_id"  required>
                                                <?php echo GetCombo("A Store","stores","id","name","","id","$store_id") ?>
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
                                        
                                        <input required type="number" class="form-control" placeholder="Quantity" name="qty[]" id="qty" value="<?php echo $qty; ?>"  <? if($action=='view')  { ?>disabled <?php } ?>>
                                        
                                        </div>
                                        </div>
                                         
                                        <div class="input-group-btn">
        <button class="btn btn-success" type="button"  name="add" id="add"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> </button>
      </div>
                                    </div>
                                    </div>
                                    <div class="row">       
                                
                                <div class="col-lg-4">      
                                <div class="form-group"> 
                                <input name="chalanfile" class="form-control" type="file">  
                                </div>
                                </div>
                                <div class="col-lg-12">       
                          <input name="submit" id="submit" type="submit" class="btn btn-primary" value="Stock In">   
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
