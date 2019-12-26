<!DOCTYPE html>
<?php
include('config.php');
include('init.php');
include('lock.php');
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>STICAT</title>

    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.css" />
<link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid-theme.min.css" />
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jsgrid/1.5.3/jsgrid.min.js"></script>
<script src="./md5.js"></script>


  </head>
  <body>
    
    <div class="container-fluid">
	<div class="row">

		</div>
	</div>
	<br><br>
	  <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h2>
					<?php echo $lang['title_1']?>
				</h2>
				<p>
					<?php echo $lang['welcome']?>
					<?php echo $lang['description']?>
				</p>
														<ul>
	<li><a href = "?lang=english">English</a></li>
	<li><a href = "?lang=chinese">中文</a></li>
<ul>
			</div>
			<div class="progress">
				<div class="progress-bar w-75">
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<div class="row">
		<div  class="col-md-8">
				<h4 class="text-center text-danger">
				<?php echo $lang['tm']?>
			</h4>
		<div id="tm"></div>
				<div class="container-fluid">

			<div class="card bg-default">
				<h5 class="card-header">
					<?php echo $lang['result']?>
				</h5>
				<div class="card-body">
					<p class="card-text">
						<center><div id="mt"></div></center>
					</p>
				</div>
				<div class="card-footer">
					<?php echo $lang['baidu']?>
				</div>
			</div>
		</div>
		
		</div>


		<div class="col-md-4">
				<h4 class="text-center text-danger">
				<?php echo $lang['tb']?>
			</h4>
			<div id="tb"></div>
			<!--<table class='table table-bordered table-hover'>
				<thead>
					<tr style="text-align:center">
						<th>
							ID
						</th>
						<th>
							<?php echo $lang['zh']?>
						</th>
						<th>
							<?php echo $lang['en']?>
						</th>
						<th>
							<?php echo $lang['resource']?>
						</th>
					</tr>
				</thead>
				<tbody>
					
					
				</tbody>
			</table>-->
		</div>
	</div>
	<br><br>
		<h4 class="text-center text-danger">
		<?php echo $lang['transtext']?>
			</h4>
	
	<div class="row">
		<div class="col-md-12">
			<div class="row">
					<div class="col-md-3">
	
					<form action="import.php" method="post" enctype="multipart/form-data" role="form">
							<input type="file" name="file" class="form-control-file" id="exampleInputFile" >
						<button type="submit" class="btn btn-block btn-outline-info">
						<?php echo $lang['uploadtext']?>
					</button>	
					</form>
					
				</div>
				<div class="col-md-3">
					<br>
					<button type="button"  onclick="window.location='doc.php'" class="btn btn-block btn-outline-danger">
						<?php echo $lang['export_word']?>
					</button>
				</div>
				<div class="col-md-3">
					 <br>
					<button type="button" onclick="window.location='txt.php'" class="btn btn-block btn-outline-success">
						<?php echo $lang['export_txt']?>
					</button>
				</div>
				<div class="col-md-3">
					 <br>
					<button type="button" onclick="window.location='export_excel.php'" class="btn btn-block btn-outline-warning">
						<?php echo $lang['export_excel']?>
					</button>
				</div>
			</div>
		</div>
	</div>
</div>


<div id="jsGrid"></div>
<div id="label"></div>
<div id="source"></div>
<div id="target"></div>
<div id="mt"></div>
<div id="tm"></div>
<script>

$("#jsGrid").jsGrid
(
	{
        width: "100%",
        height: "400px",

		autoload:true,
        inserting: true,
        editing: true,
        sorting: true,
        paging: true,
		//filtering:true,
		
		
        //data: terms,
		

		controller: 
		{
			loadData: function(filter)
				{
				return $.ajax
				(
					{
						type: "GET",
						url: "fetch_data.php",
						dataType: "json",
						//data:filter
					}
				);
			},
			
			insertItem: function(item)
				{
				return $.ajax
				(
					{
						type: "POST",
						url: "fetch_data.php",
						dataTy:item
					}
				);
			},
			
			updateItem: function(item)
			{
				return $.ajax
				(
					{
						type: "PUT",
						url: "fetch_data.php",
						data: item
					}
				);
			},
			
			deleteItem: function(item)
			{
				return $.ajax
				(
					{
						type: "DELETE",
						url: "fetch_data.php",
						data: item
					}
				);
			},
			
		},

		fields: [
            { name: "zh_CN", type: "text", width: 100 },
            { name: "en_US", type: "text", width: 100 },
           
            { type: "control" }
        ],
		
		rowClick: function(args) {
		console.log(args)
		var getData = args.item; //获取一行表格中的全部数据
		var keys = Object.keys(getData); // 将getData中的结果处理成一个数组Keys
		
		var text = [];//创建一个空白数组

		$.each(keys, function(idx,value) {
		//text.push(value + " : " + getData[value])
		text.push(getData[value])
		});
		// $.each(Array,function(index,value){}是一个jQuery的遍历方法，用它可以遍历一个数组，对于数组中的每一个元素，获取其index和value
		
		//对于每一行数据，其第一个元素的index是id，value是术语的序号

		//$("#label").text("该行全部内容为："+text.join(", "))
		//用逗号将text数组中的元素用逗号分开后将处理结果放到#lable对应的div中
		
		
	 //$("#source").text("术语原文是："+text[1])
		//$("#target").text("术语译文是："+text[1])
		
		//把原文字段传到另一个php中
		var yuanwen = text[1];
			$.post("fetch_tm.php",{
			yaochulideyuanwen:yuanwen
		},
		function(huodedejieguo){
			$("#tm").html(huodedejieguo)
		});
		
			$.post("fetch_tb.php",{
			yaochulideyuanwen:yuanwen
		},
		function(huodedejieguo){
			$("#tb").html(huodedejieguo)
		});
		
		
		//以下为获取机器翻译结果
		var appid = '20180810000193309';
		var key = 'dh1HRhRhe4lvc00kZjiq';
		var salt = (new Date).getTime();
		var query = text[1];
		// 多个query可以用\n连接  如 query='apple\norange\nbanana\npear'
		var from = 'zh';
		var to = 'en';
		var str1 = appid + query + salt +key;
		var sign = MD5(str1);
		$.ajax({
			url: 'http://api.fanyi.baidu.com/api/trans/vip/translate',
			type: 'get',
			dataType: 'jsonp',
			data: {
				q: query,
				appid: appid,
				salt: salt,
				from: from,
				to: to,
				sign: sign
			},
			success: function (data) {
				console.log(data);
				$("#mt").text(data.trans_result[0].dst)
			} 
		});
		
		
		
		}

	}
);

</script>
<br>
<br>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/scripts.js"></script>
<!--	<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="alert alert-dismissable alert-info">
				 
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
					×
				</button>
				<h4>
					机器翻译的结果
				</h4> 
	
		sss
	
			</div>
			<div class="card bg-default">
				<h5 class="card-header">
					机器翻译的结果
				</h5>
				<div class="card-body">
					<p class="card-text">
					</p>
				</div>
				<div class="card-footer">
					来源：百度翻译
				</div>
			</div>
		</div>
	</div>
</div>-->
  </body>
</html>
