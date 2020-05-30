<?php

function GetName($tablename,$field,$where,$id)
{	
 	global $con;
	$uquery="SELECT * FROM $tablename WHERE $where=$id";
	$uresult=mysqli_query($con,$uquery);
	$urow=mysqli_fetch_object($uresult);
	mysqli_error($con);
	$newval=stripslashes( $urow->$field);
 	return $newval;
	 
}

function GetRand($tablename,$field,$limit)
{	
 	global $con;
	$uquery= mysqli_query($con,"SELECT * FROM $tablename ORDER BY RAND() LIMIT 0,$limit");
	$urow=mysqli_fetch_object($uquery);
	mysqli_error($con);
	$newval=stripslashes( $urow->$field);
 	return $newval;
}

function GetTotal($tablename,$where,$name)
{
	global $con;
 	//echo $dd="SELECT count(*) as total FROM `$tablename` WHERE $where='$name'";
	$uquery=mysqli_query($con,"SELECT count(*) as total FROM `$tablename` WHERE $where='$name'");
	$uresult=mysqli_fetch_assoc($uquery);
	//mysqli_error($con);
	$row_total= $uresult['total'];	
	return $row_total;
}

function SumTotal($tablename, $columnname)
{
	global $con;
	$uquery="SELECT SUM($columnname) AS value_sum FROM $tablename ";
	$uresult=mysqli_query($con,$uquery);
	$urow=mysqli_fetch_assoc($uresult);
	//echo mysqli_error();
	$newval = $urow['value_sum'];
	return $newval;
}

function TotalStockInBystore($tbl, $colm, $whre, $cond, $whre2, $cond2)
{
	global $con;
	$uquery="SELECT COALESCE(SUM($colm),0) AS value_sum FROM $tbl WHERE $whre='$cond' AND $whre2='$cond2'";
	$uresult=mysqli_query($con,$uquery);
	$urow=mysqli_fetch_assoc($uresult);
	//echo mysqli_error();
	$newval = $urow['value_sum'];
	return $newval;
}

function TotalStockOutBystore($tbl, $colm, $whre, $cond, $whre2, $cond2)
{
	global $con;
 	$uquery="SELECT COALESCE(SUM($colm),0) AS value_sum FROM $tbl WHERE $whre='$cond' AND $whre2='$cond2'";
	$uresult=mysqli_query($con,$uquery);
	$urow=mysqli_fetch_assoc($uresult);
	//echo mysqli_error();
	$newval = $urow['value_sum'];
	return $newval;
}


 
function GetCount($tablename)
{
	global $con;
	$uquery="SELECT * FROM $tablename ";
	$uresult=mysqli_query($con,$uquery);
	//echo mysqli_error();
	$row_total=mysqli_num_rows($uresult);
	return $row_total;
}

function MaxValue($tablename,$field,$where,$name)
{
	global $con;
	$uquery= mysqli_query($con,"SELECT $field FROM `$tablename` WHERE $where='$name' ORDER BY $field DESC LIMIT 0,1");
	$urow=mysqli_fetch_object($uquery);
	mysqli_error($con);
	$newval=stripslashes( $urow->$field);
 	return $newval;
}
function MinValue($tablename,$field,$where,$name)
{
	global $con;
	$uquery= mysqli_query($con,"SELECT $field FROM `$tablename` WHERE $where='$name' ORDER BY $field ASC LIMIT 0,1");
	$urow=mysqli_fetch_object($uquery);
	mysqli_error($con);
	$newval=stripslashes( $urow->$field);
 	return $newval;
}


function GetImg($tablename,$field,$where,$id,$fet,$ft)
{
	$uquery="SELECT * FROM $tablename WHERE $where='$id' and $fet='$ft'";
	$uresult=mysql_query($uquery);
	$urow=mysql_fetch_object($uresult);
	echo mysql_error();
	$newval=stripslashes($urow->$field);
	return $newval;
}
// Get Value in combo box from any table GetCombo(select one, tablename,value field name,display field name,where clause optional,orderby,selected value optional)

function GetCombo($display,$tablename,$fieldname,$disfieldname,$where,$orderby,$selected)
{	
	global $con;
	$hrquery="SELECT * FROM $tablename";
	
	if($where)
	{
		$hrquery.=" WHERE $where";
	}
	$hrquery.=" ORDER BY $orderby";
	
	$hrresult=mysqli_query($con,$hrquery);
	$hrtotalrow=mysqli_affected_rows($con);
	
	if($display)
		$Getval="<option value=''>Select $display</option>";
	
	
	for($hr=0;$hr<$hrtotalrow;$hr++)
	{
		$hrrow=mysqli_fetch_object($hrresult);
		$newval=stripslashes(ucfirst($hrrow->$disfieldname));
		$val=$hrrow->$fieldname;

		if($val==$selected)
			$sel="selected";
		else
			$sel="";
		
		$Getval.="<option value='$val' $sel>$newval</option>";
	}
	return $Getval;
}
function generateHash()
{
	$pre_hash=time().rand().$GLOBALS['REMOTE_ADDR'].microtime();

	$session_hash = md5($pre_hash);
     	$hash = substr(md5($session_hash.time()),0,16);

	return $hash;
}
function getCountry($cid="")
{	
	$cntQuery="select * from country ORDER BY name";
	$cntResult=mysql_query($cntQuery);
	if($cntResult)
	{
		while($cntRow=mysql_fetch_object($cntResult))
		{
			if($cid == $cntRow->name)
				$cntOption.="<option value='$cntRow->name' selected>$cntRow->name</option>";
			else
				$cntOption.="<option value='$cntRow->name'>$cntRow->name</option>";
		}
		return $cntOption;
	}
	else
		echo mysql_error();
}

function selchk($val,$nsel)
{
for($es=0;$es<count($nsel);$es++)
		{
			if($val==$nsel[$es])
			{
				$sel="checked";
				break;
			}
			else
			{
				$sel="";
			}
		}
	
	return $sel;
}
// Return Array of Checkbox

// GetCheckBox(tablename,valuefield,displayfield,where clause,order by,selected)

function GetCheckBox($name,$tablename,$valfield,$disfield,$where,$orderby,$selected)
{
	$fcquery="SELECT * FROM $tablename";
	
	if($where)
		$fcquery.=" WHERE $where";
	
	if($order)
		$fcquery.=" ORDER BY $orderby";
	
	$fcresult=mysql_query($fcquery);
	$fctotalrow=mysql_affected_rows();
	
	$nsel=explode(",",$selected);
	
	for($fc=0;$fc<$fctotalrow;$fc++)
	{
		$fcrow=mysql_fetch_object($fcresult);
		
		$val=$fcrow->$valfield;
		$disval=" ".ucfirst($fcrow->$disfield);
		
		for($es=0;$es<count($nsel);$es++)
		{
			if($val==$nsel[$es])
			{
				$sel="checked";
				break;
			}
			else
			{
				$sel="";
			}
		}
		
		if($fc%2==0)
			$GetVal.="</tr><tr>";
		
		$GetVal.="<td width=45%><input type=checkbox class=noborder name=$name value='$val' $sel>$disval</td>";
	}
	return $GetVal;
}

/*Code for Encryption and Decryption password*/

function encrypt($string, $key) { 
$result = ''; 
for($i=0; $i<strlen($string); $i++) { 
$char = substr($string, $i, 1); 
$keychar = substr($key, ($i % strlen($key))-1, 1); 
$char = chr(ord($char)+ord($keychar)); 
$result.=$char; 
} 

return base64_encode($result); 
} 

function decrypt($string, $key) { 
$result = ''; 
$string = base64_decode($string); 

for($i=0; $i<strlen($string); $i++) { 
$char = substr($string, $i, 1); 
$keychar = substr($key, ($i % strlen($key))-1, 1); 
$char = chr(ord($char)-ord($keychar)); 
$result.=$char; 
} 

return $result; 
} 
/*encryption Decryption cose ends here*/

/*encryption Decryption1 cose starts here*/
/** Class for encryption and decryption of the text. This is a simple class which returns the numeric encryption of the text. 
**It can be further optimised to give better encryption output. 
**Saji Nair 
**/ 
    class Encryption{ 
    var $key; 
    var $text; 
    
    function Encryption(){ 
        $this->key="JSInfowayKey"; /// key to encrypt with 
    } 
    
/**Function to encrypt the text using the key. 
** Returns numeric values for each character concatinated togather. 
**Saji Nair 
**/ 
   function encrypt(){ 
       $lenText=strlen($this->text); 
       $lenKey=strlen($this->key); 
       $str=""; 
       $j=0; 
       for($i=0;$i<$lenText;$i++,$j++){ 
           if($j==$lenKey){ 
               $j=0; 
           }    
           $val=(ord($this->text[$i])*2)+ord($this->key[$j]); 
        $str.=$val;    
       } 
       return $str; 
   } 


/**Function to encrypt the text using the key. 
** Returns the text from the encrypted numeric value. 
**Saji Nair 
**/ 
   function decrypt(){ 
   //    $this->text=explode("##",$this->text); 
   $temp=$this->text; 
   $temptext=array(); 
   $templen=strlen($temp); 
   for($i=0,$j=0;$i<$templen;$i=$i+3,$j++){ 
       $temptext[$j]=substr($this->text,$i,3); 
   } 
       $lenText=count($temptext); 
       $lenKey=strlen($this->key); 
       $str=""; 
        
       for($i=0,$j=0;$i<$lenText;$i++,$j++){ 
           if($j==$lenKey){ 
               $j=0; 
           }    
           $val=$temptext[$i]-ord($this->key[$j]); 
           $val=$val/2; 
           $str.=chr($val); 
       } 
       return $str; 
   } 
   
} 
function is_valid_email($email) {
	$result = TRUE;
	if(!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email)) {
		$result = FALSE;
	}
}
 function SendHTMLMail($to,$subject,$mailcontent,$from)
{
    $limite = "_parties_".md5 (uniqid (rand()));
    $headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $headers .= "From: $from\r\n";
    mail($to,$subject,$mailcontent,$headers);
	
}
/*encryption Decryption1 cose ends here*/

 
function randomPassword() {
    $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
 
function mysql_get_var($query,$y=0){
       $res = mysqli_query($con,$query);
       $row = mysqli_fetch_array($res);
       mysqli_free_result($res);
       $rec = $row[$y];
       return $rec;
}
 
 
 
 
?>
 
 