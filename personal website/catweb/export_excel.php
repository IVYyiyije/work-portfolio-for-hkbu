<?php

	  require_once "Classes/PHPExcel.php";
	  require_once "Classes/PHPExcel/IOFactory.php";
	  require_once "Classes/PHPExcel/Reader/Excel5.php";
	  
header('Content-type: text/html; charset=utf-8');
header("Content-type:application/vnd.ms-excel");
header("Content-Disposition:filename=翻译文档.xls");

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
$sql = "SELECT * FROM translate_text";
$result = mysqli_query($conn,$sql);
echo "ID号\t中文\t英文\t\n";
while ($row = mysqli_fetch_array($result)){
    echo $row[0]."\t".$row[1]."\t".$row[2]."\t\n";
}
?>