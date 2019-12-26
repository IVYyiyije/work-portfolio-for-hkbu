<?php
if (isset($_POST['loginbutton'])){

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
	
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	
	$user_sql ="SELECT UserID FROM USER WHERE username = '{$username}' AND UserCode = '{$password}' ";
	
	$user_result = mysqli_query($conn,$user_sql);
	
	$row = mysqli_fetch_array($user_result);
	
	if(mysqli_num_rows($user_result) == 1)
	{
		setcookie("UserID",$row['UserID']);
		setcookie("username",$username);
		header('Location:index.php');
	}
	else 
	{
		echo '<script>   
 		 var r=confirm("用户名或密码输入错误，是否进入注册页面");
  		if (r==true)
   		 {
    		onclick=window.location.href="register.html";
    		}
 		 else
    	{
		alert("请重新输入");
   		 onclick=window.location.href="login.html";
   		 }
    		</script>';
	
	}
		
	
}

?>
