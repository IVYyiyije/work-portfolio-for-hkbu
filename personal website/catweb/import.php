
<?php
$dbhost = 'localhost:3306';  //mysql服务器主机地址
   $dbuser = 'root';      //mysql用户名
   $dbpass = '';//mysql用户名密码
  




if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  /*echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"]. "<br />";*/
  if (file_exists("upload/" . $_FILES["file"]["name"]))
      {
      echo '<script>alert("文件已存在\n")
			onclick=window.location.href="index2.php";</script>';
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
	  
	  $file_name = "upload/" . $_FILES["file"]["name"];
      //echo "Stored in: " . $file_name;
	  
	$str = file_get_contents($file_name);
	$str_encoding = mb_convert_encoding($str, 'UTF-8', 'UTF-8,GBK,GB2312,BIG5');
	//转换字符集（编码）

	$sens = trim($str_encoding);
	//$sens = str_replace(array("\r", "\n", "\r\n"),'<!!>',$sens);
	$sens = str_replace(PHP_EOL,'<!!>',$sens);
	//$sens = str_replace("·",'',$sens);
	//$sens = str_replace("，",'<!!>',$sens);
	$sens = str_replace("。",'。<!!>',$sens);
	$sens = str_replace("。<!!>）",'。）<!!>',$sens);
	$sens = str_replace("？",'？<!!>',$sens);
	//$sens = str_replace("、",'<!!>',$sens);
	//$sens = str_replace(array("\r", "\n", "\r\n"),'<!!>',$sens);
	$sens = str_replace("……",'……<!!>',$sens);
	//$sens = str_replace("：",'<!!>',$sens);
	//$sens = str_replace("——",'<!!>',$sens);
	//$sens = str_replace("—",'<!!>',$sens);
	//$sens = str_replace("“",'',$sens);
	//$sens = str_replace("”",'',$sens);
	$sens = str_replace("！",'！<!!>',$sens);
	//$sens = str_replace("；",'<!!>',$sens);

	$keywords = preg_split("/[<!!>]+/", $sens);
	$keywords = array_filter($keywords);
	$sum = 0;

	/*echo "
			<div class=\"table-responsive\">
			<table class=\"table table-bordered\">
				<caption>句长统计结果</caption>
				<thead>
				<tr>
					<th>序号</th>
					<th>句子</th>
				</tr>
				</thead>
				<tbody>
		";*/
	$id = 1;
	foreach ($keywords as $key=>$sword)
	{
		$sword = str_replace("“",'',$sword);
		$sword = str_replace("”",'',$sword);
		$sword = str_replace("＂",'',$sword);
		if(!$sword)
		{
			unset( $keywords[$key] );
		}
		else
		{
			
			/*echo "<tr><td>";
			echo $id;
			echo "</td><td>";
			echo $sword;
			echo '导入成功';*/
			
			//存入数据库
			$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
			if(! $conn )
			{
			 die("Could not connect: " . mysqli_error());
			}

			// 设置编码，防止中文乱码
			mysqli_select_db($conn,'stiterm');
			mysqli_query($conn , "set names utf8");


			$sql = "INSERT INTO `translate_text`(`zh_CN`) VALUES('$sword')";
			$insert = mysqli_query( $conn, $sql );
			if(! $insert )
			  {
			    die('无法插入数据: ' . mysqli_error($conn));
			  }
			  else
			  {
			    // echo "<script>alert('添加成功！')</script>"; 
			  }
			  mysqli_close($conn);
			//if(empty($sword)) echo '空的';
			//else echo '不是空的';
			//echo "</td><td>";
			$char = "，。、！？：；﹑•＂…‘’“”〝〞∕¦‖—　〈〉﹞﹝「」‹›〖〗】【»«』『〕〔》《﹐¸﹕︰﹔！¡？¿﹖﹌﹏﹋＇´ˊˋ―﹫︳︴¯＿￣﹢﹦﹤‐­˜﹟﹩﹠﹪﹡﹨﹍﹉﹎﹊ˇ︵︶︷︸︹︿﹀︺︽︾ˉ﹁﹂﹃﹄︻︼（）";

			$pattern = array(
				"/[[:punct:]]/i", //匹配全部英文标点符号，不区分大小写
				'/['.$char.']/u', //匹配中文标点符号，按UTF-8编码匹配
				"/[[:alnum:]]/", //匹配所有数字
				"/[[:space:]]/", //匹配所有空格
							);

			$str = preg_replace($pattern, '', $sword);
			
			// echo mb_strlen($str, "utf8");
			echo "</td></tr>";
			$sum = $sum + mb_strlen($str, "utf8");
			$id=$id+1;
			}
	
    }
	  
	echo "
		</tbody></table></div>
						";
	//echo "这篇文章的总中文字数为： ".$sum."<br />";
	//echo "这篇文章的中文句子总数为： ".count($keywords)."<br />";
	// echo "这篇文章的平均句长为： ".$sum / count($keywords);
	
	echo '<script>alert("这篇文章的总中文字数为：'.$sum.'\n这篇文章的中文句子总数为： '.count($keywords).'\n")
			onclick=window.location.href="index2.php";</script>';

	//print_r($keywords);
		
	  }
  }
  

?>