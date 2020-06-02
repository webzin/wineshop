<?php
include ("connect.php");
//gets the current date 
	$curdate=date("Y-m-d");
	$user_id='11';
for($i = 0; $i < count($_POST['item_id']); $i++)
{	
    echo $store_id = mysqli_real_escape_string($con, $_POST['store_id'][$i]);
    echo $item_id = mysqli_real_escape_string($con, $_POST['item_id'][$i]);
    echo $qty = mysqli_real_escape_string($con, $_POST['qty'][$i]);
	echo $chalan = mysqli_real_escape_string($con, $_POST['chalan'][$i]);

    echo $sql = "INSERT INTO stock_inventory SET store_id='$store_id', `date`='$curdate', item_id='$item_id', qty='$qty', chalan_no='$chalan', depo_user_id='$user_id'";
    mysqli_query($con, $sql);
}

if(mysqli_error($con))
{
    echo "Data base error occured";
}
else
{
    echo $i . " rows added";
}
?>