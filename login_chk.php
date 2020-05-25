<?
if($_SESSION['AdmID'])
{
	echo "<script>location.href='dashboard.php'</script>";
	exit;
}
if($_COOKIE['adm'] && !$log)
{
	$cokid=$_COOKIE['adm'];
	session_register("AdmID");
	$rrr=$_SESSION["AdmID"]=$cokid;
	echo "<script>location.href='dashboard.php'</script>";
}
 
else
{
	
}
?>