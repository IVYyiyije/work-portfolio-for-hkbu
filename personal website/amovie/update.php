<?php

//$zh_CN = $_POST["zh_CN"];
$translation = $_POST["translation"];
$tid = $_POST["tid"];


$dbhost = "localhost";  
$dbuser = "root";      
$dbpass = ""; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
	die("Could not connect: " . mysqli_error());
}

$sql = "UPDATE `script` SET `UserTrans`='{$translation}' WHERE `ScriptID`='{$tid}'";



mysqli_select_db( $conn,"amovie" );
mysqli_query($conn,"set names 'utf8'");				

$update = mysqli_query( $conn, $sql );

if(! $update )
	{
		die('无法更新数据: ' . mysqli_error($conn));
	}
	else
	{
		 echo "<script>location='MyFavorite.php'</script>";
	}

mysqli_close($conn);
?>