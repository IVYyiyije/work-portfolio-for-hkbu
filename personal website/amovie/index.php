<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8">
<title>Amovie</title>
<!--<link rel="stylesheet" href="css/main.css" />
<script type="text/javascript" src="js/jquery.js"></script>-->
<link rel="stylesheet" href="css/nav_menu3.css" type="text/css" media="all" />
<!--<link rel=stylesheet type="text/css" href="css/weilei.css">
<link rel=stylesheet type="text/css" href="css/daohang.css">
<link rel=stylesheet type="text/css" href="css/gongjulan.css">-->
<link rel=stylesheet type="text/css" href="css/amovie.css">
  <link rel="stylesheet" href="css/teachers.css">
  <script src="js/jquery-1.7.2.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>
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
    
<img style="width:100%;align="center;" src="pic/3.jpg">
<div class="amovie"><center><h1>爱慕影</h1></center></div>

<br>
<!--nav-->
<!--<div class="nav">
	<!--导航条-->
	<!--<ul class="nav-main">
        <li><a href='index.php'>首页</a></li>
		<li id="li-1"><a href='about.php'>关于我们</a><span></span></li>
		<li id="li-2"><a href='contact.php'>联系我们</a><span></span></li>
		<li id="li-3"><a href='archive.php'>电影简介</a><span></span></li>
		<li id="li-4"><a href='puzzle.html'>游戏环节</a><span></span></li>
		<li><a href='MyFavorite.php'>我的收藏</li>
	</ul>
	<div id="box-3" class="hidden-box hidden-loc-info">
		<ul>
			<li><a href='archive.php'>中文电影</a></li>
			<li><a href='archive_en.php'>英文电影</a></li>
		</ul>
	</div>
    <div id="box-4" class="hidden-box hidden-loc-info box04">
		<ul>
			<li><a href='puzzle.html'>拼拼电影</a></li>
			<li><a href='guess.php'>猜猜剧照</a></li>
		</ul>
	</div>
</div>-->

<div class="nav_menu3">
	<ul>
		<li class='nav-has-sub'><a href='index.php'>首页</a></li>
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
	   <li class='nav-has-sub'><a href='MyFavorite.php'>我的收藏</a></li>
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
<div class="amovie"><center><h1>每月推荐</h1></center></div>
<hr>
<!--header导航开始-->
<div  class="teachers_banner">
    <div class="container clearfix teachers_b">
        <div class="slide" id="slide">
            <ul>
<?php
   $dbhost = 'localhost:3306';  //mysql服务器主机地址
   $dbuser = 'root';      //mysql用户名
   $dbpass = '';//mysql用户名密码
   $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   if(! $conn )
   {
     die('Could not connect: ' . mysqli_error());
   }
              echo   ' <li> <a href=introduction.php?id=4><img src="pic/tuijian/leon.jpg" alt="这个杀手不太冷" title=""/></a> </li>
                <li> <a href=introduction.php?id=17> <img src="pic/tuijian/2.jpg" alt="红海行动" title=""/></a> </li>
                <li>  <a href=introduction.php?id=4><img src="pic/tuijian/first-player.jpg" alt="头号玩家"  title=""/></a> </li>
                <li>  <a href=introduction.php?id=2><img src="pic/tuijian/xiaoshenke.jpg" alt="肖申克的救赎"  title=""/></a> </li>
                <li> <a href=introduction.php?id=1> <img src="pic/tuijian/3billboard.jpg" alt="三个广告牌" title="" /></a> </li>
                <li> <a href=introduction.php?id=3> <img src="pic/tuijian/coco.jpg" alt="寻梦环游记" title="" /></a> </li>';
?>
            </ul>
            <div class="arrow">
                <div class="prev"><</div>
                <div class="next">></div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function () {
        /*图片位置数据*/
        var datas = [
            {'z-index': 6, opacity: 1, width: 760, height: 330, top: 40, left: 0},
            {'z-index': 4, opacity: 0.6, width: 560, height: 243, top:80, left: -225},
            {'z-index': 3, opacity: 0.4, width: 480, height: 203, top: -10, left: -170},
            {'z-index': 2, opacity: 0.2, width: 620, height: 269, top: -60, left: 110},
            {'z-index': 3, opacity: 0.4, width: 480, height: 203,  top: -10, left: 430},
            {'z-index': 4, opacity: 0.6, width: 560, height: 243, top: 80, left: 420},
        ]
        move();

        function move() {
            /*图片分布*/
            for (var i = 0; i < datas.length; i++) {
                var data = datas[i];
                $('#slide ul li').eq(i).css('z-index',data['z-index']);
                $('#slide ul li').eq(i).stop().animate(data, 1200);
            }
        }

        /*左箭头事件*/
        $('.prev').on('click', function () {
            var last = datas.pop();
            datas.unshift(last);

            move();
        })

        /*右箭头事件处理函数*/
        function nextYewu(){
            var first = datas.shift();
            datas.push(first);
            move();
        }
        /*右箭头事件*/
        $('.next').on('click', nextYewu);

        /*自动播放*/
        var timer = setInterval(function(){
            nextYewu();
        },5000);
        /*鼠标进入slide显示箭头,清除自动播放*/
        $('#slide').on({
            mouseenter: function () {
                $('.arrow').css('display', 'block');
                clearInterval(timer);
            }, mouseleave: function () {
                $('.arrow').css('display', 'none');
                /*鼠标离开时自动播放*/
                clearInterval(timer);
                timer = setInterval(function(){
                    nextYewu();
                },5000)
            }
        })
    })
</script>


<div style="text-align:center;">
<p>@本网站所有解释权归amovie所有</p></div>
</body>
</html>