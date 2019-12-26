<?php

//include "baidu_transapi.php";

//连接数据库
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

$source = $_POST["yaochulideyuanwen"];


//$searchterm='英国';//$_POST['searchterm'];
$sql = "SELECT * FROM termbase";
   $result="";
   mysqli_select_db($conn,"stiterm");
   mysqli_query($conn, "set names 'utf8'");
   $huoqu = mysqli_query($conn,$sql);
   $i=0;
	echo'<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>原文</th>
			<th>译文</th>
			<th>来源</th>
		</tr>
	</thead>
		<tbody>';
		
	while($row = mysqli_fetch_array($huoqu)){
						++$i;
						//$ii="'".$row['def_term']."'";
						if (strpos($source,$row['zh_CN']) !==false){
						echo'<tr class="table-warning" id="'.$i.'" onclick="change1('.$i.')">';
						echo'<td>'.$row['zh_CN'].'</td>';
						echo'<td>'.$row['en_US'].'</td>';
						echo'<td>'.$row['Source'].'</td>';
						echo'</tr>';	
						}						
						}
					
						;
		//$huoqu1 = mysqli_query($conn,$sql);
		//while($row1 = mysqli_fetch_array($huoqu1, MYSQLI_ASSOC)){
		//
		//}
		
	echo'</tbody>
	</table>';

?>