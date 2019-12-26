
<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'stiterm');
$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

if(! $conn )
{
	die("Could not connect: " . mysqli_error());
}

mysqli_query($conn, "set names 'utf8'");

//从另一个文件中获取操作指令

$method = $_SERVER["REQUEST_METHOD"];//$_SERVER是一个超全局变量，$_SERVER["REQUEST_METHOD"]用于返回访问页面使用的请求方法，比如GET或POST都是请求的方法。

if($method == "GET") //查看访问页面使用的方式是否是GET
{
	
	
	$sql = "SELECT * FROM `translate_text` ORDER BY id";
	$huoqu = mysqli_query($conn,$sql);
	mysqli_query($conn, "set names 'utf8'");			
	while ($row = mysqli_fetch_array($huoqu)) 
	{  
		$output[] = array(
			"id" => $row["id"],
			"zh_CN" => $row["zh_CN"],
			"en_US" => $row["en_US"],
		
 		
		);
	} 
	//print_r($output);
	echo json_encode($output);
	
}

if($method == "POST")
{
	$zh_CN = $_POST['zh_CN'];
	$en_US = $_POST['en_US'];

	
	$sql = "INSERT INTO `translate_text` (`zh_CN`, `en_US`) VALUES ('$zh_CN', '$en_US'`)";
	mysqli_select_db( $conn,"stiterm" );
	mysqli_query($conn,$sql);
 
}

if($method == "PUT")
{	parse_str(file_get_contents("php://input"), $_PUT);
	$id    = $_PUT['id'];
	$zh_CN = $_PUT['zh_CN'];
	$en_US = $_PUT['en_US'];

	
	$sql = "UPDATE `translate_text` SET zh_CN = '$zh_CN', en_US = '$en_US' WHERE id = '$id'";
	mysqli_select_db( $conn,"stiterm" );
	mysqli_query($conn,$sql);
 
}

if($method == "DELETE")
{	parse_str(file_get_contents("php://input"), $_DELETE);
	$id    = $_DELETE['id'];
	
	$sql = "DELETE FROM `translate_text` WHERE id = '$id'";
	mysqli_select_db( $conn,"stiterm" );
	mysqli_query($conn,$sql);
 
}


?>