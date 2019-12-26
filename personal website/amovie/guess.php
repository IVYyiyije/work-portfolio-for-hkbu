<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>猜剧照</title>

<link rel=stylesheet type="text/css" href="css/choices.css">
<link rel="stylesheet" href="css/nav_menu3.css" type="text/css" media="all" />
<link rel=stylesheet type="text/css" href="css/weilei.css">
<link rel=stylesheet type="text/css" href="css/daohang.css">
<link rel=stylesheet type="text/css" href="css/gongjulan.css">
<link rel=stylesheet type="text/css" href="css/amovie.css">
<link rel="stylesheet" type="text/css" href="css/style.css"/>

<script type="text/javascript" src="js/choose.js"></script>
<style>
#id{
	max-width: 800px; 
    width: 800px;
    width:expression(this.width > 800 ? "800px" : this.width);
	}
</style>
</head>
<body>
<img style="width:100%;align="center;" src="pic/3.jpg">

<hr>

<div class="nav_menu3">
	<ul>
		<li class='nav-has-sub'><a href='index.php'>首页</a>
		</li>
		<li class='nav-has-sub'><a href='about.php'>关于我们</a>
		</li>
                   <ul>
				   <li><a href='contact.php'>联系我们</a></li>
				   </ul>		
        
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
<br>
<br>
<br>
<br>
<br>

<hr color="#990033"/>
<?php

   $dbhost = 'localhost:3306';  
   $dbuser = 'root'; 
   $dbpass = '';
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
     die('Could not connect: ' . mysqli_error());
   }
   
   //获取题库条目数量
	$length = "SELECT count(1) FROM guessgame";
	mysqli_select_db( $conn, 'amovie' );
	mysqli_query($conn, "set names 'utf8'");
	$getlength = mysqli_query($conn, $length);
	$len = mysqli_fetch_assoc($getlength);

	
	//随机抽取题号
   $Questionid = rand(1,$len['count(1)']);
   
   //和数据库里SlideshowID对应
   $Slideshowid = $Questionid - 1;
   
   //选取对应的图片、选项、干扰项编号
	$sql_pic = "SELECT Slideshow FROM slideshow WHERE SlideshowID = '{$Slideshowid}'";
	$sql_right = "SELECT MovieName FROM movie WHERE MovieID = '{$Slideshowid}'";
	$sql_ob1 = "SELECT Option1 FROM guessgame WHERE QuestionID = '{$Questionid}'";
	$sql_ob2 = "SELECT Option2 FROM guessgame WHERE QuestionID = '{$Questionid}'";
	$sql_ob3 = "SELECT Option3 FROM guessgame WHERE QuestionID = '{$Questionid}'";
	
	//开始查找
	mysqli_select_db( $conn, 'amovie' );
	mysqli_query($conn, "set names 'utf8'");
	$getpic = mysqli_query($conn, $sql_pic);
	$getright = mysqli_query($conn, $sql_right);
	$getob1 = mysqli_query($conn, $sql_ob1);
	$getob2 = mysqli_query($conn, $sql_ob2);
	$getob3 = mysqli_query($conn, $sql_ob3);
	
	//如果查找不到
   if(!$getpic)
   {
	   die('Could not get data: ' . mysql_error());
   }
   if(!$getright)
   {
	   die('Could not get data: ' . mysql_error());
   }
   if(!$getob1)
   {
	   die('Could not get data: ' . mysql_error());
   }
   if(!$getob2)
   {
	   die('Could not get data: ' . mysql_error());
   }
   if(!$getob3)
   {
	   die('Could not get data: ' . mysql_error());
   }
   
    //获取剧照 
    $pic = mysqli_fetch_assoc($getpic);
	
	//获取正确选项以及干扰项
	$right = mysqli_fetch_assoc($getright);
	$ob1 = mysqli_fetch_assoc($getob1);
	$ob2 = mysqli_fetch_assoc($getob2);
	$ob3 = mysqli_fetch_assoc($getob3);
	
	//获取干扰项1名称
	$sql_ob1name = "SELECT MovieName FROM movie WHERE MovieID = '{$ob1['Option1']}'";
	$getob1name = mysqli_query($conn,$sql_ob1name);
	$ob1name = mysqli_fetch_assoc($getob1name);
	
	//获取干扰项2名称
	$sql_ob2name = "SELECT MovieName FROM movie WHERE MovieID = '{$ob2['Option2']}'";
	$getob2name = mysqli_query($conn,$sql_ob2name);
	$ob2name = mysqli_fetch_assoc($getob2name);
	
	//获取干扰项3名称
	$sql_ob3name = "SELECT MovieName FROM movie WHERE MovieID = '{$ob3['Option3']}'";
	$getob3name = mysqli_query($conn,$sql_ob3name);
	$ob3name = mysqli_fetch_assoc($getob3name);
	
	//如果无法获取
	if(!$getob1name)
   {
	   die('Could not get data: ' . mysql_error());
   }
   if(!$getob2name)
   {
	   die('Could not get data: ' . mysql_error());
   }
   if(!$getob3name)
   {
	   die('Could not get data: ' . mysql_error());
   }
   
   
   //显示问题主体
   echo '<br>';
   echo '<h3 style="text-align:center;">
		请问这张剧照出自以下哪部电影？
		</h3>';
	echo '<br>';
   echo '<br>';
   echo '<center><img src="'.$pic['Slideshow'].'" id="photo"></center>';
   echo '<br>';
   
   //设置ABCD随机选项
   $change = rand(1,4);
   
   if ($change == 1)
   {
		echo '<div class="choice">';
		echo '<a href="guess.php" id="a" name="right"  onclick="result()"> A '.$right['MovieName'].' </a>';
		echo '<a href="guess.php" id="b" name="choose" onclick="wrong()"> B '.$ob1name['MovieName'].' </a>';
		echo '<a href="guess.php" id="c" name="choose" onclick="wrong()"> C '.$ob2name['MovieName'].' </a>';
		echo '<a href="guess.php" id="d" name="choose" onclick="wrong()"> D '.$ob3name['MovieName'].' </a>'; 
		echo '</div>';
   }
   else if($change == 2)
   {
		echo '<div class="choice">';
		echo '<a href="guess.php" id="a" name="choose" onclick="wrong()" > A '.$ob1name['MovieName'].' ';
		echo '<a href="guess.php" id="b" name="right"  onclick="result()"> B '.$right['MovieName'].' </a>';
		echo '<a href="guess.php" id="c" name="choose" onclick="wrong()"> C '.$ob2name['MovieName'].' </a>';
		echo '<a href="guess.php" id="d" name="choose" onclick="wrong()"> D '.$ob3name['MovieName'].' </a>';
		echo '</div>';
   }
   else if ($change == 3)
   {
		echo '<div class="choice">';
		echo '<a href="guess.php" id="a" name="choose" onclick="wrong()"> A '.$ob1name['MovieName'].' </a>';
		echo '<a href="guess.php" id="b" name="choose" onclick="wrong()"> B '.$ob2name['MovieName'].' </a>';
		echo '<a href="guess.php" id="c" name="right" onclick="result()"> C '.$right['MovieName'].' </a>';
		echo '<a href="guess.php" id="d" name="choose" onclick="wrong()"> D '.$ob3name['MovieName'].' </a>';
		echo '</div>';
   }
   else if($change == 4)
   {
		echo '<div class="choice">';
	   	echo '<a href="guess.php" id="a" name="choose" onclick="wrong()"> A '.$ob1name['MovieName'].' </a>';
		echo '<a href="guess.php" id="b" name="choose" onclick="wrong()"> B '.$ob2name['MovieName'].' </a>';
		echo '<a href="guess.php" id="c" name="choose" onclick="wrong()"> C '.$ob3name['MovieName'].' </a>';
		echo '<a href="guess.php" id="d" name="right" onclick="result()"> D '.$right['MovieName'].' </a>';
		echo '</div>';
   }
   
   echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';echo '<br>';
   

 ?>
 </body>
 </html>