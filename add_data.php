<?php
include ("connect.php");
//gets the current date 
	$curdate=date("Y-m-d");
	 

if (isset($_POST['stockin'])) {
	 
	$store_id = mysqli_real_escape_string($con, $_POST['store_id']);
	$depo_id = mysqli_real_escape_string($con, $_POST['depo_id']);
	$chalan = mysqli_real_escape_string($con, $_POST['chalan']);
	
	$chalan_file = $_FILES['chalanfile']['name'];
	//echo $location = "chalan_files/";
	//copy($_FILES['chalanfile']['tmp_name'],$location);
	move_uploaded_file($_FILES['chalanfile']['tmp_name'], 'chalan_files/'.$chalan_file);

	
	 
for($i = 0; $i < count($_POST['item_id']); $i++)
{	
    $item_id = mysqli_real_escape_string($con, $_POST['item_id'][$i]);
    $qty = mysqli_real_escape_string($con, $_POST['total'][$i]);
	
 	// $stockbal = StoreStockBal('stock_inventory','in_qty','out_qty',"store_id=$store_id AND item_id=$item_id" ); 
	// $balstock = $stockbal + $qty;
    $sql = "INSERT INTO `stock_in` SET store_id='$store_id', `date`='$curdate', item_id='$item_id', in_qty='$qty', chalan_no='$chalan', chalan_file='$chalan_file', depo_user_id='$depo_id'";
    mysqli_query($con, $sql);
	/*$upq = "UPDATE `items`, `stores` SET items.current_stock = items.current_stock + $qty, stores.total_stock = stores.total_stock + $qty
WHERE items.id = $item_id AND stores.id = $store_id";
	mysqli_query($con, $upq);*/
}
	
if(mysqli_error($con))
{
    echo "Data base error occured";
}
else
{
    echo $i . "rows Stock Uploaded";
}
}
if (isset($_POST['stockout'])) {
	 $store_id = mysqli_real_escape_string($con, $_POST['store_id']);
	 $store_mgr = mysqli_real_escape_string($con, $_POST['store_mgr']);
	 
	for($i = 0; $i < count($_POST['item_id']); $i++)
{	  
     $item_id = mysqli_real_escape_string($con, $_POST['item_id'][$i]);
     $qty = mysqli_real_escape_string($con, $_POST['qty'][$i]);
	 $sale_type = mysqli_real_escape_string($con, $_POST['sale_type'][$i]);
	 echo $stockbal = StoreStockBal('stock_inventory','in_qty','out_qty',"store_id=$store_id AND item_id=$item_id" ); 
	 echo $balstock = $stockbal - $qty;
	
    echo $sql = "INSERT INTO stock_inventory SET store_id='$store_id', date='$curdate', item_id='$item_id', out_qty='$qty', sale_type='$sale_type', store_user_id='$store_mgr', stock_bal='$balstock'";
    mysqli_query($con, $sql);
	$upq = "UPDATE `items`, `stores` SET items.current_stock = items.current_stock - $qty, stores.total_stock = stores.total_stock - $qty
WHERE items.id = $item_id AND stores.id = $store_id";
	mysqli_query($con, $upq);

}

if(mysqli_error($con))
{
	echo mysqli_error($con);
    echo "Data base error occured";
}
else
{
    echo $i . " rows added";
}
}
	
?>


<div id='row"+i+"' class='row'>
<div class='col-lg-3'>
<div class='form-group'>
<select class='form-control' name='item_id[]' id='item_id' required><?php echo $brandsel; ?></select>
</div>
</div>
<div class='col-lg-2'>
<div class='form-group'>
<select class='form-control' name='pkt[]' id='pkt' required></select>
</div>
</div>
<div class='col-lg-2'><div class='form-group'><input required type='number' class='form-control' placeholder='Quantity' name='qty[]' id='qty"+i+"' value='<?php echo $qty; ?>'></div></div>
<div class='col-lg-2'><div class='form-group'><input readonly required type='number' class='form-control' placeholder='Total' name='total[]' id='total' value='<?php echo $qty; ?>'</div></div>
<div class='input-group-btn'><button id='"+i+"' class='btn btn-danger btn_remove' type='button' name='remove' > <span class='glyphicon glyphicon-minus' aria-hidden='true'></span> </button></div></div>