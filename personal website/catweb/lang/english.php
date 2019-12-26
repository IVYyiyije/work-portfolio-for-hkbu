<?php
//include "../config.php";
mysqli_select_db($conn,DB_DATABASE);
mysqli_query($conn, "set names 'utf8'");

$sql = "SELECT * FROM lang";
$huoqu = mysqli_query($conn,$sql);
$lang=array();
while ($row = mysqli_fetch_array($huoqu)) 
{  
	
	//echo "\$lang['".$row['title']."']='".$row['string_zh']."';"."<br>";
	
	/*echo "<tr>";
	echo "<td>".$row['page']."</td>";
	echo "<td>".$row['zh_CN']."</td>";
	echo "<td>".$row['en_US']."</td>";
	echo "</tr>";
	echo "<br>";*/
	$variable=$row['title'];
	$zh=$row['en_US'];
	$lang[$variable]=$zh;	
	
} 
//print_r($lang);
?>