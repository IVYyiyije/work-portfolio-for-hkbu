<?php
setcookie("username","",time()-3600);
setcookie("password","",time()-3600);
setcookie("UserID","",time()-3600);
//header('Location:index.php');
header('location:skip.php?url=index.php&info=注销成功，3秒后回到首页');
?>