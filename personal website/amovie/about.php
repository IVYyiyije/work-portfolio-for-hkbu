<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>关于我们</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />

	<!--//tags -->
    
 <link rel="stylesheet" href="css/nav_menu3.css" type="text/css" media="all" />
<!--<link rel=stylesheet type="text/css" href="css/weilei.css">
<link rel=stylesheet type="text/css" href="css/daohang.css">
<link rel=stylesheet type="text/css" href="css/gongjulan.css">-->
<link rel=stylesheet type="text/css" href="css/amovie.css">
  <link rel="stylesheet" href="css/teachers.css">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/about.css" type="text/css" media="screen" property="" />
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="http://fonts.googleapis.com/css?family=Montserrat:200,200i,300,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
	    rel='stylesheet' type='text/css'>
        <script src="js/jquery-1.7.2.min.js"></script>
  <script>
  function logout(){ 
  var con=confirm("是否注销"); 
  if(con==true){window.location.href="logout.php";}
}
  </script>
       	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
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
#grouppic{
	position:absolute;top:500px;left:120px;
	max-width: 500px; 
    width: 500px;
    width:expression(this.width > 500 ? "500px" : this.width);
	border:dashed;
	padding:30px;	
}
#sti{
	position:absolute;top:1050px;left:800px;
	max-width: 400px; 
    width: 400px;
    width:expression(this.width > 400 ? "500px" : this.width);
	border:dashed;
	padding:30px;
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
<img src='pic/amovie.jpg' id="grouppic">
<img src='pic/sti.jpg' id="sti">
</div>
	<!--about-->
	<div class="ab_content">
		<div class="container">
			<h3 class="tittle-w3ls">关于我们</h3>
			<div class="about-top">
				<h3 class="subheading">欢迎访问爱慕影</h3>
				<p class="paragraph">这是一个为广大电影爱好者准备的优质电影平台。我们这里有众多国内外高分电影，您可以来此随意pick！还有多种辅助功能，当您看到心动的台词，
				可以一键收藏，当您认为您可以给出更精彩的台词翻译，我们也为您提供了翻译平台。我们更有众多精彩的小游戏，供大家娱乐，加深对电影的理解。我们在此感谢您对爱慕影的支持！
				</p>
			</div>
			<div class="about-main">
				<div class="col-md-6 about-left">
				</div>

				<div class="col-md-6 about-right">
					<h3>四个“爬虫”</h3>
					<p class="paragraph">我们是四只“伪爬虫”，并不是“真程序猿”，但我们致力于为大家搬运高分优质电影。作为四只热爱电影的宝宝，我们全心全意做好这个网站，为大家带来更多电影乐趣，共同喜爱，我们做的一切，都是为了同样热爱电影的你们！</p>

				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="about-main sec">

				<div class="col-md-6 about-right two">
					<h3>关于高翻</h3>
					<p class="paragraph">北京语言大学高级翻译学院成立于2011年5月20日，现隶属于外国语学部，面向全国招生翻译专业本科、翻译专业硕士（MTI）、翻译学方向硕士（MA）和博士研究生(Ph.D)。学校设有研究生院、MTI教育中心、翻译学研究所、中外语言服务人才培养基地等机构以实现翻译人才的一体化、全方位培养。</p>

				</div>
				<div class="col-md-6 about-left two">
				</div>


				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--//about-->
		<!-- top Products -->


</body>

</html>