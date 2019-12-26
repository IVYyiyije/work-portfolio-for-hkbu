var count = 0;
var score = 0;

function result()
{	
	alert("回答正确，前往下一题");
	var t = setTimeout(function(){window.location.reload();},200);

}

function wrong()
{
	alert("回答错误，再试一遍");

}