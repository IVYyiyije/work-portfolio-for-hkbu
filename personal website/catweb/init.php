<?php

$languages = array("english","chinese");

if (isset($_GET["lang"]) === true && in_array($_GET["lang"],$languages)=== true){
	$_SESSION["lang"] = $_GET["lang"];
}
//如果用户访问主页时没有指定默认语言，那么会默认显示中文
elseif (isset($_GET["lang"]) === false){
	$_SESSION["lang"] = "chinese";
}

include "lang/".$_SESSION["lang"].".php";



?>