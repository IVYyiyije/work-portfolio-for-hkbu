<?php

$Name= $_POST["Name"];
$Email = $_POST["Email"];
$Telephone= $_POST["Telephone"];
$Subject= $_POST["Subject"];
$Message= $_POST["Message"];

$dbhost = "localhost";  
$dbuser = "root";      
$dbpass = ""; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
	die("无法连接: " . mysqli_error());
}


$sql = "INSERT INTO `contact`(`Name`,`Email`,`Telephone`,`Subject`,`Message`) VALUES('$Name','$Email','$Telephone','$Subject','$Message')";

mysqli_select_db( $conn,"amovie" );
mysqli_query($conn,"set names 'utf8'");				
$insert = mysqli_query( $conn, $sql );

if(! $insert )
	{
		die('联系失败！ ' . mysqli_error($conn));
	}
	else
	{
		echo "您已成功发送信息！\n";
	}

mysqli_close($conn);
?>