<?php
header('Content-Type:text/html;charset=utf-8');
$con=mysqli_connect('localhost','root','');
//为了数据插入数据库时不会乱码，加上下面这一句
mysqli_query($con,"set names utf8");
$db=mysqli_select_db($con,'stiterm');
$sql="select * from translate_text";
$res=mysqli_query($con,$sql);

//下面这种方式，加了","进行分割，就能将字段数据用","分开，再要从txt文件取出时就可以使用implode()函数切割
while ($row=mysqli_fetch_array($res)){
    $date=[
  
        'en' =>$row["en_US"],
		'b'    =>' ',
        't'    =>"\n"
    ];
    file_put_contents('data.txt',$date,FILE_APPEND);
	//json_encode($date);
	//echo '<br>';
}	
echo '导出成功';
?>



