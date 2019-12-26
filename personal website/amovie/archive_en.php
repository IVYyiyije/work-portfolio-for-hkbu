
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电影介绍</title>
 <link rel="stylesheet" href="css/nav_menu3.css" type="text/css" media="all" />
<link rel=stylesheet type="text/css" href="css/weilei.css">
<link rel=stylesheet type="text/css" href="css/daohang.css">
<link rel=stylesheet type="text/css" href="css/gongjulan.css">
<link rel=stylesheet type="text/css" href="css/amovie.css">
<link rel="stylesheet" type="text/css" href="css/style.css"/>
  <script>
  function logout(){ 
  var con=confirm("是否注销"); 
  if(con==true){window.location.href="logout.php";}
}
  </script>
<style>
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
<?php
if(isset($_COOKIE['username'])){
       $username=$_COOKIE['username'];
echo '<span id="log"><a href="#" onclick=logout()>'.$username.'</a></span>';
}
else{
echo '<span id="log"><a href="login.html">登录</a></span>';

	}?>

<img style="width:1300px;align="center;" src="pic/3.jpg">
<div class="amovie"><center><h1>爱慕影</h1></center></div>
<!--<span id="log"><a href="http://www.badaling.cn/language/en.asp">登录</a></span>
<span id="language"><a href="./index_en.html">语言切换</a></span>
<span id="huanfu"><a href="http://www.badaling.cn/language/en.asp">一键换肤</a></span>-->
<hr>

<div class="nav_menu3">
	<ul>
		<li class='nav-has-sub'><a href='index.php'>首页</a>
		</li>
		<li class='nav-has-sub'><a href='about.php'>关于我们</a>
        				<ul>
				   <li><a href='contact.php'>联系我们</a></li>
				  
		  </ul>
			 <li class='nav-has-sub'><a>电影简介</a>
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
<br>
<br>
<br>
<br>
<br>
<!-- 上方内容 -->
  <div class="box">
      <div class="head">
         <span>外文电影</span>
         <a href="https://movie.douban.com/">更多></a>
      </div>
<?php
   $dbhost = 'localhost:3306';  //mysql服务器主机地址
   $dbuser = 'root';      //mysql用户名
   $dbpass = '';//mysql用户名密码
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
     die('Could not connect: ' . mysqli_error());
   }
   
   //$id=$_GET['id'];
   $sql = "SELECT * FROM movie where  Language='外'";

mysqli_select_db($conn,"amovie");
mysqli_query($conn, "set names 'utf8'");

$huoqu = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_array($huoqu)) { 

  echo'<!-- 图片内容 -->  
  <ul>
    <li>
      <div class="deatil">
         <h2>'.$row['MovieName'].'</h2><br><br><br>
         <a href="introduction.php?id='.$row['MovieID'].'">开始进入</a>
      </div>
      <img src='.$row['Image'].' width="160px" height="240px" alt=""/>
    </li>';
}
?>

  
  


</body>
</html>