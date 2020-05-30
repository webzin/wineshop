
<?php header('Access-Control-Allow-Origin: *');
include("connect.php");					


$sqlSelectclient="SELECT * FROM stock_in group by item_id";
$selectclient=mysqli_query($con,$sqlSelectclient);
$totrows=mysqli_affected_rows($con);
while($resultclient=mysqli_fetch_object($selectclient))
{

$tsin=TotalStockInBystore('stock_in', 'qty', 'store_id', $resultclient->store_id, 'item_id', $resultclient->item_id);
//echo "<br>";
$tsout=TotalStockOutBystore('stock_out', 'qty', 'store_id', $resultclient->store_id, 'item_id', $resultclient->item_id);
//echo "<br>";
$ts=$tsin - $tsout;
 
$vname = GetName('items','type_id','id',$resultclient->item_id);


$insquery="INSERT INTO `govt_report`(`store_id`,`variant_type_id`,`total_stock`) values ($resultclient->store_id, $vname, $ts )";	 
$runc1=mysqli_query($con,$insquery);

 }
 
 echo "Report Generated";
?>	 