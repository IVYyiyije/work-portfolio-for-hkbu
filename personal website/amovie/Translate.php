<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ScriptTranslate</title>
<link rel="stylesheet" href="css/base1.css">
  <script>
  function logout(){ 
  var con=confirm("是否注销"); 
  if(con==true){window.location.href="logout.php";}
}
  </script>
<style type="text/css">
div{margin-left:auto;
margin-right:auto;
margin-top:5%}
p{text-align:center}
.UserTrans{width:350px;
height:50px;
text-align:center}

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
if(isset($COOKIE)){
//$username=$_COOKIE['username'];
echo '<span id="log"><a href="login.html">登录</a></span>';}
else{
$username=$_COOKIE['username'];

echo '<span id="log"><a href="#" onclick=logout()>'.$username.'</a></span>';
	}?>

<?php
	$dbhost = 'localhost:3306';  //mysql服务器主机地址
	$dbuser = 'root';      //mysql用户名
	$dbpass = '';//mysql用户名密码
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass);
	if(! $conn )
	{
		die('Could not connect: ' . mysqli_error());
	}
   
	mysqli_select_db($conn,"amovie");
	mysqli_query($conn, "set names 'utf8'");
	
	$id=$_GET['id'];
	$sql = "SELECT moviescript.ScriptContent, script.ScriptID, script.UserTrans FROM moviescript, script WHERE moviescript.ScriptID={$id} and script.ScriptID={$id}";
	
	$result = mysqli_query($conn,$sql);
	
	$row = mysqli_fetch_array($result);
?>
  <img style="width:100%;align="center;" src="pic/3.jpg">
  <form action="update.php" method="post">
  <div class="container">
	<div id="timeline">
		<div class="timeline-item">
			<div class="timeline-content">
				<h3>收藏台词</h3>
				<h4><?php echo $row['ScriptContent'];?></h4>
			</div>
		</div>
	</div>	
  </div>
  <div class="container">
	<div id="timeline">
		<div class="timeline-item">
			<div class="timeline-content">
				<h3>我的翻译</h3>
				<p><input type="text" class="UserTrans" name="translation" value="<?php echo $row['UserTrans'];?>"></p>
                <p><button type="submit" name="submit" value="Submit" class="btn">点击提交翻译</button></p>
			</div>
		</div>
	</div>	
  </div>
  <input type="hidden" name="tid" value="<?php echo $id; ?>" >   
   </form>
   

<script src="http://open.iciba.com/huaci/huaci.js" ></script> 
</body>
</html>