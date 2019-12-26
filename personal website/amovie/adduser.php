<?php

$username = $_POST["username"];
$password = $_POST["password"];

$dbhost = "localhost";  
$dbuser = "root";      
$dbpass = ""; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
	die("Could not connect: " . mysqli_error());
}


$sql = "INSERT INTO `user`(`UserName`,`UserCode`) VALUES('$username','$password')";

mysqli_select_db( $conn,"amovie" );
mysqli_query($conn,"set names 'utf8'");	
			
$insert = mysqli_query( $conn, $sql );


if(! $insert )
	{
		die('无法插入数据: ' . mysqli_error($conn));
	}
	else
	{
		echo "<script>location='login.html'</script>";

	}

mysqli_close($conn);
?>