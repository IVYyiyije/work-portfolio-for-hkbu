<!doctype html>
<html class="no-js" lang="en">
<head>
	<title>联系我们</title>
	<!--/tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />

	<!--//tags -->
    
 <link rel="stylesheet" href="css/nav_menu3.css" type="text/css" media="all" />
<!--<link rel=stylesheet type="text/css" href="css/weilei.css">
<link rel=stylesheet type="text/css" href="css/daohang.css">
<link rel=stylesheet type="text/css" href="css/gongjulan.css">-->
  <link rel="stylesheet" href="css/teachers.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
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
	<!--//tags -->
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" property="" />
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style2.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- //for bootstrap working -->
	<link href="http://fonts.googleapis.com/css?family=Montserrat:200,200i,300,400,400i,500,500i,600,600i,700,700i,800" rel="stylesheet">
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,900,900italic,700italic'
	    rel='stylesheet' type='text/css'>
        
        
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
#cnm{color:#C00;}!important
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


		</li>
	   <li class='nav-has-sub'><a href='puzzle.html'>游戏环节</a>
			<ul>
				<li><a href='puzzle.html'>拼拼电影</a></li>
                <li><a href='guess.php'>猜猜剧照</a></li>
    
			</ul>
		</li>


	
	</ul>

</div>

	<!--// header_top -->
<!-- top Products -->
	<div class="ab_content">
		<div class="container">
			<h3 class="tittle-w3ls">联系我们</h3>
					
						<div class="inner_sec_info_w3ls_agile">
							<div class="col-md-7 contact_grid_right">
								<h6>请填写以下信息以便联系我们。</h6>
								<form action="addcontact.php" method="post">
									<div class="col-md-6 col-sm-6 contact_left_grid">
										<input type="text" name="Name" placeholder="姓名" required>
										<input type="email" name="Email" placeholder="电子邮件" required>
									</div>
									<div class="col-md-6 col-sm-6 contact_left_grid">
										<input type="text" name="Telephone" placeholder="电话" required>
										<input type="text" name="Subject" placeholder="主题" required>
									</div>
									<div class="clearfix"> </div>
									<textarea name="Message" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Message...';}" required>详细信息...</textarea>
									<input type="submit" value="提交">
									<input type="reset" value="清空">
								</form>
							</div>
							<div class="col-md-5 contact-left">
								<h6>相关信息</h6>
								<div class="visit">
									<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
										<span class="fa fa-home" aria-hidden="true"></span>
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
										<h4>联系地址</h4>
										<p>北京市海淀区学院路15号北京语言大学</p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="mail-us">
									<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
										<span class="fa fa-envelope" aria-hidden="true"></span>
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
										<h4>电子邮件</h4>
										<p><a href="mailto:info@example.com">info@example.com</a></p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="call">
									<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
										<span class="fa fa-phone" aria-hidden="true"></span>
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
										<h4>联系电话</h4>
										<p>+18044261149</p>
									</div>
									<div class="clearfix"></div>
								</div>
								<div class="visit">
									<div class="col-md-2 col-sm-2 col-xs-2 contact-icon">
										<span class="fa fa-fax" aria-hidden="true"></span>
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10 contact-text">
										<h4>电子传真</h4>
										<p>+1804426349</p>
									</div>
									<div class="clearfix"></div>
								</div>
							</div>
							<div class="clearfix"> </div>

						</div>

	</footer>
	<!-- //footer -->
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
	<!-- js -->
	<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>

	<!--search-bar-->
	<script src="js/search.js"></script>
	<!--//search-bar-->
			
<!-- start-smoth-scrolling -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/jquery.easing.min.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->
	<script>
		$('ul.dropdown-menu li').hover(function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
		}, function () {
			$(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
		});
	</script>
   
	<!-- flexSlider -->
	<script defer src="js/jquery.flexslider.js"></script>
	<script type="text/javascript">
		$(window).load(function () {
			$('.flexslider').flexslider({
				animation: "slide",
				start: function (slider) {
					$('body').removeClass('loading');
				}
			});
		});
	</script>
	<!-- //flexSlider -->
	<!-- smooth-scrolling-of-move-up -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->
	<!-- Pricing-Popup-Box-JavaScript -->
	<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
	<!-- //Pricing-Popup-Box-JavaScript -->
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>