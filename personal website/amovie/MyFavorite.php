<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>我的收藏MyFavorite</title>
<link rel="stylesheet" href="css/nav_menu3.css" type="text/css" media="all" />
<!--<link rel=stylesheet type="text/css" href="css/weilei.css">
<link rel=stylesheet type="text/css" href="css/daohang.css">-->
  <script>
  function logout(){ 
  var con=confirm("是否注销"); 
  if(con==true){window.location.href="logout.php";}
}
  </script>
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
<link rel="stylesheet" href="css/base1.css">

</head>
<body>
<?php
if(isset($_COOKIE['username'])){
       $username=$_COOKIE['username'];
echo '<span id="log"><a href="#" onclick=logout()>'.$username.'</a></span>';
}
else{
echo '<span id="log"><a href="login.html">登录</a></span>';

	}?>
<img class="banner" src="pic/3.jpg">
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
<br><br><br>
<img class="right" id="right_1" src="img/4.png">
<img class="right" id="right_2" src="img/5.png">


<br>
<?php
   $dbhost = 'localhost:3306';  //mysql服务器主机地址
   $dbuser = 'root';      //mysql用户名
   $dbpass = '';//mysql用户名密码
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
     die('Could not connect: ' . mysqli_error());
   }
   
if(isset($_COOKIE['username'])){
	$UserID=$_COOKIE['UserID'];

	
	
   $sql = "SELECT moviescript.ScriptContent, script.ScriptID, script.UserTrans FROM moviescript, script WHERE moviescript.ScriptID = script.ScriptID AND script.UserID={$UserID}";

mysqli_select_db($conn,"amovie");
mysqli_query($conn, "set names 'utf8'");

$huoqu = mysqli_query($conn,$sql);

$num = mysqli_num_rows($huoqu);


while ($row = mysqli_fetch_array($huoqu)) { 

echo '<div class="container">';
   echo '<div id="timeline">';
	  echo '<div class="timeline-item">';
	     echo '<div class="timeline-content">';
			echo '<h3>'.$row["ScriptContent"].'</h3>';
			   echo '<p>'.$row["UserTrans"].'</p>';
				  echo "<a class='btn' href='translate.php?id={$row['ScriptID']}'>点击翻译</a>";
			echo '</div>';
		echo '</div>';
	echo '</div>';	
echo '</div>';
            }  }


else echo "<h1>未登录用户无法查看收藏内容</h1>";

?>
</body>
</html>