<?php 
ob_start();


header('Access-Control-Allow-Origin: *');

include("connect.php");			
$act=$_GET['action'];
$email=$_GET['email'];
$w=$_GET['wr'];
$l=$_GET['ld'];
$wd=$_GET['wd'];


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

if($act=='lc')

 
//select query to get the values
{

echo GetCount(loads);

}

if($act=='wc')

//select query to get the values
{

echo GetCount(warrants);

}

if($act=='bc')

//select query to get the values
{

echo GetCount(bundles);
}

if($act=='cn')

//select query to get the values
{
echo GetCombo("Customer","users","id","compname","type='C'","compname","id");
}

if($act=='bu')

//select query to get the values
{

echo GetCombo("Building","building","id","name","","id","id");
}

if($act=='ld')

//select query to get the values
{

echo GetCombo("Load","loads","id","order_no","","id","$l");
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

if($act=='loaddata')


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
$sqlload="SELECT * FROM loads";
$seload=mysql_query($sqlload);
$totrows=mysql_affected_rows();
?>
  

 
<?php
$i=0;
while($resultload=mysql_fetch_object($seload))
{
?>

<div class="menu">
<h3><? echo stripslashes($resultload->order_no); ?></h3>

<div class="content">
<h4>date</h4>
<p><? echo stripslashes($resultload->arrival_date); ?></p>
<h4>customer name</h4>
<p><? echo GetName(users,compname,id,$resultload->customer_id) ?></p>
<h4>Veichle Number</h4>
<p><? echo stripslashes($resultload->vech_no); ?></p>
<h4>Building</h4>
<p><? echo GetName(building,name,id,$resultload->building) ?></p>
</div>
</div>
<?php } ?>

 
<?php }  

if($act=='warrantdata')

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
$sqlload="SELECT * FROM warrants";
$seload=mysql_query($sqlload);
$totrows=mysql_affected_rows();
?>


<?php
$i=0;
while($resultload=mysql_fetch_object($seload))
{
?>
<div class="menu"> 
<h3><? echo stripslashes($resultload->warrant_no); ?></h3>
<div class="content">

<h4>date</h4>
<p><? echo stripslashes($resultload->w_date); ?></p>
<h4>customer name</h4>
<p><? echo GetName(users,compname,id,$resultload->customer_id) ?></p>
<h4>Order Number</h4>
<p><? echo GetName(loads,order_no,id,$resultload->load_id) ?></p>
<h4>Veichle No</h4>
<p><? echo GetName(loads,vech_no,id,$resultload->load_id) ?></p>
</div>
</div>
<?php } ?>


<?php }
if($act=='bundledata')

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
$sqlload="SELECT * FROM bundles";
$seload=mysql_query($sqlload);
$totrows=mysql_affected_rows();
?>

<?php
$i=0;
while($resultload=mysql_fetch_object($seload))
{
?>
<div class="menu"> 
<h3><? echo stripslashes($resultload->batch_id); ?></h3>
<div class="content">
<h4>date</h4>
<p><? echo stripslashes($resultload->arrival_date); ?></p>
<h4>Order Number</h4>
<p><? echo GetName(loads,order_no,id,$resultload->load_id) ?></p>
<h4>Veichle Number</h4>
<p><? echo GetName(loads,vech_no,id,$resultload->load_id) ?></p>
<h4>Warrant Number</h4>
<p><? echo GetName(warrants,warrant_no,id,$resultload->warrant_id) ?></p>
<h4>Brand</h4>
<p><? echo GetName(brands,name,id,$resultload->brand) ?></p>
<h4>Pieces</h4>
<p><? echo stripslashes($resultload->pieces); ?></p>
<h4>Weight</h4>
<p><? echo stripslashes($resultload->list_w); ?></p>
<h4>Location</h4>
<p><? echo GetName(location,name,id,$resultload->location) ?></p>
</div>
</div>
<?php } ?>


<?php }

if($act=='loadrep')

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
$sqlload="SELECT * FROM loads";
$seload=mysql_query($sqlload);
$totrows=mysql_affected_rows();
?>

<?php
$i=0;
while($resultload=mysql_fetch_object($seload))
{
?>
<div class="menu"> 
<h3><? echo stripslashes($resultload->order_no); ?></h3>
<div class="content">

<h4>Total Warrants</h4>
<p><? echo GetTotal(warrants,load_id,$resultload->id); ?></p>
<h4>Total Bundles</h4>
<p><? echo GetTotal(bundles,load_id,$resultload->id); ?></p>
<h4>Total Weight</h4>
<p>
<?php 
$sql = mysql_query("SELECT SUM(list_w) as total FROM bundles where load_id='$resultload->id'");
$row = mysql_fetch_array($sql);
echo $sum = $row['total'];

?>
</p>
<h4>Total Pieces</h4>
<p>
<?php 
$sql = mysql_query("SELECT SUM(pieces) as total FROM bundles where load_id='$resultload->id'");
$row = mysql_fetch_array($sql);
echo $sum = $row['total'];

?>
</p>
<h4>Building</h4>
<p> 
<?php 
$bid=GetName(loads,building,id,$resultload->id);
echo GetName(building,name,id,$bid); 
?>
</p>
<h4>Locations</h4>
<p>
<?php 
$result= mysql_query("SELECT `location` FROM `bundles` WHERE `load_id`='$resultload->id' ");
while($row = mysql_fetch_assoc($result)){
$lid=$row["location"];
echo GetName(location,name,id,$lid);
echo ' ';
}

?>
</p>
</div>
</div>
<?php } ?>


<?php }

if($act=='warrep')

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
$sqlload="SELECT * FROM warrants";
$seload=mysql_query($sqlload);
$totrows=mysql_affected_rows();
?>

<?php
$i=0;
while($resultload=mysql_fetch_object($seload))
{
?>
<div class="menu"> 
<h3><? echo stripslashes($resultload->warrant_no); ?></h3>
<div class="content">

<h4>Company Name</h4>
<p><? echo GetName(users,compname,id,$resultload->customer_id) ?></p>
<h4>Total Bundles</h4>
<p><? echo GetTotal(bundles,warrant_id,$resultload->id); ?></p>
<h4>Total Weight</h4>
<p>
<?php 
$sql = mysql_query("SELECT SUM(list_w) as total FROM bundles where warrant_id='$resultload->id'");
$row = mysql_fetch_array($sql);
echo $sum = $row['total'];

?>
</p>
<h4>Total Pieces</h4>
<p>
<?php 
$sql = mysql_query("SELECT SUM(pieces) as total FROM bundles where warrant_id='$resultload->id'");
$row = mysql_fetch_array($sql);
echo $sum = $row['total'];

?>
</p>
<h4>Building</h4>
<p> 
<?php 
$bid=GetName(loads,building,id,$resultload->id);
echo GetName(building,name,id,$bid); 
?>
</p>
<h4>Locations</h4>
<p>
<?php 
$result= mysql_query("SELECT `location` FROM `bundles` WHERE `warrant_id`='$resultload->id' ");
while($row = mysql_fetch_assoc($result)){
$lid=$row["location"];
echo GetName(location,name,id,$lid);
echo ' ';
}

?>
</p>
</div>
</div>
<?php } ?>


<?php }
?>