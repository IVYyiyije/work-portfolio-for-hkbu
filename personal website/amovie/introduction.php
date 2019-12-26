<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php
   $dbhost = 'localhost:3306';  //mysql服务器主机地址
   $dbuser = 'root';      //mysql用户名
   $dbpass = '';//mysql用户名密码
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
     die('Could not connect: ' . mysqli_error());
   }
   
   $id=$_GET['id'];
   $sql = "SELECT * FROM movie where  MovieID={$id}";


mysqli_select_db($conn,"amovie");
mysqli_query($conn, "set names 'utf8'");

$huoqu_1 = mysqli_query($conn,$sql);

while ($row = mysqli_fetch_array($huoqu_1)) { echo $row['MovieName'];} ?></title>
 <link rel="stylesheet" href="css/nav_menu3.css" type="text/css" media="all" />

<!--<link rel=stylesheet type="text/css" href="css/daohang.css">-->
<!--<link rel=stylesheet type="text/css" href="css/gongjulan.css">-->
<!--<link rel="stylesheet" type="text/css" href="css/style.css"/>-->
<link rel="stylesheet" type="text/css" href="css/biaoge.css"/>
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

<div class="jieshao">
<div class="box"><div class="m">
<p style="font-size:25px;background:#B82510">电影简介</p>
<div class="p5"><div class="list_1">
<?php
   $dbhost = 'localhost:3306';  //mysql服务器主机地址
   $dbuser = 'root';      //mysql用户名
   $dbpass = '';//mysql用户名密码
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
     die('Could not connect: ' . mysqli_error());
   }
	
   
   $UserID=$_COOKIE['UserID'];

   $id=$_GET['id'];
   setcookie("MovieID",$id);
   $sql = "SELECT * FROM movie where  MovieID={$id}";

mysqli_select_db($conn,"amovie");
mysqli_query($conn, "set names 'utf8'");

$huoqu = mysqli_query($conn,$sql);
$script_sql = "SELECT movie.MovieID, moviescript.MovieID,moviescript.ScriptID,moviescript.ScriptContent
FROM movie,moviescript WHERE movie.MovieID = moviescript.MovieID AND moviescript.MovieID={$id}";
$script_result = mysqli_query($conn,$script_sql) or die('Query failed: ' . mysqli_error());
while ($row = mysqli_fetch_array($huoqu)) { 
echo '<span><a href="#"><img src='.$row['Image'].' width="250" height="354" /></a></span>';
echo '<p><b><a href="#" style="font-size:30px;">'.$row['MovieName'].'</a></b><br /><br />';
echo '<div style="color:#000">'.$row['Staff'].'';
echo '<br>剧情介绍：<div style="font-size:16px;"><br />&nbsp;&nbsp;&nbsp;&nbsp;'.$row['Intro'].'</div><br>';
echo '<br><h2>评论区</h2><div style="padding:30px;font-size:16px;">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$row['Comment'].' </div>
 <br><h2>经典台词</h2>';
}
while ($row = mysqli_fetch_array($script_result)){
if(isset($_COOKIE['username'])){
   echo '<ul><li><div style="padding:30px;font-size:16px">'.$row['ScriptContent'].'
<div align="right">收藏人数('; 
$nums = "SELECT COUNT(*) as count FROM script WHERE script.ScriptID=".$row['ScriptID'];
$nums_result = mysqli_query($conn,$nums);
while ($row1 = mysqli_fetch_array($nums_result)){ echo $row1['count'];}
	echo ')&nbsp;&nbsp;&nbsp;&nbsp;';
	$add_sql ="SELECT * FROM script WHERE UserID = '{$UserID}' AND ScriptID =".$row['ScriptID'];
	$add_result = mysqli_query($conn,$add_sql);	
	$row_add = mysqli_fetch_array($add_result);
	if(mysqli_num_rows($add_result) >= 1){
	echo '<a href="delete.php?id='.$row['ScriptID'].'"><img src="pic/delete.jpg" alt="删除"></a></div></li>';}

	else{echo '<a href="add.php?id='.$row['ScriptID'].'"><img src="pic/favorite.jpg" alt="收藏"></a></div></li>';}
}
else
{
echo '<li><div style="padding:30px;font-size:16px">'.$row['ScriptContent'].'</div></li>';
}
echo '</ul>';

}

//echo ;



?>
</ol></div></div>
</ul></div>
</div>

</body>
</html>
