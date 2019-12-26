<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Amovie</title>
 <link rel="stylesheet" href="css/nav_menu3.css" type="text/css" media="all" />
<!--<link rel=stylesheet type="text/css" href="css/weilei.css">
<link rel=stylesheet type="text/css" href="css/daohang.css">
<link rel=stylesheet type="text/css" href="css/gongjulan.css">-->
<link rel=stylesheet type="text/css" href="css/amovie.css">
  <link rel="stylesheet" href="css/teachers.css">
  <link rel="stylesheet" href="css/base.css">
<style type="text/css">
.banner{
	width:100%;
    align:center}
	
.right{
	width:30%;
	height:40%;
	border-style:dashed;
	padding:20px;
	float:right;
	position:relative;
	}
#right_1{
	top:40px;
	left:-50px;
	}
#right_2{
	top:330px;
	left:200px;
	}

#log{position:absolute;left:1000px;top:380px;font-size:24px;}
#log a:link {
	color: #FF0
}
#log a:visited {
	color: #CF9;
}
#log a:hover
{
	color: #FFFFFF;
	position: relative;
	right: 2px;
	top: 3px;
}
#log a:active {
	color: #FF0000
}
</style>

</head>
<body> 
<img style="width:100%;align="center;" src="pic/3.jpg">
<div class="amovie"><center><h1>爱慕影</h1></center></div>
<?php
if(isset($_COOKIE['username'])){
       $username=$_COOKIE['username'];
echo '<span id="log"><a href="logout.php">'.$username.'</a></span>';
}
else{
echo '<span id="log"><a href="login.html">登录</a></span>';

	}?>

<hr>

<div class="nav_menu3">
	<ul>
		<li class='nav-has-sub'><a href='index.php'>首页</a>
		</li>
		<li class='nav-has-sub'><a href='about.php'>关于我们</a>
        				<ul>
				   <li><a href='contact.php'>联系我们</a></li>
				  
		  </ul>
		</li>
			 <li class='nav-has-sub'><a href='archive.php'>电影简介</a>
				<ul>
				   <li><a href='archive.php'>中文电影</a></li>
				   <li><a href='archive_en.php'>英文电影</a></li>
		  </ul>
	   </li>
	   <li class='nav-has-sub'><a href='MyFavorite.php'>我的收藏</a>
、

		</li>
	   <li class='nav-has-sub'><a href='puzzle.html'>游戏环节</a>
			<ul>
				<li><a href='puzzle.html'>拼拼电影</a></li>
                <li><a href='guess.php'>猜猜剧照</a></li>
          
			</ul>
		</li>


	
	</ul>

</div>
<?php
    
  

$id = $_GET["id"];
$UserID = $_COOKIE["UserID"];
$dbhost = "localhost";  
$dbuser = "root";      
$dbpass = ""; 
$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
	die("Could not connect: " . mysqli_error());
}

//$sql_en = "INSERT INTO `biterm`(`en_US`) VALUES('$en_US') ";
//$sql_zh = "INSERT INTO `biterm`(`zh_CN`) VALUES('$zh_CN') ";
$sql = "INSERT INTO `script`(`ScriptID`,`UserID`) VALUES('$id','$UserID')";

mysqli_select_db( $conn,"amovie" );
mysqli_query($conn,"set names 'utf8'");				
//$insert_en = mysqli_query( $conn, $sql_en );
//$insert_zh = mysqli_query( $conn, $sql_zh );
$insert = mysqli_query( $conn, $sql );

//if(! $insert_en )
//	{
//		die('无法插入英文数据: ' . mysqli_error($conn));
//	}
//	else
//	{
//		echo "英文数据插入成功\n";
//	}
//	
//if(! $insert_zh )
//	{
//		die('无法插入中文数据: ' . mysqli_error($conn));
//	}
//	else
//	{
//		echo "中文数据插入成功\n";
//	}
$MovieID=$_COOKIE['MovieID'];
if(! $insert )
	{
		die('无法插入数据: ' . mysqli_error($conn));
	}
	else
	{
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo '<div class="container">

	<div id="timeline">
		<center><div class="timeline-item" style="text-align:center;">
		
			<div class="timeline-content" margin-left="auto" style="margin-left:auto;
margin-right:auto;
margin-top:5%">
				<h2>台词收藏成功</h2>
				<p>现在你可以去我的收藏页面看你已经收藏好的台词，还可以尝试着对收藏好的台词进行翻译</p>
				<a href="introduction.php?id='.$MovieID.'" class="btn">返回</a>
			</div></center>
		</div>';
	}

mysqli_close($conn);
?>