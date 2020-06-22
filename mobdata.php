<?php 
ob_start();


header('Access-Control-Allow-Origin: *');

include("connect.php");			

if(is_array($_GET))

{
foreach($_GET as $var=>$valu)
{
//grabs the $_GET variables and adds slashes
$$var = addslashes($valu);
}
}
$curdate=date("y-m-d");

if($action=='comp')

//select query to get the values
{
 

echo GetName('stores','name','id',$sid);

}

if($act=='addr')

//select query to get the values
{

echo GetName(users,address,email,$email);

}
if($act=='city')

//select query to get the values
{

echo GetName(users,city,email,$email);

}
if($act=='state')

//select query to get the values
{

echo GetName(users,state,email,$email);

}
if($act=='con')

//select query to get the values
{

echo GetName(users,country,email,$email);

}

if($action=='sot')

 
//select query to get the values
{

echo "100";
//echo GetCount(loads);

}

if($action=='sit')

//select query to get the values
{
echo "100";
//echo GetCount(warrants);

}

if($action=='totstk')

//select query to get the values
{
echo "100";
//echo GetCount(bundles);
}

if($action=='brand')

//select query to get the values
{
echo GetCombo("Brand","brands","id","name","","name","id");
}

if($action=='wtype')

//select query to get the values
{

echo GetCombo("Wine Type","variants_type","id","name","","name","id");
}

if($action=='wname')

//select query to get the values
{

echo GetCombo("Item Name","items","id","item_name","","item_name","id");
}

if($act=='wr')

//select query to get the values
{

echo GetCombo("Warrant","warrants","id","warrant_no","","id","$wd");

}

if($act=='br')

//select query to get the values
{
echo GetCombo("Brand","brands","id","name","","id","id");
}

if($act=='lo')

//select query to get the values
{
echo GetCombo("Location","location","id","name","","id","id");
} 

if($act=='tlw')

//select query to get the values
{
$result = mysql_query("SELECT SUM(list_w) AS value_sum FROM bundles where warrant_id='$w'"); 
$row1 = mysql_fetch_assoc($result); 
echo $sum = $row1['value_sum'];
} 
if($act=='tsw')

//select query to get the values
{
$result = mysql_query("SELECT SUM(scale_w) AS value_sum FROM bundles where warrant_id='$w'"); 
$row1 = mysql_fetch_assoc($result); 
echo $sum = $row1['value_sum'];
} 

 

if($action=='stockreqrep')

{
echo "<script>
	$(document).ready(function($) {
		$('.menu').find('h3').click(function(){

			//Expand or collapse this panel
			$(this).next().slideToggle('fast');

			//Hide the other panels
			$('.content').not($(this).next()).slideUp('fast');

		});
	});
</script>";
$sqlload="SELECT * FROM stock_request WHERE store_id='$storeid' AND accepted='N'";
$seload=mysqli_query($con,$sqlload);
$totrows=mysqli_affected_rows($con);
?>
<table>
    <thead>
        <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Qty</th>
			<th>Approved</th>
        </tr>
    </thead>
    <tbody>
	<?php
 
while($resultload=mysqli_fetch_object($seload))
 
{ ?>
        <tr> 
            <th><? echo stripslashes($resultload->date); ?></th>
            <td><? echo GetName('items','item_name','id',$resultload->item_id); ?> </td>
            <td><? echo stripslashes($resultload->qty); ?></td>
			<td><? echo stripslashes($resultload->accepted); ?></td>
        </tr>
         <?php } ?>
    </tbody>
</table>



<?php  } ?>