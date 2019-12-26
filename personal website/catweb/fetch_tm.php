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



$source = $_POST["yaochulideyuanwen"];
//$sql = "SELECT * FROM tm WHERE `zh_CN` LIKE '%$source%'";
$sql = "SELECT * FROM tm";
   $result="";
   mysqli_select_db($conn,"stiterm");
   mysqli_query($conn, "set names 'utf8'");
   $huoqu = mysqli_query($conn,$sql);

$i=0;
while ($row = mysqli_fetch_array($huoqu)) {  
++$i;
if (strpos($source,$row['zh_CN']) !==false){
similar_text($source, $row["zh_CN"], $percent); 
	echo "<table class='table table-bordered table-hover'>
	<thead>
		<tr>
			<th>原文</th>
			<th>译文</th>
			<th>相似度</th>
		</tr>
	</thead>
	<tbody>
			  <tr class='table-danger' id=".$i." onclick='change1(".$i.")'>
            
			<td>".$row['zh_CN']."</td>
              <td>".$row['en_US']."</td>
			  <td>".$percent."%</td>
             </tr> 
	</tbody>
	</table>";
}  
};
/*while(!($row = mysqli_fetch_array($huoqu))){
	echo "<table class='table table-bordered table-hover'>
	<thead>
		<tr>
			<th>原文</th>
			<th>译文</th>
			<th>相似度</th>
		</tr>
	</thead>
	NOT FOUND!</table>";
}*/
?>