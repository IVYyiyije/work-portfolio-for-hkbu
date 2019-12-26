<?php

include("config.php");
include("init.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 

$myusername=mysqli_real_escape_string($conn,$_POST['username']); 
$mypassword=mysqli_real_escape_string($conn,$_POST['password']); 

$sql="SELECT id FROM user WHERE username='$myusername' and password='$mypassword'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
//$active=$row['active'];

$count=mysqli_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{

$_SESSION['login_user']=$myusername;

header("location: index2.php");
}
else 
{
	
$error=$lang['password_notice'];
echo "<div class='alert alert-success alert-dismissable'>";						
echo "		<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>";
echo "			× ";
echo "		</button>";
echo "		<h4> ";
echo $error;
echo "		</h4>";
echo "	</div>";
}
}
?>


<!DOCTYPE html>
<html>
  <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>
				<?php echo $lang['login_page']?></title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h2>
					<?php echo $lang['title_1']?>
				
				</h2>
				<h3>
					<?php echo $lang['login_user']?>
					
				</h3>
				<p>
					<a class="btn btn-primary btn-large" href="index.php"><?php echo $lang['goto_home']?></a>
				</p>
														<ul>
	<li><a href = "?lang=english">English</a></li>
	<li><a href = "?lang=chinese">中文</a></li>
<ul>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6">
						
			<form action="" role="form" method="post">
				<div class="form-group">
					 
					<label>
						<?php echo $lang['username']?>
						
					</label>
					<input type="text" name="username" class="form-control" >
				</div>
				<div class="form-group">
					 
					<label >
						<?php echo $lang['password']?>
						
					</label>
					<input type="password" name="password" class="form-control">
				</div>
				 
				<button type="submit" class="btn btn-primary">
					<?php echo $lang['login']?>
				</button>
			</form>
		</div>
		<div class="col-md-3">
		</div>
	</div>
</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
  </body>
</html>